<?php
/**
 * Plugin uninstall cleanup.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

delete_option('wp_ai_test_options');
