<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->library("session");
  }

  public function index()
  {
    session_destroy();
    $items = array();
    $output["content"] = $this->load->view("Login", $items, true);
    $this->load->view("layouts/Default", $output);
  }

  public function redirect()
  {
    $_SESSION["sess_user_lang"] = "thailand";
    $_SESSION["sess_user_id"] = -1;
    $_SESSION["sess_role_id"] = -1;
    $_SESSION["sess_profile_id"] = -1;

    redirect("page/company");
  }
}
