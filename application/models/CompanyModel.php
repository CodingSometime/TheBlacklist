<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
require_once APPPATH . 'models/BaseModel.php';

class CompanyModel extends BaseModel
{
	protected $tableName = "FND_COMPANY";
	protected $viewName = "FND_COMPANY_VW";
	protected $primaryKey = "ID";

	public function __construct()
	{
		parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
	}

	public function selectBox($controlName = null, $selected = null, $hasAll = false, $isRequired = true, $isReadOnly = false)
	{
		if (!$controlName) return false;
		$required = $isRequired ? " required " : "";
		$readOnly = $isReadOnly ? " disabled " : "";

		$this->db->select("COMPANY_CODE AS OPTION_VALUE, CONCAT(COMPANY_NAME, ' - ', DESCRIPTION_EN) AS OPTION_NAME", false);
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

    // for fetch one by national id
    public function fetchByCode($code)
    {
        if (!$code) {
            return responseError(null, "CODE is required");
        }

        $this->db->where("COMPANY_CODE", $code);
        $query = $this->db->get($this->VIEW_NAME);
        if (!$query) {
            return responseError($this->db->error());
        }

        if ($query->num_rows() == 0) {
            return responseError(null, "No data found");
        }

        $results = toCamelCase($query->result_array());
        return responseOk($results[0]);
    }

	public function isDuplicate($id, $companyCode)
	{
		if (!$companyCode) return false;

		$this->db->where("COMPANY_CODE", $companyCode);
		if (isset($id)) $this->db->where("ID !=", $id);

		$query = $this->db->get($this->TABLE_NAME);
		if ($query->num_rows() == 0) return false;
		return true;
	}

	public function callAjaxForCriteria($businessUnitCode = null)
	{
		$this->db->select("ID, COMPANY_CODE, COMPANY_NAME, DESCRIPTION_EN", false);
		$this->db->where("BUSINESS_UNIT_CODE", $businessUnitCode);
		$this->db->where("STATUS_ID", 1);
		$this->db->order_by("COMPANY_NAME");
		$query = $this->db->get($this->viewName);
		$results = ($query->result_array());

		$selectOptions = '<option value=""></option>';
		foreach ($results as $key => $value) {
			$code = $value["COMPANY_CODE"];
			$description = $value["COMPANY_NAME"]. " - ".$value["DESCRIPTION_EN"];
			$selectOptions .= '<option value="' . $code . '">' . $description . '</option>';
		}
		return $selectOptions;
	}	
}
