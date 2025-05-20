<?php get_header(); ?>
<header class="header">
    <h1 class="entry-title" itemprop="name"><?php single_term_title(); ?></h1>
<!-- <div class="archive-meta" itemprop="description"><?php if ( '' != get_the_archive_description() ) { echo esc_html( get_the_archive_description() ); } ?></div> -->
</header>
<section class="product_cat">
    <div class="card__wrapper max-wrapper__narrow">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        $imgSrc = get_the_post_thumbnail_url();
    ?>
        <div class="product_cat--item card">
            <a href="<?php the_permalink() ?>" style="background:url(<?php echo $imgSrc; ?>);background-size:cover;background-position:center;" class="card--link">
                <div class="card--name">
                    <h3><?php the_title(); ?></h3>
                </div>            
            </a>
        </div>
    <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>