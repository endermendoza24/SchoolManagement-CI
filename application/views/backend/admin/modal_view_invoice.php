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
  text-transform: capitalize;
}
.invoice_print p {
  text-transform: capitalize;
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
  }

  .invoice_print span {
    font-weight: 700;
    padding-top: 5px;
    
  }
  .invoice_print p {
    text-transform: capitalize;
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
      Talk | Academia de idiomas <br /><i>¡Una alternativa diferente!</i>
    </span>
    <span  class="direccion">
      Del Am/Pm 3 1/2 cuadras al oeste,<br> Jinotepe, Carazo.
    </span>
    <span  class="numfactura"><?php echo ('N° de recibo: ')?> <?php echo $row['invoice_id']?></span>
    <!-- <span class="numfactura"><?php echo ('N° de recibo: ')?> <?php echo $row['num_factura']?></span> -->
    <span  class="ruc">RUC: 0012305950022</span>
    <span  class="email">Email: quierosaberdetalk@gmail.com</span>
    <span  class="advertencia">
      Cualquier retraso en pago reportar dentro del <br />
      periodo de pago 10% de mora por cada 10 días de retraso.
    </span>
    <span  class="fecha"><?php echo ('Fecha de recibo'); ?> : <?php echo date('d/m/Y, H:i', $row['creation_timestamp']);?></span>
  </div>

  <hr style="border: dashed 1.2px #000 !important;" />
  <div  class="cuerporecibo">
    <div class="areapaguese">
      <span style="font-weight:bold;">Paguese a:</span>
      <p><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?></p>
      <p><?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?></p>
      <p><?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?></p>
    </div>

    <div class="departede">
      <span style="font-weight:bold;">De parte de:</span>
      <p class="quienpaga"><?php echo $this->db->get_where('invoice', array('invoice_id' => $row['invoice_id']))->row()->quienpaga; ?></p>
      <p class="nombre"><?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?></p>
      <p class="apellido"><?php echo '' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->lastname; ?></p>
      <p class="nivel"><?php echo '<span style:"font-weight:bold">Nivel: </style>' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->level; ?></p>
      <span class=""><?php $claseEstudiante = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->class_id;?></span>
      <p class="wave"><?php echo '<span style="font-weight:bold;">Wave: </span>'  . $this->crud_model->get_class_name($claseEstudiante);?></p>
      <p class="direccion">
<?php echo '<span style="font-weight:bold;">Dirección: </span>' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->address; ?>
      </p>
    </div>
    <hr style="border: dashed 1.2px #000 !important;" />
    <div class="concepto">
      <span style="font-weight:bold;">En concepto de:</span>
      <div style="padding: 5px 0" class="conceptopago"><?php echo $row['title'];?> <?php echo $row['description'];?></div>
    </div>

    <div class="montos">
      <span style="font-weight:bold;">Monto total en números: </span>
      <div class="montototal">C$ <?php echo $row['amount']; ?></div>
      <span style="font-weight:bold;">Monto pagado:</span>
      <div class="montopagado">C$ <?php echo $row['amount_paid']; ?></div>
      
      <div class="montoletras">
     	<?php
            $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
            $n =  $row['amount_paid'];
            $izquierda = intval(floor($n));
            $derecha = intval(($n - floor($n)) * 100);
            echo '<span style="font-weight:bold;">Monto en letras: </span><div style="text-transform:capitalize">' . $formatterES->format($izquierda) . " córdobas netos </div>";
            //  esta seccion lo que hace es la de mostrar el monto pagado en numeros


        ?> 
      </div>
      
      <!-- baucher -->
      <?php if ($row['baucher'] != 0):?> <!--solo si el baucher existe se mostrara-->
            
                <span style="font-weight:bold;"><?php echo ('Baucher N°'); ?>:</span> 
                <div><?php echo $row['baucher']; ?></div>
            
            <?php endif;?>
      <!-- baucherEnd-->
      
      <!-- deuda pendiente-->
      <?php if ($row['due'] != 0):?>           
                <span style="font-weight:bold;"><?php echo ('Saldo pendiente'); ?>:</span>
                <div> C$ <?php echo $row['due']; ?></div>            
            <?php endif;?>
      <!-- deudaEnd-->
      
      <!-- area de metodo de pago -->
      <?php if ($row['metodopago'] == 1):?>            
                <span style="font-weight:bold;"><?php echo ('Método pago:'); ?></span>           
                <div><?php echo ('Efectivo'); ?></div>           
            <?php endif;?>
           
            <?php if ($row['metodopago'] == 2):?>            
                <span style="font-weight:bold;"><?php echo ('Método pago:'); ?></span>     
                <div><?php echo ('Transferencia'); ?></div>                  
            <?php endif;?>
      <!-- areaEnd -->

       <!-- observaciones-->
       <?php if ($row['payment_details']!= '') :?>           
                <br><span style="font-weight:bold;"><?php echo ('Observaciones'); ?>:</span>
                <div style="text-transform: uppercase;"><?php echo $row['payment_details']; ?></div>            
            <?php endif;?>
      <!-- observacionesEND-->          
    </div>
    <hr style="border: dashed 1.2px #000 !important;" />
    <div class="firma">
      <span style="font-weight:bold;">Firma:</span>
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