<?php
/**
 * Taken from :https://gist.github.com/NateWr/00ee083db4d357aeab68
 * Author: Theme of the Crop
 * Author URI: http://themeofthecrop.com
 * License:     GNU General Public License v2.0 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
if ( ! defined( 'ABSPATH' ) )
	exit;
/**
 * Automatically confirm new bookings when they are added to the
 * database.
 */
add_filter( 'rtb_insert_booking_data', 'rtbcnb_confirm_new_bookings', 10, 2 );
function rtbcnb_confirm_new_bookings( $args, $booking ) {
	
	if ( empty( $booking->ID ) ) {
		$args['post_status'] = 'confirmed';
	}
	return $args;
}