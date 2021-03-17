
const cartChanges = ($) => {
    /*  CART PAGE */
     //remove update cart for Automatically on Quantity Change 
    $('.woocommerce').on('change', 'input.qty', function(){
        $("[name='update_cart']").trigger("click"); 
    }); 
    
    let timeout; 
    $('.woocommerce').on('change', 'input.qty', function(){
 
		if ( timeout !== undefined ) {
			clearTimeout( timeout );
		}
 
		timeout = setTimeout(function() {
			$("[name='update_cart']").trigger("click"); 
		}, 1000 ); // 1 second delay, half a second (500) seems comfortable too 
	});


    /*  SINGLE PRODUCT PAGE */
    $('.woocommerce').on('change', '.cart input.qty', function(){
            $("[name='add-to-cart']").trigger("click");
          
   });   
}

export default cartChanges
