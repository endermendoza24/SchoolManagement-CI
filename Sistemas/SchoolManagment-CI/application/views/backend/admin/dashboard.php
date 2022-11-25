<div class="row">
	
    
	<div class="col-md-12">
		<div class="row">
            
        <a href="index.php?admin/invoice">

                <div class="col-md-4">
                    
                    <div class="tile-stats tile-cyan">
                        <div class="icon"><i class="entypo-credit-card"></i></div>
                        <div class="num" data-start="0" data-end="<?php $query = $this->db->query('SELECT SUM(amount_paid)as total FROM invoice WHERE status = "paid"')->row(); echo floatval($query->total);?>" 
                                data-postfix="" data-duration="500" data-delay="0">0</div>
                        
                        <h3><?php echo ('Ganancias');?></h3>
                    
                    </div>
                    
                </div>
        </a>

            <div class="col-md-4">
            
                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-graduation-cap"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('student');?>" 
                    		data-postfix="" data-duration="1500" data-delay="0">0</div>
                    
                    <h3><?php echo ('Estudiantes');?></h3>
                    
                </div>
                
            </div>
            <div class="col-md-4">
            
                <a href="index.php?admin/teacher">
                    <div class="tile-stats tile-blue">
                        <div class="icon"><i class="entypo-users"></i></div>
                        <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('teacher');?>" 
                                data-postfix="" data-duration="800" data-delay="0">0</div>
                        
                        <h3><?php echo ('Maestros');?></h3>
                    </div>
                </a>
                
            </div>

            <div class="col-md-4">
            <a href="index.php?admin/manage_attendance">
                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-calendar"></i></div>
                    <?php 
							$check	=	array(	'date' => date('Y-m-d') , 'status' => '1' );
							$query = $this->db->get_where('attendance' , $check);
							$present_today		=	$query->num_rows();
						?>
                    <div class="num" data-start="0" data-end="<?php echo $present_today;?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3><?php echo ('Asistencia de hoy');?></h3>
                   
                </div>
            </a>
            </div>

            <!-- ausentes -->

            <div class="col-md-4">
            <a href="index.php?admin/manage_attendance">
            <div class="tile-stats tile-pink">
                <div class="icon"><i class="entypo-calendar"></i></div>
                <?php 
                        $check	=	array(	'date' => date('Y-m-d') , 'status' => '2' );
                        $query = $this->db->get_where('attendance' , $check);
                        $present_today		=	$query->num_rows();
                    ?>
                <div class="num" data-start="0" data-end="<?php echo $present_today;?>" 
                        data-postfix="" data-duration="500" data-delay="0">0</div>
                
                <h3><?php echo ('Inasistencia de hoy');?></h3>
               
            </div>
            </a>
        </div>


            <div class="col-md-4">
            <a href="index.php?admin/parent">
                <div class="tile-stats tile-purple">
                    <div class="icon"><i class="entypo-user"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('parent');?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3><?php echo ('Madres/Padres');?></h3>
                   
                </div>
            </a>
            </div>

            <div class="col-md-4">
            <a href="index.php?admin/section">
                <div class="tile-stats tile-black">
                    <div class="icon"><i class="entypo-flow-tree"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('class');?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3><?php echo ('Waves disponibles');?></h3>
                   
                </div>
            </a> 
            </div>

            <div class="col-md-4">
            
                <div class="tile-stats tile-brown">
                    <div class="icon"><i class="entypo-user"></i></div>
                    <div class="num" data-start="0" data-end="<?php $query = $this->db->query('SELECT * FROM invoice WHERE status = "unpaid"'); echo $query->num_rows();?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3><?php echo ('Ganancias sin pagar');?></h3>
                   
                </div>
                
            </div>

             <div class="col-md-4">
             <a href="index.php?admin/expense">
             <div class="tile-stats tile-yellow">
                        <div class="icon"><i class="entypo-credit-card"></i></div>
                        <div class="num" data-start="0" data-end="<?php $query = $this->db->query('SELECT SUM(amount)as total FROM payment WHERE payment_type = "Salida"')->row(); echo floatval($query->total);?>" 
                                data-postfix="" data-duration="500" data-delay="0">0</div>
                        
                        <h3><?php echo ('Gastos ');?></h3>
                    
                    </div>
             </a>
            </div>


            <div class="col-md-4">
            
                <!-- <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-alert"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('noticeboard');?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3><?php echo ('Notice');?></h3>
                   
                </div> -->
                
            </div> 
            
    	</div>
    </div>

    <div class="col-md-12">
    	<div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">    
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            <?php echo get_phrase('event_schedule');?>
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body">
                                <div id="notice_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</div>



    <script>
  $(document).ready(function() {
	  
	  var calendar = $('#notice_calendar');
				
				$('#notice_calendar').fullCalendar({
					header: {
						left: 'title',
						right: 'today prev,next'
					},
					
					//defaultView: 'basicWeek',
					
					editable: false,
					firstDay: 1,
					height: 530,
					droppable: false,
					
					events: [
						<?php 
						$notices	=	$this->db->get('noticeboard')->result_array();
						foreach($notices as $row):
						?>
						{
							title: "<?php echo $row['notice_title'];?>",
							start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
							end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>) 
						},
						<?php 
						endforeach
						?>
						
					]
				});
	});
  </script>

  
