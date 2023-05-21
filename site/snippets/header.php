<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INDEX JOURNAL</title>
  <?php snippet('meta_information'); ?>
  <?php snippet('robots'); ?>

  <!-- plausible -->
  <script defer data-domain="index-journal.org" src="https://plausible.memoreview.net/js/script.js"></script>

  <!-- facivon -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <!-- css -->
  <?= css('assets/css/style.css?v=' . sha1_file('assets/css/style.css')) ?>
  <?= css('assets/css/print.css?v=' . sha1_file('assets/css/print.css')) ?>
  <!-- js -->
  <?= js('assets/js/jquery.min.js') ?>
  <?= js('assets/js/images.js') ?>
  <?= js('assets/js/script.js?v=' . sha1_file('assets/js/script.js')) ?>
  <!-- google analytics -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-site-verification" content="REP3FyJ9Bqjr3A2K2owDTv9toyWnGTjnoPxmUs6vGT4" />
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139982363-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-139982363-1');
  </script>
  <!-- Matomo -->
  <script>
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u = "//matomo.memoreview.net/";
      _paq.push(['setTrackerUrl', u + 'matomo.php']);
      _paq.push(['setSiteId', '3']);
      var d = document,
        g = d.createElement('script'),
        s = d.getElementsByTagName('script')[0];
      g.async = true;
      g.src = u + 'matomo.js';
      s.parentNode.insertBefore(g, s);
    })();
  </script>
  <!-- End Matomo Code -->
</head>

<body data-display="<?= $page->template() ?>">
  <header class="index-header" <?php if ($page->template() == 'essay') : ?>style="background-color: rgb(<?= $page->parent()->issue_color() ?>); box-shadow: 0px 11px 16px 0px rgba(<?= $page->parent()->issue_color() ?>);" <?php endif ?>>
    <h1>
      <a href="<?= $site->url() ?>">INDEX JOURNAL</a>


      <?php foreach (page('issues')->children()->listed()->flip()->slice(0, 1) as $issue) : ?>
        <a href="<?= $issue->url() ?>" class="current-issue"><span>, Issue </span><span>No. </span><?= $issue->num() ?><span style="text-transform: uppercase;"> <?= $issue->title() ?></span></a>
      <?php endforeach ?>




      <nav class=" issues"><?php foreach (page('issues')->children()->listed()->flip() as $issue) : ?><span class="issue"><span><a href="<?= $issue->url() ?>"><span class="hide-mobile"> Issue</span><span> No. </span><?= $issue->num() ?> <span class="title"><?= $issue->title() ?></span></a></span><?php endforeach ?></span></nav>
    </h1>
    <nav class="pages">
      <?php foreach ($site->children()->listed()->flip() as $subPage) : ?>
        <a href="<?= $subPage->url() ?>"><?= $subPage->title() ?></a><span>, </span><?php endforeach ?><a href="<?= $site->url() ?>/emaj">EMAJ</a>
    </nav>
    <nav class="menu" style="cursor:pointer">
      <span>Menu</span>
    </nav>
  </header>

  <?php snippet('menu-pane'); ?>