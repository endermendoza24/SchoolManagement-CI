
<hr />  
        
<div class="row">
    <div class="col-md-12">
        
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-users"></i></span>
                    <span class="hidden-xs"><?php echo ('Estudiantes');?></span>
                </a>
            </li>
        <?php 
            $query = $this->db->get_where('section' , array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
        ?>
            <li>
                <a href="#<?php echo $row['section_id'];?>" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo ('Seccion');?> <?php echo $row['name'];?> ( <?php echo $row['nick_name'];?> )</span>
                </a>
            </li>
        <?php endforeach;?>
        <?php endif;?>
        </ul>
        
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                
                <table class="table table-bordered table-hover table-striped datatable" id="table_export">
                    <thead>
                        <tr>
                            <th><div><?php echo ('Fecha de Admision');?></div></th>
                            <!-- <th><div><?php echo ('Foto');?></div></th> -->
                            <th><div><?php echo ('Nombre');?></div></th>
                            <th><div><?php echo ('Opciones');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                                foreach($students as $row):?>
                        <tr>
                            <td><?php echo strftime('%A, %d de %B de %Y', $row['diamatricula']);?></td>
                            <!-- <td align="center"><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td> -->
                            <td style="text-transform:capitalize"><?php echo $row['name'] . ' ' . $row['lastname'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_marksheet/<?php echo $row['student_id'];?>');" class="btn btn-default" >
                                      <i class="entypo-chart-bar"></i>
                                          <?php echo ('Vier Notas');?>
                                      </a>
                                
                                
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                    
            </div>
        <?php 
            $query = $this->db->get_where('section' , array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
        ?>
            <div class="tab-pane" id="<?php echo $row['section_id'];?>">
                
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th><div><?php echo ('Fecha de Admision');?></div></th>
                            <!-- <th><div><?php echo ('Foto');?></div></th> -->
                            <th><div><?php echo ('Nombre');?></div></th>
                            <th><div><?php echo ('Opciones');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $students   =   $this->db->get_where('student' , array(
                                    'class_id'=>$class_id , 'section_id' => $row['section_id']
                                ))->result_array();
                                foreach($students as $row):?>
                        <tr>
                        <td style="text-transform:capitalize"><?php echo strftime('%A, %d de %B de %Y', $row['diamatricula']);?></td>
                            <!-- <td align="center"><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td> -->
                            <td><?php echo $row['name'] . ' ' . $row['lastname'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_marksheet/<?php echo $row['student_id'];?>');" class="btn btn-default" >
                                      <i class="entypo-chart-bar"></i>
                                          <?php echo ('Ver Notas');?>
                                      </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                    
            </div>
        <?php endforeach;?>
        <?php endif;?>

        </div>
        
        
    </div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>


