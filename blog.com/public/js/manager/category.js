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
			url: '/admin/category/' + id,     //link chuyen den show, ham show tren controler tra ve ban ghi duoc chon
			// data:
			success: function (response){
				console.log(response)
				$('#id').html(response.id)   //response.sth: sth la cot muon chon
				$('#name').html(response.name)
				$('#parent-id').html(response.parent)
				$('#slug').html(response.slug)
				$('#description').html(response.description)
				$('#thumbnail-show').attr('src','/storage/'+response.thumbnail)
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

		var data = new FormData();
		if ($('#thumbnail-add')[0].files[0]) {
			data.append('thumbnail',$('#thumbnail-add')[0].files[0])
		} else data.append('thumbnail','')
		data.append('name',$('#name-add').val())
		data.append('parent_id',$('#parent_id').val())
		data.append('slug',$('#slug-add').val())
		data.append('description',tinymce.get('description-add').getContent())

		$.ajax({
			type: "post",
			url: '/admin/category',
			data: data,
			processData: false,
			contentType: false,
	        // dataType: "json",
	        success: function(data, textStatus, jqXHR) {
	        	$('#modal-add').modal('hide')
	        	toastr.success('Add post success!')
	        	$('#category').DataTable().ajax.reload();
	           // window.location.reload()
	       },
	       error: function(data, textStatus, jqXHR) {
	       	console.log(data.responseJSON.errors)
	       	if (data.responseJSON.errors.name) {
	       		$( '<p class="error-noti">'+data.responseJSON.errors.name[0]+"</p>" ).insertAfter( "#name-add" );
	       	}
	       	if (data.responseJSON.errors.description) {
	       		$( '<p class="error-noti er">'+data.responseJSON.errors.description[0]+"</p>" ).insertAfter( "#description-add" );
	       	}
	       	if (data.responseJSON.errors.slug) {
	       		$( '<p class="error-noti">'+data.responseJSON.errors.slug[0]+"</p>" ).insertAfter( "#slug-add" );
	       	}
	           	// if (data.responseJSON.errors.parent_id) {
	           	// 	$( '<p class="error-noti">'+data.responseJSON.errors.parent_id[0]+"</p>" ).insertAfter( "#parent_id-add" );
	           	// }
	           	if (data.responseJSON.errors.thumbnail) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.thumbnail[0]+"</p>" ).insertAfter( "#thumbnail-add" );
	           	}
	           },
	       });
	})


	$('body').on('click','.btn-edit', function(){

		$('#modal-edit').modal('show')
		
		$("input").focus(function(){
			if ($(this).next().attr('class') == 'error-noti') {
				$(this).next().remove();
			}
		});

		var id = $(this).data('id')

		$.ajax({
			type: 'get',
			url: '/admin/category/' + id,     
			
			success: function (response){
				$('#id-edit').val(response.id) 
				$('#name-edit').val(response.name) 
				$('#parent-edit').val(response.parent)
				$('#slug-edit').val(response.slug)
				tinymce.get('desc-edit').setContent(response.description)
				$('.thumb').attr('src','/storage/'+response.thumbnail)
				
			}
		})
	})
	$('#form-edit').submit(function(e){
		e.preventDefault()
		$('.error-noti').remove()

		var id = $('#id-edit').val()
		
		var data = new FormData();
		data.append('id',id)
		if ($('#thumb-edit')[0].files[0]) {
			data.append('thumbnail',$('#thumb-edit')[0].files[0])
		} else data.append('thumbnail','none')
		data.append('name',$('#name-edit').val())
		data.append('parent_id',$('#parent-edit').val())
		data.append('slug',$('#slug-edit').val())
		data.append('description',tinymce.get('desc-edit').getContent())
		
		$.ajax({
			type: 'post',
			url: '/admin/category_edit/' + id,
			data: data,
			processData: false,
			contentType: false,
			success: function (response){
				toastr.success('Update category success!')
				setTimeout(function () {
					$('#modal-edit').modal('hide')

					$('#category').DataTable().ajax.reload();
				},800);
			},
			error: function(data, textStatus, jqXHR) {
				console.log(data.responseJSON.errors)
				if (data.responseJSON.errors.name) {
					$( '<p class="error-noti">'+data.responseJSON.errors.name[0]+"</p>" ).insertAfter( "#name-edit" );
				}
				if (data.responseJSON.errors.description) {
					$( '<p class="error-noti er">'+data.responseJSON.errors.description[0]+"</p>" ).insertAfter( "#desc-edit" );
				}
				if (data.responseJSON.errors.slug) {
					$( '<p class="error-noti">'+data.responseJSON.errors.slug[0]+"</p>" ).insertAfter( "#slug-edit" );
				}
	           	// if (data.responseJSON.errors.parent_id) {
	           	// 	$( '<p class="error-noti">'+data.responseJSON.errors.parent_id[0]+"</p>" ).insertAfter( "#parent_id-edit" );
	           	// }
	           	if (data.responseJSON.errors.thumbnail) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.thumbnail[0]+"</p>" ).insertAfter( "#thumbnail-edit" );
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
				url: '/admin/category/' + id,
				success: function (response) {
					// thông báo xoá thành công bằng toastr
					toastr.success('Delete blog success!')
					setTimeout(function () {

						$('#category').DataTable().ajax.reload();
					},800);
				},
				error: function (error) {
				}
			})
			}
		});
	})
})


