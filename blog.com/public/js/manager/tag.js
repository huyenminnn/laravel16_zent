$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function () {
	$('body').on('click','.btn-show', function(){

		$('#modal-show').modal('show')

		var id = $(this).data('id')
		// console.log(id)
		
		$.ajax({
			type: 'get',
			url: '/admin/tag/' + id,     //link chuyen den show, ham show tren controler tra ve ban ghi duoc chon
			// data:
			success: function (response){
				$('#id').html(response.id)
				$('#name').html(response.name)
				$('#slug').html(response.slug)
				$('#created_at').html(response.created_at)
				$('#updated_at').html(response.updated_at)
			}
		})
	})



	$('.btn-add').click(function(){
		$('#modal-add').modal('show')
		$("input").focus(function(){
			if ($(this).next().attr('class') == 'error-noti') {
				$(this).next().remove();
			}
		});
	})

	$('#form-add').submit(function(e){

		e.preventDefault()
		$('.error-noti').remove()

		$.ajax({
			type: "post",
			url: '/admin/tag',
			data: {
				name: $('#name-add').val(),
				slug: $('#slug-add').val(),
			},
	        // dataType: "json",
	        success: function(data, textStatus, jqXHR) {
	        	$('#modal-add').modal('hide')
	        	toastr.success('Add tag success!')

	        	$('#tag').DataTable().ajax.reload();
	           // window.location.reload()
	       },
	       error: function(data, textStatus, jqXHR) {
	           //process error msg
	            if (data.responseJSON.errors.name) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.name[0]+"</p>" ).insertAfter( "#name-add" );
	           	}
	           	if (data.responseJSON.errors.slug) {
	           		$( '<p class="error-noti er">'+data.responseJSON.errors.slug[0]+"</p>" ).insertAfter( "#slug-add" );
	           	}
	       },
	   });
	})


	$('body').on('click','.btn-edit', function(){

		$('#modal-edit').modal('show')
		var id = $(this).data('id')
		$("input").focus(function(){
			if ($(this).next().attr('class') == 'error-noti') {
				$(this).next().remove();
			}
		});

		$.ajax({
			type: 'get',
			url: '/admin/tag/' + id,     
			
			success: function (response){
				$('#id-edit').val(response.id) 
				$('#name-edit').val(response.name) 
				$('#slug-edit').val(response.slug) 
			}
		})
	})
	$('#form-edit').submit(function(e){
		e.preventDefault()
		$('.error-noti').remove()

		var id = $('#id-edit').val()
		$.ajax({
			type: 'put',
			url: '/admin/tag/' + id,
			data: {
				id: id,
				name: $('#name-edit').val(),
				slug: $('#slug-edit').val(),
				
			},
			success: function (response){
				toastr.success('Update tag success!')
				setTimeout(function () {
					$('#modal-edit').modal('hide')
					$('#tag').DataTable().ajax.reload();
				},800);
			},
			error: function(data, textStatus, jqXHR) {
	           //process error msg
	            if (data.responseJSON.errors.name) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.name[0]+"</p>" ).insertAfter( "#name-edit" );
	           	}
	           	if (data.responseJSON.errors.slug) {
	           		$( '<p class="error-noti er">'+data.responseJSON.errors.slug[0]+"</p>" ).insertAfter( "#slug-edit" );
	           	}
	       },
		})
	})
	

	$('body').on('click','.btn-delete', function(e){
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
				url: '/admin/tag/' + id,
				success: function (response) {
					// thông báo xoá thành công bằng toastr
					toastr.success('Delete tag success!')
					setTimeout(function () {

						$('#tag').DataTable().ajax.reload();
					},800);
				},
				error: function (error) {
				}
			})
			}
		});
	})
})


