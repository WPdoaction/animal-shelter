# Documentación del Plugin Animal Shelter

Bienvenido a la documentación técnica del plugin Animal Shelter.

## Índice de Documentos

### Para Desarrolladores

- **[ARCHITECTURE.md](ARCHITECTURE.md)**: Arquitectura detallada del plugin, patrones de diseño, flujo de inicialización y sistema de extensibilidad.

- **[COMPATIBILITY.md](COMPATIBILITY.md)**: Información sobre compatibilidad con WordPress, PHP, y análisis de características utilizadas.

- **[TESTING.md](TESTING.md)**: Guías de testing manual, automatizado, code quality, y QA.

- **[VERSIONING.md](VERSIONING.md)**: Política de versionado, changelog, y proceso de release.

### Inicio Rápido

Para comenzar a desarrollar en el plugin:

1. **Instalar dependencias**:
   ```bash
   composer install
   ```

2. **Verificar código**:
   ```bash
   vendor/bin/phpcs
   ```

3. **Crear release**:
   ```bash
   ./bin/release.sh 1.0.0
   ```

## Requisitos del Sistema

- **WordPress**: 6.6 - 6.9
- **PHP**: 7.4 - 8.5
- **MySQL**: 5.7+ o MariaDB 10.3+

## Estructura del Proyecto

```
animal-shelter/
├── admin/              # Backend functionality
│   ├── class-animalshelter-admin.php
│   ├── class-animalshelter-cpt*.php
│   └── class-animalshelter-taxonomy*.php
├── public/             # Frontend functionality
│   ├── class-animalshelter-public.php
│   ├── class-animalshelter-post*.php
│   └── class-animalshelter-term*.php
├── includes/           # Shared utilities
│   ├── breed/          # Breed data
│   ├── size/           # Size data
│   └── class-animalshelter-*.php
├── languages/          # Translation files
├── bin/                # Build scripts
│   └── release.sh      # Release script
├── docs/               # This documentation
└── animal-shelter.php  # Main plugin file
```

## Custom Post Types

El plugin registra dos tipos de post personalizados:

- **as_dog** (Perros): Gestión de perros en adopción
- **as_cat** (Gatos): Gestión de gatos en adopción

## Taxonomías

Cada tipo de animal tiene taxonomías específicas:

- **Breed** (Raza): as_breed_dog, as_breed_cat
- **Status** (Estado): as_status_dog, as_status_cat
- **Size** (Talla): as_size_dog, as_size_cat
- **Color** (Color): as_color_dog, as_color_cat
- **Energy** (Energía): as_energy_dog, as_energy_cat

## Convenciones de Código

### Naming
- Prefijo de funciones: `animalshelter_`
- Prefijo de clases: `Animalshelter_`
- Text domain: `animal-shelter`

### Standards
- WordPress Coding Standards
- PHP 7.4+ features (typed properties, return types)
- DocBlocks obligatorios en funciones públicas

### Hooks
- Usar hooks de WordPress cuando sea posible
- Evitar modificar core de WordPress
- Documentar custom hooks

## Contribuir

### Code Style

Antes de hacer commit:

```bash
# Auto-fix
vendor/bin/phpcbf

# Verificar
vendor/bin/phpcs
```

### Testing

Antes de release:

1. Verificar en múltiples versiones de PHP (7.4, 8.0, 8.1, 8.2, 8.3)
2. Verificar en múltiples versiones de WordPress (6.6, 6.7, 6.8, 6.9)
3. Testing manual de funcionalidades
4. Verificar traducciones

Ver [TESTING.md](TESTING.md) para más detalles.

## Soporte

- **Issues**: [GitHub Issues](https://github.com/WPdoaction/animal-shelter/issues)
- **Comunidad**: [WordPress Granada](https://wpgranada.es/)

## Licencia

Este plugin está licenciado bajo EUPL 1.2 (European Union Public License).

Ver [LICENSE.txt](../LICENSE.txt) para más detalles.

## Recursos Adicionales

- [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)
- [PHP The Right Way](https://phptherightway.com/)
- [Semantic Versioning](https://semver.org/)

---

**Nota**: Esta documentación está en constante evolución. Si encuentras errores o tienes sugerencias, por favor abre un issue.
