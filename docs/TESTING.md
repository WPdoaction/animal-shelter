# Testing y Quality Assurance

Este documento describe los procedimientos de testing para el plugin Animal Shelter.

## Entornos de Testing

### Requisitos Mínimos
- WordPress 6.6
- PHP 7.4
- MySQL 5.7 / MariaDB 10.3

### Requisitos Recomendados
- WordPress 6.9 (última versión)
- PHP 8.3
- MySQL 8.0 / MariaDB 11.0

### Entornos a Probar

| WordPress | PHP   | Estado      |
|-----------|-------|-------------|
| 6.6       | 7.4   | ✅ Mínimo   |
| 6.7       | 8.0   | ✅ Probado  |
| 6.8       | 8.1   | ✅ Probado  |
| 6.9       | 8.2   | ✅ Probado  |
| 6.9       | 8.3   | ✅ Probado  |

## Code Quality

### PHP_CodeSniffer

Verificar que el código cumple con WordPress Coding Standards:

```bash
# Instalar dependencias
composer install

# Ejecutar PHPCS
vendor/bin/phpcs

# Auto-fix cuando sea posible
vendor/bin/phpcbf
```

Configuración en `.phpcs.xml.dist`:
- Standard: WordPress
- PHP Compatibility: 7.4+
- Minimum WP Version: 6.6

### Errores Comunes

Si encuentras errores de WPCS, verifica:
- Nombres de funciones deben tener prefijo `animalshelter_`
- Text domain debe ser `animal-shelter`
- Escapado correcto de salidas
- Sanitización de entradas

## Testing Manual

### Post Types

#### Dogs (as_dog)
1. **Crear**: Admin → Dogs → Add New
2. **Editar**: Verificar todos los campos custom
3. **Publicar**: Verificar que se publica correctamente
4. **Ver**: Frontend muestra correctamente
5. **Eliminar**: Se elimina sin errores

#### Cats (as_cat)
1. Mismos pasos que Dogs
2. Verificar taxonomías específicas de cats

### Taxonomías

Para cada taxonomía (Breed, Status, Size, Color, Energy):
1. **Crear término**: Sin errores
2. **Asignar a animal**: Se guarda correctamente
3. **Ver archivo**: Muestra animales filtrados
4. **Editar término**: Cambios se reflejan
5. **Eliminar término**: Sin errores (verificar reasignación)

### Block Editor (Gutenberg)

1. **Compatibilidad**: CPTs aparecen en editor
2. **REST API**: `/wp-json/wp/v2/as_dog` funciona
3. **Taxonomías**: Se pueden asignar desde editor
4. **Guardado**: Sin errores de JavaScript

### Multiidioma

1. **Español (es_ES)**: Todas las cadenas traducidas
2. **Catalán (ca)**: Todas las cadenas traducidas
3. **Fallback**: Si no hay traducción, muestra original

### Permisos

1. **Administrator**: Acceso completo
2. **Editor**: Puede editar animales
3. **Author**: Puede crear sus propios animales
4. **Contributor**: Puede enviar para revisión
5. **Subscriber**: No puede acceder a admin

## Testing de Rendimiento

### Queries

Verificar con Query Monitor:
- Número de queries por página
- Tiempo de ejecución
- Queries N+1

### Caching

1. **Object Cache**: Compatible con Redis/Memcached
2. **Transients**: Se usan para datos pesados
3. **Page Cache**: Compatible con WP Rocket, W3TC, etc.

## Testing de Seguridad

### Checklists

- [ ] Nonces verificados en todos los formularios
- [ ] Capabilities verificadas antes de acciones
- [ ] Inputs sanitizados (sanitize_text_field, etc.)
- [ ] Outputs escapados (esc_html, esc_url, etc.)
- [ ] SQL preparado con $wpdb->prepare
- [ ] No hay eval() ni funciones peligrosas
- [ ] No hay includes de archivos user-controllable

### Herramientas

```bash
# Plugin Check (oficial de WordPress.org)
wp plugin check animal-shelter

# WPScan
wpscan --url http://localhost --enumerate p
```

## Testing de Actualización

### Desde versión anterior

1. **Backup**: Hacer backup completo
2. **Actualizar**: Subir nueva versión
3. **Verificar**:
   - Posts existentes intactos
   - Taxonomías intactas
   - Configuración preservada
   - No hay errores PHP

### Fresh Install

1. **Instalar**: Activar plugin
2. **Verificar**:
   - CPTs registrados
   - Taxonomías registradas
   - Rewrite rules flushed
   - No hay errores

## Testing de Desinstalación

1. **Desactivar**: Sin errores
2. **Eliminar**:
   - Verifica que se ejecuta uninstall.php
   - CPTs eliminados
   - Taxonomías eliminadas
   - Opciones eliminadas (o no, según política)

## Regression Testing

Antes de cada release:
- [ ] Todos los CPTs funcionan
- [ ] Todas las taxonomías funcionan
- [ ] Admin interface funciona
- [ ] Frontend muestra correctamente
- [ ] No hay errores JavaScript
- [ ] No hay errores PHP
- [ ] Compatible con último WordPress
- [ ] Compatible con PHP 7.4 - 8.3
- [ ] Pasa PHPCS sin errores
- [ ] Traducciones funcionan

## Reportar Bugs

Al reportar bugs, incluir:
1. Versión de WordPress
2. Versión de PHP
3. Versión del plugin
4. Pasos para reproducir
5. Resultado esperado vs real
6. Screenshots si aplica
7. Logs de error si hay
