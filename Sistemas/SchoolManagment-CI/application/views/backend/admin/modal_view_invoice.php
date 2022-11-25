<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
  <!-- funcion para convertir de  numeros a letras -->
  <?php 
  function convertirNumeroLetra($numero){
    $numf = milmillon($numero);
    return $numf." CÓRDOBAS";
}

function milmillon($nummierod){
  if ($nummierod >= 1000000000 && $nummierod <2000000000){
      $num_letrammd = "MIL ".(cienmillon($nummierod%1000000000));
  }
  if ($nummierod >= 2000000000 && $nummierod <10000000000){
      $num_letrammd = unidad(Floor($nummierod/1000000000))." MIL ".(cienmillon($nummierod%1000000000));
  }
  if ($nummierod < 1000000000)
      $num_letrammd = cienmillon($nummierod);
  
  return $num_letrammd;
}

function cienmillon($numcmeros){
  if ($numcmeros == 100000000)
      $num_letracms = "CIEN MILLONES";
  if ($numcmeros >= 100000000 && $numcmeros <1000000000){
      $num_letracms = centena(Floor($numcmeros/1000000))." MILLONES ".(millon($numcmeros%1000000));       
  }
  if ($numcmeros < 100000000)
      $num_letracms = decmillon($numcmeros);
  return $num_letracms;
}

function decmillon($numerodm){
  if ($numerodm == 10000000)
      $num_letradmm = "DIEZ MILLONES";
  if ($numerodm > 10000000 && $numerodm <20000000){
      $num_letradmm = decena(Floor($numerodm/1000000))."MILLONES ".(cienmiles($numerodm%1000000));        
  }
  if ($numerodm >= 20000000 && $numerodm <100000000){
      $num_letradmm = decena(Floor($numerodm/1000000))." MILLONES ".(millon($numerodm%1000000));      
  }
  if ($numerodm < 10000000)
      $num_letradmm = millon($numerodm);
  
  return $num_letradmm;
}

function millon($nummiero){
  if ($nummiero >= 1000000 && $nummiero <2000000){
      $num_letramm = "UN MILLON ".(cienmiles($nummiero%1000000));
  }
  if ($nummiero >= 2000000 && $nummiero <10000000){
      $num_letramm = unidad(Floor($nummiero/1000000))." MILLONES ".(cienmiles($nummiero%1000000));
  }
  if ($nummiero < 1000000)
      $num_letramm = cienmiles($nummiero);
  
  return $num_letramm;
}

function cienmiles($numcmero){
  if ($numcmero == 100000)
      $num_letracm = "CIEN MIL";
  if ($numcmero >= 100000 && $numcmero <1000000){
      $num_letracm = centena(Floor($numcmero/1000))." MIL ".(centena($numcmero%1000));        
  }
  if ($numcmero < 100000)
      $num_letracm = decmiles($numcmero);
  return $num_letracm;
}

function decmiles($numdmero){
  if ($numdmero == 10000)
      $numde = "DIEZ MIL";
  if ($numdmero > 10000 && $numdmero <20000){
      $numde = decena(Floor($numdmero/1000))."MIL ".(centena($numdmero%1000));        
  }
  if ($numdmero >= 20000 && $numdmero <100000){
      $numde = decena(Floor($numdmero/1000))." MIL ".(miles($numdmero%1000));     
  }       
  if ($numdmero < 10000)
      $numde = miles($numdmero);
  
  return $numde;
}

function miles($nummero){
  if ($nummero >= 1000 && $nummero < 2000){
      $numm = "MIL ".(centena($nummero%1000));
  }
  if ($nummero >= 2000 && $nummero <10000){
      $numm = unidad(Floor($nummero/1000))." MIL ".(centena($nummero%1000));
  }
  if ($nummero < 1000)
      $numm = centena($nummero);
  
  return $numm;
}

function centena($numc){
  if ($numc >= 100)
  {
      if ($numc >= 900 && $numc <= 999)
      {
          $numce = "NOVECIENTOS ";
          if ($numc > 900)
              $numce = $numce.(decena($numc - 900));
      }
      else if ($numc >= 800 && $numc <= 899)
      {
          $numce = "OCHOCIENTOS ";
          if ($numc > 800)
              $numce = $numce.(decena($numc - 800));
      }
      else if ($numc >= 700 && $numc <= 799)
      {
          $numce = "SETECIENTOS ";
          if ($numc > 700)
              $numce = $numce.(decena($numc - 700));
      }
      else if ($numc >= 600 && $numc <= 699)
      {
          $numce = "SEISCIENTOS ";
          if ($numc > 600)
              $numce = $numce.(decena($numc - 600));
      }
      else if ($numc >= 500 && $numc <= 599)
      {
          $numce = "QUINIENTOS ";
          if ($numc > 500)
              $numce = $numce.(decena($numc - 500));
      }
      else if ($numc >= 400 && $numc <= 499)
      {
          $numce = "CUATROCIENTOS ";
          if ($numc > 400)
              $numce = $numce.(decena($numc - 400));
      }
      else if ($numc >= 300 && $numc <= 399)
      {
          $numce = "TRESCIENTOS ";
          if ($numc > 300)
              $numce = $numce.(decena($numc - 300));
      }
      else if ($numc >= 200 && $numc <= 299)
      {
          $numce = "DOSCIENTOS ";
          if ($numc > 200)
              $numce = $numce.(decena($numc - 200));
      }
      else if ($numc >= 100 && $numc <= 199)
      {
          if ($numc == 100)
              $numce = "CIEN ";
          else
              $numce = "CIENTO ".(decena($numc - 100));
      }
  }
  else
      $numce = decena($numc);
  
  return $numce;  
}

function decena($numdero){
    
  if ($numdero >= 90 && $numdero <= 99)
  {
      $numd = "NOVENTA ";
      if ($numdero > 90)
          $numd = $numd."Y ".(unidad($numdero - 90));
  }
  else if ($numdero >= 80 && $numdero <= 89)
  {
      $numd = "OCHENTA ";
      if ($numdero > 80)
          $numd = $numd."Y ".(unidad($numdero - 80));
  }
  else if ($numdero >= 70 && $numdero <= 79)
  {
      $numd = "SETENTA ";
      if ($numdero > 70)
          $numd = $numd."Y ".(unidad($numdero - 70));
  }
  else if ($numdero >= 60 && $numdero <= 69)
  {
      $numd = "SESENTA ";
      if ($numdero > 60)
          $numd = $numd."Y ".(unidad($numdero - 60));
  }
  else if ($numdero >= 50 && $numdero <= 59)
  {
      $numd = "CINCUENTA ";
      if ($numdero > 50)
          $numd = $numd."Y ".(unidad($numdero - 50));
  }
  else if ($numdero >= 40 && $numdero <= 49)
  {
      $numd = "CUARENTA ";
      if ($numdero > 40)
          $numd = $numd."Y ".(unidad($numdero - 40));
  }
  else if ($numdero >= 30 && $numdero <= 39)
  {
      $numd = "TREINTA ";
      if ($numdero > 30)
          $numd = $numd."Y ".(unidad($numdero - 30));
  }
  else if ($numdero >= 20 && $numdero <= 29)
  {
      if ($numdero == 20)
          $numd = "VEINTE ";
      else
          $numd = "VEINTI".(unidad($numdero - 20));
  }
  else if ($numdero >= 10 && $numdero <= 19)
  {
      switch ($numdero){
      case 10:
      {
          $numd = "DIEZ ";
          break;
      }
      case 11:
      {               
          $numd = "ONCE ";
          break;
      }
      case 12:
      {
          $numd = "DOCE ";
          break;
      }
      case 13:
      {
          $numd = "TRECE ";
          break;
      }
      case 14:
      {
          $numd = "CATORCE ";
          break;
      }
      case 15:
      {
          $numd = "QUINCE ";
          break;
      }
      case 16:
      {
          $numd = "DIECISEIS ";
          break;
      }
      case 17:
      {
          $numd = "DIECISIETE ";
          break;
      }
      case 18:
      {
          $numd = "DIECIOCHO ";
          break;
      }
      case 19:
      {
          $numd = "DIECINUEVE ";
          break;
      }
      }   
  }
  else
      $numd = unidad($numdero);
return $numd;
}

function unidad($numuero){
  switch ($numuero)
  {
      case 9:
      {
          $numu = "NUEVE";
          break;
      }
      case 8:
      {
          $numu = "OCHO";
          break;
      }
      case 7:
      {
          $numu = "SIETE";
          break;
      }       
      case 6:
      {
          $numu = "SEIS";
          break;
      }       
      case 5:
      {
          $numu = "CINCO";
          break;
      }       
      case 4:
      {
          $numu = "CUATRO";
          break;
      }       
      case 3:
      {
          $numu = "TRES";
          break;
      }       
      case 2:
      {
          $numu = "DOS";
          break;
      }       
      case 1:
      {
          $numu = "UN";
          break;
      }       
      case 0:
      {
          $numu = "";
          break;
      }       
  }
  return $numu;   
}
  ?>
<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>

<center>
    <a onclick='printpage()' class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Imprimir recibo
        <i class="entypo-print"></i>
    </a>
    <a class="btn btn-default btn-icon icon-left  pull-left" a href="<?php echo base_url(); ?>index.php?admin/invoice">
        Volver a facturación
        <i class="entypo-back"></i>
    </a>

    <!-- <a onClick="PrintElem('#invoice_print')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Imprimir factura
        <i class="entypo-print"></i>
    </a> -->


    <!-- <button onclick="printpage()" class="btn btn-success btn-outline"><i class="entypo-print">Imprimir</i></button>
 <a href="<?php echo base_url(); ?>index.php?admin/invoice" class="btn btn-primary">Volver</a> -->
</center>

    <br><br>

    

<div class="invoice_print" id="invoice_print">

    <style>
      .invoice_print {
  font-family: consolas !important;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.invoice_print span {
  font-weight: 700;
  padding-top: 5px;
  text-transform: uppercase;
}
.invoice_print p {
  text-transform: uppercase;
}

.encabezadorecibo {
  display: grid;
  place-items: center;
  padding: 10px 5px;
}
.encabezadorecibo img {
  width: 15%;
  margin-bottom: 10px;
}
.cuerporecibo {
  padding: 10px 5px;
}
.invoice_print hr {
  border: dotted 2px #000;
}
.montos > div {
  padding: 5px 0;
}

.firma {
  padding: 10px 0;
}

/* estilos para la impresión de la factura */
@media print {
  .invoice_print {
    font-family: consolas !important;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    text-transform:uppercase;
  }

  .invoice_print span {
    font-weight: 700;
    padding-top: 5px;
    
  }
  .invoice_print p {
    text-transform: uppercase;
  }

  .encabezadorecibo {
    display: grid;
    place-items: center;
    padding: 10px 5px;
  }
  .encabezadorecibo span{    
    text-align: center;
    margin-bottom: 7px !important;
  }
  /* .encabezadorecibo img {
    width: 80%;
    margin-bottom: 10px;
  } */
  .cuerporecibo {
    padding: 10px 5px;
  }
  .invoice_print hr {
    border: dotted 30px #000 !important;
  }
  .montos > div {
    padding: 5px 0;
  }

  .firma {
    padding: 10px 0;
  }
 @page{
   margin: 0;
 }
}

    </style>
    
  <div class="encabezadorecibo">
<img src="assets/images/logoTalk.png" alt="Logo de Talk" style="width: 80%;;
    margin-bottom: 10px;"/>

    <span  class="titulo" translate="no">
      TALK | ACADEMIA DE IDIOMAS <br /><i>¡UNA ALTERNATIVA DIFERENTE!</i>
    </span>
    <span  class="direccion">
      DEL AM/PM 3 1/2 CUADRAS AL OESTE,<br> JINOTEPE, CARAZO.
    </span>
    <span  class="numfactura"><?php echo ('N° DE RECIBO: ')?> <?php echo $row['invoice_id']?></span>
    
    <span  class="ruc">RUC: 0012305950022</span>
    <span  class="email">EMAIL: quierosaberdetalk@gmail.com</span>
    <span style="text-transform:uppercase;"  class="advertencia">
      Cualquier retraso en pago reportar dentro del <br />
      periodo de pago 10% de mora por cada 10 días de retraso.
    </span>
    <span  style="text-transform:uppercase;" class="fecha"><?php echo ('Fecha de recibo'); ?> : <?php echo date('d/m/Y, H:i', $row['creation_timestamp']);?></span>
  </div>

  <hr style="border: dashed 1.2px #000 !important;" />
  <div  class="cuerporecibo">
    <div class="areapaguese">
      <span style="font-weight:bold;">PÁGUESE A:</span>
      <p style="text-transform:uppercase;"><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?></p>
      <p style="text-transform:uppercase;"><?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?></p>
      <p style="text-transform:uppercase;"><?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?></p>
    </div>

    <div class="departede">
      <span style="font-weight:bold;">DE PARTE DE:</span>
      <p style="text-transform:uppercase;" class="quienpaga"><?php echo $this->db->get_where('invoice', array('invoice_id' => $row['invoice_id']))->row()->quienpaga; ?></p>
      <p style="text-transform:uppercase;" class="nombre"><?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?></p>
      <p style="text-transform:uppercase;" class="apellido"><?php echo '' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->lastname; ?></p>
      <p style="text-transform:uppercase;" class="nivel"><?php echo '<span style:"font-weight:bold">Nivel: </style>' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->level; ?></p>
      <span style="text-transform:uppercase;" class=""><?php $claseEstudiante = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->class_id;?></span>
      <p style="text-transform:uppercase;" class="wave"><?php echo '<span style="font-weight:bold;">Wave: </span>'  . $this->crud_model->get_class_name($claseEstudiante);?></p>
      <p style="text-transform:uppercase;" class="direccion">
<?php echo '<span style="font-weight:bold; text-transform:uppercase">Dirección: </span>' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->address; ?>
      </p>
    </div>
    <hr style="border: dashed 1.2px #000 !important;" />
    <div class="concepto">
      <span style="font-weight:bold;">EN CONCEPTO DE:</span>
      <div style="padding: 5px 0; text-transform:uppercase;" class="conceptopago"><?php echo $row['title'];?> <?php echo $row['description'];?></div>
    </div>

    <div class="montos">
      <span style="font-weight:bold;">MONTO TOTAL EN NÚMEROS: </span>
      <div  class="montototal">C$ <?php echo $row['amount']; ?></div>
      <span style="font-weight:bold;">MONTO PAGADO:</span>
      <div class="montopagado">C$ <?php echo $row['amount_paid']; ?></div>
      
      <div class="montoletras">
     	<?php
            // $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
            // $n =  $row['amount_paid'];
            // $izquierda = intval(floor($n));
            // $derecha = intval(($n - floor($n)) * 100);
            // echo '<span style="font-weight:bold;">Monto en letras: </span><div style="text-transform:capitalize">' . $formatterES->format($izquierda) . " córdobas netos </div>";
            // //  esta seccion lo que hace es la de mostrar el monto pagado en numeros


            echo '<span style="font-weight:bold;">Monto en letras: </span><div>' . convertirNumeroLetra($row['amount_paid']) . '</div>';

        ?> 
      </div>
      
      <!-- baucher -->
      <?php if ($row['baucher'] != 0):?> <!--solo si el baucher existe se mostrara-->
            
                <span style="font-weight:bold;"><?php echo ('BÁUCHER N°'); ?>:</span> 
                <div style="text-transform:uppercase;"><?php echo $row['baucher']; ?></div>
            
            <?php endif;?>
      <!-- baucherEnd-->
      
      <!-- deuda pendiente-->
      <?php if ($row['due'] != 0):?>           
                <span style="font-weight:bold; text-transform:uppercase"><?php echo ('SALDO PENDIENTE'); ?>:</span>
                <div> C$ <?php echo $row['due']; ?></div>            
            <?php endif;?>
      <!-- deudaEnd-->
      
      <!-- area de metodo de pago -->
      <?php if ($row['metodopago'] == 1):?>            
                <span style="font-weight:bold;"><?php echo ('MÉTODO PAGO:'); ?></span>           
                <div><?php echo ('Efectivo'); ?></div>           
            <?php endif;?>
           
            <?php if ($row['metodopago'] == 2):?>            
                <span style="font-weight:bold;"><?php echo ('MÉTODO PAGO:'); ?></span>     
                <div><?php echo ('Transferencia'); ?></div>                  
            <?php endif;?>
      <!-- areaEnd -->

       <!-- observaciones-->
       <?php if ($row['payment_details']!= '') :?>           
                <br><span style="font-weight:bold;"><?php echo ('OBSERVACIONES'); ?>:</span>
                <div style="text-transform: uppercase;"><?php echo $row['payment_details']; ?></div>            
            <?php endif;?>
      <!-- observacionesEND-->          
    </div>
    <hr style="border: dashed 1.2px #000 !important;" />
    <div class="firma">
      <span style="font-weight:bold;">FIRMA:</span>
      <div class="firmaraya">______________________</div>
    </div>
  </div>
</div>

<?php endforeach; ?>

<script type="text/javascript">
function printpage(){
  let newstr = document.getElementById("invoice_print").innerHTML;
  let oldstr = document.body.innerHTML;
  document.body.innerHTML = newstr;
  window.print();
  document.body.innerHTML = oldstr;
  return false;
}

</script>
</body>
</html>