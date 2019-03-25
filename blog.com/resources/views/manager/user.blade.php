@extends('layouts.masterAdmin')
@section('content')

<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">USER</h2>
  </div>
</div>
<div class="container-fluid">

  <hr>
  <a href="#" class="btn btn-primary btn-add">Add new user</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="user" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>

      </table>
    </div>
  </div>
</div>


{{-- Show detail --}}
<div class="modal fade" id="modal-show">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Detail</h4>
      </div>
      <div class="modal-body">
        <h2  style="text-align: center;">User Info</h2>
        <table class="table table-hover">
          <tbody>
            <tr>
              <td style="width: 20%; font-weight: bold;">ID</td>
              <td id="id"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">Name</td>
              <td id="name"></td>
            </tr>
            
            <tr>
              <td style="width: 20%; font-weight: bold;">Email </td>
              <td id="email"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">Creatd at </td>
              <td id="created_at"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">Updated at</td>
              <td id="updated_at"></td>
            </tr>
            
          </tbody>
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- Add post --}}
{{-- <div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <form action="" id="form-add" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add new user</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="name-add">
            <label for="">Email</label>
            <input type="email" class="form-control" id="email-add">
            <label for="">Password</label>
            <input type="password" class="form-control" id="password-add">
          </div> 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div> --}}

{{-- Edit tag --}}
{{-- <div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="" id="form-edit" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit user</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id-edit" name="id">

            <label for="">Name</label>
            <input type="text" class="form-control" id="name-edit" name="name">
            <label for="">Email</label>
            <input type="email" class="form-control" id="email-edit" name="email">
            <label for="">Password</label>
            <input type="password" class="form-control" id="password-edit" name="password">
          </div> 
          
        </div> 
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="edit">Edit</button>

        </div>
      </form>
    </div>
  </div>
</div> --}}
@endsection

@section('script')
{{-- DataTable --}}
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#user').DataTable({
      processing: true,
      serverSide: true,
      ajax: '/admin/getuser',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },
      { data: 'action', name: 'action' }
      ]
    });
  });
</script> 
<script type="text/javascript" src="/js/manager/userjs.js"></script>

@endsection
