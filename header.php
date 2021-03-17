<?php get_template_part( 'templates/partials/document-open' ); ?> 
<!-- Site header markup goes here --> 
 
    
 <header class=" bg-white header"> 
    <div class="header-wrap container m-auto flex  justify-between items-center "> 
        <!-- <div class=" flex relative z-40 items-center md:hidden "> 
                <div class=" max-w-md md:hidden" > 
                    <?php // echo do_shortcode('[wcas-search-form id="wilberparion"]'); ?> 
                </div>
         </div> -->
         <div class="relative z-50" > 
            <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
                <?php if ( has_custom_logo() ) { ?> 
            <a  href="<?php echo home_url();?>" rel="home">
                <img   class="w-16 sm:w-22" src="<?php echo esc_url( $logo[0]);?>" alt="<?php bloginfo('name'); ?>" >
            </a> 
                <?php }else{?>
            <a  href="<?php echo home_url();?>" rel="home">
                <?php echo  '<h1 class="text-primary-500">'.get_bloginfo( "name" ).'</h1>'; ?>
            </a>     
                <?php }?>     
        </div> 
         <div class=" flex items-center  h-full " > 
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
                <div  class="cart-btn relative z-50 ml-3 pl-5 h-full " >
                    <a  class="cart-customlocation " href="<?php echo wc_get_cart_url(); ?>"  title="<?php _e( 'View your shopping cart' ); ?>" > 
                        <div class="relative" >
                            <svg  class="cart-icon" ><use href="<?php echo get_bloginfo('template_directory').'/build/svg/icons.svg#cart'; ?>"></svg>
                            <span class="cart-count" > <?php echo WC()->cart->get_cart_contents_count();  ?> </span>
                        </div>
                    </a> 
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

            <?php echo the_widget( 'WC_Widget_Cart', 'title=' ); ?>  
     </div>  
 </header>  
 
 
