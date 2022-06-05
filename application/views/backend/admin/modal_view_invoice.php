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

    <div  id="invoice_print" class="invoice_print">
    <style>

            /* .invoice_print, h4, .table{
                font-family:'Courier New', Consolas, ubuntu;
                font-size: 20pt;
            } */
            @media print{
                table{
                    border: none;
                    outline: none;
                }
                * { -webkit-print-color-adjust: exact; }


                    /* @page {size: A5} */
                .invoice_print, h4, .table{
                font-family:'Courier New', Consolas, ubuntu;
                font-size: 20pt;
            }
            h4{
                font-weight: bold;
            }
            }
        </style>
        <table class="table" width="100%" border="0">
            <tr>
                <td style="" align="center">
                <img src="assets/images/logoTalk.png" alt="Logo de Talk"  style="width:20%;"/>
                    <h4><b>Talk | Academia de idiomas <br> ¡Una alternativa diferente!</b></h4>
                    <h4>Del Am/Pm 3 1/2 cuadras al oeste. Jinotepe, Carazo</h4>
                    <!-- <h4>Autorización DGI: <?php $d=rand(1000,9999); echo $d; ?> - 7</h4> -->
                    <!-- <h4> N° <?php $d=rand(1000,9999); echo $d; ?> </h4> -->
                    <h4><?php echo ('N° de factura: ')?> <?php echo $row['invoice_id']?></h4>
                    <!-- <h4><?php echo ('N° de factura: ')?> <?php echo '00'.$row['num_factura']?></h4> -->

                    <h4>RUC: 0012305950022</h4>
                    <h4>Email: quierosaberdetalk@gmail.com</h4>

                    <h4>Cualquier retraso en pago reportar dentro del <br> periodo de pago 10% de mora por cada 10 días de retraso</h4>
                    <h4 ><?php echo ('Fecha de recibo'); ?> : <?php echo date('d/m/Y, H:i', $row['creation_timestamp']);?></h4>
                    <!-- <h5 style="text-transform:capitalize;"><?php echo ('Titulo'); ?> : <?php echo $row['title'];?></h5>
                    <h5 style="text-transform:capitalize;"><?php echo ('Descripción'); ?> : <?php echo $row['description'];?></h5> -->
                    <!-- <h5 style="text-transform:capitalize;"><?php echo ('Estado'); ?> : <?php echo $row['status']; ?></h5> -->
                </td>
            </tr>
        </table>
        <hr style="border: 1px dashed grey;">

        <table class="table" width="100%" border="0">
            <tr>
                <td align="left"><h4><?php echo ('Paguese a:'); ?> </h4></td>
                <!-- <td align="center"><h4><?php echo ('De parte de: '); ?> </h4></td> -->
            </tr>

            <tr>
                <!-- Esto es la información de facturación del sistema -->
                <td align="left" align="top">
                    <div style="text-transform:capitalize">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>

                    </div>

                    <h4><?php echo ('De parte de: '); ?> </h4>
                    <div style="text-transform:capitalize">

                    <!-- DATOS PERSONALES -->

                    <span class="table"><?php echo $this->db->get_where('invoice', array('invoice_id' => $row['invoice_id']))->row()->quienpaga; ?><br></span>
                    <span class="table"><?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?><br></span>
                    <span class="table"><?php echo '' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->lastname; ?><br></span>
                    <span class="table"><?php echo 'Nivel: ' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->level; ?> <br></span>
                    <span class="table"><?php $claseEstudiante = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->class_id;?></span>
                    <span class="table"><?php echo 'Wave: '  . $this->crud_model->get_class_name($claseEstudiante);?><br></span>
                    <span class="table"><?php echo 'Direccion: ' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->address; ?><br></span>
                    </div>

                    <!-- FIN DE DATOS PERSONALES -->
                    <hr style="border:1px dashed grey">

                    <h4> <?php echo ('En concepto de: '); ?></h4>
                    <h4 style=""><?php echo $row['title'];?> <?php echo $row['description'];?></h4>
                </td>
                <!-- Esto es la información de facturación del estudiante -->
                <td align="center" valign="top">
                    <!-- aqui estaba la informacion del estudiante antes de que la pasara a arriba -->
                </td>
            </tr>
        </table>
        <hr style="border: 1px dashed grey;">


        <table class="table" width="100%" border="0">

            <tr>
                <td align="left" width="80%"><h4><?php echo ('Monto total en números: '); ?>: C$ <?php echo $row['amount']; ?></h4></td>
            </tr>

            <tr>
                <td align="left" width="80%"><h4><?php echo ('Monto pagado '); ?>: C$ <?php echo $row['amount_paid']; ?></h4>
         <h4>
         <div style="text-transform:capitalize">
        <?php
            $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
            $n =  $row['amount_paid'];
            $izquierda = intval(floor($n));
            $derecha = intval(($n - floor($n)) * 100);
            echo 'Monto en letras: ' . $formatterES->format($izquierda) . " córdobas netos ";
            //  esta seccion lo que hace es la de mostrar el monto pagado en numeros


        ?>
       <?php if ($row['baucher'] != 0):?> <!--solo si el baucher existe se mostrara-->
            <tr>
                <td align="left" width="80%"><h4><?php echo ('Baucher N°'); ?>: <?php echo $row['baucher']; ?></h4></td>
            </tr>
            <?php endif;?>
    </h4>
        </div>
            </td>
            </tr>
            <h4>
            <?php if ($row['due'] != 0):?>
            <tr>
                <td align="left" width="80%"><h4><?php echo ('Saldo pendiente'); ?>: C$ <?php echo $row['due']; ?></h4></td>
            </tr>
            <?php endif;?>
            </h4>


            <h4>
            <?php if ($row['metodopago'] == 1):?>
            <tr>
                <td align="left" width="80%"><h4><?php echo ('Método pago: Efectivo'); ?></h4></td>
            </tr>
            <?php endif;?>
            </h4>
            <h4>
            <?php if ($row['metodopago'] == 2):?>
            <tr>
                <td align="left" width="80%"><h4><?php echo ('Método pago: Transferencia bancaria'); ?></h4></td>
            </tr>
            <?php endif;?>
            </h4>



        </table>

        <hr style="border: 1px dashed grey;">

        <!-- payment history -->
        <!-- <h4><?php echo ('Payment History'); ?></h4> -->
      <!-- <table class="table table-bordered table-hover" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><?php echo ('Date'); ?></th>
                    <th><?php echo ('Amount'); ?></th>
                    <th><?php echo ('Method'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_history = $this->db->get_where('payment', array('invoice_id' => $row['invoice_id']))->result_array();
                foreach ($payment_history as $row2):
                    ?>
                    <tr>
                        <td><?php echo date("d M, Y", $row2['timestamp']); ?></td>
                        <td>$<?php echo $row2['amount']; ?></td>
                        <td>
                            <?php
                                if ($row2['method'] == 1)
                                    echo ('Cash');
                                if ($row2['method'] == 2)
                                    echo ('Cheque');

                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody>
        </table>-->
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


<!-- 
<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'Factura', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Factura</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script> -->
</body>
</html>