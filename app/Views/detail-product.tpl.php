<div class="detail-product">
                
    <h2> <?= $viewVars['product']->getTitle() ?></h2>
    <img id="picture-product" src="<?= $viewVars['product']->getPicture()?>" alt="photo du produit"></a> 
    <p><?= $viewVars['product']->getDescription()?></p>
        <p><?= $viewVars['product']->getPrice() ?> &#x20AC;</p>
    </div>
<button> <a href="<?= $viewVars['router']->generate('home')?>"> Retour à l'accueil </a></button>

