<a href="/task3/index.php">Task 3</a>
<a href="/task4/index.php">Task 4</a>

<hr><h3>Завдання 1.1</h3>

<form method="post">

    <label for="text">Текст:</label>
    <input type="text" name="text"><br>
    <label for="search">Знайти:</label>
    <input type="text" name="search"><br>
    <label for="change">Замінити:</label>
    <input type="text" name="change"><br>
    <button type="submit" name="replace_submit">Виконати заміну</button><br>

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['replace_submit'])){
    $text = $_POST['text'];
    $search = $_POST['search'];
    $change = $_POST['change'];
    $result = preg_replace('/'. preg_quote($search, '/').'/', $change, $text, 1);

    echo "<p class='result'>Результат: $result</p>";
}

?>

<br><hr><h3>Завдання 1.2</h3>

<form method="post">

    <label for="cities">Назви міст (через пробіл):</label>
    <input type="text" name="cities"><br>
    <button type="submit" name="sort_submit">Впорядкувати за алфавітом</button><br>

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['sort_submit'])){
    $cities = $_POST['cities'];
    $cities_array = explode(' ', $cities);
    sort($cities_array);
    $sort = implode(' ', $cities_array);
    echo "<p>Відсортовані міста: $sort</p>";
}

?>

<br><hr><h3>Завдання 1.3</h3>

<form method="post">

    <label for="file">Вказати шлях до файлу:</label>
    <input type="text" name="file"><br>
    <button type="submit" name="file_submit">Отримати ім'я файлу</button><br>

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['file_submit'])){
    $file_path = $_POST['file'];
    $file_name = pathinfo( $file_path, PATHINFO_FILENAME);
    echo "<p>Ім'я файлу без розширення: $file_name</p>";
}

?>

<br><hr><h3>Завдання 1.4</h3>

<form method="post">

    <label for="date1">Вказати першу дату:</label>
    <input type="text" name="date1"><br>
    <label for="date2">Вказати другу дату:</label>
    <input type="text" name="date2"><br>
    <button type="submit" name="date_submit">Отримати кількість днів</button><br>

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['date_submit'])){
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $diff = abs(strtotime($date2) - strtotime($date1))/86400;
    echo "<p>Кількість днів між датами: $diff</p>";
}

?>

<br><hr><h3>Завдання 1.5</h3>

<form method="post">

    <label for="password_length">Вказати довжину пароля:</label>
    <input type="number" name="password_length" min="4" max="20"><br>
    <button type="submit" name="password_submit">Згенерувати пароль</button><br>

</form>

<?php

function strongPass($pass): bool{
    return preg_match('/[A-Z]/', $pass) &&
       preg_match('/[a-z]/', $pass) &&
       preg_match('/[0-9]/', $pass) &&
       preg_match('/[\+\-\*&%\^\$\[\];,\.\/\(\)]/', $pass) &&
       strlen($pass) > 8;

}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['password_submit'])){
    $length = (int)$_POST['password_length'];
    $char = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM[\+\-\*&%\^\$\[\];,\.\/\(\)]';
    $password = substr(str_shuffle($char), 0, $length);
    echo "Згенерований пароль: ".$password;
    $strong = strongPass($password) ? "Пароль міцний" : "Пароль слабкий";
    echo "<br>".$strong;
}

?>

<br><hr><h3>Завдання 2.1</h3>

<?php

function duplicates(array $array) {
    $counts = array_count_values($array);
    $duplicates = array_filter($counts, function($count) {
        return $count > 1;
    });

    if (!empty($duplicates)) {
        echo "Повторювані елементи: " . implode(", ", array_keys($duplicates));
    } else {
        echo "Немає повторюваних елементів.";
    }
}

$numbers = [1, 2, 3, 4, 2, 5, 6, 3, 7, 8, 1, 9, 10, 3];
duplicates($numbers);

?>

<br><hr><h3>Завдання 2.2</h3>

<?php

function generatePetName($syllables, $length = 3) {

    $name = "";
    for ($i = 0; $i < $length; $i++) {
        $name .= $syllables[array_rand($syllables)];
    }

    return ucfirst($name);
}

$syllables = ["mi", "ka", "to", "lu", "fi", "ba", "zo", "cha", "ru"];

$pets = [
    "Кішка" => generatePetName($syllables),
    "Собака" => generatePetName($syllables),
    "Хом’як" => generatePetName($syllables),
    "Кролик" => generatePetName($syllables)
];

foreach ($pets as $animal => $name) {
    echo "$animal: $name<br>";
}

?>

<br><hr><h3>Завдання 2.3</h3>

<?php

function createArray() {
    $length = rand(3, 7);
    $array = [];

    for ($i = 0; $i < $length; $i++) {
        $array[] = rand(10, 20);
    }

    return $array;
}

function processArrays($array1, $array2) {
    echo "Об'єднання двох масивів:\n";
    $mergedArray = array_merge($array1, $array2);
    echo "[" . implode(", ", $mergedArray) . "]<br>";

    echo "Видалення повторюваних елементів:\n";
    $uniqueArray = array_unique($mergedArray);
    echo "[" . implode(", ", $uniqueArray) . "]<br>";

    echo "Сортування масиву за зростанням:\n";
    sort($uniqueArray);
    echo "[" . implode(", ", $uniqueArray) . "]";

    return $uniqueArray;
}

$array1 = createArray();
$array2 = createArray();

echo "Згенеровані масиви:<br>";
echo "Масив 1: [" . implode(", ", $array1) . "]<br>";
echo "Масив 2: [" . implode(", ", $array2) . "]<br>";

$resultArray = processArrays($array1, $array2);

?>

<br><hr><h3>Завдання 2.4</h3>

<?php

$user = [
    "Анна" => "20",
    "Саша" => "19",
    "Владислав" => "20",
    "Олена" => "24",
];

function sortUser(&$user, $key): void{
    if($key === "age"){
        asort($user);
    } elseif($key === "name"){
        ksort($user);
    }
}
echo "Початковий масив:<br><br>";
sortUser($user, "name");
foreach($user as $name => $age){
    echo "$name - $age років<br>";
}

echo "<br>Відсортована по рокам:<br><br>";

sortUser($user, "age");
foreach($user as $name => $age){
    echo "$name - $age років<br>";
}

echo "<br>Відсортована по іменам:<br><br>";

sortUser($user, "name");
foreach($user as $name => $age){
    echo "$name - $age років<br>";
}

?>