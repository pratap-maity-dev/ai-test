<?php
/**
 * REST status endpoint.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

namespace WpAiTest\Rest;

use WpAiTest\Settings\OptionsRepository;
use WP_REST_Request;
use WP_REST_Response;

/**
 * Exposes basic plugin status through the WordPress REST API.
 */
final class StatusController {
	public const NAMESPACE = 'wp-ai-test/v1';
	public const ROUTE     = '/status';

	public function __construct( private readonly OptionsRepository $options_repository ) {}

	/**
	 * Register REST routes.
	 */
	public function register(): void {
		add_action('rest_api_init', [$this, 'register_routes']);
	}

	/**
	 * Register the status route.
	 */
	public function register_routes(): void {
		register_rest_route(
			self::NAMESPACE,
			self::ROUTE,
			[
				'methods'             => 'GET',
				'callback'            => [$this, 'get_status'],
				'permission_callback' => '__return_true',
			]
		);
	}

	/**
	 * Return plugin status.
	 *
	 * @param WP_REST_Request $request REST request.
	 */
	public function get_status( WP_REST_Request $request ): WP_REST_Response {
		$options = $this->options_repository->get();

		return new WP_REST_Response(
			[
				'enabled' => $options['enabled'],
				'route'   => $request->get_route(),
				'version' => '1.0.0',
			]
		);
	}
}
