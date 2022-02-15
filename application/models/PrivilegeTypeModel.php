<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
	}
require_once APPPATH . 'models/BaseModel.php';

class PrivilegeTypeModel extends BaseModel
{
	protected $tableName = "FND_PRIVILEGE_TYPE";
	protected $viewName = "FND_PRIVILEGE_TYPE";
  protected $primaryKey = "ID";

	public function __construct()
	{
		parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
	}

	public function selectBox($controlName=null, $selected = null, $isReadOnly = false)
	{
		if (!$controlName) return false;
		
		$this->db->select("ID AS OPTION_VALUE, CONCAT(PRIVILEGE_TYPE_CODE, ' - ', PRIVILEGE_TYPE_NAME) AS OPTION_NAME", false);
		$this->db->where("STATUS_ID", 1);
		$this->db->order_by(2);
		$query = $this->db->get($this->tableName);
		$results = ($query->result_array());
		$options = array("" => "");

		foreach ($results as $key => $value) {
			foreach ($value as $key2 => $value2) {
				$id = $value["OPTION_VALUE"];
				$name = $value["OPTION_NAME"];
				$options[$id] = $name ;
			}
		}
		$readOnly = "";
		if ($isReadOnly) {
			$readOnly = "disabled";
		}
	}

	public function isDuplicate($id, $privilegeTypeCode)
	{
		if(!$privilegeTypeCode) return false;

		$this->db->where("PRIVILEGE_TYPE_CODE", $privilegeTypeCode);
		if (isset($id)) $this->db->where("ID !=", $id);

		$query = $this->db->get($this->TABLE_NAME);
		if ($query->num_rows() == 0) return false;
		return true;
	}
}