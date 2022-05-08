<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo ('Addmission Form');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	
				<!-- area de datos personales	 -->
		<div class="form-group">

		<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Personal section</h4>
			<div class="col-md-6 mb-3">
						
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label"><?php echo ('Name');?></label>
							<div class="col-sm-8">
							
								<input placeholder="Eg. Juan" style="text-transform:capitalize;" type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>
							</div>						
							
						</div>
	
						<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label"><?php echo ('Lastname');?></label>
							
							<div class="col-sm-8">
								
							<input placeholder="Eg. Diaz" style="text-transform:capitalize;" type="text" class="form-control" name="lastname" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>
							</div>
						</div>
	
						<!-- cedula de identidad -->
						<div class="col-md-6 mb-3">
						
						<label style="color:#000; font-weight:bold;" for="identdocument" class="col-sm-3 control-label">Identity document</label>
							
							<div class="col-sm-8">
								
							<input  placeholder="00-000000-0000A" style="text-transform:uppercase;" maxlength="20" id="identdocument" type="text" class="form-control" name="identdocument" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>
							
							</div>
						
						</div>
	
						<!-- natonality -->
	
						<div class="col-md-6 mb-3">
						
						<label style="color:#000; font-weight:bold;" for="txtnationality" class="col-sm-3 control-label">Nationality</label>
							
							<div class="col-sm-8">
								
							<input placeholder="Nicaraguan" style="text-transform:capitalize;" maxlength="20" id="nationality" type="text" class="form-control" name="nationality" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>
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
						<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Academic section</h4>
					<div class="col-md-6 mb-3">
						
					<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Class');?></label>
                        
						<div class="col-sm-8">
							<select name="class_id" class="form-control" data-validate="" id="class_id" 
								data-message-required="<?php echo ('Value ');?>"
									onchange="return get_class_sections(this.value)"> 
									<!--en esta parte elimine la restricción de requerido en la parte de los parents-->
                              <option value=""><?php echo ('Select');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>">
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						</div>						
							
						</div>
								<!-- classroom -->
						<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Classroom');?></label>
		                    <div class="col-sm-8">
		                        <select  name="section_id" class="form-control" id="section_selector_holder">
		                            <option value=""><?php echo ('Select class first');?></option>
			                        
			                    </select>
			                </div>
						</div>
	
						<!-- Rol -->
						<!-- <div class="col-md-6 mb-3">
						
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Roll');?></label>
                        
						<div class="col-sm-8">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="roll" value="" >
						</div> 
						
						</div> -->
	
						<!-- natonality -->
	
						
					</div>

				
					
					<!-- Birthday -->
					<div class="form-group">

					<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Other dates section</h4>
						<div class="col-md-6 mb-3">
							
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Birthday');?></label>
							
							<div class="col-sm-8">
								<input onkeyup="this.value = mascara(this.value)" maxlength="10" data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="birthday" placeholder="dd-mm-yyyy" value="" data-start-view="2">
							</div> 
						</div>

						<div class="col-md-6 mb-3">
							
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Gender');?></label>
                        
						<div class="col-sm-8">
							<select data-validate="required" data-message-required="<?php echo ('Value Required');?>" name="sex" class="form-control">
                              <option value=""><?php echo ('Select');?></option>
                              <option value="Male"><?php echo ('Male');?></option>
                              <option value="Female"><?php echo ('Female');?></option>
                          </select>
						</div> 
						</div>

						<div class="col-md-6 mb-3">
							
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Address');?></label>
                        
						<div class="col-sm-8">
							<input placeholder="Eg. Jinotepe, Carazo" data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="address" value="" >
						</div> 
						</div>

						<div class="col-md-6 mb-3">
							
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Phone');?></label>
                        
						<div class="col-sm-8">
							<input placeholder="Eg. +505 22334455" data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="phone" value="" >
						</div> 
					</div>
					<br>
					<div class="col-md-6 mb-3">
							
					<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label"><?php echo ('Email');?></label>
						<div class="col-sm-8">
							<input placeholder="Eg. example@talk.com" data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="email" class="form-control" name="email" value="">
						</div>
					</div>
				</div>
					


				<!-- emergency contact  -->
				<div class="form-group">

				<h4 style="text-align:center; font-weight:bold; font-size:1.5rem; color:#000; padding:1.2rem">Contact section</h4>

						<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">Under - age?</label>
                        
						<div class="col-sm-8 form-check">
							
							<input id="chkdis" class="form-check-input" onclick="parent_id.disabled = !this.checked"  type="checkbox" data-validate="required" data-message-required="<?php echo('Valor requerido');?>" value="true"/> 
						</div>
						</div>


						<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-2" class="col-sm-3 control-label"><?php echo ('Parent');?></label>
                        
						<div class="col-sm-8">
							<select onchange="if(this.value != '') document.getElementById('emergencyphone').disabled = false"  data-validate="required" data-message-required="<?php echo ('Value Required');?>" disabled name="parent_id" class="form-control">
                              <option value=""><?php echo ('Select');?></option>
                              <?php 
								$parents = $this->db->get('parent')->result_array();
								foreach($parents as $row):
									?>
                            		<option value="<?php echo $row['parent_id'];?>">
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
                              <option value=""><?php echo ('Select');?></option>
                              <?php 
								$parents = $this->db->get('parent')->result_array();
								foreach($parents as $row):
									?>
                            		<option value="1">
										Family
                                    </option>
									<option value="2">
										Friends
                                    </option>
									<option value="3">
										Other
                                    </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						</div> 
					</div>	



					<!-- contact phone -->

					<div class="col-md-6 mb-3">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label">Contact phone</label>
                        
						<div class="col-sm-8">
							
						<input disabled placeholder="Eg. +505 22334455" type="tel" class="form-control" id="emergencyphone" name="emergencyphone" value="" >
						</div>
						</div>
				</div>
					

					
					
					<!-- <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Password');?></label>
                        
						<div class="col-sm-5">
							<input type="password" class="form-control" name="password" value="" >
						</div> 
					</div> -->
	
					<div class="form-group">
						<label style="color:#000; font-weight:bold;" for="field-1" class="col-sm-3 control-label"><?php echo ('Photo');?></label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
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
					</div>
                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo ('Add Student');?></button>
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

</script>