<?php

// session_start();
// dump($_SESSION);
if (isset($_SESSION['email'])) {
    $currentUserEmail = $_SESSION['email'];
}else{
    header('Location: ' . $_SERVER['BASE_URI'] . '/login');
}

?>
<h1>Bienvenue sur le Back-Office <?= $currentUserEmail?> </h1>
<button> <a href="<?= $viewVars['router']->generate('form-add-product')?>"> Ajout produit </a></button>
<button> <a href="<?= $viewVars['router']->generate('home')?>"> Retour à l'accueil </a></button>
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
