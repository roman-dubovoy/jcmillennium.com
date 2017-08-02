<div class="col-xs-12">
    <?=$this->element("photo_slider");?>
    <?=$this->element("side_bar");?>
    <? if (!empty($this->Session->read('bucket'))): ?>
        <div id="bucket" class="col-xs-10">
            <h3>Ваша корзина:</h3>
            <? $commonSum = 0;?>
            <? foreach ($addedProducts as $product): ?>
                <div class="added-item">
                    <h4><strong><?=$product['Product']['name']?></strong></h4>
                    <img src="<?=$product['Product']['image']?>" width="150" height="150">
                    <p class="added-item-description"><?=$product['Product']['description']?></p>
                    <p class="added-item-amount"><strong>Количество:</strong> <?=$product['Product']['amountOfItems']?> шт.</p>
                    <p class="added-item-sum"><strong>Сумма:</strong> <?=$product['Product']['amountOfItems'] * $product['Product']['cost']?> грн.</p>
                    <? $commonSum += $product['Product']['amountOfItems'] * $product['Product']['cost']; ?>
                    <div class="remove-item-wrapper">
                        <input type="hidden" value="<?=$product['Product']['id']?>">
                        <button class="btn btn-danger remove-item-btn">
                            <a href="/bucket/delete/<?=$product['Product']['id']?>">
                                Удалить 1 шт.
                            </a>
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </div>
                </div>
            <? endforeach; ?>
            <p class="common-sum"><strong>Общая сумма:</strong> <?=$commonSum?> грн.</p>
        </div>
    <? else: ?>
        <h3 class="col-xs-10"><?=$this->Session->flash('message');?></h3>
    <? endif; ?>
</div>