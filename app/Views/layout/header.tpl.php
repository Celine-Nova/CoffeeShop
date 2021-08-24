
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $viewVars['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=$_SERVER['BASE_URI']?>/css/css-normalize.css">
    <link rel="stylesheet" href="<?=$_SERVER['BASE_URI']?>/css/style.css">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>
<body>
<header>
<div id="menu-burger-img">
    <img id='logo-maxicoffee' src="../public/pictures/maxicoffee.png" alt="logo maxicoffee">
    <img src="../public/pictures/champion_france_cafe.jpeg" alt="">
    <div id="search">
        <form action="">
            <input type="text" placeholder="Je recherche">
        </form>
        </div>
    <?php if (isset($_SESSION['email']))
    {?>
        <button id="btn-admin"> <a href="<?= $viewVars['router']->generate('logout')?>"> DECO </a></button>
    <?php 
    }
    ?>
        <button id="btn-login"> <a href="<?= $viewVars['router']->generate('login')?>"> Login </a></button>
</div>
<div id="header-navbar">
    <nav id=navbar>
        <ul>
            <li> <a href = ''>Machines à café </a></li>
            <li><a href = ''>Café grain & Moulu </a></li>
            <li><a href = ''>Capsules café </a></li>
            <li><a href = ''>Thé </a></li>
            <li><a href = ''>Accessoires </a></li>
        </ul>
    </nav>
</div>
</header>