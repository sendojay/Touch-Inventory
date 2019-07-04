<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Model_template', 'Model_utility', 'Model_modal'));
    }

    public function Index(){
        $data["Template"] = $this->Model_template->Call_template("เข้าสู่ระบบ");
        $this->load->view("Login/Login", $data);
    }

    public function Check_login(){
        $data = $this->input->post();
        if(!empty($data)){
            $password = $this->Model_utility->gen_password(array($data["username"],$data["password"]));
            $member = $this->db->where(array("member_username" => $data["username"], "member_password" => $password))->get("member")->first_row('array');
            if(!empty($member)){
                $arr = array(
                    "member_id" => $member["member_id"], 
                    "member_code" => $member["member_code"], 
                    "member_role_id" => $member["member_role_id"], 
                    "member_role_name" => $member["member_role_name"], 
                    "member_position_id" => $member["member_position_id"], 
                    "member_position_name" => $member["member_position_name"], 
                    "member_fname" => $member["member_fname"], 
                    "member_lname" => $member["member_lname"], 
                    "member_username" => $member["member_username"], 
                    "member_email" => $member["member_email"], 
                    "member_date_lastlogin" => $member["member_date_lastlogin"], 
                );
                $this->session->set_userdata($arr);
                echo "<script>window.location='".base_url("Home")."'</script>";
                exit();
            }else{
                $popup_alert = array(
                    'title' => '<i class="fa fa-floppy-o"></i> Login Fail',
                    'detail' => 'The user name or password provided is incorrect.',
                    'url' => base_url('Login')
                );
                echo $this->Model_modal->modal_popup_alert($popup_alert);
                exit();
            }
        }else{
            $popup_alert = array(
                'title' => '<i class="fa fa-floppy-o"></i> Login Fail',
                'detail' => 'The user name or password provided is incorrect.',
                'url' => base_url('Login')
            );
            echo $this->Model_modal->modal_popup_alert($popup_alert);
            exit();
        }
    }

    public function Logout(){
        $this->session->sess_destroy();
        echo "<script>window.location='".base_url("Login")."'</script>";
        exit();
    }
}