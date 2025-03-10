    <?php

    function my_sin($x) {
        return sin($x);
    }

    function my_cos($x) {
        return cos($x);
    }

    function my_tg($x) {
        return tan($x);
    }

    function my_tg_custom($x) {
        if ($x == 0) {
            return "undefined";
        }
        return tan($x);
    }

    function power($x, $y) {
        return pow($x, $y);
    }

    function factorial($x) {
        if ($x < 0) {
            return "Error: Negative number";
        }
        $result = 1;
        for ($i = 1; $i <= $x; $i++) {
            $result *= $i;
        }
        return $result;
    }

    ?>