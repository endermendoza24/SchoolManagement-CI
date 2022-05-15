
<hr />
<table class="table table-bordered table-hover table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo ('Title');?></div></th>
            <th><div><?php echo ('Description');?></div></th>
            <th><div><?php echo ('Method');?></div></th>
			<th><div><?php echo ('Corte');?></div></th>
            <th><div><?php echo ('Amount');?></div></th>
            <th><div><?php echo ('Date');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        	$count = 1;
        	$this->db->where('payment_type' , 'income');
        	$this->db->order_by('timestamp' , 'desc');
        	$expenses = $this->db->get('payment')->result_array();
        	foreach ($expenses as $row):
        ?>
        <tr>
            <td><?php echo $count++;?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['description'];?></td>
			
            <td>
            	<?php 
            		if ($row['method'] == 1)
            			echo ('Cash');
            		if ($row['method'] == 2)
            			echo ('Cheque');
            		if ($row['method'] == 3)
            			echo ('Card');
                    if ($row['method'] == 'paypal')
                    	echo 'Paypal';
            	?>
            </td>
			<td><?php echo $row['corte'];?></td>
            <td><?php echo $row['amount'];?></td>
            <td><?php echo date('d M,Y', $row['timestamp']);?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>




<div class="tile-stats tile-green">
<h3><?php echo ('Ganancias de hoy');?></h3>
                    <?php 
							$dia = '2022-05-15'; 
							$check	=	array(	'timestamp' => time() , 'payment_type' => 'income' );
							$query = $this->db->get_where('payment' , $check);
							// $present_today = $query = $this->db->query('SELECT SUM(amount) as total FROM payment WHERE timestamp = '.$diahoy)->row();
							$present_today	=	$row['amount'];
						?>
						<h2 style="color:white; font-weight:bold"> Total matutino: $<?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment WHERE corte = "matutino"')->row(); echo round(floatval($query->total),2);?>
<h2 style="color:white; font-weight:bold"> Total vespertino: $<?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment WHERE corte = "vespertino"')->row(); echo round(floatval($query->total),2);?></h2>
<h2 style="color:white; font-weight:bold"> Total: $<?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment WHERE payment_type = "income"')->row(); echo round(floatval($query->total),2);?></h2>

                    <div class="num" data-start="0" data-end="<?php echo $present_today;?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    
                   
                </div>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
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
		
</script>

