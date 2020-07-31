<?php
/*
Template Name: Home
Template Post Type: post, page, event
*/ 
get_header();?>
<?php $file = './tailwind.js';?>   

 
 
   
 <div class=""  style="background: #6db4d3;" >
    <img  class="m-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/cyberweekbebemama.png" alt="CYBER
week ¡todo! 30% off">
 </div>
 <div class=" mt-8 sm:mt-12" >
    <img  class="m-auto w-27 sm:w-35 md:w-41" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/pigeon.png" alt="Logo Pigeon">
 </div>
 <div class=" mt-8 sm:mt-12">
   <div class="container">  
      <?php echo do_shortcode('[products  limit="15" columns="5"  class="quick-sale"  paginate="true" order="ASC" ]'); ?>
   </div>
 </div>
   <div class="container">
      <div  class="py-20 border border-line " >
      <h3 class=" legal text-center  text-xl md:text-2xl font-pigeon " >legal y/o condiciones</h3>
   </div>
   </div>
 <div class="text-center" >
<!-- <img class="m-auto" src="http://localhost/woocommerce/cyberweekbyby/wp-content/uploads/2020/07/cyberweek.png" alt=" cyberweek"> -->
</div>

 
<div class="h-20" ></div> 

 <?php  
get_footer();
?>

