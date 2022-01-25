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

	public function isExists($id)
	{
		if (!$id) return responseError(null, "ID is required");
		$this->db->where($this->PRIMARY_KEY, $id);
		$query = $this->db->get($this->TABLE_NAME);
		if ($query->num_rows() == 0) return false;
		return true;
	}

	public function create($forms)
	{
		unset($forms["formAction"]);
		$forms = camelCaseToUnderscore($forms);

		$forms["CREATE_DATE"] = date("Y-m-d H:i:s");
		$forms["CREATE_BY"] = @$_SESSION["userId"];
		$forms["UPDATE_DATE"] = date("Y-m-d H:i:s");
		$forms["UPDATE_BY"] = @$_SESSION["userId"];

		$query = $this->db->insert($this->TABLE_NAME, $forms);
		if (!$query) return responseError($this->db->error());

		$id = $this->db->insert_id();
		return responseOk($id);
	}

	public function update($id, $forms)
	{
		if (!$id) return responseError(null, "ID is required");
		if (!$this->isExists($id)) return false;
		unset($forms["formAction"]);
		$forms = camelCaseToUnderscore($forms);

		$forms["UPDATE_DATE"] = date("Y-m-d H:i:s");
		$forms["UPDATE_BY"] = @$_SESSION["userId"];

		$this->db->where($this->PRIMARY_KEY, $id);
		$query = $this->db->update($this->TABLE_NAME, $forms);
		if (!$query) return responseError($this->db->error());

		return responseOk($query);
	}

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