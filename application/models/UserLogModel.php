<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
require_once APPPATH . 'models/BaseModel.php';

class UserLogModel extends BaseModel
{
  protected $tableName = "FND_USER_LOG";
  protected $viewName = "FND_USER_LOG_VW";
  protected $primaryKey = "ID";

  public function __construct()
  {
    parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
    $this->load->model("system/UserModel");

  }

  public function fetchByUserId($code)
  {
    if (!$code) return responseError(null, "USER_ID is required");

    $this->db->where("USER_ID", $code);
    $query = $this->db->get($this->viewName);
    if (!$query) return responseError($this->db->error());
    if ($query->num_rows() == 0) return responseError(null, "No data found");

    $results = toCamelCase($query->result_array());
    return responseOk($results[0]);
  }

  public function fetchByUserName($code)
  {
    if (!$code) return responseError(null, "USER_NAME is required");

    $this->db->where("USER_NAME", $code);
    $query = $this->db->get($this->viewName);
    if (!$query) return responseError($this->db->error());
    if ($query->num_rows() == 0) return responseError(null, "No data found");

    $results = toCamelCase($query->result_array());
    return responseOk($results[0]);
  }

  public function fetchByEmployeeId($code)
  {
    if (!$code) return responseError(null, "EMPLOYEE_ID is required");

    $this->db->where("EMPLOYEE_ID", $code);
    $query = $this->db->get($this->viewName);
    if (!$query) return responseError($this->db->error());
    if ($query->num_rows() == 0) return responseError(null, "No data found");

    $results = toCamelCase($query->result_array());
    return responseOk($results[0]);
  }


  public function writeLog()
  {
    $userId = $this->session->userdata('userId');
    if (empty($userId)) return false;

		$results = $this->UserModel->fetchOne($userId);
		$user = $results->result;

    $datetime = date("Y-m-d H:i:s");
    $computerName = $_SERVER['REMOTE_ADDR'];
    $data = array(
      "START_DATE" => $datetime,
      "USER_ID" => $userId,
      "USER_NAME" => $user->userName,
      "EMPLOYEE_ID" => $user->employeeId,
      "IP_ADDRESS" => $computerName,
      "COMPUTER_NAME" => $computerName
    );
    return $this->create($data);
  }
}
