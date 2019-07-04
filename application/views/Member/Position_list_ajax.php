
<div class="table-responsive">
  <table id="myTable" class="table table-hover table-striped">
    <thead>
      <tr>
          <th class="text-center">Name</th>
          <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($Position)){
            foreach($Position as $rs){
              ?>
                  <tr>
                      <td><?php echo $rs["position_name"];?></td>
                      <td class="text-right">
                        <a class="fa fa-edit fa-lg fa-fw cursor" data-id="<?php echo $rs["position_id"];?>" data-url="<?php echo base_url("Member/PositionEdit");?>"></a>
                        <a class="fa fa-trash fa-lg fa-fw cursor" data-id="<?php echo $rs["position_id"];?>" data-url="<?php echo base_url("Member/PositionDelete");?>"></a>
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