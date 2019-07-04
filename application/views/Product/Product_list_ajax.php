<div class="table-responsive">
            <table id="myTable" class="table table-hover table-striped">
              <thead>
                <tr>
                    <th class="text-center">Item name</th>
                    <th class="text-center">Name - Lastname</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  if(!empty($Product)){
                      foreach($Product as $rs){
                        ?>
                            <tr>
                                <td><?php echo $rs["item_name"];?></td>
                                <td><?php echo $rs["member_fname"]." ".$rs["member_lname"];?></td>
                                <td class="text-center"><?php echo $rs["item_description"];?></td>
                                <td class="text-center">
                                  <?php if($rs["item_status"] == 1){?>
                                            <button class="btn btn-sm btn-success">Empty</button>
                                        <?php }else if($rs["item_status"] == 2){?>
                                            <button class="btn btn-sm btn-danger">Using</button>
                                        <?php }?>
                              </td>
                                <td class="text-right">
                                  <a class="fa fa-edit fa-lg fa-fw cursor" data-id="<?php echo $rs["item_id"];?>" data-url="<?php echo base_url("Product/ProductEdit");?>"></a>
                                  <a class="fa fa-trash fa-lg fa-fw cursor" data-id="<?php echo $rs["item_id"];?>" data-url="<?php echo base_url("Product/ProductDelete");?>"></a>
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