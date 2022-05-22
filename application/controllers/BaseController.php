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

    if (!isset($_SESSION["user_id"])) show_404();

    if (isset($_GET["lang"])) $_SESSION["user_language"] = $_GET["lang"];

    // load default language
    $this->lang->load("menu", @$_SESSION["user_language"]);
    $this->lang->load($this->_language, @$_SESSION["user_language"]);
  }

  public function logout()
  {
    session_destroy();
    redirect("/");
  }

  public function _breadcrumbs()
  {
    return getBreadcrumbs($this->_breadcrumbs);
  }

  public function addBreadcrumbs($segments = array())
  {
    if (is_array($segments))
      array_push($this->_breadcrumbs, $segments);
    return true;
  }

  public function dateFormat($var, $format = "Y-m-d")
  {
    $date = str_replace('/', '-', $var);
    return date($format, strtotime($date));
  }

  public function response($content){
    $items =array();
    $output["menubar"] = $this->load->view("layouts/MainMenus", $items, true);
    $output["userProfile"] = $this->load->view("layouts/MainUser", $items, true);
    $output["content"] = $content;
    $this->load->view("layouts/Main", $output);
  }
}