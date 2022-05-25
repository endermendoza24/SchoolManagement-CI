


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
            			echo ('Cash');
            		if ($row['method'] == 2)
            			echo ('Bank transfer');
            		if ($row['method'] == 3)
            			echo ('Card');
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
<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->            

<!-- Nueva datatable -->


<!-- excel', 'pdf', 'print', -->




<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [1,2,3,4,5]
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
							datatable.fnSetColumnVis(6, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(6, true);
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
		
</script>

