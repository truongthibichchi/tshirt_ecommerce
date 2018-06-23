@extends('admin.layout.index')
@section('contentPages')

<!-- Modal New -->
<div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
       </button>
       <h4 class="modal-title" id="myModalLabel">New City</h4>
     </div>
     <div class="modal-body">
      <form  action="admin/setting/city/newCity" method="POST">
        {{csrf_field()}}
         <div class="form-group"> 
           <div class="col-xs-10">
             <label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>City Name</label>
            <div class="input-group col-sm-12">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="new_cityName" name="new_cityName" required="">
            </div>
          </div>
        </div> 
         <div class="modal-footer">
            <button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Add</button>    
        </div>
             
      </form>
    </div>
   
  </div>
</div>
</div>

<!-- modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
       </button>
       <h4 class="modal-title" id="myModalLabel" style="color: red">Do you want to delete?</h4>
     </div>
     <div class="modal-body">
      <form  action="admin/setting/city/deleteCity" method="POST">
        {{csrf_field()}}
        <div class="form-group">
          <div class="col-xs-10">
            <label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>ID</label>
            <div class="input-group col-sm-12">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="delete_id" name="delete_id" readonly>
            </div>
          </div> 
        </div> 
        <div class="form-group"> 
           <div class="col-xs-10">
             <label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>City Name</label>
            <div class="input-group col-sm-12">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="delete_cityName" name="delete_cityName" readonly>
            </div>
          </div>
        </div>
         <div class="modal-footer">
            <button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Delete</button>    
        </div>
             
      </form>
    </div>
   
  </div>
</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
       </button>
       <h4 class="modal-title" id="myModalLabel">Edit City</h4>
     </div>
     <div class="modal-body">
      <form  action="admin/setting/city/editCity" method="POST">
        {{csrf_field()}}
        <div class="form-group">
          <div class="col-xs-10">
            <label class="control-label"><i class="fa fa-star" aria-hidden="true"></i>ID</label>
            <div class="input-group col-sm-12">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="edit_id" name="edit_id" readonly>
            </div>
          </div> 
        </div> 
        <div class="form-group"> 
           <div class="col-xs-10">
             <label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>City Name</label>
            <div class="input-group col-sm-12">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="edit_cityName" name="edit_cityName" required="">
            </div>
          </div>
        </div>
         <div class="modal-footer">
            <button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Save</button>    
        </div>
             
      </form>
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
    <a href="{!! url('admin/setting/city') !!}">City</a>
  </li>
</ol>

<!-- Example DataTables Card-->
<div class="card mb-3">
  <div class="card-header">
    <button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#modalNew">+ New</button>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $err)
      <strong>{{$err}}</strong><br/>
      @endforeach
    </div>
    @endif
    @if(session('message'))
    <div class="alert alert-success">
      <strong>{{ session('message') }}</strong>
    </div>
    @endif
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" method="POST">
          {{csrf_field()}}
          <thead>
            <tr align="center">
              <th>ID</th>
              <th>Category Name</th>  
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cityList as $cl)
            <tr class="odd gradeX" align="center"> 
              <td> {{ $cl -> id }} </td>
              <td> {{ $cl -> cityName }}</td> 
              <td class="center" id="delete" value="{{ $cl -> id }}">
                <i class="fa  fa-trash  fa-fw"   style="color: red"></i>
              </td>
              <td class="center" id="edit" value="{{ $cl -> id }}"  > 
                <i class="fa fa-pencil fa-fw "  style="color: #E8910D" ></i>
              </td>
            </tr> 
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted"></div>
  </div>
</div>
@endsection

<!-- script -->
@section('script')
{{csrf_field()}}
  <script>
  $(document).on('click','#edit',function() {
    var id = $(this).closest('tr').find('td:eq(0)').text();
    var cityName =$(this).closest('tr').find('td:eq(1)').text();
     $('#edit_id').val(id);
     $('#edit_cityName').val(cityName);
     $('#modalEdit').modal('show');
  }); 
  </script>
  <script >
     $(document).on('click','#delete',function() {
    var id = $(this).closest('tr').find('td:eq(0)').text();
    var cityName =$(this).closest('tr').find('td:eq(1)').text();
     $('#delete_id').val(id);
     $('#delete_cityName').val(cityName);
     $('#modalDelete').modal('show');
  });
  </script>
@endsection
