<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
require_once APPPATH . 'models/BaseModel.php';

class UserModel extends BaseModel
{
	protected $tableName = "FND_USER";
	protected $viewName = "FND_USER_VW";
	protected $primaryKey = "ID";

	public function __construct()
	{
		parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
	}

	public function selectBox($controlName=null, $selected = null, $hasAll = false, $isRequired = true, $isReadOnly = false)
	{
		if (!$controlName) return false;
		$required = $isRequired ? " required " : "";
		$readOnly = $isReadOnly ? " disabled " : "";

		$this->db->select("ID AS OPTION_VALUE, USER_NAME AS OPTION_NAME", false);
		$this->db->where("STATUS_ID", 1);
		$this->db->order_by(2);
		$query = $this->db->get($this->tableName);
		$results = ($query->result_array());
		
		$options = $hasAll ? array("" => "All") : array("" => "");

		foreach ($results as $key => $value) {
			foreach ($value as $key2 => $value2) {
				$id = $value["OPTION_VALUE"];
				$name = $value["OPTION_NAME"];
				$options[$id] = $name;
			}
		}

		return form_dropdown($controlName, $options, $selected, 'id="'.$controlName.'" class="form-select" '.$required . $readOnly);
	}


	public function isDuplicate($id, $userName)
	{
		if (!$userName) return false;

		$this->db->where("USER_NAME", urldecode($userName));
		if (isset($id)) $this->db->where("ID !=", $id);

		$query = $this->db->get($this->TABLE_NAME);
		if ($query->num_rows() == 0) return false;
		return true;
	}

	// basic form login
	public function login($userName, $userPassword)
	{
		if (!$userName) return responseError(null, "USER_NAME is required");
		if (!$userPassword) return responseError(null, "USER_PASSWORD is required");

		$this->db->where("LOWER(USER_NAME)", strtolower($userName));
		$this->db->where("USER_PASSWORD", $userPassword);
		$this->db->where("STATUS_ID", 1);
		$query = $this->db->get($this->tableName);
		if (!$query) return responseError($this->db->error());
		if ($query->num_rows() == 0) return responseError(null, "No data found");

		// return data
		$results = toCamelCase($query->result_array());
		return responseOk($results[0]);
	}

	// for ADFS  authentication 
	public function authorization($userName, $employeeId)
	{
		if (!$userName) return responseError(null, "USER_NAME is required");
		// if (!$employeeId) return responseError(null, "EMPLOYEE_ID is required");

		$this->db->where("LOWER(USER_NAME)", strtolower($userName));
		// $this->db->where("EMPLOYEE_ID", $employeeId);
		// $this->db->where("STATUS_ID", 1);
		$this->db->where("CURRENT_DATE() BETWEEN EFFECTIVE_START_DATE AND EFFECTIVE_END_DATE");

		$query = $this->db->get($this->tableName);
		if (!$query) return responseError($this->db->error());
		if ($query->num_rows() == 0) return responseError(null, "No data found");

		// return data
		$results = toCamelCase($query->result_array());
		return responseOk($results[0]);
	}


	public function fetchByCode($code)
	{
		if (!$code) return responseError(null, "USER_NAME is required");

		$this->db->where("USER_NAME", $code);
		$query = $this->db->get($this->viewName);
		if (!$query) return responseError($this->db->error());
		if ($query->num_rows() == 0) return responseError(null, "No data found");

		// return data
		$results = toCamelCase($query->result_array());
		return responseOk($results[0]);
	}

}
