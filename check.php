<?php

    // Aha! By using a hashing function, the password remains secret!
    if (superSecretHashingFunction($_GET['q']) == 1391) {
        print 'Good job! The answer is : ' . getenv('RIDDLE_3_ANSWER');
    } else {
        print 'Nope.';
    }

    // Who needs a library anyway, I can make an irreversible hashing function just fine!
    function superSecretHashingFunction($message) {
        // If rot13 worked for Caesar, it'll work for me!
        $rotated = '';
        $message = strtolower($message);
        for ($i = 0; $i < strlen($message); $i++) {
            $c = ord($message[$i]) - ord('a');
            $c = ($c + 13) % 26 + ord('a');
            $rotated .= chr($c);
        }
        
        // Hmm, now to convert this to a number...
        $sum = 0;
        for ($i = 0; $i < strlen($message); $i++) {
            $sum += ord($message[$i]);
        }
        $average = $sum / strlen($message);

        // Multiply by a prime, yeah, that's always good.
        $average *= 13;

        return $average;
    }
?>
