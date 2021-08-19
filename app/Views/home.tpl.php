
<main>
<h1>Liste des produits </h1>
    <div id="container-product">
    <?php
        foreach($viewVars['products'] as $product){ ?>
                <div class="product">
                    <h2> <?= $product['title']?></h2>
                    <p><?= $product['description']?></p>
                    <a href="<?= $viewVars['router']->generate('detail-product',['id' => $product['id']])?>">  <img id="picture-product" src="<?= $product['picture']?>" alt="photo du produit"></a> 
                    <p><?= $product['price'] ?> 	&#x20AC;</p>
                </div>
    <?php     
        }
    ?>
    </div>
</main>