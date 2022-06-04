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
$student_info	=	$this->crud_model->get_student_info($param2);
foreach($student_info as $row):?>




<center>
    <a onclick='printpage()' class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Imprimir perfil
        <i class="entypo-print"></i>
    </a>

    <!-- <input type="button" value="Imprimir" onclick='printpage()'/> -->

</center>

<div id="profile" class="profile-env">
	
	<header class="row">
		
		<div class="col-sm-3">
			
			<!-- <a href="#" class="profile-picture">
				<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" 
                	class="img-responsive img-circle" />
			</a> -->
			<!-- <img src="assets/images/logoTalk.png" width="80%" alt="logo talk"> -->
		</div>
		
		<div class="col-sm-9">
			
			<ul class="profile-info-sections">
				<li style="padding:0px; margin:0px;">
					<div class="profile-name">
							<h3 style="text-transform:capitalize; font-weight:bold; font-size:25px"><?php echo $row['name'] . ' ' . $row['lastname'];?></h3>
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
                        <td>Wave</td>
                        <td><b><?php echo $this->crud_model->get_class_name($row['class_id']);?></b></td>
                    </tr>
                    <?php endif;?>

                    <!-- <?php if($row['section_id'] != '' && $row['section_id'] != 0):?>
                    <tr>
                        <td>Wave</td>
                        <td><b><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?></b></td>
                    </tr>
                    <?php endif;?> -->

                    <?php if($row['level'] != ''):?>
                    <tr>
                        <td>Nivel</td>
                        <td><b><?php echo $row['level'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['diamatricula'] != ''):?>
                    <tr>
                        <td>Día de matrícula</td>
                        <!-- <td><b><?php echo $row['diamatricula'];?></b></td> -->
                        <td><b><?php echo date('d M,Y', $row['diamatricula']);?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['birthday'] != ''):?>
                    <tr>
                        <td>Cumpleaños</td>
                        <td><b><?php echo $row['birthday'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['sex'] != ''):?>
                    <tr>
                        <td>Género</td>
                        <td><b><?php echo $row['sex'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                
                    <?php if($row['phone'] != ''):?>
                    <tr>
                        <td>Teléfono</td>
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
                        <td>Dirección</td>
                        <td><b><?php echo $row['address'];?></b>
                        </td>
                    </tr>
                    <?php endif;?>
                    <?php if($row['parent_id'] != ''):?>
                    <tr>
                        <td>Madre/Padre</td>
                        <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->name;?></b></td>
                    </tr>
                    <tr>
                        <td>Teléfono madre/Padre</td>
                        <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->phone;?></b></td>
                    </tr>
                    <?php endif;?>
                    <?php if($row['nombreemergencia'] != ''):?>
                    <tr>
                        <td>Nombre de contacto de emergencia</td>
                        <td><b><?php echo $row['nombreemergencia'];?>  <?php echo $row['apellidoemergencia'];?></b>
                        </td>
                    </tr>
                    <?php endif;?>
                    <?php if($row['telefonoemergencia'] != ''):?>
                    <tr>
                        <td>Contacto de emergencia</td>
                        <td><b><?php echo $row['telefonoemergencia'];?></b>
                        </td>
                    </tr>
                    <?php endif;?>
                    
                </table>
                <i class="print">
                
			</div>
		</div>		
	</section>
	
	
	
</div>



<div class="printarea" id="printArea">
  <section class="headercontainer">
    <div class="encabezados">
      <h4 class="titulos">
        Ficha | Información de estudiantes <br />
        Talk | Academia de idiomas <br />
        <i>"Una alternativa diferente"</i>
      </h4>
      <p class="informacion1">
        El prresente documento compila información personal de toda persona
        natural o jurídica que desea inscribirse a los cursos ofertados en Talk
        | Academia de idiomas.
      </p>
    </div>
    <div class="encabezadoimagen">
      <img src="assets/images/imagentalk.png" alt="Imagen Talk | Academia de idiomas" />
    </div>
  </section>
  <!-- cuadrito abajo de la imagen -->
  <div class="cuadrito">
    <p>
      <strong>Importante: </strong>Lea las instrucciones que aparecen al reverso
      de este documento antes de completar esta fórmula. Recuerde firmar en el
      lugar correspondiente.
    </p>
  </div>

 
<section class="datos">
  <section class="nombreestudiante">
    <h4>1.  Nombre completo del cursante</h4>

    <div class="rayasnombre">
      <div class="nombre">
        <span style="text-transform:capitalize ;"><?php echo $row['name']?></span>
        <div class="rayanombre"></div>
        <h5>Nombres</h5>
      </div>

      <div class="apellido primerapellido">
        <span style="text-transform:capitalize ;"><?php echo $row['lastname']?></span>
        <div class="rayanombre"></div>
        <h5>Apellidos</h5>
      </div>

      <div class="apellido segundoapellido">
        <span><?php echo $row['address']?></span>
        <div class="rayanombre"></div>        
        <h5>Dirección</h5>
      </div>     
  </section>

  <section class="documentoidentidad">
    <h4>2.  Documento de identidad</h4>
    <div class="rayascedula">
      <div class="cedula">
        <span style="text-transform:uppercase;"><?php echo $row['identdocument'] . ' - ' . $row['tipo_documento']?></span>
        <div class="raya"></div>
        <h5>Documento de identidad</h5>
        <!-- <p>Cédula</p> -->
      </div>

      <!-- <div class="cedula">
        <div class="raya"></div>
        <p>041-240500-1004P</p>
      </div> -->

      <div class="naci">
        <span><?php echo $row['birthday']?></span>
        <div class="raya"></div>
        <h5>Fecha de nacimiento</h5>
        <!-- <p>24 / 05 / 2000</p> -->
      </div>

      <div class="sexo">
        <span><?php echo $row['sex']?></span>
        <div class="raya"></div>
        <h5>Sexo</h5>
        <!-- <p>Masculino</p> -->
      </div>

      <div class="nacionalidad">
        <span style="text-transform:capitalize;"><?php echo $row['nationality']?></span>
        <div class="raya"></div>
        <h5>Nacionalidad</h5>
        <!-- <p>Nicaragüense</p> -->
      </div>
    </div>




  
  </section>

  <!-- emergencias -->
  <section class="emergencias">
    <h4>3. Contactos</h4>

    <div class="emergenciarayas">
      <div class="numerotel">
        <span><?php echo $row['phone']?></span>
        <div class="raya"></div>
        <h5>Número personal / WhatsApp</h5>
        
      </div>

      <div class="direccion">
        <span><?php echo $row['direccionemergencia']?></span>
        <div class="raya"></div>
        <h5>Dirección</h5>
        <!-- <p>24 / 05 / 2000</p> -->
      </div>

      <div class="emer">
        <span><?php echo $row['nombremergencia'] .' ' . $row['apellidoemergencia'] ?></span>
        <div class="raya"></div>
        <h5>En caso de emergencias llamar a: </h5>
        <!-- <p>Masculino</p> -->
      </div>

      <div class="parentesco">
        <span style="text-transform:capitalize;"><?php if($row['relacionemergencia']==1) {echo 'Familiar';}else if($row['relacionemergencia']==2)
        {echo 'Amigos';}else if($row['relacionemergencia'] == 3) {echo 'Otra';}else {echo '';}?></span>
        <div class="raya"></div>
        <h5>Parentesco:</h5>
        <!-- <p>Nicaragüense</p> -->
      </div>

      <div class="telefo">
        <span><?php $row['telefonoemergencia']?></span>
        <div class="raya"></div>
        <h5>Teléfono/WhatsApp </h5>
        <!-- <p>Nicaragüense</p> -->
      </div>
     
    </div>
    
  </section>

  <section class="direccionr">
    <div class="textodir">
      Dirección de residencia actual (Si vive en una residencia diferente a la cédula).
    </div>
    <div class="espaciodir">

    </div>
  </section>

  <h5>Declaro bajo juramento que la información proporcionada en este documento es verdadera.</h5>

  <section class="juramento">
    
    <div class="rayasjuramento">
      <div class="">
        <span style="text-transform:capitalize;"><?php echo $row['name'] . ' ' . $row['lastname']?></span>
        <div class="raya"></div>
        <h5>Nombre y apellido</h5>
      </div>

      <div class=" ">
        <span><?php echo date('d/m/Y', $row['diamatricula'])?></span>
        <div class="raya"></div>
        <h5>Fecha de inscripción</h5>
      </div>

      <div class=" ">
        <span></span>
        <div class="raya"></div>        
        <h5>Firma</h5>
      </div>     
  </section>

  <!-- cuadro -->

  <section class="cuadro">
    <div>
      <h5>Wave</h5>
    </div>
    <div>
      <h5>Horario</h5>
    </div>
    <div>
      <h5>Nivel</h5>
    </div>
    <div>
      <h5>Fecha de inicio</h5>
    </div>
    <div>
      <h5>Docente a cargo</h5>
    </div>
    <div>
      <h5>Firma de quien recibe</h5>
    </div>
  </section>
  <h4 style="text-align:center;"><i>¡Gracias por participar de esta alternativa diferente!</i></h4>
</section>

<style>
  .printarea {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
  }
  .headercontainer {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    /* border: 2px solid #000; */
    padding: 15px;
  }
  .encabezadoimagen {
    /* border: 2px solid #000; */
    display: flex;
    justify-content: end;
  }
  .encabezadoimagen img {
    width: 35%;
  }
  
  .cuadrito {
    margin-top: 5px;
    padding: 5px;
    border: 2px solid #000;
    display:none;
  }
  
  .datos {
    padding: 0 10px;
  }
  /*Nombre completo del cursante*/
  div > span {
    padding-left: 15px;
  }
  
  .nombreestudiante {
    width: 100%;
  }
  
  .rayasnombre {
    margin-top: 20px;
    display: flex;
  }
  .rayasnombre div {
    margin-left: 10px;
  }
  .rayasnombre h5 {
    text-align: center;
  }
  .nombre,
  .apellido {
    width: 100%;
  }
  .rayanombre {
    width: 100%;
    border-bottom: 2px solid #000;
  }
  /*documento de identidad*/
  .documentoidentidad {
    width: 100%;
  }
  .rayascedula {
    margin-top: 20px;
    display: flex;
  }
  .rayascedula h5 {
    text-align: center;
  }
  .raya {
    width: 100%;
    border-bottom: 2px solid #000;
  }
  .sexo,
  .naci,
  .cedula,
  .nacionalidad {
    width: 100%;
    margin-left: 10px;
  }
  /**Contacto**/
  .emergencias {
    width: 100%;
  }
  .emergenciarayas {
    margin-top: 20px;
    display: flex;
  }
  
  .emergenciarayas h5 {
    text-align: center;
  }
  .emergencias .emergenciarayas > div {
    width: 100%;
    margin-left: 10px;
  }
  /*direccion r*/
  .direccionr {
    width: 100%;
    height: 50px;
    display: flex;
    flex-direction: row;
  }
  .direccionr div {
    border: #000 solid 2px;
  }
  .direccionr .espaciodir {
    width: 100%;
  }
  .direccionr .textodir {
    padding: 10px;
    
  }
  /*Juaremtno*/
  .juramento {
    width: 100%;
  }
  .rayasjuramento {
    margin-top: 10px;
    display: flex;
  }
  .rayasjuramento h5 {
    text-align: center;
  }
  .juramento .rayasjuramento > div {
    width: 100%;
    margin-left: 10px;
  }
  
  /*cuadro*/
  
  .cuadro {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
  }
  
  .cuadro > div {
    width: 100%;
    height: 50px;
    border: solid 2px #000;
  }
  .cuadro h5 {
    padding-left: 5px;
  }
  .imagespublicidad{

    display: flex;
    justify-content: center;
    gap: 10px;
  }
  .imagespublicidad div {
    width: 70px;
    height: 40px;
    
  }
 
  .imagespublicidad div img{
    object-fit: contain;
    width: 70px !important;
    height: 40px !important;
  }
  .imagespublicidad .ultimasimagen{
    object-fit: cover;
  }
/* 
  @media print{
    .printarea{
      height: 100%;
      margin: 0 !important;
      padding: 0 !important;
      overflow: hidden;
    }
  } */
  
  
  </style>

  <section class="imagespublicidad">
    <div><img src="https://i.ibb.co/SBwXWMR/reporte1.png" alt="reporte1"></div>
    <div><img src="https://i.ibb.co/rvwq96C/imagentalk.png" alt="imagentalk"></div>
    <div><img src="https://i.ibb.co/41y908M/reporte2.png" alt="reporte2"></div>
    <div><img src="https://i.ibb.co/svhrJzS/reporte3.png" alt="reporte3"></div>
    <div><img src="https://i.ibb.co/6Z1KBgM/reporte4.png" alt="reporte4"></div>
    <div class="ultimasimagen"><img src="https://i.ibb.co/pZBm4hh/report5.png" alt="report5"></div>
    <div class="ultimasimagen"><img src="https://i.ibb.co/7pF9dbb/report6.jpg" alt="report6"></div>
  
  </section>
  
</div>


<?php endforeach;?>


<script type="text/javascript">
function printpage(){
  let newstr = document.getElementById("printArea").innerHTML;
  let oldstr = document.body.innerHTML;
  document.body.innerHTML = newstr;
  window.print();
  document.body.innerHTML = oldstr;
  return false;
}

</script>

</body>
</html>