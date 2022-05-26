<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
	.table th{
		background-color: #6f42c1 !important;
		color: #fff !important;
	}

	table>tbody>tr>td{
		vertical-align: absolute !important;
	}

	.btn{
		font-size: 20px !important;
		color: #000 !important;
		padding:5px 5px !important;
	}
</style>
<hr />
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo ('Título');?></div></th>
            <th><div><?php echo ('Concepto');?></div></th>
            <th><div><?php echo ('Tipo');?></div></th>
			<th><div><?php echo ('Corte');?></div></th>
            <th><div><?php echo ('Monto');?></div></th>
            <th><div><?php echo ('Fecha');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        	$count = 1;
        	// $this->db->where('payment_type' , 'income'); // aqui filtra que sean solo entradas las que se muestren
            // comentando esta linea se logra que se muestren entradas y salidas
            
        	$this->db->order_by('timestamp' , 'asc');
        	$expenses = $this->db->get('payment')->result_array();
        	foreach ($expenses as $row):
        ?>
        <tr>
            <td><?php echo $count++;?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['description'];?></td>
			
            <td>
            <?php echo $row['payment_type'];?>
            </td>
			<?php setlocale(LC_TIME, 'es_NI.UTF-8');
			date_default_timezone_set ("America/Managua");?>
			<td><?php echo $row['corte'];?></td>
            <td><?php echo $row['amount'];?></td>
            <td><?php echo strftime('%A, %d de %B de %Y', $row['timestamp']);?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>




<div class="tile-stats tile-primary">
<h3><?php echo ('Total');?></h3>
                    
						
            <h2 style="color:white; font-weight:bold"> Total: C$ <?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment ')->row(); echo round(floatval($query->total),2);?></h2>

                    <!-- <div class="num" data-start="0" data-end="<?php echo $present_today;?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>

							<h1><?php echo $dia ?></h1>
                     -->
                    
                   
                </div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<!-- excel', 'pdf', 'print', -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    $('#table_export').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        {
            text:'<i class="btn btn-success fas fa-file-excel"></i>',
				titleAttr:'Exportar a excel',
				className:'btn btn-success',
            extend: "excel",                    // Extend the excel button
            excelStyles: [                      // Add an excelStyles definition
                {                 
                    template: "green_medium",   // Apply the "green_medium" template
                },
                {
                    cells: "sh",                // Use Smart References (s) to target the header row (h)
                    style: {                    // The style definition
                        font: {                 // Style the font
                            size: 14,           // Size 14
                            b: false,           // Turn off the default bolding of the header row
                        },
                        fill: {                 // Style the cell fill
                            pattern: {          // Add a pattern (default is solid)
                                color: "1C3144" // Define the fill color
                            }
                        }
                    }
                }
            ],
                      
        },
        {
				extend: 'pdf',
				text:'<i class="fas fa-file-pdf"></i>',
				titleAttr:'Exportar a pdf',
				className:'btn btn-danger'
			},
			{
				extend: 'print',
				text:'<i class="fa-solid fa-print"></i>',
				titleAttr:'Imprimir',
				className:'btn btn-warning'
			}
    ]
    
    } );
} );
</script>




<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<!-- <script type="text/javascript">







	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [1,2,3,4,5,6,7]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,2,3,4,5]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
								  }
							});
						},
						
					},
				]
			},
			
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script> -->

