<?php

use yii\bootstrap5\LinkPager;
use yii\widgets\ListView;
?>

<div class="row">
    <?php
    echo ListView::widget([
        'dataProvider' => $provider,
        'options' => [
            'tag' => null
        ],
        'layout' => "{summary}\n{items}\n{pager}",
        'summary' => 'Jami <b>{totalCount}</b> tadan {count}-{end} tasi ko`rsatilyapti',
        'itemView' => '_post',
        'itemOptions' => [
                'tag' => null,
        ],
        'pager' => [
            'class' => LinkPager::class,
            'maxButtonCount' => 3,
        ]
    ]);
    ?>
</div>