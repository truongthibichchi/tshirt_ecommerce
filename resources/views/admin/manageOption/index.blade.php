@extends('admin.index')
@section('content')
<!-- <div class="container-fluid"> -->
	
<link rel="stylesheet" type="text/css" href="{!! url('public/admin_asset/css/table-sort/PagingTable.css') !!}">
<!-- my custom -->
<link rel="stylesheet" type="text/css" href="{!! url('public/admin_asset/css/ManageAddress/index.css') !!}">
<!-- Modal -->
<div class="modal fade" id="sizeModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Option Information</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="">
          <div class="form-group">
            <label class="control-label col-sm-5" for="optionName">Option Name</label>
            <div class="col-xs-10">
              <div class="input-group col-sm-12">
                <span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
                <input type="text" class="form-control" id="optionName" name="optionName">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btnSubmitModel" type="button" class="btn btn-info">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
<!-- end modals -->
<!-- start container -->
<div class="container-fluid">
  <!-- start row -->
  <div class="row">
    <div class="col-xs-12 header-content">
      <div class="col-md-4">
        <button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#sizeModal">+</button>
        <div class="form-inline col-md-12">
          <div id="contentBodySearch">
            
          </div>
        </div>
      </div>
      
    </div>
    <!-- end row -->
  </div>
  <!-- script custom js -->
  <script type="text/javascript" src="{!! url('public/admin_asset/js/ManageAddress/city/index.js') !!}"></script>
@endsection