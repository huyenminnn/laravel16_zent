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
			url: '/todos-ajax/' + id,     //link chuyen den show, ham show tren controler tra ve ban ghi duoc chon
			// data:
			success: function (response){
				$('#todo-show').html(response.todo)   //response.sth: sth la cot muon chon
			}
		})
	})

	$('.btn-add').click(function(){
		$('#modal-add').modal('show')
	})

	$('#form-add').submit(function(e){
		e.preventDefault()
		// var formData = $('#form-add').serialize();
		// console.log(formData)
		$.ajax({
			type: 'post',
			url: '/todos-ajax',  //link chuyen den store, ham show tren controler tra ve ban ghi duoc chon
			data: {
				todo: $('#todo-add').val()
			},
			success: function (response){
				window.location.reload()
				// $('#modal-add').modal('hide')
			}
		})
	})
})


