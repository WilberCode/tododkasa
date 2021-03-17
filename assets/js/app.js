 
 
var $ = jQuery.noConflict(); 
import menuMobile from  './components/menuMobile'  
import insertIcons from  './components/insertIcons'  
import cartChanges from  './components/cartChanges'  
import openMiniCart from './components/openMiniCart';
jQuery(function ($) {  
    $(document).ready(function () {  
        menuMobile($)   // Menu Mobile: Show menu and hidde  
        cartChanges($)  // Ajax Cart input changes 
        openMiniCart($) // Open the mini cart when I hover 
        insertIcons($)  // Insert icons svg  
    });   
  
});
 