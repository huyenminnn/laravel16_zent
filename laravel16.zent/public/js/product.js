$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function () {
	$('.btn-show').click(function(){
		$('#modal-show').modal('show')

		var id = $(this).data('id')
		// console.log(id)
		
		$.ajax({
			type: 'get',
			url: '/products/' + id,     //link chuyen den show, ham show tren controler tra ve ban ghi duoc chon
			// data:
			success: function (response){
				$('#id-product').html(response.id)   //response.sth: sth la cot muon chon
				$('#code-product').html(response.code)
				$('#name-product').html(response.name)
				$('#price-product').html(response.price)
				$('#quantity-product').html(response.quantity)
			}
		})
	})

	$('.btn-add').click(function(){
		$('#modal-add').modal('show')
	})

	$('#form-add').submit(function(e){

		e.preventDefault()
		$.ajax({
			type: 'post',
			url: '/products',  //link chuyen den store, ham show tren controler tra ve ban ghi duoc chon
			data: {
				code: $('#code').val(),
				name: $('#name').val(),
				price: $('#price').val(),
				quantity: $('#quantity').val(),
			},
			success: function (response){
				toastr.success('Add new product success!')
				$('#modal-add').modal('hide')
				setTimeout(function () {
					// window.location.reload();
					$('tbody').append(`<tr>
                            <td>`+response.id+`</td>
                            <td>`+response.code+`</td>
                            <td>`+response.name+`</td>
                            <td>`+response.price+`</td>
                            <td>`+response.quantity+`</td>
                            <td>
                                <button type="button" class="btn btn-info btn-show" data-id="`+response.id+`">Details</button>
                                <button type="button" class="btn btn-warning btn-edit" data-id="`+response.id+`">Edit</button>
                                <button type="button" class="btn btn-danger btn-delete" data-id="`+response.id+`"​>Delete</button>
                                
                            </td>
                        </tr>`)
				},800);
				
			}
		})
	})


	$('.btn-edit').click(function(){
		$('#modal-edit').modal('show')
		var id = $(this).data('id')
		
		$.ajax({
			type: 'get',
			url: '/products/' + id,     //link chuyen den show, ham show tren controler tra ve ban ghi duoc chon
			
			success: function (response){
				$('#id-edit').val(response.id)   //response.sth: sth la cot muon chon
				$('#code-edit').val(response.code)
				$('#name-edit').val(response.name)
				$('#price-edit').val(response.price)
				$('#quantity-edit').val(response.quantity)
			}
		})
	})
	$('#form-edit').submit(function(e){

		e.preventDefault()
		var id = $('#id-edit').val()
		$.ajax({
			type: 'put',
			url: '/products/' + id,
			data: {
				id: id,
				code: $('#code-edit').val(),
				name: $('#name-edit').val(),
				price: $('#price-edit').val(),
				quantity: $('#quantity-edit').val(),
			},
			success: function (response){
				toastr.warning('Update product success!')
				setTimeout(function () {
					window.location.reload();
				},800);
			}
		})
	})
	

	$('.btn-delete').click(function(e){
		e.preventDefault()
		var id = $(this).data('id')
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this imaginary file!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    $.ajax({
				//phương thức delete
				type: 'delete',
				url: '/products/' + id,
				success: function (response) {
					// thông báo xoá thành công bằng toastr
					toastr.error('Delete product success!')
					setTimeout(function () {
						window.location.reload();
					},800);
				},
				error: function (error) {
				}
			})
		  } else {
		    swal("Your imaginary file is safe!");
		  }
		});
	})
})


