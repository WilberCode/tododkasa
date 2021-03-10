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
   <div  class="   marcas " >
   
         <?php
         $brands = get_terms('pwb-brand'); 
            foreach( $brands as $brand ) {
               $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
               $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_name', true );
               
               $attachment_src = wp_get_attachment_image_src( $attachment_id,'full' );
               $brand_banner_id = get_term_meta($brand->term_id, 'pwb_brand_banner', true);
               $brand_banner_src = wp_get_attachment_image_src( $brand_banner_id,'full' ); ?>   
               <div  class="marcas-wrap grid grid-cols-1 sm:grid-cols-9 w-full gap-8 sm:gap-14  mb-8 sm:mb-12 px-4 xl:px-0   " >
            
              <!--  <div  class="marcas-wrap grid grid-cols-4 w-full "  href="marca/<?//=$brand->slug ?>"> -->
           
                  <!-- <div class=" marcas-logo">
                  <img  class="w-24 sm:w-auto" src="<?//=$attachment_src[0]?>" alt="<?//=$brand->name ?>">
                  </div> -->
               
                  <div class="marcas-image sm:col-span-5">
                     <a   href="marca/<?=$brand->slug ?>">
                        <?php echo  $brand->description; ?> 
                     </a> 
                  </div> 
                  <div class="marcas-products max-w-products m-auto mb-8 col-span-1 sm:col-span-4 " >
                     <?php echo do_shortcode('[products limit="2"     brands="'.$brand->slug.'"] ');?>
                  </div>
          </div>    
		<?php } ?>  
   
   </div> 
</div>
 
 
<div class="h-20" ></div> 

 <?php  
get_footer();
?>

