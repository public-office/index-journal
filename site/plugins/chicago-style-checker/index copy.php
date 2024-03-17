<?php




function checkSingleQuotationMarks($text)
{
    // Placeholder for single quotes within double quotes.
    $placeholder = 'PLACEHOLDER';

    // Regex to find single quotes within double quotes.
    $regexNestedQuotes = '/"[^"\\\\]*(?:\\\\.[^"\\\\]*)*"/s';

    // Replace all single quotes within double quotes with a placeholder.
    $text = preg_replace_callback($regexNestedQuotes, function ($matches) use ($placeholder) {
        return str_replace("'", $placeholder, $matches[0]);
    }, $text);

    // Split the text into sentences using the period, exclamation mark, and question mark as delimiters.
    $sentences = preg_split('/(?<=[.!?])\s+/', $text);

    // Initialize an array to hold the matched sentences.
    $matches = [];

    // Regex to find single quotes that are not part of a contraction or possessive form.
    $regexSingleQuotes = "/(^|\s|\n|\r)'[^']*'(\s|\n|\r|$)/";

    // Iterate over each sentence.
    foreach ($sentences as $sentence) {
        // Check if the sentence contains single quotes that are not part of a contraction or possessive form.
        if (preg_match_all($regexSingleQuotes, $sentence) > 0) {
            // Replace the placeholders with single quotes again.
            $sentence = str_replace($placeholder, "'", $sentence);

            // Add the sentence to the array of matches.
            $matches[] = $sentence;
        }
    }

    return $matches;
}

function checkPossessiveSingular($text)
{
    // First, replace all single quotes within double quotes with a placeholder.
    $text = preg_replace_callback("/\"[^\"]*(')[^\"]*\"/", function ($matches) {
        return str_replace("'", "PLACEHOLDER", $matches[0]);
    }, $text);

    // Split the text into sentences using the period, exclamation mark, and question mark as delimiters.
    $sentences = preg_split('/(?<=[.!?])\s+/', $text);

    // Initialize an array to hold the matched sentences.
    $matches = [];

    // Iterate over each sentence.
    foreach ($sentences as $sentence) {
        // Check if the sentence contains a word ending with "s'" followed by a whitespace.
        // Exclude sentences that have single quotes used for quotation.
        if (preg_match("/\b\w+s'(?=\s)/", $sentence) && !preg_match("/\s'[^']*'\s/", $sentence)) {
            // Replace the placeholders with single quotes again.
            $sentence = str_replace("PLACEHOLDER", "'", $sentence);

            // Add the sentence to the array of matches.
            $matches[] = $sentence;
        }
    }

    return $matches;
}

function checkEllipsisSpacing($text)
{
    // Split the text into sentences using the period, exclamation mark, and question mark as delimiters.
    $sentences = preg_split('/(?<=[.!?])\s+/', $text);

    // Initialize an array to hold the matched sentences.
    $matches = [];

    // Iterate over each sentence.
    foreach ($sentences as $sentence) {
        // Check if the sentence contains an ellipsis without spaces on either side.
        if (preg_match("/(^|[^ \t\n\r\f])…([^ \t\n\r\f]|$)/", $sentence) || preg_match("/(^|[^ \t\n\r\f])\.\.\.([^ \t\n\r\f]|$)/", $sentence)) {
            // Add the sentence to the array of matches.
            $matches[] = $sentence;
        }
    }

    return $matches;
}

function checkTextNumberRanges($text)
{
    // Match instances where a number range in the text (not in parentheses) uses a hyphen or en-dash.
    // Here we extend the matched text to the nearest period, exclamation mark, or question mark, so the surrounding context is included.
    preg_match_all("/[^.!?]*\b(?<!\()\d{2,4}-\d{2,4}\b(?!\))[^.!?]*[.!?]/", $text, $matches);

    // Flatten the array of matches.
    $matches = array_flatten($matches);

    return $matches;
}

function checkParenthesesNumberRanges($text)
{
    // Match instances where a number range in parentheses uses a hyphen.
    // Here we extend the matched text to the nearest period, exclamation mark, or question mark, so the surrounding context is included.
    preg_match_all("/[^.!?]*\(\d{2,4}-\d{2,4}\)[^.!?]*[.!?]/", $text, $matches);

    // Flatten the array of matches.
    $matches = array_flatten($matches);

    return $matches;
}

function checkOxfordCommas($text)
{
    // Split the text into sentences using the period, exclamation mark, and question mark as delimiters.
    $sentences = preg_split('/(?<=[.!?])\s+/', $text);

    // Initialize an array to hold the matched sentences.
    $matches = [];

    // Iterate over each sentence.
    foreach ($sentences as $sentence) {
        // Check if the sentence contains a list of three or more items without an Oxford comma.
        // We use negative lookbehind to ensure there's no comma before "and" or "or".
        if (preg_match("/\b[\w]+\b,\s+\b[\w]+\b(?<!,)\s+(and|or)\s+\b[\w]+\b/", $sentence)) {
            // Add the sentence to the array of matches.
            $matches[] = $sentence;
        }
    }

    return $matches;
}


function checkWholeNumberViolations($text)
{
    // Remove commas from text
    $text = str_replace(',', '', $text);

    // Split the text into sentences using the period, exclamation mark, and question mark as delimiters.
    $sentences = preg_split('/(?<=[.!?])\s+/', $text);

    // Initialize an array to hold the matched sentences.
    $matches = [];

    // Iterate over each sentence.
    foreach ($sentences as $sentence) {
        // Check if the sentence contains a numeric representation of whole numbers in hundreds, thousands or tens of thousands
        if (preg_match('/\b((100|200|300|400|500|600|700|800|900)|([1-9][0-9]{3,4}0{3}))\b/', $sentence)) {
            // Add the sentence to the array of matches.
            $matches[] = $sentence;
        }
    }

    return $matches;
}

function checkSpellingOutWholeNumbers($text)
{
    // Define an array of month names.
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // Remove contents within <em></em> tags
    $text = preg_replace('/<em>[^<]*<\/em>/', '', $text);

    // Split the text into sentences using the period, exclamation mark, and question mark as delimiters.
    $sentences = preg_split('/(?<=[.!?])\s+/', $text);

    // Initialize an array to hold the matched sentences.
    $matches = [];

    // Iterate over each sentence.
    foreach ($sentences as $sentence) {
        // Check if the sentence contains a number from 0 to 100 that is not spelled out.
        if (preg_match("/\b(0|100|[1-9][0-9]?)\b/", $sentence)) {
            // Check if the number is followed by or preceded by a month. If it is, continue to the next sentence.
            if (
                preg_match('/\b(?:' . implode('|', $months) . ')\s+\b(0|100|[1-9][0-9]?)\b/i', $sentence) ||
                preg_match('/\b(0|100|[1-9][0-9]?)\s+\b(?:' . implode('|', $months) . ')\b/i', $sentence)
            ) {
                continue;
            }

            // Add the sentence to the array of matches.
            $matches[] = $sentence;
        }
    }

    return $matches;
}




function checkPunctuationInsideQuotes($text)
{
    // Split the text into sentences using the period, exclamation mark, and question mark as delimiters.
    $sentences = preg_split('/(?<=[.!?])\s+/', $text);

    // Initialize an array to hold the matched sentences.
    $matches = [];

    // Iterate over each sentence.
    foreach ($sentences as $sentence) {
        // Check if the sentence contains a punctuation that appears outside the quotation marks, excluding colons and semicolons.
        if (preg_match('/"[^"]*"[.,!?]/', $sentence)) {
            // Add the sentence to the array of matches.
            $matches[] = $sentence;
        }
    }

    return $matches;
}



require 'vendor/autoload.php';

class ChicagoStyleChecker
{
    public function checkChicagoStyle($text)
    {
        // Run the checks
        $singleQuotationMarksViolations = checkSingleQuotationMarks($text);
        $possessiveSingularViolations = checkPossessiveSingular($text);
        $ellipsisSpacingViolations = checkEllipsisSpacing($text);
        $parenthesesNumberRangesViolations = checkParenthesesNumberRanges($text);
        $textNumberRangesViolations = checkTextNumberRanges($text);
        $oxfordCommasViolations = checkOxfordCommas($text);
        $spellingOutWholeNumbersViolations = checkSpellingOutWholeNumbers($text);
        $punctuationInsideQuotesViolations = checkPunctuationInsideQuotes($text);
        $wholeNumberViolations = checkWholeNumberViolations($text);

        // Only construct the violations array if there are violations
        if (!empty($singleQuotationMarksViolations) || !empty($possessiveSingularViolations) || !empty($ellipsisSpacingViolations) || !empty($parenthesesNumberRangesViolations) || !empty($textNumberRangesViolations) || !empty($oxfordCommasViolations) || !empty($spellingOutWholeNumbersViolations)) {
            $violations = [];

            // If there are punctuation inside quotes violations
            if (!empty($punctuationInsideQuotesViolations)) {
                $violations['6.9: Periods and commas in relation to closing quotation marks'] = [
                    'explanation' => 'Periods and commas precede closing quotation marks, whether double or single. See also <a href="https://www.chicagomanualofstyle.org/book/ed17/part2/ch06/tables/tbl001.html">table 6.1</a>.',
                    'violations' => $punctuationInsideQuotesViolations
                ];
            }

            // If there are Oxford comma violations
            if (!empty($oxfordCommasViolations)) {
                $violations['6.19: Serial (or “Oxford”) commas'] = [
                    'explanation' => 'I am not good at detecting missed Oxford commas (which requires deep contextual awareness), but note that the Oxford (or serial) comma should be used in lists of three or more items. This is the comma used immediately before the coordinating conjunction (usually “and” or “or”) in a series of three or more terms. For example, “a, b, and c” not “a, b and c”.',
                    'violations' => $oxfordCommasViolations
                ];
            }

            // If there are possessive singular form violations
            if (!empty($possessiveSingularViolations)) {
                $violations['7.18: Possessive of words and names ending in unpronounced “s”'] = [
                    'explanation' => 'Words and names ending in an unpronounced s form the possessive in the usual way—with the addition of an apostrophe and an s (which, when such forms are spoken, is usually pronounced). Use the ’s possessive form (e.g., Charles’s friend) for all singular nouns, regardless of the final consonant.',
                    'violations' => $possessiveSingularViolations
                ];
            }

            // If there are spelling out whole numbers violations
            if (!empty($spellingOutWholeNumbersViolations)) {
                $violations['9.2: Chicago’s general rule for numbers—zero through one hundred'] = [
                    'explanation' => 'In nontechnical contexts, Chicago advises spelling out whole numbers from zero through one hundred and certain round multiples of those numbers. However, where many numbers occur within a paragraph or a series of paragraphs, maintain consistency in the immediate context. If according to a given rule you must use numerals for one of the numbers in a given category, use them for all in that category. Times of day in even, half, and quarter hours are usually spelled out in text (e.g., three thirty in the afternoon), but numerals are used when exact times are emphasised (e.g., the train leave at 6:00 pm).',
                    'violations' => $spellingOutWholeNumbersViolations
                ];
            }

            // If there are number violations
            if (!empty($wholeNumberViolations = checkWholeNumberViolations($text))) {
                $violations['9.4: Hundreds, thousands, and hundred thousands'] = [
                    'explanation' => '<p>The whole numbers one through one hundred followed by <em>hundred</em>, <em>thousand</em>, or <em>hundred thousand</em> are usually spelled out (except in the sciences or with monetary amounts)—whether used exactly or as approximations. See also <a href="https://www.chicagomanualofstyle.org/book/ed17/part2/ch09/psec008.html">9.8</a>, <a href="https://www.chicagomanualofstyle.org/book/ed17/part2/ch09/psec024.html">9.24</a>.</p>',
                    'violations' => $wholeNumberViolations
                ];
            }

            // If there are text number ranges violations
            // Join textNumberRangesViolations and parenthesesNumberRangesViolations
            $allEnDashViolations = array_merge($textNumberRangesViolations, $parenthesesNumberRangesViolations);
            if (!empty($textNumberRangesViolations)) {
                $violations['9.60: The en dash for inclusive numbers'] = [
                    'explanation' => 'An en dash used between two numbers implies up to and including, or through. The en dash should not be used if from or between is used before the first of a pair of numbers; instead, from should be followed by to or through (or until), and between should be followed by and (from 75 to 110 (not from 75–110), from 1898 to 1903, between about 150 and 200). Inclusive years may be abbreviated following the pattern illustrated in [9.61](https://www.chicagomanualofstyle.org/book/ed17/part2/ch09/psec061.html). ',
                    'violations' => $allEnDashViolations
                ];
            }

            // If there are single quotation mark violations
            if (!empty($singleQuotationMarksViolations)) {
                $violations['13.30: Quotations and “quotes within quotes”'] = [
                    'explanation' => 'Quoted words, phrases, and sentences run into the text are enclosed in double quotation marks. Single quotation marks enclose quotations within quotations; double marks, quotations within these; and so on—that is, (“ ”) instead of single quotation marks (‘ ’) for enclosing quoted material within the text. The only exception to this is a “Quote ‘inside’ a quote,” so please ignore any instances detected. The same rule applies to “scare quotes.”',
                    'violations' => $singleQuotationMarksViolations
                ];
            }


            // If there are ellipsis spacing violations
            if (!empty($ellipsisSpacingViolations)) {
                $violations['13.58: Bracketed ellipses; 13.52: When not to use an ellipsis'] = [
                    'explanation' => 'The ellipsis should be three spaced periods (not a single unicode character) surrounded by spaces. That is, there should be a space character on either side of an ellipsis. An example of correct usage would be “this ... that”, not “this...that”. Also, be sure to remove square brackets ([...]) from ellipsis in quotes as they usually are unnecessary. <p>Lastly, ellipses are normally <em>not</em> used (1) before the first word of a quotation, even if the beginning of the original sentence has been omitted; or (2) after the last word of a quotation, even if the end of the original sentence has been omitted, unless the sentence as quoted is deliberately incomplete (see <a href="https://www.chicagomanualofstyle.org/book/ed17/part2/ch13/psec055.html">13.55</a>).</p>',
                    'violations' => $ellipsisSpacingViolations
                ];
            }

            // // If there are hyphen in number range violations
            // if (!empty($hyphenInNumberRangeViolations)) {
            //     $violations['9.64: Inclusive years;'] = [
            //         'explanation' => 'A hyphen should not be used to represent a range of numbers. Instead, an en dash should be used. For example, “1945–46”, not “1945-46”.',
            //         'violations' => $hyphenInNumberRangeViolations
            //     ];
            // }

            return $violations;
        }
    }
}
