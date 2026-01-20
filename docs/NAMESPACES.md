# Arquitectura de Namespaces PSR-4

Este documento describe la arquitectura moderna de namespaces implementada en Animal Shelter v1.0.0+.

## Visión General

A partir de la versión 1.0.0, el plugin Animal Shelter utiliza **namespaces PHP** siguiendo el estándar **PSR-4** con autoloading vía **Composer**. Esta migración reemplaza el sistema anterior basado en prefijos de clase (`Animalshelter_*`) y `require_once`.

### Beneficios

- ✅ **Autoloading**: No más `require_once` manual (eliminados ~45 statements)
- ✅ **Organización**: Código organizado en namespaces lógicos
- ✅ **Estándar**: Sigue PSR-4, estándar de la industria PHP
- ✅ **Escalabilidad**: Más fácil añadir nuevas clases y módulos
- ✅ **IDE Support**: Mejor autocompletado y navegación en IDEs

## Estructura de Namespaces

### Namespace Root

```
AnimalShelter\
```

Mapeado a `src/` directory via PSR-4 en `composer.json`:

```json
{
    "autoload": {
        "psr-4": {
            "AnimalShelter\\": "src/"
        }
    }
}
```

### Jerarquía Completa

```
AnimalShelter\
├── Core\
│   ├── Animalshelter           # Clase principal del plugin
│   ├── Activator               # Activation hooks
│   └── Deactivator             # Deactivation hooks
│
├── Admin\
│   ├── Admin                   # Manager del backend
│   │
│   ├── CPT\
│   │   ├── Cpt                 # Base class para Custom Post Types
│   │   ├── Dog                 # CPT de perros
│   │   └── Cat                 # CPT de gatos
│   │
│   ├── Taxonomy\
│   │   ├── Taxonomy            # Base class para taxonomías
│   │   │
│   │   ├── Dog\
│   │   │   ├── Breed           # Razas de perro
│   │   │   ├── Status          # Estado de perro
│   │   │   ├── Size            # Tamaño de perro
│   │   │   ├── Color           # Color de perro
│   │   │   └── Energy          # Energía de perro
│   │   │
│   │   └── Cat\
│   │       ├── Breed           # Razas de gato
│   │       ├── Status          # Estado de gato
│   │       ├── Size            # Tamaño de gato
│   │       ├── Color           # Color de gato
│   │       └── Energy          # Energía de gato
│   │
│   └── Menupage\
│       ├── Menupage            # Base class para páginas de admin
│       └── AnimalShelter       # Página de configuración del plugin
│
├── PublicFacing\
│   ├── PublicMain              # Manager del frontend
│   │
│   ├── Post\
│   │   ├── Post                # Base class para helpers de posts
│   │   ├── Dog                 # Helper de posts de perros
│   │   └── Cat                 # Helper de posts de gatos
│   │
│   └── Term\
│       ├── Term                # Base class para helpers de términos
│       │
│       ├── Dog\
│       │   ├── Breed           # Helper de términos de razas de perro
│       │   ├── Status          # Helper de términos de estado de perro
│       │   ├── Size            # Helper de términos de tamaño de perro
│       │   ├── Color           # Helper de términos de color de perro
│       │   └── Energy          # Helper de términos de energía de perro
│       │
│       └── Cat\
│           ├── Breed           # Helper de términos de razas de gato
│           ├── Status          # Helper de términos de estado de gato
│           ├── Size            # Helper de términos de tamaño de gato
│           ├── Color           # Helper de términos de color de gato
│           └── Energy          # Helper de términos de energía de gato
│
└── Data\
    ├── Breed\
    │   ├── Dog                 # Array de razas predefinidas de perros
    │   └── Cat                 # Array de razas predefinidas de gatos
    │
    └── Size\
        ├── Dog                 # Definiciones de tamaños de perros
        └── Cat                 # Definiciones de tamaños de gatos
```

## Estructura de Directorios

```
animal-shelter/
├── animal-shelter.php          # Plugin principal (carga autoloader)
├── composer.json               # Configuración PSR-4
├── composer.lock               # Lock file de Composer
│
├── vendor/                     # Autoloader de Composer
│   └── autoload.php           # ← Cargado en animal-shelter.php
│
├── src/                        # Todo el código namespaced
│   ├── Core/
│   ├── Admin/
│   ├── PublicFacing/
│   └── Data/
│
└── languages/                  # Traducciones
```

### Directorios Eliminados

Los siguientes directorios de la arquitectura anterior **ya no existen**:

- ❌ `admin/` → Reemplazado por `src/Admin/`
- ❌ `public/` → Reemplazado por `src/PublicFacing/`
- ❌ `includes/` → Reemplazado por `src/Core/` y `src/Data/`

## Migración de Nombres de Clases

### Tabla de Conversión

| Clase Antigua (Global) | Clase Nueva (Namespaced) | Archivo |
|------------------------|--------------------------|---------|
| `Animalshelter` | `AnimalShelter\Core\Animalshelter` | `src/Core/Animalshelter.php` |
| `Animalshelter_Activator` | `AnimalShelter\Core\Activator` | `src/Core/Activator.php` |
| `Animalshelter_Deactivator` | `AnimalShelter\Core\Deactivator` | `src/Core/Deactivator.php` |
| `Animalshelter_Admin` | `AnimalShelter\Admin\Admin` | `src/Admin/Admin.php` |
| `Animalshelter_Public` | `AnimalShelter\PublicFacing\PublicMain` | `src/PublicFacing/PublicMain.php` |
| `Animalshelter_Cpt` | `AnimalShelter\Admin\CPT\Cpt` | `src/Admin/CPT/Cpt.php` |
| `Animalshelter_Cpt_Dog` | `AnimalShelter\Admin\CPT\Dog` | `src/Admin/CPT/Dog.php` |
| `Animalshelter_Cpt_Cat` | `AnimalShelter\Admin\CPT\Cat` | `src/Admin/CPT/Cat.php` |
| `Animalshelter_Taxonomy` | `AnimalShelter\Admin\Taxonomy\Taxonomy` | `src/Admin/Taxonomy/Taxonomy.php` |
| `Animalshelter_Taxonomy_Breed_Dog` | `AnimalShelter\Admin\Taxonomy\Dog\Breed` | `src/Admin/Taxonomy/Dog/Breed.php` |
| `Animalshelter_Taxonomy_Status_Cat` | `AnimalShelter\Admin\Taxonomy\Cat\Status` | `src/Admin/Taxonomy/Cat/Status.php` |
| `Animalshelter_Menupage` | `AnimalShelter\Admin\Menupage\Menupage` | `src/Admin/Menupage/Menupage.php` |
| `Animalshelter_Post` | `AnimalShelter\PublicFacing\Post\Post` | `src/PublicFacing/Post/Post.php` |
| `Animalshelter_Post_Dog` | `AnimalShelter\PublicFacing\Post\Dog` | `src/PublicFacing/Post/Dog.php` |
| `Animalshelter_Term` | `AnimalShelter\PublicFacing\Term\Term` | `src/PublicFacing/Term/Term.php` |
| `Animalshelter_Term_Breed_Dog` | `AnimalShelter\PublicFacing\Term\Dog\Breed` | `src/PublicFacing/Term/Dog/Breed.php` |
| `Animalshelter_Breed_Dog` | `AnimalShelter\Data\Breed\Dog` | `src/Data/Breed/Dog.php` |
| `Animalshelter_Size_Cat` | `AnimalShelter\Data\Size\Cat` | `src/Data/Size/Cat.php` |

## Ejemplos de Código

### Ejemplo 1: Clase Base (CPT)

**Antes** (`admin/class-animalshelter-cpt.php`):
```php
<?php
if (!defined('ABSPATH')) {
    exit;
}

class Animalshelter_Cpt {
    public function cpt_register_public_default_args(): array {
        // ...
    }
}
```

**Después** (`src/Admin/CPT/Cpt.php`):
```php
<?php
namespace AnimalShelter\Admin\CPT;

if (!defined('ABSPATH')) {
    exit;
}

class Cpt {
    public function cpt_register_public_default_args(): array {
        // ...
    }
}
```

### Ejemplo 2: Clase Hija (Dog CPT)

**Antes** (`admin/class-animalshelter-cpt-dog.php`):
```php
<?php
if (!defined('ABSPATH')) {
    exit;
}

class Animalshelter_Cpt_Dog extends Animalshelter_Cpt {
    public function __construct() {
        parent::__construct();
        $this->cpt = ANIMALSHELTER_CPT_DOG;
    }
}
```

**Después** (`src/Admin/CPT/Dog.php`):
```php
<?php
namespace AnimalShelter\Admin\CPT;

if (!defined('ABSPATH')) {
    exit;
}

class Dog extends Cpt {
    public function __construct() {
        parent::__construct();
        $this->cpt = ANIMALSHELTER_CPT_DOG;
    }
}
```

### Ejemplo 3: Manager con Use Statements

**Antes** (`admin/class-animalshelter-admin.php`):
```php
<?php
class Animalshelter_Admin {
    private function includes(): void {
        require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-cpt.php';
        require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-cpt-dog.php';
        // ... 13+ require_once
    }

    private function inits(): void {
        $cpt_dog = new Animalshelter_Cpt_Dog();
        $cpt_dog->initCPT();
    }
}
```

**Después** (`src/Admin/Admin.php`):
```php
<?php
namespace AnimalShelter\Admin;

use AnimalShelter\Admin\CPT\Dog as DogCPT;
use AnimalShelter\Admin\CPT\Cat as CatCPT;
use AnimalShelter\Admin\Taxonomy\Dog\Breed as DogBreed;
// ... más use statements

class Admin {
    private function includes(): void {
        // ¡No se necesita! Composer autoloader maneja todo
    }

    private function inits(): void {
        $cpt_dog = new DogCPT();
        $cpt_dog->initCPT();
    }
}
```

### Ejemplo 4: Plugin Principal

**Antes** (`animal-shelter.php`):
```php
<?php
if (!class_exists('Animalshelter')) {
    final class Animalshelter {
        public function init(): void {
            $admin = new Animalshelter_Admin();
            $public = new Animalshelter_Public();
        }
    }

    $animalshelter = new Animalshelter();
}

function animalshelter_activate() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-animalshelter-activator.php';
    Animalshelter_Activator::activate();
}
```

**Después** (`animal-shelter.php`):
```php
<?php
// Cargar Composer autoloader
if (file_exists(ANIMALSHELTER_PLUGIN_DIR . 'vendor/autoload.php')) {
    require_once ANIMALSHELTER_PLUGIN_DIR . 'vendor/autoload.php';
} else {
    add_action('admin_notices', function() {
        echo '<div class="error"><p>';
        echo esc_html__('Animal Shelter: Run "composer install"', 'animal-shelter');
        echo '</p></div>';
    });
    return;
}

// Inicializar plugin
$animalshelter = new \AnimalShelter\Core\Animalshelter();
$animalshelter->load();

// Hooks de activación/desactivación
function animalshelter_activate(): void {
    \AnimalShelter\Core\Activator::activate();
}
```

## Uso del Autoloader

### Cómo Funciona

1. **Composer genera el autoloader** en `vendor/autoload.php`
2. **animal-shelter.php carga el autoloader** al inicio
3. **PSR-4 mapea** `AnimalShelter\` → `src/`
4. **PHP carga clases automáticamente** cuando se referencian

### Ejemplo de Resolución

Cuando escribes:
```php
$dog = new \AnimalShelter\Admin\CPT\Dog();
```

Composer automáticamente:
1. Ve el namespace `AnimalShelter\Admin\CPT\Dog`
2. Busca en el mapeo PSR-4: `AnimalShelter\` → `src/`
3. Carga `src/Admin/CPT/Dog.php`

No se necesita `require_once` ni `include`.

## Clases WordPress Globales

Las clases nativas de WordPress requieren prefijo `\` (fully qualified):

```php
// ✅ Correcto
$query = new \WP_Query($args);
$post = \get_post($id);

// ❌ Incorrecto (buscaría AnimalShelter\Admin\WP_Query)
$query = new WP_Query($args);
```

En clases base como `Cpt.php` y `Taxonomy.php`, todas las referencias a `WP_Query` usan `\WP_Query`.

## Comandos Composer

### Desarrollo

Instalar con dependencias de desarrollo:
```bash
composer install
```

### Producción

Instalar solo dependencias de producción con autoloader optimizado:
```bash
composer install --no-dev --optimize-autoloader
```

### Regenerar Autoloader

Después de añadir nuevas clases:
```bash
composer dump-autoload
```

### Autoloader Optimizado

Para máximo performance:
```bash
composer dump-autoload --optimize
```

Esto genera un **class map** en lugar de búsquedas dinámicas.

## Release y Distribución

### Script de Release

El script `bin/release.sh` automáticamente:

1. Ejecuta `composer install --no-dev --optimize-autoloader`
2. Incluye `vendor/` en el ZIP
3. Incluye `composer.json` y `composer.lock`
4. Excluye directorios antiguos (`admin/`, `public/`, `includes/`)
5. Excluye dependencias de desarrollo

### Uso

```bash
./bin/release.sh 1.0.0
```

### Contenido del ZIP

```
animal-shelter-1.0.0.zip
├── animal-shelter.php
├── composer.json
├── composer.lock
├── src/
│   └── [todas las clases]
├── vendor/
│   ├── autoload.php
│   └── composer/
│       ├── autoload_*.php
│       └── [archivos del autoloader]
└── languages/
```

**IMPORTANTE**: `vendor/` es necesario en producción para el autoloader.

## Añadir Nuevas Clases

### Paso 1: Crear el Archivo

Ubicación: `src/[Namespace]/[Clase].php`

Ejemplo para un nuevo CPT "Bird":
```
src/Admin/CPT/Bird.php
```

### Paso 2: Declarar Namespace

```php
<?php
namespace AnimalShelter\Admin\CPT;

if (!defined('ABSPATH')) {
    exit;
}

class Bird extends Cpt {
    // ...
}
```

### Paso 3: Usar la Clase

```php
use AnimalShelter\Admin\CPT\Bird;

$bird_cpt = new Bird();
```

### Paso 4: Regenerar Autoloader (Opcional)

Para desarrollo no es necesario, pero para optimizar:
```bash
composer dump-autoload
```

## Convenciones de Nombres

### Namespaces

- **PascalCase**: `AnimalShelter\Admin\CPT`
- **Sin sufijos**: `Dog` en lugar de `DogCPT`
- **Lógico**: Refleja la jerarquía del sistema

### Clases

- **PascalCase**: `Animalshelter`, `Dog`, `Breed`
- **Descriptivo**: `PublicMain` en lugar de `Public` (evita conflicto con palabra reservada)
- **Sin prefijos**: `Dog` en lugar de `Animalshelter_Cpt_Dog`

### Use Statements

Usar **aliases** cuando hay conflicto de nombres:

```php
use AnimalShelter\Admin\CPT\Dog as DogCPT;
use AnimalShelter\PublicFacing\Post\Dog as DogPost;

$cpt = new DogCPT();
$post_helper = new DogPost($post_id);
```

## Compatibilidad

### PHP Version

- **Mínimo**: PHP 7.4 (typed properties)
- **Recomendado**: PHP 8.0+

### WordPress Version

- **Mínimo**: WordPress 6.6
- **Recomendado**: WordPress 6.7+

### Composer Version

- **Mínimo**: Composer 2.0
- **Recomendado**: Composer 2.7+

## Troubleshooting

### Error: Class not found

**Síntoma**:
```
Fatal error: Uncaught Error: Class 'AnimalShelter\Admin\Admin' not found
```

**Solución**:
```bash
composer dump-autoload
```

### Error: Composer autoloader not found

**Síntoma**:
```
Animal Shelter: Run "composer install"
```

**Solución**:
```bash
composer install
```

### Performance Issues

**Síntoma**: Carga lenta del plugin

**Solución**: Usar autoloader optimizado
```bash
composer install --optimize-autoloader --no-dev
```

## Testing

### Verificar Autoloader

```bash
# Verificar que existe
test -f vendor/autoload.php && echo "OK" || echo "ERROR"

# Contar clases registradas
grep -c "AnimalShelter" vendor/composer/autoload_classmap.php
```

### Verificar Sintaxis

```bash
# Todas las clases en src/
find src/ -name "*.php" -exec php -l {} \; | grep -v "No syntax errors"
```

### Verificar Namespace Mapping

```bash
# Ver configuración PSR-4
grep -A 2 "AnimalShelter" vendor/composer/autoload_psr4.php
```

## Referencias

- [PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/)
- [Composer Documentation](https://getcomposer.org/doc/)
- [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)
