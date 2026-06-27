<?php
/**
 * Option persistence.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

namespace WpAiTest\Settings;

/**
 * Reads and sanitizes plugin options.
 */
final class OptionsRepository {
	public const OPTION_NAME = 'wp_ai_test_options';

	public const DEFAULT_OPTIONS = [
		'enabled' => false,
	];

	/**
	 * Get normalized plugin options.
	 *
	 * @return array{enabled: bool}
	 */
	public function get(): array {
		$options = get_option(self::OPTION_NAME, self::DEFAULT_OPTIONS);

		if ( ! is_array($options)) {
			return self::DEFAULT_OPTIONS;
		}

		return $this->sanitize($options);
	}

	/**
	 * Sanitize option input.
	 *
	 * @param mixed $input Raw option input.
	 *
	 * @return array{enabled: bool}
	 */
	public function sanitize( mixed $input ): array {
		if ( ! is_array($input)) {
			return self::DEFAULT_OPTIONS;
		}

		return [
			'enabled' => isset($input['enabled']) && filter_var($input['enabled'], FILTER_VALIDATE_BOOLEAN),
		];
	}
}
