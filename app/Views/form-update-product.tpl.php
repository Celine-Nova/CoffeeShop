<?php
if (empty($_SESSION['email'])) {
    header('Location: ' . $_SERVER['BASE_URI'] . '/login');
}
?>
<form action="" method="post" id="form-product">
    <div id="input-title" >
        <label class="form-label" for="product" name="title">Titre du produit</label>
        <input class="form-input" type="text" name=title required value="<?= $viewVars['product']->getTitle() ?>">
    </div>
    <div id="input-description" >
    <label class="form-label" for="product" name="description">Description</label>
        <textarea class="form-input" name="description" value="" ><?= $viewVars['product']->getDescription() ?></textarea>
        <!-- <label class="form-label" for="product" name="description">Description </label>
        <input class="form-input" type="text"  name="description" required> -->
    </div>
    <div id="input-picture" >
        <label class="form-label" for="product" name="picture">Image</label>
        <input class="form-input" type="text" name="picture"required value="<?= $viewVars['product']->getPicture() ?>"> 
    </div>
    <div id="input-price"  >
        <label class="form-label" for="product" name="price">Prix</label>
        <input class="form-input" type="text" name="price"required value="<?= $viewVars['product']->getPrice() ?>">
    </div>
    <button type="submit">Enregistrer</button>
</form>
