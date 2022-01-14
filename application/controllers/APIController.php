<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;


class APIController extends RestController {

	public function index()
	{
		$this->response(array("message" => "hello"));
	}
}
