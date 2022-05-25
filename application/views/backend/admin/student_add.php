<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo ('Formulario de matrícula');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	
				<!-- area de datos personales	 -->
		<div class="form-group">

		<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Información del cursante</h4>
			<div class="col-md-6 mb-3">
						
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label"><?php echo ('Nombres');?></label>
							<div class="col-sm-8">
							
								<input placeholder="Ej. Juan" style="text-transform:capitalize;" type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>
							</div>						
							
						</div>
	
						<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label"><?php echo ('Apellidos');?></label>
							
							<div class="col-sm-8">
								
							<input placeholder="Ej. Diaz" style="text-transform:capitalize;" type="text" class="form-control" name="lastname" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>
							</div>
						</div>
	
						<!-- cedula de identidad -->
						<div class="col-md-6 mb-3">
						
						<label style="color:#000; font-weight:bold;" for="identdocument" class="col-sm-3 control-label">Documento de identidad</label>							
							<div class="col-sm-8">								
							<input  placeholder="000-000000-0000A" style="text-transform:uppercase;" maxlength="20" id="identdocument" type="text" class="form-control" name="identdocument" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>		
							</div>						
						</div>

						<!-- Tipi de documento de identidad -->
						<div class="col-md-6 mb-3">
						
						<label style="color:#000; font-weight:bold;" for="identdocument" class="col-sm-3 control-label">Tipo de documento de identidad</label>							
							<div class="col-sm-8">								
							<select data-validate="required" data-message-required="<?php echo ('Value Required');?>" name="tipodocumento" class="form-control" id="tipodocumento">
								<option value="Cedula">Cédula</option>
								<option value="CedulaResidencia">Cédula de residencia</option>
								<option value="Pasaporte">Pasaporte</option>
								<option value="Otro">Otro</option>
							</select>

							</div>						
						</div>



	
						<!-- natonality -->
	
						<div class="col-md-6 mb-3">
						
						<label style="color:#000; font-weight:bold;" for="txtnationality" class="col-sm-3 control-label">Nacionalidad</label>
							
							<div class="col-sm-8">
								
							<input placeholder="Nicaragüense" style="text-transform:capitalize;" maxlength="20" id="nationality" type="text" class="form-control" name="nationality" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>
							<div class="valid-feedback">
			
							</div>
						
						</div>
	
			</div>
</div>
				<!-- esta es la vista en donde se carga la pantalla que es para agregar un estudiante -->
<!-- contact form  -->
				


					<!-- Esto hace quecuando se seleccione u checkbox se active algun control 
					onclick="btTutorial.disabled = !this.checked" -->

					
					<!-- Class section -->
					<div class="form-group">
						<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Sección acádemica</h4>
					<div class="col-md-6 mb-3">
						
					<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Clase');?></label>
                        
						<div class="col-sm-8">
							<select data-validate="required" data-message-required="<?php echo ('Value Required');?>" name="class_id" class="form-control select2" data-validate="" id="class_id" 
								data-message-required="<?php echo ('Valor ');?>"
									onchange="return get_class_sections(this.value)"> 
									<!--en esta parte elimine la restricción de requerido en la parte de los parents-->
                              <option value=""><?php echo ('Seleccionar');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>">
											<?php echo 'Wave ' . $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						</div>						
							
						</div>
								<!-- Horario -->
						<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Horario');?></label>
		                    <div class="col-sm-8">
		                        <select data-validate="required" data-message-required="<?php echo ('Value Required');?>" name="horario" class="form-control" id="">		                            
									<option value="1"><?php echo ('Early morning');?></option>
									<option value="2"><?php echo ('Late morning');?></option>
									<option value="3"><?php echo ('Early afternoon');?></option>
									<option value="4"><?php echo ('Late afternoon');?></option>
									<option value="5"><?php echo ('Night shift');?></option>
									<option  disabled style="color:#000;" value="0"><b><?php echo ('--- WEEKEND ---');?></b></option>
									<option value="6"><?php echo ('Saturday morning');?></option>
									<option value="7"><?php echo ('Saturday afternoon');?></option>
									<option value="8"><?php echo ('Sunday morning');?></option>
									<option value="9"><?php echo ('Sunday afternoon');?></option>

			                        
			                    </select>
			                </div>
						</div>


								<!-- Nivel -->
								<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Nivel');?></label>
		                    <div class="col-sm-8">
		                        <select data-validate="required" data-message-required="<?php echo ('Value Required');?>" name="level" class="form-control" id="">
		                            <option readonly value="0"><?php echo ('Seleccione un nivel');?></option>
									<option value="A1-"><?php echo ('A1-');?></option>
									<option value="A1+"><?php echo ('A1+');?></option>
									<option value="A2-"><?php echo ('A2-');?></option>
			                        <option value="A2+"><?php echo ('A2+');?></option>
									<option value="B1-"><?php echo ('B1');?></option>
									<option value="B1+"><?php echo ('B1+');?></option>
									<option value="B2-"><?php echo ('B2-');?></option>
									<option value="B2+"><?php echo ('B2+');?></option>
									<option value="C1-"><?php echo ('C1-');?></option>
									<option value="C1+"><?php echo ('C1+');?></option>
									<option value="C2-"><?php echo ('C2-');?></option>
									<option value="C2+"><?php echo ('C2+');?></option>
			                    </select>
			                </div>
						</div>
	
						<!-- Rol -->
						<div class="col-md-6 mb-3">
						
						<label translate="no" style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Wave');?></label>
                        						

						<div class="col-sm-8">
							<select translate="no" name="wave" class="form-control select2" data-validate="" id="wave">
								<option value="Wave 1">Wave 1</option>
								<option value="Wave 2">Wave 2</option>
								<option value="Wave 3">Wave 3</option>
								<option value="Wave 4">Wave 4</option>
								<option value="Wave 5">Wave 5</option>
								<option value="Wave 6">Wave 6</option>
								<option value="Wave 7">Wave 7</option>
								<option value="Wave 8">Wave 8</option>
								<option value="Wave 9">Wave 9</option>
								<option value="Wave 10">Wave 10</option>
								<option value="Wave 11">Wave 11</option>
								<option value="Wave 12">Wave 12</option>
								<option value="Wave 13">Wave 13</option>
								<option value="Wave 14">Wave 14</option>
								<option value="Wave 15">Wave 15</option>
								<option value="Wave 16">Wave 16</option>
                          </select>
						</div>	
						
						</div>
	
						<!-- natonality -->
	
						
					</div>

				
					
					<!-- Birthday -->
					<div class="form-group">

					<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Otros datos</h4>
						<div class="col-md-6 mb-3">
							
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Cumpleaños');?></label>
							
							<div class="col-sm-8">
								<input onkeyup="this.value = mascara(this.value)" maxlength="10" data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="birthday" placeholder="dd-mm-AAAA" value="" data-start-view="2">
							</div> 
						</div>

						<div class="col-md-6 mb-3">
							
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Sexo');?></label>
                        
						<div class="col-sm-8">
							<select data-validate="required" data-message-required="<?php echo ('Value Required');?>" name="sex" class="form-control">
                              <option value=""><?php echo ('Seleccionar');?></option>
                              <option value="Femenino"><?php echo ('Femenino');?></option>
                              <option value="Masculino"><?php echo ('Masculino');?></option>
                          </select>
						</div> 
						</div>

						<div class="col-md-6 mb-3">
							
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Dirección');?></label>
                        
						<div class="col-sm-8">
							<input placeholder="Ej. Jinotepe, Carazo" data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="address" value="" >
						</div> 
						</div>

						<div class="col-md-6 mb-3">
							
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('N° teléfono');?></label>
                        
						<div class="col-sm-8">
							<input placeholder="Ej. +505 8997 1090" data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="tel" class="form-control" name="phone" value="" >
						</div> 
					</div>
					<br>
					<div class="col-md-6 mb-3">
							
					<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label"><?php echo ('Email');?></label>
						<div class="col-sm-8">
							<input placeholder="Ej. example@idiomastalk.com" data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="email" class="form-control" name="email" value="">
						</div>
					</div>
				</div>
					

			<div class="form-group">
			<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Contacto de emergencia</h4>
			<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">Nombre </label>                        
						<div class="col-sm-8 form-check">
							<input data-message-required="Por favor llena este campo" required type="text" placeholder="Nombre emergencia" name="nombreEmergencia" id="nombreEmergencia" class="form-control">
						</div>
			</div>

			<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">Apellidos </label>                        
						<div class="col-sm-8 form-check">
							<input type="text" placeholder="Apellido emergencia" name="apellidoEmergencia" id="apellidoEmergencia" class="form-control">
						</div>
			</div>
			

			<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">Relación </label>                        
						<div class="col-sm-8 form-check">
							<select name="parentescoEmergencia" id="parentescoEmergencia" class="form-control">
								<option value="1">Familiar</option>
								<option value="2">Amigo</option>
								<option value="3">Otro</option>
							</select>
						</div>
			</div>

			<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">N° teléfono </label>                        
						<div class="col-sm-8 form-check">
							<input type="tel" maxlength="30" placeholder="N° de teléfono" name="teleEmergencia" id="teleEmergencia" class="form-control">
						</div>
			</div>

			<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">Dirección </label>                        
						<div class="col-sm-8 form-check">
							<input type="text" maxlength="50" placeholder="Dirección emergencia" name="direccionEmergencia" id="direccionEmergencia" class="form-control">
						</div>
			</div>

			<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">Email emergencia </label>                        
						<div class="col-sm-8 form-check">
							<input type="text" maxlength="50" placeholder="Email emergencia" name="emailEmergencia" id="emailEmergencia" class="form-control">
						</div>
			</div>
			
			

	</div>



				<!-- familiar contact  -->
				<div class="form-group">

				<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Sección de contacto familiar</h4>

						<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">¿Es menor de edad?</label>
                        
						<div class="col-sm-8 form-check">
							
							<input id="chkdis" class="form-check-input" onclick="parent_id.disabled = !this.checked"  type="checkbox" data-validate="required" data-message-required="<?php echo('Valor requerido');?>" value="true"/> 
						</div>
						</div>


						<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Madre/Padre');?></label>
                        
						<div class="col-sm-8">
							<select  onchange="if(this.value != '') document.getElementById('emergencyphone').disabled = false"  data-validate="required" data-message-required="<?php echo ('Value Required');?>" disabled name="parent_id" class="form-control select2">
                              <option  value=""><?php echo ('Seleccionar');?></option>
                              <?php 
								$parents = $this->db->get('parent')->result_array();
								foreach($parents as $row):
									?>
                            		<option id="opname" value="<?php echo $row['parent_id'];?>">
										<?php echo $row['name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						</div> 
					</div>	

					<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Parentesco');?></label>
                        
						<div class="col-sm-8">
							<select   name="parentesco" class="form-control">
                              <option value=""><?php echo ('Seleccionar');?></option>
                              <?php 
								$parents = $this->db->get('parent')->result_array();
								foreach($parents as $row):
									?>
                            		<option value="1">
										Familia
                                    </option>
									<option value="2">
										Amigos
                                    </option>
									<option value="3">
										Otro
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						</div> 
					</div>	



					<!-- contact phone -->

					<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">Teléfono de contacto</label>
                        
						<div class="col-sm-8">
							
						<input disabled placeholder="Ej. +505 8965 3705" type="tel" class="form-control" id="emergencyphone" name="emergencyphone" value="" >
						</div>
						</div>
				</div>
					

					
					
					<!-- <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Password');?></label>
                        
						<div class="col-sm-5">
							<input type="password" class="form-control" name="password" value="" >
						</div> 
					</div> -->
	
					<!-- <div class="form-group">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label"><?php echo ('Foto');?></label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Seleccionar imagen</span>
										<span class="fileinput-exists">Cambiar</span>
										<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Eliminar</a>
								</div>
							</div>
						</div>
					</div> -->

                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo ('Agregar estudiante');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

	

	//  desactivas selects

// funcion para ponerle guiones de manera automatica al input de cedula
$(document).ready(Principal);
    function Principal(){
        var flag1 = true;
        $(document).on('keyup','[id=identdocument]',function(e){
            if($(this).val().length == 3 && flag1) {
                $(this).val($(this).val()+"-");
                flag1 = true;
            }else if($(this).val().length == 10 && flag1) {
            $(this).val($(this).val()+"-");
            flag1 = false;
        }
        });
    }
	

//   funcion que pone guiones de manera automatica al input de birthday
    	function mascara(valor) {
		if (valor.match(/^\d{2}$/) !== null) {
			return valor + '-';
		} else if (valor.match(/^\d{2}\-\d{2}$/) !== null) {
			return valor + '-';
		}
		return cadena;
		}




	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }
	

	let radios = document.querySelectorAll("[type='radio']");
   radios.forEach((x)=>{
     x.dataset.val = x.checked; // guardamos el estado del radio button dentro del elemento
     x.addEventListener('click',(e)=>{
       let element = e.target;
       if(element.dataset.val == 'false'){
         element.dataset.val = 'true';
         element.checked = true;
       }else{
         element.dataset.val = 'false';
         element.checked = false;
       }
     },true);
   });


</script>