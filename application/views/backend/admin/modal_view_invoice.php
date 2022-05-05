<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
<center>
    <a onClick="PrintElem('#invoice_print')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Print Invoice
        <i class="entypo-print"></i>
    </a>
</center>

    <br><br>

    <div id="invoice_print">        
        <table width="100%" border="0">
            <tr>
                <td align="center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjVFV9N_wDckwxARrhqJNd_fDuhQOdC5BZnxFwRu84Z8f3zKfePZHSjt--SesFIXDQvu8&usqp=CAU" alt="Imagen de Talk"  style="width:20%;"/>
                    <h4><b>Talk academia de idiomas <br> ¡Una alternativa diferente!</b></h4>
                    <h4>Al lado del MEFFCA, Jinotepe</h4>
                    <h4>Autorización DGI: <?php $d=rand(1000,9999); echo $d; ?> - 7</h4>
                    <h4> N° <?php $d=rand(1000,9999); echo $d; ?> </h4>

                    <h4>RUC: 0012305950022</h4>
                    <h4>Email: quierosaberdetalk@gmail.com</h4>
                    <h6>Cualquier retraso en pago reportar dentro del <br> periodo de pago 10% de mora por cada 10 días de retraso</h6>
                    <h5 style="text-transform:capitalize;"><?php echo ('Fecha de recibo'); ?> : <?php echo date('d M,Y', $row['creation_timestamp']);?></h5>
                    <h5 style="text-transform:capitalize;"><?php echo ('Titulo'); ?> : <?php echo $row['title'];?></h5>
                    <h5 style="text-transform:capitalize;"><?php echo ('Descripción'); ?> : <?php echo $row['description'];?></h5>
                    <!-- <h5 style="text-transform:capitalize;"><?php echo ('Estado'); ?> : <?php echo $row['status']; ?></h5> -->
                </td>
            </tr>
        </table>
        <hr style="border: 1px dashed #000;">
        <table width="100%" border="0">    
            <tr>
                <td align="left"><h4><?php echo ('Paguese a:'); ?> </h4></td>
                <!-- <td align="center"><h4><?php echo ('De parte de: '); ?> </h4></td> -->
            </tr>

            <tr>
                <!-- Esto es la información de facturación del sistema -->
                <td align="left" valign="top">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>                         


                    <h4><?php echo ('De parte de: '); ?> </h4>
                    <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?><br>
                    <?php 
                        $class_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->class_id;
                        echo ('Class') . ' ' . $this->db->get_where('class', array('class_id' => $class_id))->row()->name;
                    ?><br>
                    <?php echo 'Direccion ' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->address; ?><br>
                </td>
                <!-- Esto es la información de facturación del estudiante -->
                <td align="center" valign="top">
                    <!-- aqui estaba la informacion del estudiante antes de que la pasara a arriba -->
                </td>
            </tr>
        </table>
        <hr>

        <table width="100%" border="0">    
            <tr>
                <td align="left" width="80%"><?php echo ('Monto'); ?> : $<?php echo $row['amount']; ?></td>                
            </tr>
            <tr>
                <td align="left" width="80%"><h4><?php echo ('Monto total'); ?> : $<?php echo $row['amount_paid']; ?></h4></td>                
            </tr>
            <?php if ($row['due'] != 0):?>
            <tr>
                <td align="left" width="80%"><h4><?php echo ('Due'); ?> : $<?php echo $row['due']; ?></h4></td>                
            </tr>
            <?php endif;?>
        </table>

        <hr style="border: 1px dashed #000;">

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
        </table> -->
    </div>
<?php endforeach; ?>


<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice</title>');
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