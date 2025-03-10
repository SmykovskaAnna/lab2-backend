<a href="index.php">Повернутися назад</a>

<?php

require_once "Function/func.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["x"]) && isset($_POST["y"])) {
        $x = $_POST["x"];
        $y = $_POST["y"];

        if (is_numeric($x) && is_numeric($y)) {
            $x = (float)$x;
            $y = (float)$y;

            $power = power($x, $y);
            $factorial = factorial($x);
            $myTg = my_tg($x);
            $sinX = sin($x);
            $cosX = cos($x);
            $tanX = tan($x);

            echo "<table border='1' style='background-color: yellow; text-align: center;'>";
            echo "<tr><th>x^y</th><th>x!</th><th>my_tg(x)</th><th>sin(x)</th><th>cos(x)</th><th>tg(x)</th></tr>";
            echo "<tr>";
            echo "<td>$power</td>";
            echo "<td>$factorial</td>";
            echo "<td>$myTg</td>";
            echo "<td>$sinX</td>";
            echo "<td>$cosX</td>";
            echo "<td>$tanX</td>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo "<p style='color: red;'>Помилка: Введені значення мають бути числовими.</p>";
        }
    } else {
        echo "<p style='color: red;'>Помилка: Будь ласка, введіть значення для x і y.</p>";
    }
}

?>