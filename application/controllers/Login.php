<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model("userModel");
    }

    public function index()
    {
        session_destroy();
        $items             = array();
        $output["content"] = $this->load->view("Login", $items, true);
        $this->load->view("layouts/Default", $output);
    }

    public function notAuthorized()
    {
        $userStatus = null;
        if (@$_GET["userStatus"]) {
            $userStatus = $_GET["userStatus"];
        }

        $this->load->view("NotAuthorize", ["userStatus" => $userStatus]);
    }

    // basic form login
    public function redirect()
    {
        $forms        = $this->input->post();
        $userName     = $forms["inputEmail"];
        $userPassword = $forms["inputPassword"];

        if (!$userName || !$userPassword) {
            return false;
        }

        // verify user & password
        $users = $this->userModel->login($userName, $userPassword);
        $user  = @$users->result;
        if (!$users || !$users->status) {
            redirect("?message=invalid-username-or-password");
            exit();
        }

        if (@$results->status == true && @$user->statusId == 0) {
            redirect("page/not-authorize?userStatus=Inactive");
            exit();
        }

        // print_R($user); exit();

        // setting user session login
        $_SESSION["user_id"]           = @$user->id;
        $_SESSION["user_name"]         = @$user->userName;
        $_SESSION["user_role_id"]      = @$user->roleId;
        $_SESSION["user_profile_id"]   = 1;
        $_SESSION["user_language"]     = @$user->userLanguage ? @$user->userLanguage : "thailand";
        $_SESSION["user_row_per_page"] = @$user->rowPerPage ? @$user->rowPerPage : 10;
        $_SESSION["user_theme"]        = @$user->theme ? @$user->theme : "light";

        redirect("page/person/search");
    }

    // for ADFS authentication

    public function authorization()
    {
        require_once "/var/www/html/cgpls.central.co.th/vendor/cgpassport/lib/_autoload.php";

        try {
            $as = new SimpleSAML_Auth_Simple("cgplsdev-sp");
            $as->requireAuth();
            // SimpleSAML_Session::getSessionFromRequest()->cleanup();
            $attributes = @$as->getAttributes();

            if ($attributes) {
                $userName     = @$attributes["Username"][0];
                $employeeId   = @$attributes["Employee ID"][0];
                $emailAddress = @$attributes["Email"][0];

                $payload = array(
                    "userName"     => $userName,
                    "employeeId"   => $employeeId,
                    "emailAddress" => $emailAddress,
                    "sid"          => "$userName$employeeId",
                    "iat"          => time(),
                    "exp"          => time() + 60, //60 seconds
                );

                $token = JWT::encode($payload, $this->config->item("JWT_SECRET_KEY"));
                $keys  = md5($token);
                redirect("auth?setLogggedIn=cgpassport.central.co.th&SAMLAuthTokenRequire=$keys&SAMLAuthToken=$token");
                exit();
            }

            exit();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
}
