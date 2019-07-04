<?php
defined('BASEPATH')OR exit();
class Model_utility extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->model("Model_modal");
    }

    public function Check_session_login(){
        if(!$this->session->userdata("member_id")){
            $popup_alert = array(
                'title' => '<i class="fa fa-floppy-o"></i> Plase Login',
                'detail' => 'Please login to continue',
                'url' => base_url('Login')
            );
            echo $this->Model_modal->modal_popup_alert($popup_alert);
            exit();
        }
    }
    
    public function encrypt_encode($val) {
        return str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encrypt->encode($val));
    }

    public function encrypt_decode($val) {
        return $this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='), $val));
    }
    
    public function gen_password($val){
        $password = '';
        if(!empty($val)){
            foreach($val as $rs){
                $password .= $rs;
            }
        }
        return md5($password.'_inven');
    }
    
    public function do_resize($config) {
        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }
    
    public function do_upload($file, $config) {
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file)) {
            $data = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        return $data;
    }
    
    public function do_muti_upload($file, $config) {
         $this->load->library('upload');
         $this->upload->initialize($config);
         $name = array();
        foreach ($file as $key => $value) 
        {
            if (!empty($value['tmp_name']) && $value['size'] > 0) 
            {
                if (!$this->upload->do_upload($key)) 
                {
                    $data = array('error' => $this->upload->display_errors());
                } 
                else 
                {
                    $data = array('upload_data' => $this->upload->data());
                    $name[] = $data['upload_data']['file_name'];
                } 
            }
            else
            {
                $name[] = null;
            }
        }
        return $name;
    }

    public function call_pagination($val) {
        $this->load->library('Ajax_pagination');
        $config["total_rows"] = $val['total_rows'];
        $config["url"] = $val['url'];
        $config["per_page"] = $val['per_page'];
        $config["target"] = $val['target'];
        $config["link_func"] = $val['link_func'];

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<div class="col-sm-6"><ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = 'Frist';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->ajax_pagination->initialize($config);
        return $this->ajax_pagination->create_links();
    }
}