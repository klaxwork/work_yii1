<?php

class m150706_083231_create_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', [
				'id' => 'pk',
				'login' => 'string NOT NULL',
				'password' => 'string NOT NULL',
				'email' => 'string NOT NULL',
			]
		);
	}

	public function down()
	{
		echo "m150706_083231_create_users_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}