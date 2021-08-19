<form action="add-product" method="post" id="form-product">
    <div id="input-title" >
        <label class="form-label" for="product" name="title">Titre du produit</label>
        <input class="form-input" type="text" name=title required>
    </div>
    <div id="input-description" >
    <label class="form-label" for="product" name="description">Description</label>
        <textarea class="form-input" name="description" id="" ></textarea>
        <!-- <label class="form-label" for="product" name="description">Description </label>
        <input class="form-input" type="text"  name="description" required> -->
    </div>
    <div id="input-picture" >
        <label class="form-label" for="product" name="picture">Image</label>
        <input class="form-input" type="text" name="picture"required> 
    </div>
    <div id="input-price"  >
        <label class="form-label" for="product" name="price">Prix</label>
        <input class="form-input" type="text" name="price"required>
    </div>
    <input id="input-submit" type="submit" value="Enregistrer">
</form>
