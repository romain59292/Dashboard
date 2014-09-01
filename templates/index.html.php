            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                              <div class="inner-container">
                                <div class="inner">
                                    <h3><?php echo $aInscriptions['oops-ws-2.1.x']['NB_REGISTERDOMAINS_LAST_1_HOUR_OK']; ?></h3>
                                    <p>Cloud Pro</p>
                                </div>
                                <div class="inner">
                                    <h3><?php echo $aInscriptions['oopro-ws-g3r3cx']['NB_REGISTERDOMAINS_LAST_1_HOUR_OK']; ?></h3>
                                    <p>OOPro</p>
                                </div>
                              </div>
                              <div class="icon"><i class="ion ion-bag"></i></div>
                              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner-container">
                                <div class="inner">
                                    <h3><?php echo $aPercentAvailability['oops-ws-2.2.x']; ?><sup style="font-size: 20px">%</sup></h3>
                                    <p>Cloud Pro</p>
                                </div>
                                <div class="inner">
                                    <h3><?php echo $aPercentAvailability['oopro-ws-g3r3cx']; ?><sup style="font-size: 20px">%</sup></h3>
                                    <p>OOPro</p>
                                </div>
                              </div>
                              <div class="icon"><i class="ion ion-stats-bars"></i></div>
                              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
<!--
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon"><i class="ion ion-pie-graph"></i></div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
-->
                    <div class="row">
                      <?php if (true === $bHasAlerts): ?>
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                          <th>Service</th>
                                          <th style="width: 10px">Nombre</th>
                                          <th>Erreur</th>
                                        </tr>
                                        <?php foreach ($aInscriptions as $who => $value): ?>
                                          <?php foreach ($value as $k => $v): ?>
                                            <?php if (preg_match("/_KO$/", $k) && $v > 0): ?>
                                              <tr class="bg-red">
                                                <td><?php echo $who; ?></td>
                                                <td><?php echo $v; ?></td>
                                                <td><?php echo $k; ?></td>
                                              </tr>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                      </div>
                    <?php else: ?>
                      <br />
                    <?php endif; ?>
                  </div>
 
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">                          
                            <!-- Calendar -->
                            <div class="box box-solid bg-green-gradient">
                                <div class="box-header">
                                    <i class="fa fa-calendar"></i>
                                    <h3 class="box-title">Migration hors de Domino</h3>
                                    <a id="callModal" href="#compose-modal"><img id="add_migration" src="img/Utilities/migration.ico" alt="icone"></a>
                                </div><!-- /.box-header -->
                                <div class="box-footer text-black">
                                    <div class="col-sm-13   ">
                                        <div class="clearfix">
                                          <big class="pull-left">Avancement total</big>
                                          <big class="pull-right"><?php echo $iAverage ?> %</big>
                                        </div>
                                        <div class="progress xs">
                                            <?php if($iAverage < '33') :?>

                                              <div class="progress-bar progress-bar-red" style="width: <?php echo $iAverage ?>%;"></div>  

                                            <?php elseif($iAverage > '67') : ?>

                                              <div class="progress-bar progress-bar-green" style="width: <?php echo $iAverage ?>%;"></div>  

                                            <?php else : ?>
                                               <div class="progress-bar progress-bar-yellow" style="width: <?php echo $iAverage ?>%;"></div>  
                                            <?php endif; ?> 
                                        </div>   
                                     </div><!-- /.row --> 
                                     <hr>
                                    <div class="row">  
                                        <!-- Progress bars -->
                                        <?php foreach ($aMigrations as $sMigration): ?>
                                            <div class="col-sm-6">
                                                    <div class="clearfix">
                                                      <span class="pull-left">
                                                        <a  id="callModal" href="#compose-modal" data-lot = "<?php echo $sMigration->lot; ?>" data-percent = "<?php echo $sMigration->percent; ?>" data-id = "<?php echo $sMigration->id; ?>"><?php echo $sMigration->lot; ?></a>
                                                      </span>
                                                      <small class="pull-right"><?php echo $sMigration->percent; ?> %</small>
                                                    </div>
                                                    <div class="progress xs">
                                                        <?php if($sMigration->percent < '33') :?>
                                 
                                                          <div class="progress-bar progress-bar-red" style="width: <?php echo $sMigration->percent ?>%;"></div>  
                                       
                                                        <?php elseif($sMigration->percent > '67') : ?>
                                                  
                                                          <div class="progress-bar progress-bar-green" style="width: <?php echo $sMigration->percent ?>%;"></div>  
                                                     
                                                        <?php else : ?>
                                                           <div class="progress-bar progress-bar-yellow" style="width: <?php echo $sMigration->percent ?>%;"></div>  
                                                        <?php endif; ?> 
                                                    </div>   
                                             </div><!-- /.row -->   
                                        <?php endforeach; ?>                                                                     
                                    </div>
                                </div><!-- /.box -->     
                            </div>
<!--
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">To Do List</h3>
                                    <div class="box-tools pull-right">
                                        <ul class="pagination pagination-sm inline">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <ul class="todo-list">
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Design a nice theme</span>
                                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Make the theme responsive</span>
                                            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Check your messages and notifications</span>
                                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <input type="checkbox" value="" name=""/>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                                </div>
                            </div>
-->
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable"> 

                            <!-- solid sales graph -->
                            <div class="box box-solid bg-yellow-gradient">
                                <div class="box-header">
                                    <i class="fa fa-th"></i>
                                    <h3 class="box-title">Nombre de requ&ecirc;tes</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn bg-yellow btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn bg-yellow btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body border-radius-none">
                                    <div class="chart" id="line-chart" style="height: 250px;"></div>                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->                            


                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


        <!-- COMPOSE MESSAGE MODAL -->
        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i>  Informations de la migration</h4>
                    </div>
                    <form action="#" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">LOT :</span>
                                    <input name="field-lot" type="text" class="form-control" placeholder="Nom du lot" id="field-lot" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">POURCENTAGE:</span>
                                    <input name="field-percent" type="number" class="form-control" placeholder="Pourcentage avancement" id="field-percent" max="100">
                                    <input name="field-id" type="number" id="field-id">
                                </div>
                            </div>
                            <div class="modal-footer clearfix">

                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>   Annuler</button>

                                <button type="submit" class="btn btn-primary pull-left" ><i class="fa fa-envelope"></i>   Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



<script type="text/javascript">
    $('#field-id').hide()
</script>

<script type="text/javascript">
$(function() {
  new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        <?php echo $sDataGraph; ?>
      ],
      lineColors: ['red', 'purple', 'green'],
      xkey: 'y',
      ykeys: ['oops-ws-2.2.x', 'oops-ws-2.1.x', 'oopro-ws-g3r3cx'],
      labels: ['Oops 2.2.x', 'oops-ws-2.1.x', 'FullAPI'],
      lineWidth: 2,
      hideHover: 'auto',
      gridTextColor: "#fff",
      gridStrokeWidth: 0.4,
      pointSize: 4,
      pointStrokeColors: ["#efefef"],
      gridLineColor: "#efefef",
      gridTextFamily: "Open Sans",
      gridTextSize: 10
  });
});
</script>

<script type="text/javascript">
    $(document).on("click", "#callModal", function (e) {
	e.preventDefault();

	var _self = $(this);

	var myBookId = _self.data('id');
	$("#field-id").val(myBookId);
        
	var myBookId = _self.data('lot');
	$("#field-lot").val(myBookId);
        
	var myBookId = _self.data('percent');
	$("#field-percent").val(myBookId);
        
	$(_self.attr('href')).modal('show');
});
</script>

