<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content_top']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['content_bottom']: Items for the header region.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div id="page-wrapper">

  <div id="page">
    <?php if ($page['top_bar']): ?>
      <div id="top_bar">
        <div class="section middle clearfix">
          <?php print render($page['top_bar']); ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-lg-1">
        </div>
        
        <div class="col-xs-12 col-sm-4">
          <a href="https://www.leonardcheshire.org/"><img src="https://socialcare.leonardcheshire.org/images/leonard-cheshire-logo-new.png" alt="Leonard Cheshire logo" class="bigbottommargin" id="logo"></a>
        </div>
        
        <div class="col-xs-12 col-sm-7 col-lg-5 yellow-background deep-purple-text rounded-corners-bottom">
          <div class="row">
            <div class="col-xs-1">
              <div class="clock"></div>
            </div>
            <div class="col-xs-9">
              <h1 class="bigtopbottommargin"><strong>15 minute personal care is destroying lives</strong></h1>
            </div>
          </div>
        </div>
        
        <div class="col-xs-12 col-lg-1">
        </div>
      </div>
    </div>

  <?php if ($page['banner']): ?>
    <div id="banner">
      <div class="section middle clearfix">
        <?php print render($page['banner']); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section middle clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>
  <?php if ($messages): ?>
    <div id="messages"><div class="section middle clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>
  <div id="main-wrapper">

    <div id="main" class="clearfix middle">

      <div id="content" class="column" role="main">
        <div class="section">

        <?php if ($breadcrumb): ?>
          <div id="breadcrumb"><?php print $breadcrumb; ?></div>
        <?php endif; ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
        <div id="headerwrap"><h1 class="title" id="page-title"><?php print $title; ?></h1></div>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs && !morelesszen_tabs_float()): ?>
          <div class="tabs"><?php print render($tabs); ?></div>
        <?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>

        <?php print render($page['content_top']); ?>
        <?php print render($page['content']); ?>
        <?php print render($page['content_bottom']); ?>

        <?php print $feed_icons; ?>
        </div><!-- /.section -->
      </div><!-- /#content -->

      <?php if ($page['sidebar_first']): ?>
        <aside id="sidebar-first" class="column sidebar" role="complementary">
          <div class="section">
          <?php print render($page['sidebar_first']); ?>
          </div><!-- /.section -->
        </aside><!-- /#sidebar-first -->
      <?php endif; ?>

      <?php if ($page['sidebar_second']): ?>
        <aside id="sidebar-second" class="column sidebar" role="complementary">
          <div class="section">
          <?php print render($page['sidebar_second']); ?>
          </div><!-- /.section -->
        </aside><!-- /#sidebar-second -->
      <?php endif; ?>

    </div><!-- /#main -->
  </div><!-- /#main-wrapper -->


  <?php if ($page['bottom']): ?>
  <div id="bottom">
    <div class="section middle">
      <div id="bottom-wrapper" class="clearfix">
        <div class="section">
        <?php print render($page['bottom']); ?>
        </div><!-- /.section -->
      </div><!-- /#bottom-wrapper -->
    </div><!-- /.section -->
  </div><!-- /#footer -->
  <?php endif; ?>


  <?php if($page['footer'] || $secondary_menu): ?>

  <footer id="footer" role="contentinfo">

    <div class="section middle">
    
       <?php if ($secondary_menu): ?>
      <nav id="secondary-menu" role="navigation">
        <h2 class="element-invisible"><?php echo t('Secondary menu'); ?></h2>
        <?php echo render($secondary_menu); ?>
      </nav> <!-- /#secondary-menu -->
    <?php endif; ?>

      <?php if($page['footer']): ?>
      <div id="footer-wrapper" class="clearfix">
        <div class="section">
          <?php print render($page['footer']); ?>
        </div><!-- /.section -->
      </div><!-- /#footer-wrapper -->
      <?php endif; ?>

    </div><!-- /.section -->

  </footer><!-- /#footer -->

  <?php endif; ?>

  </div><!-- /#page -->
</div><!-- /#page-wrapper -->

<?php if($tabs && morelesszen_tabs_float()): ?>
  <div id="floating-tabs"><?php print render($tabs); ?></div>
<?php endif; ?>
