<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./public/css/style.css" rel="stylesheet" type="text/css" >
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
    <script src="./public/js/style.js"></script>
</head>
<body>
<div id="header">
<nav class="top-nav">
    <ul>
        <li>
            <a href="home">Home</a>
        </li>
        <li>
            <a href="about">About</a>
        </li>
        <li>
            <a href="news">News</a>
        </li>
        <li>
            <a href="posts.php">Blog</a>
        </li>
        <li>
            <a href="contact.php">Contact</a>
        </li>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="logout.php">Log out</a>
            <?php else : ?>
                <a href="login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
</div>
    <div id="content">
       <?php require_once "./mvc/views/pages/".$data["page"].".php" ?>
    </div>
    <div id="footer"></div>
</body>
</html>
