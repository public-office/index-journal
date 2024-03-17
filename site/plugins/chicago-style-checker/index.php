<?php

class ChicagoStyleChecker
{
    private $validators; // Class-level declaration

    public function __construct()
    {
        $kirby = kirby();
        $this->validators = []; // Initialization in the constructor

        // Get all validators from the 'validators' page
        $validators = $kirby->page('validators')->children()->listed();
        foreach ($validators as $validator) {
            $title = $validator->title()->value();
            error_log('title: ' . var_export($title, true));  // It will log the value of $code before trim()

            $explanation = $validator->explanation()->value();
            error_log('explanation: ' . var_export($explanation, true));  // It will log the value of $code before trim()

            $function_code = $validator->function_code()->value();
            error_log('function_code before trim: ' . var_export($function_code, true));  // It will log the value of $code before trim()

            $active = $validator->active()->bool();
            error_log('active: ' . var_export($active, true));  // It will log the value of $code before trim()


            // If the validator is active, create a function from the code
            if ($active) {
                $function_code = trim($function_code);  // Additional sanitization
                $function = eval('return function($text) { ' . $function_code . ' };'); // Execute the eval() operation

                if (is_callable($function)) { // If the result is a valid callable function
                    $this->validators[$title] = [
                        'explanation' => $explanation,
                        'function' => $function
                    ];
                } else {
                    // Handle the error case here (maybe log an error or throw an exception)
                    error_log("Error: the code for validator '$title' does not return a valid callable function.");
                }
            }
        }
    }




    public function checkChicagoStyle($text)
    {
        $violations = [];
        // Run the checks
        foreach ($this->validators as $title => $validator) {
            $violations[$title] = [
                'explanation' => $validator['explanation'],
                'violations' => $validator['function']($text)
            ];
        }
        return $violations;
    }
}
