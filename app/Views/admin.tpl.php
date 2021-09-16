<?php


if(isset($_SESSION['flash_message'])) {
    echo '<div id="message">'.$_SESSION['flash_message'].'</div>';
    unset($_SESSION['flash_message']);
}

if (isset($_SESSION['email'])) {
    $currentUserEmail = $_SESSION['email'];
    $currentUserFirstName = $_SESSION['firstName'];
}else{
    header('Location: ' . $_SERVER['BASE_URI'] . '/login');
}

?>
<h1>Bienvenue sur le Back-Office <?= $currentUserFirstName?> </h1>
<button id="btn-add-product"> <a href="<?= $viewVars['router']->generate('form-add-product')?>"> Ajout produit </a></button>
<button id="btn-home"> <a href="<?= $viewVars['router']->generate('home')?>"> Retour à l'accueil </a></button>
<table>
      <tr>
          <th class='small-td'>id</th>
          <th>title</th>
          <th>Description</th>
          <th>Image</th>
          <th class='small-td'>Prix</th>
          <th class="action">Action</th>
      </tr>
      <!-- <tr> -->
<?php
    foreach($viewVars['listProducts'] as $product) { ?>
    <tr>
        <td class='small-td'><?= $product->getId()?></td>
        <td><?= $product->getTitle()?></td>
        <td><?= $product->getDescription()?></td>
        <td><img id="picture-product-admin" src="<?= $product->getPicture()?>" alt="photo du produit"></td>
        <td class='small-td'><?= $product->getPrice()?> &#x20AC;</td>
        <td class="action">
            <button id="btn-edit"><a href="<?= $viewVars['router']->generate('form-update-product',['id' => $product->getId()])?>">Edit</a></button>
            <button id="btn-delete"> <a href="<?= $viewVars['router']->generate('delete-product',['id' => $product->getId()])?>">Delete</a> </button>
        </td>
     </tr>
    
<?php
    }
?>
    <!-- </tr> -->
</table>

<?php
