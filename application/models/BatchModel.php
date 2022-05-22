<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
require_once APPPATH . 'models/BaseModel.php';

class BatchModel extends BaseModel
{
	protected $tableName = "FND_BATCH";
	protected $viewName = "FND_BATCH";
	protected $primaryKey = "ID";

	public function __construct()
	{
		parent::__construct($this->tableName, $this->viewName, $this->primaryKey);
	}
}
