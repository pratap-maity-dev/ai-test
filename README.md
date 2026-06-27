# WP AI Test

A production-ready custom WordPress plugin scaffold using modern OOP, Composer, PSR-4, WordPress Coding Standards, PHPUnit, and GitHub Actions.

## Requirements

- PHP 8.1+
- WordPress 6.5+
- Composer 2+

## Install

```bash
composer install --no-dev --optimize-autoloader
```

Place this directory in `wp-content/plugins/wp-ai-test` and activate **WP AI Test** from the WordPress admin.

## Development

```bash
composer install
composer ci
```

Available scripts:

- `composer lint` checks PHP syntax.
- `composer phpcs` runs WordPress Coding Standards and PHP compatibility checks.
- `composer phpcbf` auto-fixes supported coding standards issues.
- `composer test` runs PHPUnit.

## Structure

```text
wp-ai-test.php       Plugin bootstrap.
src/                 Production PHP classes, PSR-4 autoloaded under WpAiTest\.
tests/               PHPUnit tests.
.github/workflows/  GitHub Actions CI.
```

## REST API

```http
GET /wp-json/wp-ai-test/v1/status
```

Returns the plugin version and enabled state.
