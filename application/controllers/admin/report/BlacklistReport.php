<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
new PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BlacklistReport extends BaseController
{
    private $route     = "page/report/blacklist";
    private $language  = "BlacklistReport";
    private $view_list = "admin/report/BlacklistReport";

    // formatting breadcrumbs
    private $breadcrumbs = array(
        array("" => null),
        array("ROOT" => null),
        array("TITLE" => "/page/report/blacklist"),
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
        $items["route"]       = $this->route;
        $items["breadcrumbs"] = $this->_breadcrumbs();

        // select box HERE !!
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
			'color' => ['argb' => '00000000'],
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
        $fileName    = FCPATH . "tmp/BlacklistReport-" . date("Ymdhmi") . ".xlsx";

        // execute query & fetch data
        $results = $this->ReportModel->blacklistReport($dateFrom, $dateTo, $personType, $businessUnitCode, $allegationLevel, $allegationType);
        if (!$results->status) {
            return false;
        }

        // setting header
		$sheet->setCellValue("A1", "Personal List Report");
		$sheet->setCellValue("A2", "เลขที่บัตรประชาชน");
		$sheet->setCellValue("B2", "เลขที่ Passport ");
		$sheet->setCellValue("C2", "รหัสพนักงาน");
		$sheet->setCellValue("D2", "คำนำหน้าชื่อ (ภาษาไทย)");
		$sheet->setCellValue("E2", "ชื่อ (ภาษาไทย)");
		$sheet->setCellValue("F2", "นามสกุล (ภาษาไทย)");
		$sheet->setCellValue("G2", "คำนำหน้าชื่อ (ภาษาอังกฤษ)");
		$sheet->setCellValue("H2", "ชื่อ (ภาษาอังกฤษ)");
		$sheet->setCellValue("I2", "ชื่อกลาง(ภาษาอังกฤษ)");
		$sheet->setCellValue("J2", "นามสกุล (ภาษาอังกฤษ)");
		$sheet->setCellValue("K2", "เพศ");
		$sheet->setCellValue("L2", "ประเทศที่เกิด");
		$sheet->setCellValue("M2", "ลำดับ");
		$sheet->setCellValue("N2", "อายุ");
		$sheet->setCellValue("O2", "กลุ่มบุคคล");
		$sheet->setCellValue("P2", "อายุงาน");
		$sheet->setCellValue("Q2", "สภาพทางจิต");
		$sheet->setCellValue("R2", "บริษัท ");
		$sheet->setCellValue("S2", "สาขา");
		$sheet->setCellValue("T2", "ชื่อบริษัท ที่ PC/BA สังกัด");
		$sheet->setCellValue("U2", "ชื่อแผนก");
		$sheet->setCellValue("V2", "ชื่อตำแหน่ง");
		$sheet->setCellValue("W2", "ประเภทบุคคล");
		$sheet->setCellValue("X2", "อาชีพหลัก");
		$sheet->setCellValue("Y2", "วันที่กระทำความผิด");
		$sheet->setCellValue("Z2", "เวลากระทำความผิด");
		$sheet->setCellValue("AA2", "สถานที่กระทำความผิด");
		$sheet->setCellValue("AB2", "จังหวัด");
		$sheet->setCellValue("AC2", "เขต/อำเภอ");
		$sheet->setCellValue("AD2", "ประเภทการกระทำความผิด");
		$sheet->setCellValue("AE2", "ระดับความผิด");
		$sheet->setCellValue("AF2", "ผลการพิจารณา");
		$sheet->setCellValue("AG2", "รายละเอียดการกระทำความผิด ");
		$sheet->setCellValue("AH2", "การดำเนินคดี / ไม่ดำเนินคดี");
		$sheet->setCellValue("AI2", "เลขที่ประจำวัน / คดี");
		$sheet->setCellValue("AJ2", "ข้อหา");
		$sheet->setCellValue("AK2", "วันที่แจ้งความ");
		$sheet->setCellValue("AL2", "สถานีตำรวจ");
		$sheet->setCellValue("AM2", "เจ้าหน้าที่ / ร้อยเวร");
		$sheet->setCellValue("AN2", "วันที่ลาออก");
		$sheet->setCellValue("AO2", "เหตุผลการลาออก");
		$sheet->setCellValue("AP2", "ยอดเงิน ");
		$sheet->setCellValue("AQ2", "การปลดความผิด");
		$sheet->setCellValue("AR2", "เหตุผลการปลดความผิด");
		$sheet->setCellValue("AS2", "รหัส User ที่สร้างรายการ ");
		$sheet->setCellValue("AT2", "วันที่สร้างรายการ ");
		$sheet->setCellValue("AU2", "รหัส User ที่ปรับปรุงรายการ ");
		$sheet->setCellValue("AV2", "วันที่ปรับปรุงรายการ");
		
		$sheet->getStyle("A2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("B2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("C2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("D2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("E2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("F2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("G2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("H2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("I2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("J2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("K2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("L2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("M2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("N2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("O2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("P2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("Q2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("R2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("S2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("T2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("U2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("V2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("W2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("X2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("Y2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("Z2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AA2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AB2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AC2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AD2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AE2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AF2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AG2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AH2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AI2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AJ2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AK2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AL2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AM2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AN2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AO2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AP2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AQ2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AR2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AS2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AT2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AU2")->applyFromArray($this->getXlsxBorderStyle());
		$sheet->getStyle("AV2")->applyFromArray($this->getXlsxBorderStyle());

		$sheet->getStyle("A2:AV2")
        ->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setRGB("bbbbbb");

        try {
            $row = 2;
            foreach ($results->result as $rs) {
                $row++;
                $nationalId          = $rs->nationalId;
                $passportId          = $rs->passportId;
                $employeeId          = $rs->employeeId;
                $titleNameTh         = $rs->titleNameTh;
                $firstNameTh         = $rs->firstNameTh;
                $lastNameTh          = $rs->lastNameTh;
                $titleNameEn         = $rs->titleNameEn;
                $firstNameEn         = $rs->firstNameEn;
                $middleNameEn        = $rs->middleNameEn;
                $lastNameEn          = $rs->lastNameEn;
                $gender              = $rs->gender;
                $countryNameEn       = $rs->countryNameEn;
                $sequenceNo          = $rs->sequenceNo;
                $age                 = $rs->age;
                $personGroup         = $rs->personGroup;
                $yearOfService       = $rs->yearOfService;
                $mental              = $rs->mental;
                $companyName         = $rs->companyName;
                $branchCode          = $rs->branchCode;
                $companyOrVendor     = $rs->companyOrVendor;
                $organizationName    = $rs->organizationName;
                $positionName        = $rs->positionName;
                $personTypeName      = $rs->personTypeName;
                $occupation          = $rs->occupation;
                $misbehaviorDate     = $rs->misbehaviorDate;
                $misbehaviorTimeName = $rs->misbehaviorTimeName;
                $misbehaviorPlace    = $rs->misbehaviorPlace;
                $provinceName        = $rs->provinceName;
                $districtName        = $rs->districtName;
                $allegationType      = $rs->allegationType;
                $allegationLevelName = $rs->allegationLevelName;
                $decision            = $rs->decision;
                $detailOfCase        = $rs->detailOfCase;
                $isLitigate          = $rs->isLitigate;
                $policeCaseNo        = $rs->policeCaseNo;
                $policeCase          = $rs->policeCase;
                $policeDate          = $rs->policeDate;
                $policeStation       = $rs->policeStation;
                $policeOfficer       = $rs->policeOfficer;
                $terminateDate       = $rs->terminateDate;
                $terminateReason     = $rs->terminateReason;
                $totalAmount         = $rs->totalAmount;
                $allegationStatus    = $rs->allegationStatus;
                $allegationReason    = $rs->allegationReason;
                $createByName        = $rs->createByName;
                $createDate          = $rs->createDate;
                $updateByName        = $rs->updateByName;
                $updateDate          = $rs->updateDate;

				$sheet->getStyle("A$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("B$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("C$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("D$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("E$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("F$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("G$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("H$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("I$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("J$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("K$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("L$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("M$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("N$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("O$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("P$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("Q$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("R$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("S$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("T$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("U$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("V$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("W$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("X$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("Y$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("Z$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AA$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AB$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AC$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AD$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AE$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AF$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AG$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AH$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AI$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AJ$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AK$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AL$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AM$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AN$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AO$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AP$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AQ$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AR$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AS$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AT$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AU$row")->applyFromArray($this->getXlsxBorderStyle());
				$sheet->getStyle("AV$row")->applyFromArray($this->getXlsxBorderStyle());
				
				$sheet->setCellValueExplicit(
					"A$row",
					"$nationalId",
					\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
				);
				$sheet->setCellValueExplicit(
					"B$row",
					"$passportId",
					\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
				);
				$sheet->setCellValueExplicit(
					"C$row",
					"$employeeId",
					\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
				);
                // $sheet->setCellValue("A$row", "$nationalId");
                // $sheet->setCellValue("B$row", "$passportId");
                // $sheet->setCellValue("C$row", "$employeeId");
                $sheet->setCellValue("D$row", "$titleNameTh");
                $sheet->setCellValue("E$row", "$firstNameTh");
                $sheet->setCellValue("F$row", "$lastNameTh");
                $sheet->setCellValue("G$row", "$titleNameEn");
                $sheet->setCellValue("H$row", "$firstNameEn");
                $sheet->setCellValue("I$row", "$middleNameEn");
                $sheet->setCellValue("J$row", "$lastNameEn");
                $sheet->setCellValue("K$row", "$gender");
                $sheet->setCellValue("L$row", "$countryNameEn");
                $sheet->setCellValue("M$row", "$sequenceNo");
                $sheet->setCellValue("N$row", "$age");
                $sheet->setCellValue("O$row", "$personGroup");
                $sheet->setCellValue("P$row", "$yearOfService");
                $sheet->setCellValue("Q$row", "$mental");
                $sheet->setCellValue("R$row", "$companyName");
                $sheet->setCellValue("S$row", "$branchCode");
                $sheet->setCellValue("T$row", "$companyOrVendor");
                $sheet->setCellValue("U$row", "$organizationName");
                $sheet->setCellValue("V$row", "$positionName");
                $sheet->setCellValue("W$row", "$personTypeName");
                $sheet->setCellValue("X$row", "$occupation");
				$sheet->setCellValueExplicit(
					"Y$row",
					"$misbehaviorDate",
					\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
				);
                // $sheet->setCellValue("Y$row", "$misbehaviorDate");
                $sheet->setCellValue("Z$row", "$misbehaviorTimeName");
                $sheet->setCellValue("AA$row", "$misbehaviorPlace");
                $sheet->setCellValue("AB$row", "$provinceName");
                $sheet->setCellValue("AC$row", "$districtName");
                $sheet->setCellValue("AD$row", "$allegationType");
                $sheet->setCellValue("AE$row", "$allegationLevelName");
                $sheet->setCellValue("AF$row", "$decision");
                $sheet->setCellValue("AG$row", "$detailOfCase");
                $sheet->setCellValue("AH$row", "$isLitigate");
                $sheet->setCellValue("AI$row", "$policeCaseNo");
                $sheet->setCellValue("AJ$row", "$policeCase");
				$sheet->setCellValueExplicit(
					"AK$row",
					"$policeDate",
					\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
				);
				// $sheet->setCellValue("AK$row", "$policeDate");
                $sheet->setCellValue("AL$row", "$policeStation");
                $sheet->setCellValue("AM$row", "$policeOfficer");
				$sheet->setCellValueExplicit(
					"AN$row",
					"$terminateDate",
					\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
				);
                // $sheet->setCellValue("AN$row", "$terminateDate");
                $sheet->setCellValue("AO$row", "$terminateReason");
                $sheet->setCellValue("AP$row", "$totalAmount");
                $sheet->setCellValue("AQ$row", "$allegationStatus");
                $sheet->setCellValue("AR$row", "$allegationReason");
                $sheet->setCellValue("AS$row", "$createByName");
                $sheet->setCellValue("AT$row", "$createDate");
                $sheet->setCellValue("AU$row", "$updateByName");
                $sheet->setCellValue("AV$row", "$updateDate");

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
