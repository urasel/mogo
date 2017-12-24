<div class="stadiumImages view">
<h2><?php echo __('Stadium Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stadiumImage['StadiumImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stadiumImage['Point']['name'], array('controller' => 'points', 'action' => 'view', $stadiumImage['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($stadiumImage['StadiumImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($stadiumImage['StadiumImage']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stadium Image'), array('action' => 'edit', $stadiumImage['StadiumImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stadium Image'), array('action' => 'delete', $stadiumImage['StadiumImage']['id']), array(), __('Are you sure you want to delete # %s?', $stadiumImage['StadiumImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stadium Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stadium Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
