<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
	}
require_once APPPATH . 'models/BaseModel.php';

class ProvinceModel extends BaseModel
{
	protected $tableName = "FND_PROVINCE";
	protected $viewName = "FND_PROVINCE";
  protected $primaryKey = "ID";

	public function __construct()
	{
		parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
	}

	public function selectBox($selected = null, $isReadOnly = false)
	{

		$this->db->select("ID AS OPTION_VALUE, ID AS OPTION_NAME", false);
		// $this->db->where("STATUS_ID", 1);
		// $this->db->order_by("ID");
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
		return form_dropdown('ProvinceId', $options, $selected, 'class="form-select" required ' . $readOnly);
	}
}