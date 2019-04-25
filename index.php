<?php require_once 'build/php/common.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo EGS_TITLE; ?> | Consumer oriented metrics for the Ethereum gas market </title>

    <meta name="keywords" content="Ethereum ETH gas blockchain market price transactions miners users">
    <meta name="description" content="<?php echo EGS_DESCRIPTION; ?>">
    
    <meta property="og:title" content="<?php echo EGS_TITLE; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="images/ETHGasStation.png" />
    <meta property="og:url" content="https://<?php echo EGS_HOSTNAME; ?>" />


    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Custom Theme Style -->

     <?php include 'build/php/data_py.php'; ?>

    <script type="text/javascript" src="speedometer/xcanvas.js"></script>
    <script type="text/javascript" src="speedometer/tbe.js"></script>

    <script type="text/javascript" src="speedometer/digitaldisplay.js"></script>
    <script type="text/javascript" src="speedometer/speedometer.js"></script>
    <script type="text/javascript" src="speedometer/themes/default.js"></script>
    <script type="text/javascript" src="speedometer/controls.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="build/css/custom.css?d=7" rel="stylesheet">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134672026-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		
		gtag('config', 'UA-134672026-1');
	</script>

  </head>

  <body class="nav-md">
  <?php include 'unofficial.php'; ?>
    <div class="container body">
      <div class="main_container">
      <?php include 'sidebar.php'; ?>
        <!-- top navigation starts -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="social_link">
                    <a href="https://discord.gg/mzDxADE" target="_blank">
                      <img class="social_icon" src="/images/discord.svg"></a>
                </li>

                <li class="social_link">
                    <a href="https://twitter.com/ethgasstation" target="_blank"><img class="social_icon" src="/images/twitter.svg"></a>
                </li>
                
                <li class="dropdown">
                  <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-globe"></i><span style="color:#768399"> Change Currency</span>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li id="usd"><a href="#"> USD<?php if($currency=='usd'){echo'<span class="pull-right"><i class="fa fa-check"></i></span>';}?></a></li>
                    <li id="eur"><a href="#"> EUR<?php if($currency=='eur'){echo'<span class="pull-right"><i class="fa fa-check"></i></span>';}?></a></li>
                    <li id="gbp"><a href="#"> GBP<?php if($currency=='gbp'){echo'<span class="pull-right"><i class="fa fa-check"></i></span>';}?></a></li>
                    <li id="cny"><a href="#"> CNY<?php if($currency=='cny'){echo'<span class="pull-right"><i class="fa fa-check"></i></span>';}?></a></li>
                  </ul>
                </li>

              <p class="navbar-text navbar-left" style="padding-left: 5px"><strong><?php echo "Estimates over last 1,500 blocks - Last update: Block <span style = 'color:#1ABB9C'> $latestblock" ?></strong></span>  
              </p>
            </ul>
            </nav>
          </div>
         </div>
        <!-- /top navigation ends -->

        <!-- page content starts -->
        <div class="right_col" role="main">
          <!-- top tiles start -->
            <div class="row tile_count">
              <div class="rgp">
                <h2 class="top_tiles_title">Recommended Gas Prices in Gwei</h2>
                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                  <div class="count fast">
                    <?php echo ($gpRecs2['fast']/10) ?>
                  </div>
                  <div class="text-container">
                    <div class="count_top">fast (<2m)</div>
                    <div class="count_top">
                      <?php $fee = round($gpRecs2['fast']*21000/1e9*$exchangeRate/10, 3); echo($currString . $fee . '/transfer'); ?>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                  <div class="count standard">
                    <?php echo ($gpRecs2['average']/10) ?>
                  </div>
                  <div class="text-container">
                    <div class="count_top">standard (<5m)</div>
                    <div class="count_top">
                      <?php $fee = round($gpRecs2['average']*21000/1e9*$exchangeRate/10, 3); echo($currString . $fee . '/transfer'); ?>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                  <div class="count safe_low" id="medTx">
                    <?php echo ($gpRecs2['safeLow']/10) ?>
                  </div>
                  <div class="text-container">
                    <div class="count_top">safe low (<30m)</div>
                    <div class="count_top">
                      <?php $fee = round($gpRecs2['safeLow']*21000/1e9*$exchangeRate/10, 3); echo($currString . $fee . '/transfer'); ?>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mwt">
                <h2 class="top_tiles_title">Median Wait Times</h2>
                <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
                  <div class="count"><?php echo (round($medianwaitsec)) ?></div>
                  <div class="text-container">
                    <div class="count_top">seconds</div>
                  </div>
                </div>
                 <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
                  <div class="count">
                    <?php echo "$medianwaitblock" ?>
                  </div>
                  <div class="text-container">
                    <div class="count_top">blocks</div>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles end -->

          <!-- 2nd row starts -->
            <div class="row table_row">
              <!-- Gas Price Estimator starts -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <div class="x_panel tile table_cell">
                     <div class="x_title">
                        <h4 class="gas_estimator_title">Gas-Time-Price Estimator: <small>For transactions sent at block: <?php echo($gpRecs2['blockNum']);?></small></h4>
                        <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                      <p>Adjust confirmation time</p>
                      <div id="slider" class="positionable" ></div>
                      </br>
                      </br>
                      <form class="form-horizontal form-label-left input_mask gas_estimator_form">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Avg Time (min)</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="number" class="form-control" readonly = "readonly" placeholder= <?php echo ($predictTable[$avgRef]['expectedTime']); ?> id="timeToConfirm"> 
                          </div>
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Gas Used<span class="required">*</span></label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="number" class="form-control" value="21000" id="gas_used">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">95% Time (min)</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="number" class="form-control" readonly = "readonly" placeholder= <?php echo round(($predictTable[$avgRef]['expectedTime']*2.5),2); ?> id="maxTimeToConfirm"> 
                          </div>
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Avg Time (blocks)</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="number" class="form-control" readonly = "readonly" placeholder= <?php echo ($predictTable[$avgRef]['expectedWait']); ?> id="blocksToConfirm"> 
                          </div>
                          
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Gas Price (Gwei)<span class="required">*</span></label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="number" class="form-control" readonly = "readonly" value=<?php echo ($gpRecs2['average']/10)?> id="gasPrice">
                          </div>
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">95% Time (blocks)</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="number" class="form-control" readonly = "readonly" placeholder= <?php echo ($predictTable[$avgRef]['expectedWait']*2.5); ?> id="maxBlocksToConfirm"> 
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tx Fee (Fiat)</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" class="form-control" readonly = "readonly" placeholder= <?php $fee = round($gpRecs2['average']*21000/1e10*$exchangeRate, 3); echo($currString . $fee); ?> id="fiatFee"> 
                          </div> 
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tx Fee (ETH)</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="number" class="form-control" readonly = "readonly" placeholder = <?php $fee = $gpRecs2['average']*21000/1e10; echo (number_format($fee, 5)); ?> id="ethFee"> 
                          </div>  
                        </div>
                      </form>
                      <div class="clearfix"></div>
                  </div>
                </div>
                </div>
              <!-- Gas Price Estimator ends -->

              <!-- blogpost starts -->
                <div class="col-md-4 col-sm-4 col-xs-12 table-cell">
                  <div class="x_panel tile table_cell">
                    <div class="x_title blog_header">
                      <p>EGS Blog</p>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="blogPost">
                     <?php require('./blogPost.php'); ?>
                    </div>
                  </div>
                </div>
              <!--/blogpost ends -->
            </div>
          <!-- 2nd row ends -->

          <!-- 3rd row starts -->
            <div class="row table_row">
              <!-- Transactions by Gas Price -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="x_panel tile table_cell">
                    <div class="x_title">
                      <h4>Transaction Count by Gas Price</h4>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content myBar">
                      <canvas id="mybarChart2" height="210" width="300"></canvas>
                    </div>
                  </div>
                </div>
              <!-- /Transaction by Gas Price -->

              <!-- Confirmation Time by Gas Price -->
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel tile table_cell overflow_hidden">
                      <div class="x_title">
                        <h4>Confirmation Time by Gas Price</h4>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content myBar">
                              <canvas id="mybarChart" height="210" width="300"> </canvas>
                        </div>
                    </div>
                  </div>
              <!-- Confirmation Time by Gas Price -->

              <!-- Speedometer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="x_panel tile table_cell">
                    <div class="x_title">
                      <h4>Real Time Gas Use: <small> Block Limit (last 10)</small></h4>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content sMeter">
                        <div id="speedometer" class="speedometer"></div>
                        <p id="blockNum">Last Block: </p> 
                    </div>
                  </div>
                </div>
              <!--/Speedometer -->
              <div class="clearfix"></div>
            </div>
          <!-- 3rd row ends -->

          <!-- 4th row starts -->
            <div class="row table_row">
              <!-- Miner Rankings -->
                <div class="col-md-8 col-sm-12 col-xs-12">
                  <div class="x_panel tile table_cell top_miners">
                    <div class="x_title">
                      <h4>Top 10 Miners by Blocks Mined</h4>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="table table_data table-bordered">
                          <thead>
                            <tr>
                              <th>Miner</th>
                              <th>Lowest gas price (gwei)</th>
                              <th>Weighted avg gas price (gwei)</th>
                              <th>% of total blocks</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                          $minerNames = array(
        '0xea674fdde714fd979de3edf0f56aa9716b898ec8'=>'Ethermine',
        '0x1e9939daaad6924ad004c2560e90804164900341'=>'ethfans',
        '0xb2930b35844a230f00e51431acae96fe543a0347'=>'miningpoolhub',
        '0x4bb96091ee9d802ed039c4d1a5f6216f90f81b01'=>'Ethpool',
        '0x52bc44d5378309ee2abf1539bf71de1b7d7be3b5'=>'Nanopool',
        '0x2a65aca4d5fc5b5c859090a6c34d164135398226'=>'Dwarfpool',
        '0x829bd824b016326a401d083b33d092293333a830'=>'f2pool',
        '0xa42af2c70d316684e57aefcc6e393fecb1c7e84e'=>'Coinotron',
        '0x6c7f03ddfdd8a37ca267c88630a4fee958591de0'=>'alpereum'

                          );
                          foreach ($topMiners as $row){
                            echo('<tr>');
                            if(array_key_exists ($row['miner'],$minerNames)){
                            $row['miner'] = $minerNames[$row['miner']];}
                            echo("<td>". $row['miner']. "</td>");
                            echo("<td>". $row['minGasPrice']. "</td>");
                            echo("<td>". round($row['avgGasPrice']). "</td>");
                            echo("<td>". round($row['pctTot']). "</td>");

                            echo('</tr>');

                          }
                          ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              <!-- /miner rankings -->
              <!-- Misc Transaction Table -->
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel tile table_cell">
                      <div class="x_content">
                        <table class="table table_data table-bordered">
                            <thead>
                              <tr>
                                <th>Category</th>
                                <th>Value</th>
                              </tr>
                            </thead>
                            <tbody> 
                              <tr>
                                <td>Cheapest Gas Price (gwei)</td>
                                <td><?php echo ($gaspricelow);?></td>
                              </tr>
                              <tr>
                                <td>Highest Gas Price (gwei)</td>
                                <td><?php echo '<a href="https://etherscan.io/tx/' .$dearestgpID.'"';echo "target=\"_blank\">$gaspricehigh</a>";?></td>
                              </tr>
                              <tr>
                                <td>Median Gas Price (gwei)</td>
                                <td><?php echo ($gaspricemedian);?></td>
                              </tr>
                              <tr>
                                <td>Cheapest Transfer Fee</td>
                                <td id="cheapestTransfer"><?php echo '<a href="https://etherscan.io/tx/' .$cheapestTxId.'"'; echo "target=\"_blank\">$cheapestTxDisplay</a>";?></td>
                          
                              </tr>
                              <tr>
                                <td>Highest Transfer Fee</td>
                                <td><?php echo '<a href="https://etherscan.io/tx/' .$dearestTxId.'"'."target=\"_blank\">$dearestTxDisplay</a>"?></td>
                                
                              </tr>
                              <tr>
                                <td>Total Transactions</td>
                                <td><?php echo "$totTx";?></td>
                              </tr>
                              <tr>
                                <td>% Empty Blocks</td>
                                <td><?php echo "$percentEmpty";?></td>
                              </tr>
                              <tr>
                                <td>% Full Blocks</td>
                                <td><?php echo ($percentFull);?></td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
              <!-- /misc transactions -->
            </div>
          <!-- 4th row ends -->
        </div>           
      <!-- /page content ends -->

      <!-- footer content -->
        <footer>
          <div class='eth_footer_links'>
            <a href="https://docs.ethgasstation.info" target="_blank">API</a>
            <a href="https://ethgasstation.info/feedback.html" target="_blank">Feedback</a>
            <a href="https://twitter.com/ethgasstation" target="_blank">Twitter</a>
            <a href="https://discord.gg/mzDxADE" target="_blank">Discord</a>
          </div>
       
          <div class="concourse_link"><a href="https://concourseopen.com" target="_blank">Concourse Open Construction</a></div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
    </div>

 <!-- jQuery -->
   <!-- <script src="vendors/jquery/dist/jquery.min.js"></script> -->
 <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    

<!-- Custom Theme Scripts -->
    <script>

    var exchangeRate = <?php echo ($exchangeRate) ?>;
    var currSymbol = "<?php echo ($currString) ?>"

    $(document).ready(function(){
      $.ajax({
        url: "json/predictTable.json",
		    method: "GET",
        dataType: "json",
		    success: function(data) {
          predictArray = data;
        }
      })
    })

      $( "#slider" ).slider({
        value: <?php echo($avgRef) ?>,
        min: <?php echo($minRef) ?>,
        max: <?php echo($fastestRef) ?>,
        step: 1,
        slide: function(event, ui){
          $("#gasPrice").val(predictArray[ui.value]['gasprice']);
          $("#timeToConfirm").val(predictArray[ui.value]['expectedTime']);
          $("#blocksToConfirm").val(predictArray[ui.value]['expectedWait']);
          var maxtime = Math.round(predictArray[ui.value]['expectedTime']*2.5)
          $("#maxTimeToConfirm").val(maxtime);
          var maxblocks = Math.round(predictArray[ui.value]['expectedWait']*2.5)
          $("#maxBlocksToConfirm").val(maxblocks);
          var fiatFee = Math.round(exchangeRate * $("#gasPrice").val() * $("#gas_used").val()/ 1e9 *1000)/1000;
          fiatString = currSymbol+fiatFee;
          var ethFee = Math.round($("#gasPrice").val() * $("#gas_used").val()/ 1e9 *100000)/100000;
          $("#fiatFee").val(fiatString);
          $("#ethFee").val(ethFee);

        }
      });

      $("#gas_used").change(function(){
        var fiatFee = Math.round(exchangeRate * $("#gasPrice").val() * $("#gas_used").val()/ 1e9 *1000)/1000;
        fiatString = currSymbol+fiatFee;
        var ethFee = Math.round($("#gasPrice").val() * $("#gas_used").val()/ 1e9 *100000)/100000;
        $("#fiatFee").val(fiatString);
        $("#ethFee").val(ethFee);
      })
  
  



    //Data for Transaction Count by Gas Price Graph

        if ($('#mybarChart2').length ){ 
			  
			  var ctx = document.getElementById("mybarChart2");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: ["≤1", "1≤4", "4≤20", "20≤50", ">50"],
				  datasets: [{
                    label: "Percent of transactions",  
					backgroundColor: "#26B99A",
					data: <?php echo '[' . $cat1TxPct. ',' . $cat2TxPct . ',' . $cat3TxPct . ',' . $cat4TxPct . ','. $cat5TxPct .']'; ?>
				  }], 
				},

				options: {
                    legend: {
                        display: false
                    },
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  },
						scaleLabel:{
							display:true,
							labelString:"% of transactions"
						}
					}],
					xAxes:[{
						scaleLabel:{
							display:true,
							labelString:"Gas price category"
						}

					}]
				  }
				}
			  });
        }

        //Data for Confirmation Time by Gas Price Graph

        if ($('#mybarChart').length ){ 
			  
			  var ctx = document.getElementById("mybarChart");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: [<?php echo($priceWaitLabels);?>],
				  datasets: [{
					label: 'Median Time to Confirm',
					backgroundColor: "#26B99A",
					data: [<?php echo($priceWaitData); ?>]
				  }]
				},

				options: {
                    legend: {
                        display: false
                    },
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  },
						scaleLabel:{
							display:true,
							labelString:"Time to Confirm (min)"
						}
					}],
					xAxes:[{
						scaleLabel:{
							display:true,
							labelString:"Gas price (gwei)"
						}

					}]
				  }
				}
			  });
			  
			} 

      

    //Speedometer
			  
          if ($('#speedometer').length ){
              var speedometer;
              speedometer = new Speedometer ('speedometer', {theme: 'default'});
              speedometer.draw ();
              getSpeed();
              //setInterval(getSpeed,5000);
              
               }


          function getSpeed (){

          
                    $.ajax({
		    url: "json/ethgasAPI.json",
		                      method: "GET",
                              dataType: "json",
		                      success: function(data) {
			                          speedArray  = data;
                                var speed = speedArray['speed']*100;
                                var blockNum = speedArray['blockNum'];
                                updateSpeedo (speed,blockNum);
                                var out = "Last Block: " + blockNum;
                                $('#blockNum').text(out);
                                
                          }               
                
                    });
          };

          function updateSpeedo (speedInt, blockNum){

            var curSpeed = speedometer.value();

            if (curSpeed === speedInt){
                return;

            } 
            else {
                speedometer.animatedUpdate(speedInt,1000);
            }
            


          }

      //Curency Support
      
            $("#eur").click(function(){
                 
                location = "http://<?php echo EGS_HOSTNAME; ?>/index.php?curr=eur";
			          
                                                                     
            });
            
            $("#usd").click(function(){
                 
                location = "http://<?php echo EGS_HOSTNAME; ?>/index.php?curr=usd";
			          
                                                                     
            });
          
            $("#cny").click(function(){

                location = "http://<?php echo EGS_HOSTNAME; ?>/index.php?curr=cny";
                               
			        
                                                                     
            });

            $("#gbp").click(function(){
                 
                location = "http://<?php echo EGS_HOSTNAME; ?>/index.php?curr=gbp";

			  
                                                                     
            });

         



 </script>



    <script src="build/js/custom3.js"></script>
    
	
  </body>
</html>
