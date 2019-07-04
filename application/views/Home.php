<?php echo $Template["Header"];?>
<?php echo $Template["Css"];?>
<?php echo $Template["Preload"];?>
<div id="wrapper">
  <!-- Navigation -->
  <?php echo $Template["Navbar"];?>
  <!-- Left navbar-header -->
  <?php echo $Template["Menubar"];?>
  <!-- Left navbar-header end -->
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- <div class="white-box">
            <h3 class="box-title">Order Status</h3>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Invoice</th>
                    <th>User</th>
                    <th>Order date</th>
                    <th>Amount</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Tracking Number</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="javascript:void(0)" class="btn-link"> Order #53431</a></td>
                    <td>Steve N. Horton</td>
                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 22, 2014</span></td>
                    <td>$45.00</td>
                    <td class="text-center"><div class="label label-table label-success">Paid</div></td>
                    <td class="text-center">-</td>
                  </tr>
                  <tr>
                    <td><a href="javascript:void(0)" class="btn-link"> Order #53432</a></td>
                    <td>Charles S Boyle</td>
                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 24, 2014</span></td>
                    <td>$245.30</td>
                    <td class="text-center"><div class="label label-table label-info">Shipped</div></td>
                    <td class="text-center"><i class="fa fa-plane"></i> CGX0089734531</td>
                  </tr>
                  <tr>
                    <td><a href="javascript:void(0)" class="btn-link"> Order #53433</a></td>
                    <td>Lucy Doe</td>
                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 24, 2014</span></td>
                    <td>$38.00</td>
                    <td class="text-center"><div class="label label-table label-info">Shipped</div></td>
                    <td class="text-center"><i class="fa fa-plane"></i> CGX0089934571</td>
                  </tr>
                  <tr>
                    <td><a href="javascript:void(0)" class="btn-link"> Order #53434</a></td>
                    <td>Teresa L. Doe</td>
                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 15, 2014</span></td>
                    <td>$77.99</td>
                    <td class="text-center"><div class="label label-table label-info">Shipped</div></td>
                    <td class="text-center"><i class="fa fa-plane"></i> CGX0089734574</td>
                  </tr>
                  <tr>
                    <td><a href="javascript:void(0)" class="btn-link"> Order #53435</a></td>
                    <td>Teresa L. Doe</td>
                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 12, 2014</span></td>
                    <td>$18.00</td>
                    <td class="text-center"><div class="label label-table label-success">Paid</div></td>
                    <td class="text-center">-</td>
                  </tr>
                  <tr>
                    <td><a href="javascript:void(0)" class="btn-link">Order #53437</a></td>
                    <td>Charles S Boyle</td>
                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 17, 2014</span></td>
                    <td>$658.00</td>
                    <td class="text-center"><div class="label label-table label-danger">Refunded</div></td>
                    <td class="text-center">-</td>
                  </tr>
                  <tr>
                    <td><a href="javascript:void(0)" class="btn-link">Order #536584</a></td>
                    <td>Scott S. Calabrese</td>
                    <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 19, 2014</span></td>
                    <td>$45.58</td>
                    <td class="text-center"><div class="label label-table label-warning">Unpaid</div></td>
                    <td class="text-center">-</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
    <?php echo $Template["Footer"];?>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php echo $Template["Script"];?>
<script src="<?php echo base_url("assets/js/dashboard.js");?>"></script>
<?php echo $Template["Under"];?>