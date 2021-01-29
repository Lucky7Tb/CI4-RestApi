<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class Employee extends Entity
{
	protected function setCreatedAt()
	{
		$this->attributes["created_at"] = Time::now("Asia/Jakarta", "id_ID");
		 
		return $this;
	}

	protected function setUpdatedAt()
	{
		$this->attributes["updated_at"] = Time::now("Asia/Jakarta", "id_ID");

		return $this;
	}
}