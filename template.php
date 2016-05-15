<?php 

function phptemplate_breadcrumb($breadcrumb) {

$separator = '';

  /*** Define your custom breadcrumb prefix here ***/
  $corporate_breadcrumb = array(l('Home','http://www.trytonmedical.com')  ,l('News','http://newsroom.trytonmedical.com/')) ;
  

  //Remove "Home" and "Press" and replace it with our breadcrumb prefix
array_shift($breadcrumb);
//array_shift($breadcrumb);
  $corporate_breadcrumb_length = sizeof($corporate_breadcrumb);
  //Prepend the custom breadcrumb prefix to the current page breadcrumb
  for ($counter = $corporate_breadcrumb_length - 1; $counter >=0; $counter--) {
    array_unshift($breadcrumb, $corporate_breadcrumb[$counter]);
  }
  
  if (!empty($breadcrumb)) {
    if (!drupal_is_front_page()) {

      $is_search_page = array();
      if (isset($breadcrumb[$corporate_breadcrumb_length])) {
        preg_match('/\/search">Search/', $breadcrumb[$corporate_breadcrumb_length], $is_search_page);
      }

      // Cut off excess breadcrumb for search pages
      //We don't need the title of search page to be included in breadcrumb.
      if ($is_search_page) {
        $breadcrumb[$corporate_breadcrumb_length] = '<span>Search</span>';
        $breadcrumb = array_slice($breadcrumb, 0, $corporate_breadcrumb_length + 2);
      }
      else { 
        // If page has title, add it to the breadcrumb
        $title = drupal_get_title();
        if (!empty($title)) {
          $breadcrumb[] = $title;
        }
      }
    }

      
  // Below is the old breadcrumb code
  // return '<div class="breadcrumb">'. implode('<span class="breadcrumb_arrow">&nbsp;</span>', $breadcrumb) .'</div>';
  
  
  // Below is the breadcrumb list code
  
  if (!empty($breadcrumb)) {
    $lastitem = sizeof($breadcrumb);
    $title = drupal_get_title();
    $crumbs = '<div hideinteriorrootnodes="true" class="newsTitle">';
    $a = 1;
  
    foreach($breadcrumb as $value) {
  
    if ($a == 1) {
      $crumbs .= '<span>'. $value . '</span>';
 
      $a++;
    } else {
  
      if ($a!=$lastitem){
        $crumbs .= '<span>'. $value . '</span>';
       
        $a++;
      }
      else {
           $crumbs .= '<span class="title">'. $value . '</span>';
        //$crumbs .= ;
      }
    }
  }
  
    $crumbs .= '<a id="ctl00_PlaceHolderBreadcrumb_ctl00_SkipLink"></a></div>';
  }
  return $crumbs;

// End of breadcrumb list code
  /*

  


    */
  
  
  }
}
