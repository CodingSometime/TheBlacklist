<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once APPPATH . 'models/BaseModel.php';

class PersonalHistoryModel extends BaseModel
{
    protected $tableName  = "PERSONAL_HISTORY";
    protected $viewName   = "PERSONAL_HISTORY_VW";
    protected $primaryKey = "ID";

    public function __construct()
    {
        parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
    }

    // for retrieve only one by primary key
    public function fetchByPersonId($id)
    {
        $this->db->where("PERSON_ID", $id);
        $this->db->order_by("SEQUENCE_NO DESC");
        $query = $this->db->get($this->VIEW_NAME);
        $results = toCamelCase($query->result_array());
        if(!$results) return false;
        // return responseOk($results);
        return ($results[0]);
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

    public function isDuplicate($id, $personId, $sequence)
    {
        if (!$personId) {
            return false;
        }

        $this->db->where("PERSON_ID", $personId);
        $this->db->where("SEQUENCE_NO", $sequence);
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