<?php
session_start();
include ("languages.php");

$lang = $_GET['lang'] ?? ($_COOKIE['lang'] ?? 'ukr');
setcookie('lang', $lang, time() + (180 * 24 * 60 * 60));
?>

<p><?php echo $texts[$lang]['login']; ?>: <?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?></p>
<p><?php echo $texts[$lang]['email']; ?>: <?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?></p>
<p><?php echo $texts[$lang]['gender']; ?>: <?php echo htmlspecialchars($_SESSION['gender'] ?? ''); ?></p>
<p><?php echo $texts[$lang]['city']; ?>: <?php echo htmlspecialchars($_SESSION['city'] ?? ''); ?></p>
<p><?php echo $texts[$lang]['games']; ?>: <?php echo htmlspecialchars(implode(', ', (array) $_SESSION['favorites'] ?? [])); ?></p>
<p><?php echo $texts[$lang]['about']; ?>: <?php echo nl2br(htmlspecialchars($_SESSION['about'] ?? '')); ?></p>

<?php if (!empty($_SESSION['photo'])): ?>
    <p><strong><?php echo $texts[$lang]['photo']; ?>:</strong><br>
    <img src="<?php echo $_SESSION['photo']; ?>" alt="Фото користувача" width="150"></p>
<?php endif; ?>

<p><a href="index.php?lang=<?php echo $lang; ?>"><?php echo $texts[$lang]['back']; ?></a></p>