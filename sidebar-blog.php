<?php
// If the there're widgets in sidebar -> Show this sidebar
if (is_active_sidebar('sidebar-2')) { ?>
   <div class="widget">
      <?php dynamic_sidebar('sidebar-2'); ?>
   </div>
<?php } ?>