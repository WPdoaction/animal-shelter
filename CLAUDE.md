# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Animal Shelter (Protectora de Animales) is a WordPress plugin for managing animal shelters, developed by the WordPress Granada Community (Spain). The plugin provides custom post types for managing adoptable animals (dogs and cats) with taxonomies for breeds, status, size, color, and energy levels.

## Architecture

### Core Structure

The plugin follows a standard WordPress plugin architecture with three main layers:

- **Main Plugin File** (`animal-shelter.php`): Defines the `Animalshelter` singleton class that bootstraps the plugin, handles activation/deactivation, and manages the plugin lifecycle
- **Admin Layer** (`admin/`): Handles WordPress admin interface, CPT registration, taxonomy registration, and admin pages
- **Public Layer** (`public/`): Handles frontend rendering and public-facing functionality
- **Includes Layer** (`includes/`): Contains shared utilities, activator/deactivator classes, and predefined data (breed lists, size definitions)

### Custom Post Types (CPTs)

The plugin registers two main CPTs:
- `as_dog` (Dogs) - defined in `ANIMALSHELTER_CPT_DOG`
- `as_cat` (Cats) - defined in `ANIMALSHELTER_CPT_CAT`

Each CPT extends the base `Animalshelter_Cpt` class (admin/class-animalshelter-cpt.php) which provides:
- Default registration arguments via `cpt_register_public_default_args()`
- WP_Query helpers (`get_query_basic_args()`, `get_query_terms_args()`, etc.)
- Permission checking for save operations
- Custom title placeholders

### Taxonomies

Each animal type has separate taxonomies (max 20 characters per taxonomy slug):
- **Breed**: `as_breed_dog`, `as_breed_cat`
- **Status**: `as_status_dog`, `as_status_cat` (e.g., "In Adoption", "Lost/Found")
- **Size**: `as_size_dog`, `as_size_cat`
- **Color**: `as_color_dog`, `as_color_cat`
- **Energy**: `as_energy_dog`, `as_energy_cat`

All taxonomies extend `Animalshelter_Taxonomy` base class (admin/class-animalshelter-taxonomy.php) which provides:
- Label generators (`get_taxonomies_breed_labels()`, `get_taxonomies_status_labels()`, etc.)
- Default registration arguments via `taxonomy_register_public_default_args()`
- Term query helpers

### Constants

All plugin constants are defined in `animalshelter_constants()` function in the main plugin file:
- `ANIMALSHELTER_VERSION` - Current plugin version (SemVer)
- `ANIMALSHELTER_PREFIX` - Plugin prefix for hooks/handles (`animalshelter`)
- `ANIMALSHELTER_PLUGIN_DIR` - Absolute path to plugin directory
- `ANIMALSHELTER_PLUGIN_ADMIN_DIR` - Absolute path to admin directory
- `ANIMALSHELTER_PLUGIN_PUBLIC_DIR` - Absolute path to public directory
- `ANIMALSHELTER_PLUGIN_INCLUDES_DIR` - Absolute path to includes directory
- `ANIMALSHELTER_PLUGIN_URL` - URL to plugin directory

Content-specific constants are defined in `Animalshelter->contentConstants()` method.

### Data Files

Predefined data for breeds and sizes are in `includes/`:
- `includes/breed/class-animalshelter-breed-dog.php` - Large array of dog breeds (~900+ breeds)
- `includes/breed/class-animalshelter-breed-cat.php` - Array of cat breeds
- `includes/size/class-animalshelter-size-dog.php` - Dog size definitions
- `includes/size/class-animalshelter-size-cat.php` - Cat size definitions

### Flush Rewrite Rules Pattern

The plugin uses a flag-based approach to flush rewrite rules only when needed:
- On plugin upgrade (in `upgrader()` method), the flag `ANIMALSHELTER_flush_rewrite_rules_flag` is deleted
- In `Animalshelter_Admin->flush_rewrite_rules()`, if flag is not set, flush rules and set flag
- This prevents unnecessary rewrite rule flushing on every page load

## Development Commands

### Code Quality

Run PHP_CodeSniffer to check WordPress coding standards:
```bash
vendor/bin/phpcs
```

The project uses WordPress Coding Standards with the following configuration (.phpcs.xml.dist):
- Standard: WordPress
- PHP Compatibility: 8.0+
- Minimum WP Version: 6.1
- Text Domain: `animal-shelter`
- Prefix: `animalshelter`

### Dependencies

Install development dependencies:
```bash
composer install
```

Development dependencies include:
- PHP_CodeSniffer with WordPress Coding Standards
- PHPCompatibility checkers
- eduardovillao/wp-since for @since tag validation

### Release

Create a distributable ZIP file:
```bash
./bin/release.sh <version>
```

Example:
```bash
./bin/release.sh 1.0.0
```

This creates `animal-shelter-<version>.zip` in the parent directory (wp-content/plugins/), excluding all development files listed in `.distignore` plus `.claude/`, `.codex/`, and `CLAUDE.md`.

## Translation

- Text Domain: `animal-shelter`
- All translatable strings use this text domain
- POT files are in `languages/` directory
- Always use proper WordPress i18n functions: `__()`, `_e()`, `_x()`, `esc_html__()`, etc.
- Breed names use `_x()` with context "Breed of a dog" or "Breed of a cat"

## Key Patterns

### Adding a New Animal Type

To add a new animal type (e.g., birds):
1. Define CPT constant in `Animalshelter->contentConstants()`
2. Create CPT class extending `Animalshelter_Cpt` in `admin/class-animalshelter-cpt-{animal}.php`
3. Define taxonomy constants for the new animal type
4. Create taxonomy classes extending `Animalshelter_Taxonomy`
5. Require and initialize classes in `Animalshelter_Admin->includes()` and `Animalshelter_Admin->inits()`
6. Create corresponding public classes in `public/` directory
7. Add breed/size data files in `includes/breed/` and `includes/size/`

### Plugin Lifecycle

- **Activation**: `animalshelter_activate()` calls `Animalshelter_Activator::activate()`
- **Deactivation**: `animalshelter_deactivate()` calls `Animalshelter_Deactivator::deactivate()`
- **Uninstall**: Handled by `uninstall.php` (runs on plugin deletion)

### Version Updates

The `Animalshelter->upgrader()` method handles version migrations:
- Compares stored version with `ANIMALSHELTER_VERSION`
- Deletes flush rewrite rules flag on upgrades
- Update version stored in `ANIMALSHELTER_version` option

## WordPress Compatibility

- Requires WordPress: 6.6+
- Tested up to: 6.9
- Requires PHP: 7.4+
- All CPTs and taxonomies support Block Editor (Gutenberg) via `show_in_rest => true`

## PHP Compatibility Notes

The plugin uses **typed properties** (PHP 7.4+ feature) throughout the codebase:
- `public string $property`
- `private array $data`

This means PHP 7.4 is the minimum supported version. For details on compatibility and potential downgrades to PHP 7.2, see `docs/COMPATIBILITY.md`.

## Documentation

Additional technical documentation is available in the `docs/` folder:
- **ARCHITECTURE.md**: Detailed architecture, design patterns, initialization flow
- **COMPATIBILITY.md**: PHP/WordPress compatibility analysis
- **TESTING.md**: Testing procedures and quality assurance
- **VERSIONING.md**: Version control policy and changelog

The `docs/` folder is excluded from production releases.

## Project Context

This is a do_action community project from WordPress Granada (Spain) to help animal shelters manage adoptable animals. See README.md for the full project vision including planned features for user registration, adoption forms, volunteer management, and donations.
