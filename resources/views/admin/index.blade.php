<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tshirt Ecommerce</title>
  <link rel="icon" href="{!! asset('admin_asset/images/icon.png') !!}"/>
  <base href="{{asset('')}}">
  <!-- <base href="http://localhost:8000/tshirt_ecommerce/public"> -->
  <!-- Bootstrap core CSS-->
  <link href="admin_asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="admin_asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="admin_asset/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand"href="{!! url('admin/manageHome') !!}">Tshirt Ecommerce</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-sitemap"></i>
          <span class="nav-link-text">Sale</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti">
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{!! url('admin/order') !!}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text" href="{!! url('admin/order') !!}">Sale Order</span>
          </a>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{!! url('admin/customer') !!}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text" href="{!! url('admin/customer') !!}">Customer</span>
          </a>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{!! url('admin/product') !!}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text" href="{!! url('admin/product') !!}">Product</span>
          </a>
        </li>
        </ul>
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{!! url('admin/manageHome') !!}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Revenue</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Setting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{!! url('admin/setting/productCategory') !!}">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Product Category</span>
              </a>
            </li>
            <li>
              <a href="{!! url('admin/setting/option') !!}">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Option</span>
              </a>
            </li>
            <li>
              <a href="{!! url('admin/setting/city') !!}">
                 <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">City</span>
              </a>
            </li>
            <li>
              <a href="{!! url('admin/setting/shipper') !!}">
                 <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Shipper</span>
              </a>
            </li>
            <li>
              <a href="{!! url('admin/setting/payment') !!}">
                 <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Payment</span>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="{!! url('admin/manageHome') !!}">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Go To Website</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
         <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </nav>


      <div class="content-wrapper">
          @yield('content')
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small>Website tshirt_Ecommerce</small>
          </div>
        </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Do you want to log out?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="{!! url('admin') !!}">Logout</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="admin_asset/vendor/jquery/jquery.min.js"></script>
      <script src="admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="admin_asset/vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="admin_asset/js/sb-admin.min.js"></script>
    </div>
  </body>

  </html>
