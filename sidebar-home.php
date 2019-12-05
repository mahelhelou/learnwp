<?php
// If the there're widgets in sidebar -> Show this sidebar
if (is_active_sidebar('sidebar-1')) { ?>
   <div class="widget">
      <?php dynamic_sidebar('sidebar-1'); ?>
   </div>
<?php } ?>