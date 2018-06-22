@extends('admin.layout.index')
@section('contentPages')

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
       <h4 class="modal-title" id="myModalLabel">New Category</h4>
     </div>
     <div class="modal-body">
      <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
        <div class="form-group error">
          <div class="col-xs-10">
            <div class="input-group col-sm-12">
              <span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
              <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name...">
            </div>
          </div>
        </div>        
      </form>
    </div>
    <div class="modal-footer">
      <button id="btnSubmitModel" type="button" class="btn btn-info"><i class="fa fa-check"></i>Add</button>
      <button  type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
    </div>
  </div>
</div>
</div>



<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{!! url('admin/manageHome') !!}">Home</a>
  </li>
  <li class="breadcrumb-item active">
    <a href="{!! url('admin/setting/productCategory') !!}">Category</a>
  </li>
  
</ol>


<!-- Example DataTables Card-->
<div class="card mb-3">
  <div class="card-header">
    <button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#myModal">+ New</button>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>ID</th>
              <th>Category Name</th>  
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categoryList as $cl)
            <tr class="odd gradeX" align="center"> 
              <td> {{ $cl -> id }} </td>
              <td> {{ $cl -> categoryName }}</td> 
              <td class="center"><a href="admin/setting/productCategory/delete/{{$cl->id}}" style="color: red">
                <i class="fa  fa-trash  fa-fw"></i>
              </a></td>
              <td class="center"> <a href="admin/setting/productCategory/update/{{$cl->id}}">
                <i class="fa fa-pencil fa-fw" style="color: #E8910D"></i>
              </a></td>
            </tr> 
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted"></div>
  </div>
</div>
<!-- <script type="text/javascript" src="{!! url('public/admin_asset/js/ManageAddress/city/index.js') !!}"></script> -->
@endsection