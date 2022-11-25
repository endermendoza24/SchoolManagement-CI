<hr />
	<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover table-striped">
    	<thead>
        	<tr>
            	<th><?php echo ('Selecciona una fecha');?></th>
            	<th><?php echo ('Selecciona mes');?></th>
            	<th><?php echo ('Selecciona año');?></th>
            	<th><?php echo ('Selecciona una Wave');?></th>
            	<th><?php echo ('Marcar asistencia');?></th>
           </tr>
       </thead>
		<tbody>
        	<form method="post" action="<?php echo base_url();?>index.php?admin/attendance_selector" class="form">
            	<tr class="gradeA">
                    <td>
                    	<select name="date" class="form-control">
                        	<?php for($i=1;$i<=31;$i++):?>
                            	<option value="<?php echo $i;?>" 
                                	<?php if(isset($date) && $date==$i)echo 'selected="selected"';?>>
										<?php echo $i;?>
                                        	</option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td>
                    	<select name="month" class="form-control">
                        	<?php 
							for($i=1;$i<=12;$i++):
								if($i==1)$m='Enero';
								else if($i==2)$m='Febrero';
								else if($i==3)$m='Marzo';
								else if($i==4)$m='Abril';
								else if($i==5)$m='Mayo';
								else if($i==6)$m='Junio';
								else if($i==7)$m='Julio';
								else if($i==8)$m='Agosto';
								else if($i==9)$m='Septiembre';
								else if($i==10)$m='Octubre';
								else if($i==11)$m='Noviembre';
								else if($i==12)$m='Diciembre';
							?>
                            	<option value="<?php echo $i;?>"
                                	<?php if($month==$i)echo 'selected="selected"';?>>
										<?php echo $m;?>
                                        	</option>
                            <?php 
							endfor;
							?>
                        </select>
                    </td>
                    <td>
                    	<select name="year" class="form-control">
                        	<?php for($i=2025;$i>=2020;$i--):?>
                            	<option value="<?php echo $i;?>"
                                	<?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
										<?php echo $i;?>
                                        	</option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td>
                    	<select name="class_id" class="form-control">
                        	<option value="">Selecciona una Wave</option>
                        	<?php 
							$classes	=	$this->db->get('class')->result_array();
							foreach($classes as $row):?>
                        	<option value="<?php echo $row['class_id'];?>"
                            	<?php if(isset($class_id) && $class_id==$row['class_id'])echo 'selected="selected"';?>>
									<?php echo $row['name'];?>                                    
                              			</option>
                            <?php endforeach;?>
                        </select>

                    </td>
                    <td align="center"><input type="submit" value="<?php echo ('Asistencia diaria');?>" class="btn btn-info"/></td>
                </tr>
            </form>
		</tbody>
	</table>
<hr />



<?php if($date!='' && $month!='' && $year!='' && $class_id!=''):?>

<center>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
        
            <div class="tile-stats tile-white-gray">
                <div class="icon"><i class="entypo-suitcase"></i></div>
                <?php
                    $full_date	=	$year.'-'.$month.'-'.$date;
                    $timestamp  = strtotime($full_date);
                    $day        = strtolower(date('l', $timestamp));
                 ?>
                <h2><?php echo ucwords($day);?></h2>
                
                <h3>Asistencia de la clase</h3>
                <p><?php echo $date.'-'.$month.'-'.$year;?></p>
            </div>
            <a href="#" id="update_attendance_button" onclick="return update_attendance()" 
                class="btn btn-info">
                    Actualizar asistencia
            </a>
        </div>

    </div>
</center>
<hr />

<div class="row" id="attendance_list">
    <div class="col-sm-offset-3 col-md-6">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <td><?php echo ('Nivel');?></td>
                    <td><?php echo ('Nombre');?></td>
                    <td><?php echo ('Estado');?></td>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                        foreach($students as $row):?>
                        <tr class="gradeA">
                            <td><? echo $row['level'];?></td>
                            <td style="text-transform:capitalize;"><?php echo $row['name']; echo '  '; echo $row['lastname'];?></td>
                            <?php 
                                //inserting blank data for students attendance if unavailable
                                $verify_data    =   array(  'student_id' => $row['student_id'],
                                                            'date' => $full_date);
                                $query = $this->db->get_where('attendance' , $verify_data);
                                if($query->num_rows() < 1)
                                $this->db->insert('attendance' , $verify_data);
                                
                                //showing the attendance status editing option
                                $attendance = $this->db->get_where('attendance' , $verify_data)->row();
                                $status     = $attendance->status;
                            ?>
                        <?php if ($status == 1):?>
                            <td align="center">
                              <span class="badge badge-success"><?php echo ('Presente');?></span>  
                            </td>
                        <?php endif;?>
                        <?php if ($status == 2):?>
                            <td align="center">
                              <span class="badge badge-danger"><?php echo ('Ausente');?></span>  
                            </td>
                        <?php endif;?>
                        <?php if ($status == 3):?>
                            <td align="center">
                              <span style="color: #000; font-weight:bold;" class="badge badge-warning"><?php echo ('Justificado');?></span>  
                            </td>
                        <?php endif;?>
                         <?php if ($status == 4):?>
                            <td align="center">
                              <span style="color: #fff;font-weight:700; background-color:#8801FE; font-weight:bold;" class="badge"><?php echo ('Tarde');?></span>  
                            </td>
                        <?php endif;?>
                        <?php if ($status == 0):?>
                            <td></td>
                        <?php endif;?>
                        </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>




<div class="row" id="update_attendance">

<!-- STUDENT's attendance submission form here -->
<form method="post" 
    action="<?php echo base_url();?>index.php?admin/manage_attendance/<?php echo $date.'/'.$month.'/'.$year.'/'.$class_id;?>">
        <div class="col-sm-offset-3 col-md-6">
            <table  class="table table-bordered table-hover table-striped">
        		<thead>
        			<tr class="gradeA">
                    	<th><?php echo ('Nivel');?></th>
                    	<th><?php echo ('Nombre');?></th>
                    	<th><?php echo ('Estado');?></th>
        			</tr>
                </thead>
                <tbody>
                		
                	<?php 
        			//STUDENTS ATTENDANCE
        			$students	=	$this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
        				
        			foreach($students as $row)
        			{
        				?>
        				<tr class="gradeA">
        					<td><?php echo $row['level'];?></td>
        					<td style="text-transform:capitalize;"><?php echo $row['name']; echo ' ';  echo $row['lastname'];?></td>                            
        					<td align="center">
        						<?php 
        						//inserting blank data for students attendance if unavailable
        						$verify_data	=	array(	'student_id' => $row['student_id'],
        													'date' => $full_date);
        						$query = $this->db->get_where('attendance' , $verify_data);
        						if($query->num_rows() < 1)
        						$this->db->insert('attendance' , $verify_data);
        						
        						//showing the attendance status editing option
        						$attendance = $this->db->get_where('attendance' , $verify_data)->row();
        						$status		= $attendance->status;
                            	?>
                                
                                
                                    <select name="status_<?php echo $row['student_id'];?>" class="form-control" style="width:100px; float:left;">
                                        <option value="0" <?php if($status == 0)echo 'selected="selected"';?>></option>
                                        <option value="1" <?php if($status == 1)echo 'selected="selected"';?>>Presente</option>
                                        <option value="2" <?php if($status == 2)echo 'selected="selected"';?>>Ausente</option>
                                        <option value="3" <?php if($status == 3)echo 'selected="selected"';?>>Justificado</option>
                                        <option value="4" <?php if($status == 4)echo 'selected="selected"';?>>Tarde</option>
                                    </select>
                                
                            </td>
        				</tr>
        				<?php 
        			}
        			?>
                </tbody>
            </table>
            <input type="hidden" name="date" value="<?php echo $full_date;?>" />
            <center>
                <input type="submit" class="btn btn-info" value="Guardar cambios">
            </center>
        </div>
    
    
</form>
</div>
<?php endif;?>

<script type="text/javascript">

    $("#update_attendance").hide();

    function update_attendance() {

        $("#attendance_list").hide();
        $("#update_attendance_button").hide();
        $("#update_attendance").show();

    }
</script>