<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Posh Industries
 * @subpackage THEME NAME
 * @since VERSIONING
 */
?>

		<?php
		/*if(is_active_sidebar('sidebar-footer')) {
			dynamic_sidebar('sidebar-footer');
		}*/
		?>

	</div> <!-- #wrapper -->
	    <div class="footer-clear"></div>
	<footer class="row no-max pad">            
	  <p>Copyright <?php echo date('Y'); ?></p>
	</footer>

	<?php wp_footer(); ?>
	
  </body>
</html>