<?php
/*
Template Name: Home
Template Post Type: post, page, event
*/ 
get_header();?>
<?php $file = './tailwind.js';?>   

 
 <div class="mt-20">
   <div class="container">  
      <?php echo do_shortcode('[products  limit="15" columns="5"  class="quick-sale"  paginate="true" order="ASC" ]'); ?>
   </div>
 </div>
 
 <div class="text-center" >
<!-- <img class="m-auto" src="http://localhost/woocommerce/cyberweekbyby/wp-content/uploads/2020/07/cyberweek.png" alt=" cyberweek"> -->
</div>

 
<div class="h-20" ></div> 

 <?php  
get_footer();
?>

