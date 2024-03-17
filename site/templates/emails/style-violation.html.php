<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
            background-color: #fff;
        }

        .container {
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        h1 {
            color: #0072ce;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        h2,
        h3 {
            color: #0072ce;
            margin-top: 20px;
        }

        p,
        ul,
        ol {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        ul,
        ol {
            /* list-style-type: disc; */
            padding-left: 30px;
        }

        li {
            margin-bottom: 10px;
            border-radius: 10px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .closing-para {
            text-align: center;
            font-weight: bold;
            color: #0072ce;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $allEmpty = true;
        foreach ($violations as $rule => $ruleData) {
            if (!empty($ruleData['violations'])) {
                $allEmpty = false;
                break;
            }
        }

        if ($allEmpty) : ?>
            <ul style="list-style: none;text-align: center;">
                <li>
                    <h2>🍾 Nothing Found!</h2>
                </li>
            </ul>
            <?php else :
            foreach ($violations as $rule => $ruleData) :
                if (!empty($ruleData['violations'])) : ?>
                    <h3><?= $rule ?></h3>
                    <p><?= $ruleData['explanation'] ?></p>
                    <ol>
                        <?php foreach ($ruleData['violations'] as $violation) : ?>
                            <li>
                                <?php echo ($violation) ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
        <?php endforeach;
        endif;
        ?>

        <!-- <p class="closing-para">As a volunteer editor, we appreciate your dedication. The suggestions provided here are intended to help maintain a consistent style across the content and enhance readability. Please review these possible issues and consider making updates as you see fit while keeping the style guide in mind. Thank you for your valuable contributions! 🙌</p> -->
    </div>
</body>

</html>