<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

get_header();
?>
<div class="container py-4">
  <h1 class="_title title_main">
    <?php the_title(); ?>
  </h1>
  <div class="row mt-4">
    <?php if( have_rows('realty_images') ): ?>
    <div class="col-12 col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php $i=0; while( have_rows('realty_images') ) : the_row(); $i++; ?>
          <div class="carousel-item <?php if ($i==1) echo "active"; ?>"> <img src="<?php echo get_sub_field('realty_image'); ?>" class="d-block w-100" alt="..."> </div>
          <?php endwhile; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Предыдущий</span> </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Следующий</span> </button>
      </div>
      <?php endif; ?>
    </div>
    <div class="col-12 col-md-6 pb-2">
      <?php if (get_field("realty_type")): $term = get_field("realty_type"); ?>
      <div class="d-flex justify-content-between"><span>Тип недвижимости:</span><span><strong>
        <?php echo esc_html( $term->name ); ?>
        </strong></span></div>
      <?php endif; ?>
	  <?php if (get_field("realty_town")): ?>
		
<?php
      $args2 = array(
        'posts_per_page' => 100,
        'post_type' => 'town',
        'title' => get_field( "realty_town" )
      );
      $link = '';
      $recent_posts_array = get_posts( $args2 );
      foreach ( $recent_posts_array as $recent_post_single ):
        $link = get_permalink( $recent_post_single );
      endforeach;
      ?>		
		
      <div class="d-flex justify-content-between"><span>Город:</span><span><strong>
        <?php if ($link) echo '<a href="'.$link.'">'.get_field("realty_town").'</a>'; else echo get_field("realty_town"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_address")): ?>
      <div class="d-flex justify-content-between"><span>Адрес:</span><span><strong>
        <?=get_field("realty_address"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_area")): ?>
      <div class="d-flex justify-content-between"><span>Площадь:</span><span><strong>
        <?=get_field("realty_area"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_living_area")): ?>
      <div class="d-flex justify-content-between"><span>Жилая площадь:</span><span><strong>
        <?=get_field("realty_living_area"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_floor")): ?>
      <div class="d-flex justify-content-between"><span>Этаж:</span><span><strong>
        <?=get_field("realty_floor"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_price")): ?>
      <div class="d-flex justify-content-between"><span>Стоимость:</span><span><strong>
        <?=get_field("realty_price"); ?>
        </strong></span></div>
      <?php endif; ?>

    </div>
	<div class="col-12">
      <?php if (get_field("realty_description")): ?>
      <div class=""><?=get_field("realty_description"); ?></div>
      <?php endif; ?>		
	</div>	
  </div>
	
				<?php
the_content();
				?>
	
</div>


<?php
get_footer();
