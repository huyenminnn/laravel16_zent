<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Products</title>
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
        <button type="button" class="btn btn-success btn-add">Add</button> 
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

          
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-show" data-id="{{$product->id}}">Details</button>
                                <button type="button" class="btn btn-warning btn-edit" data-id="{{$product->id}}">Edit</button>
                                <button type="button" class="btn btn-danger btn-delete" data-id="{{$product->id}}"​>Delete</button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{-- {!! $products->links() !!} --}}

            </div>
        </div>

        {{-- Modal show chi tiết product --}}
        <div class="modal fade" id="modal-show">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Detail</h4>
                    </div>
                    <div class="modal-body">
                        <h2  style="text-align: center;">Product Infor</h2>
                        {{-- <h3 id="id-product">ID: </h3>
                        <h3 id="code-product">Code: </h3>
                        <h3 id="name-product">Name: </h3>
                        <h3 id="price-product">Price: </h3>
                        <h3 id="quantity-product">Quantity: </h3> --}}
	
                        <table class="table table-hover">
                        	<tbody>
                        		<tr>
                        			<td style="width: 20%; font-weight: bold;">ID</td>
                        			<td id="id-product"></td>
                        		</tr><tr>
                        			<td style="width: 20%; font-weight: bold;">Code </td>
                        			<td id="code-product"></td>
                        		</tr><tr>
                        			<td style="width: 20%; font-weight: bold;">Name </td>
                        			<td id="name-product"></td>
                        		</tr><tr>
                        			<td style="width: 20%; font-weight: bold;">Price </td>
                        			<td id="price-product"></td>
                        		</tr><tr>
                        			<td style="width: 20%; font-weight: bold;">Quantity </td>
                        			<td id="quantity-product"></td>
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

        {{-- Modal thêm mới todo --}}
        <div class="modal fade" id="modal-add">
            <div class="modal-dialog">
                <div class="modal-content"> 
                    <form action="" data-url="{{ route('products.store') }}" id="form-add" method="POST" role="form">
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add new product</h4>
                        </div>
                        <div class="modal-body">
							<div class="form-group">
                                <label for="">Code</label>
                                <input type="text" class="form-control" id="code" name="code">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <label for="">Price</label>
                                <input type="text" class="form-control" id="price" name="price">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity">
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

        {{-- Modal sửa todo --}}
		<div class="modal fade" id="modal-edit">
			<div class="modal-dialog">
				<div class="modal-content">

					<form action="" id="form-edit" method="POST" role="form">
                        @csrf
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Edit product</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
                                <input type="hidden" class="form-control" id="id-edit" name="id">

                                <label for="">Code</label>
                                <input type="text" class="form-control" id="code-edit" name="code">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="name-edit" name="name">
                                <label for="">Price</label>
                                <input type="text" class="form-control" id="price-edit" name="price">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control" id="quantity-edit" name="quantity">
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

        <script type="text/javascript" src="/js/product.js" charset="utf-8">       
        </script>
    </body>
    
    </html>