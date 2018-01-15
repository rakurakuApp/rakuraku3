<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>
    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') ?>
</head>
<body>
<div class="container" style="padding-top: 50px">
    <div class="row" style="width: 40%">
        <div class="col-xs-4" style="text-align: right">
            <?php echo $this->Html->image('/webroot/img/error/400error.png', [
                'alt' => 'image',
                'style' => 'width:10%;height:10%'
            ]); ?>
        </div>
        <div class="col-xs-8">
            <div class="row" id="container">
                <div class="col-lg-4 " id="header">
                    <h1>404</h1>
                </div>
                <div class="col-lg-4" id="header">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content')?>
                </div>
                <div class="col-lg-4" id="header"></div>
            </div>
        </div>
//display:block;が原因
        <div id="footer">
            <?= $this->Html->link(__('戻る'), 'javascript:history.back()') ?>
        </div>
    </div>
</body>
</html>
