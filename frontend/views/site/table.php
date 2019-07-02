<?php
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 02.07.2019
 * Time: 19:49
 */

?>

<?= Html::beginForm([''], 'post') ?>
    <p>Кол-во строк: <input type="text" name="rows" ></p>
    <p>Кол-во столбцов: <input type="text" name="columns"></p>
    <input type="submit">
<?= Html::endForm() ?>

<?php
if (isset($_POST['rows']) && isset($_POST['columns'])) {
    $rows = (int)$_POST['rows'];
    $columns = (int) $_POST['columns'];
    if ($rows == 0 || $columns == 0) {
        return;
    }
    $table = "<table border='1px solid black' style=\"border-collapse:collapse\">";
    $naming = 1;
    $table .= "<tr>";
    for ($i = 0; $i < $columns; $i++) {
        $table .= "<th>" . ($i+1) . "</th>";
    }
    $table .= "</tr>";
    for($j = 0; $j < $columns - 1; $j++) {
        $table .= "<tr>";
        for ($i = 0; $i < $columns; $i++, $naming++) {
            $table .= "<td>" . $naming . "</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</table>";
    echo $table;
}
?>
