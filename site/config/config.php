<?php


function output_pdf($newPage)
{
  if ($newPage->template() == 'essay') :
    $pdf_name = $newPage->slug() . '.pdf';
    $outfile = $newPage->contentFileDirectory() . '/' . $pdf_name;
    $url = $newPage->previewUrl();
    exec('google-chrome --headless --print-to-pdf="' . $outfile . '" ' . $url . ' > /dev/null 2>/dev/null &');
  // exec('google-chrome-stable --headless --print-to-pdf="' . $outfile . '" ' . $url . ' > /dev/null 2>/dev/null &');
  endif;
}

return [
  'url' => 'https://index-journal.org/',

  'debug' => false,
  'markdown' => [
    'extra' => true
  ],
  'panel.install' => true,
  'diesdasdigital.meta-knight' => [
    'siteTitleAfterPageTitle' => false,
  ],
  'hooks' => [
    'page.update:after' => function ($newPage, $oldPage) {
      output_pdf($newPage);
    }
  ],

  // https://github.com/medienbaecker/kirby-autoresize
  'medienbaecker.autoresize.maxWidth' => 3000,

  # https://getkirby.com/docs/cookbook/performance/responsive-images
  'thumbs' => [
    'srcsets' => [
      'default' => [
        '300w'  => ['width' => 300],
        '600w'  => ['width' => 600],
        '900w'  => ['width' => 900],
        '1200w' => ['width' => 1200],
        '1800w' => ['width' => 1800]
      ],
      'avif' => [
        '300w'  => ['width' => 300, 'format' => 'avif'],
        '600w'  => ['width' => 600, 'format' => 'avif'],
        '900w'  => ['width' => 900, 'format' => 'avif'],
        '1200w' => ['width' => 1200, 'format' => 'avif'],
        '1800w' => ['width' => 1800, 'format' => 'avif']
      ],
      'webp' => [
        '300w'  => ['width' => 300, 'format' => 'webp'],
        '600w'  => ['width' => 600, 'format' => 'webp'],
        '900w'  => ['width' => 900, 'format' => 'webp'],
        '1200w' => ['width' => 1200, 'format' => 'webp'],
        '1800w' => ['width' => 1800, 'format' => 'webp']
      ],
    ]
  ]

];
