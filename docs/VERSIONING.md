# Control de Versiones

Este documento describe la política de versionado del plugin Animal Shelter.

## Semantic Versioning

El plugin sigue [Semantic Versioning](https://semver.org/) (SemVer):

```
MAJOR.MINOR.PATCH
```

- **MAJOR**: Cambios incompatibles con versiones anteriores
- **MINOR**: Nueva funcionalidad compatible con versiones anteriores
- **PATCH**: Correcciones de bugs compatibles con versiones anteriores

## Versión Actual

**v1.0.0** (Primera versión estable)

## Requisitos por Versión

### v1.0.0
- WordPress: 6.6 - 6.9
- PHP: 7.4 - 8.5
- MySQL: 5.7+ / MariaDB: 10.3+

## Ciclo de Vida de Versiones

### Versiones Soportadas

| Versión | Soporte | Hasta |
|---------|---------|-------|
| 1.0.x   | ✅ Sí   | TBD   |

### Política de Soporte

- **Versión actual**: Soporte completo (nuevas funcionalidades y correcciones)
- **Versión anterior**: Solo correcciones de seguridad críticas
- **Versiones antiguas**: Sin soporte

## Proceso de Release

1. **Actualizar versión en archivos**:
   - `animal-shelter.php` (Plugin Version y ANIMALSHELTER_VERSION)
   - `readme.txt` (Stable tag)

2. **Actualizar changelog en readme.txt**

3. **Crear release**:
   ```bash
   ./bin/release.sh X.Y.Z
   ```

4. **Generar tag en Git**:
   ```bash
   git tag -a vX.Y.Z -m "Version X.Y.Z"
   git push origin vX.Y.Z
   ```

5. **Subir a WordPress.org** (cuando corresponda)

## Changelog

### [1.0.0] - TBD
#### Added
- Custom Post Types para Dogs y Cats
- Taxonomías: Breed, Status, Size, Color, Energy
- Integración con Block Editor
- Soporte multiidioma (es_ES, ca)
- Admin interface para gestión de animales

#### Changed
- Actualizado soporte a WordPress 6.6 - 6.9
- Actualizado soporte a PHP 7.4 - 8.5

#### Security
- Validación de nonces en formularios
- Escapado de salidas
- Sanitización de entradas

## Notas de Upgrade

### De 0.x a 1.0.0
- Primera versión estable
- No se requieren migraciones
