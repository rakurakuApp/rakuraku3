<?php
/**
 * @var \App\View\AppView $this
 * @var $patrons
 */
?>
<!-- 検索フォーム生成 -->
<?= $this->Form->create(null, [
    'type' => 'post',
    'class' => 'form-inline',
]); ?>
<div class="row">
    <!-- 児童番号 -->
    <div class="col-md-4 col-xs-6">
        <?= $this->Form->label('child-id', '児童番号', [
            'class' => 'control-label'
        ]); ?>
        <?= $this->Form->text("child-id", [
            'type' => 'text',
            'class' => 'form-control search-topic',
            'id' => 'child-id',
            'name' => 'child-id',
            'default' => 'テスト'
        ]); ?>
    </div>
    <!-- 児童組 -->
    <div class="col-md-4 col-xs-6">
        <?= $this->Form->label('child-class', '児童組', [
            'class' => 'control-label'
        ]); ?>
        <?= $this->Form->select('child-class', $options = [
            'empty' => '組を選択',
            '1' => 'test1',
            '2' => 'test2'
        ], $attribute = [
            'class' => 'form-control search-topic',
            'id' => 'child-class'
        ]); ?>
    </div>
    <!-- 児童氏名 -->
    <div class="col-md-4 col-xs-6">
        <?= $this->Form->label('child-username', '児童名', [
            'class' => 'control-label'
        ]); ?>
        <?= $this->Form->text("child-username", [
            'type' => 'text',
            'class' => 'form-control search-topic',
            'id' => 'child-username',
            'name' => 'child-username',
            'default' => 'テスト'
        ]); ?>
    </div>
    <!-- 保護者氏名 -->
    <div class="col-md-4 col-xs-6">
        <?= $this->Form->label('patron-username', '保護者名', [
            'class' => 'control-label'
        ]); ?>
        <?= $this->Form->text("patron-username", [
            'type' => 'text',
            'class' => 'form-control search-topic',
            'id' => 'patron-username',
            'name' => 'patron-username',
            'default' => 'テスト'
        ]); ?>
    </div>
    <!-- 除外垢表示 -->
    <div class="col-md-4 col-xs-6">
        <?= $this->Form->label('showDeleteChk', '削除済アカウント表示', [
            'class' => 'checkbox center-block'
        ]); ?>
        <?= $this->Form->checkbox("showDeleteChk", [
            'checked' => 'true',
            'class' => 'checkbox',
            'id' => 'showDeleteChk'
        ]) ?>
        <!-- 検索 -->
        <?= $this->Form->submit("検索", [
            'class' => 'btn btn-primary'
        ]) ?>
    </div>
    <?= $this->Form->end(); ?>
    <!-- 垢追加 -->
    <div class="col-md-4 col-xs-6">
        <button class="btn btn-warning">アカウント追加</button>
    </div>
</div>

<div class="row" id="content">
    <table class="table-bordered table-responsive">
        <?= $this->Html->tableHeaders(
            [
                ['保護者名' => ['class' => 'col-md-4 col-xs-4']],
                ['児童番号' => ['class' => 'col-md-2 col-xs-2']],
                ['児童名' => ['class' => 'col-md-4 col-xs-4']],
                ['児童組' => ['class' => 'col-md-2 col-xs-2']]
            ],
            ['class' => 'bg-primary']
        );?>
        
            <?= $this->Html->tableCell($patrons);?>
    </table>
</div>
