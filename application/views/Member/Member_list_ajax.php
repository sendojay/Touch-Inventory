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