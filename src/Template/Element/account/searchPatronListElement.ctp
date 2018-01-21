<table class="table table-bordered">
    <thead>
    <tr class="heavenBlue">
        <th class="heavenBlue_fonts">#</th>
        <th class="heavenBlue_fonts">保護者番号</th>
        <th class="heavenBlue_fonts">保護者名</th>
        <th class="heavenBlue_fonts">選択</th>
    </tr>
    </thead>
    <?php foreach ($patronData as $key => $data):; ?>
        <tr>
            <td><?= $key + 1; ?></td>
            <td><?= $data->number; ?></td>
            <td><?= $data->username; ?></td>
            <td>
                <button type="button"
                        class="btn btn-primary btn-sm full selectPatronBtn"
                        id='<?= $data->number; ?>' value='<?= $data->username; ?>'
                        data-dismiss="modal">選択
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>