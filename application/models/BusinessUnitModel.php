<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
	}
require_once APPPATH . 'models/BaseModel.php';

class BusinessUnitModel extends BaseModel
{
	protected $tableName = "FND_BUSINESS_UNIT";
	protected $viewName = "FND_BUSINESS_UNIT";
  protected $primaryKey = "ID";

	public function __construct()
	{
		parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
	}

	public function selectBox($controlName=null, $selected = null, $hasAll = false, $isReadOnly = false)
	{
		if (!$controlName) return false;
		$readOnly = $isReadOnly ? "disabled" : "";

		$this->db->select("BUSINESS_UNIT_CODE AS OPTION_VALUE, BUSINESS_UNIT_NAME AS OPTION_NAME", false);
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

		return form_dropdown($controlName, $options, $selected, 'id="'.$controlName.'" class="form-select" required ' . $readOnly);
	}


	public function datalistBox($controlName = null, $selected = null, $hasAll = false, $isReadOnly = false)
	{
		if (!$controlName) return false;
		$readOnly = $isReadOnly ? "disabled" : "";

		$this->db->select("BUSINESS_UNIT_CODE AS OPTION_VALUE, BUSINESS_UNIT_NAME AS OPTION_NAME", false);
		$this->db->where("STATUS_ID", 1);
		$this->db->order_by(2);
		$query = $this->db->get($this->tableName);
		$results = ($query->result_array());

		$component = '<input list="' . $controlName . '" name="' . $controlName . '" id="_' . $controlName . '" value="' . $selected.'" class="form-control" ' . $readOnly . ' required />';
		$component .= '<datalist id="' . $controlName . '">';
		$component .= $hasAll ? '<option value="All" selected>' : '';

		foreach ($results as $key => $value) {
			$id = $value["OPTION_VALUE"];
			$name = $value["OPTION_NAME"];
			$component .= '<option value="' . $name . '">';
		}

		$component .= '</datalist>';
		return $component;
	}


	public function isDuplicate($id, $businessUnitCode)
	{
		if(!$businessUnitCode) return false;

		$this->db->where("BUSINESS_UNIT_CODE", $businessUnitCode);
		if (isset($id)) $this->db->where("ID !=", $id);

		$query = $this->db->get($this->TABLE_NAME);
		if ($query->num_rows() == 0) return false;
		return true;
	}
}
