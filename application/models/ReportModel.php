<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ReportModel extends CI_Model
{
    public function blacklistReport($dateFrom = null, $dateTo = null, $personTypeId = null, $groupOfCompanyId = null, $allegationLevelId = null, $allegationTypeId = null)
    {
        $userId     = @$_SESSION["userId"];
        $conditions = "";
        if (isset($dateFrom) && isset($dateFrom)) {
            $conditions .= " AND HIS.MISBEHAVIOR_DATE BETWEEN '$dateFrom' AND '$dateTo'";
        } else {
            if (isset($dateFrom)) {
                $conditions .= " AND HIS.MISBEHAVIOR_DATE >=  '$dateFrom'";
            }

            if (isset($dateTo)) {
                $conditions .= " AND HIS.MISBEHAVIOR_DATE <= '$dateTo'";
            }
        }
        if (isset($personTypeId)) {
            $conditions .= " AND HIS.PERSON_TYPE_ID = $personTypeId";
        }

        if (isset($groupOfCompanyId)) {
            $conditions .= " AND HIS.GROUP_COMPANY_ID = '$groupOfCompanyId'";
        }

        if (isset($allegationLevelId)) {
            $conditions .= " AND HIS.ALLEGATION_LEVEL_ID = $allegationLevelId";
        }

        if (isset($allegationTypeId)) {
            $conditions .= " AND HIS.ALLEGATION_TYPE_ID = $allegationTypeId";
        }

        $statement = "SELECT PER.NATIONAL_ID,
            PER.PASSPORT_ID,
            HIS.EMPLOYEE_ID,
            PER.TITLE_NAME_TH,
            PER.FIRST_NAME_TH,
            PER.LAST_NAME_TH,
            PER.TITLE_NAME_EN,
            PER.FIRST_NAME_EN,
            PER.MIDDLE_NAME_EN,
            PER.LAST_NAME_EN,
            CASE WHEN PER.GENDER = 'M' THEN 'Male' ELSE 'Female' END AS GENDER,
            PER.COUNTRY_NAME_EN,
            HIS.SEQUENCE_NO,
            HIS.AGE,
            HIS.PERSON_GROUP,
            HIS.YEAR_OF_SERVICE,
            HIS.MENTAL,
            HIS.COMPANY_CODE,
            HIS.COMPANY_NAME,
            HIS.BRANCH_CODE,
            HIS.BRANCH_NAME,
            HIS.COMPANY_OR_VENDOR,
            HIS.ORGANIZATION_NAME,
            HIS.POSITION_NAME,
            HIS.PERSON_TYPE_NAME,
            HIS.OCCUPATION,
            DATE_FORMAT(HIS.MISBEHAVIOR_DATE,'%d/%m/%Y') AS MISBEHAVIOR_DATE,
            HIS.MISBEHAVIOR_TIME_NAME,
            HIS.MISBEHAVIOR_PLACE,
            HIS.PROVINCE_NAME,
            HIS.DISTRICT_NAME,
            HIS.ALLEGATION_TYPE,
            HIS.ALLEGATION_LEVEL_NAME,
            HIS.DECISION,
            HIS.DETAIL_OF_CASE,
            CASE WHEN HIS.IS_LITIGATE = 1 THEN 'ดำเนินคดี' ELSE 'ไม่ดำเนินคดี' END AS IS_LITIGATE,
            HIS.POLICE_CASE_NO,
            HIS.POLICE_CASE,
            DATE_FORMAT(HIS.POLICE_DATE,'%d/%m/%Y') AS POLICE_DATE,
            HIS.POLICE_STATION,
            HIS.POLICE_OFFICER,
            DATE_FORMAT(HIS.TERMINATE_DATE,'%d/%m/%Y') AS TERMINATE_DATE,
            HIS.TERMINATE_REASON,
            HIS.TOTAL_AMOUNT,
            HIS.ALLEGATION_STATUS,
            HIS.ALLEGATION_REASON,
            HIS.CREATE_BY_NAME,
            HIS.CREATE_DATE,
            DATE_FORMAT(HIS.CREATE_DATE,'%d/%m/%Y %H:%i:%s') AS CREATE_DATE,
            HIS.UPDATE_BY_NAME,
            DATE_FORMAT(HIS.UPDATE_DATE,'%d/%m/%Y %H:%i:%s') AS UPDATE_DATE
        FROM PERSON_VW AS PER
        INNER JOIN PERSONAL_HISTORY_VW AS HIS ON(HIS.PERSON_ID=PER.ID)
        WHERE 1=1
        $conditions 
        ORDER BY HIS.MISBEHAVIOR_DATE, PER.FIRST_NAME_TH, HIS.SEQUENCE_NO";

        $query = $this->db->query($statement);
        if (!$query) {
            return responseError($this->db->error());
        }

        $results = toCamelCase($query->result_array());
        return responseOk($results);
    }

    public function blacklistSummaryReport($dateFrom = null, $dateTo = null, $personTypeId = null, $groupOfCompanyId = null, $allegationLevelId = null, $allegationTypeId = null)
    {
        $userId     = @$_SESSION["userId"];
        $conditions = "";
        if (isset($dateFrom) && isset($dateFrom)) {
            $conditions .= " AND HIS.MISBEHAVIOR_DATE BETWEEN '$dateFrom' AND '$dateTo'";
        } else {
            if (isset($dateFrom)) {
                $conditions .= " AND HIS.MISBEHAVIOR_DATE >=  '$dateFrom'";
            }

            if (isset($dateTo)) {
                $conditions .= " AND HIS.MISBEHAVIOR_DATE <= '$dateTo'";
            }
        }
        if (isset($personTypeId)) {
            $conditions .= " AND HIS.PERSON_TYPE_ID = $personTypeId";
        }

        if (isset($groupOfCompanyId)) {
            $conditions .= " AND HIS.GROUP_COMPANY_ID = '$groupOfCompanyId'";
        }

        if (isset($allegationLevelId)) {
            $conditions .= " AND HIS.ALLEGATION_LEVEL_ID = $allegationLevelId";
        }

        if (isset($allegationTypeId)) {
            $conditions .= " AND HIS.ALLEGATION_TYPE_ID = $allegationTypeId";
        }

        $statement = "SELECT COUNT(1) AS TOTAL_ROWS,
            HIS.ALLEGATION_TYPE_ID,
            HIS.ALLEGATION_TYPE,
            HIS.PERSON_TYPE_ID,
            HIS.PERSON_TYPE_NAME,
            HIS.GROUP_COMPANY_ID,
            HIS.GROUP_OF_COMPANY,
            HIS.BUSINESS_UNIT_CODE,
            HIS.BUSINESS_UNIT_NAME
            FROM PERSONAL_HISTORY_VW AS HIS
            WHERE 1=1
            $conditions 
            GROUP BY         
            HIS.ALLEGATION_TYPE_ID,
            HIS.ALLEGATION_TYPE,
            HIS.PERSON_TYPE_ID,
            HIS.PERSON_TYPE_NAME,
            HIS.GROUP_COMPANY_ID,
            HIS.GROUP_OF_COMPANY,
            HIS.BUSINESS_UNIT_CODE,
            HIS.BUSINESS_UNIT_NAME";

        $query = $this->db->query($statement);
        if (!$query) {
            return responseError($this->db->error());
        }

        $results = toCamelCase($query->result_array());
        return responseOk($results);
    }
}
