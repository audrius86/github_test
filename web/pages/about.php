<h1>About</h1>
<?php
$about_text = file_get_contents(DATABASE_ABOUT_TEXT);
$about_text = explode('|', $about_text);

if (isLoged() === true) {
    if (isset($_POST['about_text'])) {
        $about_text = [$_POST['about_text'], $_SESSION['email'], date('Y-m-d H:i:s')];
        file_put_contents(DATABASE_ABOUT_TEXT, implode('|', $about_text));
    }
    ?>
    <form action="index.php?page=about" method="post">
        <textarea name="about_text" rows="10" cols="60"><?php echo $about_text[0] ?></textarea>
        <button type="submit">Išsaugoti</button>
    </form>
    <?php
} else {
    echo $about_text[0];
}
?>
<br/>
<br/>
Parase: <?php echo $about_text[1] ?><br/>
Kada parase: <?php echo $about_text[2] ?><br/>