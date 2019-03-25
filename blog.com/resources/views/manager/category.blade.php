@extends('layouts.masterAdmin')
@section('content')

<div class="content-header row">
	<div class="content-header-left col-md-6 col-xs-12 mb-1">
		<h2 class="content-header-title">CATEGORY</h2>
	</div>
	{{-- <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
		<div class="breadcrumb-wrapper col-xs-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a>
				</li>
                <li class="breadcrumb-item"><a href="#">Tables</a>
                </li>
                <li class="breadcrumb-item active">Products
                </li>
            </ol>
        </div>
    </div> --}}
</div>
<div class="container-fluid">

	<hr>
	<a href="#" class="btn btn-primary btn-add">Add new category</a>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="category" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Thumbnail</th>
						<th>Created at</th>
						<th>Update at</th>
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
				<h2  style="text-align: center;">Category Info</h2>
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
							<td style="width: 20%; font-weight: bold;">Parent Category</td>
							<td id="parent-id"></td>
						</tr>
						<tr>
							<td style="width: 20%; font-weight: bold;">Slug </td>
							<td id="slug"></td>
						</tr>
						<tr>
							<td style="width: 20%; font-weight: bold;">Description </td>
							<td id="description"></td>
						</tr>
					</tbody>
				</table>
				<img id="thumbnail-show" style="height: 450px;width: 100%;">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

{{-- Add cate --}}
<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content"> 
			<form action="" id="form-add" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add new category</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Name<span class="required"> *</span></label>
						<input type="text" class="form-control" id="name-add" name="name">
						<label for="">Parent<span class="required"> *</span></label>
						{{-- <input type="text" class="form-control" id="parent_id" name="parent_id"> --}}
						<select class="form-control" id="parent_id" name="parent">
							<option value="0">None</option>
							@foreach($category_parent as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
						<label for="">Slug<span class="required"> *</span></label>
						<input type="text" class="form-control" id="slug-add" name="slug">
						<label for="">Description</label>
						<textarea type="text" class="form-control" id="description-add" name="description" rows="3"></textarea>
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

{{-- Edit cate --}}
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" id="form-edit" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit category</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" class="form-control" id="id-edit" name="id">

						<label for="">Name<span class="required"> *</span></label>
						<input type="text" class="form-control" id="name-edit" name="name">

						<label for="">Parent<span class="required"> *</span></label>
						<select class="form-control" id="parent-edit">
							<option value="0">None</option>
							@foreach($category_parent as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
						<label for="">Slug<span class="required"> *</span></label>
						<input type="text" class="form-control" id="slug-edit" name="slug">
						<label for="">Description<span class="required"> *</span></label>
						<textarea type="text" class="form-control" id="desc-edit" name="description" rows="3"></textarea>
						<label for="">Thumbnail<span class="required"> *</span></label>
						<input type="file" class="form-control" id="thumb-edit" name="thumbnail">
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
	$(document).ready( function () {
		$('#category').DataTable({
      		order: [ 0, "desc" ],
			processing: true,
			serverSide: true,
			ajax: '/admin/getdata',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'thumbnail', name: 'thumbnail' },
			{ data: 'created_at', name: 'created_at' },
			{ data: 'updated_at', name: 'updated_at' },
			{ data: 'action', name: 'action' }
			]
		});
	});
</script> 

<script type="text/javascript" src="/js/manager/category.js"></script>

@endsection
