<?php
/**
 * Template Name: Недвижимость
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


get_header();

$container = get_theme_mod( 'understrap_container_type' );


$args = array(
  'posts_per_page' => 100,
  'post_type' => 'realty'
);

$the_query = new WP_Query( $args );

?>
<div class="container py-4">
  <h1 class="_title title_main">
    <?php the_title(); ?>
  </h1>
  <?php if( $the_query->have_posts() ): ?>
  <div class="row my-4">
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div class="col-12 col-md-4 pb-4"> <a href="<?php the_permalink(); ?>"> <img src="<?php have_rows('realty_images'); the_row(); echo get_sub_field('realty_image'); ?>" /> </a> </div>
    <div class="col-12 col-md-8 pb-4"> <a href="<?php the_permalink(); ?>">
      <h2>
        <?php the_title();?>
      </h2>
      </a>
      <?php if (get_field("realty_type")): $term = get_field("realty_type"); ?>
      <div class="d-flex justify-content-between"><span>Тип недвижимости:</span><span><strong><?php echo esc_html( $term->name ); ?> </strong></span></div>
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
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
  <?php
  wp_reset_query();
  ?>
</div>
<?php
the_content();
?>
</div>
<?php

get_footer();
