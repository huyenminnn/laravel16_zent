<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Todo</title>
    <!-- Latest compiled and minified CSS & JS -->
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
        <a href="#" class="btn btn-success btn-add">Add</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Todo</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- biến $todos được controller trả cho view
                        chứa dữ liệu tất cả các bản ghi trong bảng todos. Dùng foreach để hiển
                        thị từng bản ghi ra table này. --}}

                        @foreach ($todos as $todo)
                        <tr>
                            <td>{{$todo->id}}</td>
                            <td>{{$todo->todo}}</td>
                            <td>{{$todo->created_at}}</td>
                            <td>{{$todo->updated_at}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-show" data-id="{{$todo->id}}">Details</button>
                                <button type="button" class="btn btn-warning btn-edit">Edit</button>
                                <button type="button" class="btn btn-danger btn-delete">Delete</button>
                                {{-- <a style="display: inline-block; width: 67px;" href="{{ route('todos.edit',$todo->id) }}" class="btn btn-warning">Edit</a>
                                <form style="display: inline-block;" action="{{ route('todos.destroy',$todo->id) }}" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal show chi tiết todo --}}
        <div class="modal fade" id="modal-show">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Show todo</h4>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <h2>Todo:</h2>
                        <h3 id="todo-show"></h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal thêm mới todo --}}
        <div class="modal fade" id="modal-add">
            <div class="modal-dialog">
                <div class="modal-content"> 
                    <form action="" data-url="{{ route('todos-ajax.store') }}" id="form-add" method="POST" role="form">
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add todo</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="">Todo</label>
                                <input type="text" class="form-control" id="todo-add" placeholder="Todo" name="todo">
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

        <script src="//code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
        <script type="text/javascript" src="/js/main.js" charset="utf-8">       
        </script>
    </body>
    
    </html>