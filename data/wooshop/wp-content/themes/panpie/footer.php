<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
</div><!--#content-->

<footer>
	<div id="footer-<?php echo esc_attr( PanpieTheme::$footer_style ); ?>" class="footer-area">
		<?php
			get_template_part( 'template-parts/footer/footer', PanpieTheme::$footer_style );
		?>
	</div>
</footer>
</div>
<?php wp_footer();?>
</body>
</html>