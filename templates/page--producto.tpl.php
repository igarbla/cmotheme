<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
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
 * - $page['banner']: Dynamic help text, mostly for admin pages.
 * - $page['slider']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<?php //dsm($node); ?>
<div class="site">

  <header id="site-header">
    <h1 class="title">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
        </a>
      <?php endif; ?>
    </h1>
    <p><span type="email">contact@cmo.es</span> - <span type="tel">+34 943 673399</span></p>
    <?php print render($page['header']); ?>

  <?php if ($main_menu || $secondary_menu): ?>
  <nav id="site-nav">
  <?php
    /* Asigno el menu a una variable porque si no
     * al reproducir la función por segunda vez en el footer
     * recibo el siguiente erro: Notice: Trying to get property of non-object en node_page_title()
     * y  de esta manera lo evito
     */
    ?>
    <?php $menu = theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
    <?php print $menu; ?>
  </nav> 
  <?php endif; ?>
  </header>

  <section id="site-banner" class="banner">
  <?php print $site_name; ?>
  </section>

  <?php print $messages; ?>

  <section id="main-content">

    <article class="producto">

      <header>

        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>

        <!-- https://drupal.org/node/950434 -->
        <section id="ficheros">
        <?php print render(field_view_field('node', $node, 'field_fichero_doc_tecnica', array('label'=>'hidden'))); ?>
        <?php print render(field_view_field('node', $node, 'field_fichero_man_instalacion', array('label'=>'hidden'))); ?>
        </section>

      </header>

      <section id="page-help"><?php print render($page['help']); ?></section>
      <?php if ($action_links): ?><section id="page-links"><ul class="action-links"><?php print render($action_links); ?></ul></section><?php endif; ?>

      <?php if ($tabs): ?><section class="tabs"><?php print render($tabs); ?></section><?php endif; ?>

      <?php print render($page['content']); ?>

      <?php print $feed_icons; ?>
    </article>
  </section> 

  <?php if ($page['sidebar_first']): ?>
  <div id="sidebar-first" class="column sidebar"><div class="section">
  <?php print render($page['sidebar_first']); ?>
  </div></div>
  <?php endif; ?>

  <?php if ($page['sidebar_second']): ?>
  <div id="sidebar-second" class="column sidebar"><div class="section">
  <?php print render($page['sidebar_second']); ?>
  </div></div>
  <?php endif; ?>

  <footer id="site-footer">
    <?php if ($main_menu): ?>
    <nav>
    <?php print $menu; ?>
    </nav> 
    <?php endif; ?>

    <section id="copyright">
      <p>&copy;2014 <?php print $site_name; ?></p>
    </section>

  <?php print render($page['footer']); ?>
  </footer>

</div>

