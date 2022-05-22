<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
require APPPATH . 'controllers/Constants.php';

class Person extends BaseController
{
    private $route          = "page/person";
    private $language       = "Person";
    private $view_list      = "admin/persons/PersonList";
    private $view_form_add  = "admin/persons/PersonFormAdd";
    private $view_form_edit = "admin/persons/PersonFormAdd";

    private $breadcrumbs = array(
        array("" => null),
        array("ROOT" => null),
        array("TITLE" => "/page/person"),
    );

    public function __construct()
    {
        $object              = new stdClass();
        $object->language    = $this->language;
        $object->breadcrumbs = $this->breadcrumbs;

        parent::__construct($object);

        // load models
        $this->load->model("PersonModel", "BaseModel");
        $this->load->model("PersonalHistoryModel");
        $this->load->model("TitleModel");
        $this->load->model("PickListModel");
        $this->load->model("AllegationTypeModel");
        $this->load->model("PersonTypeModel");
        $this->load->model("TimeModel");
        $this->load->model("DataSourceModel");
        $this->load->model("StatusModel");
    }

    // home page / index page
    // route: /page/person
    // method: GET
    public function index()
    {
        // Find something
        $conditions = array();
        if (isset($_GET["q"]) && !empty($_GET["q"])) {
            $conditions["NATIONAL_ID"]   = $_GET["q"];
            $conditions["PASSPORT_ID"]   = $_GET["q"];
            $conditions["TITLE_TH"]      = $_GET["q"];
            $conditions["FIRST_NAME_TH"] = $_GET["q"];
            $conditions["LAST_NAME_TH"]  = $_GET["q"];
            $conditions["TITLE_EN"]      = $_GET["q"];
            $conditions["FIRST_NAME_EN"] = $_GET["q"];
            $conditions["LAST_NAME_EN"]  = $_GET["q"];
            $conditions["PICTURE"]       = $_GET["q"];
            $conditions["COUNTRY_CODE"]  = $_GET["q"];
            $conditions["REFERENCE_ID"]  = $_GET["q"];
            $conditions["GENDER"]        = $_GET["q"];
        }

        // preparing pagination
        $totalRows = $this->BaseModel->recordCount($conditions);
        $config    = loadPaginationConfig((base_url() . $this->route . "/index"), $totalRows, 4, 10);

        $this->pagination->initialize($config);
        $page    = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $results = $this->BaseModel->fetchAll($conditions, $config["per_page"], $page, "");

        // calculate showing row / page
        $startRow = $page + 1;
        $endRow   = $page + 10;

        if ($totalRows < 10) {
            $endRow = $totalRows;
        }

        if ($endRow > $totalRows) {
            $endRow = $totalRows;
        }

        // render to main layout
        $items["totalRows"]  = $totalRows;
        $items["startRow"]   = $startRow;
        $items["endRow"]     = $endRow;
        $items["results"]    = $results->result;
        $items["pagination"] = $this->pagination->create_links();

        // breadcrumbs
        $items["breadcrumbs"] = $this->_breadcrumbs();

        // render view html
        $output = $this->load->view($this->view_list, $items, true);
        $this->response($output);
    }

    // dynamic view for render hrml form create/update/delete
    private function view($action, $id = null)
    {
        if (!$action) {
            return false;
        }

        $statusId                             = 1;
        $displayValue                         = null;
        $items                                = array();
        $items["__RequestVerificationAction"] = $action;

        if (isset($id)) {
            $results     = $this->BaseModel->fetchOne($id);
            $personLists = $this->PersonalHistoryModel->fetchByPersonId($id);

            if (!$results || $results->status == false) {
                show_404();
            }

            // return false;
            $object         = $results->result;
            $items["items"] = $object;
            $displayValue   = @$object->nationalId . " : " . @$object->firstNameTh . " " . @$object->lastNameTh;
            $titleThId      = @$object->titleThId;
            $titleEnId      = @$object->titleEnId;
            $countryCode    = @$object->countryCode;
            $dataSourceId   = @$object->dataSourceId;
            $gender         = @$object->gender;
        }

        // select box HERE !!
        $items["selectBoxTitleTh"]         = $this->TitleModel->selectBox("titleThId", @$titleThId);
        $items["selectBoxTitleEn"]         = $this->TitleModel->selectBoxEn("titleEnId", @$titleEnId);
        $items["selectBoxGender"]          = $this->PickListModel->selectBoxGender("gender", @$gender);
        $items["selectBoxPersonType"]      = $this->PersonTypeModel->selectBox("personTypeId", @$personTypeId);
        $items["selectBoxAllegationType"]  = $this->AllegationTypeModel->selectBox("allegationTypeId", @$misbehaviorTime);
        $items["selectBoxMisbehaviorTime"] = $this->TimeModel->selectBox("misbehaviorTime", @$misbehaviorTime);

        // setting breadcrumbs
        if ($action == Constants::ACTION_NEW) {
            $this->addBreadcrumbs(array("BREADCRUMBS_NEW" => null));
        }

        if ($action == Constants::ACTION_EDIT) {
            $this->addBreadcrumbs(array("BREADCRUMBS_EDIT" => null, "$displayValue" => null));
        }

        if ($action == Constants::ACTION_DELETE) {
            $this->addBreadcrumbs(array("BREADCRUMBS_DEL" => null, "$displayValue" => null));
        }
        // breadcrumbs
        $items["breadcrumbs"] = $this->_breadcrumbs();

        // render view html MISBEHAVIOR_TIME
        $output = $this->load->view($this->view_form_add, $items, true);
        $this->response($output);
    }

    // route: /page/person/create
    // method: GET
    public function create()
    {
        $this->view(Constants::ACTION_NEW);
    }

    // route: /page/person/edit/(:num)
    // method: GET
    public function edit($id)
    {
        $this->view(Constants::ACTION_EDIT, $id);
    }

    // route: /page/person/delete/(:num)
    // method: GET
    public function delete($id)
    {
        $this->view(Constants::ACTION_DELETE, $id);
    }

    // save  new or update record to database
    // route: /page/person/save/(:num)
    // method: POST
    public function save()
    {
        $forms = $this->input->post();
        if (!$forms) {
            show_404();
        }

        // split form person master data & personal list data
        $split_form = $this->split_form_data($forms);

        if ($forms["__RequestVerificationAction"] == Constants::ACTION_NEW) {
            $is_inserted = false;
            // insert person info.
            $person_results = $this->insert_person_info($split_form["PERSON_INFO"]);

            if ($person_results && $person_results->status) {
                $new_person_id                         = $person_results->result;
                $split_form["PERSON_LIST"]["personId"] = $new_person_id;
                // insert personal list
                $new_person_lists = $this->insert_person_list($split_form["PERSON_LIST"]);
                if ($new_person_lists && $new_person_lists->status) {
                    $is_inserted = true;
                }
            }

            if ($is_inserted) {
                redirect($this->route);
            } else {
                redirect($this->route . "?ERR=Insert_Failure");
            }
        }

        if ($forms["__RequestVerificationAction"] == Constants::ACTION_EDIT) {
            $this->update($forms);
        }

    }

    private function split_form_data($forms)
    {
        $form_persons                 = array();
        $form_persons["dataSourceId"] = $forms["dataSourceId"];
        $form_persons["nationalId"]   = $forms["nationalId"];
        $form_persons["passportId"]   = $forms["passportId"];
        $form_persons["referenceId"]  = $forms["referenceId"];
        $form_persons["titleThId"]    = $forms["titleThId"];
        $form_persons["firstNameTh"]  = $forms["firstNameTh"];
        $form_persons["lastNameTh"]   = $forms["lastNameTh"];
        $form_persons["titleEnId"]    = $forms["titleEnId"];
        $form_persons["firstNameEn"]  = $forms["firstNameEn"];
        $form_persons["lastNameEn"]   = $forms["lastNameEn"];
        $form_persons["gender"]       = $forms["gender"];

        $form_lists                     = array();
        $form_lists["dataSourceId"]     = $forms["dataSourceId"];
        $form_lists["sequenceNo"]       = $forms["sequenceNo"];
        $form_lists["employeeNumber"]   = $forms["employeeNumber"];
        $form_lists["personTypeId"]     = $forms["personTypeId"];
        $form_lists["companyOrVendor"]  = $forms["companyOrVendor"];
        $form_lists["organizationName"] = $forms["organizationName"];
        $form_lists["positionName"]     = $forms["positionName"];
        $form_lists["companyCode"]      = $forms["companyCode"];
        $form_lists["branchCode"]       = $forms["branchCode"];
        $form_lists["misbehaviorDate"]  = $forms["misbehaviorDate"];
        $form_lists["misbehaviorTime"]  = $forms["misbehaviorTime"];
        $form_lists["allegationTypeId"] = $forms["allegationTypeId"];
        $form_lists["detailOfCase"]     = $forms["detailOfCase"];
        $form_lists["totalAmount"]      = $forms["totalAmount"];
        $form_lists["decision"]         = $forms["decision"];
        $form_lists["allegationReason"] = $forms["allegationReason"];

        return array("PERSON_INFO" => $form_persons, "PERSON_LIST" => $form_lists);
    }

    private function insert_person_info($forms)
    {
        echo "insert_person_info";
        return $this->BaseModel->create($forms);
    }

    private function insert_person_list($forms)
    {
        echo "insert_person_list";
        return $this->PersonalHistoryModel->create($forms);
    }

    // insert new record to database
    // route: /page/person/insert/(:num)
    // method: POST
    public function insert($forms)
    {
        $this->BaseModel->create($forms);
        redirect($this->route);
    }

    // update record to database
    // route: /page/person/update/(:num)
    // method: POST
    public function update($forms)
    {
        if (!$forms || !$forms["__RequestVerificationId"]) {
            show_404();
        }

        $forms["id"] = $forms["__RequestVerificationId"];
        $this->BaseModel->update($forms["id"], $forms);
        redirect($this->route);
    }

    // delete from database
    // route: /page/person/remove/(:num)
    // method: POST
    public function remove($id)
    {
        $forms  = $this->input->post();
        $data   = $this->security->xss_clean($forms);
        $action = @$data["__RequestVerificationAction"];
        $id     = @$data["__RequestVerificationId"];

        if (!$action || !$id) {
            show_404();
        }

        if ($action != "__delete__") {
            show_404();
        }

        if (!$action || !$id) {
            show_404();
        }

        if ($action != "__delete__") {
            show_404();
        }

        $results = $this->BaseModel->delete($id);
        if ($results->status) {
            redirect($this->route);
        } else {
            show_404();
        }

    }

    // check data duplicate from this table
    // route: /page/person/validate/(:id)/(:nationalId)
    // method: GET
    public function validate($id, $nationalId)
    {
        // is duplicate ? then return json for javascript validation
        if ($this->BaseModel->isDuplicate($id, $nationalId)) {
            echo (json_encode(array("duplicate" => true, "message" => @lang("FORM_DUPLICATE_DATA"))));
        } else {
            echo (json_encode(array("duplicate" => false, "message" => "")));
        }
    }
}
