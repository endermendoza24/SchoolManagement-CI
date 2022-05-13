
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo ('Invoice/Payment List');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo ('Facturar / Pagar');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table  class="table table-bordered table-hover table-striped datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div><?php echo ('Student');?></div></th>
                    		<th><div><?php echo ('Title');?></div></th>
                            <th><div><?php echo ('Concepto');?></div></th>
                            <th><div><?php echo ('Total');?></div></th>
                            <th><div><?php echo ('Paid');?></div></th>
                    		<th><div><?php echo ('Status');?></div></th>
                    		<th><div><?php echo ('Date');?></div></th>
                    		<th><div><?php echo ('Options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php foreach($invoices as $row):?>
                        <tr>
							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
							<td><?php echo $row['title'];?></td>
                            <td><?php echo $row['description'];?></td>
							<td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['amount_paid'];?></td>
							<td>
								<span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'danger';?>"><?php echo $row['status'];?></span>
							</td>
							<td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <?php if ($row['due'] != 0):?>

                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_take_payment/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-bookmarks"></i>
                                                <?php echo ('Take Payment');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <?php endif;?>
                                    
                                    <!-- VIEWING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_view_invoice/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-credit-card"></i>
                                                <?php echo ('View Invoice');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_invoice/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo ('Edit');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/invoice/delete/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo ('Delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
            <?php echo form_open(base_url() . 'index.php?admin/invoice/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div style="color:#000; text-transform:bold; font-size:20px" class="panel-title"><?php echo ('Información de factura');?></div>
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Estudiante');?></label>
                                    <div class="col-sm-9">
                                        <select name="student_id" class="form-control" style="" >
                                            <?php 
                                            date_default_timezone_set("America/El_Salvador");
                                            // echo date_default_timezone_get();
                                            $this->db->order_by('class_id','asc');
                                            $students = $this->db->get('student')->result_array();
                                            foreach($students as $row):
                                            ?>
                                                <option value="<?php echo $row['student_id'];?>">
                                                    class <?php echo $this->crud_model->get_class_name($row['class_id']);?> -
                                                     <?php echo $row['wave'];?> -
                                                    <?php echo $row['name'];?>
                                                </option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Tipo');?></label>
                                    <div class="col-sm-9">
                                        <!-- <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" require class="form-control" name="title"/> -->
                                            
                                        <select name="title" id="title" class="form-control">
                                            <option value="Cancelacion">Cancelación</option>
                                            <option value="Abono">Abono</option>
                                            <option value="Anticipo">Anticipo</option>
                                            <option value="Otro">Otro</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Descripcion');?></label>
                                    <div class="col-sm-9">
                                        <!-- <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" require class="form-control" name="title"/> -->
                                            
                                        <select name="title" id="title" class="form-control">
                                            <option value="Cancelacion">Mensualidad</option>
                                            <option value="Abono">Libro</option>
                                            <option value="Anticipo">Examinación CFR</option>
                                            <option value="Otro">Certificación CFR</option>
                                            <option value="Otro">Matricula</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Concepto');?></label>
                                    <div class="col-sm-9">
                                        <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="description"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Fecha de pago');?></label>
                                    <div class="col-sm-9">
                                        <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="datetime-local"  class="form-control" name="date"/>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div style="color:#000; text-transform:bold: font-size:20px" class="panel-title"><?php echo ('Información de pago');?></div>
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Valor total a pagar: ');?></label>
                                    <div class="col-sm-9">
                                        <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="amount"
                                            placeholder="<?php echo ('Introduce el valor total de pago');?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Valor que paga: ');?></label>
                                    <div class="col-sm-9">
                                        <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="amount_paid"
                                            placeholder="<?php echo ('Introduce el valor a pagar');?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Estado de pago');?></label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control">
                                            <option data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="paid"><?php echo ('Pagado');?></option>
                                            <option value="unpaid"><?php echo ('No pagado');?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Método de pago');?></label>
                                    <div class="col-sm-9">
                                        <select onchange="if(this.value == 2) document.getElementById('baucher').disabled = false" name="metodo" id="metodo" class="form-control">
                                            <option value="1"><?php echo ('Efectivo');?></option>
                                            <option value="2"><?php echo ('Transferencia');?></option>
                                            <!-- <option value="3"><?php echo ('Card');?></option> -->
                                        </select>
                                    </div>
                                </div>

                                <!-- numero de baucher -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('N° de Baucher');?></label>
                                    <div class="col-sm-9">
                                       <input type="text" maxlength="20" disabled id="baucher" name="baucher" class="form-control">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                
                                <button style="font-size:20px; color:#000" type="submit" class="btn btn-info btn-lg"><i class="entypo-credit-card"><?php echo ('Facturar');?></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close();?>
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
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