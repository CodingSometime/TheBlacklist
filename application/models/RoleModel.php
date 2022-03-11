<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
	}
require_once APPPATH . 'models/BaseModel.php';

class RoleModel extends BaseModel
{
	protected $tableName = "FND_ROLE";
	protected $viewName = "FND_ROLE_VW";
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

		$this->db->select("ID AS OPTION_VALUE, CONCAT(ROLE_NAME, '  (', ROLE_CODE, ')') AS OPTION_NAME", false);
		$this->db->where("STATUS_ID", 1);
		$this->db->order_by(2);
		$query = $this->db->get($this->tableName);
		$results = ($query->result_array());
		$options = $hasAll ? array("" => "All") : array("" => "");

		foreach ($results as $key => $value) {
			foreach ($value as $key2 => $value2) {
				$id = $value["OPTION_VALUE"];
				$name = $value["OPTION_NAME"];
				$options[$id] = $name ;
			}
		}

		return form_dropdown($controlName, $options, $selected, 'id="'.$controlName.'" class="form-select" '.$required . $readOnly);
	}


	public function isDuplicate($id, $roleCode)
	{
		if(!$roleCode) return false;

		$this->db->where("ROLE_CODE", $roleCode);
		if (isset($id)) $this->db->where("ID !=", $id);

		$query = $this->db->get($this->TABLE_NAME);
		if ($query->num_rows() == 0) return false;
		return true;
	}


	// YEAH, CHECK USER FIRST
	public function isRemoveable($id)
	{
		if(!$id) return false;

		$this->db->where("ROLE_ID", $id);
		$query = $this->db->get("FND_USER");

		if ($query->num_rows() == 0) return true;

		return false;
	}
}