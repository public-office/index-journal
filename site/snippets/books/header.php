<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INDEX BOOKS</title>
  <?php snippet('meta_information'); ?>
  <?php snippet('robots'); ?>
  <?= css('assets/css/style.css?v=' . sha1_file('assets/css/style.css')) ?>
  <?= css('assets/css/print.css?v=' . sha1_file('assets/css/print.css')) ?>
  <?= js('assets/js/jquery.min.js') ?>
  <?= js('assets/js/images.js') ?>
  <?= js('assets/js/lightbox.js') ?>
  <?= js('assets/js/script.js?v=' . sha1_file('assets/js/script.js')) ?>
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
</head>

<body data-display="<?= $page->template() ?>">
  <header <?php if ($page->template() == 'essay') : ?>style="background-color: rgb(<?= $page->parent()->issue_color() ?>); box-shadow: 0px 11px 16px 0px rgba(<?= $page->parent()->issue_color() ?>,1);" <?php endif ?>>
    <h1><a href="<?= $site->url() ?>/books">INDEX BOOKS</a>,&nbsp;<span style=""><?= $page->title() ?></span></nav>
    </h1>
    <nav>

      <a href="/shop">Shop</a>,&nbsp;<a href="/">ABOUT</a> <span></span>
    </nav>
  </header>