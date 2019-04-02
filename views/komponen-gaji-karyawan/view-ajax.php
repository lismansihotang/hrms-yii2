<h2>Detail Informasi</h2>
<table class="table table-bordered table-hover">
    <tbody>
    <?php
    if (count($model) > 0) {
        foreach ($model as $row) {
            ?>
            <tr>
                <td><?php echo $row['nm_komponen']; ?></td>
                <td><?php echo number_format($row['nominal']); ?></td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
