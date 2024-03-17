<?php
function removeImageTags($text)
{
    // Remove the image tags
    return preg_replace('/\(image:.*?\)/', '', $text);
}

function remove_anchor_tags($input)
{
    return preg_replace('#<a[^>]*>(.*?)</a>#i', '', $input);
}


Kirby::plugin('lettau/send-cmos-email', [
    'routes' => [
        [
            'pattern' => 'check-style/(:all)',
            'method' => 'GET',
            'action'  => function ($page) {

                // Check if a user is logged in

                if (kirby()->user()) {
                    $page = page($page);

                    if ($page->template() == 'review') {
                        $text = $page->text()->value();
                        // Remove image tags
                        $text = removeImageTags($text);
                        $text = kirbytext($text);
                        $text = remove_anchor_tags($text);


                        // Grammar Check
                        $styleChecker = new ChicagoStyleChecker();
                        $violations = $styleChecker->checkChicagoStyle($text);

                        // error_log('violations: ' . var_export($violations, true));  // It will log the value of $code before trim()
                        // error_log('text: ' . var_export($text, true));  // It will log the value of $code before trim()
                        // error_log('page title: ' . $page->title());
                        // error_log('email_content: ' . print_r($email_content, true));

                        // Only send email if there are any violations

                        try {
                            kirby()->email([
                                'to' => kirby()->user()->email(),
                                'bcc' => 'paris.lettau@gmail.com',
                                'from' => ['stylebot@memoreview.net' => 'Chicago StyleBot'], // Replace with your info email

                                'subject' => 'Chicago Manual of Style check for ' . $page->title(),
                                'template' => 'style-violation',
                                'data' => [
                                    'violations' => $violations,
                                    'page' => $page
                                ],
                            ]);
                        } catch (Exception $error) {
                            throw new Exception('The email could not be sent: ' . $error->getMessage());
                        }
                    }
                    return ['status' => 'success: '];
                } else {
                    // return an error message if no user is logged in
                    return ['status' => 'error', 'message' => 'Unauthorized'];
                }
            }
        ],
    ]
]);
