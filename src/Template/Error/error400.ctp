<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;
$this->layout ='error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
if (extension_loaded('xdebug')) :
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>
<h2><?= h($message) ?></h2>
<p class="error" style="background-color: #30B1B6">
    <strong><?= __d('cake', '') ?> </strong>
    <?= __d('cake', '指定されたURL {0} は存在しません。', "<strong>'{$url}'</strong>") ?>
</p>
