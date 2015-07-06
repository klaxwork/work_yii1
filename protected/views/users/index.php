<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<?php
foreach ($users as $user) {
	print "{$user->id} => {$user->login}<br>\n";
}
?>