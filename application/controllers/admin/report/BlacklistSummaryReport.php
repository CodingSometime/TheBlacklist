<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
new PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BlacklistSummaryReport extends BaseController
{
    private $route     = "page/report/summary";
    private $language  = "BlacklistSummaryReport";
    private $view_list = "admin/report/BlacklistSummaryReport";

    // formatting breadcrumbs
    private $breadcrumbs = array(
        array("" => null),
        array("ROOT" => null),
        array("TITLE" => "/page/report/summary"),
    );

    public function __construct()
    {
        $object              = new stdClass();
        $object->language    = $this->language;
        $object->breadcrumbs = $this->breadcrumbs;

        // construct the parent class
        parent::__construct($object);

        // load models
        $this->load->model("PersonModel", "BaseModel");
        $this->load->model("AllegationTypeModel");
        $this->load->model("PersonTypeModel");
        $this->load->model("GroupCompanyModel");
        $this->load->model("AllegationLevelModel");
        $this->load->model("AllegationTypeModel");
        $this->load->model("ReportModel");
    }

    public function index()
    {
        // breadcrumbs
        $items["route"]                    = $this->route;
        $items["breadcrumbs"]              = $this->_breadcrumbs();
        $items["selectBoxPersonType"]      = $this->PersonTypeModel->selectBox("personType");
        $items["selectBoxGroupOfCompany"]  = $this->GroupCompanyModel->selectBox("groupOfCompany");
        $items["selectBoxAllegationLevel"] = $this->AllegationLevelModel->selectBox("allegationLevel");
        $items["selectBoxAllegationType"]  = $this->AllegationTypeModel->selectBox("allegationType");

        // render view html
        $output = $this->load->view($this->view_list, $items, true);
        $this->response($output);
    }

    private function getXlsxBorderStyle()
    {
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color'       => ['argb' => '00000000'],
                ],
            ],
        ];

        return $styleArray;
    }

    public function download()
    {
        $dateFrom         = isset($_GET["dateFrom"]) ? $this->dateFormat($_GET["dateFrom"]) : null;
        $dateTo           = isset($_GET["dateTo"]) ? $this->dateFormat($_GET["dateTo"]) : null;
        $personType       = isset($_GET["personType"]) ? $_GET["personType"] : null;
        $businessUnitCode = isset($_GET["businessUnitCode"]) ? $_GET["businessUnitCode"] : null;
        $allegationLevel  = isset($_GET["allegationLevel"]) ? $_GET["allegationLevel"] : null;
        $allegationType   = isset($_GET["allegationType"]) ? $_GET["allegationType"] : null;

        // initialize xlsx
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        $fileName    = FCPATH . "tmp/BlacklistSummaryReport-" . date("Ymdhmi") . ".xlsx";

        // execute query & fetch data
        $results = $this->ReportModel->blacklistSummaryReport($dateFrom, $dateTo, $personType, $businessUnitCode, $allegationLevel, $allegationType);
        if (!$results->status) {
            return false;
        }

        // setting header
        $sheet->setCellValue("A1", "Summary Report");
        $sheet->setCellValue("A2", "เลขที่บัตรประชาชน");
        $sheet->setCellValue("B2", "เลขที่ Passport ");
        $sheet->setCellValue("C2", "รหัสพนักงาน");
        $sheet->setCellValue("D2", "คำนำหน้าชื่อ (ภาษาไทย)");

        // setting header border color
        $sheet->getStyle("A2")->applyFromArray($this->getXlsxBorderStyle());
        $sheet->getStyle("B2")->applyFromArray($this->getXlsxBorderStyle());
        $sheet->getStyle("C2")->applyFromArray($this->getXlsxBorderStyle());
        $sheet->getStyle("D2")->applyFromArray($this->getXlsxBorderStyle());

        $sheet->getStyle("A2:AV2")
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB("bbbbbb");

        try {
            $row = 2;
            foreach ($results->result as $rs) {
                $row++;
                $totalRows = $rs->totalRows;
                // setting cell border color
                $sheet->getStyle("A$row")->applyFromArray($this->getXlsxBorderStyle());
                $sheet->getStyle("B$row")->applyFromArray($this->getXlsxBorderStyle());
                $sheet->getStyle("C$row")->applyFromArray($this->getXlsxBorderStyle());
                $sheet->getStyle("D$row")->applyFromArray($this->getXlsxBorderStyle());
                // fill all cell data
                $sheet->setCellValue("A$row", "$totalRows");
                $sheet->setCellValue("B$row", "$totalRows");
                $sheet->setCellValue("C$row", "$totalRows");
                $sheet->setCellValue("D$row", "$totalRows");

            }

            // finally send download file to client
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
            $writer->save('php://output');

        } catch (Exception $error) {
            exit($error);
        }
    }

}
