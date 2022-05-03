<h1>About</h1>
<?php
if (isset($_POST['about_text'])) {
    file_put_contents(DATABASE_ABOUT_TEXT, implode('|', [$_POST['about_text'], $_SESSION['email'], date('Y-m-d H:i:s')]));
    var_dump($_POST);
}else {
    var_dump($_POST);
}
$about_text = file_get_contents(DATABASE_ABOUT_TEXT);
$newText = explode("|", $about_text);
?>
<?php if (isLoged() === true) { ?>
    <form action="index.php?page=about" method="post">
        <textarea name="about_text" rows="10" cols="60"><?php echo $newText[0] ?></textarea>
        <button type="submit">Išsaugoti</button>
    </form>
<?php } else {
echo $newText[0];
};
?>
<br/>
<br/>
Parase: <?php echo $newText[1] ?><br/>
Kada parase: <?php echo $newText[2] ?><br/>