=== WP AI Test ===
Contributors: wp-ai-test
Tags: scaffold, oop, composer
Requires at least: 6.5
Tested up to: 6.6
Requires PHP: 8.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A production-ready custom WordPress plugin scaffold using OOP, Composer, PSR-4, WordPress Coding Standards, PHPUnit, and GitHub Actions.

== Description ==

WP AI Test provides a clean foundation for a custom plugin:

* Modern object-oriented PHP.
* Composer autoloading with PSR-4.
* Admin settings page.
* REST API status endpoint.
* PHPUnit unit tests.
* WordPress Coding Standards and PHP compatibility checks.
* GitHub Actions CI.

== Installation ==

1. Upload the plugin directory to `wp-content/plugins/wp-ai-test`.
2. Run `composer install --no-dev --optimize-autoloader` for production.
3. Activate the plugin in WordPress.

== Development ==

Run the full local quality suite:

`composer ci`

Run individual checks:

`composer lint`
`composer phpcs`
`composer test`

== REST API ==

The plugin registers:

`GET /wp-json/wp-ai-test/v1/status`

== Changelog ==

= 1.0.0 =
* Initial release.
