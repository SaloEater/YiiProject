<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Student */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table border="1px solid black" style="border-collapse: collapse;" width="100%">
    <?php

        foreach ($model->attributes() as $attribute=>$value) {
            echo "<tr>" . "<td>" . $model->attributeLabels()[$value] . "</td>" . "<td>" . $model->$value . "</td>" . "</tr>";
        }

    ?>
    </table>

    <?php
    /*
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstName',
            'lastName',
            'age',
        ],
    ])
    */?>

    <?php //print_r($model) ?>

</div>
