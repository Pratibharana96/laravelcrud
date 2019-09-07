@extends('layouts.pratibhasapp')
@section('content')
<div class="container">
 
 <div class="card card-block">
     <h2 class="card-title">Laravel AJAX Examples
        
     </h2>
     <p class="card-text">Learn how to handle ajax with Laravel and jQuery.</p>
     <button id="btn-add" name="btn-add" class="btn btn-primary ">Add New Link</button>
 </div>

 <div>
     <table class="table table-inverse">
         <thead>
         <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Designation</th>
             <th>Github Link</th>
         </tr>
         </thead>
         <tbody id="links-list" name="links-list">
         @foreach ($prdata as $data)
             <tr id="link{{$data->id}}">
                 <td>{{$data->id}}</td>
                 <td>{{$data->name}}</td>
                 <td>{{$data->designation}}</td>
                 <td>{{$data->githublink}}</td>
                 <td>
                     <button class="btn btn-warning open-modal" value="{{$data->id}}">Edit
                     </button>
                     <button class="btn btn-danger delete-link" value="{{$data->id}}">Delete
                     </button>
                 </td>
             </tr>
         @endforeach
         </tbody>
     </table>

     <div class="modal fade" id="linkEditorModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="linkEditorModalLabel">Manage All Your Information </h4>
                 </div>
                 <div class="modal-body">
                     <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                         <div class="form-group">
                             <label for="inputLink" class="col-sm-2 control-label">Name</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name" value="">
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-2 control-label">Designation</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="designation" name="designation"
                                        placeholder="Enter Your designation" value="">
                             </div>
                         </div>
                         
                         <div class="form-group">
                             <label class="col-sm-2 control-label">Github Link</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="githublink" name="githublink"
                                        placeholder="Enter Your Github Link" value="">
                             </div>
                         </div>
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                     </button>
                     <input type="hidden" id="prdata" name="prdata" value="0">
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>



@endsection
