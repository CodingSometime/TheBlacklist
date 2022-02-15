<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
	}
require_once APPPATH . 'models/BaseModel.php';

class TimeModel extends BaseModel
{
	protected $tableName = "FND_TIME";
	protected $viewName = "FND_TIME";
  protected $primaryKey = "ID";

	public function __construct()
	{
		parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
	}

	public function selectBox($controlName=null, $selected = null, $isReadOnly = false)
	{
		if (!$controlName) return false;
		
		$this->db->select("ID AS OPTION_VALUE, CONCAT(TIME_CODE, ' - ', TIME_NAME) AS OPTION_NAME", false);
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
		return form_dropdown($controlName, $options, $selected, 'id="'.$controlName.'" class="form-select" required ' . $readOnly);
	}


	public function isDuplicate($id, $timeCode)
	{
		if (!$timeCode) return false;

		$this->db->where("TIME_CODE", $timeCode);
		if (isset($id)) $this->db->where("ID !=", $id);

		$query = $this->db->get($this->TABLE_NAME);
		if ($query->num_rows() == 0) return false;
		return true;
	}
}
