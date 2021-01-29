<?php

namespace App\Controllers\API;

use App\Entities\Employee as EmployeeEntities;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use App\Models\EmployeeModel;

class Employee extends Controller
{
	use ResponseTrait;
	
	private $employeeModel;

	public function __construct() {
		$this->employeeModel = new EmployeeModel;
	}

	public function index()
	{
		try {
			$dataEmployee = $this->employeeModel->findAll();
	
			return $this->respond($dataEmployee, 200, "Success get employee data");
		} catch (\Exception $e) {
			return $this->respond(null, 500, "Error: " . $e->getMessage());
		}
	}

	public function getEmployeeById($id)
	{
		try {
			$dataEmployee = $this->employeeModel->find($id);

			return $this->respond($dataEmployee, 200, "Success get employee data");
		} catch (\Exception $e) {
			return $this->failServerError("Error: " . $e->getMessage(), 500, "Terjadi kesalahan");
		}
	}

	public function createEmployee()
	{
		try {
			$req = $this->request->getPost();

			$employee = new EmployeeEntities;

			$employee->employee_name = $req["employee_name"];
			$employee->employee_division = $req["employee_division"];
			$employee->employee_payoff = $req["employee_payoff"];
	
			$isCreated = $this->employeeModel->save($employee);

			if($isCreated){
				return $this->respondCreated(null, "Success add employee data");
			}

			return $this->respond(null, 500, "Fail add employee data");
		} catch (\Exception $e) {
			return $this->failServerError("Error: " . $e->getMessage(), 500, "Terjadi kesalahan");
		}
	}

	public function updateEmployee()
	{
		try {
			$req = $this->request->getRawInput();

			$employee = new EmployeeEntities;
			
			$employee->id = $req["id"];
			$employee->employee_name = $req["employee_name"];
			$employee->employee_division = $req["employee_division"];
			$employee->employee_payoff = $req["employee_payoff"];

			$isUpdated = $this->employeeModel->save($employee);

			if($isUpdated){
				return $this->respondUpdated([
					"data" => $employee
				], "Success update employee data");
			}

			return $this->respond(null, 500, "Failed updated employee data");
		} catch (\Exception $e) {
			return $this->failServerError("Error: ".$e->getMessage(), 500, "Terjadi kesalahan");
		}
	}

	public function deleteEmployee()
	{
		try {
			$req = $this->request->getRawInput();

			$isDeleted = $this->employeeModel->delete($req["id"]);

			if($isDeleted){
				return $this->respondDeleted(null, "Success delete employee data");
			}
			return $this->respond(null, 500, "Failed delete employee data");
		} catch (\Exception $e) {
			return $this->failServerError("Error: " . $e->getMessage(), 500, "Terjadi kesalahan");
		}
	}
}