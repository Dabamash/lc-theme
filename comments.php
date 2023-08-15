<?php
if (have_comments()) :
    // Display comments list
    echo '<ol class="comment-list">';
    wp_list_comments();
    echo '</ol>';

    // Display comment pagination
    the_comments_pagination();
endif;

// Display comment form
comment_form();
?>
