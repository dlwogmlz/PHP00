<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '1234',
    'opentutorials');

    $sql = "SELECT * FROM topic";
    $result = mysqli_query($conn, $sql);
    $list = '';
    while($row = mysqli_fetch_array($result)){
        $list = $list."<li><a
        href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
    }

    $article = array(
        'title' => 'Welcome',
        'description' => 'Hello, Web!'
    );
    $update_link = '';
    $delete_link = '';
    if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $article['title'] = htmlspecialchars($row['title']);
        $article['description'] = htmlspecialchars($row['description']);

        $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
        $delete_link = '
            <form action="process_delete.php" method="post">
                <input type="hidden" name="id" value="'.$_GET['id'].'">
                <input type="submit" value="delete">
            </form>
        ';
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <?=$list?>
        </ol>
        <a href="create.php">create</a>
        <?=$update_link?>
        <?=$delete_link?>
        <h2><?=$article['title']?></h2>
        <?=$article['description']?>
    </body>
</html>