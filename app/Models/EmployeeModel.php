<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
	protected $table = "employees";
	protected $useSoftDeletes = false;
	protected $returnType = "\App\Entities\Employee";
	protected $allowedFields = ["employee_name", "employee_division", "employee_payoff"];
	protected $useTimestamps = true;
}