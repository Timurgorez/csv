<?php
use kartik\file\FileInput;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>CSV Spliter</h1>
<!--        --><?php
//            echo '<label class="control-label">Upload Document</label>';
//            echo FileInput::widget([
//            'name' => 'exFile',
//            ]);
//        ?>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'exFile')->fileInput() ?>
        <?= $form->field($model, 'column')->textInput() ?>
        <?= $form->field($model, 'spliter')->textInput() ?>


        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <p class="lead">You have successfully created your Yii-powered application.</p>


        <?php

        $arrLetter = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        var_dump( $lastCell );

        $arrData = [];
        $firstRow = 1;

        echo '<table class="table">';
        for ($row = 1; $row <= $lastRow; $row++) {
            if($row === 1) {
                echo '<thead style="background:grey; color:#fff;">';
                echo "<tr>";
                for($cell = 0; $cell <= array_search($lastCell, $arrLetter); $cell++){
                    echo "<th>";
                    echo $worksheet->getCell($arrLetter[$cell].$row)->getValue();
                    echo "</th>";
                }
                echo "</tr>";
                echo "</thead>";
            } else {
                echo "<tr>";
                $arrCurrent = [];
                for($cell = 0; $cell <= array_search($lastCell, $arrLetter); $cell++){
                    echo "<td>";
                    echo $worksheet->getCell($arrLetter[$cell].$row)->getValue();
                    echo "</td>";

                    $check = is_string($worksheet->getCell($arrLetter[$cell].$row)->getValue()) || is_numeric($worksheet->getCell($arrLetter[$cell].$row)->getValue());
                    $val = $check ? $worksheet->getCell($arrLetter[$cell].$row)->getValue() : null;
                    $arrCurrent[$worksheet->getCell($arrLetter[$cell].$firstRow)->getValue()] = $val;
                }
                echo "</tr>";
                array_push($arrData, $arrCurrent);
            }

        }
        echo "</table>";

        foreach ($arrData as $rows){
            foreach ($rows as $row){
                var_dump($row);
                echo '|||';
            }
            echo '<br>';
        }

        echo '<pre>';
//        var_dump($arrData);
        echo '</pre>';
        ?>

    </div>

</div>
