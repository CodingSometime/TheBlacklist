<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once APPPATH . 'models/BaseModel.php';

class PersonModel extends BaseModel
{
    protected $tableName  = "PERSON";
    protected $viewName   = "PERSON_VW";
    protected $primaryKey = "ID";

    public function __construct()
    {
        parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
    }

    public function selectBox($controlName = null, $selected = null, $hasAll = false, $isRequired = true, $isReadOnly = false)
    {
        if (!$controlName) {
            return false;
        }

        $required = $isRequired ? " required " : "";
        $readOnly = $isReadOnly ? " disabled " : "";

        $this->db->select("ID AS OPTION_VALUE, ID AS OPTION_NAME", false);
        $this->db->where("STATUS_ID", 1);
        $this->db->order_by(2);
        $query   = $this->db->get($this->tableName);
        $results = ($query->result_array());

        $options = array("" => "");

        foreach ($results as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $id           = $value["OPTION_VALUE"];
                $name         = $value["OPTION_NAME"];
                $options[$id] = $name;
            }
        }

        return form_dropdown($controlName, $options, $selected, 'id="' . $controlName . '" class="form-select" ' . $required . $readOnly);
    }

    // for fetch one by national id
    public function fetchByNationalId($nationalId)
    {
        if (!$nationalId) {
            return responseError(null, "NATIONAL_ID is required");
        }

        $this->db->where("NATIONAL_ID", $nationalId);
        $query = $this->db->get($this->VIEW_NAME);
        $results = toCamelCase($query->result_array());
        // return responseOk($results[0]);
        if(!$results) return false;
        return (@$results[0]);
    }

    public function isDuplicate($id, $nationalId)
    {
        if (!$nationalId) {
            return false;
        }

        $this->db->where("NATIONAL_ID", $nationalId);
        if (isset($id)) {
            $this->db->where("ID !=", $id);
        }

        $query = $this->db->get($this->TABLE_NAME);
        if ($query->num_rows() == 0) {
            return false;
        }

        return true;
    }
}
