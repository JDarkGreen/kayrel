<?php 
/*
 * Template Taxonomia 
 */

$current_term = get_queried_object(); #var_dump($current_term );

/* 
 * Taxonomia actual
 */
$the_taxonomy = $current_term->taxonomy;

/*
 * Obtener padre 
 */
$ancestors  = get_ancestors( $current_term->term_id , $the_taxonomy );

/*
 * Si no tiene padre entonces este objeto es el padre
 */
$the_parent = count($ancestors) == 0 ? $current_term  : get_term_by( 'term_taxonomy_id' , end($ancestors) , $the_taxonomy );

/*
 * Obtener el term meta de imágenes para hacer carousel
 */
$this_images = get_term_meta( $the_parent->term_id , 'meta_images_taxonomy' , true );
$this_images = !empty($this_images) && $this_images !== '-1' ? $this_images : false;


/*
 * Obtener los items / productos de esta taxonomía
 */
$posts_per_page = 12;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
	'posts_per_page' => $posts_per_page,
	'post_status'    => 'publish',
	'post_type'      => 'theme-products',
	'paged'          => $paged,
	'order'          => 'ASC',
	'orderby'        => 'meta_value_num',
	'meta_key'       => 'mbox_order_post', 
	'tax_query' => array(
		array(
			'taxonomy' => $the_taxonomy,
			'field'    => 'slug',
			'terms'    => $current_term->slug,
		),
	),
);

//Query
$the_query = new WP_Query($args);


/*
 * Mostrar Header
 */
get_header();

/*
 * Opciones de Personalización
 */

$options = get_option("theme_settings"); ?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="wrapperLayoutPage">

		<?php 
		/*
		 * Incluir Banner Carousel de Taxonomía
		 */
		//Parámetros
		$title_banner = $current_term->name;

		if(stream_resolve_include_path('partials/pages/banner-top-taxonomy.php'))
		include('partials/pages/banner-top-taxonomy.php');  

		/*
		 * Incluir Breadcrumbs
		 */
		if(stream_resolve_include_path('partials/common-section/breadcrumbs.php'))
		include('partials/common-section/breadcrumbs.php'); 	?>
		
		<!-- Contenido -->
		<div class="wrapperProducts">

			<?php if($the_query->have_posts()): ?>

				<div class="flexible flexible-wrap align-items">

					<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
					
						<?php if( has_post_thumbnail() ): ?>
								<article class="itemProductPreview">

									<div class="bg-container">

										<figure>
											<?= get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>

										</figure> <!-- /figure -->

										<div class="content-info text-xs-center">
											<!-- Title -->
											<h2> <?= __( get_the_title() , LANG );  ?> </h2>
											
											<!-- Code Product -->
											<?php  
												$mb_code_product = get_post_meta( get_the_ID() , 'mb_code_product' , true );
												$mb_code_product = !empty($mb_code_product) ? $mb_code_product : ''; ?>
											<span class="product-code"> <?= $mb_code_product; ?> </span>	
										</div> <!-- /.content-info -->

									</div> <!-- /.bg-container -->

									<!-- Detalle de Producto -->
									<a href="<?= get_permalink(); ?>" class="btn-details-product text-xs-center">
									<?= __( 'detalles' , LANG ); ?>
									</a> <!-- /. -->					

								</article> <!-- /.itemProductPreview -->
						<?php endif; ?>				

					<?php endwhile; ?>

				</div> <!-- /.flexible flexible-wrap align-items -->

				<!-- Espacio -->
				<div class="d-block clearfix"></div>

				<!-- Paginación -->
				<section class="sectionPagination text-xs-center">

					<?php $max_pages = $the_query->max_num_pages; ?>
					
					<?php for( $i = 1 ; $i <= $max_pages ; $i++ ) { ?>
					
					<!-- Link -->
					<a href="<?= get_pagenum_link($i); ?>" class="<?= $paged == $i ? 'active' : '' ?>"> <?= $i ?></a>

					<?php } ?>
					
					<!-- Next -->
					<a href="<?= get_pagenum_link($paged+1); ?>" class="<?= $paged == $max_pages ? 'disabled' : '' ?>" role="button" aria-disabled="<?= $paged == $max_pages ? 'true' : '' ?>">
						<!-- Icon --><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</a>
					
				</section> <!-- /.sectionPagination -->
					
			<?php else: ?>

				<div class="alert alert-danger" role="alert">
					<h4 class="alert-heading"> Ops! Lo Sentimos </h4>
				  <p>Por el momento este contenido no se encuentra disponible o está en mantenimiento , puedes seguir consultando nuestras otras secciones. Gracias!</p>
				</div>

			<?php endif; ?>

		</div> <!-- /.wrapperProducts -->

	</div> <!-- /.wrapperLayoutPage -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>


