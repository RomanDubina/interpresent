<?php
  if ( function_exists( 'yoast_breadcrumb' ) && function_exists( 'new_yoast_breadcrumbs' ) && ! is_front_page() ) {
    new_yoast_breadcrumbs();
  }
?>