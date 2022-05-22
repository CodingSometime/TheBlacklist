<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
require APPPATH . 'controllers/Constants.php';

class PersonUploadFile extends BaseController
{
    private $route        = "page/person/upload";
    private $language     = "PersonUpload";
    private $results      = null;
    private $totalRows    = null;
    private $totalSuccess = null;
    private $totalError   = null;

    // formatting breadcrumbs
    private $breadcrumbs = array(
        array("" => null),
        array("ROOT" => null),
        array("TITLE" => "/page/person/upload"),
    );

    public function __construct()
    {
        $object              = new stdClass();
        $object->language    = $this->language;
        $object->breadcrumbs = $this->breadcrumbs;

        // Construct the parent class
        parent::__construct($object);

        // load models
        $this->load->model("PersonModel", "BaseModel");
        $this->load->model("PersonalUploadModel");
    }

    // home page / index page
    // route: /page/person
    // method: GET
    public function index()
    {
        // breadcrumbs
        $items["breadcrumbs"]  = $this->_breadcrumbs();
        $items["fileTemplate"] = base_url() . "download/templates/template_import_person.xlsx";
        // has upload results
        $items["results"]      = $this->results;
        $items["totalRows"]    = $this->totalRows;
        $items["totalSuccess"] = $this->totalSuccess;
        $items["totalError"]   = $this->totalError;

        // render view html
        $output = $this->load->view("admin/persons/PersonUploadFile", $items, true);
        $this->response($output);
    }

    // for upload personal list (xlsx)
    public function upload()
    {
        $forms = $this->input->post();
        $forms = $this->security->xss_clean($forms);

        $config["upload_path"]   = "./upload/";
        $config["allowed_types"] = "xlsx|xlsm";
        $config["max_size"]      = 10240;
        $this->load->library("upload", $config);
        $this->results = null;

        try {
            if (!$this->upload->do_upload("xlsxFile")) {
                $error = $this->upload->display_errors();
            } else {
                $result       = $this->upload->data();
                $xlsxFile     = $result["full_path"];
                $xlsxFileName = $result["file_name"];

                // import file
                $arrays = $this->PersonalUploadModel->importExcel($xlsxFile, $xlsxFileName);
                if (!$arrays) {
                    $this->results = null;
                }

                $this->results      = $arrays["results"];
                $this->totalRows    = $arrays["totalRows"];
                $this->totalSuccess = $arrays["totalSuccess"];
                $this->totalError   = $arrays["totalError"];
                // print_r($this->results);
            }
        } catch (Exception $error) {
        }

        $this->index();
    }

    // for download personal list template excel
    public function download()
    {
        // breadcrumbs
        $items["breadcrumbs"] = $this->_breadcrumbs();

        // render view html
        $output = $this->load->view("admin/persons/PersonUploadFile", $items, true);
        $this->response($output);
    }
}
