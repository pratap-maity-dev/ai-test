<?php
/**
 * Activation behavior.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

namespace WpAiTest\Infrastructure;

use WpAiTest\Settings\OptionsRepository;

/**
 * Performs activation tasks.
 */
final class Activator {
	/**
	 * Add default options when the plugin is first activated.
	 */
	public function activate(): void {
		if (false === get_option(OptionsRepository::OPTION_NAME, false)) {
			add_option(OptionsRepository::OPTION_NAME, OptionsRepository::DEFAULT_OPTIONS);
		}

		flush_rewrite_rules();
	}
}
