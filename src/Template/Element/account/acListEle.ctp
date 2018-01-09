<?php
/**
 * @var \App\View\AppView $this
 * @var $childClass
 * @var $patrons
 */
?>
<div class="container container-fluid">
    <div class="row">
        <div class="account-list">
            <table class="table table-bordered table-hover">
                <thead class="bg-primary">
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-3">保護者名</th>
                    <th class="col-md-1">児童番号</th>
                    <th class="col-md-3">児童名</th>
                    <th class="col-md-3">児童クラス</th>
                    <th class="col-md-1">児童年齢</th>
                </tr>
                </thead>
                <br>
                <?php
                if (empty($patrons)) {
                    echo '<tr><td colspan="6" class="center">一致するデータがありませんでした。</td></tr>';
                } else {
                    foreach ($patrons as $key => $patron) {
                        echo "<tbody>";
                        if ($patron->deleted == '0') {
                            echo '<tr';
                        } else {
                            echo '<tr class = "deleted_info"';
                        } ?>
                        onclick="window.open('<?= $this->URL->build(['controller' => 'Account', 'action' => 'individualinfo', 'id' => $patron->number]) ?>','ユーザ管理','width=700,height=600')">
                        <?php
                        echo '<td>' . ($key + 1) . '</td>';
                        echo '<td>' . $patron->username . '</td>';
                        echo '<td>' . $patron['_matchingData']['Children']['id'] . '</td>';
                        echo '<td>' . $patron['_matchingData']['Children']['username'] . '</td>';
                        echo '<td>' . $patron['_matchingData']['ChildClass']['class_name'] . '</td>';
                        echo '<td>' . $patron['_matchingData']['Children']['age'] . '</td>';
                        echo '</tr>';
                        echo '</tbody>';
                    }
                } ?>
            </table>
        </div>
    </div>
</div>