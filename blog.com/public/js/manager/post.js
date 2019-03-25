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
			url: '/admin/post/' + id,     //link chuyen den show, ham show tren controler tra ve ban ghi duoc chon
			// data:
			success: function (response){
				$('#id').html(response.id)   //response.sth: sth la cot muon chon
				$('#title').html(response.title)
				$('#content').html(response.content)
				$('#slug').html(response.slug)
				$('#description').html(response.description)
				$('#view_count').html(response.view_count)
				$('#category_id').html(response.category_id)
				$('#user_id').html(response.user_id)
				$('#created_at').html(response.created_at)
				$('#updated_at').html(response.updated_at)
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
		
		
		data.append('title',$('#title-add').val())
		data.append('slug',$('#slug-add').val())
		data.append('description',tinymce.get('description-add').getContent())
		data.append('content',tinymce.get('content-add').getContent())
		data.append('user_id',$('#user-add').val())
		data.append('category_id',$('#category-add').val())
		data.append('view_count',0)
		$.ajax({
			type: "post",
			url: '/admin/post',
			data: data,
			processData: false,
			contentType: false,
	        // dataType: "json",
	        success: function(data, textStatus, jqXHR) {
	        	$('#modal-add').modal('hide')
	        	toastr.success('Add post success!')

	        	$('#post').DataTable().ajax.reload();
	           // window.location.reload()
	       },
	       error: function(data, textStatus, jqXHR) {
	           //process error msg
	           	// console.log(data.responseJSON.errors)
	           	if (data.responseJSON.errors.title) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.title[0]+"</p>" ).insertAfter( "#title-add" );
	           	}
	           	if (data.responseJSON.errors.description) {
	           		$( '<p class="error-noti er">'+data.responseJSON.errors.description[0]+"</p>" ).insertAfter( "#description-add" );
	           	}
	           	if (data.responseJSON.errors.slug) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.slug[0]+"</p>" ).insertAfter( "#slug-add" );
	           	}
	           	if (data.responseJSON.errors.category) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.category[0]+"</p>" ).insertAfter( "#category-add" );
	           	}
	           	if (data.responseJSON.errors.thumbnail) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.thumbnail[0]+"</p>" ).insertAfter( "#thumbnail-add" );
	           	}
	           	if (data.responseJSON.errors.content) {
	           		$( '<p class="error-noti er">'+data.responseJSON.errors.content[0]+"</p>" ).insertAfter( "#content-add" );
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
			url: '/admin/post_showedit/' + id,     
			
			success: function (response){
				$('#id-edit').val(response.id) 
				$('#title-edit').val(response.title)				 
				tinymce.get('description-edit').setContent(response.description)
				$('#slug-edit').val(response.slug)
				tinymce.get('content-edit').setContent(response.content)
				$('#user-edit').val(response.user_id)
				// $('#category-edit').val(response.category_id)
				// $('#thumbnail-edit').val(response.thumbnail)
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
		if ($('#thumbnail-edit')[0].files[0]) {
			data.append('thumbnail',$('#thumbnail-edit')[0].files[0])
		} else data.append('thumbnail','none')

		data.append('title',$('#title-edit').val())
		data.append('slug',$('#slug-edit').val())
		data.append('description',tinymce.get('description-edit').getContent())
		data.append('content',tinymce.get('content-edit').getContent())
		data.append('user_id',$('#user-edit').val())
		data.append('category_id',$('#category-edit').val())
		$.ajax({
			type: 'post',
			url: '/admin/post_edit/' + id,
			data: data,
			processData: false,
			contentType: false,
			success: function (response){
				toastr.success('Update post success!')
				setTimeout(function () {
					$('#modal-edit').modal('hide')
					$('#post').DataTable().ajax.reload();
				},800);
			},
			error: function(data, textStatus, jqXHR) {
	           	if (data.responseJSON.errors.title) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.title[0]+"</p>" ).insertAfter( "#title-edit" );
	           	}
	           	if (data.responseJSON.errors.description) {
	           		$( '<p class="error-noti er">'+data.responseJSON.errors.description[0]+"</p>" ).insertAfter( "#description-edit" );
	           	}
	           	if (data.responseJSON.errors.slug) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.slug[0]+"</p>" ).insertAfter( "#slug-edit" );
	           	}
	           	if (data.responseJSON.errors.category) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.category[0]+"</p>" ).insertAfter( "#category-edit" );
	           	}
	           	if (data.responseJSON.errors.thumbnail) {
	           		$( '<p class="error-noti">'+data.responseJSON.errors.thumbnail[0]+"</p>" ).insertAfter( "#thumbnail-edit" );
	           	}
	           	if (data.responseJSON.errors.content) {
	           		$( '<p class="error-noti er">'+data.responseJSON.errors.content[0]+"</p>" ).insertAfter( "#content-edit" );
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
				url: '/admin/post/' + id,
				success: function (response) {
					// thông báo xoá thành công bằng toastr
					toastr.success('Delete post success!')
					setTimeout(function () {

						$('#post').DataTable().ajax.reload();
					},800);
				},
				error: function (error) {
				}
			})
			}
		});
	})
})


