
<?php
if(isset($_SESSION['flash_message'])) {
    echo '<div id="message">'.$_SESSION['flash_message'].'</div>';
    unset($_SESSION['flash_message']);
}
?>
<main>
<h1>Liste des produits </h1>
    <div id="container-product">
    <?php
        foreach($viewVars['products'] as $product){ ?>
                <div class="product">
                    <h2> <?= $product['title']?></h2>
                    <!-- filtre slice pour couper l'article ainsi ajouter "lire la suite" pour l'article complet -->
                    <p id="description-home"><?= substr($product['description'],0,50)?>...</p>
                    <a href="<?= $viewVars['router']->generate('detail-product',['id' => $product['id']])?>">  <img id="picture-product" src="<?= $product['picture']?>" alt="photo du produit"></a> 
                    <p><?= $product['price'] ?> 	&#x20AC;</p>
                </div>
    <?php     
        }
    ?>
    </div>
</main>