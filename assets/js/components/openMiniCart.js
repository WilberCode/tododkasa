 
const openMiniCart = ($) => {
    $('.widget.woocommerce.widget_shopping_cart').append(`<span class="cart-close" > </span>`)
    const hoverIconMiniCart = ()=>{
        $('.cart-btn')
        .mouseover( ()=>{     
            $('.widget.woocommerce.widget_shopping_cart').addClass('widget_shopping_cart-active');   
            toggleMiniCart(true) 
        })
        .mouseleave(()=>{     
              $('.widget.woocommerce.widget_shopping_cart').removeClass('widget_shopping_cart-active'); 
          
            keepOpenMiniCart();   
            console.log('mouseleave')
        });    
    }
   
    hoverIconMiniCart();
    const keepOpenMiniCart =  ()=>{
        $('.widget.woocommerce.widget_shopping_cart')
        .mouseover((e)=>{ 
            $('.widget.woocommerce.widget_shopping_cart').addClass('widget_shopping_cart-active');   })
        $('.widget.woocommerce.widget_shopping_cart')
        .mouseleave(()=>{  
            $('.widget.woocommerce.widget_shopping_cart').removeClass('widget_shopping_cart-active');    
        }) 
    }    
    $('.cart-customlocation').click((a)=>{
        a.preventDefault();  
    })  
    
    let toggleMiniCart = (isActive)=>{
        $('.cart-btn')
        .click( ()=>{    
            if(isActive){   
            $('.widget.woocommerce.widget_shopping_cart').addClass('widget_shopping_cart-active'); 

            } else{ 
            $('.widget.woocommerce.widget_shopping_cart').removeClass('widget_shopping_cart-active');  

            }   
         })   
    }
    $('.cart-close').click(()=>{
        $('.widget.woocommerce.widget_shopping_cart').removeClass('widget_shopping_cart-active');  

    })
 
    
}

export default openMiniCart
