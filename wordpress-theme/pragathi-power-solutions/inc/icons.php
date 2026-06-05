<?php
/**
 * Inline SVG icon helper. Ported 1:1 from the original icon set.
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return an inline SVG icon string.
 *
 * @param string $name  Icon key.
 * @param int    $size  Pixel size.
 * @param string $class Optional CSS class.
 * @return string
 */
function pps_icon_svg( $name, $size = 24, $class = '' ) {
	$paths = array(
		'sun'         => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>',
		'panel'       => '<path d="M3 14l2-9h14l2 9H3z"/><path d="M3 14h18M8 5l-1 9M16 5l1 9M12 5v9"/><path d="M10 14v3h4v-3M12 17v3"/>',
		'thermal'     => '<path d="M12 2a3 3 0 0 0-3 3v9.5a4.5 4.5 0 1 0 6 0V5a3 3 0 0 0-3-3z"/><path d="M12 8v6.5"/><circle cx="12" cy="17" r="1.5"/>',
		'streetlight' => '<path d="M9 3h6l-1 6h-4z"/><path d="M12 9v12"/><path d="M8 21h8"/><path d="M3 6l3-1M21 6l-3-1"/>',
		'fence'       => '<path d="M3 21V8l3-3 3 3v13M9 21V8l3-3 3 3v13M15 21V8l3-3 3 3v13"/><path d="M3 12h18M3 16h18"/>',
		'pump'        => '<path d="M5 12h6v8H5zM11 14h4l3-4h-4z"/><circle cx="8" cy="16" r="1.5"/><path d="M14 4v6M11 7h6"/>',
		'wrench'      => '<path d="M14.7 6.3a4 4 0 0 1 5 5l-2 2-3-3 2-2-2-2zM3 21l9-9M5 19l3 3 9-9-3-3z"/>',
		'rupee'       => '<path d="M7 5h10M7 9h10M9 5c4 0 4 8 0 8h-2l8 8"/>',
		'leaf'        => '<path d="M20 4c0 9-7 14-13 14h-2v-2c0-6 5-13 14-13z"/><path d="M5 18C9 14 14 9 20 4"/>',
		'tree'        => '<path d="M12 3L8 9h2.5L7 14h10l-3.5-5H16z"/><path d="M12 14v6"/><path d="M9.5 20h5"/>',
		'bolt'        => '<path d="M13 2L5 13h5l-1 9 8-12h-5z"/>',
		'globe'       => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a14 14 0 0 1 0 18"/><path d="M12 3a14 14 0 0 0 0 18"/>',
		'battery'     => '<rect x="3" y="7" width="16" height="10" rx="2"/><path d="M19 11h2v2h-2zM7 7V5h4v2M11 12l-2 3h3l-2 3"/>',
		'gift'        => '<rect x="3" y="9" width="18" height="12" rx="1"/><path d="M3 13h18M12 9v12"/><path d="M8 9c-2 0-3-3-1-4s4 4 4 4M16 9c2 0 3-3 1-4s-4 4-4 4"/>',
		'home'        => '<path d="M3 11l9-8 9 8v9a2 2 0 0 1-2 2h-4v-7h-6v7H5a2 2 0 0 1-2-2z"/>',
		'shield'      => '<path d="M12 2l8 3v7c0 5-4 9-8 10-4-1-8-5-8-10V5z"/><path d="M9 12l2 2 4-4"/>',
		'scale'       => '<path d="M12 3v18M3 7h18M6 7l-3 6h6zM18 7l-3 6h6z"/>',
		'rocket'      => '<path d="M14 4c4 1 6 3 7 7-4-1-7 1-9 3l-4-4c2-2 4-5 6-6z"/><path d="M9 14l-3 3 3 1 1 3 3-3M14 9a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/>',
		'mute'        => '<path d="M11 5L6 9H3v6h3l5 4V5z"/><path d="M16 9l5 6M21 9l-5 6"/>',
		'trending'    => '<path d="M3 17l6-6 4 4 8-8"/><path d="M14 7h7v7"/>',
		'phone'       => '<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>',
		'mail'        => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
		'pin'         => '<path d="M12 22s8-7 8-13a8 8 0 1 0-16 0c0 6 8 13 8 13z"/><circle cx="12" cy="9" r="3"/>',
		'clock'       => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
		'arrow-right' => '<path d="M5 12h14M13 5l7 7-7 7"/>',
		'check'       => '<path d="M5 12l4 4L19 7"/>',
		'menu'        => '<path d="M4 6h16M4 12h16M4 18h16"/>',
		'close'       => '<path d="M6 6l12 12M6 18L18 6"/>',
		'plus'        => '<path d="M12 5v14M5 12h14"/>',
	);

	// Filled icons render differently (no stroke).
	$filled = array(
		'star'      => '<path d="M12 2l2.9 6.9L22 10l-5 4.9 1.2 7.1L12 18.6 5.8 22 7 14.9 2 10l7.1-1.1z"/>',
		'whatsapp'  => '<path d="M17.5 14.4c-.3-.1-1.7-.8-2-.9-.3-.1-.5-.1-.7.1l-1 1.2c-.2.2-.4.3-.7.1-.9-.4-1.7-.9-2.4-1.7-.6-.7-1.2-1.5-1.6-2.4-.2-.3 0-.5.1-.7l.7-.8c.2-.2.2-.4.1-.6L8.7 6.3c-.1-.3-.4-.4-.7-.4H7c-.3 0-.7.1-.9.3-.5.5-1.1 1.2-1.1 2.5.1 1.5.6 2.9 1.5 4.1 1.6 2.3 3.6 4.2 6.1 5.4.7.3 1.3.5 1.9.6.7.2 1.3.2 1.9.1.7-.1 1.7-.7 2-1.4.3-.6.3-1.2.2-1.4-.1-.2-.3-.3-.6-.4z"/><path d="M20 4A10 10 0 0 0 4 16l-2 6 6.2-1.6A10 10 0 1 0 20 4zm-8 18a8 8 0 0 1-4-1.1l-.3-.2-3.7 1 1-3.6-.2-.4A8 8 0 1 1 12 22z"/>',
		'facebook'  => '<path d="M22 12a10 10 0 1 0-11.6 9.9V15h-2.5v-3h2.5V9.8c0-2.5 1.5-3.8 3.7-3.8 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.6V12h2.7l-.4 3h-2.3v6.9A10 10 0 0 0 22 12z"/>',
	);

	$class_attr = $class ? ' class="' . esc_attr( $class ) . '"' : '';

	if ( isset( $filled[ $name ] ) ) {
		return '<svg width="' . (int) $size . '" height="' . (int) $size . '" viewBox="0 0 24 24" fill="currentColor" stroke="none"' . $class_attr . ' aria-hidden="true" focusable="false">' . $filled[ $name ] . '</svg>';
	}

	// Special-case icons that mix fill within an outline base.
	if ( 'instagram' === $name ) {
		return '<svg width="' . (int) $size . '" height="' . (int) $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"' . $class_attr . ' aria-hidden="true" focusable="false"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.8" fill="currentColor"/></svg>';
	}
	if ( 'youtube' === $name ) {
		return '<svg width="' . (int) $size . '" height="' . (int) $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"' . $class_attr . ' aria-hidden="true" focusable="false"><rect x="2" y="6" width="20" height="12" rx="3"/><path d="M10 9l5 3-5 3z" fill="currentColor" stroke="none"/></svg>';
	}

	$d = isset( $paths[ $name ] ) ? $paths[ $name ] : $paths['sun'];
	return '<svg width="' . (int) $size . '" height="' . (int) $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"' . $class_attr . ' aria-hidden="true" focusable="false">' . $d . '</svg>';
}

/** Echo helper. */
function pps_icon( $name, $size = 24, $class = '' ) {
	echo pps_icon_svg( $name, $size, $class ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted static SVG markup.
}
