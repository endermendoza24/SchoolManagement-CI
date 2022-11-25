<?php 
$edit_data		=	$this->db->get_where('book' , array('book_id' => $param2) )->result_array();

?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/book/do_update/'.$row['book_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Nombre');?></label>
                    <div class="col-sm-5">
                        <input data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Autor');?></label>
                    <div class="col-sm-5">
                        <input data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" type="text" class="form-control" name="author" value="<?php echo $row['author'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Descripcion');?></label>
                    <div class="col-sm-5">
                        <input data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Precio');?></label>
                    <div class="col-sm-5">
                        <input data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" type="text" class="form-control" name="price" value="<?php echo $row['price'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Clase');?></label>
                    <div class="col-sm-5">
                        <select data-validate="required" data-message-required="<?php echo ('Valor Requerido');?>" name="class_id" class="form-control">
                            <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
                                <option value="<?php echo $row2['class_id'];?>"
                                    <?php if($row['class_id']==$row2['class_id'])echo 'selected';?>><?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Estado');?></label>
                    <div class="col-sm-5">
                        <select name="status" class="form-control">
                            <option value="disponible" <?php if($row['status']=='disponible')echo 'selected';?>><?php echo ('Disponible');?></option>
                            <option value="no disponible" <?php if($row['status']=='no disponible')echo 'selected';?>><?php echo ('No Disponible');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo ('Editar Libro');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>