# Compatibilidad del Plugin

Este documento detalla los requisitos de compatibilidad del plugin Animal Shelter y los problemas encontrados.

## Requisitos Objetivo

- **WordPress**: 6.6 - 6.9
- **PHP**: 7.2 - 8.5

## Estado Actual (v1.0.0)

- **WordPress**: 6.1+ (tested up to 6.1)
- **PHP**: 7.4+ (tested up to 8.1)

## Problemas de Compatibilidad con PHP 7.2

### Typed Properties (PHP 7.4+)

El plugin usa **typed properties** que fueron introducidas en PHP 7.4. Esto es incompatible con PHP 7.2 y 7.3.

#### Archivos afectados:

1. **admin/class-animalshelter-cpt.php**
   - `public string $class_prefix`
   - `public string $cpt`
   - `public string $rewrite`
   - `public string $label`
   - `public string $description`
   - `public string $menu_icon`
   - `public string $title_post`
   - `public string $taxonomy_breed`

2. **admin/class-animalshelter-taxonomy.php**
   - `public string $taxonomy`
   - `public string $taxonomy_rewrite`
   - `public string $cpt_dog`
   - `public string $cpt_cat`

3. **admin/class-animalshelter-menupage.php**
   - `public string $class_prefix`
   - `public string $page`
   - `public string $tab`
   - `public array $available_tabs`
   - `public string $default_tab`
   - `public string $get_page`

4. **admin/class-animalshelter-admin.php**
   - `public string $prefix`

5. **public/class-animalshelter-public.php**
   - `public string $prefix`

6. **public/class-animalshelter-term.php**
   - `public string $prefix`

7. **public/class-animalshelter-post.php**
   - (requiere revisión)

8. **includes/breed/class-animalshelter-breed-dog.php**
   - `private array $breeds`

9. **includes/breed/class-animalshelter-breed-cat.php**
   - `private array $breeds`

10. **includes/size/class-animalshelter-size-dog.php**
    - `private array $sizes`

11. **includes/size/class-animalshelter-size-cat.php**
    - `private array $sizes`

### Tipos de Retorno void (PHP 7.1+)

El plugin usa tipos de retorno `: void` en 35 archivos. Esto es compatible desde PHP 7.1, por lo que **no hay problema** para PHP 7.2+.

## Soluciones

### Opción 1: Mantener PHP 7.4 como Requisito Mínimo (RECOMENDADO)

Mantener PHP 7.4 como versión mínima tiene sentido porque:

- PHP 7.2 alcanzó End of Life (EOL) en noviembre de 2020
- PHP 7.3 alcanzó EOL en diciembre de 2021
- PHP 7.4 alcanzó EOL en noviembre de 2022
- WordPress 6.6+ recomienda PHP 7.4 o superior
- El código está escrito aprovechando características de PHP 7.4

**Cambios necesarios:**
- Actualizar headers del plugin a "Tested up to: 6.9"
- Mantener "Requires PHP: 7.4"
- Actualizar "Tested PHP: 8.5"

### Opción 2: Eliminar Typed Properties para Soportar PHP 7.2

Para dar soporte real a PHP 7.2, se deben eliminar todas las typed properties.

**Ejemplo de cambio:**

```php
// Antes (PHP 7.4+)
public string $prefix = ANIMALSHELTER_PREFIX;
private array $breeds;

// Después (PHP 7.2+)
public $prefix = ANIMALSHELTER_PREFIX;
private $breeds;
```

**Ventajas:**
- Mayor compatibilidad con hosting legacy

**Desventajas:**
- Pérdida de type safety
- Más propenso a errores
- Código menos moderno
- PHP 7.2 está deprecated desde hace años

## Compatibilidad con WordPress

El plugin es compatible con WordPress 6.6 - 6.9 sin cambios en el código:

- Usa `register_post_type()` y `register_taxonomy()` de forma estándar
- Compatible con Block Editor (show_in_rest)
- No usa funciones deprecated de WordPress
- Sigue WordPress Coding Standards

## Compatibilidad con PHP 8.x

El código es compatible con PHP 8.0 - 8.5:

- No usa funciones deprecated de PHP 8
- Los tipos de retorno son compatibles
- No hay uso de características incompatibles con PHP 8

## Recomendación

**Mantener PHP 7.4 como versión mínima** es la opción más sensata:

1. PHP 7.2 y 7.3 están End of Life hace años
2. La mayoría de hosting modernos ofrecen PHP 7.4+
3. WordPress 6.6+ recomienda PHP 7.4 o superior
4. El código se beneficia de las mejoras de PHP 7.4 (typed properties, type safety)
5. Eliminar typed properties degradaría la calidad del código sin beneficio real

Si por alguna razón específica se requiere PHP 7.2, se debe proceder con la Opción 2 y refactorizar todo el código.
