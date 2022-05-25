<?php 
	$edit_data = $this->db->get_where('parent' , array('parent_id' => $param2))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
					<?php echo ('Agregar Padre');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/parent/edit/' . $row['parent_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Nombre');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>"
                            	value="<?php echo $row['name'];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Apellido');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="lastname" data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>"
                            	value="<?php echo $row['lastname'];?>">
						</div>
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Cédula');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="identdocument" data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>"
                            	value="<?php echo $row['identdocument'];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Email');?></label>
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Value Required');?>" type="text" class="form-control" name="email" 
                            	value="<?php echo $row['email'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Numero Telefonico');?></label>
                        
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Direccion');?></label>
                        
						<div class="col-sm-5">
							<input data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Nacionalidad');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'];?>">
						</div>
					</div>
                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-success"><?php echo ('Actualizar');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>