<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseController extends CI_Controller
{
  private $title = "";
  private $route = "";
  private $breadcrumbs = array();

  public function __construct($object)
  {
    parent::__construct();
    $this->load->library("session");
    $this->load->library("pagination");
    $this->load->helper("language");
    $this->load->helper("common");
		$this->load->helper("pagination_helper");

    // default class members
    $this->title = @$object->title;
    $this->route = @$object->route;
    $this->breadcrumbs = @$object->breadcrumbs;

    // load default model
    $this->load->model(@$object->model, "BaseModel");
  }

  public function render($arrays)
  {
    // render to main layout $content
    $data["title"] = $this->title;
    $data["route"] = $this->route;
    $data["breadcrumbs"] = getBreadcrumbs($this->breadcrumbs);
    $data["content"] = $arrays;
    $this->load->view("layouts/Dashboard", $data);
  }

  public function addBreadcrumbs($segments = array())
  {
    if (is_array($segments))
      array_push($this->breadcrumbs, $segments);
    return true;
  }


}
