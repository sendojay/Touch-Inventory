<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Model_member extends CI_Model{


    public function Role_list($limit = '', $search = '', $id = '', $count = ''){
        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['start']);
        }
        if(!empty($search["search_text"])){
            $this->db->like("role_name", $search["search_text"]);
        }
        $this->db->where("role_status", 1);
        
        if (!empty($id)) {
            return $this->db->get('role')->first_row('array');
        } else if (!empty($count)) {
            return $this->db->select("role_id")->get('role')->num_rows();
        } else {
            return $this->db->get('role')->result_array();
        }
    }

    public function Insert_Role($val){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "role_name" => $val["name"],
            "role_date_create" => $today,
            "role_date_modify" => $today,
            "role_status" => 1
        );
        $this->db->insert("role", $data);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        echo "<script>window.location='".base_url("Member/RoleView")."'</script>";
        exit();
    }

    public function Call_from_Role_edit($id){
        $role = $this->db->where("role_id", $id)->get("role")->first_row('array');
        $html = '
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Name:</label>
                <input type="text" class="form-control" name="name" value="'.$role["role_name"].'" maxlength="100" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Date Modify:</label>
                <input type="text" class="form-control" value="'.$role["role_date_modify"].'" disabled>
                <input type="hidden" name="id" value="'.$role["role_id"].'">
            </div>
            <div class="clearfix"></div>
        ';
        return $html;
    }

    public function Update_Role($val){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "role_name" => $val["name"],
            "role_date_modify" => $today
        );
        $this->db->update("role", $data, array("role_id" => $val["id"]));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }

    public function Delete_Role($id){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "role_status" => 0,
            "role_date_delete" => $today
        );
        $this->db->update("role", $data, array("role_id" => $id));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }

    //Position

    public function Position_list($limit = '', $search = '', $id = '', $count = ''){
        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['start']);
        }
        if(!empty($search["search_text"])){
            $this->db->like("position_name", $search["search_text"]);
        }
        $this->db->where("position_status", 1);
        
        if (!empty($id)) {
            return $this->db->get('position')->first_row('array');
        } else if (!empty($count)) {
            return $this->db->select("position_id")->get('position')->num_rows();
        } else {
            return $this->db->get('position')->result_array();
        }
    }

    public function Insert_Position($val){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "position_name" => $val["name"],
            "position_date_create" => $today,
            "position_date_modify" => $today,
            "position_status" => 1
        );
        $this->db->insert("position", $data);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        echo "<script>window.location='".base_url("Member/PositionView")."'</script>";
        exit();
    }

    public function Call_from_Position_edit($id){
        $position = $this->db->where("position_id", $id)->get("position")->first_row('array');
        $html = '
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Name:</label>
                <input type="text" class="form-control" name="name" value="'.$position["position_name"].'" maxlength="100" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Date Modify:</label>
                <input type="text" class="form-control" value="'.$position["position_date_modify"].'" disabled>
                <input type="hidden" name="id" value="'.$position["position_id"].'">
            </div>
            <div class="clearfix"></div>
        ';
        return $html;
    }

    public function Update_Position($val){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "position_name" => $val["name"],
            "position_date_modify" => $today
        );
        $this->db->update("position", $data, array("position_id" => $val["id"]));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }

    public function Delete_Position($id){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "position_status" => 0,
            "position_date_delete" => $today
        );
        $this->db->update("position", $data, array("position_id" => $id));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }

    //Member

    public function Member_list($limit = '', $search = '', $id = '', $count = ''){
        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['start']);
        }
        if(!empty($search["search_text"])){
            $this->db->like("member_username", $search["search_text"]);
            $this->db->or_like("member_fname", $search["search_text"]);
            $this->db->or_like("member_lname", $search["search_text"]);
            $this->db->or_like("member_email", $search["search_text"]);
            $this->db->or_like("member_phone", $search["search_text"]);
        }
        $this->db->where("member_status", 1);
        
        if (!empty($id)) {
            return $this->db->get('member')->first_row('array');
        } else if (!empty($count)) {
            return $this->db->select("member_id")->get('member')->num_rows();
        } else {
            return $this->db->get('member')->result_array();
        }
    }

    public function Insert_Member($val){
        $chk = $this->db->select("member_id")->where(array("member_username" => $val["username"], "member_status" => 1))-limit(1)->get("member")->num_rows();
        if(empty(!$chk)){
            $popup_alert = array(
                'title' => '<i class="fa fa-floppy-o"></i> Add Fail',
                'detail' => 'Username ซ้ำ',
                'url' => base_url('Member/MemberView')
            );
            echo $this->Model_modal->modal_popup_alert($popup_alert);
            exit();
        }
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $role = $this->Role_list('', '', $val["role"]);
        $position = $this->Position_list('', '', $val["position"]);
        $data = array(
            "member_role_id" => $val["role"],
            "member_role_name" => !empty($role)? $role["role_name"]: "",
            "member_position_id" => $val["position"],
            "member_position_name" => !empty($position)?$position["position_name"]:"",
            "member_fname" => $val["fname"],
            "member_lname" => $val["lname"],
            "member_username" => $val["username"],
            "member_password" => $this->Model_utility->gen_password(array($val["username"],$val["password"])),
            "member_email" => $val["email"],
            "member_phone" => $val["phone"],
            "member_date_create" => $today,
            "member_date_modify" => $today,
            "member_status" => 1
        );
        $this->db->insert("member", $data);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        echo "<script>window.location='".base_url("Member/MemberView")."'</script>";
        exit();
    }

    public function Call_from_Member_edit($id){
        $member = $this->db->where("member_id", $id)->get("member")->first_row('array');
        $Role = $this->Role_list();
        $Position = $this->Position_list();
        $arr_role = array("" => "Select Role");
        if(!empty($Role))
        {
            foreach($Role as $rs_role)
            {
            $arr_role[$rs_role["role_id"]] = $rs_role["role_name"];
            }
        }
        $arr_position = array("" => "Select Position");
                if(!empty($Position))
                {
                  foreach($Position as $rs_position)
                  {
                    $arr_position[$rs_position["position_id"]] = $rs_position["position_name"];
                  }
                }
        $html = '
            <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Username:</label>
                <input type="text" class="form-control" value="'.$member["member_username"].'" disabled>
            </div>
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Password:</label>
                <input type="text" class="form-control" name="password" maxlength="20">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Role:</label>
                '. form_dropdown('role', $arr_role, $member["member_role_id"], 'class="form-control" required').'
              </div>
              <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Position:</label>
                '.form_dropdown('position', $arr_position, $member["member_position_id"], 'class="form-control" required').'
              </div>
              <div class="clearfix"></div>
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Name:</label>
                <input type="text" class="form-control" name="fname" value="'.$member["member_fname"].'" maxlength="100" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Lastname:</label>
                <input type="text" class="form-control" name="lname" value="'.$member["member_lname"].'" maxlength="100" required>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Email:</label>
                <input type="email" class="form-control" name="email" value="'.$member["member_email"].'" maxlength="150">
            </div>
            <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Phone:</label>
                <input type="text" class="form-control" name="phone" value="'.$member["member_phone"].'" maxlength="80">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Date Modify:</label>
                <input type="text" class="form-control" value="'.$member["member_date_modify"].'" disabled>
            </div>
            <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Date Lastlogin:</label>
                <input type="text" class="form-control" value="'.(($member["member_date_lastlogin"] != "0000-00-00 00:00:00")?$member["member_date_lastlogin"]:"").'" disabled>
                <input type="hidden" name="id" value="'.$member["member_id"].'">
            </div>
            <div class="clearfix"></div>
        ';
        return $html;
    }

    public function Update_Member($val){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $role = $this->Role_list('', '', $val["role"]);
        $position = $this->Position_list('', '', $val["position"]);
        $data = array(
            "member_role_id" => $val["role"],
            "member_role_name" => !empty($role)? $role["role_name"]: "",
            "member_position_id" => $val["position"],
            "member_position_name" => !empty($position)?$position["position_name"]:"",
            "member_fname" => $val["fname"],
            "member_lname" => $val["lname"],
            "member_email" => $val["email"],
            "member_phone" => $val["phone"],
            "member_date_modify" => $today
        );
        if(!empty($val["password"])){
            $member = $this->db->select("member_username")->where("member_id", $val["id"])->get("member")->first_row('array');
            $data = array_merge($data, array("member_password" => $this->Model_utility->gen_password(array($member["member_username"],$val["password"]))));
        }
        $this->db->update("member", $data, array("member_id" => $val["id"]));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }

    public function Delete_Member($id){
        $this->db->trans_begin();
        $today = date("Y-m-d H:i:s");
        $data = array(
            "member_status" => 0,
            "member_date_delete" => $today
        );
        $this->db->update("member", $data, array("member_id" => $id));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return 0;
        }else{
            $this->db->trans_commit();
            return 1;
        }
    }
}