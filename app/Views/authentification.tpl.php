<?php

if(isset($_SESSION['flash_message'])) {
    echo '<div id="message">'.$_SESSION['flash_message'].'</div>';
    unset($_SESSION['flash_message']);
}
?>
<form action="" method="POST" autocomplete="on">
    <!-- <input type="text" placeholder="Prénom" name="firstName">
    <input type="text"placeholder="Nom" name="name"> -->
    <input type="email" name="email" id="email" placeholder="email@" autocomplete="on">
    <input type="password" placeholder="Mot de passe" name="password" autocomplete="on" >
    <input type="submit" value="Connecter">
</form>