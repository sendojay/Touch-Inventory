<?php
defined('BASEPATH')or exit("No direct script access allowed");
class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Model_template', 'Model_utility', 'Model_modal', 'Model_product', 'Model_member'));
        $this->Model_utility->Check_session_login();
    }

    public function ProductView(){
        $data['search'] = $this->input->post();
        $data['total'] = $this->Model_product->Product_list('', $data['search'], '', 1);
        $array_config = array(
            'total_rows' => $data['total'],
            'url' => base_url('Product/ProductView_ajax'),
            'per_page' => 10,
            "target" => '#postList',
            "link_func" => 'searchFilter'
        );
        $this->Model_utility->call_pagination($array_config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $array_limit = array('start' => $page, 'limit' => $array_config["per_page"]);
        $data['Product'] = $this->Model_product->Product_list($array_limit, $data['search']);
        $data['Member'] = $this->Model_member->Member_list();
		$data["Template"] = $this->Model_template->Call_template("Product");
        $data['modal'] = $this->Model_modal->call_modal();
        $this->load->view('Product/Product_list', $data);
    }

    public function ProductView_ajax(){
        $page = $this->input->post('page');
        $data['search'] = $this->input->post();
        if(!$page){
            $offset = 0;
        }else{
            $count = $this->Model_product->Product_list(array("limit" => 10, "start" => $page), $data['search'], '', 1);
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
        $totalRec = $this->Model_product->Product_list('', $data['search'], '', 1);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['url']    = base_url('Product/ProductView_ajax');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = 10;
        $config['link_func']   = 'searchFilter';
        $this->Model_utility->call_pagination($config);
        
        //get the posts data
        $array_limit = array('start' => $offset, 'limit' => $config["per_page"]);
        $data['Product'] = $this->Model_product->Product_list($array_limit, $data['search']);
        
        $this->load->view('Product/Product_list_ajax', $data, false);
    }

    public function ProductAdd_save(){
        $this->Model_product->Insert_Product($this->input->post());
        exit();
    }

    public function ProductEdit(){
        echo $this->Model_product->Call_from_Product_edit($this->input->post('id'));
        exit();
    }

    public function ProductEdit_save(){
        echo $this->Model_product->Update_Product($this->input->post());
        exit();
    }

    public function ProductDelete(){
        echo $this->Model_product->Delete_Product($this->input->post('id'));
        exit();
    }
}