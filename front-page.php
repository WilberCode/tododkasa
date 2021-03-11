<?php
/*
Template Name: Home
Template Post Type: post, page, event
*/ 
get_header();?>
<?php $file = './tailwind.js';?>   
 
<div class=" px-0">
<div class="max-w-front m-auto">
 	<?php  dynamic_sidebar('home-banner-main') ?> 
</div>  
</div> 
 
 
<div class="max-w-marcas m-auto ">
   <div  class=" marcas grid grid-cols-3 gap-4" >
   
         <?php
         $brands = get_terms('pwb-brand'); 
            foreach( $brands as $brand ) {
               $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
               $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_name', true );
               
               $attachment_src = wp_get_attachment_image_src( $attachment_id,'full' );
               $brand_banner_id = get_term_meta($brand->term_id, 'pwb_brand_banner', true);
               $brand_banner_src = wp_get_attachment_image_src( $brand_banner_id,'full' ); ?>    
               <a  class="marcas-image"  href="marca/<?=$brand->slug ?>">
                  <?php echo  $brand->description; ?> 
               </a>  
		<?php } ?>  
   </div>    
    
</div>
 
<div class=" max-w-products-grid mt-10 sm:mt-20 m-auto px-4 xl:px-0 " >
   <?php echo do_shortcode('[recent_products category="producto" limit="12"  order="ASC"  ]');?> 
 
</div>
<div class="h-20" ></div> 

 <?php  
get_footer();
?>

