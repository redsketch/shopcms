$(function() {
	
    var table = $('#products-table').dataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: 'api/products/',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'code', name: 'code' },
            { data: 'price', name: 'price' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { 
				orderable: false,
				defaultContent: 
				'<a data-toggle="modal" data-target="#product-dialog" data-action="edit" class="edit-product">Edit</a> ' +
				'<a data-action="delete" class="delete-product">Delete</a>'
			}
        ],
    });
    
    // When add button clicked
    $('#add-product').on('click', function() {
		$('.modal-body input[name="id"]').val('');
		$('.modal-body input[name="name"]').val('');
		$('.modal-body input[name="code"]').val('');
		$('.modal-body input[name="price"]').val('');
	});
    
    // When add button clicked
    $('#product-dialog').on('show.bs.modal', function(event) {
	    var action = $(event.relatedTarget).data('action');
	    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	    var modal = $(this);
	    modal.find('.modal-title').text('Add new product');
	    $('#submit').data('action', action);
	});
    
    // When edit element clicked
    $('#products-table').on('click', '.edit-product', function() {
		var data = table.api().row($(this).parents('tr')).data();
		
		$('.modal-body input[name="id"]').val(data.id);
		$('.modal-body input[name="name"]').val(data.name);
		$('.modal-body input[name="code"]').val(data.code);
		$('.modal-body input[name="price"]').val(data.price);
	});
    
    // When delete element clicked
    $('#products-table').on('click', '.delete-product', function() {
		var data = table.api().row($(this).parents('tr')).data();
		var delConfirm = window.confirm("Are you sure want to delete product " + data.name +"?");
		if (delConfirm) {
			$.ajax({
				headers: {
					'X-CSRF-Token': $('.modal-body input[name="_token"]').val(),
				},
				type: 'DELETE',
				url: 'api/products/' + data.id + '/destroy',
			})
			$('#products-table').dataTable().api().ajax.reload();
			$('#products-table').dataTable().fnClearTable();
			$('#products-table').dataTable().fnDraw();
		}
	});
	
	var submit = $('form').submit(function(event) {
		// Form Data
		var formData = {
			_token: $('.modal-body input[name="_token"]').val(),
			id: $('.modal-body input[name="id"]').val(),
			name: $('.modal-body input[name="name"]').val(),
			code: $('.modal-body input[name="code"]').val(),
			price: $('.modal-body input[name="price"]').val()
		};
		
		if ('new' == $('#submit').data('action')) {
			var action = 'create';
		} else if ('edit' == $('#submit').data('action')) {
			var action = '/update';
		} else {
			return false;
		}
		
		$.ajax({
			headers: {
				'X-CSRF-Token': formData._token
			},
			type: 'POST',
			url: 'api/products/' + formData.id + action,
			data: JSON.stringify(formData),
			dataType: 'json',
			encode: true
		}).done(function(data){
			// Soon...
		});
		
		$('#products-table').dataTable().api().ajax.reload();
		$('#products-table').dataTable().fnClearTable();
		$('#products-table').dataTable().fnDraw();
		
		event.preventDefault();
		return false;
	});
		
});
