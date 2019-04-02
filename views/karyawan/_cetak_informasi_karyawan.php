<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $model */
?>
<table border="0" cellpadding="1" cellspacing="0">
    <thead>
    <tr>
        <th style="border-top: 1px solid #333; border-bottom: 1px solid #333; border-left: 1px solid #333; border-right: 1px solid #333;">No</th>
        <th style="border-top: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">Karyawan</th>
        <th style="border-top: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">JK</th>
        <th style="border-top: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">NIK</th>
        <th style="border-top: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">Jabatan</th>
        <th style="border-top: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">Dept</th>
        <th style="border-top: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">DOJ</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    if (count($model) > 0) {
        foreach ($model as $row) {
            echo Html::beginTag('tr');
            echo Html::beginTag('td', ['style' => 'border-bottom: 1px solid #333; border-left: 1px solid #333; border-right: 1px solid #333;']) . $i . Html::endTag('td');
            echo Html::beginTag('td', ['style' => 'border-bottom: 1px solid #333; border-right: 1px solid #333;']) . $row['nama'] . Html::endTag('td');
            echo Html::beginTag('td', ['style' => 'border-bottom: 1px solid #333; border-right: 1px solid #333;']) . $row['jk'] . Html::endTag('td');
            echo Html::beginTag('td', ['style' => 'border-bottom: 1px solid #333; border-right: 1px solid #333;']) . $row['nik'] . Html::endTag('td');
            echo Html::beginTag('td', ['style' => 'border-bottom: 1px solid #333; border-right: 1px solid #333;']) . $row['jabatan'] . Html::endTag('td');
            echo Html::beginTag('td', ['style' => 'border-bottom: 1px solid #333; border-right: 1px solid #333;']) . $row['dept'] . Html::endTag('td');
            echo Html::beginTag('td', ['style' => 'border-bottom: 1px solid #333; border-right: 1px solid #333;']) . $row['doj'] . Html::endTag('td');
            echo Html::endTag('tr');
            $i++;
        }
    }
    ?>
    </tbody>
</table>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('karyawan/report-informasi-karyawan'); ?>';
</script>