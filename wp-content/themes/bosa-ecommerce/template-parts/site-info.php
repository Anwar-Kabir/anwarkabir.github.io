<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Ecommerce 1.0.0
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-ecommerce' ) ) );
		echo esc_html( date( 'Y' ) );
		printf( esc_html__( ' Bosa Ecommerce. Powered by', 'bosa-ecommerce' ) );
	?>
	<a href="<?php echo esc_url( __( '//bosathemes.com', 'bosa-ecommerce' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'Bosa Themes', 'bosa-ecommerce' ) );
		?>
	</a>
</div><!-- .site-info -->