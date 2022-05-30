<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet" />

	<title><?php echo strftime(' %A, %d de %B de %Y a las %H:%M ');?></title>
</head>
<body>
	


<a  href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/expense_add/');" 
class="btn btn-primary pull-right">
<i class="entypo-plus-circled"></i>
<?php echo ('Agregar nueva salida');?>
</a> 
<br><br>

<div class="printarea">
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo ('Título');?></div></th>
            <th><div><?php echo ('Categoría');?></div></th>
            <th><div><?php echo ('Método');?></div></th>
            <th><div><?php echo ('Monto');?></div></th>
            <th><div><?php echo ('Fecha');?></div></th>
			<th><div><?php echo ('Corte');?></div></th>
            <th><div><?php echo ('Opciones');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        	$count = 1;
        	$this->db->where('payment_type' , 'Salida');
        	$this->db->order_by('timestamp' , 'desc');
        	$expenses = $this->db->get('payment')->result_array();
        	foreach ($expenses as $row):
        ?>
        <tr>
            <td><?php echo $count++;?></td>
            <td><?php echo $row['title'];?></td>
            <td>
                <?php 
                    if ($row['expense_category_id'] != 0 || $row['expense_category_id'] != '')
                        echo $this->db->get_where('expense_category' , array('expense_category_id' => $row['expense_category_id']))->row()->name;
                ?>
            </td>
            <td>
            	<?php 
            		if ($row['method'] == 1)
            			echo ('Efectivo');
            		if ($row['method'] == 2)
            			echo ('Transferencia bancaria');            	
            	?>
            </td>
            <td><?php echo $row['amount'];?></td>
            <td><?php echo date('d M,Y, H:i', $row['timestamp']);?></td>
			<td><?php echo $row['corte'];?></td>
            <td>
                
                <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                        Acción <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                        
                        <!-- teacher EDITING LINK -->
                        <li>
                        	<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/expense_edit/<?php echo $row['payment_id'];?>');">
                            	<i class="entypo-pencil"></i>
									<?php echo ('Editar');?>
                               	</a>
                        				</li>
                        <li class="divider"></li>
                        
                        <!-- teacher DELETION LINK -->
                        <li>
                        	<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/expense/delete/<?php echo $row['payment_id'];?>');">
                            	<i class="entypo-trash"></i>
									<?php echo ('Eliminar');?>
                               	</a>
                        				</li>
                    </ul>
                </div>
                
            </td>
			
        </tr>
	
        <?php endforeach;?>
    </tbody>
	
	</table>
<!-- esto e spara mostrar el total de la sumatoria de la tabla de gastos -->
<div class="tile-stats tile-red">
<h3><?php echo ('Salidas');?></h3>
                    
						
            <h2 style="color:white; font-weight:bold"> Total salidas: C$ <?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment WHERE payment_type = "Salida" ')->row(); echo round(floatval($query->total),2);?></h2>                   			                                       
                </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

$('#table_export').DataTable({
  dom: 'Bfrtip',
  buttons: [{
    extend: 'copy',
    text: 'Copiar al portapapeles',
    filename: ' Talk | Salidas '
  }, 

  
  {
    extend: 'excel',
    text: 'Excel',
    filename: ' Talk | Salidas ',
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
    text: 'PDF',
    filename: ' Talk | Salidas '
  }, {
    extend: 'print',
    text: 'Imprimir',
    filename: ' Talk | Salidas '
  }, ]
});
	
</script>


</body>
</html>