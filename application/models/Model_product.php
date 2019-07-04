<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Model_product extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Model_member'));
    }
    public function Product_list($limit = '', $search = '', $id = '', $count = ''){
        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['start']);
        }
        if(!empty($search["search_text"])){
            $this->db->like("item_key", $search["search_text"]);
            $this->db->or_like("item_description", $search["search_text"]);
        }
        $this->db->where("item_status !=", 0);
        
        if (!empty($id)) {
            return $this->db->get('item')->first_row('array');
        } else if (!empty($count)) {
            return $this->db->select("item_id")->get('item')->num_rows();
        } else {
            return $this->db->join("member as m", "i.item_member_id = m.member_id", "LEFT")->order_by('item_id', 'ASC')->get('item as i')->result_array();
        }
    }

    public function Insert_Product($val){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "item_name" => $val["name"],
            "item_member_id" => $val["member"],
            "item_description" => $val["description"],
            "item_date_create" => $today,
            "item_date_modify" => $today,
            "item_date_using" => $val["member"] > 0 ? $today : "",
            "item_status" => $val["member"] > 0 ? 2 : 1
        );
        $this->db->insert("item", $data);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        echo "<script>window.location='".base_url("Product/ProductView")."'</script>";
        exit();
    }

    public function Call_from_Product_edit($id){
        $product = $this->db->where("item_id", $id)->get("item")->first_row('array');
        $member = $this->Model_member->Member_list();
        $arr_member = array("" => "Select Member");
        if(!empty($member))
        {
            foreach($member as $rs_member)
            {
            $arr_member[$rs_member["member_id"]] = $rs_member["member_fname"]." ".$rs_member["member_lname"];
            }
        }
        $html = '
            <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Name:</label>
                <input type="text" class="form-control" name="name" value="'.$product["item_name"].'">
            </div>
              <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Member:</label>
                '.form_dropdown('member', $arr_member, $product["item_member_id"], 'class="form-control"').'
              </div>
              <div class="clearfix"></div>
            <div class="form-group col-sm-12">
                <label for="recipient-name" class="control-label">Description:</label>
                <textarea class="form-control" name="description">'.$product["item_description"].'</textarea>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Date Modify:</label>
                <input type="text" class="form-control" value="'.$product["item_date_modify"].'" disabled>
                <input type="hidden" name="id" value="'.$product["item_id"].'">
            </div>
            <div class="clearfix"></div>
        ';
        return $html;
    }

    public function Update_Product($val){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "item_name" => $val["name"],
            "item_member_id" => $val["member"],
            "item_description" => $val["description"],
            "item_date_modify" => $today,
            "item_date_using" => $val["member"] > 0 ? $today : "",
            "item_status" =>  $val["member"] > 0 ? 2 : 1,
        );
        $this->db->update("item", $data, array("item_id" => $val["id"]));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }

    public function Delete_Product($id){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "item_status" => 0,
            "item_date_delete" => $today
        );
        $this->db->update("item", $data, array("item_id" => $id));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }
}