<?php
/**
 * Template Name: Города
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


get_header();

$container = get_theme_mod( 'understrap_container_type' );


$args = array(
  'posts_per_page' => 100,
  'post_type' => 'town',
);


$the_query = new WP_Query( $args );

?>
<div class="container py-4">
  <h1 class="_title title_main">
    <?php the_title(); ?>
  </h1>
  <div class="row mt-4">
    <?php if( $the_query->have_posts() ): ?>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div class="col-12 col-md-6 mb-3"> <a href="<?php the_permalink(); ?>"> <img src="<?php the_field('town_image'); ?>" /> </a> </div>
    <div class="col-12 col-md-6 mb-3"> <a href="<?php the_permalink(); ?>">
      <h2>
        <?php the_title();?>
      </h2>
      </a>
      <p>
        <?php the_field('town_description'); ?>
      </p>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <?php
  wp_reset_query();
  ?>
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
    <div class="col-12 col-md-6">
      <?php if (get_field("realty_type")): $term = get_field("realty_type"); ?>
      <div class="d-flex justify-content-between"><span>Тип недвижимости:<strong></span><span> <?php echo esc_html( $term->name ); ?> </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_town")): ?>
      <div class="d-flex justify-content-between"><span>Город:<strong></span><span>
        <?=get_field("realty_town"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_address")): ?>
      <div class="d-flex justify-content-between"><span>Адрес:<strong></span><span>
        <?=get_field("realty_address"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_area")): ?>
      <div class="d-flex justify-content-between"><span>Площадь:<strong></span><span>
        <?=get_field("realty_area"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_living_area")): ?>
      <div class="d-flex justify-content-between"><span>Жилая площадь:<strong></span><span>
        <?=get_field("realty_living_area"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_floor")): ?>
      <div class="d-flex justify-content-between"><span>Этаж:<strong></span><span>
        <?=get_field("realty_floor"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_price")): ?>
      <div class="d-flex justify-content-between"><span>Стоимость:<strong></span><span>
        <?=get_field("realty_price"); ?>
        </strong></span></div>
      <?php endif; ?>
      <?php if (get_field("realty_description")): ?>
      <div class="pt-3">
        <?=get_field("realty_description"); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php
  the_content();
  ?>
</div>
<?php

get_footer();
