<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library("session");

    $_SESSION["sess_user_lang"] = "thailand";
    $_SESSION["sess_user_id"] = -1;
    $_SESSION["sess_role_id"] = -1;
    $_SESSION["sess_profile_id"] = -1;
    
    if (!isset($_SESSION["sess_user_id"])) show_404();

    // load _languageuage
  }

  public function index() {
    $items = array();
    $output["content"] = $this->load->view("Login", $items, true);
    $this->load->view("layouts/Default", $output);
  }
  public function redirect(){
    redirect("/page/company");
  }

}
