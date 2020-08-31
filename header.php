<?php get_template_part( 'templates/partials/document-open' ); ?> 
<!-- Site header markup goes here --> 
 
 <header class=" bg-white header">
    <div class="bg-dark h-8 sm:h-12 w-full relative z-40" >    
          
    </div>
    <div class="header-wrap container m-auto flex h-17  sm:h-24 justify-between items-center "> 
        <div class=" flex relative z-40 items-center "> 
                <div class=" max-w-md md:hidden" > 
                    <?php echo do_shortcode('[wcas-search-form id="wilberparion"]'); ?> 
                </div>
         </div>
         <div class=" items-center md:h-full " > 
             <?php  
                wp_nav_menu(array(
                    'theme_location'  => 'main',
                    'container'       => 'nav',
                    'container_class' => 'header-nav',   
                    'container_id'    => 'header-nav',  
                    'menu' => 'ul',
                    'menu_class'      => 'header-menu',
                    'menu_id'         => 'header-menu',
                ));  
            ?>
                
                <div class="mobile-nav-wrap" id="mobile-nav-wrap"  > 
                    <?php  
                    wp_nav_menu(array(
                        'theme_location'  => 'mobile',
                        'container'       => 'nav',
                        'container_class' => 'mobile-nav',
                        'container_id'    => 'mobile-nav',  
                        'menu' => 'ul',
                        'menu_class'      => 'mobile-menu',
                        'menu_id'         => 'mobile-menu' ,
                    ));  
                ?> 
                </div>
                <div class="nav-toggle-wrap block md:hidden ">
                    <button  id="nav-toggle" class="nav-toggle focus:outline-none border-none">  
                        <span ></span> 
                        <span ></span> 
                        <span ></span> 
                        <span ></span> 
                        <span ></span> 
                        <span ></span>  
                    </button>
                </div>   
            </div>
     </div>   
 
 </header>