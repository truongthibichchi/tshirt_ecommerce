@extends('admin.index')
@section('content')

<!-- table-sort -->
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
        <h4 class="modal-title">City Information</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="">
          <div class="form-group">
            <label class="control-label col-sm-2" for="city">city:</label>
            <div class="col-xs-10">
              <div class="input-group col-sm-12">
                <span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
                <input type="text" class="form-control" id="city" name="city">
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
        
      </div>
      
    </div>
    <!-- end row -->
  </div>

  <div class="card-body">
  <div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4" >
      <div class="row" style="padding-left: 70%">
        <div class="col-sm-20 ">
          <div class="dataTables_length" id="dataTable_length">
            <select style="height: 38px" name="dataTable_length" aria-controls="dataTable" class="form-control form-control-sm">
              <option value="10">5</option>
              <option value="25">10</option>
              <option value="50">15</option>
              <option value="100">20</option>
            </select>
          </div>
        </div>
        <div class="col-sm-20 ">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for...">
            <span class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </div>
      </div>
      <div class="row" style="padding-top: 2%">
        <div class="col-sm-12">
          
          <table class="table table-striped table-bordered table-hover" id="categoryList">
            <thead>
              <tr align="center">
                <th class="table-Sort" data-sort="no" style="width: 5%;">No.</th>
                <th class="table-Sort" data-sort="id" style="width: 10%;">ID</th>
                <th class="table-Sort" style="width: 10%;" data-sort="city">City</th>
                <th class="table-Sort"  style="width: 10%;">Delete</th>
                <th class="table-Sort"  style="width: 10%;">Edit</th>

              </tr>
            </thead>
            <tbody>
              <tr class="odd gradeX" align="center">
                <td></td>
                <td></td>
                <td></td> 
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
              </tr>
              <tr class="even gradeC" align="center">
                <td></td>
                <td></td>
                <td></td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
              </tr>
              <tr class="even gradeC" align="center">
                <td></td>
                <td></td>
                <td></td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
              </tr>
            </tbody>
          </table>
          
        </div>
      </div>
      <div class="row" style="padding-left: 65%">
        <div class="col-sm-12 col-md-5">
          <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
          </div>
        </div>
        <div class="col-sm-12 col-md-7">
          <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
            <ul class="pagination">
              <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
              </li>
              <li class="paginate_button page-item active">
                <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
              </li>
              <li class="paginate_button page-item next disabled" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{!! url('public/admin_asset/js/table-sort/PagingTable.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/admin_asset/js/ManageOrder/confirm.js') !!}"></script>
  <!-- end container -->
  <!-- script custom js -->
  <script type="text/javascript" src="{!! url('public/admin_asset/js/ManageAddress/city/index.js') !!}"></script>


  @endsection