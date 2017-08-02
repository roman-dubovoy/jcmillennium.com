<div class="col-xs-12">
    <?=$this->element("side_bar");?>
    <p><?=$this->Session->flash();?></p>
    <div class="col-xs-10 categories">
        <h4 style="display: inline-block;">Категории:</h4>
        <select name="group" id="group" class="form-control" onchange="window.location.href = this.value;" style="display: inline-block; width: 20%;">
            <option value="/products" <? if ($selectedGroup == 'all') echo "selected";?>>Все товары</option>
            <? foreach ($productGroupsList as $productGroup): ?>
                <option value="/products/category/<?=$productGroup['ProductGroup']['id']?>"
                    <? if ($selectedGroup == $productGroup['ProductGroup']['name']) echo "selected";?>>
                    <?=$productGroup['ProductGroup']['name']?>
                </option>
            <? endforeach; ?>
        </select>
    </div>
    <? if (!empty($productsList)): ?>
        <div id="products" class="col-xs-10">
            <? foreach ($productsList as $product): ?>
                <div class="col-xs-4 product-item">
                    <h4><?=$product['Product']['name']?></h4>
                    <div class="product-image-wrapper">
                        <img src="<?=$product['Product']['image'];?>" width="200" height="200">
                    </div>
                    <p class="product-description"><strong>Описание:</strong> <?=$product['Product']['description']?></p>
                    <p><strong>Категория:</strong> <?=$product['Product']['groupName']?></p>
                    <p><strong>Цена:</strong> <?=$product['Product']['cost']?> грн.</p>
                    <input type="hidden" value="<?=$product['Product']['id']?>">
                    <button class="btn btn-success btn-block add-to-bucket-btn">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        В корзину
                    </button>
                </div>
            <? endforeach; ?>
        </div>
    <? endif; ?>
</div>
