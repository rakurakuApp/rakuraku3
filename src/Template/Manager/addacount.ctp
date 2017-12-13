<!-- ヘッダー -->
<?= $this->Html->css('/private/css/common/header.css') ?>
<?= $this->element('common\header') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
学生情報追加


<div class="container-fluid">
    <div class="center" id="label">
        <label><?= $this->fetch('title')?></label>
    </div>
    <div class="row">
        <form action="" method="post" id="stuManager">
            <input type="text" name="stunum" class="form-control" placeholder="学籍番号">
            <input type="text" name="stuname" class="form-control" placeholder="氏名">
            <!-- 学科 -->
            <select class="form-control select select-primary full" data-toggle="select" name="depnum">
                <?php foreach ($deps as $dep): ?>
                    <option value="<?= $dep->depnum; ?>"><?= $dep->depname; ?></option>
                <?php endforeach; ?>
            </select>
            <!-- 学年 -->
            <select class="form-control select select-primary full" data-toggle="select" name="old">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <option value="<?= $i; ?>"><?= $i . "年"; ?></option>
                <?php endfor; ?>
            </select>
            <div class="full buttons">
                <button type="button" onclick="window.close();" class="col-xs-5 btn btn-warning">キャンセル</button>
                <button type="submit" class="col-xs-offset-2 col-xs-5 btn btn-success">登録</button>
            </div>
        </form>
    </div>

    <div class="row" id="fieldAdd">
        <h7>CSV一括追加</h7>
        <a href="<?= $this->request->webroot ?>private/addstu.csv" class="btn btn-info full">一括追加用テンプレートダウンロード</a>

        <div class="full" id="fileadd">
            <form method="post" enctype="multipart/form-data" action="">
                <input type="file" name="studata" class="full">
                <button type="submit" class="btn btn-success">送信</button>
            </form>
        </div>
    </div>
</div>
