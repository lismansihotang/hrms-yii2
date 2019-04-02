<?php
use yii\helpers\Html;

/* @var $model */
/* @var $image */
/* @var $modelInformasiPribadi */
?>
<div class="col-md-12">
    <h2>Resume</h2>
    <hr/>
</div>
<div class="col-md-2">
    <?php
    if (count($image) > 0) {
        echo Html::img('@web/upload/' . $image, ['class' => 'img img-responsive img-rounded img-thumbnail']);
    }
    ?>
</div>
<div class="col-md-4">
    <h3>Pribadi</h3>
    <table class="table table table-hover table-user-information">
        <?php
        if (count($modelInformasiPribadi) > 0) {
            echo Html::endTag('tr');
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Jenis Kelamin' . Html::endTag('td');
            echo Html::beginTag('td') . $modelInformasiPribadi['jk'] . Html::endTag('td');
            echo Html::endTag('tr');
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Tempat Lahir' . Html::endTag('td');
            echo Html::beginTag('td') . $modelInformasiPribadi['tmp_lahir'] . Html::endTag('td');
            echo Html::endTag('tr');
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Tgl. Lahir' . Html::endTag('td');
            echo Html::beginTag('td') . $modelInformasiPribadi['tgl_lahir'] . Html::endTag('td');
            echo Html::endTag('tr');
            echo Html::endTag('tr');
            echo Html::endTag('tr');
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Menikah' . Html::endTag('td');
            echo Html::beginTag('td') . $modelInformasiPribadi['status_menikah'] . Html::endTag('td');
            echo Html::endTag('tr');
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'No. Telp' . Html::endTag('td');
            echo Html::beginTag('td') . $modelInformasiPribadi['no_telp'] . Html::endTag('td');
            echo Html::endTag('tr');
            echo Html::endTag('tr');
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Alamat' . Html::endTag('td');
            echo Html::beginTag('td') . $modelInformasiPribadi['alamat'] . Html::endTag('td');
            echo Html::endTag('tr');
        }
        ?>
    </table>
</div>
<div class="col-md-6">
    <h3>Pekerjaan</h3>
    <table class="table table-hover table-user-information">
        <?php
        # History Departemen
        if (count($modelDepartemen) > 0) {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Departemen' . Html::endTag('td');
            echo Html::beginTag('td');
            echo Html::beginTag('ul');
            foreach ($modelDepartemen as $row) {
                echo Html::beginTag('li') . $row['singkatan'] . ' (' . $row['nm_dept'] . ')' . Html::endTag('li');
            }
            echo Html::endTag('ul');
            echo Html::endTag('td');
            echo Html::endTag('tr');
        } else {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Departemen' . Html::endTag('td');
            echo Html::beginTag('td') . '-' . Html::endTag('td');
            echo Html::endTag('tr');
        }
        # History Karir
        if (count($modelKarir) > 0) {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Karir/Jabatan' . Html::endTag('td');
            echo Html::beginTag('td');
            echo Html::beginTag('ul');
            foreach ($modelKarir as $row) {
                echo Html::beginTag('li') . $row['nm_jabatan'] . ' (' . $row['tgl_berlaku'] . ')' . Html::endTag('li');
            }
            echo Html::endTag('ul');
            echo Html::endTag('td');
            echo Html::endTag('tr');
        } else {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Karir/Jabatan' . Html::endTag('td');
            echo Html::beginTag('td') . '-' . Html::endTag('td');
            echo Html::endTag('tr');
        }
        # History Status Pekerjaan
        if (count($modelStatus) > 0) {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Status' . Html::endTag('td');
            echo Html::beginTag('td');
            echo Html::beginTag('ul');
            foreach ($modelStatus as $row) {
                echo Html::beginTag('li') . $row['nm_status'] . Html::beginTag('p', ['class' => 'text-muted']) . ' (' . $row['tgl_berlaku'] . ' s/d ' . $row['tgl_berakhir'] . ')' . Html::endTag('p') . Html::endTag('li');
            }
            echo Html::endTag('ul');
            echo Html::endTag('td');
            echo Html::endTag('tr');
        } else {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Status' . Html::endTag('td');
            echo Html::beginTag('td') . '-' . Html::endTag('td');
            echo Html::endTag('tr');
        }
        # History Inventaris
        if (count($modelInventaris) > 0) {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Inventaris' . Html::endTag('td');
            echo Html::beginTag('td');
            echo Html::beginTag('ul');
            foreach ($modelInventaris as $row) {
                echo Html::beginTag('li') . $row['nm_barang'] . Html::endTag('li');
            }
            echo Html::endTag('ul');
            echo Html::endTag('td');
            echo Html::endTag('tr');
        } else {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Inventaris' . Html::endTag('td');
            echo Html::beginTag('td') . '-' . Html::endTag('td');
            echo Html::endTag('tr');
        }
        # History Sanksi
        if (count($modelSanksi) > 0) {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Sanksi' . Html::endTag('td');
            echo Html::beginTag('td');
            echo Html::beginTag('ul');
            foreach ($modelSanksi as $row) {
                echo Html::beginTag('li') . $row['nm_jenis_sanksi'] . Html::beginTag('p', ['class' => 'text-muted']) . ' (' . $row['tgl_berlaku'] . ' s/d ' . $row['tgl_berakhir'] . ')' . Html::endTag('p') . Html::endTag('li');
            }
            echo Html::endTag('ul');
            echo Html::endTag('td');
            echo Html::endTag('tr');
        } else {
            echo Html::beginTag('tr');
            echo Html::beginTag('td') . 'Sanksi' . Html::endTag('td');
            echo Html::beginTag('td') . '-' . Html::endTag('td');
            echo Html::endTag('tr');
        }
        ?>
    </table>
</div>
<style>
    .table-user-information > tbody > tr {
        border-top: 1px solid rgb(221, 221, 221);
    }

    .table-user-information > tbody > tr:first-child {
        border-top: 0;
    }
</style>
