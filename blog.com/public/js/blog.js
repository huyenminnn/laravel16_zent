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
			url: '/blogs/' + id,     //link chuyen den show, ham show tren controler tra ve ban ghi duoc chon
			// data:
			success: function (response){
				// console.log(response)
				$('#id').html(response.id)
				$('#created_at').html(response.created_at)   //response.sth: sth la cot muon chon
				$('#update_at').html(response.update_at)
				$('#content').html(response.content)
			}
		})
	})

	$('.btn-add').click(function(){
		$('#modal-add').modal('show')
	})

	$('#form-add').submit(function(e){

		e.preventDefault()
		
		var data = new FormData();

		data.append('content',$('#content1').val())
		data.append('images',$('#images')[0].files[0])  //truyen nhieu bien can nhieu dong
		$.ajax({
	        type: "post",
	        url: '/blogs',
	        data: data,
	        processData: false,
	        contentType: false,
	        // dataType: "json",
	        success: function(data, textStatus, jqXHR) {
	           window.location.reload()
	        },
	        error: function(data, textStatus, jqXHR) {
	           //process error msg
	        },
		});
	})


	$('.btn-edit').click(function(){
		$('#modal-edit').modal('show')
		var id = $(this).data('id')
		
		$.ajax({
			type: 'get',
			url: '/blogs/' + id,     //link chuyen den show, ham show tren controler tra ve ban ghi duoc chon
			
			success: function (response){
				$('#id-edit').val(response.id)
				$('#content-edit').val(response.content);   //response.sth: sth la cot muon chon
				// $('#images-edit').val(response.images)
			}
		})
	})
	$('#form-edit').submit(function(e){

		e.preventDefault()
		var id = $('#id-edit').val()
		$.ajax({
			type: 'put',
			url: '/blogs/' + id,
			data: {
				id: id,
				content: $('#content-edit').val(),
				
			},
			success: function (response){
				toastr.warning('Update blog success!')
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
				url: '/blogs/' + id,
				success: function (response) {
					// thông báo xoá thành công bằng toastr
					toastr.error('Delete blog success!')
					setTimeout(function () {
						window.location.reload();
					},800);
				},
				error: function (error) {
				}
			})
		  } else {
		    swal("Your blog is safe!");
		  }
		});
	})
})


