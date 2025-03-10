<a href="../index.php">Повернутися назад</a>

<?php
session_start();
include ("languages.php");

if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>".$_SESSION['error']."</p>";
    unset($_SESSION['error']);
}

$lang = $_GET['lang'] ?? ($_COOKIE['lang'] ?? 'ukr');
setcookie('lang', $lang, time() + (180 * 24 * 60 * 60));


$name = $_SESSION['name'] ?? '';
$password = $_SESSION['password'] ?? '';
$email = $_SESSION['email'] ?? '';
$gender = $_SESSION['gender'] ?? '';
$city = $_SESSION['city'] ?? '';
$favorites = $_SESSION['favorites'] ?? [];
$about = $_SESSION['about'] ?? '';

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 3</title>
</head>
<body>

    <p><?php echo $texts[$lang]['selected_lang']; ?></p>
    <a href="index.php?lang=ukr"><img src="ukr.png" alt="Українська" style = "width: 50px; height: auto; margin: 5px; cursor: pointer;"></a>
    <a href="index.php?lang=eng" ><img src="uk.png" alt="English" style = "width: 50px; height: auto; margin: 5px; cursor: pointer;"></a>
    <a href="index.php?lang=pl"><img src="pl.png" alt="Poland" style = "width: 50px; height: auto; margin: 5px; cursor: pointer;"></a>
    <a href="index.php?lang=de"><img src="de.png" alt="Deutsch" style = "width: 50px; height: auto; margin: 5px; cursor: pointer;"></a>
    <a href="index.php?lang=fr"><img src="fr.png" alt="Français" style = "width: 50px; height: auto; margin: 5px; cursor: pointer;"></a>

    <form id="registrationForm" action="upload.php" method="post" enctype="multipart/form-data">
        <label><?php echo $texts[$lang]['login']; ?>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        </label><br>
        
        <label><?php echo $texts[$lang]['password']; ?> 
            <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        </label><br>

        <label><?php echo $texts[$lang]['confirm_password']; ?>
            <input type="password" name="confirm_password" required>
        </label><br>

        <label><?php echo $texts[$lang]['email']; ?>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        </label><br>

        <label><?php echo $texts[$lang]['gender']; ?>
            <input type="radio" name="gender" value="чоловік" <?php echo ($gender == 'male') ? 'checked' : ''; ?>> <?php echo $texts[$lang]['male']; ?>
            <input type="radio" name="gender" value="жінка" <?php echo ($gender == 'female') ? 'checked' : ''; ?>> <?php echo $texts[$lang]['female']; ?>
        </label><br>

        <label><?php echo $texts[$lang]['city']; ?>
            <select name="city">
                <option value="Житомир" <?php echo ($city == 'city1') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city1']; ?></option>
                <option value="Київ" <?php echo ($city == 'city2') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city2']; ?></option>
                <option value="Львів" <?php echo ($city == 'city3') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city3']; ?></option>
                <option value="Одеса" <?php echo ($city == 'city4') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city4']; ?></option>
                <option value="Лондон" <?php echo ($city == 'city5') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city5']; ?></option>
                <option value="Варшава" <?php echo ($city == 'city6') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city6']; ?></option>
                <option value="Берлін" <?php echo ($city == 'city7') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city7']; ?></option>
                <option value="Париж" <?php echo ($city == 'city8') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city8']; ?></option>
            </select>
        </label><br>
        <label><?php echo $texts[$lang]['games']; ?><br> 
            <input type="checkbox" name="favorites[]" value="football" <?php echo ($favorites == 'game1') ? 'checked' : ''; ?>> <?php echo $texts[$lang]['game1']; ?> <br>
            <input type="checkbox" name="favorites[]" value="basketball" <?php echo ($favorites == 'game2') ? 'checked' : ''; ?>> <?php echo $texts[$lang]['game2']; ?> <br>
            <input type="checkbox" name="favorites[]" value="volleyball" <?php echo ($favorites == 'game3') ? 'checked' : ''; ?>> <?php echo $texts[$lang]['game3']; ?> <br>
            <input type="checkbox" name="favorites[]" value="chess" <?php echo ($favorites == 'game4') ? 'checked' : ''; ?>> <?php echo $texts[$lang]['game4']; ?> <br>
            <input type="checkbox" name="favorites[]" value="Word of Tanks" <?php echo ($favorites == 'game5') ? 'checked' : ''; ?>> <?php echo $texts[$lang]['game5']; ?>
        </label><br>
        <label><?php echo $texts[$lang]['about']; ?>
            <textarea name="about" rows="4" cols="20"><?php echo htmlspecialchars($about); ?></textarea>
        </label><br>

        <label><?php echo $texts[$lang]['photo']; ?>
            <input type="file" name="photo">
        </label><br>

        <button type="submit"><?php echo $texts[$lang]['register']; ?></button>
    </form>

</body>
</html>