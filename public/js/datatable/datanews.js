// JavaScript Document
$(document).ready(function(e) {
    var table = $('#tbnews').DataTable( {
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"pagingType": "simple_numbers",
		"lengthMenu": [[5,10,20,-1 ], [5,10,20,"Todos" ]],
		"language": {
		"lengthMenu": "Ver _MENU_ registros",
		"zeroRecords": "No se encontraron datos",
		"info": "Resultado _START_ - _END_ de _TOTAL_ registros",
		"infoEmpty": "No se encontraron datos",
		"infoFiltered": ""
		},
		"processing": true,
        "serverSide": true,
        "ajax": {
                    "url": "public/dist/json/jsonnews.php",
                    "data": {idc: ''}
				},
		"columns": [
			{ "data": "0",
			  "render": function ( data, type, full, meta )
			  			{ 
				  			return '<div onclick=CRUDUSUARIOS("EDITAR",'+data+') class="fa fa-edit" style="cursor:pointer" data-toggle="modal" data-target="#miVentana"></div>';
			  			}
			},
			{ "data": "0",
			  "render": function ( data, type, full, meta )
			  			{ 
				  			return '<div onclick=CRUDUSUARIOS("ELIMINAR",'+data+') class="fa fa-trash-o" style="cursor:pointer"></div>';
			  			}
			},
			{ "data": "1" },
			{ "data": "2" },
			{ "data": "3" },
			{ "data": "4" }
		],
		"order": [[2, 'asc']]
    } );
     
	  $('#tbnews tfoot th').each( function () {
        var title = $('#tbnews tfoot th').eq( $(this).index() ).text();
		if(title==""){$(this).html('');}else{
        $(this).html( '<div class="input-group"><input type="text" style="width:150px" class="form-control" placeholder="'+title+'" /></div>' );}
    } );
 
    // DataTable
    var table = $('#tbnews').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
});