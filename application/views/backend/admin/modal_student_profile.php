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
    <a class="btn btn-default btn-icon icon-left  pull-left" onclick="location.reload()">
        Volver 
        <i class="entypo-back"></i>
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

<!-- perfil de impresion --> 
<div class="printarea" id="printArea">
  <link rel="stylesheet" href="./assets/css/estilos.css">
      <section class="headercontainer">
        <div class="encabezadoimagen">
          <img src="assets/images/imagentalk.png" alt="Imagen Talk | Academia de idiomas" />
        </div>

        <div class="encabezados">
          <h4 class="titulos">
            <p class="talka" translate="no">
             <b> Talk | Academia de idiomas</b><br /> 
             <i>"Una alternativa diferente"</i></p>             
            </p>
            <p>Ficha de información de estudiantes.</p>
          </h4>
          <p translate="no" class="informacion1">
            El presente documento compila información personal de toda persona
            natural o jurídica <br>que está inscrita en alguno de los cursos
            ofertados en Talk | Academia de idiomas.
          </p>
        </div>
      </section>

      <section class="datos">
          <h4>1. Datos del cursante</h4>
         <div class="primerosdatos">
            <div class="personales apellido">
                <p>Apellidos: <div class="interno"><?php echo $row['lastname']?></div> </p>
            </div>
            <div class="personales nombres">
              <p>Nombres: <div class="interno"><?php echo $row['name']?></div> </p>
          </div>
          
         </div>

         <div class="primerosdatos">
            <div class="personales carnet">
            <p>N° de carné: <div><?php echo strftime('%y', strtotime($row['diamatricula'])) . $row['student_id'];?></div></p>
            </div>
            <div class="personales direccion">
                <p>Dirección: <div><?php echo $row['address']?></div> </p>
            </div>
         </div>
      </section>
      <hr style="border:dotted 1px #000">
      <section class="identidad">
        <h4>2. Datos de identidad</h4>
       <div class="primerosdatos">
          <div class="personales">
              <p>N° de cédula: <div class="interno"><?php echo $row['identdocument'] . ' - ' . $row['tipo_documento']?></div> </p>
          </div>
          <div class="personales">
            <p>Fecha de nacimiento: <div class="interno"><?php echo $row['birthday']?></div> </p>
        </div>
        
       </div>

       <div class="primerosdatos">
          <div class="personales ">
              <p>Sexo: <div class="interno"><?php echo $row['sex']?></div></p>
          </div>
          <div class="personales">
              <p>Nacionalidad: <div class="interno"> <?php echo $row['nationality']?></div> </p>
          </div>
          <div class="personales">
            <p>N° personal WhatsApp: <div class="interno"><?php echo $row['phone']?></div> </p>
        </div>
       </div>
    </section>
    <hr style="border:dotted 1px #000">
    <section class="contactos">
        <h4>3. Contactos de emergencia</h4>
       <div class="primerosdatos">
         
          <div class="personales">
            <p> Dirección contacto: <div class="interno"><?php echo $row['direccionemergencia']?></div> </p>
        </div>
        <div class="personales ">
            <p>En caso de emergencias llamar a: <div class="interno"><?php echo $row['nombreemergencia'] .' ' . $row['apellidoemergencia'] ?></div></p>
        </div>
        
       </div>

       <div class="primerosdatos">
         
          <div class="personales">
              <p>Parentesco: <div class="interno"><?php if($row['relacionemergencia']==1) {echo 'Familiar';}else if($row['relacionemergencia']==2)
        {echo 'Amigos';}else if($row['relacionemergencia'] == 3) {echo 'Otra';}else {echo '';}?></div> </p>
          </div>
          <div class="personales">
            <p>Teléfono: <div class="interno"><?php echo $row['telefonoemergencia'];?></div> </p>
        </div>
       </div>
    </section>
    <hr style="border:dotted 1px #000">
    <section class="academicos">
        <h4>4. Datos académicos</h4>
       <div class="primerosdatos">
          <div class="personales">
              <p>Wave: <div class="interno"><?php echo $this->crud_model->get_class_name($row['class_id']);?></div> </p>
          </div>
          <div class="personales">
            <p>Nivel CEFR: <div class="interno">A1<?php $row['nivel']?></div> </p>
        </div>
        
       </div>

       <div class="primerosdatos">
          <div class="personales ">
              <p>Día de matrícula: <div class="interno"><?php echo date('d/m/Y', $row['diamatricula'])?></div></p>
          </div>    
       </div>
    </section>

   <style>
.printarea { 
  box-sizing: border-box;
  font-family: Arial, sans-serif;
  font-size: 10pt;
}
.headercontainer {
  width: 100%;
  margin-bottom: 15px;
  display: flex;
  flex-direction: column;
  text-align: center;
  font-size: 10pt;
  font-family: Arial;
  /* border: 1px solid #000; */
}
h4 {
  font-size: 11pt;
}
.encabezadoimagen {
  width: 100%;
  display: flex;
  justify-content: center;
}
.encabezadoimagen img {
  width: 16%;
}
.primerosdatos {
  font-family: Arial, Helvetica, sans-serif;
  display: grid;
  /* margin-top: 10px; */
  grid-template-columns: 1fr 1fr;
}

.primerosdatos > div {
  /* border: 1px solid #000; */
  margin: 6px 0;
}
.primerosdatos div > div {
  display: inline;
}
.primerosdatos div p {
  /*esos son los encabezados*/
  display: inline;
  font-weight: 700;
}
.interno {
  text-transform: capitalize;
}

/* .identidad,
.contactos,
.academicos,
.datos {
 
  border: 0.5px solid #000;
 
} */
.imagespublicidad {
  display: flex;
  justify-content: center;
  gap: 10px;

  margin-top: 180px;
}
.imagespublicidad div {
  width: 100px;
  height: 60px;
}

.imagespublicidad div img {
  object-fit: contain;
  width: 70px !important;
  height: 40px !important;
}
.imagespublicidad .ultimasimagen {
  object-fit: cover;
}

@media print{
  .printarea {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 10pt;
}
.headercontainer {
  width: 95%;
  margin: 15px auto 0;
  display: flex;
  flex-direction: column;
  text-align: center;
  font-size: 10pt;
  font-family: Arial;
  /* border: 1px solid red; */
}
h4 {
  font-size: 11pt;
}
.encabezadoimagen {
  width: 100%;
  display: flex;
  justify-content: center;
}
.encabezadoimagen img {
  width: 10%;
}
.primerosdatos {
  font-family: Arial, Helvetica, sans-serif;
  display: grid;
  /* margin-top: 10px; */
  grid-template-columns: 1fr 1fr;
}
.titulos .talka{
  font-size: 10pt;
  text-align: center;
  font-family: Arial;
}
.titulos p{
  font-size: 10pt;
  font-family: Arial;
}
/* .primerosdatos > div {
  /* border: 1px solid #000; */
  /*margin: 6px 0;
} */
.primerosdatos div > div {
  display: inline;
}
.primerosdatos div p {
  /*esos son los encabezados*/
  display: inline;
  font-weight: 700;
}
.interno {
  text-transform: capitalize;
}

.identidad,
.contactos,
.academicos,
.datos {
 text-align: justify;
  /* border: 0.5px solid #000; */
  width: 95%;
  margin: 0 auto;
 padding: 5px;
}
.imagespublicidad {
  display: flex;
  justify-content: center;
  margin: 20px auto 0;
  width: 95%;
  /* border:1px solid red; */
}
.imagespublicidad div {
  width: 90px;
  height: 50px;
  
}

.imagespublicidad div img {
  object-fit: contain;
  width: 90px !important;
  height: 50px !important;
  
  /* border: solid blue 1px; */
  
}
.imagespublicidad .ultimasimagen {
  object-fit: cover;
}

}
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
<!-- fin del perfil de impresion -->






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