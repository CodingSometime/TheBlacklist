<?php if (!defined("BASEPATH")) {
	exit("No direct script access allowed");
}

class BaseModel extends CI_Model
{
	protected $TABLE_NAME = "";
	protected $VIEW_NAME = "";
	protected $PRIMARY_KEY = "";

	public function __construct($tableName, $viewName, $primaryKey)
	{
		$this->load->helper("common");

		if (!$tableName || !$viewName)
			return responseError($this->db->error());

		$this->TABLE_NAME = $tableName;
		$this->VIEW_NAME = $viewName;
		$this->PRIMARY_KEY = $primaryKey;
	}

	// for count records
	public function recordCount($conditions = array())
	{
		$this->db->from($this->VIEW_NAME);

		if (is_array($conditions) && ($conditions) > 0) {
			$counter = 0;
			foreach ($conditions as $field => $value) {
				if ($counter == 0) {
					$this->db->like($field, $value);
				} else {
					$this->db->or_like($field, $value);
				}
				++$counter;
			}
		}
		return $this->db->count_all_results();
	}

	// for retrieve all records
	public function fetchAll($conditions = array(), $limit = 0, $start = 0, $orderBy = "")
	{
		// $this->db->where("STATUS_ID", 1);
		if (count($conditions) > 0) {
			$counter = 0;
			foreach ($conditions as $field => $value) {
				if ($counter == 0) {
					$this->db->like($field, $value);
				} else {
					$this->db->or_like($field, $value);
				}
				++$counter;
			}
		}
		// has limit offset
		if ($limit > 0) $this->db->limit($limit, $start);
		// has order by
		if (!empty($orderBy)) $this->db->order_by($orderBy);

		$query = $this->db->get($this->VIEW_NAME);
		if (!$query) return responseError($this->db->error());
		if ($query->num_rows() == 0) return responseError(null, "No data found");

		$results = toCamelCase($query->result_array());
		return responseOk($results);
	}

	// for retrieve only one by primary key
	public function fetchOne($id)
	{
		if (!$id) return responseError(null, "ID is required");

		$this->db->where($this->PRIMARY_KEY, $id);
		$query = $this->db->get($this->VIEW_NAME);
		if (!$query) return responseError($this->db->error());
		if ($query->num_rows() == 0) return responseError(null, "No data found");

		$results = toCamelCase($query->result_array());
		return responseOk($results[0]);
	}

	// for verify record exists in database
	public function isExists($id)
	{
		if (!$id) return responseError(null, "ID is required");
		$this->db->where($this->PRIMARY_KEY, $id);
		$query = $this->db->get($this->TABLE_NAME);
		if ($query->num_rows() == 0) return false;
		return true;
	}

	// for insert new record to database
	public function create($forms)
	{
		unset($forms["__RequestVerificationAction"]);
		unset($forms["__RequestVerificationId"]);
		$forms = camelCaseToUnderscore($forms);

		$forms["CREATE_DATE"] = date("Y-m-d H:i:s");
		$forms["CREATE_BY"] = @$_SESSION["user_id"];
		$forms["UPDATE_DATE"] = date("Y-m-d H:i:s");
		$forms["UPDATE_BY"] = @$_SESSION["user_id"];

		$query = $this->db->insert($this->TABLE_NAME, $forms);
		if (!$query) return responseError($this->db->error());

		$id = $this->db->insert_id();
		return responseOk($id);
	}

	// for update record by primary key
	public function update($id, $forms)
	{
		unset($forms["__RequestVerificationAction"]);
		unset($forms["__RequestVerificationId"]);
		
		if (!$id) return responseError(null, "ID is required");
		if (!$this->isExists($id)) return false;
		$forms = camelCaseToUnderscore($forms);

		$forms["UPDATE_DATE"] = date("Y-m-d H:i:s");
		$forms["UPDATE_BY"] = @$_SESSION["user_id"];

		$this->db->where($this->PRIMARY_KEY, $id);
		$query = $this->db->update($this->TABLE_NAME, $forms);
		if (!$query) return responseError($this->db->error());

		return responseOk($query);
	}

	// for delete record by primary key
	public function delete($id)
	{
		if (!$id) return responseError(null, "ID is required");
		if (!$this->isExists($id)) return false;

		$this->db->where($this->PRIMARY_KEY, $id);
		$query = $this->db->delete($this->TABLE_NAME);
		if (!$query) return responseError($this->db->error());

		return responseOk($query);
	}
}