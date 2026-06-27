<?php
/**
 * Internationalization support.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

namespace WpAiTest;

/**
 * Loads plugin translations.
 */
final class I18n {
	/**
	 * Register translation loading.
	 */
	public function register(): void {
		add_action('init', [$this, 'load_textdomain']);
	}

	/**
	 * Load plugin text domain.
	 */
	public function load_textdomain(): void {
		load_plugin_textdomain(
			'wp-ai-test',
			false,
			dirname(plugin_basename(WP_AI_TEST_PLUGIN_FILE)) . '/languages'
		);
	}
}
