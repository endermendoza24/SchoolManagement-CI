<hr />
<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/student_add/');" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo ('Agregar nuevo estudiante');?>
    </a> 
<br>

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
                    <span class="hidden-xs"><?php echo ('Salón: ');?> <?php echo $row['name'];?> ( <?php echo $row['nick_name'];?> )</span>
                </a>
            </li>
        <?php endforeach;?>
        <?php endif;?>
        </ul>
        
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                
                <table class="table table-bordered datatable table-hover table-striped" id="table_export">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo ('Fecha matrícula');?></div></th>
                            <!-- <th width="80"><div><?php echo ('Photo');?></div></th> -->
                            <th><div><?php echo ('Nombre');?></div></th>
                            <th class="span3"><div><?php echo ('Dirección');?></div></th>
                            <th><div><?php echo ('Email');?></div></th>
                            <th><div><?php echo ('Emergencia');?></div></th>
                            <th><div><?php echo ('Opciones');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                                foreach($students as $row):?>
                        <tr>                            
                            <td><?php  echo date('d M,Y', $row['diamatricula']);?></td>
                            <!-- <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td> -->
                            <td><?php echo $row['name'];?>  <?php echo $row['lastname'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo  $row['nombreemergencia'] . ' ' . ' ' . $row['apellidoemergencia'] ;?></td>
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Acción <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!-- STUDENT PROFILE LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_profile/<?php echo $row['student_id'];?>');">
                                                <i class="entypo-user"></i>
                                                    <?php echo ('Perfil de estudiante');?>
                                                </a>
                                        </li>
                                        
                                        <!-- STUDENT EDITING LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_edit/<?php echo $row['student_id'];?>');">
                                                <i class="entypo-pencil"></i>
                                                    <?php echo ('Editar');?>
                                                </a>
                                        </li>
                                        <li class="divider"></li>
                                        
                                        <!-- STUDENT DELETION LINK -->
                                        <li>
                                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');">
                                                <i class="entypo-trash"></i>
                                                    <?php echo ('Eliminar');?>
                                                </a>
                                        </li>
                                    </ul>
                                </div>
                                
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
                            <th width="80"><div><?php echo ('Fecha matrícula');?></div></th>
                            <!-- <th width="80"><div><?php echo ('Photo');?></div></th> -->
                            <th><div><?php echo ('Nombre');?></div></th>
                            
                            <th><div><?php echo ('Email');?></div></th>
                            <th><div><?php echo ('Emergencia');?></div></th>
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
                            <td><?php  echo date('d M,Y', $row['diamatricula']);?></td>
                            <!-- <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td> -->
                            <td ><div style="text-transform: uppercase !important;"><?php echo $row['name'];?>  <?php echo $row['lastname'];?></div></td>
                            <td><?php echo $row['address'];?></td>
                            <td><?php echo $row['email'];?></td>
                            
                                
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Acción <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!-- STUDENT PROFILE LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_profile/<?php echo $row['student_id'];?>');">
                                                <i class="entypo-user"></i>
                                                    <?php echo ('Perfil del estudiante');?>
                                                </a>
                                        </li>
                                        
                                        <!-- STUDENT EDITING LINK -->
                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_edit/<?php echo $row['student_id'];?>');">
                                                <i class="entypo-pencil"></i>
                                                    <?php echo ('Editar');?>
                                                </a>
                                        </li>
                                        <li class="divider"></li>
                                        
                                        <!-- STUDENT DELETION LINK -->
                                        <li>
                                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');">
                                                <i class="entypo-trash"></i>
                                                    <?php echo ('Eliminar');?>
                                                </a>
                                        </li>
                                    </ul>
                                </div>
                                
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
        

        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [
                    
                    {
                        "sExtends": "xls",
                        "mColumns": [1,2,3,4,5]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1,2,3,4,5]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"    : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(5, false);
                            
                            this.fnPrint( true, oConfig );
                            
                            window.print();
                            
                            $(window).keyup(function(e) {
                                  if (e.which == 27) {
                                      datatable.fnSetColumnVis(5, true);
                                  }
                            });
                        },
                        
                    },
                ]
            },
            
        });
        
        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
        
</script>

