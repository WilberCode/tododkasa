<?php
/*
Template Name: Home
Template Post Type: post, page, event
*/ 
get_header();?>
<?php $file = './tailwind.js';?>   
 
<div class=" px-0">
<div >
   <img  class="m-auto" src="http://localhost/woocommerce/cyberweekbyby/wp-content/uploads/2020/07/home-banner.png" alt="Banner mama pigeon">
</div>  
</div>
<div class="container">
   <div  class="grid grid-cols-3 gap-2 sm:gap-5 mt-10" >
      <div>
         <div class="border-2 border-yellow-400 p-4 inline-flex items-center justify-center h-26 sm:h-50 w-full " >
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/logo-pigeon.png" alt="Pigeon">
         </div>
         <div class="relative flex justify-center " >
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/biberones.png" alt="Pigeon">
            <a class="btn font-pigeon tracking-widest absolute bottom-0 mb-10 " href="#">MIRA LAS OFERTAS</a>
         </div>

      </div> 
      <div>
         <div class="border-2 border-yellow-400 p-4 inline-flex items-center justify-center h-26 sm:h-50 w-full " >
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/bio-oil.png" alt="Pigeon">
         </div>
         <div class="relative flex justify-center " >
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/bio-oil-gestando.png" alt="Pigeon">
            <a class="btn font-pigeon tracking-widest absolute bottom-0 mb-10 " href="#">MIRA LAS OFERTAS</a>
         </div>
      </div>
      <div>
         <div class="border-2 border-yellow-400 p-4 inline-flex items-center justify-center h-26 sm:h-50 w-full  " >
            <img  class="w-24 sm:w-auto" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/momma.png" alt="Pigeon">
         </div>
         <div class="relative flex justify-center " >
            <img  class="w-full mt-3" src="https://cyberweekbyby.feriasdigitales.pe/wp-content/uploads/2020/07/bebe.png" alt="Pigeon">
            <a class="btn font-pigeon tracking-widest absolute bottom-0 mb-10 " href="#">MIRA LAS OFERTAS</a>
         </div>
      </div>
   </div>
</div>

 
<div class="h-20" ></div> 

 <?php  
get_footer();
?>

