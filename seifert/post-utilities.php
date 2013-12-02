      <div class="entry-utility">
      <?php printf( __( 'This article was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow comments with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'seifert' ),
      get_the_category_list(', '),
      get_the_tag_list( __( ' and tagged ', 'seifert' ), ', ', '' ),
      get_permalink(),
      the_title_attribute('echo=0'),
      get_post_comments_feed_link() ) ?>
      <?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // ?>
      <?php printf( __( '<a class="comment-link" href="#respond" title="Post a Comment">Post a Comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'seifert' ), get_trackback_url() ) ?>
      <?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // ?>
      <?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for post" rel="trackback">Trackback URL</a>.', 'seifert' ), get_trackback_url() ) ?>
      <?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // ?>
      <?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a Comment">Post a Comment</a>.', 'seifert' ) ?>
      <?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // ?>
      <?php _e( ' Both comments and trackbacks are closed.', 'seifert' ) ?>
      <?php endif; ?>
      <?php edit_post_link( __( 'Edit', 'seifert' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
      </div>
     