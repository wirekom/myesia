<?php echo $form->textFieldRow($menu, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($menu, 'url', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textAreaRow($menu, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->dropDownListRow($menu, 'priority', $menu->getPriorityOptions()); ?>
<?php echo $form->dropDownListRow($menu, 'parent_id', $menu->getMenuOptions()); ?>  
<?php echo $form->checkBoxRow($menu, 'published', array('class' => 'span5')); ?>

