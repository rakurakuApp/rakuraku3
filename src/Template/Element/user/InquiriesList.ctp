<div class="row">
    <?php if (!empty($inquiries)): ?>
        <?php foreach ($inquiries as $key => $data): ?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="<?= $data['_matchingData']['Photos']['path'] ?>" alt="イメージが見つかりません"
                         style="width: 20rem;border-radius: 6px">
                    <div class="caption">
                        <h3 id="event"><?= $data['_matchingData']['Events']['event'] ?></h3>
                        <!-- 対応済みかどうか -->
                        <?php if ($data['already']) {
                            echo '<p>保育士：対応済み</p>';
                        } else {
                            echo '<p>保育士：未対応</p>';
                        }
                        ?>
                        <p>理由：<?= $data['_matchingData']['Reason']['detail'] ?></p>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-warning center-block deleteInq" type="button" style="width: 80%"
                                        name="deleteInq_<?= $key ?>"
                                        value="<?= $data->id ?>" <?php if ($data->already == 1): ?>disabled<?php endif; ?>>
                                    問い合わせを取り消す
                                </button>
                            </div>
                        </div>

                        <p id="inqDate">
                            問い合わせ日付：<?= substr($data['created'], 0, strpos($data['created'], ',')) ?></p>
                    </div><!-- /.caption -->
                </div><!-- /.thumbnail -->
            </div><!-- /.col-sm-6.col-md-3 -->
        <?php endforeach; ?>
    <?php else: ?>
        <p>データがありません</p>
    <?php endif; ?>
</div>