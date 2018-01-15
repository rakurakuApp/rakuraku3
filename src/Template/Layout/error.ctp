<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap/bootstrap.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>
    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') ?>

    <?= $this->Html->css('/private/css/error/error.css') ?>
</head>
<body>
<div class="container" style="padding-top: 100px; margin-top: 50px">
        <div class="row">
            <div class="col-xs-4"></div>
            <div class="col-xs-4" id="box">
                <?php echo $this->Html->image('/webroot/img/error/400error.png', [
                    'alt' => 'image',
                    'id' => 'sryimg',
                    'style' => 'width:20%;height:20%'
                ]); ?>
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content')?>
                <div id="footer">
                </div>
            </div>
            <div class="col-xs-4"></div>
    </div>
</body>
</html>
