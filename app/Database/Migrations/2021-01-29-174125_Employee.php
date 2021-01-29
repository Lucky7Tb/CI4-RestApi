<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\MySQLi\Forge;

class Employee extends Migration
{
	public function up()
	{		
		$this->forge->addField([
			"id" => [
				"type" => "INT",
				"constraint" => 10,
				"unsigned" => TRUE,
				"auto_increment" => TRUE
			],
			"employee_name" => [
				"type" => "VARCHAR",
				"constraint" => "80"
			],
			"employee_division" => [
				"type" => "VARCHAR",
				"constraint" => "80"
			],
			"employee_payoff" => [
				"type" => "VARCHAR",
				"constraint" => "80"
			],
			"created_at" => [
				"type" => "TIMESTAMP",
				"null" => TRUE,
			],
			"updated_at" => [
				"type" => "TIMESTAMP",
				"null" => TRUE
			]
		]);
		$this->forge->addPrimaryKey("id");
		$this->forge->createTable("employee");
	}

	public function down()
	{
		$this->forge->dropTable("employee");
	}
}
