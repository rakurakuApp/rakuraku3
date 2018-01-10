<?php
/**
 * @var \App\View\AppView $this
 * @var $childClass
 * @var $patrons
 */
?>
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
                echo '<tbody><tr><td colspan="6" class="center">一致するデータがありませんでした。</td></tr></tbody>';
            } else {
                for ($i = 0; $i < count($patrons) - 1; $i++) {
                    for ($j = $i + 1, $cnt = 0; $j < count($patrons); $j++) {
                        if ($patrons[$i]->number == $patrons[$j]->number) {
                            $cnt++;
                        } else {
                            for ($k = $j - $cnt; $k < $j; $k++) {
                                echo '<tr onclick = "window.open'
                                    ."('"
                                    .$this->URL->build(['controller' => 'Account', 'action' => 'individualinfo', 'id' => $patrons[$k]['number']])
                                    ."','ユーザ管理','width=700,height=600')"
                                    .'">';
                                echo '<td>' . ($k+1) . '</td>';
                                if ($k == $j - $cnt){
                                    echo "<td rowspan= '$cnt' style='vertical-align: middle'>" . $patrons[$i]['username'] . '</td>';
                                }
                                echo '<td>' . $patrons[$k]['_matchingData']['Children']['id'] . '</td>';
                                echo '<td>' . $patrons[$k]['_matchingData']['Children']['username'] . '</td>';
                                echo '<td>' . $patrons[$k]['_matchingData']['ChildClass']['class_name'] . '</td>';
                                echo '<td>' . $patrons[$k]['_matchingData']['Children']['age'] . '</td>';
                                echo '</tr>';
                            }
                            $i += $cnt - 1;
                            break;
                        }
                    }
                }
            } ?>
        </table>
    </div>
</div>
