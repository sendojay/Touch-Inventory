<?php
defined('BASEPATH')or exit("No direct script access allowed");
class Model_modal extends CI_Model{
    
    public function modal_popup_alert($arr) {
        $data = '
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <title>NIU</title>
                    <!-- Tell the browser to be responsive to screen width -->
                    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/bootstrap.min.css') . '"/>
                    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/font-awesome.css') . '"/>
                    
                    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                    <!--[if lt IE 9]>
                        <script src="' . base_url('assets/css/html5shiv.js') . '"></script>
                        <script src="' . base_url('assets/css/respond.min.js') . '"></script>
                    <![endif]-->
                </head>
                <body>
                    <!-- Modal -->
                    <div id="alert" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">' . $arr['title'] . '</h4>
                                </div>
                                <div class="modal-body">
                                    <p>' . $arr['detail'] . '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="' . $arr['url'] . '" id="go" ></a>
                    <a data-toggle="modal" data-target="#alert" id="alert_click" data-backdrop="static" data-keyboard="false"></a>
                    <!-- End Modal -->
                    <!-- Control Sidebar -->
                    <script src="' . base_url('assets/js/jquery.min.js') . '"></script>
                    <script src="' . base_url('assets/js/bootstrap.min.js') . '"></script>
                    <script type="text/javascript">
                        $(function () {
                            $("#alert_click").click();
                            setInterval(function(){
                                window.location="' . $arr['url'] . '";
                            }, 500);
                        });
                        function go(){
                            $("#go").click();
                        }
                    </script>
                </body>
            </html>
        ';
        return $data;
    }
    private function modal_delete() {
        return '
                <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-bg-primary">
                                <button type="button" class="close close-modal-delete" data-dismiss="modal" data-target="#modal_delete" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">NIU System</h4>
                            </div>
                            <div class="modal-body">
                                <p>คุณต้องการลบข้อมูลหรือไม่</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger delete_submit"><i class="fa fa-check"></i> ตกลง</button>    
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> ปิด</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            ';
    }

    public function call_modal() {
        return array(
            'delete' => $this->modal_delete()
        );
    }
}