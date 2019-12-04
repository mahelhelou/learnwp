
   <!-- Footer -->
   <footer>
      <div class="container">
         <div class="row">
            <div class="copyright col-4 col-sm-7">
               <p>Copyright</p>
            </div>
            <nav class="footer-menu col-8 col-sm-5 text-right">
               <?php 
                  $args = array(
                     'theme_location' => 'footer_menu'
                  );
               wp_nav_menu($args); 
               ?>
            </nav>
         </div>
      </div>
   </footer>
   <?php wp_footer(); ?>
</body>
</html>