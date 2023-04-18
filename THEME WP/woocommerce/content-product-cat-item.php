    <?php
        global $product;
        $term = $args['term'];
        $category = get_term( $term, 'product_cat' );
        $image_id = get_term_meta( $term, 'thumbnail_id', true );
        $image_url = wp_get_attachment_image_src( $image_id, 'full' );

    ?>
    <?php $target = get_template_directory_uri(); ?>

    <div class="category_item col-sm-6">
        <a href="<?php echo get_term_link( $term, 'product_cat' ); ?>">
        <?php if($image_id){?>
        <img class="img-fluid" src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php echo $category->name; ?>" />
        <?php } else {?>
        <img class="img-fluid" src="<?php echo $target; ?>/img/no-image.png" alt="<?php echo $category->name; ?>" />
        <?php } ?>
        <div class="category_text">
        <h4 class="category_title"><a href="<?php echo get_term_link( $term, 'product_cat' ); ?>" class="link"><?php echo $category->name; ?></a></h4>
        
        </div>
        </a>
    </div>