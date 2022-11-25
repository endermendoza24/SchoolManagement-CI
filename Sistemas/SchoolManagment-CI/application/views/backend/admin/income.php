

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet" />

    	<style>
	    .negrita > th > div{
	        color:#000;
	        font-weight:bold;
	        font-size:13px;
	    }
	</style>
	<?php $diactual = date("d/m/Y", time())?>
	<title><?php  echo '- Reporte generado por: '; echo $this->session->userdata('name'); echo ' - Fecha de reporte: ' . $diactual?> </title>
</head>
<body>

<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr class="negrita">
            <th><div>N°</div></th>
            
            <th><div><?php echo ('Estudiante');?></div></th>
            <th><div><?php echo ('Título');?></div></th>
            <th><div><?php echo ('Descripción');?></div></th>
			<th><div><?php echo ('Observaciones');?></div></th>
            <th><div><?php echo ('Método');?></div></th>
			<th><div><?php echo ('Corte');?></div></th>
            <th><div><?php echo ('Monto');?></div></th>
            <th><div><?php echo ('Fecha');?></div></th>
            <th><div><?php echo ('Opciones');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        	$count = 1;
        	$this->db->where('payment_type' , 'Entrada');
        	$this->db->order_by('timestamp' , 'desc');
        	$expenses = $this->db->get('payment')->result_array();
        	foreach ($expenses as $row):
        ?>
        <tr>
            <!-- <td><?php echo $count++;?></td> -->
            <td><?php echo $row['invoice_id']?></td>
            <td style="text-transform:uppercase;"><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']) .' ' . $this->crud_model->get_type_lastname_by_id('student',$row['student_id']);?></td>                            
            <td style="text-transform:uppercase;"><?php echo $row['title'];?></td>
            <td style="text-transform:uppercase;"><?php echo $row['description'];?></td>
			<td style="text-transform:uppercase;"><?php echo $row['detallepagos'];?></td>
			
            <td style="text-transform:uppercase;">
            	<?php 
            		if ($row['method'] == 1)
            			echo ('Efectivo');
            		if ($row['method'] == 2)
            			echo ('Transferencia');   
            		if ($row['method'] == 3)
            			echo ('Pago pendiente');  
            	?>
            </td>
			<td style="text-transform:uppercase;"><?php echo $row['corte'];?></td>
            <td><?php echo $row['amount'];?></td>
            <!-- <td><?php echo date('d M,Y', $row['timestamp']);?></td> -->
            <td style="text-transform:uppercase;"><?php echo strftime('%A, %d de %B de %Y a las %H:%M', $row['timestamp']);?></td>
            <td> <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                        Eliminar <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">                                                                      
                        <!-- teacher DELETION LINK -->
                        <li>
                        	<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/income/delete/<?php echo $row['payment_id'];?>');">
                            	<i class="entypo-trash"></i>
									<?php echo ('Eliminar');?>
                               	</a>
                        				</li>
                    </ul>
                </div></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>




<div class="tile-stats tile-green">
<h3><?php echo ('Ganancias');?></h3>
                    <?php 
							$dia = date('d'); 
							$check	=	array(	'timestamp' => time() , 'payment_type' => 'Entrada' );
							$query = $this->db->get_where('payment' , $check);
							$present_today = $query = $this->db->query('SELECT SUM(amount) as total FROM payment WHERE timestamp = "2022-05-18T13:45"')->row();
							// $present_today	=	$row['amount'];
						?>
						<h2 style="color:white; font-weight:bold"> Total matutino: C$ <?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment WHERE corte = "matutino"')->row(); echo round(floatval($query->total),2);?>
						<h2 style="color:white; font-weight:bold"> Total vespertino: C$ <?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment WHERE corte = "vespertino"')->row(); echo round(floatval($query->total),2);?></h2>
						<h2 style="color:white; font-weight:bold"> Total ambos cortes: C$ <?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment WHERE payment_type = "Entrada"')->row(); echo round(floatval($query->total),2);?></h2>

  
                   
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
    text: 'Copiar',
    filename: '  Talk | Entradas '
  }, 

  
  {
    extend: 'excel',
    text: 'Excel',
    filename: 'Talk | Entradas ',
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
    filename: 'Talk | Entradas '
  }, {
    extend: 'print',
    text: 'Imprimir',
    filename: 'Talk | Entradas '
  }, ]
});
	
</script>


</body>
</html>

