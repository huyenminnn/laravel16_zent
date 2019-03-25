@extends('layouts.masterAdmin')
@section('content')

<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">POSTS</h2>
  </div>
</div>
<div class="container-fluid">

  <hr>
  <a href="#" class="btn btn-primary btn-add">Add new post</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="post" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>User Create</th>
            <th>Category</th>
            <th>View Count</th>
            <th>Created at</th>
            <th>Updated at</th>
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
        <h2  style="text-align: center;">Post Info</h2>
        <table class="table table-hover">
          <tbody>
            <tr>
              <td style="width: 20%; font-weight: bold;">ID</td>
              <td id="id"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">Title</td>
              <td id="title"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">Content</td>
              <td id="content"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">Slug </td>
              <td id="slug"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">Description </td>
              <td id="description"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">User ID</td>
              <td id="user_id"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">Category ID</td>
              <td id="category_id"></td>
            </tr>
            <tr>
              <td style="width: 20%; font-weight: bold;">View</td>
              <td id="view_count"></td>
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
        <img id="thumbnail-show" src="" style="height: 450px;width: 100%;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- Add post --}}
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <form action="" id="form-add" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add new post</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Title<span class="required"> *</span></label>
            <input type="text" class="form-control" id="title-add" name="title">
            <label for="">Description<span class="required"> *</span></label>
            <textarea type="text" class="form-control" id="description-add" rows="3" name="description"></textarea>
            <label for="">Content<span class="required"> *</span></label>
            <textarea type="text" class="form-control" id="content-add" rows="10" name="content"></textarea>
            <label for="">Slug<span class="required"> *</span></label>
            <input type="text" class="form-control" id="slug-add" name="slug">
            {{-- <label for="">User<span class="required"> *</span></label> --}}
            <input type="hidden" class="form-control" id="user-add" value="{{ Auth::id() }}" name="user">
            <label for="">Category<span class="required"> *</span></label>
            {{-- <input type="text" class="form-control" id="category-add" name="category"> --}}
            <select class="form-control" id="category-add" name="category">{{-- 
              <option value="0">None</option> --}}
              @foreach($categories as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
            

            
            <label for="">Thumbnail<span class="required"> *</span></label>
            <input type="file" class="form-control" id="thumbnail-add" name="thumbnail">
          </div> 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Edit post --}}
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="" id="form-edit" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit post</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id-edit" name="id">

            <label for="">Title<span class="required"> *</span></label>
            <input type="text" class="form-control" id="title-edit" name="title">
            <label for="">Description<span class="required"> *</span></label>
            <textarea type="text" class="form-control" id="description-edit" name="description" rows="3"></textarea>
            <label for="">Content<span class="required"> *</span></label>
            <textarea type="text" class="form-control" id="content-edit" name="content" rows="10"></textarea>
            <label for="">Slug<span class="required"> *</span></label>
            <input type="text" class="form-control" id="slug-edit" name="slug">
            <input type="hidden" class="form-control" id="user-edit" name="user" readonly="">
            <label for="">Category<span class="required"> *</span></label>
            <select class="form-control" id="category-edit" name="category">
              @foreach($categories as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
            <label for="">Thumbnail<span class="required"> *</span></label>
            <input type="file" class="form-control" id="thumbnail-edit" name="thumbnail">

          </div> 
          <img class="thumb" style="height: 450px;width: 100%;">
        </div> 
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="edit">Edit</button>

        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
{{-- DataTable --}}
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#post').DataTable({
      order: [ 0, "desc" ],
      processing: true,
      serverSide: true,
      ajax: '/admin/getpost',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'title', name: 'title' },
      { data: 'user_id', name: 'user_id' },
      { data: 'category_id', name: 'category_id' },
      { data: 'view_count', name: 'view_count' },
      { data: 'created_at', name: 'created_at' },
      { data: 'updated_at', name: 'updated_at' },
      { data: 'action', name: 'action' }
      ]
    });
  });
  
</script> 

<script type="text/javascript" src="/js/manager/post.js"></script>

@endsection
