<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title></title>
</head>
<body>
<?php 
$edit_data		=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/invoice/do_update/'.$row['invoice_id'], array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
        
        <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Estudiante');?></label>
                    <div class="col-sm-5">
                        <select class="form-control" name="student_id" class="form-control" style="width:400px;" >
                            <?php 
                            $this->db->order_by('class_id','asc');
                            $students = $this->db->get('student')->result_array();
                            foreach($students as $row2):
                            ?>
                                <option value="<?php echo $row2['student_id'];?>"
                                    <?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
                                    Wave <?php echo $this->crud_model->get_class_name($row2['class_id']);?> 
                                    <?php echo $row2['section_id'];?> -
                                    <?php echo $row2['name'];?>
                                    <?php echo $row2['lastname'];?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Titulo');?></label>
                    <div class="col-sm-5">
                        <input required type="text" class="form-control" name="title" value="<?php echo $row['title'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Descripcion');?></label>
                    <div class="col-sm-5">
                        <input required type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Observaciones');?></label>
                    <div class="col-sm-5">
                        <input  type="text" class="form-control" name="observaciones" value="<?php echo $row['payment_details'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Monto Total');?></label>
                    <div class="col-sm-5">
                        <input required type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>"/>
                    </div>
                </div>
                <!-- editar baucher -->
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Baucher');?></label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control"  name="baucher" value="<?php echo $row['baucher'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Estado');?></label>
                    <div class="col-sm-5">
                        <select name="status" class="form-control">
                            <option value="paid" <?php if($row['status']=='paid')echo 'selected';?>><?php echo ('Pagado');?></option>
                            <option value="unpaid" <?php if($row['status']=='unpaid')echo 'selected';?>><?php echo ('No Pagado');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Fecha');?></label>
                    <div class="col-sm-5">
                        <input type="datetime-local" class="form-control" name="date" 
                            value="<?php echo date('m/d/Y H:i', $row['creation_timestamp']);?>"/>
                    </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo ('Editar Factura');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>
</body>
</html>