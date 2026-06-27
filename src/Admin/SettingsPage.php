<?php
/**
 * Admin settings page.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

namespace WpAiTest\Admin;

use WpAiTest\Settings\OptionsRepository;

/**
 * Registers and renders the plugin settings page.
 */
final class SettingsPage {
	public const PAGE_SLUG = 'wp-ai-test';

	public function __construct( private readonly OptionsRepository $options_repository ) {}

	/**
	 * Register admin hooks.
	 */
	public function register(): void {
		add_action('admin_menu', [$this, 'add_options_page']);
		add_action('admin_init', [$this, 'register_settings']);
	}

	/**
	 * Add the settings page under Settings.
	 */
	public function add_options_page(): void {
		add_options_page(
			__('WP AI Test', 'wp-ai-test'),
			__('WP AI Test', 'wp-ai-test'),
			'manage_options',
			self::PAGE_SLUG,
			[$this, 'render']
		);
	}

	/**
	 * Register plugin settings.
	 */
	public function register_settings(): void {
		register_setting(
			self::PAGE_SLUG,
			OptionsRepository::OPTION_NAME,
			[
				'type'              => 'array',
				'sanitize_callback' => [$this->options_repository, 'sanitize'],
				'default'           => OptionsRepository::DEFAULT_OPTIONS,
			]
		);

		add_settings_section(
			'wp_ai_test_main',
			__('General', 'wp-ai-test'),
			static function (): void {
				echo '<p>' . esc_html__('Configure WP AI Test.', 'wp-ai-test') . '</p>';
			},
			self::PAGE_SLUG
		);

		add_settings_field(
			'enabled',
			__('Enable feature', 'wp-ai-test'),
			[$this, 'render_enabled_field'],
			self::PAGE_SLUG,
			'wp_ai_test_main'
		);
	}

	/**
	 * Render the enabled setting.
	 */
	public function render_enabled_field(): void {
		$options = $this->options_repository->get();
		$name    = OptionsRepository::OPTION_NAME . '[enabled]';

		printf(
			'<label><input type="checkbox" name="%1$s" value="1" %2$s> %3$s</label>',
			esc_attr($name),
			checked(true, $options['enabled'], false),
			esc_html__('Turn on the sample feature.', 'wp-ai-test')
		);
	}

	/**
	 * Render settings screen.
	 */
	public function render(): void {
		if ( ! current_user_can('manage_options')) {
			wp_die(esc_html__('You do not have permission to access this page.', 'wp-ai-test'));
		}

		echo '<div class="wrap">';
		echo '<h1>' . esc_html__('WP AI Test', 'wp-ai-test') . '</h1>';
		echo '<form method="post" action="options.php">';
		settings_fields(self::PAGE_SLUG);
		do_settings_sections(self::PAGE_SLUG);
		submit_button();
		echo '</form>';
		echo '</div>';
	}
}
