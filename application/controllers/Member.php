<?php
defined('BASEPATH')or exit("No direct script access allowed");
class Member extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Model_template', 'Model_utility', 'Model_modal', 'Model_member'));
        $this->Model_utility->Check_session_login();
    }

    //Role

    public function RoleView(){
        $data['search'] = $this->input->post();
        $data['total'] = $this->Model_member->Role_list('', $data['search'], '', 1);
        $array_config = array(
            'total_rows' => $data['total'],
            'url' => base_url('Member/RoleView_ajax'),
            'per_page' => 10,
            "target" => '#postList',
            "link_func" => 'searchFilter'
        );
        $this->Model_utility->call_pagination($array_config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $array_limit = array('start' => $page, 'limit' => $array_config["per_page"]);
        $data['Role'] = $this->Model_member->Role_list($array_limit, $data['search']);
		$data["Template"] = $this->Model_template->Call_template("Role");
        $data['modal'] = $this->Model_modal->call_modal();
        $this->load->view('Member/Role_list', $data);
    }

    public function RoleView_ajax(){
        $page = $this->input->post('page');
        $data['search'] = $this->input->post();
        if(!$page){
            $offset = 0;
        }else{
            $count = $this->Model_member->Role_list(array("limit" => 10, "start" => $page), $data['search'], '', 1);
            if($page >= 10 && $count > 0){
                $offset = $page;
            }else if($page >= 10 && $count < 1){
                $offset = $page-10;
            }else if($page < 10){
                $offset = 0;
            }else{
                $offset = $page;
            }
        }
        //total rows count
        $totalRec = $this->Model_member->Role_list('', $data['search'], '', 1);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['url']    = base_url('Member/RoleView_ajax');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = 10;
        $config['link_func']   = 'searchFilter';
        $this->Model_utility->call_pagination($config);
        
        //get the posts data
        $array_limit = array('start' => $offset, 'limit' => $config["per_page"]);
        $data['Role'] = $this->Model_member->Role_list($array_limit, $data['search']);
        
        $this->load->view('Member/Role_list_ajax', $data, false);
    }

    public function RoleAdd_save(){
        $this->Model_member->Insert_Role($this->input->post());
        exit();
    }

    public function RoleEdit(){
        echo $this->Model_member->Call_from_Role_edit($this->input->post('id'));
        exit();
    }

    public function RoleEdit_save(){
        echo $this->Model_member->Update_Role($this->input->post());
        exit();
    }

    public function RoleDelete(){
        echo $this->Model_member->Delete_Role($this->input->post('id'));
        exit();
    }

    //Position

    public function PositionView(){
        $data['search'] = $this->input->post();
        $data['total'] = $this->Model_member->Position_list('', $data['search'], '', 1);
        $array_config = array(
            'total_rows' => $data['total'],
            'url' => base_url('Member/PositionView_ajax'),
            'per_page' => 10,
            "target" => '#postList',
            "link_func" => 'searchFilter'
        );
        $this->Model_utility->call_pagination($array_config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $array_limit = array('start' => $page, 'limit' => $array_config["per_page"]);
        $data['Position'] = $this->Model_member->Position_list($array_limit, $data['search']);
		$data["Template"] = $this->Model_template->Call_template("Position");
        $data['modal'] = $this->Model_modal->call_modal();
        $this->load->view('Member/Position_list', $data);
    }

    public function PositionView_ajax(){
        $page = $this->input->post('page');
        $data['search'] = $this->input->post();
        if(!$page){
            $offset = 0;
        }else{
            $count = $this->Model_member->Position_list(array("limit" => 10, "start" => $page), $data['search'], '', 1);
            if($page >= 10 && $count > 0){
                $offset = $page;
            }else if($page >= 10 && $count < 1){
                $offset = $page-10;
            }else if($page < 10){
                $offset = 0;
            }else{
                $offset = $page;
            }
        }
        //total rows count
        $totalRec = $this->Model_member->Position_list('', $data['search'], '', 1);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['url']    = base_url('Member/PositionView_ajax');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = 10;
        $config['link_func']   = 'searchFilter';
        $this->Model_utility->call_pagination($config);
        
        //get the posts data
        $array_limit = array('start' => $offset, 'limit' => $config["per_page"]);
        $data['Position'] = $this->Model_member->Position_list($array_limit, $data['search']);
        
        $this->load->view('Member/Position_list_ajax', $data, false);
    }

    public function PositionAdd_save(){
        $this->Model_member->Insert_Position($this->input->post());
        exit();
    }

    public function PositionEdit(){
        echo $this->Model_member->Call_from_Position_edit($this->input->post('id'));
        exit();
    }

    public function PositionEdit_save(){
        echo $this->Model_member->Update_Position($this->input->post());
        exit();
    }

    public function PositionDelete(){
        echo $this->Model_member->Delete_Position($this->input->post('id'));
        exit();
    }

    ///// Member

    public function MemberView(){
        $data['search'] = $this->input->post();
        $data['total'] = $this->Model_member->Member_list('', $data['search'], '', 1);
        $array_config = array(
            'total_rows' => $data['total'],
            'url' => base_url('Member/MemberView_ajax'),
            'per_page' => 10,
            "target" => '#postList',
            "link_func" => 'searchFilter'
        );
        $this->Model_utility->call_pagination($array_config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $array_limit = array('start' => $page, 'limit' => $array_config["per_page"]);
        $data['Member'] = $this->Model_member->Member_list($array_limit, $data['search']);
        $data['Role'] = $this->Model_member->Role_list();
        $data['Position'] = $this->Model_member->Position_list();
		$data["Template"] = $this->Model_template->Call_template("Member");
        $data['modal'] = $this->Model_modal->call_modal();
        $this->load->view('Member/Member_list', $data);
    }

    public function MemberView_ajax(){
        $page = $this->input->post('page');
        $data['search'] = $this->input->post();
        if(!$page){
            $offset = 0;
        }else{
            $count = $this->Model_member->Member_list(array("limit" => 10, "start" => $page), $data['search'], '', 1);
            if($page >= 10 && $count > 0){
                $offset = $page;
            }else if($page >= 10 && $count < 1){
                $offset = $page-10;
            }else if($page < 10){
                $offset = 0;
            }else{
                $offset = $page;
            }
        }
        //total rows count
        $totalRec = $this->Model_member->Member_list('', $data['search'], '', 1);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['url']    = base_url('Member/MemberView_ajax');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = 10;
        $config['link_func']   = 'searchFilter';
        $this->Model_utility->call_pagination($config);
        
        //get the posts data
        $array_limit = array('start' => $offset, 'limit' => $config["per_page"]);
        $data['Member'] = $this->Model_member->Member_list($array_limit, $data['search']);
        
        $this->load->view('Member/Member_list_ajax', $data, false);
    }

    public function MemberAdd_save(){
        $this->Model_member->Insert_Member($this->input->post());
        exit();
    }

    public function MemberEdit(){
        echo $this->Model_member->Call_from_Member_edit($this->input->post('id'));
        exit();
    }

    public function MemberEdit_save(){
        echo $this->Model_member->Update_Member($this->input->post());
        exit();
    }

    public function MemberDelete(){
        echo $this->Model_member->Delete_Member($this->input->post('id'));
        exit();
    }
}