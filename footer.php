<!-- Site footer markup goes here -->
<footer class=" footer bg-dark w-full py-6  <?php if(is_page('mi-cuenta')){ echo "sm:mt-64";} ?> "> 
    <div class="container text-white">
        <?php  dynamic_sidebar('footer-info') ?>  
    </div>
</footer> 
<?php wp_footer();  ?>   
</body> 
</html>