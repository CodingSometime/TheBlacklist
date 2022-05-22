<?php
ini_set("memory_limit", "4096M");
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class PersonalUploadModel extends CI_Model
{
    protected $tableName          = "PERSONAL_UPLOAD";
    protected $fieldRequires      = array("NATIONAL_ID", "TITLE_TH", "FIRST_NAME_TH", "LAST_NAME_TH", "GENDER", "COUNTRY", "COMPANY", "BRANCH", "PERSON_TYPE", "MISBEHAVIOR_DATE", "MISBEHAVIOR_TIME");
    protected $fieldNumbers       = array("NATIONAL_ID", "PASSPORT_ID", "EMPLOYEE_ID", "AGE", "TOTAL_AMOUNT");
    protected $fieldDates         = array("MISBEHAVIOR_DATE", "POLICE_DATE", "TERMINATE_DATE");
    protected $fieldReferenceKeys = array("TITLE_TH" => "TITLE_TH_ID", "TITLE_EN" => "TITLE_EN_ID", "COUNTRY" => "COUNTRY_CODE", "COMPANY" => "COMPANY_CODE", "BRANCH" => "BRANCH_CODE", "PERSON_TYPE" => "PERSON_TYPE_ID", "MISBEHAVIOR_TIME" => "MISBEHAVIOR_TIME_ID", "ALLEGATION_TYPE" => "ALLEGATION_TYPE_ID");
    protected $results            = array();

    protected $batchId      = null;
    protected $fullFilePath = "";
    protected $fileName     = "";

    public function __construct()
    {
        $this->load->model("BatchModel");
        $this->load->model("PersonModel");
        $this->load->model("PersonalHistoryModel");
        $this->load->model("TitleModel");
        $this->load->model("CompanyModel");
        $this->load->model("BranchModel");
    }

    public function importExcel($fullFilePath, $fileName)
    {
        // getting batch id
        $this->fullFilePath = $fullFilePath;
        $this->fileName     = $fileName;
        $this->batchId      = $this->batchStart();

        // not found data
        if ($this->loadExcel2TempTable() == 0) {
            $this->batchStop(0);
            return array("totalRows" => 0, "totalSuccess" => 0, "totalError" => 0, "results" => null);
        }

        // verify
        $this->verifyTempTableData();
        $fetchResults = $this->fetchResults();
        $success      = $this->fetchStatus(1);
        $error        = $this->fetchStatus(0);
        $this->batchStop(1);

        if ($error->totalRows == 0) {
            $this->copyTempTable2Master();
        }

        // formatting & return arrays
        return array("totalRows" => count($fetchResults), "totalSuccess" => @$success->totalRows, "totalError" => @$error->totalRows, "results" => $fetchResults);

    }

    private function copyTempTable2Master()
    {
        $this->db->where("BATCH_ID", $this->batchId);
        $query   = $this->db->get($this->tableName);
        $results = toCamelCase($query->result_array());

        // loop create new record row by row
        $this->db->trans_strict(false);
        $this->db->trans_start();

        $forms = array();
        $lists = array();

        foreach ($results as $obj) {

            $mode                  = "NEW";
            $forms["batchId"]      = $obj->batchId;
            $forms["dataSourceId"] = $obj->dataSourceId;
            $forms["nationalId"]   = $obj->nationalId;
            $forms["passportId"]   = $obj->passportId;
            $forms["titleThId"]    = $obj->titleThId;
            $forms["firstNameTh"]  = $obj->firstNameTh;
            $forms["lastNameTh"]   = $obj->lastNameTh;
            $forms["titleEnId"]    = $obj->titleEnId;
            $forms["firstNameEn"]  = $obj->firstNameEn;
            $forms["middleNameEn"] = $obj->middleNameEn;
            $forms["lastNameEn"]   = $obj->lastNameEn;
            $forms["countryCode"]  = $obj->countryCode;
            $forms["gender"]       = $obj->genderCode;

            // check if exists
            $personId   = null;
            $personInfo = $this->PersonModel->fetchByNationalId($obj->nationalId);
            if ($personInfo) {
                $mode     = "UPDATE";
                $personId = @$personInfo->id;

                $listInfo = $this->PersonalHistoryModel->fetchByPersonId($personId);
                if (!$listInfo) {
                    $sequenceNo = 1;
                } else {
                    // if person id is exists then increase sequence number
                    $currentNo  = $listInfo->sequenceNo;
                    $sequenceNo = (int) $currentNo + 1;
                }
            } else {
                // create new person info
                $query      = $this->PersonModel->create($forms);
                $personId   = @$query->result;
                $sequenceNo = 1;
            }

            // create list
            $forms["batchId"]          = $obj->batchId;
            $lists["dataSourceId"]     = $obj->dataSourceId;
            $lists["sequenceNo"]       = $sequenceNo;
            $lists["personId"]         = $personId;
            $lists["employeeId"]       = $obj->employeeId;
            $lists["companyCode"]      = $obj->companyCode;
            $lists["branchCode"]       = $obj->branchCode;
            $lists["companyOrVendor"]  = $obj->companyOrVendor;
            $lists["organizationName"] = $obj->organizationName;
            $lists["positionName"]     = $obj->positionName;
            $lists["personGroup"]      = $obj->personGroup;
            $lists["personTypeId"]     = $obj->personTypeId;
            $lists["occupation"]       = $obj->occupation;
            $lists["mental"]           = $obj->mental;
            $lists["age"]              = $obj->age;
            $lists["yearOfService"]    = $obj->yearOfService;
            $lists["allegationTypeId"] = $obj->allegationTypeId;
            $lists["decision"]         = $obj->decision;
            $lists["detailOfCase"]     = $obj->detailOfCase;
            $lists["terminateDate"]    = ddmmyyyyToYYYYMMDD($obj->terminateDate);
            $lists["terminateReason"]  = $obj->terminateReason;
            $lists["misbehaviorDate"]  = ddmmyyyyToYYYYMMDD($obj->misbehaviorDate);
            $lists["misbehaviorTime"]  = $obj->misbehaviorTimeId;
            $lists["misbehaviorPlace"] = $obj->misbehaviorPlace;
            // $lists["provinceId"] = $obj->provinceId;
            // $lists["districtId"] = $obj->districtId;
            $lists["isLitigate"]    = $obj->isLitigate;
            $lists["policeCaseNo"]  = $obj->policeCaseNo;
            $lists["policeCase"]    = $obj->policeCase;
            $lists["policeDate"]    = ddmmyyyyToYYYYMMDD($obj->policeDate);
            $lists["policeStation"] = $obj->policeStation;
            $lists["policeOfficer"] = $obj->policeOfficer;
            $lists["totalAmount"]   = $obj->totalAmount;

            $query2 = $this->PersonalHistoryModel->create($lists);
            $listId = $query2->result;

        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            exit("something wrong");
        }
    }

    private function loadExcel2TempTable()
    {
        $reader      = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($this->fullFilePath);
        $arrays      = $spreadsheet->getSheet(0)->toArray();
        $row         = 0;

        if (is_array($arrays) && count($arrays) < 7) {
            return 0;
        }

        foreach ($arrays as $cells) {
            ++$row;
            if (($row < 7) || !isset($cells[0])) {
                continue;
            }

            $columns                   = array();
            $columns["BATCH_ID"]       = $this->batchId;
            $columns["ROW_ID"]         = $row;
            $columns["FILE_NAME"]      = $this->fileName;
            $columns["DATA_SOURCE_ID"] = 2;

            $columns["NATIONAL_ID"]       = $cells[0];
            $columns["PASSPORT_ID"]       = $cells[1];
            $columns["EMPLOYEE_ID"]       = $cells[2];
            $columns["TITLE_TH"]          = $cells[3];
            $columns["FIRST_NAME_TH"]     = $cells[4];
            $columns["LAST_NAME_TH"]      = $cells[5];
            $columns["TITLE_EN"]          = $cells[6];
            $columns["FIRST_NAME_EN"]     = $cells[7];
            $columns["MIDDLE_NAME_EN"]    = $cells[8];
            $columns["LAST_NAME_EN"]      = $cells[9];
            $columns["GENDER"]            = $cells[10];
            $columns["GENDER_CODE"]       = ($cells[10] == "Male") ? "M" : "F";
            $columns["COUNTRY"]           = $cells[11];
            $columns["AGE"]               = $cells[12];
            $columns["PERSON_GROUP"]      = $cells[13];
            $columns["YEAR_OF_SERVICE"]   = $cells[14];
            $columns["MENTAL"]            = $cells[15];
            $columns["COMPANY"]           = $cells[16];
            $columns["BRANCH"]            = $cells[17];
            $columns["COMPANY_OR_VENDOR"] = $cells[18];
            $columns["ORGANIZATION_NAME"] = $cells[19];
            $columns["POSITION_NAME"]     = $cells[20];
            $columns["PERSON_TYPE"]       = $cells[21];
            $columns["OCCUPATION"]        = $cells[22];
            $columns["MISBEHAVIOR_DATE"]  = $cells[23];
            $columns["MISBEHAVIOR_TIME"]  = $cells[24];
            $columns["MISBEHAVIOR_PLACE"] = $cells[25];
            $columns["PROVINCE"]          = $cells[26];
            $columns["DISTRICT"]          = $cells[27];
            $columns["ALLEGATION_TYPE"]   = $cells[28];
            $columns["DECISION"]          = $cells[29];
            $columns["DETAIL_OF_CASE"]    = $cells[30];
            $columns["IS_LITIGATE"]       = $cells[31];
            $columns["POLICE_CASE_NO"]    = $cells[32];
            $columns["POLICE_CASE"]       = $cells[33];
            $columns["POLICE_DATE"]       = $cells[34];
            $columns["POLICE_STATION"]    = $cells[35];
            $columns["POLICE_OFFICER"]    = $cells[36];
            $columns["TERMINATE_DATE"]    = $cells[37];
            $columns["TERMINATE_REASON"]  = $cells[38];
            $columns["TOTAL_AMOUNT"]      = $cells[39];

            // insert data to temp table
            $results = $this->insertDataToTempTable($columns);
            if (!$results) {
                echo "$row cannot be create!! <hr/>";
            }

        }

        return $row;
    }

    private function verifyTempTableData()
    {
        $this->db->where("BATCH_ID", $this->batchId);
        $query   = $this->db->get($this->tableName);
        $results = toCamelCase($query->result_array());

        // update all reference key
        $this->step0ValidateFieldReferenceId();

        foreach ($results as $obj) {
            $message_results = "";
            // verify nationalId
            $message_results .= $this->validateNationalIdentifier($obj->nationalId);
            $message_results .= $this->step1ValidateFieldRequires($obj->id);
            $message_results .= $this->step2ValidateFieldNumber($obj->id);
            $message_results .= $this->step3ValidateFieldDate($obj->id);
            $message_results .= $this->step4ValidateReferenceKeys($obj->id);

            $forms                      = array();
            $forms["VALIDATE_FLAG"]     = $message_results == "" ? 1 : 0;
            $forms["VALIDATE_MESSAGES"] = $message_results == "" ? "Successfully" : substr($message_results, 2);

            $this->db->where("ID", $obj->id);
            $query = $this->db->update($this->tableName, $forms);
        }
    }

    private function step0ValidateFieldReferenceId()
    {
        $query = "UPDATE PERSONAL_UPLOAD AS TMP
        INNER JOIN FND_TITLE AS TTT ON(TTT.TITLE_NAME_TH=TMP.TITLE_TH)
        SET TMP.TITLE_TH_ID = TTT.ID
        WHERE TMP.BATCH_ID = $this->batchId;";
        $this->db->query($query);

        $query = "UPDATE PERSONAL_UPLOAD AS TMP
        INNER JOIN FND_TITLE AS TTT ON(TTT.TITLE_NAME_EN=TMP.TITLE_EN)
        SET TMP.TITLE_EN_ID = TTT.ID
        WHERE TMP.BATCH_ID = $this->batchId;";
        $this->db->query($query);

        $query = "UPDATE PERSONAL_UPLOAD AS TMP
        INNER JOIN FND_COMPANY AS COM ON(COM.COMPANY_NAME=TRIM(SUBSTR(TMP.COMPANY, 1, INSTR(TMP.COMPANY,'-')-1)))
        SET TMP.COMPANY_CODE = COM.COMPANY_CODE
        WHERE TMP.BATCH_ID = $this->batchId;";
        $this->db->query($query);

        $query = "UPDATE PERSONAL_UPLOAD AS TMP
        SET TMP.COUNTRY_CODE = SUBSTRING(TMP.COUNTRY,1,3),
            TMP.BRANCH_CODE = TRIM(SUBSTR(TMP.BRANCH, 1, INSTR(TMP.BRANCH,'-')-1))
        WHERE TMP.BATCH_ID = $this->batchId;";
        $this->db->query($query);

        $query = "UPDATE PERSONAL_UPLOAD AS TMP
        INNER JOIN FND_PERSON_TYPE AS PPP ON(PPP.PERSON_TYPE_NAME=TMP.PERSON_TYPE)
        SET TMP.PERSON_TYPE_ID = PPP.ID
        WHERE TMP.BATCH_ID = $this->batchId;";
        $this->db->query($query);

        $query = "UPDATE PERSONAL_UPLOAD AS TMP
        INNER JOIN FND_TIME AS TTT ON(TTT.TIME_NAME=TMP.MISBEHAVIOR_TIME)
        SET TMP.MISBEHAVIOR_TIME_ID = TTT.ID
        WHERE TMP.BATCH_ID = $this->batchId;";
        $this->db->query($query);

        $query = "UPDATE PERSONAL_UPLOAD AS TMP
        INNER JOIN FND_ALLEGATION_TYPE AS TTT ON(TTT.ALLEGATION_TYPE=TMP.ALLEGATION_TYPE)
        SET TMP.ALLEGATION_TYPE_ID = TTT.ID
        WHERE TMP.BATCH_ID = $this->batchId;";
        $this->db->query($query);

    }


    
    private function step1ValidateFieldRequires($id)
    {
        $fieldRequires = $this->fieldRequires;
        $messages      = "";

        if (!is_array($fieldRequires)) {
            return false;
        }

        foreach ($fieldRequires as $field) {
            $this->db->where("$field IS NULL", null, false);
            $this->db->where("ID", $id);
            $query = $this->db->get($this->tableName);
            if ($query->num_rows() > 0) {
                $messages .= ", $field is required";
            }
        }
        return $messages;
    }

    private function step2ValidateFieldNumber($id)
    {
        $fieldNumbers = $this->fieldNumbers;
        $messages     = "";

        if (!is_array($fieldNumbers)) {
            return false;
        }

        foreach ($fieldNumbers as $field) {
            // check nullable first
            $this->db->where("$field IS NOT NULL", null, false);
            $this->db->where("ID", $id);
            $query = $this->db->get($this->tableName);

            // if not null then check is numeric by regular expression
            if ($query->num_rows() > 0) {
                $this->db->where("$field IS NOT NULL", null, false);
                $this->db->where("$field REGEXP '^-?[0-9]+$'", null, false);
                $this->db->where("ID", $id);
                $query2 = $this->db->get($this->tableName);
                if ($query2->num_rows() == 0) {
                    $messages .= ", $field is not number";
                }
            }
        }

        return $messages;
    }

    private function step3ValidateFieldDate($id)
    {
        $fieldDates = $this->fieldDates;
        $messages   = "";

        if (!is_array($fieldDates)) {
            return false;
        }

        foreach ($fieldDates as $field) {
            // check nullable first
            $this->db->select("$field");
            $this->db->where("$field IS NOT NULL", null, false);
            $this->db->where("ID", $id);
            $query = $this->db->get($this->tableName);

            // if not null then check is numeric by regular expression
            if ($query->num_rows() > 0) {
                $this->db->select("STR_TO_DATE($field,'%d/%m/%Y') as DDMMYYYY");
                $this->db->where("$field IS NOT NULL", null, false);
                $this->db->where("ID", $id);
                $query2 = $this->db->get($this->tableName);

                $results = toCamelCase($query2->result_array());
                if (!$results) {
                    $messages .= ", $field is not date (dd/mm/yyyy)";
                }

                $obj      = $results[0];
                $ddmmyyyy = @$obj->ddmmyyyy;

                if (!isset($ddmmyyyy)) {
                    $messages .= ", $field is not date (dd/mm/yyyy)";
                }

            }
        }

        return $messages;
    }

    private function step4ValidateReferenceKeys($id)
    {
        $fieldReferenceKeys = $this->fieldReferenceKeys;
        $messages           = "";

        if (!is_array($fieldReferenceKeys)) {
            return false;
        }

        foreach ($fieldReferenceKeys as $field => $referenceKey) {
            // check nullable first
            $this->db->where("$field IS NOT NULL", null, false);
            $this->db->where("ID", $id);
            $query = $this->db->get($this->tableName);

            // if not null then check is numeric by regular expression
            if ($query->num_rows() > 0) {
                $this->db->where("$referenceKey IS NOT NULL", null, false);
                $this->db->where("ID", $id);
                $query2 = $this->db->get($this->tableName);
                if ($query2->num_rows() == 0) {
                    $messages .= ", $field not exists";
                }
            }
        }

        return $messages;
    }

    // for retrieve all records
    public function fetchResults()
    {
        $this->db->where("BATCH_ID", $this->batchId);
        $query = $this->db->get($this->tableName);
        return toCamelCase($query->result_array());
        // return responseOk($results);
    }

    public function fetchStatus($validateFlag)
    {
        $this->db->select("COUNT(1) AS TOTAL_ROWS");
        $this->db->where("BATCH_ID", $this->batchId);
        if (isset($validateFlag)) {
            $this->db->where("VALIDATE_FLAG", $validateFlag);
        }
        $query   = $this->db->get($this->tableName);
        $results = toCamelCase($query->result_array());
        return $results[0];
    }

    public function insertDataToTempTable($forms)
    {
        $forms["CREATE_DATE"] = date("Y-m-d H:i:s");
        $forms["CREATE_BY"]   = @$_SESSION["user_id"];
        $forms["UPDATE_DATE"] = date("Y-m-d H:i:s");
        $forms["UPDATE_BY"]   = @$_SESSION["user_id"];

        $query = $this->db->insert($this->tableName, $forms);
        if (!$query) {
            return ($this->db->error());
        }

        return $this->db->insert_id();
    }

    private function batchStart()
    {
        try {
            $forms                = array();
            $forms["batchName"]   = "UPLOAD";
            $forms["batchStatus"] = 0;
            $forms["fileName"]    = $this->fileName;

            $result = $this->BatchModel->create($forms);
            if (!$result) {
                return false;
            }

            return $result->result;

        } catch (\Throwable $th) {
            return false;
        }
    }

    private function batchStop($status)
    {
        try {
            // getting batch id
            $forms  = array("batchStatus" => $status);
            $result = $this->BatchModel->update($this->batchId, $forms);
            if (!$result) {
                return false;
            }

            return $result->result;

        } catch (\Throwable $th) {
            return false;
        }
    }

    private function validateNationalIdentifier($nationalId)
    {
        $messages = "";

        if (empty($nationalId) || !is_numeric($nationalId)){
            return $messages;
        }

        $reverseNumber   = strrev($nationalId); 
        $total = 0;

        for ($i = 1; $i < 13; $i++)
        {
            $mul   = $i + 1;
            $count = (int)$reverseNumber[$i] * $mul; 
            $total = $total + $count;
        }

        $mod         = $total % 11;
        $sub         = 11 - $mod;
        $check_digit = $sub % 10; 

        if ($reverseNumber[0] != $check_digit) 
        {
            $messages .= ", Invalid NATIONAL_ID";
        }

        return $messages;
    }

}
