<?php
  defined( 'ABSPATH' ) or die( 'You\'re not allowed here!' );
  /*
    Plugin Name: Planet 9
    Plugin URI:  https://github.com/stevengeorgeharris
    Description: Calculates the reading time of a Wordpress post
    Version:     0.1
    Author:      Steven Harris
    Author URI:  https://github.com/stevengeorgeharris
    Text Domain: planet-9
  */

  // We want to display it by using a shortcode.
  add_shortcode('howLongToRead', 'howLongToRead');

  // Main function - we want to add options in the admin panel to control variables and styles.
  function howLongToRead (){
    ob_start();
    global $post;
    // Low average for slow readers. 200 = 1 minute.
    $average = 200;
    // We need to replace the more tag so we get the full content.
    $text = str_replace( '<!--more-->', '', $post->post_content );
    print $stripped = strip_tags($text);
    $content = ob_get_clean();
    // Count words.
    $wordCount = sizeof(explode(" ", $content));
    // Calculate average time.
    $time = floor($wordCount / $average);
    /**
     * We could take this further:
     * If < 1 show string "Less than a minute" or Calculate seconds ($time * 60).
     * If > 60 calculate hours ($time / 60).
     */
    if ($time < 1) :
      $time = 1;
      return $time;
      else :
        return $time;
    endif;
  }
?>
