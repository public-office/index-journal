<?
function output_pdf($page) {
  if($page->template() == 'essay'):
    $pdf_name = $page->slug().'.pdf';
    $outfile = $page->contentFileDirectory().'/'.$pdf_name;
    $url = $page->url();

    exec('google-chrome --headless --print-to-pdf="'.$outfile.'" '.$url. ' > /dev/null 2>/dev/null &');
  endif;
}

return [
  'debug' => true,
  'markdown' => [
    'extra' => true
  ],
  'panel.install' => true,
  'hooks' => [
    'page.update:after' => function($page, $oldPage) {
      output_pdf($page);
    }
  ]
];
?>
