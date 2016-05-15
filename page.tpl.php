<?php
// $Id: page.tpl.php,v 1.11.2.1 2009/04/30 00:13:31 goba Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 *
 * Updates:
 * 03/25/2014 - Updated BW Tag links to direct to correct URLS (JD)
 * 03/13/2014 - Added Breadcrumb code after Chrome (MD)
 *            - added legal verbiage from Business Wire afte head (JD)
 * 03/11/2014 - added HTML5SHIV.JS call (Requires JS/HTML5SHIV.JS now in Quash)
 * 03/08/2014 - added BW Tags for NewsHQ and InvestorHQ (MD)
 * 03/04/2014 - added IE9 identity crisis fix after Krispy Kreme issues
 * 03/03/2014 - added comments for client javascript inclusions based on bootstrap requirements
 *            - added optional ie9.css call
 * 
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
<!-- This site contains functionality licensed from Business Wire (www.businesswire.com). Business Wire reserves all rights associated with this site and any of its licensed functionality. -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <?php // IE9 IDENTITY CRISIS FIX ?>

  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  
  <?php 
    // LOCAL DEVELOPMENT
    // Set to FALSE when pushing code for public viewing, TRUE for local development
    $dev = FALSE; 

    // In Mac terminal go to parent SVN folder then use: python -m SimpleHTTPServer 8080
    // Set local IP Server address 
    $local_address = "http://192.168.129.xx:8080/"; 

    // Set local SVN folder 
    $local_svn_client = "svn/example.investorhq.businesswire.com/themes/example_investorhq_businesswire_com_theme/"; 

    $theme_path = $local_address . $local_svn_client;

    if (!$dev) {
      $theme_path = $base_path . $directory . "/"; 
    }
  ?>

  <?php print $external_styles; ?>
    <link type="text/css" rel="stylesheet" href="<?php print $base_path . $directory; ?>/client_files/css/style.css">

  <?php print $styles; ?>


    <?php
/* CLIENT JAVASCRIPT GOES HERE:
# 1) Client jQuery
# 2) Client Bootstrap if used
# 3) Client javascript (combined into one file)
# 4) jQuery no conflict
*/
/* 
  <script type="text/javascript" src="<?php print $base_path . $directory; ?>/client_files/js/jquery.js"></script>
  <script type="text/javascript" src="<?php print $base_path . $directory; ?>/client_files/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php print $base_path . $directory; ?>/client_files/js/client.js"></script>
  <script type="text/javascript">var clientNamespace = {}; clientNamespace.jQueryClient = jQuery.noConflict( true );</script> 
*/
  ?>
  
  <?php print $scripts; ?>

  <?php print $external_scripts; ?>


  <?php 
  // LOCAL DEVELOPMENT 
  // The following CSS file uses the path set above for either local or server location. 
  // Change name accordingly.
  ?>


  <?php
  if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) {
    print $https_only_external_scripts;
  }
  else {
    print $http_only_external_scripts;
  }
  ?>

  <!--[if IE 9]>
    <link type="text/css" rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie9.css">
  <![endif]-->
  <!--[if IE 8]>
    <link type="text/css" rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie8.css">
  <![endif]-->
  <!--[if lte IE 7]>
    <link type="text/css" rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie7.css">
  <![endif]-->
  <!--[if lte IE 6]>
    <link type="text/css" rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie6.css">
  <![endif]-->


  <?php print $conditional_overrides; ?>

  <?php print $sharing_head; ?>
  

  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">
  
  <div id="bw-wrap">
    <!-- User Navigation -->

    <!-- <?php if ($user_nav) : ?>
      <div id="bw-user-nav"><?php print $user_nav; ?></div>
    <?php endif; ?>
    <!-- /Begin opening site chrome -->

  <div class="wrapper">       

      <div class="container"> 

          <div class="header"> 

          <a class="logo" href="http://www.trytonmedical.com/" title="Tryton Medical"></a>

          <div class="header-right"> 

            <div class="top-bar"> 

              <!-- <div class="top-bar-locale">

                <a class="top-bar-locale-flag" href="http://www.trytonmedical.com/category/"></a>

                <a class="top-bar-locale-flag-3" href="http://www.trytonmedical.com/category/"></a>

                <a class="top-bar-locale-flag-2" href="http://www.trytonmedical.com/category/"></a>

                <a class="top-bar-locale-zone" href="http://www.trytonmedical.com/distributors"></a>

                <div class="clear"></div>

           
            </div><!-- END TOP BAR LOCALE -->

             <!-- <div class="top-bar-menu">

                <ul id="menu-top-menu" class="menu">

                    <li id="menu-item-39" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-39"><a href="http://www.trytonmedical.com/category/press?cat=1">News &amp; Events</a></li>

                    <li id="menu-item-40" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-40"><a href="http://www.trytonmedical.com/category/press?page_id=29">Contact</a></li>
                                    
                    <li id="menu-item-41" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41"><a href="http://www.trytonmedical.com/category/press?page_id=397">IDE Clinical Login</a></li>

                </ul>

            </div><!-- END TOP BAR MENU -->
                            
                  <a href="http://www.linkedin.com/company/tryton-medical-inc" target="_new"><img src="/sites/trytonmedical.newshq.businesswire.com/themes/trytonmedical_newshq_businesswire_com_theme/client_files/images/LinkedIn-icon.png" alt="Get LinkedIn with Tryton Medical" longdesc="https://www.linkedin.com/company/tryton-medical-inc" height="20" hspace="1" vspace="2" width="20" border="0"></a>         
                  <a href="http://twitter.com/trytonmedical1" target="_new"><img src="/sites/trytonmedical.newshq.businesswire.com/themes/trytonmedical_newshq_businesswire_com_theme/client_files/images/Twitter-icon.png" alt="Follow Tryton Medical on Twitter" longdesc="https://twitter.com/trytonmedical1" height="20" hspace="3" vspace="2" width="20" border="0"></a>
                  <a href="http://www.facebook.com/trytonmedical" target="_new"><img src="/sites/trytonmedical.newshq.businesswire.com/themes/trytonmedical_newshq_businesswire_com_theme/client_files/images/Facebook-icon.png" alt="Follow Tryton Medical on Facebook" longdesc="https://www.facebook.com/trytonmedical" height="20" hspace="3" vspace="2" width="20" border="0"></a>                            
                  <a href="http://www.youtube.com/user/TrytonEducation" target="_new"><img src="/sites/trytonmedical.newshq.businesswire.com/themes/trytonmedical_newshq_businesswire_com_theme/client_files/images/Youtube-icon.png" alt="Subscribe to Tryton Medical on YouTube" longdesc="https://www.youtube.com/user/TrytonEducation" height="20" hspace="3" vspace="2" width="20" border="0"></a>
                          

              <div class="clear"></div>

            </div> <!-- END TOPBAR --> 

            <div class="clear"></div>

          <div class="mainmenu">

              <ul id="mainmenu" class="mm">
                <li id="menu-item-118" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-118"><a href="http://www.trytonmedical.com/about" >Corporate</a>
              
                  <ul class="sub-menu">
                    <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43"><a href="http://www.trytonmedical.com/about" >About</a></li>
                    <li id="menu-item-51" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51"><a href="http://www.trytonmedical.com/management-team" >Management Team</a></li>
                    <li id="menu-item-44" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44"><a href="http://www.trytonmedical.com/board-of-directors" >Board of Directors</a></li>
                    <li id="menu-item-49" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a href="http://www.trytonmedical.com/distributors" >Distributors</a></li>
                    <li id="menu-item-45" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45"><a href="http://www.trytonmedical.com/careers" >Careers</a></li>
                  </ul>

                </li>

                <li id="menu-item-140" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-140"><a href="http://www.trytonmedical.com/side-branch-stent" >Product</a>

                  <ul class="sub-menu">
                    <li id="menu-item-139" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-139"><a href="http://www.trytonmedical.com/side-branch-stent" >Side Branch Stent</a></li>
                    <li id="menu-item-138" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-138"><a href="http://www.trytonmedical.com/deployment-sequence" >Deployment Sequence</a></li>
                  </ul>

                </li>

                <li id="menu-item-127" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-127"><a href="http://www.trytonmedical.com/clinical-results" >Clinical</a>

                  <ul class="sub-menu">
                    <li id="menu-item-126" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-126"><a href="http://www.trytonmedical.com/clinical-results" >Clinical Results &#038; Publications</a></li>
                    <li id="menu-item-1744" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1744"><a href="http://www.trytonmedical.com/faq" >Extended Access Registry</a></li>
                  </ul>

                </li>

                    <li id="menu-item-1722" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-1722"><a href="http://newsroom.trytonmedical.com/" >Newsroom</a></li>
                    <li id="menu-item-1720" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1720"><a href="http://bifurcationinstitute.com/" onclick="javascript:_gaq.push(['_trackEvent','outbound-menu','http://bifurcationinstitute.com']);">Bifurcation Institute</a></li>
              </ul>

                  <div class="clear"></div>

            </div><!-- END MAINMENU -->

          </div><!-- END HEADER RIGHT -->

        

          <div class="clear"></div>

        </div><!-- END HEADER -->

        
           <div class="slider-inner">

              <!-- <div class="slider-inner-slide slider-inner-slide-1" style="background-image: url(&quot;/sites/trytonmedical.newshq.businesswire.com/themes/trytonmedical_newshq_businesswire_com_theme/client_files/images/slides/inner-slide-news-text.jpg&quot;); display: none;"></div> -->

               <div class="slider-inner-slide slider-inner-slide-2" style="background-image: url('/sites/trytonmedical.newshq.businesswire.com/themes/trytonmedical_newshq_businesswire_com_theme/client_files/images/inner-slide-news-text.jpg'); display: block;"></div>


          </div> 

          <?php if ($user_nav) : ?>
            <div id="bw-user-nav"><?php print $user_nav; ?></div>
          <?php endif; ?> 

          <div class ="submenu" style="background-image: url('/sites/trytonmedical.newshq.businesswire.com/themes/trytonmedical_newshq_businesswire_com_theme/client_files/images/submenu-bg.gif');"></div>

         

    <!-- /End opening site chrome -->

    <!-- BW: breadcrumb --> 
    <?php if ($breadcrumb): ?> 
               <?php print $breadcrumb; ?> 
    <?php endif; ?>
    <!-- BW: End breadcrumb -->


    <?php if ($header): ?>
    <div id="bw-content-header" class="clear-block">
      <?php print $header; ?>
    </div>
    <?php endif; ?>

 


    <div id="bw-content" class="clear-block">
      
      <?php if ($left): ?> 
        <div id="bw-sidebar-left" class="bw-sidebar">
        <div class="bw-inner"> 
            <?php print $left; ?> 
         </div>     
        </div> <!-- /#bw-sidebar-left-->
      <?php endif; ?>
      
       <div id="bw-content-content">
        
        <div id="bw-content-title">
          <?php if ($title): ?>
            <h1>
              <?php print $title; ?>
            </h1>
          <?php endif; ?>

<!-- Do no strip this code -->          
          <?php if ($tabs): ?>
            <div id="bw-tabs">
              <?php print $tabs; ?>
            </div>
          <?php endif; ?>
          <?php print $messages; ?>
          <?php print $help; ?>
        </div>
        
        <?php print $content ;?>
        
        <?php print $workflow_links; ?>
<!--  END: Do no strip this code -->  

      <?php if ($below_content): ?> 
      <div id="bw-below-content-left" class="bw-below-content"> 
        <div class="bw-inner"> 
        <?php print $below_content; ?> 
        </div> 
      </div> <!-- /#bw-below_content-left-->
      <?php endif; ?>    

      </div><!--END CONTENT-CONTENT -->

      <?php if ($right): ?> 
        <div  id="bw-sidebar-right" class="sidebar">
        <div class="bw-inner">  
            <?php print $right; ?> 
        </div> 
        </div> <!-- /#bw-sidebar-right -->
      <?php endif; ?>

    <!--</div>--> <!-- /#bw-content -->

  </div><!-- BW CONTENT-->
</div><!-- END WRAPPER-->

    <!-- /Begin closing site chrome -->
      
     <div class="footer footer-interior">
      <div class="footer-container">
        <div class="join">
          <div class="join-subscribe">


           <div class="join-subscribe-form"> 
              <!-- <div class="join-subscribe-form-inputs">
                <input id="subscribe_name" name="name" value="your name" onfocus="if(this.value=='your name') this.value='';" onblur="if(this.value.length < 1) this.value='your name';" type="text">
                <input id="subscribe_email" name="email" value="your email" onfocus="if(this.value=='your email') this.value='';" onblur="if(this.value.length < 1) this.value='your email';" type="text">
              </div> -->
              <div class="clear"></div>
              <a class="join-subscribe-form-go" href="http://www.trytonmedical.com/about" onclick="jQuery('#subscribe_email').removeClass('error');if(isEmail(jQuery('#subscribe_email').val())) { jQuery('.join-subscribe-form').fadeOut(1000);jQuery('.join-subscribe-thankyou').fadeIn(1000); } else {jQuery('#subscribe_email').addClass('error');}return false;">KEEP ME INFORMED &gt;</a>
            </div>  
            <div class="join-subscribe-thankyou">Thanks for joining! We look forward to staying in touch.</div>


          </div>
          <div class="clear"></div>
        </div>    
        <div class="join-shadow"></div>                 
        <div class="footer-body"> 
          <div class="footer-menu">
            <ul id="menu-footer-first" class="menu"><li id="menu-item-153" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-153"><a href="http://www.trytonmedical.com/about">Corporate</a></li>
                <li id="menu-item-154" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-154"><a href="http://www.trytonmedical.com/side-branch-stent">Product</a></li>
                <li id="menu-item-155" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-155"><a href="http://www.trytonmedical.com/clinical-results">Clinical</a></li>
            </ul>         
          </div>
          <div class="footer-menu">
            <ul id="menu-footer-second" class="menu"><li id="menu-item-31" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-31"><a href="http://newsroom.trytonmedical.com/">Newsroom</a></li>
                <li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"><a href="http://bifurcationinstitute.com">Bifurcation Institute</a></li>
                <li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33"><a href="http://www.trytonmedical.com/contact">Contact Us</a></li>

            </ul>         
          </div>
          <div class="footer-copyright">
            <div class="textwidget">The Tryton Side Branch Stent System is available for sale in Europe, Investigational in the US and not approved in Japan.
              <br><br>© 2012 | ALL RIGHTS RESERVED | TRYTON MEDICAL
            </div>       
          </div>
            <a class="footer-logo" href="http://www.trytonmedical.com/" title="Tryton Medical"></a>
              <div class="clear"></div>

            <div id="bw_tag_wrap" style="width: 960px; margin: 0px auto; text-align: right; clear:both">
                <div id="bw_tag"><a href="http://www.businesswire.com/portal/site/home/online-newsrooms/" target="_blank">Business Wire NewsHQ℠</a></div>
            </div>

        </div<!--END FOOTER BODY-->
      </div><!--END CONTAINER-->
    </div><!--END FOOTER FOOTER-INTERIOR-->   
      
    <!-- /End closing site chrome -->
    
  </div>  <!-- END WRAPPER -->
  
    </div>  <!-- END #bw-wrap -->

  <?php print $closure; ?>


</body>
</html>