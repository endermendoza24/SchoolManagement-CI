<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>    
    <title></title>
</head>
<body>
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo ('Lista de facturas');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo ('Facturar / Pagar'); ?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table  class="table table-bordered table-hover table-striped datatable"  id="table_export">
                	<thead>
                		<tr>
                            <th><div><?php echo ('N°');?></div></th>
                    		<th><div><?php echo ('Quien paga');?></div></th>
                            <th><div><?php echo ('Estudiante');?></div></th>
                    		<th><div><?php echo ('Título');?></div></th>
                            <th><div><?php echo ('Concepto');?></div></th>
                            <th><div><?php echo ('Observaciones');?></div></th>
                            <th><div><?php echo ('Total');?></div></th>
                            <th><div><?php echo ('Pagado');?></div></th>
                    		<th><div><?php echo ('Estado');?></div></th>
                            <th><div><?php echo ('Corte');?></div></th>
                    		<th><div><?php echo ('Fecha');?></div></th>
                    		<th><div><?php echo ('Opciones');?></div></th>
						</tr>
					</thead>
                    <tbody>
                        
                    	<?php foreach($invoices as $row):?>
                        <tr>
                       
                            <td><?php echo $row['invoice_id'];?></td>
                            <td><?php echo $row['quienpaga'];?></td>
							<td style="text-transform:capitalize;"><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']) .' ' . $this->crud_model->get_type_lastname_by_id('student',$row['student_id']);?></td>                            
							<td><?php echo $row['title'];?></td>
                            <td><?php echo $row['description'];?></td>
                            <td><?php echo $row['payment_details'];?></td>
							<td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['amount_paid'];?></td>
							<td>
								<span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'danger';?>"><?php echo $row['status'];?></span>
							</td>
                            <td style="text-transform:capitalize"><?php echo $row['corte']?></td>
							<td><?php echo date('d M Y, h:i a',$row['creation_timestamp']);?></td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Acción <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <?php if ($row['due'] != 0):?>

                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_take_payment/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-bookmarks"></i>
                                                <?php echo ('Tomar Pago');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <?php endif;?>
                                    
                                    <!-- VIEWING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_view_invoice/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-credit-card"></i>
                                                <?php echo ('Ver Factura');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_invoice/<?php echo $row['invoice_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo ('Editar');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/invoice/delete/<?php echo $row['invoice_id'];?>');">
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
                                <span style="color:red;">Campos obligatorios marcados con *</span>
                            </div>
                            <div class="panel-body">

                            <!-- <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ('Mismo estudiante paga');?></label>
                            <div class="col-sm-9">
                                <input onclick="estudiante.disabled = !this.checked " type="checkbox" name="mismo" class="" id="">
                            </div>
                            </div> -->

                            <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('Persona que paga');?></label>
                                    <div class="col-sm-9">
                                        <input list="pagan" id="quienpaga" type="text" name="quienPaga" class="form-control"/>
                                    </div>
                                </div>
                                <!-- Datalist -->
                                <!-- <datalist id="pagan">
                                    <option value="El mismo estudiante paga"></option>
                                    
                                </datalist> -->



                                <div class="form-group">
    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Estudiante');?></label>
    <div class="col-sm-9">
        <select style="text-transform:uppercase;" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="student_id" required>
            <option value=""><?php echo ('Seleccione un estudiante'); ?></option>
            <optgroup label="<?php echo ('Estudiante'); ?>">
                <?php
                $estudiante = $this->db->get('student')->result_array();
                foreach ($estudiante as $row):
                    // Obtener el año y el id del estudiante
                    $year = strftime('%y', strtotime($row['diamatricula']));
                    $studentId = $row['student_id'];

                    // Realizar la concatenación y formatear según tu preferencia
                    $formattedValue = $year . $studentId;

                    // Depuración: Imprimir valores para verificar
                    echo "Year: $year, Student ID: $studentId, Concatenated Value: $formattedValue <br>";
                ?>
                    <option style="text-transform:uppercase;" value="<?php echo $formattedValue; ?>">
                        - <?php echo $row['name'] . ' ' . $row['lastname'] . ' (' . $formattedValue . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </optgroup>
        </select>
    </div>
</div>

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Tipo');?></label>
                                    <div class="col-sm-9">                                        
                                            
                                        <select name="title" id="title" class="form-control">
                                            <option value="Cancelación">Cancelación</option>
                                            <option value="Abono">Abono</option>
                                            <option value="Anticipo">Anticipo</option>
                                            <option value="Otro">Otro</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Descripción');?></label>
                                <div class="col-sm-9">                                                                                    
                                        <select name="tipopago" id="motel" class="form-control">
                                        <option value="0" selected>Selecciona una opción...</option>
                                        <option value="Mensualidad">Mensualidad</option> 
                                        <option value="Matricula" >Matrícula</option> 
                                        <option value="Libro" >Libro</option> 
                                        <option value="examen" >Examinación CEFR</option> 
                                        <option value="certificado" >Certificación CEFR</option> 
                                        <option value="certificacionReprogramacion" >Reprogramación CEFR</option> 
                                        <option value="otros" >Otros</option> 
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Concepto');?></label>
                                    <div class="col-sm-9">
                                        <select name="description" id="Habitacion" class="form-control"></select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('Observaciones');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="observaciones" maxlength="300" class="form-control">
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div style="color:#000; text-transform:bold; font-size:20px" class="panel-title"><?php echo ('Información de pago');?></div>
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Valor total a pagar: ');?></label>
                                    <div class="col-sm-9">
                                        <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="amount"
                                            placeholder="<?php echo ('Introduce el valor total de pago');?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Valor que paga: ');?></label>
                                    <div class="col-sm-9">
                                        <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="amount_paid"
                                            placeholder="<?php echo ('Introduce el valor a pagar');?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Estado de pago');?></label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control">
                                            <option data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="paid"><?php echo ('Pagado');?></option>
                                            <option value="unpaid"><?php echo ('No pagado');?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Método de pago');?></label>
                                    <div class="col-sm-9">
                                        <select onchange="if(this.value == 2) document.getElementById('baucher').disabled = false" name="metodo" id="metodo" class="form-control">
                                            <option value="1"><?php echo ('Efectivo');?></option>
                                            <option value="2"><?php echo ('Transferencia');?></option>                                            
                                        </select>
                                    </div>
                                </div>

                                <!-- numero de baucher -->

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('N° de Baucher');?></label>
                                    <div class="col-sm-9">
                                       <input  id="baucher" name="baucher" disabled type="text" maxlength="20" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Fecha de pago*');?></label>
                                    <div class="col-sm-9">
                                        <input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="datetime-local" value="<?php date('d M Y',time())?>" class="form-control" name="date"/>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo ('Corte de pago');?></label>
                                    <div class="col-sm-9">
                                        <input style="font-size:100px" type="radio" name="corte" value="Matutino" id="corte">Corte matutino
                                        <input type="radio" name="corte"  value="Vespertino" id="corte">Corte vespertino
                                    </div>
                                </div> -->

                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('*Corte de pago');?></label>
                                    <div class="col-sm-9">
                                        <label for="" class="btn btn-success">
                                        <input style="font-size:100px" type="radio" name="corte" value="Matutino" id="corte"><span style="font-weight:bold">  Corte matutino</span>
                                        </label>
                                        <label for="" class="btn btn-info">
                                        <input type="radio" name="corte"  value="Vespertino" id="corte"><span style="font-weight:bold">  Corte vespertino</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- moneda -->

                                <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label style="color:#000; font-weight:bold" class="col-sm-3 control-label"><?php echo ('Moneda de pago');?></label>
                                    <div class="col-sm-9">
                                        <label for="" class="btn btn-danger">
                                        <input style="font-size:100px" type="radio" name="moneda" value="Córdoba" id="moneda"><span style="font-weight:bold">  C$ Córdoba</span>
                                        </label>
                                        <label for="" class="btn btn-info">
                                        <input type="radio" name="moneda"  value="Dólar" id="moneda"><span style="font-weight:bold">  U$ Dólar</span>
                                        </label>
                                    </div>
                                </div> -->
                                
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                
                                <button style="font-size:20px;" type="submit" class="btn btn-danger btn-lg"><i class="entypo-credit-card"><?php echo ('Facturar');?></i></button>
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


  <!-- se añadio esta librería para permitir la busqueda en el select -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      

<script type="text/javascript">


        $(document).on("change","#motel",function(){

        var mensualidad = "<option value='0' selected>Selecciona una mes...</option><option value='Enero'>Enero</option><option value='Febrero'>Febrero</option><option value='Marzo'>Marzo</option><option value='Abril'>Abril</option><option value='Mayo'>Mayo</option><option value='Junio'>Junio</option><option value='Julio'>Julio</option><option value='Agosto'>Agosto</option><option value='Septiembre'>Septiembre</option><option value='Octubre'>Octubre</option><option value='Noviembre'>Noviembre</option><option value='Diciembre'>Diciembre</option>"

        var matricula = "<option value='0' selected>Selecciona una opción...</option><option value='Matricula nuevo ingreso'>Matrícula de nuevo ingreso</option><option value='Matricula continuidad'>Matrícula de continuidad</option>"

        var examinacion = "<option value='0' selected>Selecciona un examen...</option><option value='Examen CEFR A1-'>Examen CEFR A1-</option><option value='Examen CEFR A1+'>Examen CEFR A1+</option><option value='Examen CEFR A2-'>Examen CEFR A2-</option><option value='Examen CEFR A2+'>Examen CEFR A2+</option><option value='Examen CEFR B1-'>Examen CEFR B1-</option><option value='Examen CEFR B1+'>Examen CEFR B1+</option><option value='Examen CEFR B2-'>Examen CEFR B2-</option><option value='Examen CEFR B2-'>Examen CEFR B2+</option>"

        var certificacion = "<option value='0' selected>Selecciona un certificado...</option><option value='Certificado CEFR A1-'>Certificado CEFR A1-</option><option value='Certificado CEFR A1+'>Certificado CEFR A1+</option><option value='Certificado CEFR A2-'>Certificado CEFR A2-</option><option value='Certificado CEFR A2+'>Certificado CEFR A2+</option><option value='Certificado CEFR B1-'>Certificado CEFR B1-</option><option value='Certificado CEFR B1+'>Certificado CEFR B1+</option><option value='Certificado CEFR B2-'>Certificado CEFR B2-</option>"
        var certificacionReprogramacion = "<option value='0' selected>Selecciona el certificado a reprogramar...</option><option value='Reprogramación certificado CEFR A1-'>Reprogramación certificado CEFR A1-</option><option value='Reprogramación certificado CEFR A1+'>Reprogramación certificado CEFR A1+</option><option value='Reprogramación certificado CEFR A2-'>Reprogramación certificado CEFR A2-</option><option value='Reprogramación certificado CEFR A2+'>Reprogramación certificado CEFR A2+</option><option value='Reprogramación certificado CEFR B1-'>Reprogramación certificado CEFR B1-</option><option value='Reprogramación certificado CEFR B1+'>Reprogramación certificado CEFR B1+</option><option value='Reprogramación certificado CEFR B2-'>Reprogramación certificado CEFR B2-</option>"

        var libros = "<option value='0' selected>Selecciona un libro...</option><option value='American English File Starter A'>  American English File Starter A</option><option value='American English File Starter B'>  American English File Starter B</option><option value='  American English File Starter 1A'>  American English File Starter 1A</option><option value='  American English File Starter 1B'>  American English File Starter 1B</option><option value='  American English File Starter 2A'>  American English File Starter 2A</option><option value='  American English File Starter 2B'>  American English File Starter 2B</option><option value='  American English File Starter 3A'>  American English File Starter 3A</option><option value='  American English File Starter 3B'>  American English File Starter 3B</option><option value='  American English File Starter 4A'>  American English File Starter 4A</option><option value='  American English File Starter 4B'>  American English File Starter 4B</option><option value='  American English File Starter 5A'>  American English File Starter 5A</option><option value='  American English File Starter 5B'>  American English File Starter 5B</option><option disabled value='0'>Libros de niños</option><option value='  PACK Story Central 1 (SB WB, RB)'>  PACK Story Central 1 (SB WB, RB)</option><option value='  PACK Story Central 2 (SB, WB, RB)'>  PACK Story Central 2 (SB, WB, RB)</option><option value='  PACK Story Central 3 (SB, WB, RB)'>  PACK Story Central 3 (SB, WB, RB)</option><option value='  PACK Story Central 4 (SB, WB, RB)'>  PACK Story Central 4 (SB, WB, RB)</option><option value='  PACK Story Central 5 (SB, WB, RB)'>  PACK Story Central 5 (SB, WB, RB)</option><option value='  PACK Story Central 1 (SB, WB, RB)'>  PACK Story Central 1 (SB, WB, RB)</option><option disabled  value='0'>Libros de francés</option><option value='  Défi 1'>  Défi 1</option><option value='  Défi 2'>  Défi 2</option><option value='  Défi 3'>  Défi 3</option><option value='  Défi 4'>  Défi 4</option>"
        var otros = "<option value='otro'>Otro</option>"
       

        var idMotel = $("#motel option:selected").val();

        if(idMotel == "Mensualidad")
            $("#Habitacion").html(mensualidad);
        else if(idMotel =="Matricula")
            $("#Habitacion").html(matricula);       
        else if(idMotel =="Libro")
            $("#Habitacion").html(libros);
        else if(idMotel =="examen")
            $("#Habitacion").html(examinacion);
        else if(idMotel =="certificado")
            $("#Habitacion").html(certificacion);       
        else if(idMotel =="otros")
            $("#Habitacion").html(otros);  
        else if(idMotel =="certificacionReprogramacion")
            $("#Habitacion").html(certificacionReprogramacion);  
        });

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "order":[0,'desc'],
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
							datatable.fnSetColumnVis(8, false);
							
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


</body>
</html>