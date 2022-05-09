<?php
$student_info	=	$this->crud_model->get_student_info($param2);
foreach($student_info as $row):?>

<center>
    <a onClick="PrintElem('#printArea')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Print profile
        <i class="entypo-print"></i>
    </a>
</center>

<div id="profile" class="profile-env">
	
	<header class="row">
		
		<div class="col-sm-3">
			
			<a href="#" class="profile-picture">
				<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" 
                	class="img-responsive img-circle" />
			</a>
			
		</div>
		
		<div class="col-sm-9">
			
			<ul class="profile-info-sections">
				<li style="padding:0px; margin:0px;">
					<div class="profile-name">
							<h3><?php echo $row['name'];?></h3>
					</div>
				</li>
			</ul>
			
		</div>
		
		
	</header>
	
	<section class="profile-info-tabs">
		
		<div class="row">
			
			<div class="">
            		<br>
                <table class="table table-bordered table-hover table-striped">
                
                    <?php if($row['class_id'] != ''):?>
                    <tr>
                        <td>Class</td>
                        <td><b><?php echo $this->crud_model->get_class_name($row['class_id']);?></b></td>
                    </tr>
                    <?php endif;?>

                    <?php if($row['section_id'] != '' && $row['section_id'] != 0):?>
                    <tr>
                        <td>Section</td>
                        <td><b><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['diamatricula'] != ''):?>
                    <tr>
                        <td>Dia matricula</td>
                        <!-- <td><b><?php echo $row['diamatricula'];?></b></td> -->
                        <td><b><?php echo date('d M,Y', $row['diamatricula']);?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['birthday'] != ''):?>
                    <tr>
                        <td>Birthday</td>
                        <td><b><?php echo $row['birthday'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['sex'] != ''):?>
                    <tr>
                        <td>Gender</td>
                        <td><b><?php echo $row['sex'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                
                    <?php if($row['phone'] != ''):?>
                    <tr>
                        <td>Phone</td>
                        <td><b><?php echo $row['phone'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['email'] != ''):?>
                    <tr>
                        <td>Email</td>
                        <td><b><?php echo $row['email'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['address'] != ''):?>
                    <tr>
                        <td>Address</td>
                        <td><b><?php echo $row['address'];?></b>
                        </td>
                    </tr>
                    <?php endif;?>
                    <?php if($row['parent_id'] != ''):?>
                    <tr>
                        <td>Parent</td>
                        <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->name;?></b></td>
                    </tr>
                    <tr>
                        <td>Parent Phone</td>
                        <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->phone;?></b></td>
                    </tr>
                    <?php endif;?>
                    
                </table>
                <i class="print">
                
			</div>
		</div>		
	</section>
	
	
	
</div>


<div class="printArea" id="printArea">
    <div class="containerarea">
    
    <table width="100%" border="0">
        <tr>
            <td align="center">
            <img src="assets/images/talk.png" alt="Logo de Talk"  style="width:40%;"/>
    

    <h4><b>Talk academia de idiomas <br> ¡Una alternativa diferente!</b></h4>
                    <h4>Al lado del MEFFCA, Jinotepe</h4>
                    <h4>Reporte de matricula</h4>

            </td>
        </tr>
        <tr>
            <td align="left">
            <div id="studentSection" class="student-section">
                <h3 style="text-transform:capitalize">Nombre: <?php echo $row['name'];?></h3>
                <h3 style="text-transform:capitalize">Apellido: <?php echo $row['lastname'];?></h3>
                <h3>Teléfono <?php echo $row['phone'];?></h3>
                <h3 >Dirección <?php echo $row['address'];?></h3>
                <h4> Clase: <?php echo $this->crud_model->get_class_name($row['class_id']);?></h4>
                <h4><?php  echo 'Fecha de matricula:  ' . date('d M, Y H:i', $row['diamatricula']);?></h4>
            </div>            
            </td>
            </tr>
        
    </table>
    <!-- <div class="tablainformacion">
                    <div>Wave</div>
                    <div>Horario</div>
                    <div>Nivel</div>
                    <div>Fecha de inicio</div>
                    <div>Docente a cargo</div>
                    <div>Firma de quien recibe</div>
    </div> -->


    <table class="demo" border="1px solid #000">
	
	
	<tbody>
	<tr>
		<td>1</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>2</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>3</td>
		<td></td>
		<td></td>
	</tr>
	<tbody>
</table>
    
    

    </div>
</div>

<style>
   
   .tablainformacion{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        margin:0 auto;
    }
    .tablainformacion div{
        width:100%; 
        color:#000;       
        border:1px solid #000;
        padding-bottom:20px;
    }
    
</style>


<?php endforeach;?>


<script type="text/javascript">


    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'Profile', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Profile</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>