<h1>確認項目</h1>

<div class="container">
    <p>以下の情報を追加登録します。<br>よろしいですか？</p>
    <!-- 前回入力ラジオボタンの種別により表示項目を切り替える -->
    <?php if($this->request->getData('selectFormType') == 'user'):?>
    <?php elseif(($this->request->getData('selectFormType') == 'child')):?>
    <?php else:?>
    <?php endif;?>
</div>