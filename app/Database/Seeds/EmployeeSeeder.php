<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory as Fake;

class EmployeeSeeder extends Seeder
{
	public function run()
	{
		$faker = Fake::create("en_EN");
		$data = [];

		for($i = 0; $i < 9; $i++){
			$data[$i] = [
				"employee_name" => $faker->name,
				"employee_division" => $faker->jobTitle,
				"employee_payoff" => "Rp 1.000.000",
				"created_at" => Time::now("Asia/Jakarta", "id_ID"),
				"updated_at" => Time::now("Asia/Jakarta", "id_ID")
			];
		}
		
		$this->db->table("employee")->insertBatch($data);
	}
}
