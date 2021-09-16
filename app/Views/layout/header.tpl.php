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
    <a href= "<?= $viewVars['router']->generate('home')?>"><img id='logo-big-bazar' src="../public/pictures/big-bazar.png" alt="logo big bazar"></a>
    <div id="description">Ce Site est simplement à titre de formation</div>
    <div id="search">
        <form action="">
            <input type="text" placeholder="Je recherche">
        </form>
        </div>
    <?php if (isset($_SESSION['email']))
    {?>
        <button id="btn-admin"> <a href="<?= $viewVars['router']->generate('logout')?>"> Déconnexion </a></button>
    <?php 
    }else{?>

        <button id="btn-login"> <a href="<?= $viewVars['router']->generate('login')?>"> Login </a></button>
    <?php
    }
    ?>
    
  
</div>
<div id="header-navbar">
    <nav id=navbar>
        <ul>
            <li><a href = ''>Maison </a></li>
            <li><a href = ''>Bricolage </a></li>
            <li><a href = ''>Jardinage </a></li>
            <li><a href = ''>Vêtements </a></li>
        </ul>
    </nav>
</div>
</header>