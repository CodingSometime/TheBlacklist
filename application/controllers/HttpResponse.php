<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
require APPPATH . 'controllers/Constants.php';

class HttpResponse extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    $this->load->library("session");
    $this->load->helper("language");

    $this->lang->load("Http", @$_SESSION["user_language"]);

  }

  // route: /page/pagenotfound
  // method: GET
  public function pagenotfound()
  {
    // render view html
    $items["message"] = "Page Not found";
    $output["content"] = $this->load->view("http/404", $items, true);
    $this->load->view("layouts/Default", $output);
  }

  // route: /page/notauthorize
  // method: GET
  public function notauthorize()
  {
    // render view html
    $items["message"] = "Page Not found";
    $output["content"] = $this->load->view("http/403", $items, true);
    $this->load->view("layouts/Default", $output);
  }

}
