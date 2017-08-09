<div class="coaches col-xs-10">
    <? foreach ($coachesList as $coach): ?>
        <div class="coaches-item">
            <!-- 'http://placehold.it/300x300', -->
            <?=$this->Html->image('/img/coaches/' . $coach['Coach']['photo'],
                [
                    'alt' => 'coach',
                    'width' => '300',
                    'height' => '300',
                    'pathPrefx' => IMAGES_URL
                ]);
            ?>
            <div class="coach-description">
                <p class="coach-name"><?=$coach['Coach']['surname'] . ' ' . $coach['Coach']['name']
                    . ' ' . $coach['Coach']['last_name']?></p>
                <p class="coach-rank"><?=$coach['Coach']['description']?></p>
            </div>
        </div>
    <? endforeach; ?>
</div>
