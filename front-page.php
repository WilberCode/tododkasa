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

<div class="container">
   <div  class="grid grid-cols-3 gap-2 sm:gap-5 mt-10 marcas " >
      <div class="marcas-item" >
         <a  href="marca/pigeon/">
            <div class=" marcas-logo">
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/08/pigeon-nuevo.png" alt="Pigeon">
         </div>
         <div class="marcas-image">
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/biberones.png" alt="Pigeon">
            <p class="marcas-image-link">MIRA LAS OFERTAS</p>
         </div> 
         </a>
      </div> 
      <div class="marcas-item" >
         <a href="marca/bio-oil/">
            <div class=" marcas-logo" >
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/bio-oil.png" alt="Pigeon">
         </div>
         <div class="marcas-image" >
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/bio-oil-gestando.png" alt="Pigeon">
            <p class="marcas-image-link" >MIRA LAS OFERTAS</p>
         </div>
         </a>
      </div>
      <div class="marcas-item" >
         <a href="marca/momma/">
            <div class=" marcas-logo " >
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/08/momma-1.jpg" alt="Pigeon">
         </div>
         <div class=" marcas-image" >
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/bebe.png" alt="Pigeon">
            <p class="marcas-image-link" >MIRA LAS OFERTAS</p>
         </div>
         </a>
      </div>
   </div>
   <div  class="marcas grid grid-cols-3 gap-2 sm:gap-5 mt-6 sm:mt-10 md:mt-12 lg:mt-16 " >
      <div class="marcas-item" >
         <a href="marca/lansinoh/">
            <div class=" marcas-logo " >
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/lansinoh.png" alt="Pigeon">
         </div>
         <div class=" marcas-image" >
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/crema.png" alt="Pigeon">
            <p class="marcas-image-link" >MIRA LAS OFERTAS</p>
         </div>
         </a>

      </div> 
      <div class="marcas-item" >
         <a href="marca/ma/">
            <div class=" marcas-logo" >
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/ma.png" alt="Pigeon">
         </div>
         <div class=" marcas-image" >
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/mama-ybebe.png" alt="Pigeon">
            <p class="marcas-image-link" >MIRA LAS OFERTAS</p>
         </div>
         </a>
      </div>
      <div class="marcas-item" >
         <a href="marca/deimel/">
            <div class=" marcas-logo " >
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/deimel.png" alt="Pigeon">
         </div>
         <div class=" marcas-image" >
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/mama-y-bebe-biberon.png" alt="Pigeon">
            <p class="marcas-image-link" >MIRA LAS OFERTAS</p>
         </div>
         </a>
      </div>
   </div>
   <div  class="mt-17 sm:mt-22 mb-14 sm:mb-20">
      <?php dynamic_sidebar('home-banner-sale') ?>   
   </div>
</div>

 
<div class="h-20" ></div> 

 <?php  
get_footer();
?>

