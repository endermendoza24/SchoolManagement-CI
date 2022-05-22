<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
<style>
  #invoice_print{
      font-family:"Courier New";
  }
</style>

    <a onClick="PrintElem('#invoice_print')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Imprimir factura
        <i class="entypo-print"></i>
    </a>
</center>

    <br><br>

    <div  id="invoice_print">        
        <table class="tabla1" width="100%" border="0">
            <tr>
                <td style="color:red" align="center">
                <img src="assets/images/talk.png" alt="Logo de Talk"  style="width:15%; filter:sepia(1,5,2);"/>
                    <h4><b>Talk | Academia de idiomas <br> ¡Una alternativa diferente!</b></h4>
                    <h4>Del Am/Pm 3 1/2 cuadras al oeste. Jinotepe, Carazo</h4>
                    <!-- <h4>Autorización DGI: <?php $d=rand(1000,9999); echo $d; ?> - 7</h4> -->
                    <!-- <h4> N° <?php $d=rand(1000,9999); echo $d; ?> </h4> -->
                    <h4><?php echo ('N° de factura: ')?> <?php echo $row['invoice_id']?></h4>
                    <h4><?php echo ('N° de factura: ')?> <?php echo '00'.$row['num_factura']?></h4>

                    <h4>RUC: 0012305950022</h4>
                    <h4>Email: quierosaberdetalk@gmail.com</h4>
                    
                    <h5>Cualquier retraso en pago reportar dentro del <br> periodo de pago 10% de mora por cada 10 días de retraso</h5>
                    <h5 ><?php echo ('Fecha de recibo'); ?> : <?php echo date('d M Y, H:i', $row['creation_timestamp']);?></h5>
                    <!-- <h5 style="text-transform:capitalize;"><?php echo ('Titulo'); ?> : <?php echo $row['title'];?></h5>
                    <h5 style="text-transform:capitalize;"><?php echo ('Descripción'); ?> : <?php echo $row['description'];?></h5> -->
                    <!-- <h5 style="text-transform:capitalize;"><?php echo ('Estado'); ?> : <?php echo $row['status']; ?></h5> -->
                </td>
            </tr>
        </table>
        <hr style="border: 1px dashed grey;">
        
        <table class="tabla1" width="100%" border="0">    
            <tr>
                <td align="left"><h4><?php echo ('Paguese a:'); ?> </h4></td>
                <!-- <td align="center"><h4><?php echo ('De parte de: '); ?> </h4></td> -->
            </tr>

            <tr>
                <!-- Esto es la información de facturación del sistema -->
                <td align="left" valign="top">
                    <div style="text-transform:capitalize">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>                         

                    </div>

                    <h4><?php echo ('De parte de: '); ?> </h4>                    
                    <div style="text-transform:capitalize">
                    
                    <!-- DATOS PERSONALES -->
                     
                    <?php echo $this->db->get_where('invoice', array('invoice_id' => $row['invoice_id']))->row()->quienpaga; ?><br>
                    <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?><br>
                    <?php echo '' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->lastname; ?><br>
                    <?php echo 'Nivel: ' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->level; ?> 
                    <?php echo ' ' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->wave; ?><br>
                    <?php echo 'Direccion: ' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->address; ?><br>
                    </div>

                    <!-- FIN DE DATOS PERSONALES -->
                    <hr style="border:1px dashed grey">

                    <h4> <?php echo ('En concepto de: '); ?></h4>                                                        
                    <h4 style="color:grey;font-size:15px"><?php echo $row['title'];?> <?php echo $row['description'];?></h4>                    
                </td>
                <!-- Esto es la información de facturación del estudiante -->
                <td align="center" valign="top">
                    <!-- aqui estaba la informacion del estudiante antes de que la pasara a arriba -->
                </td>
            </tr>
        </table>
        <hr style="border: 1px dashed grey;">
        

        <table class="tabla3" width="100%" border="0">    
        
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
                                if ($row2['method'] == 3)
                                    echo ('Card');
                                if ($row2['method'] == 'paypal')
                                    echo 'Paypal';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody>
        </table> 
    </div>
<?php endforeach; ?>
 -->

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

</script>