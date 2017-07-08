<div class="mobile-nav__container col-12 <?php czr_fn_echo('element_class') ?>" <?php czr_fn_echo('element_attributes') ?>>
   <nav class="mobile-nav__nav collapse navbar-collapse flex-column col" id="mobile-nav">
    <?php
      if ( czr_fn_has( 'nav_search' ) ) {
        czr_fn_render_template( 'header/mobile_search_container' );
      }
      if ( czr_fn_has('mobile_menu') ) {
        czr_fn_render_template( 'header/menu', array(
          'model_id'   =>  'mobile_menu',
        ) );
      };
    ?>
  </nav>
</div>