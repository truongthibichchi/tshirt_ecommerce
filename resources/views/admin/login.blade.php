
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Log In</title>
  <link rel="icon" href="{!! asset('admin_asset/images/icon.ico') !!}"/>
   <base href="{{ asset('') }}">
  <!-- Bootstrap core CSS-->
  <link href="admin_asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="admin_asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="admin_asset/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
     @if(session('message'))
    <div class="alert alert-danger">
      <strong>{{ session('message') }}</strong>
    </div>
    @endif
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form  action="admin/login" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group"> 
            <div class="col-xs-10">
              <label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>email</label>
              <div class="input-group col-sm-12">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="email" name="email" required="">
              </div>
            </div>
          </div> 
          <div class="form-group"> 
            <div class="col-xs-10">
              <label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Password</label>
              <div class="input-group col-sm-12">
                <span class="input-group-addon"></span>
                <input type="password" class="form-control" id="password" name="password" required="">
              </div>
            </div>
          </div>
        
          <div class="modal-footer">
            <button id="btnSubmitModel" type="submit" class="btn btn-info">Log In</button>    
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="admin_asset/vendor/jquery/jquery.min.js"></script>
  <script src="admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="admin_asset/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
