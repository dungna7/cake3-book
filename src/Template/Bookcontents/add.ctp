<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bookcontents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bookcontents form large-9 medium-8 columns content">
    <?= $this->Form->create($bookcontent) ?>
    <fieldset>
        <legend><?= __('Add Bookcontent') ?></legend>
        <?php
            echo $this->Form->control('bookId');
            echo $this->Form->control('contents');
            echo $this->Form->control('attach');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
