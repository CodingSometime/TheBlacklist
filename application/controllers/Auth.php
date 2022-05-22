<?php

defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;
use \Firebase\JWT\BeforeValidException;

class Auth extends CI_Controller
{
	private $secretKey = "";
	private $secretToken = "";

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->model("system/UserModel");
		$this->load->model("system/UserLogModel");
		$this->secretKey = $this->config->item("JWT_SECRET_KEY");
		$this->secretToken = $_GET["SAMLAuthToken"];

	}
	public function index()
	{
		$this->verifyToken();
	}

	public function verifyToken()
	{
		try {
			//JWT::$leeway = 60; // $leeway in seconds
			$decoded = JWT::decode($this->secretToken, $this->secretKey, array('HS256'));
			$sid = @$decoded->sid;
			$userName = @$decoded->userName;
			$employeeId = @$decoded->employeeId;
			$emailAddress = @$decoded->emailAddress;

			$results = $this->UserModel->authorization($userName, $employeeId);
			$user = $results->result;

			// not authorize
			if (@$results->status == false) {
				redirect("not-authorize");
				exit();
			}
			if (@$results->status == true && @$user->statusId == 0) {
				redirect("not-authorize?userStatus=Inactive");
				exit();
			}
			
            $_SESSION["user_language"]   = "thailand";
            $_SESSION["user_id"]         = @$user->id;
            $_SESSION["sess_role_id"]    = @$user->roleId;
            $_SESSION["sess_profile_id"] = 1;
            $_SESSION["displayName"] = @$user->displayName . " (" . $user->employeeId . ")";

			// write log
			$logged = $this->UserLogModel->writeLog();
			if($logged->status)
			{
				$_SESSION["user_log_id"] = $logged->result;
			}

			redirect("home");

		} catch (\Throwable $th) {
			redirect("/");
			exit();
		}

	}
}