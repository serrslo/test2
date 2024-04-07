<?php
/**
 * The template for displaying all single posts Realty
 */

get_header();
?>
<div class="container py-4">
  <h1 class="_title title_main"> <?php echo $town=get_the_title(); ?> </h1>
  <div class="row my-4">
    <div class="col-12 col-md-6 mb-3"> <img src="<?php the_field('town_image'); ?>" /> </div>
    <div class="col-12 col-md-6 mb-3">
      <p>
        <?php the_field('town_description'); ?>
      </p>
    </div>
  </div>
  <h2>Недвижимость города</h2>
  <?php

  $args = array(
    'posts_per_page' => 5,
    'post_type' => 'realty',
    'meta_query' => array(
      array(
        'key' => 'realty_town',
        'value' => $town
      )
    )
  );

  $the_query = new WP_Query( $args );

  ?>
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
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
  <?php
  wp_reset_query();
  ?>
</div>
<?php
get_footer();
