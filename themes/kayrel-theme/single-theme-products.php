<?php  
/*
 * File: Single Theme Products
 * Despliega : El detalle de producto
 */

/*
 * Objeto Actual 
 */
$current_post = get_queried_object(); //var_dump($current_post);

/*
 * Opciones de Personalización
 */
$options = get_option("theme_settings");

/*
 * Obtener Galería de Imágenes
 */
$current_gallery =  get_gallery_post( $current_post->ID );

/*
 * Mostrar Header
 */
get_header(); ?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="wrapperLayoutPage">

		<div class="row">
			
			<!-- Contenido  -->
			<div class="col-xs-12 col-sm-8">

				<!-- Seccion detalle -->
				<article class="singleDetailProduct">
					
					<div class="row">
						
						<!-- Galería -->
						<div class="col-xs-12 col-sm-7">

						<?php if($current_gallery && count($current_gallery) > 1): 
							$first_image = $current_gallery[0]; ?>
						
						<div class="relative">

							<figure id="featured-image-carousel" class="featured-image">
								<img src="<?= $first_image->guid; ?>" data-zoom-image= <?= $first_image->guid; ?> alt="<?= $first_image->post_content; ?>" class="img-fluid elevatezoom-js"  />
							</figure> <!-- /. -->
	
							<!-- Espacios --> <br/>

							<!-- Contenedor Thumbnails Galería -->
							<div id="carousel-thumbnail-product" class="section__single_gallery js-carousel-gallery" data-items="4" data-items-responsive="1" data-margins="5" data-dots="false" data-autoplay="true">
								<?php  
									$i= 0; foreach ( $current_gallery as $item_img ) : 
									$item = get_post( $item_img  );  ?>
									
									<a href="#" class="js-change-image gallery_indicator <?= $i == 0 ? 'active' : ''  ?>" data-target="featured-image-carousel">
										<figure>
											<img src="<?= $item->guid; ?>" alt="<?= $item->post_name; ?>" class="img-fluid m-x-auto" />
										</figure>
									</a> <!-- /. -->

								<?php $i++; endforeach; ?>
							</div> <!-- /.carousel-thumbnail-product -->
							
						</div> <!-- /relative -->

						<?php else: ?>

							<figure class="featured-image">
								<?= get_the_post_thumbnail( $current_post->ID , 'full' , array('class'=>'img-fluid m-x-auto d-block') ); ?>
							</figure> <!-- /.featured-image -->

						<?php endif; ?>
							
						</div> <!-- /.col-xs-12 col-sm-7 -->

						<!-- Contenido -->
						<div class="col-xs-12 col-sm-5">
							
							<!-- Título de Producto -->
							<h2 class="productTitle text-uppercase"> 
							<?= $current_post->post_title; ?></h2>

							<!-- Código de Producto -->
							<h3 class="productCode">
							<?= get_post_meta( $current_post->ID , 'mb_code_product' , TRUE ); ?>
							</h3>  <br/>

							<h3 class="detailTitle text-capitalize">
							<?= __("Descripción:","LANG"); ?></h3>
							<?= apply_filters("the_content" , $post->post_content ); ?> 
							<br/>
							
							<h3 class="detailTitle text-capitalize">
							<?= __("Tallas:","LANG"); ?></h3>
							<p> <?= get_post_meta( $current_post->ID , 'mb_size_product' , TRUE ); ?> </p> <br/>

							<h3 class="detailTitle text-capitalize">
							<?= __("Colores:","LANG"); ?></h3>

							<?php  
							//Extraer metabox de colores 
							$mb_colors = get_post_meta( $current_post->ID , 'mb_colors_product' , true );

							if( $mb_colors && count($mb_colors) > 0 ) :?>

							<div class="row">

							<?php foreach($mb_colors as $item_color): ?>
								
								<div class="col-xs-12 col-sm-6">
								
								<div class="item-color">
									
									<!-- Icono -->
									<i style="background-color:<?= $item_color['color'] ?> !important;"></i>

									<!-- Nombre de Color -->
									<span><?= $item_color['text'] ?></span>

								</div> <!-- /.item-color -->

								</div> <!-- /.col-xs-12 col-sm-6 -->

							<?php endforeach; ?>

							</div> <!-- /.row -->

							<?php else: ?>

								<div class="alert alert-danger" role="alert">
									<strong>Ops!</strong> Colores no disponibles por el momento. Gracias!
								</div>

							<?php endif; ?>
							
							<!-- Espacios --> <br />

							<?php  
								$link_share = get_the_permalink( $current_post->ID );
								#Setear link title 
								$link_title = $current_post->post_title;
								#Plantilla
								if(stream_resolve_include_path('partials/single/shared-buttons.php'))
								include('partials/single/shared-buttons.php'); ?>

						</div> <!-- /.col-xs-12 col-sm-5 -->

					</div> <!-- /.row -->
					
				</article> <!-- /.singleDetailProduct -->

			</div> <!-- /.col-xs-12 col-sm-8 -->
			
			<!-- Sidebar -->
			<aside class="col-xs-12 col-sm-4">

				<?php  
				/*
				 * Incluir template de Categorias
				 */
				if(stream_resolve_include_path('partials/sidebar/categories-products.php'))
					include('partials/sidebar/categories-products.php'); ?>
				
			</aside> <!-- /.col-xs-12 col-sm-4 -->

		</div> <!-- /.row -->

	</div> <!-- /.wrapperLayoutPage -->

</main> <!-- /.pageWrapper -->



<?php
/*
 * Mostrar Footer
 */
get_footer(); ?>