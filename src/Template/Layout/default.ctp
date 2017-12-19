<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <!--css-->
    <?= $this->Html->css('bootstrap/bootstrap.css') ?>
    <?= $this->Html->css('flat-ui/flat-ui.css') ?>
    <?= $this->Html->css('/private/css/common/header.css') ?>
    <?= $this->Html->css('/private/css/common/sidemenu.css') ?>
    <?= $this->Html->css('/private/css/common/pure-drawer.css') ?>
    <?= $this->Html->css('/private/css/common/app.css') ?>
    <?= $this->fetch('css') ?>

    <!--js-->
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js') ?>
    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
</body>
</html>
