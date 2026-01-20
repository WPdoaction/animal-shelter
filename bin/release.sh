#!/bin/bash
#
# Script para crear una release del plugin Animal Shelter
# Uso: ./bin/release.sh <version>
# Ejemplo: ./bin/release.sh 1.0.0
#

set -e

# Colores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Función para mostrar mensajes de error
error() {
    echo -e "${RED}Error: $1${NC}" >&2
    exit 1
}

# Función para mostrar mensajes de éxito
success() {
    echo -e "${GREEN}✓ $1${NC}"
}

# Función para mostrar mensajes de info
info() {
    echo -e "${YELLOW}→ $1${NC}"
}

# Verificar que se pasó la versión como parámetro
if [ -z "$1" ]; then
    error "Debes especificar la versión. Uso: ./bin/release.sh <version>"
fi

VERSION="$1"

# Validar formato de versión (semver básico: X.Y.Z)
if ! [[ "$VERSION" =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
    error "Formato de versión inválido. Usa formato semver: X.Y.Z (ej: 1.0.0)"
fi

# Nombre del plugin
PLUGIN_SLUG="animal-shelter"

# Directorios
PLUGIN_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PARENT_DIR="$(dirname "$PLUGIN_DIR")"
TMP_DIR="/tmp/${PLUGIN_SLUG}-release-$$"
BUILD_DIR="${TMP_DIR}/${PLUGIN_SLUG}"
ZIP_NAME="${PLUGIN_SLUG}-${VERSION}.zip"
ZIP_PATH="${PARENT_DIR}/${ZIP_NAME}"

info "Creando release del plugin Animal Shelter v${VERSION}"
echo ""

# Verificar que existe composer
if ! command -v composer &> /dev/null; then
    error "Composer no está instalado. Instala Composer primero."
fi

# Verificar que existe .distignore
if [ ! -f "${PLUGIN_DIR}/.distignore" ]; then
    error "No se encuentra el archivo .distignore"
fi

# Verificar que existe composer.json
if [ ! -f "${PLUGIN_DIR}/composer.json" ]; then
    error "No se encuentra el archivo composer.json"
fi

# Ejecutar composer install para producción
info "Instalando dependencias de Composer (producción)..."
cd "$PLUGIN_DIR"
composer install --no-dev --optimize-autoloader --quiet

if [ ! -f "${PLUGIN_DIR}/vendor/autoload.php" ]; then
    error "No se generó el autoloader de Composer"
fi

success "Dependencias de Composer instaladas"

# Crear directorio temporal
info "Creando directorio temporal..."
mkdir -p "$BUILD_DIR"

# Copiar archivos excluyendo los del .distignore
info "Copiando archivos del plugin..."

# Usar rsync para copiar excluyendo archivos del .distignore
rsync -a \
    --exclude-from="${PLUGIN_DIR}/.distignore" \
    --exclude="*.zip" \
    --exclude=".claude/" \
    --exclude=".codex/" \
    --exclude="CLAUDE.md" \
    --exclude="docs/" \
    --exclude="admin/" \
    --exclude="public/" \
    --exclude="includes/" \
    "${PLUGIN_DIR}/" \
    "${BUILD_DIR}/"

# Verificar que vendor/autoload.php existe en el build
if [ ! -f "${BUILD_DIR}/vendor/autoload.php" ]; then
    error "El autoloader de Composer no se copió al build"
fi

# Verificar que se copiaron archivos
if [ ! -f "${BUILD_DIR}/animal-shelter.php" ]; then
    error "No se copiaron los archivos correctamente"
fi

success "Archivos copiados correctamente"

# Crear el archivo ZIP
info "Creando archivo ${ZIP_NAME}..."
cd "$TMP_DIR"
zip -r -q "${ZIP_NAME}" "${PLUGIN_SLUG}"

if [ ! -f "${TMP_DIR}/${ZIP_NAME}" ]; then
    error "No se pudo crear el archivo ZIP"
fi

success "Archivo ZIP creado"

# Mover el ZIP al directorio padre del plugin
info "Moviendo ZIP a ${PARENT_DIR}..."
mv "${TMP_DIR}/${ZIP_NAME}" "$ZIP_PATH"

if [ ! -f "$ZIP_PATH" ]; then
    error "No se pudo mover el archivo ZIP"
fi

success "ZIP movido correctamente"

# Limpiar directorio temporal
info "Limpiando archivos temporales..."
rm -rf "$TMP_DIR"

success "Limpieza completada"

echo ""
echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
echo -e "${GREEN}Release completada exitosamente!${NC}"
echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
echo ""
echo "  Versión: ${VERSION}"
echo "  Archivo: ${ZIP_PATH}"
echo "  Tamaño:  $(du -h "$ZIP_PATH" | cut -f1)"
echo ""
