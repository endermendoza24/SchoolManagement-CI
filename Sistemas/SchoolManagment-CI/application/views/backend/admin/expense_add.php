<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo ('Agregar gasto');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/expense/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo ('Título');?></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo ('Value Required');?>" value="" autofocus>
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Categoría');?></label>
                        <div class="col-sm-6">
                            <select name="expense_category_id" class="form-control" required>
                                <option value=""><?php echo ('Seleccione categoría de gasto');?></option>
                                <?php 
								date_default_timezone_set("America/El_Salvador");
                                	$categories = $this->db->get('expense_category')->result_array();
                                	foreach ($categories as $row):
                                ?>
                                <option value="<?php echo $row['expense_category_id'];?>"><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Descripción');?></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="description" value="" >
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo ('Monto');?></label>
                        
						<div class="col-sm-6">
							<input type="number" min="0" data-validate="required" data-message-required="<?php echo('Valor requerido');?>" class="form-control" name="amount" value="" >
						</div> 
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Método');?></label>
                        <div class="col-sm-6">
                            <select name="method" class="form-control">
                                <option value="1"><?php echo ('Efectivo');?></option>
                                <option value="2"><?php echo ('Transferencia');?></option>
                                <!-- <option value="3"><?php echo ('Card');?></option> -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Fecha');?></label>
                        <div class="col-sm-6">
                            <input type="datetime-local" value="<?php echo date("m-d-Y h:i:s");?>" class="form-control" name="timestamp"/>
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Corte');?></label>
                        <div class="col-sm-6">
                            <input type="radio" name="corte" value="Matutino" id="">Matutino
							<input type="radio" name="corte" value="Vespertino" id="">Vespertino
                        </div>
                    </div>
                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-danger"><?php echo ('Agregar gasto');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>