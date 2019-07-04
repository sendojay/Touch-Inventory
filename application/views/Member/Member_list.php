<?php echo $Template["Header"];?>
<?php echo $Template["Css"];?>
<?php echo $Template["Preload"];?>
<div id="wrapper">
  <!-- Top Navigation -->
  <?php echo $Template["Navbar"];?>
  <!-- End Top Navigation -->
  <!-- Left navbar-header -->
  <?php echo $Template["Menubar"];?>
  <!-- Left navbar-header end -->
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Member</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <button class="btn btn-info pull-right" type="button" data-toggle="modal" data-target="#Modal-form-add"><i class="fa fa-plus fa-fw"></i> Add</button>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /row -->
      <div class="row">
          <div class="white-box">
              <div class="col-sm-12">
                  <div class="col-sm-3 pad0L pad5R">
                      <label>Search :</label>
                      <input class="form-control input-search search_text" name="search_text">
                      <input type="hidden" class="input-page" value="0">
                  </div>
                  <div class="block-button">
                      <button type="button" class="btn btn-default btn-outline btn-search-click"><i class="fa fa-search fa-fw"></i> Search</button>
                  </div>
                  <div class="block-button">
                    <button type="button" class="btn btn-default btn-outline btn-reset-click"><i class="fa fa-close fa-fw"></i> Reset</button>
                  </div>
              </div>
              <div class="clearfix"></div>
              <hr/>
              <div id="postList">
            <div class="table-responsive">
            <table id="myTable" class="table table-hover table-striped">
              <thead>
                <tr>
                    <th class="text-center">Username</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Name - Lastname</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  if(!empty($Member)){
                      foreach($Member as $rs){
                        ?>
                            <tr>
                                <td><?php echo $rs["member_username"];?></td>
                                <td><?php echo $rs["member_role_name"];?></td>
                                <td><?php echo $rs["member_position_name"];?></td>
                                <td><?php echo $rs["member_fname"]." ".$rs["member_lname"];?></td>
                                <td class="text-center"><?php echo $rs["member_email"];?></td>
                                <td class="text-center"><?php echo $rs["member_phone"];?></td>
                                <td class="text-right">
                                  <a class="fa fa-edit fa-lg fa-fw cursor" data-id="<?php echo $rs["member_id"];?>" data-url="<?php echo base_url("Member/MemberEdit");?>"></a>
                                  <a class="fa fa-trash fa-lg fa-fw cursor" data-id="<?php echo $rs["member_id"];?>" data-url="<?php echo base_url("Member/MemberDelete");?>"></a>
                                </td>
                            </tr>
                        <?php
                      }
                  }
                  ?>
              </tbody>
            </table>
            </div>
            <?php echo $this->ajax_pagination->create_links();?>
            </div>
          </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <?php echo $Template["Footer"].$modal["delete"];?>
    <div class="modal fade" id="Modal-form-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open(base_url("Member/MemberAdd_save"), array("id" => "Form-add"));?>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel1">Form Add Member</h4>
            </div>
            <div class="modal-body">
              <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Username:</label>
                <input type="text" class="form-control" name="username" maxlength="20" required>
              </div>
              <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Password:</label>
                <input type="text" class="form-control" name="password" maxlength="20" required>
              </div>
              <div class="clearfix"></div>
              <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Role:</label>
                <?php 
                $arr_role = array("" => "Select Role");
                if(!empty($Role))
                {
                  foreach($Role as $rs_role)
                  {
                    $arr_role[$rs_role["role_id"]] = $rs_role["role_name"];
                  }
                }
                echo form_dropdown('role', $arr_role, '', 'class="form-control" required'); 
                ?>
              </div>
              <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Position:</label>
                <?php 
                $arr_position = array("" => "Select Position");
                if(!empty($Position))
                {
                  foreach($Position as $rs_position)
                  {
                    $arr_position[$rs_position["position_id"]] = $rs_position["position_name"];
                  }
                }
                echo form_dropdown('position', $arr_position, '', 'class="form-control" required'); 
                ?>
              </div>
              <div class="clearfix"></div>
              <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Name:</label>
                <input type="text" class="form-control" name="fname" maxlength="100" required>
              </div>
              <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Lastname:</label>
                <input type="text" class="form-control" name="lname" maxlength="100" required>
              </div>
              <div class="clearfix"></div>
              <div class="form-group col-sm-6">
                <label for="recipient-name" class="control-label">Email:</label>
                <input type="email" class="form-control" name="email" maxlength="150">
              </div>
              <div class="form-group col-sm-6">
                <label for="message-text" class="control-label">Phone:</label>
                <input type="text" class="form-control" name="phone" maxlength="80">
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <div class="modal fade" id="Modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open(base_url("Member/MemberEdit_save"), array("id" => "Form-edit"));?>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel1">Form Edit Member</h4>
            </div>
            <div class="modal-body body-edit">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php echo $Template["Script"];?>
<script type="text/javascript">
  function searchFilter(page_num) {
      page_num = page_num?page_num:0;
      var search_text = $('.search_text').val();
      $(".input-page").val(page_num);
      $.ajax({
          type: 'POST',
          url: '<?php echo base_url("Member/MemberView_ajax/"); ?>'+page_num,
          data:'page='+page_num+'&search_text='+search_text+"&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>",
          beforeSend: function () {
              // $('.loading').show();
          },
          success: function (html) {
            // console.log(html);
              $('#postList').html(html);
              // $('.loading').fadeOut("slow");
          }
      });
  }
  $(".btn-search-click").click(()=>{
    searchFilter(0);
  });
  $(".btn-reset-click").click(()=>{
    $(".input-search").val("");
    searchFilter(0);
  });
  $("body").on("click", ".fa-edit", (e)=>{
    var data = call_ajax(e.target.dataset.url, "id="+e.target.dataset.id+"&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>");
    $(".body-edit").html(data);
    $("#Modal-form-edit").modal("show");
  });
  $("body").on("submit", "#Form-edit", function(){
    var data = call_ajax("<?php echo base_url("Member/MemberEdit_save");?>", $(this).serialize());
    if(data == 1){
      searchFilter($(".input-page").val());
    }
    $("#Modal-form-edit").modal("toggle");
    return false;
  });
  $('body').on('click','.fa-trash',function () {
      $('.delete_submit').data('id', $(this).data('id'));
      $('.delete_submit').data('url', $(this).data('url'));
      $('#modal_delete').modal('show');
  });
  $('body').on('click','.delete_submit',function ()  {
      var id = $(this).data('id');
      var url = $(this).data('url');
      var data = call_ajax(url, "id="+id+"&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>");
      if(data == 1){
        searchFilter($(".input-page").val());
      }
      $('#modal_delete').modal('toggle');
  });
</script>
<?php echo $Template["Under"];?>
