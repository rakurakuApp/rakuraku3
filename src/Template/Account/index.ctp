<!DOCTYPE html>
<html lang="ja">
<head>

    <!-- タイトルセット -->
    <?php $this->start('title');
    echo 'ユーザー一覧画面';
    $this->end(); ?>

    <!--ヘッダー設定-->
    <?= $this->element('common\header') ?>
    <?= $this->Html->css('/private/css/common/header.css') ?>

    <!--css設定-->
    <?php
    echo $this->Html->css('inquiry.css');
    ?>

</head>
<body>
<div>
    <table>
        <thead>
        <th>問合せ者名</th>
        <th>問い合わせ内容</th>
        </thead>

        <tbody>
        <?php foreach ($Inquiries as $inquiry): ?>
            <tr>
                <td><?= $inquiry->patron['username'] ?></td>
                <td><?= $inquiry->reason['detail'] ?></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>