<?php
/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface $bookcontent
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bookcontent'), ['action' => 'edit', $bookcontent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bookcontent'), ['action' => 'delete', $bookcontent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookcontent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookcontents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookcontent'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookcontents view large-9 medium-8 columns content">
    <h3><?= h($bookcontent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Attach') ?></th>
            <td><?= h($bookcontent->attach) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bookcontent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BookId') ?></th>
            <td><?= $this->Number->format($bookcontent->bookId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CategoryId') ?></th>
            <td><?= $this->Number->format($bookcontent->categoryId) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Contents') ?></h4>
        <?= $this->Text->autoParagraph(h($bookcontent->contents)); ?>
    </div>
</div>
