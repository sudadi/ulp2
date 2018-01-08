<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/* 
 * The MIT License
 *
 * Copyright 2017 DotKom <sudadi.kom@yahoo.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RSO | Pengadaan</title>

            <!-- Jquery UI -->
        <link href="<?php echo base_url('assets/vendors/jquery/dist/jquery-ui.min.css');?>" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?php echo  base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url('assets/vendors/datatables/css/dataTables.bootstrap.min.css');?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url('assets/vendors/datatables/css/buttons.bootstrap.min.css');?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url('assets/vendors/datatables/css/rowGroup.bootstrap.min.css');?>"/>

        <!-- Font Awesome -->
        <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url('assets/css/custom.min.css');?>" rel="stylesheet">
        <!-- Toastr -->
        <link href="<?=base_url('assets/vendors/toastr/build/toastr.min.css');?>" rel="stylesheet" type="text/css">
        <!-- Select2 -->
        <link href="<?=base_url('assets/vendors/select2/dist/css/select2.min.css');?>" rel="stylesheet" type="text/css"/>
        <!-- date picker -->
        <link href="<?=base_url('assets/vendors/datepicker/css/bootstrap-datepicker.min.css');?>" rel="stylesheet" type="text/css"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?=base_url('assets/vendors/daterangepicker/daterangepicker.css');?>" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?=base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
        <script src="<?=base_url('assets/vendors/jquery/dist/jquery-ui-1.12.1.min.js');?>"></script>
        <!-- Bootstrap -->
        <script src="<?=base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
        
        

  </head>
<?php //echo $this->session->userdata('iduser');?>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        
        <!-- top nav -->
        <div class="top_nav">
            <div class="nav_menu">
              <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <?php $this->load->view('topnav'); ?>
              </nav>
            </div>
        </div>  
        <!-- end top nav -->
        
        <!-- side menu -->
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title"><img src="<?php echo base_url('assets/images/silatkcl.png');?>"></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <?php if ($this->session->userdata('usrmsk')==TRUE) { ?>
                <div class="profile clearfix">
                  <div class="profile_pic">
                        <img src="<?php echo base_url('assets/images/user.png');?>" alt="" class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                        <span>Welcome,</span>
                        <?php 
                        echo '<h2>'.$_SESSION['nmasli'].'</h2>'; ?>
                  </div>
                    <?='<h6>'.$_SESSION['nmsubunit'].'</h6>';?>
                </div>
                <?php }?> 
                
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <?php 
                            $this->load->view('menu'); ?>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    
                  <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  </a>
                    
                  <a data-toggle="tooltip" data-placement="top" title="FullScreen"  onclick="toggleFullScreen()">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url('main/logout');?>">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
                    
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>
        <!-- end side menu -->
    
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <?php if ($banner){ ?>
                <div class="row">
                    <img src="<?php echo base_url('assets/images/silat.png');?>" class="img-rounded img-responsive center-block"></img>
                </div>
            <br>
            <?php } 
            if ($this->session->userdata('usrmsk')==TRUE && $this->session->userdata('passupd')==NULL) { ?>
            <div class="bg-orange"> 
                Password/Sandi anda masih standar, mohon ganti password ada. 
                Silahkan <a href="<?php echo base_url('editpass');?>" class="alert-link">klik disini</a> untuk mengganti password.
            </div>
            <?php }?>
                      
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><?php echo $judul;?></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php $this->load->view($page, $content); ?>
                        </div>
                    </div>
                </div>
            </div>
       </div>
        <footer>
            <div class="pull-right">
                  <p>SIRS-RSO &copy; 2017</p>
                  <p></p>
            </div>
            <div class="clearfix"></div>
        </footer>
    </div>
</div>
    <?php $this->load->view('footerjs'); ?>
</body>
</html>

