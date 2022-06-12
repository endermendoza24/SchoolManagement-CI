<?php 
$edit_data		=	$this->db->get_where('student' , array('student_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo ('Editar estudiante');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/student/'.$row['class_id'].'/do_update/'.$row['student_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                
                	
	
					<!-- <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Photo');?></label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div> -->
	
					<div class="form-group">
						<label  for="field-1" class="col-sm-3 control-label"><?php echo ('Nombre');?></label>
                        
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="<?php echo $row['name'];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Apellido');?></label>
                        
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'];?>" >
						</div> 
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Tutor');?></label>
                        
						<div class="col-sm-5">
							<select  name="parent_id" class="form-control" >  <!-- data-validate="required" data-message-required="<?php echo ('Value Required');?>" -->
                              <option value=""><?php echo ('Select');?></option>
                              <?php 
									$parents = $this->db->get('parent')->result_array();
									foreach($parents as $row3):
										?>
                                		<option value="<?php echo $row3['parent_id'];?>"
                                        	<?php if($row['parent_id'] == $row3['parent_id'])echo 'selected';?>>
													<?php echo $row3['name'];?>
                                                </option>
	                                <?php
									endforeach;
								  ?>
                          </select>
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Wave');?></label>
                        
						<div class="col-sm-5">
							<select data-message-required="<?php echo ('Value Required');?>" name="class_id" class="form-control" data-validate="required" id="class_id" 
								data-message-required="<?php echo ('Value Required');?>"
									onchange="return get_class_sections(this.value)">
                              <option value=""><?php echo ('Seleccionar');?></option>
                              <?php 
									$classes = $this->db->get('class')->result_array();
									foreach($classes as $row2):
										?>
                                		<option value="<?php echo $row2['class_id'];?>"
                                        	<?php if($row['class_id'] == $row2['class_id'])echo 'selected';?>>
													<?php echo $row2['name'];?>
                                                </option>
	                                <?php
									endforeach;
								  ?>
                          </select>
						</div> 
					</div>

					
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo ('Salón');?></label>
			                    <div class="col-sm-5">
			                        <select data-validate="required" data-message-required="<?php echo ('Value Required');?>" name="section_id" class="form-control" id="section_selector_holder">
			                            <option value=""><?php echo ('Selecciona una Wave primero');?></option>
				                        
				                    </select>
				                </div>
						</div>
					
					
						<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Nacionalidad');?></label>
                        
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'];?>" >
						</div> 
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Documento de identidad');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="identdocument" value="<?php echo $row['identdocument'];?>" >
						</div> 
					</div>

					<!-- Tipi de documento de identidad -->
					<div class="form-group">
						
						<label style="color:#000; font-weight:bold;" for="identdocument" class="col-sm-3 control-label">Tipo de documento de identidad</label>							
							<div class="col-sm-5">								
							<select name="tipodocumento" class="form-control" id="tipodocumento">
								<option value="Cedula">Cédula</option>
								<option value="CedulaResidencia">Cédula de residencia</option>
								<option value="Pasaporte">Pasaporte</option>
								<option value="Otro">Otro</option>
							</select>

							</div>						
						</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Fecha Nac');?></label>
                        
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control datepicker" name="birthday" value="<?php echo $row['birthday'];?>" data-start-view="2">
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Sexo');?></label>
                        
						<div class="col-sm-5">
							<select data-validate="required" data-message-required="<?php echo ('Value Required');?>" name="sex" class="form-control">
                              <option value=""><?php echo ('Select');?></option>
                              <option value="Male" <?php if($row['sex'] == 'Male')echo 'selected';?>><?php echo ('Masculino');?></option>
                              <option value="Female"<?php if($row['sex'] == 'Female')echo 'selected';?>><?php echo ('Femenino');?></option>
                          </select>
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Dirección');?></label>
                        
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="address" value="<?php echo $row['address'];?>" >
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Teléfono');?></label>
                        
						<div class="col-sm-5">
							<input  type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>" >
						</div> 
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Email');?></label>
						<div class="col-sm-5">
							<input  type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
						</div>
					</div>
                    
                   
					<div class="form-group bg-success">
						<div class="col-sm-offset-3 col-sm-5 "><h3>Contacto de emergencia</h3></div>

					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Nombre contacto de emergencia');?></label>
                        
						<div class="col-sm-8">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="nombreEmergencia" value="<?php echo $row['nombreemergencia'];?>" >
						</div> 
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Apellido contacto de emergencia');?></label>
                        
						<div class="col-sm-8">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="apellidoEmergencia" value="<?php echo $row['apellidoemergencia'];?>" >
						</div> 
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Teléfono contacto de emergencia');?></label>
                        
						<div class="col-sm-8">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="telefonoEmergencia" value="<?php echo $row['telefonoemergencia'];?>" >
						</div> 
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo ('Editar estudiante');?></button>
						</div>
					</div>
					
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>

<script type="text/javascript">

	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

    var class_id = $("#class_id").val();
    
    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });


</script>