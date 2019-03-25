<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>List blogs</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style type="text/css" media="screen">
    body{
        margin-top: 30px;
    }
</style>
</head>
<body>
    <div class="container">
        <button type="button" class="btn btn-success btn-add">Add</button> 
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Content</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>

          
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{$blog->id}}</td>
                            <td>{{$blog->content}}</td>
                            <td>{{$blog->images}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-show" data-id="{{$blog->id}}"><i class="fas fa-info-circle"></i></button>
                                <button type="button" class="btn btn-warning btn-edit" data-id="{{$blog->id}}"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-delete" data-id="{{$blog->id}}"​><i class="fas fa-trash-alt"></i></button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{-- {!! $blogs->links() !!} --}}

            </div>
        </div>

        {{-- Modal show blog --}}
        <div class="modal fade" id="modal-show">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Blog</h4>
                    </div>
                    <div class="modal-body">
	
                        <table class="table table-hover">
                        	<tbody>
                        		<tr>
                        			<td style="width: 20%; font-weight: bold;">ID</td>
                        			<td id="id"></td>
                        		</tr>
                        		<tr>
                        			<td style="width: 20%; font-weight: bold;">Created at</td>
                        			<td id="created_at"></td>
                        		</tr>
                        		<tr>
                        			<td style="width: 20%; font-weight: bold;">Update at </td>
                        			<td id="update_at"></td>
                        		</tr>
                        		<tr>
                        			<td style="width: 20%; font-weight: bold;">Content </td>
                        			<td id="content"></td>
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

        {{-- Modal thêm mới blog --}}
        <div class="modal fade" id="modal-add">
            <div class="modal-dialog">
                <div class="modal-content"> 
                    <form action="" id="form-add" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add new blog</h4>
                        </div>
                        <div class="modal-body">
							<div class="form-group">
                                <label for="">Content</label>
                                <input type="text" class="form-control" id="content1" name="content">
                                <label for="">Image</label>
                                <input type="file" class="form-control" id="images" name="images">
                                
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

        {{-- Modal sửa blog --}}
		<div class="modal fade" id="modal-edit">
			<div class="modal-dialog">
				<div class="modal-content">

					<form action="" id="form-edit" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Edit blog</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
                                <input type="hidden" class="form-control" id="id-edit" name="id">

                                <div class="form-group">
                                <label for="">Content</label>
                                <input type="text" class="form-control" id="content-edit" name="content">
                                {{-- <label for="">Image</label>
                                <input type="file" class="form-control" id="images-edit" name="images"> --}}
                                
                            </div> 
                            </div> 
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="edit">Edit</button>
							
						</div>
					</form>
				</div>
			</div>
		</div>


        <script src="//code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>

        <script type="text/javascript" src="/js/blog.js" charset="utf-8">       
        </script>
    </body>
    
    </html>