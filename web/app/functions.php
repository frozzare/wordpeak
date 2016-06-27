<?php

apply_filters( 'wordpeak_theme_info', function ( $info ) {
	return array_merge( $info, ['Name' => 'App'] );
} );
