<div class="table-responsive">
  <table id="myTable" class="table table-hover table-striped">
    <thead>
      <tr>
          <th class="text-center">ชื่อ</th>
          <th class="text-center">เครื่องมือ</th>
      </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($Role)){
            foreach($Role as $rs){
              ?>
                  <tr>
                      <td><?php echo $rs["role_name"];?></td>
                      <td class="text-right">
                        <a class="fa fa-edit fa-lg fa-fw cursor" data-id="<?php echo $rs["role_id"];?>" data-url="<?php echo base_url("Member/RoleEdit");?>"></a>
                        <a class="fa fa-trash fa-lg fa-fw cursor" data-id="<?php echo $rs["role_id"];?>" data-url="<?php echo base_url("Member/RoleDelete");?>"></a>
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