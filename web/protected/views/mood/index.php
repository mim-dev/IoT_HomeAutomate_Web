<?php
/* @var $this MoodController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reporting User Mood Ratings',
);

$this->menu=array(
	array('label'=>'Create ReportingUserMoodRating', 'url'=>array('create'), 'visible'=>Yii::app()->user->getState("admin")),
	array('label'=>'Manage ReportingUserMoodRating', 'url'=>array('admin'), 'visible'=>Yii::app()->user->getState("admin")),
);
?>

<h1>Reporting User Mood Ratings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
