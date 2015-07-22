<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'activity',
    'type'=>'horizontal',
)); ?>
 
<fieldset>
 
    <legend>创建活动</legend>
 
    <?php echo $form->textFieldRow($model, 'activity_name'); ?>
    <?php echo $form->textFieldRow($model, 'company_name'); ?>
    <?php echo $form->textFieldRow($model, 'telephone'); ?>
    <?php echo $form->textFieldRow($model, 'start_time', array('value'=>date('Y-m-d H:i:s',time()))); ?>
    <?php echo $form->textFieldRow($model, 'end_time',array('value'=>date('Y-m-d H:i:s',time()+8*3600))); ?>
    <?php echo $form->textFieldRow($model, 'location'); ?>
    <?php //echo $form->textFieldRow($model, 'time_remaining'); ?>
    <?php //echo $form->textFieldRow($model, 'relative_distance'); ?>
    <?php echo $form->textAreaRow($model, 'goods', array('class'=>'span8', 'rows'=>5)); ?>
    <?php //echo $form->fileFieldRow($model, 'fileField'); ?>

    
    <?php //echo $form->dropDownListRow($model, 'dropdown', array('Something ...', '1', '2', '3', '4', '5')); ?>
    <?php //echo $form->dropDownListRow($model, 'multiDropdown', array('1', '2', '3', '4', '5'), array('multiple'=>true)); ?>
    <?php //echo $form->fileFieldRow($model, 'fileField'); ?>
    <?php //echo $form->textAreaRow($model, 'textarea', array('class'=>'span8', 'rows'=>5)); ?>
    <?php //echo $form->uneditableRow($model, 'uneditable'); ?>
    <?php //echo $form->textFieldRow($model, 'disabled', array('disabled'=>true)); ?>
    <?php //echo $form->textFieldRow($model, 'prepend', array('prepend'=>'@')); ?>
    <?php //echo $form->textFieldRow($model, 'append', array('append'=>'.00')); ?>
    <?php //echo $form->checkBoxRow($model, 'disabledCheckbox', array('disabled'=>true)); ?>
    <?php //echo $form->checkBoxListInlineRow($model, 'inlineCheckboxes', array('1', '2', '3')); ?>
    <?php /* echo $form->checkBoxListRow($model, 'checkboxes', array(
        'Option one is this and that—be sure to include why it\'s great',
        'Option two can also be checked and included in form results',
        'Option three can—yes, you guessed it—also be checked and included in form results',
    ), array('hint'=>'<strong>Note:</strong> Labels surround all the options for much larger click areas.'));  */?>
    <?php //echo $form->radioButtonRow($model, 'radioButton'); ?>
    <?php /* echo $form->radioButtonListRow($model, 'radioButtons', array(
        'Option one is this and that—be sure to include why it\'s great',
        'Option two can is something else and selecting it will deselect option one',
    ));  */?>
 
</fieldset>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
 
<?php $this->endWidget(); ?>