<?php $this->Nodes->set($node); 
		$this->Html->addCrumb(__($title_for_layout) ,  '' , array('class' => 'active'));
?>
<div class="container">
<div class="row placeview">
	<div class="col-md-12 posttitleblock">
		<h1><?php echo __($this->Nodes->field('title')); ?></h1>
	</div>
	<div class="blog_section med_toppadder100 med_bottompadder100">
        <div class="container">
				<div id="node-<?php echo $this->Nodes->field('id'); ?>" class="node node-type-<?php echo $this->Nodes->field('type'); ?>">
					
					<?php
						echo $this->Nodes->info();
						echo $this->Nodes->body();
						echo $this->Nodes->moreInfo();
					?>
				</div>

				<?php if (CakePlugin::loaded('Comments')): ?>
				<div id="comments" class="node-comments">
				<?php
					$type = $types_for_layout[$this->Nodes->field('type')];

					if ($type['Type']['comment_status'] > 0 && $this->Nodes->field('comment_status') > 0) {
						echo $this->element('Comments.comments', array('model' => 'Node', 'data' => $node));
					}

					if ($type['Type']['comment_status'] == 2 && $this->Nodes->field('comment_status') == 2) {
						echo $this->element('Comments.comments_form', array('model' => 'Node', 'data' => $node));
					}
				?>
				</div>
				<?php endif; ?>
			</div>
	</div>
</div>
</div>