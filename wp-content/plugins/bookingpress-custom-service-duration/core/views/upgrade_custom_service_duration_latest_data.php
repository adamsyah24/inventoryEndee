<?php
global $wpdb, $BookingPress, $bookingpress_custom_service_duration;
$bookingpress_new_custom_service_duration_version = '1.5';
update_option( 'bookingpress_custom_service_duration_version', $bookingpress_new_custom_service_duration_version );
update_option( 'bookingpress_custom_service_duration_updated_date_' . $bookingpress_new_custom_service_duration_version, current_time('mysql') );