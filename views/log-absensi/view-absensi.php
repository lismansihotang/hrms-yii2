<?php
use yii\helpers\Html;
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <?php
        echo Html::a(
            'Print',
            '#',
            ['class' => 'btn btn-primary', 'encodeLabels' => false]
        ); ?>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Tgl</th>
                <th>Jam Kerja</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($model) > 0) {
                $i = 1;
                foreach ($model as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $key; ?></td>
                        <td></td>
                        <td><?php
                            if (array_key_exists('in', $value) === true) {
                                echo $value['in'];
                            }
                            ?></td>
                        <td><?php
                            if (array_key_exists('out', $value) === true) {
                                echo $value['out'];
                            } ?></td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

