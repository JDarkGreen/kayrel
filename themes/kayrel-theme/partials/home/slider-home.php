<?php  
/*
 * Plantila Slider Home modificado para trabajar con libreria 
 * SLIDER REVOLUTION
 */

	// The Query
	$args = array(
    'post_status'    => 'publish',
    'post_type'      => 'theme-slider-home',
    'posts_per_page' => -1,
    'meta_key'       => 'mbox_order_post',
    'order'          => 'ASC',
    'orderby'        => 'meta_value_num',
	);

	$the_query = new WP_Query( $args );

  /*
   * Página Nosotros
   */
  $page_nosotros = get_page_by_title('nosotros');
  $page_nosotros_link = !empty($page_nosotros) ? get_permalink($page_nosotros->ID) : '#';


	// The Loop
	if ( $the_query->have_posts() ) : 
?>

<!-- START REVOLUTION SLIDER 5.0 -->
<div class="rev_slider_wrapper">
	
	<div id="carousel-home" class="slider rev_slider manual" data-version="5.0">
  		
  		<ul style="padding: 0; margin: 0; list-style-type: none;"> 

  			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

  			<?php  
  				/*
  				 * Obtener metabox de efecto de transición para el slider
  				 */
  				$mb_transition = get_post_meta( get_the_ID() , 'mb_rev_slider_select' , true );

  				$mb_transition = !empty($mb_transition) ? $mb_transition : 'notransition';
  			
  				/*
  				 * Ruta Imagen destacada
  				 */
  				$feat_img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
  			?>	
   			
   			<li data-transition="<?= $mb_transition; ?>"> 
     			
     			<!-- MAIN IMAGE -->
				<img src="<?= $feat_img ?>"  alt=""  width="1920" height="1080" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />

     			<!-- LAYER NR -->
     			<div class="tp-caption Concept-Title tp-resizeme rs-parallaxlevel-2 skrollable skrollable-between" data-x="[950,20]" data-hoffset="['0','0','0','0']" data-y="[250,50]" data-voffset="['0','0','0','0']" data-width="[575,'none','none','none']" data-height="none" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="x:left(R);s:1000;e:Power3.easeIn;" data-start="800" data-splitin="none" data-splitout="none" data-responsive_offset="off">
     				
     				<!-- Container Text -->
     				<div class="contentTextSlider">
     					
              <h2 class="text-uppercase text-xs-center"><?= get_the_title(); ?></h2>

     					<h3><?= get_the_content(); ?></h3>

     					<!-- Botón a Nosotros -->
     					<a id="btn-slider-home" href="<?= $page_nosotros_link; ?>" class="text-uppercase text-xs-center d-block">
     						<?= __( 'mira nuestros productos' , LANG ); ?>
                <i class="fa fa-caret-right" aria-hidden="true"></i>
     					</a>

     				</div> <!-- /.contentTextSlider -->

     			</div>

   			</li> <!-- /end li -->

   			<?php endwhile; ?>

  		</ul>  <!-- /end ul -->
	
	</div><!-- END REVOLUTION SLIDER -->

</div><!-- END OF SLIDER WRAPPER -->


<?php endif; wp_reset_postdata(); ?>