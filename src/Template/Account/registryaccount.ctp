<div class="container">
    <?php if ($this->request->getData('selectFormType') == 'user'): ?>
        <p>該当ユーザーに対して、メールを送信しました。</p>
        <button onclick="window.close()" class="btn btn-primary btn-lg center-block">閉じる</button>
    <?php else: ?>
        <p class="center">新規管理者アカウントを作成しました。<br>下記のIDと入力したパスワードでログインして下さい。<br>ID：<?= $newAccountID[0]['ID']; ?></p>
        <button onclick="window.close()" class="btn btn-primary btn-lg center-block">閉じる</button>
    <?php endif; ?>
</div>