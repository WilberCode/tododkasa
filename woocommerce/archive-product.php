<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

?> 
<div class="grid grid-cols-2 gap-4 sm:gap-6 max-w-front m-auto ">
<?php   
	if( is_product_taxonomy() ){  
		$current_eixo = get_queried_object_id();

		$args = array(
			'taxonomy' => 'pwb-brand',
			'exclude' => $current_eixo
		);
         $brands = get_terms($args); 
            foreach( $brands as $brand ) {
               $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
               $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_name', true );  ?>     
				<a   href="<?=get_site_url().'/marca/'.$brand->slug ?>" class=" py-6 sm:py-14 md:py-20  px-6 sm:px-10 text-center bg-primary-500 text-white" >
					<h2  class="text-center text-sm sm:text-2xl  uppercase font-semibold " > VER MÁS <?php echo  $brand->name; ?> </h2>
				</a>     
		<?php } ?>  
	<?php } else { ?>   
	<?php } ?>   
</div> 

<?php   
	if( is_product_taxonomy() ){
		$brands = wp_get_post_terms( get_the_ID(), 'pwb-brand' ); 
		foreach( $brands as $brand ) {
			$attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
			$attachment_src = wp_get_attachment_image_src( $attachment_id,'full' );
			$brand_banner_id = get_term_meta($brand->term_id, 'pwb_brand_banner', true);
			$brand_banner_src = wp_get_attachment_image_src( $brand_banner_id,'full' ); ?>  
		<?php }?> 
		<!-- Banner marca --> 
			<div class="max-w-front m-auto mb-10 mt-4"> 
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="woocommerce-products-header__title page-title text-center hidden"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
				<img src="<?=$brand_banner_src[0]?>" alt="<?php woocommerce_page_title() ?>">
			 </div> 
	 
	<?php } else { ?>  
		<div class="mb-12  " > 
			<?php//  dynamic_sidebar('banner-archive-product') ?>
		</div>
	<?php } ?>   

<!-- Productos -->
<div  class="max-w-products-grid m-auto pb-10 px-4 xl:px-0   " > 
<?php
if ( woocommerce_product_loop() ) { 
	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );?>
</div>
<?php 

get_footer( 'shop' );
