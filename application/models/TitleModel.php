<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once APPPATH . 'models/BaseModel.php';

class TitleModel extends BaseModel
{
    protected $tableName  = "FND_TITLE";
    protected $viewName   = "FND_TITLE_VW";
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

        if (isset($_SESSION["user_language"]) && strtoupper($_SESSION["user_language"]) === "THAILAND") {
            $this->db->select("ID AS OPTION_VALUE, TITLE_NAME_TH AS OPTION_NAME", false);
        } else {
            $this->db->select("ID AS OPTION_VALUE, TITLE_NAME_EN AS OPTION_NAME", false);
        }

        $this->db->where("STATUS_ID", 1);
        $this->db->order_by(1);
        $query   = $this->db->get($this->tableName);
        $results = ($query->result_array());

        $options = $hasAll ? array("" => "All") : array("" => "");

        foreach ($results as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $id           = $value["OPTION_VALUE"];
                $name         = $value["OPTION_NAME"];
                $options[$id] = $name;
            }
        }

        return form_dropdown($controlName, $options, $selected, 'id="' . $controlName . '" class="form-select" ' . $required . $readOnly);
    }

    public function selectBoxEn($controlName = null, $selected = null, $hasAll = false, $isRequired = true, $isReadOnly = false)
    {
        if (!$controlName) {
            return false;
        }

        $required = $isRequired ? " required " : "";
        $readOnly = $isReadOnly ? " disabled " : "";

        if (isset($_SESSION["user_language"]) && strtoupper($_SESSION["user_language"]) === "THAILAND") {
            $this->db->select("ID AS OPTION_VALUE, TITLE_NAME_EN AS OPTION_NAME", false);
        } else {
            $this->db->select("ID AS OPTION_VALUE, TITLE_NAME_EN AS OPTION_NAME", false);
        }

        $this->db->where("STATUS_ID", 1);
        $this->db->order_by(1);
        $query   = $this->db->get($this->tableName);
        $results = ($query->result_array());

        $options = $hasAll ? array("" => "All") : array("" => "");

        foreach ($results as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $id           = $value["OPTION_VALUE"];
                $name         = $value["OPTION_NAME"];
                $options[$id] = $name;
            }
        }

        return form_dropdown($controlName, $options, $selected, 'id="' . $controlName . '" class="form-select" ' . $required . $readOnly);
    }

    // for fetch one by field & value
    public function fetchByCode($field, $value)
    {
        if (!$field || !$value) {
            return responseError(null, "CODE is required");
        }

        $this->db->where("$field", $value);
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

    public function isDuplicate($id, $titleCode)
    {
        if (!$titleCode) {
            return false;
        }

        $this->db->where("TITLE_CODE", $titleCode);
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
