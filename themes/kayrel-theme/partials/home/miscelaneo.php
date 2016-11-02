<?php  
/*
 * Plantila Miscelaneo Incluye:
 * - Catalogo
 * - Facebook
 */
?>

<section id="sectionMiscelaneo">
	
	<!-- Wrapper Layout -->
	<div class="wrapperLayoutPage">

		<div class="flexible align-items">
	
			<!-- Catálogo -->
			<div class="itemMiscelaneo relative">
				
				<?php 
					//Si Existe Catalogo
				if( isset($options['theme_meta_brochure']) && !empty($options['theme_meta_brochure']) ) : ?>

					<img src="<?= IMAGES ?>/backgrounds/fondo_catalogo.jpg" alt="<?= get_bloginfo('name') ?>" class="img-fluid m-x-auto d-block" />

				<?php endif; ?>
				
			</div> <!-- /.itemMiscelaneo -->
			
			<!-- Facebook -->
			<div class="itemMiscelaneo">

				<?php 
				//Si Existe Facebook
				if( isset($options['theme_meta_brochure']) && !empty($options['theme_meta_brochure']) ) 
					include('/../common-section/fan-page-facebook.php'); 
				?>
				
			</div> <!-- /.itemMiscelaneo -->	

		</div> <!-- /.flexible align-items -->
		
	</div> <!-- /.wrapperLayoutPage -->

</section> <!-- /.sectionMiscelaneo -->