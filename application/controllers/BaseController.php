<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseController extends CI_Controller
{
  private $_route = "";
  private $_language = "";
  private $_breadcrumbs = array();

  public function __construct($object)
  {
    parent::__construct();
    $this->load->library("session");
    $this->load->library("pagination");
    $this->load->helper("language");
    $this->load->helper("common");
		$this->load->helper("pagination_helper");

    // default class members
    $this->_route = @$object->route;
    $this->_language = @$object->language;
    $this->_breadcrumbs = @$object->breadcrumbs;

    if (!isset($_SESSION["sess_user_id"])) show_404();

    // load _languageuage
    $this->lang->load($this->_language, @$_SESSION["sess_user_lang"]);


  }

  public function _breadcrumbs(){
    return getBreadcrumbs($this->_breadcrumbs);
  }

  public function addBreadcrumbs($segments = array())
  {
    if (is_array($segments))
      array_push($this->_breadcrumbs, $segments);
    return true;
  }

  public function logout(){
    session_destroy();
    redirect("/");
  }

}
