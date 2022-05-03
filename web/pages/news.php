<?php
$action = $_GET['action'] ?? null; //GET parametrai is linko.
?>

<?php if ($action === 'edit') { ?>
    <h1>Naujienos redagvimas</h1>
<?php } else { ?>
    <h1>Naujienos</h1>
<?php } ?>

<?php
$news = file_get_contents(DATABASE_NEWS);
if (isLoged() === true) {
    if ($action === 'delete') {
        $id = $_GET['id'];
        $news = explode('#', $news); // is stringo i masyva
        $news = array_reverse($news);
        unset($news[$id]);
        $news = array_reverse($news);
        $news = implode('#', $news); //is masyvo i stringa
        file_put_contents(DATABASE_NEWS, $news);
    } else if ($action === 'edit') {
        $id = $_GET['id'];
        $news = explode('#', $news);
        $news = array_reverse($news);
        $new = explode('|', $news[$id]);
        if (isset($_POST['text'])) {
            $new[0] = $_POST['text'];
            $news[$id] = implode('|', $new);
            $news = array_reverse($news);
            $news = implode('#', $news);
            file_put_contents(DATABASE_NEWS, $news);
            echo 'naujiena issaugota';
        }
    } else {
        if (isset($_POST['text'])) {
            if (!empty($_POST['text'])) {
                $new = [$_POST['text'], $_SESSION['email'], date('Y-m-d H:i:s')];
                $new = implode('|', $new);

                // Pirmas budas
                if (!empty($news)) {
                    $news .= '#' . $new;
                } else {
                    $news = $new;
                }
                file_put_contents(DATABASE_NEWS, $news);

                // Antras budas
//            $file = fopen(DATABASE_NEWS, "a+");
//            if (!empty($news)) {
//                $data = '#' . $new;
//            } else {
//                $data = $new;
//            }
//            fputs($file, $data);
//            fclose($file);

                echo 'Naujiena irasyta';
            } else {
                echo 'Klaida';
            }
        }
    }


    ?>

    <?php if ($action === 'edit') { ?>
        <form action="index.php?page=news&action=edit&id=<?php echo $id ?>" method="post">
            <textarea name="text" rows="10" cols="60"><?php echo $new[0] ?></textarea><br/>
            <button type="submit">Issaugoti</button>
        </form>
    <?php } else { ?>

        <form action="index.php?page=news" method="post">
            <textarea name="text" rows="10" cols="60"></textarea><br/>
            <button type="submit">Irasyti</button>
        </form>
    <?php } ?>

    <?php
}
?>
<br/>
<br/>
<ul>
    <?php
    if ($action != 'edit') {
        $news = explode('#', $news);
        $news = array_reverse($news);
        foreach ($news as $id => $new) {
            $new = explode('|', $new);
            ?>
            <li>
                Naujiena: <?php echo $new[0] ?><br/>
                Parase: <?php echo $new[1] ?><br/>
                Data: <?php echo $new[2] ?><br/>
                <?php if (isLoged() === true) { ?>
                    <br/>
                    <a href="index.php?page=news&action=delete&id=<?php echo $id ?>">Istrinti</a><br/>
                    <a href="index.php?page=news&action=edit&id=<?php echo $id ?>">Redaguoti</a><br/>
                <?php } ?>
                <hr>
            </li>
            <?php
        }
    }
    ?>
</ul>


<!--//Mano variantas-->
<!--<h1>Naujienos</h1>-->
<!---->
<?php
//$news_text = file_get_contents(DATABASE_NEWS_TEXT);
//$news_text = explode('#', $news_text);
//array_pop($news_text);
//
//if (isLoged() === true) {
//    if (isset($_POST['news_text'])) {
//        $news_text = [$_POST['news_text'], $_SESSION['email'], date('Y-m-d H:i:s')];
//        file_put_contents(DATABASE_NEWS_TEXT, implode('|', $news_text) . '#', FILE_APPEND);
//    }
//    ?>
<!--    <form action="index.php?page=news" method="post">-->
<!--        <textarea name="news_text" rows="10" cols="60" placeholder="Write your news"></textarea>-->
<!--        <button type="submit">Išsaugoti</button>-->
<!--    </form>-->
<!--    --><?php
//    foreach (array_reverse($news_text) as $new) {
//        $value = explode('|', $new);
//
//        echo 'News content: ' . $value[0] . '<br>';
//        echo 'Author: ' . $value[1] ?? null . '<br>';
//        echo 'Created at: ' . $value[2] ?? null . '<br>';
//        echo "<br>";
//    }
//    ?>
<!--    ?>-->
<!--    --><?php
//} else {
//    foreach (array_reverse($news_text) as $new) {
//        $value = explode('|', $new);
//
//        echo "News content: $value[0] <br>";
//        echo "Author: $value[1] <br>";
//        echo "Created at: $value[2] <br>";
//        echo "<br>";
//    }
//}
//?>
<!--<br/>-->
<!--<br/>-->


<!--naujienas gali rasyti tik prisijunge vartotojai.-->
<!--naujienos saugomos i faila news.txt-->
<!--naujienu gali buti daugiau nei viena-->
<!--naujienos infomracija kas ir kada parase naujiena-->
<!--rodyti naujienu sarasa nuo naujausios iki seniausios -->