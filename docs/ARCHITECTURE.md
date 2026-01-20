# Arquitectura del Plugin

Este documento proporciona una visión detallada de la arquitectura del plugin Animal Shelter.

## Visión General

Animal Shelter es un plugin de WordPress diseñado con una arquitectura modular y extensible que sigue las mejores prácticas de desarrollo de WordPress y estándares modernos de PHP.

**A partir de v1.0.0**, el plugin utiliza **namespaces PSR-4** con **Composer autoloading**.

```
animal-shelter/
├── src/                # Todo el código con namespaces PSR-4
│   ├── Core/          # Core plugin functionality
│   ├── Admin/         # Backend/Admin functionality
│   ├── PublicFacing/  # Frontend functionality
│   └── Data/          # Shared utilities and predefined data
├── vendor/             # Composer autoloader (incluido en releases)
├── languages/          # Translations
├── bin/                # Build scripts
└── docs/               # Documentation
```

**Ver también**: [`NAMESPACES.md`](NAMESPACES.md) para documentación detallada sobre la arquitectura de namespaces.

## Patrón de Diseño

### Singleton Pattern

El plugin principal usa un patrón singleton modificado:

```php
namespace AnimalShelter\Core;

final class Animalshelter {
    public function load(): void {
        $this->contentConstants();
        add_action('admin_init', array($this, 'upgrader'));
        add_action('init', array($this, 'languages'), 1);
        $this->includes();
        add_action('init', array($this, 'init'), 10);
    }
}

// En animal-shelter.php
$animalshelter = new \AnimalShelter\Core\Animalshelter();
$animalshelter->load();
```

### Class Inheritance con Namespaces

- **Base Classes**: Proporcionan funcionalidad común
  - `AnimalShelter\Admin\CPT\Cpt`: Base para Custom Post Types
  - `AnimalShelter\Admin\Taxonomy\Taxonomy`: Base para Taxonomías
  - `AnimalShelter\Admin\Menupage\Menupage`: Base para páginas de admin
  - `AnimalShelter\PublicFacing\Post\Post`: Base para funcionalidad pública de posts
  - `AnimalShelter\PublicFacing\Term\Term`: Base para funcionalidad pública de términos

- **Child Classes**: Extienden las bases con configuración específica
  - `AnimalShelter\Admin\CPT\Dog` extends `Cpt`
  - `AnimalShelter\Admin\CPT\Cat` extends `Cpt`
  - `AnimalShelter\Admin\Taxonomy\Dog\Breed` extends `Taxonomy`
  - etc.

**Nota**: Las clases hijas usan nombres cortos (sin prefijos) gracias a los namespaces.

## Flujo de Inicialización

### 1. Bootstrap (animal-shelter.php)

```
1. Verificar WPINC
2. Definir constantes globales (animalshelter_constants())
3. Instanciar clase principal
4. Llamar a load()
```

### 2. Load Sequence

```
1. Composer autoloader loaded (vendor/autoload.php)
2. contentConstants() - Define constantes de contenido (CPTs, Taxonomías)
3. admin_init → upgrader() - Maneja actualizaciones de versión
4. init → languages() (priority 1) - Carga traducciones
5. includes() - No requiere require_once, solo para lógica custom
6. init → init() (priority 10) - Inicializa componentes
```

### 3. Initialization Order

**Admin (`src/Admin/Admin.php`)**:
```
1. Constants
2. Includes - No longer needed (Composer autoloader)
3. Inits:
   - CPT Dog/Cat registration (via new DogCPT(), new CatCPT())
   - Taxonomy registration (Breed, Status, Size, Color, Energy)
   - Admin pages (new AnimalShelterMenupage())
   - Flush rewrite rules (once)
```

**Public (`src/PublicFacing/PublicMain.php`)**:
```
1. Constants
2. Includes - No longer needed (Composer autoloader)
3. Inits:
   - Enqueue scripts/styles (commented)
```

**Nota**: Ya no se requieren métodos `includes()` con `require_once`. Composer maneja el autoloading automáticamente.

## Sistema de Constants

### Global Constants
Definidas en `animalshelter_constants()`:
- `ANIMALSHELTER_VERSION` - Versión del plugin
- `ANIMALSHELTER_PREFIX` - Prefijo global
- `ANIMALSHELTER_PLUGIN_DIR` - Ruta absoluta al plugin
- `ANIMALSHELTER_PLUGIN_ADMIN_DIR` - Ruta a admin/
- `ANIMALSHELTER_PLUGIN_PUBLIC_DIR` - Ruta a public/
- `ANIMALSHELTER_PLUGIN_INCLUDES_DIR` - Ruta a includes/
- `ANIMALSHELTER_PLUGIN_URL` - URL base del plugin
- `ANIMALSHELTER_PLUGIN_ADMIN_URL` - URL a admin/
- `ANIMALSHELTER_PLUGIN_PUBLIC_URL` - URL a public/
- `ANIMALSHELTER_PLUGIN_FILE` - Ruta al archivo principal

### Content Constants
Definidas en `Animalshelter->contentConstants()`:
- `ANIMALSHELTER_CPT_DOG` = 'as_dog'
- `ANIMALSHELTER_CPT_CAT` = 'as_cat'
- `ANIMALSHELTER_TAXONOMY_BREED_DOG` = 'as_breed_dog'
- `ANIMALSHELTER_TAXONOMY_BREED_CAT` = 'as_breed_cat'
- `ANIMALSHELTER_TAXONOMY_STATUS_DOG` = 'as_status_dog'
- `ANIMALSHELTER_TAXONOMY_STATUS_CAT` = 'as_status_cat'
- `ANIMALSHELTER_TAXONOMY_SIZE_DOG` = 'as_size_dog'
- `ANIMALSHELTER_TAXONOMY_SIZE_CAT` = 'as_size_cat'
- `ANIMALSHELTER_TAXONOMY_COLOR_DOG` = 'as_color_dog'
- `ANIMALSHELTER_TAXONOMY_COLOR_CAT` = 'as_color_cat'
- `ANIMALSHELTER_TAXONOMY_ENERGY_DOG` = 'as_energy_dog'
- `ANIMALSHELTER_TAXONOMY_ENERGY_CAT` = 'as_energy_cat'

**Límite**: Todos los post types y taxonomías tienen límite de 20 caracteres.

## Custom Post Types

### Base: Animalshelter_Cpt

Proporciona:
- **Registration**: `cpt_register_public_default_args()`
- **Query Helpers**:
  - `get_query_basic_args()`
  - `get_query_terms_args()`
  - `get_query_ids()`
  - `get_query_selector_list()`
- **Permissions**: `verify_on_save()`, `currentuser_has_edit_permissions()`
- **Utils**: `custom_enter_title()`, `get_archive_URL()`

### Configuración

Cada CPT define:
```php
public string $cpt = ANIMALSHELTER_CPT_DOG;
public string $rewrite = 'dogs';
public string $label = 'Dogs';
public string $description = 'Dogs for adoption';
public string $menu_icon = 'dashicons-pets';
public string $title_post = 'Enter dog name';
```

### Registration

```php
public function initCPT(): void {
    $args = $this->cpt_register_public_default_args();
    register_post_type($this->cpt, $args);
}
```

Ejecutado en `init` hook con prioridad default (10).

## Taxonomías

### Base: Animalshelter_Taxonomy

Proporciona:
- **Label Generators**:
  - `get_taxonomies_breed_labels()`
  - `get_taxonomies_status_labels()`
  - `get_taxonomies_size_labels()`
  - `get_taxonomies_color_labels()`
  - `get_taxonomies_energy_labels()`
- **Registration**: `taxonomy_register_public_default_args()`
- **Query Helpers**: `get_terms()`

### Configuración

Cada taxonomía define:
```php
public string $taxonomy = ANIMALSHELTER_TAXONOMY_BREED_DOG;
public string $taxonomy_rewrite = 'dog-breed';
```

Y en el child class:
```php
public function initTaxonomy(): void {
    $labels = $this->get_taxonomies_breed_labels();
    $args = $this->taxonomy_register_public_default_args();
    $args['labels'] = $labels;
    register_taxonomy($this->taxonomy, $this->cpt_dog, $args);
}
```

## Rewrite Rules

### Flush Strategy

Usa una flag para evitar flush innecesario:

```php
public function flush_rewrite_rules(): void {
    if (get_option('ANIMALSHELTER_flush_rewrite_rules_flag') === false) {
        update_option('ANIMALSHELTER_flush_rewrite_rules_flag', 'no', true);
        flush_rewrite_rules();
    }
}
```

La flag se elimina en:
- `upgrader()` cuando cambia la versión
- Activación del plugin

## Lifecycle Hooks

### Activation
```php
function animalshelter_activate(): void {
    \AnimalShelter\Core\Activator::activate();
}
register_activation_hook(__FILE__, 'animalshelter_activate');
```

**Nota**: No se requiere `require_once`. La clase se carga via Composer autoloader.

### Deactivation
```php
function animalshelter_deactivate(): void {
    \AnimalShelter\Core\Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'animalshelter_deactivate');
```

### Uninstall
Manejado por `uninstall.php` (ejecutado al eliminar el plugin).

## Upgrade System

```php
public function upgrader(): void {
    $current_ver = get_option('ANIMALSHELTER_version', '0.0');

    if (version_compare($current_ver, ANIMALSHELTER_VERSION, '==')) {
        return;
    }

    // Force rewrite rules flush
    delete_option('ANIMALSHELTER_flush_rewrite_rules_flag');

    if ($current_ver !== '0.0') {
        // Version-specific upgrade code here
    }

    update_option('ANIMALSHELTER_version', ANIMALSHELTER_VERSION, true);
}
```

## Data Layer

### Predefined Data

Almacenado en `src/Data/`:

**Breeds** (`src/Data/Breed/`):
- `Dog.php`: ~900+ razas de perros (namespace: `AnimalShelter\Data\Breed\Dog`)
- `Cat.php`: Razas de gatos (namespace: `AnimalShelter\Data\Breed\Cat`)

**Sizes** (`src/Data/Size/`):
- `Dog.php`: Tallas de perros (namespace: `AnimalShelter\Data\Size\Dog`)
- `Cat.php`: Tallas de gatos (namespace: `AnimalShelter\Data\Size\Cat`)

### Formato

```php
namespace AnimalShelter\Data\Breed;

class Dog {
    private array $breeds;

    public function __construct() {
        $this->breeds = array(
            'slug' => array('name' => __('Name', 'animal-shelter')),
            // ...
        );
    }

    public function get_breeds(): array {
        return $this->breeds;
    }
}
```

## Internacionalización

### Text Domain
- `animal-shelter` (usado en todas las funciones de traducción)

### Contextos
- Nombres de razas: `_x('Breed Name', 'Breed of a dog', 'animal-shelter')`
- Taxonomías: `_x('Term', 'Taxonomy General Name', 'animal-shelter')`

### Load
```php
public function languages(): void {
    load_plugin_textdomain(
        'animal-shelter',
        false,
        ANIMALSHELTER_PLUGIN_LANGUAGES_DIR
    );
}
```

## REST API

Todos los CPTs y taxonomías exponen REST API:
- `show_in_rest => true` en registration args
- Endpoints:
  - `/wp-json/wp/v2/as_dog`
  - `/wp-json/wp/v2/as_cat`
  - `/wp-json/wp/v2/as_breed_dog`
  - etc.

## Extensibilidad

### Hooks Disponibles

El plugin usa hooks de WordPress:
- `init`: Registration de CPTs y Taxonomías
- `admin_init`: Upgrade system
- `plugins_loaded`: Inicialización principal

### Filters Potenciales

Para futuras versiones:
- `animalshelter_cpt_args`: Filtrar args de registro CPT
- `animalshelter_taxonomy_args`: Filtrar args de taxonomía
- `animalshelter_breeds`: Filtrar lista de razas

### Añadir Nuevo Tipo de Animal

**Ejemplo**: Añadir soporte para "Birds" (Pájaros)

1. **Definir constantes** en `src/Core/Animalshelter.php` → `contentConstants()`:
   ```php
   if (!defined('ANIMALSHELTER_CPT_BIRD')) {
       define('ANIMALSHELTER_CPT_BIRD', 'as_bird');
   }
   if (!defined('ANIMALSHELTER_TAXONOMY_BREED_BIRD')) {
       define('ANIMALSHELTER_TAXONOMY_BREED_BIRD', 'as_breed_bird');
   }
   // ... más taxonomías
   ```

2. **Crear clase CPT** en `src/Admin/CPT/Bird.php`:
   ```php
   namespace AnimalShelter\Admin\CPT;

   class Bird extends Cpt {
       public function __construct() {
           parent::__construct();
           $this->cpt = ANIMALSHELTER_CPT_BIRD;
           $this->rewrite = 'bird';
           // ... configuración
       }
   }
   ```

3. **Crear clases de taxonomías** en `src/Admin/Taxonomy/Bird/`:
   - `Breed.php`, `Status.php`, `Size.php`, etc.
   - Todas extendiendo `Taxonomy` base class

4. **Registrar en Admin** en `src/Admin/Admin.php` → `inits()`:
   ```php
   use AnimalShelter\Admin\CPT\Bird as BirdCPT;
   use AnimalShelter\Admin\Taxonomy\Bird\Breed as BirdBreed;

   $cpt_bird = new BirdCPT();
   $cpt_bird->initCPT();

   $taxonomy_breed_bird = new BirdBreed();
   $taxonomy_breed_bird->initTaxonomy();
   ```

5. **Crear clases public** en `src/PublicFacing/`:
   - `Post/Bird.php`
   - `Term/Bird/Breed.php`, etc.

6. **Añadir datos predefinidos** en `src/Data/`:
   - `Breed/Bird.php`
   - `Size/Bird.php`

7. **Regenerar autoloader**:
   ```bash
   composer dump-autoload
   ```

**Nota**: No se requieren `require_once`. Composer detecta las nuevas clases automáticamente.

## Performance Considerations

### Lazy Loading
- Clases solo se cargan cuando se necesitan
- Includes separados por contexto (admin/public)

### Caching
- Usa opciones de WordPress para versión
- Compatible con object cache
- Rewrite rules solo flush cuando necesario

### Queries
- Usa WP_Query con args optimizados
- `posts_per_page => -1` solo cuando necesario
- Helpers para queries específicas

## Security

### Nonces
- Verificados en save actions: `verify_on_save()`
- Capabilities checked: `current_user_can('edit_post', $post_id)`

### Input Sanitization
- Usar WordPress sanitization functions
- Validar antes de guardar

### Output Escaping
- Usar WordPress escaping functions
- `esc_html()`, `esc_url()`, `esc_attr()`

### WPINC Check
```php
if (!defined('WPINC')) {
    die;
}
```

## Futuras Mejoras

Áreas identificadas para expansión:
1. Meta boxes para campos adicionales
2. Frontend templates personalizados
3. Widget de animales destacados
4. Sistema de favoritos
5. Formulario de adopción
6. Integración con email
7. API para sincronización externa
