<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
					<?php echo ('Agregar padre');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/parent/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Nombre');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>"  autofocus
                            	value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Apellido');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="lastname" data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>"  autofocus
                            	value="">
						</div>
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Cédula');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="identdocument" data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>"  autofocus
                            	value="">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Email');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="email" 
                            	value="">
						</div>
					</div>
					
					<!-- <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Contraseña');?></label>
                        
						<div class="col-sm-5">
							<input type="password" class="form-control" name="password" value="">
						</div>
					</div> -->
					
					<div class="form-group">
						<label for="field-2"  class="col-sm-3 control-label"><?php echo ('Numero Telefonico');?></label>
                        
						<div class="col-sm-5">
							<input type="text" data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" class="form-control" name="phone" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2"  class="col-sm-3 control-label"><?php echo ('Direccion');?></label>
                        
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" type="text" class="form-control" name="address" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Nacionalidad');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nationality" value="">
						</div>
					</div>
                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-success"><?php echo ('Agregar Madre/Padre');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>