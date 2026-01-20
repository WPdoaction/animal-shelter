# Scripts de Desarrollo

Este directorio contiene scripts de desarrollo para el plugin Animal Shelter.

## release.sh

Script para crear una release del plugin lista para distribución.

### Uso

```bash
./bin/release.sh <version>
```

### Ejemplo

```bash
./bin/release.sh 1.0.0
```

### Qué hace el script

1. Valida el formato de la versión (debe ser semver: X.Y.Z)
2. Crea un directorio temporal
3. Copia todos los archivos del plugin **excepto** los listados en `.distignore`
4. Crea un archivo ZIP con el nombre `animal-shelter-<version>.zip`
5. Mueve el ZIP al directorio padre del plugin (`wp-content/plugins/`)
6. Limpia los archivos temporales

### Archivos excluidos

El script excluye automáticamente:
- Archivos y carpetas listados en `.distignore`
- `.claude/` - Configuración de Claude Code
- `.codex/` - Skills de desarrollo
- `CLAUDE.md` - Documentación para Claude Code
- Archivos `.zip` existentes

### Salida

El script crea un archivo en:
```
wp-content/plugins/animal-shelter-<version>.zip
```

Este archivo está listo para ser distribuido o subido a WordPress.org.
