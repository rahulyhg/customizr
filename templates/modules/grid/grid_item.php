<?php
/**
 * The template for displaying the post list grid item (expanded or not)
 *
 * In WP loop
 *
 * @package Customizr
 * @since Customizr 3.5.0
 */
?>
<article <?php czr_fn_echo( 'article_selectors' ) ?> >
  <section class="grid__item" <?php czr_fn_echo('element_attributes') ?>>
    <div class="tc-grid-figure <?php czr_fn_echo( 'figure_class' ) ?>">
      <div class="entry-media__wrapper czr__r-i">
        <a class="bg-link" href="<?php the_permalink() ?>" title="<?php esc_attr( strip_tags( get_the_title() ) ) ?>"></a>

        <?php

        if ( czr_fn_get( 'icon_enabled' ) ):

        ?>
          <div class="tc-grid-icon post-type__icon" <?php czr_fn_echo( 'icon_attributes' ) ?>>
            <i class="icn-format"></i>
          </div>
        <?php

        endif

        ?>
        <?php czr_fn_echo( 'thumb_img' ) ?>
      </div>
      <div class="tc-grid-caption">
        <!--div class="entry-summary-wrapper"-->
          <div class="entry-summary <?php czr_fn_echo('entry_summary_class') ?> ">
            <div class="tc-g-cont <?php czr_fn_echo('gcont_class') ?>"><?php the_excerpt() ?></div>
            <?php

            /* The expanded grid item has the title inside the caption */
            if( czr_fn_get( 'has_title_in_caption' ) ):

            ?>

            <h2 class="entry-title">
              <a href="<?php the_permalink() ?>" title="<?php _e( 'Permalink to' , 'customizr' ) ?> <?php echo esc_attr( strip_tags( get_the_title() ) ) ?>" rel="bookmark"><?php czr_fn_echo( 'title' ) ?></a>
            </h2>

            <?php

            /* end expanded title */
            endif

            ?>
          </div>
          <?php

          /* additional effect for not expanded grid items */
        if( czr_fn_get( 'has_fade_expt' ) ):

          ?>
          <span class="tc-grid-fade_expt"></span>
          <?php

        endif

          ?>
        <!--/div-->

      <?php

      /* Edit link in the figure for the expanded item */
        if( czr_fn_get( 'has_edit_in_caption' ) )
          if ( czr_fn_has('edit_button') && (bool) $edit_post_link = get_edit_post_link() )
            czr_fn_render_template(
              'modules/edit_button',
              array(
                'model_args' => array(
                  'edit_button_class' => 'inverse',
                  'edit_button_link'  => $edit_post_link,
                )
              )
            );
      ?>
      </div>
    </div>
  <?php

    /* Header in the bottom for not expanded */
    if( ! czr_fn_get( 'is_expanded' ) ) :

  ?>
    <div class="tc-content">
      <?php czr_fn_render_template( 'content/post-lists/singles/headings/post_list_single_header',
        array(
          'model_args' => array(
            'the_title' => czr_fn_get('title')
          )
        )
      )?>
      <?php czr_fn_render_template( 'content/post-lists/singles/footers/post_list_single_footer',
        array(
          'model_args' => array(
            'show_comment_meta' => czr_fn_get('show_comment_meta')
          )
        )
      ) ?>
    </div>
  <?php

    endif

  ?>
  </section>
</article>