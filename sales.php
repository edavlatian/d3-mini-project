<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sales data displayed through the use of D3.js">
        <meta name="author" content="Edouard Davlatian">
        <link rel="icon" href="favicon.ico">
        <title>Sales Data - D3.js</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        crossorigin="anonymous">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/chart.css">
        <link rel="stylesheet" type="text/css" href="assets/css/c3.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://d3js.org/d3.v3.min.js"></script>
        <script src="assets/js/c3.min.js"></script>
    </head>
    <body>
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="sales.php">Sales Data D3.js</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://github.com/edavlatian">GitHub</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class=" container-fluid">
                <ul class="nav nav-tabs nav-collapse" role="tablist">
                    <li role="presentation" class="active"><a href="#monthlyTotal" aria-controls="monthlyTotal" role="tab" data-toggle="tab">Monthly Total Branch Sales</a></li>
                    <li role="presentation"><a href="#monthlyComparison" aria-controls="monthlyComparison" role="tab" data-toggle="tab">Monthly Sales Comparison</a></li>
                    <li role="presentation"><a href="#monthForcast" aria-controls="monthForcast" role="tab" data-toggle="tab">Month Forcast</a></li>                  
                    <li role="presentation"><a href="#yearlyTotal" aria-controls="yearlyTotal" role="tab" data-toggle="tab">Yearly Total Branch Sales</a></li>
                    <li role="presentation"><a href="#yearlyComparison" aria-controls="yearlyComparison" role="tab" data-toggle="tab">Yearly Sales Comparison</a></li>
                    <li role="presentation"><a href="#yearForcast" aria-controls="yearForcast" role="tab" data-toggle="tab">Year Forcast</a></li>

                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in active" id="monthlyTotal">
                        <h2>Total Monthly Sales By Branch</h2>
                        <div class="collapse fade in active col-xs-12 col-md-6 col-lg-6" id="cur-month-pie">
                            <h4>Current Month Sales Breakdown</h4>
                        </div>
                        <div class="collapse fade in col-xs-12 col-md-6 col-lg-6" id="last-month-pie">
                            <h4>Last Month Sales Breakdown</h4>
                        </div>
                    </div> <!-- #MonthlyTotal -->

                    <div role="tabpanel" class="tab-pane fade in" id="monthlyComparison">
                        <div class="col-xs-12 col-md-12 col-lg-6" id="monthly-sales-comparison-chart">
                            <h2>Month to month sales</h2>
                        </div>
                    </div><!-- #MonthlyComparison -->

                    <div role="tabpanel" class="tab-pane fade in" id="monthForcast">
                    <h2>Month Forcast</h2>
                        <div class="col-xs-12 col-md-12 col-lg-10" id="month-forcast-chart">
                            
                            <script type="text/javascript">
                            <?php  $json=file_get_contents('http://localhost/~edouard/sales/monthForcast.php');
                                $forcastData=json_decode($json, true);

                                $catData = array('x');
                                $curMonData=array('data1');
                                $forcastMonData=array('data2');


                                foreach($forcastData as $i=>$item){
                                    array_push($catData, $forcastData[$i]['branch_name']);
                                    array_push($curMonData, $forcastData[$i]['cur_month']);
                                    array_push($forcastMonData, $forcastData[$i]['month_forcast']);
                                }

                                $js_array=json_encode($curMonData);
                                echo "var cur_month_sales =". $js_array . ";\n";

                                $js_array2=json_encode($forcastMonData);
                                echo "var forcast_month_sales =". $js_array2 . ";\n";

                                $js_array3=json_encode($catData);
                                echo "var branch_name_mon =". $js_array3 . ";\n";
                            ?>
                            var chart = c3.generate({
                                size: {
                                  height: 450
                                },
                                bindto: '#month-forcast-chart',
                                data: {
                                  x:'x',
                                  columns: [ 
                                    branch_name_mon, 
                                    cur_month_sales, 
                                    forcast_month_sales
                                  ],
                                  names:{
                                    data1:'Actual Sales',
                                    data2:'Forcasted Sales'
                                  },
                                  axes: {
                                    data2: 'y1'
                                  },
                                  types: {
                                    data2: 'bar' // ADD
                                  }
                                },
                                axis: {
                                  y: {
                                    label: {
                                      text: 'Sales',
                                      position: 'outer-middle'
                                    }
                                  },
                                    x: {
                                        type: 'category',
                                        categories: [branch_name_mon]
                                    }
                                }
                            });
                            </script>
                        </div>
                    </div><!-- #monthForcast -->

                    <div role="tabpanel" class="tab-pane fade in " id="yearlyTotal">
                        <h2>Total Yearly Sales by Branch</h2>
                         <div class="collapse fade in active col-xs-12 col-md-6 col-lg-6" id="cur-year-pie">
                            <h4>Current Year Sales Breakdown</h4>
                        </div>
                        <div class="collapse fade in col-xs-12 col-md-6 col-lg-6" id="last-year-pie">
                            <h4>Last Year Sales Breakdown</h4>
                        </div>
                    </div> <!-- #yearlyTotal -->

                    <div role="tabpanel" class="tab-pane fade" id="yearlyComparison">
                         <div class="col-xs-12 col-md-12 col-lg-12" id="yearly-sales-comparison-chart">
                            <h2>Year to Year sales</h2>
                        </div>
                    </div> <!-- #yearlyComparison -->

                    <div role="tabpanel" class="tab-pane fade in" id="yearForcast">
                        <h2>Year Forcast</h2>
                        <div class="col-xs-12 col-md-12 col-lg-10" id="year-forcast-chart">
                            
                            <script type="text/javascript">
                            <?php  
                                $json=file_get_contents('http://localhost/~edouard/sales/yearForcast.php');
                                $forcastData=json_decode($json, true);

                                $catYearData = array('x');
                                $curYearData=array('data1');
                                $forcastYearData=array('data2');


                                foreach($forcastData as $i=>$item){
                                    array_push($catYearData, $forcastData[$i]['branch_name']);
                                    array_push($curYearData, $forcastData[$i]['cur_fiscal_year']);
                                    array_push($forcastYearData, $forcastData[$i]['year_forcast']);
                                }

                                $js_arrayx=json_encode($curYearData);
                                echo "var cur_year_sales =". $js_arrayx . ";\n";

                                $js_array2x=json_encode($forcastYearData);
                                echo "var forcast_year_sales =". $js_array2x . ";\n";

                                $js_array3x=json_encode($catYearData);
                                echo "var branch_name_year =". $js_array3x . ";\n";
                            ?>
                            var chart = c3.generate({
                                size: {
                                  height: 450
                                },
                                bindto: '#year-forcast-chart',
                                data: {
                                  x:'x',
                                  columns: [ 
                                    branch_name_year, 
                                    cur_year_sales, 
                                    forcast_year_sales
                                  ],
                                  names:{
                                    data1:'Actual Sales',
                                    data2:'Forcasted Sales'
                                  },
                                  axes: {
                                    data2: 'y1'
                                  },
                                  types: {
                                    data2: 'bar' // ADD
                                  }
                                },
                                axis: {
                                  y: {
                                    label: {
                                      text: 'Sales',
                                      position: 'outer-middle'
                                    }
                                  },
                                    x: {
                                        type: 'category',
                                        categories: [branch_name_year]
                                    }
                                }
                                // size: {
                                //   height: 480
                                // }
                            });
                            </script>
                        </div>
                    </div><!-- #yearForcast -->

                </div> <!-- .tab-content -->

                <script type="text/javascript" src="pieCharts.js"></script>
                <script type="text/javascript" src="barCharts.js"></script>
            </div>

            
            <?php
                $json=file_get_contents('http://localhost/~edouard/sales/getAllData.php');
                $data=json_decode($json);
                //var_dump($data);
            ?>
            <div class="container table-responsive">
                <table class="table table-condensed text-right">
                    <caption><h3>Sales Data</h3></caption>
                    <tr>
                        <th>Branch Name</th>
                        <th class="text-right">Current Month</th>
                        <th class="text-right">Last Month</th>
                        <th class="text-right">Month Forcast</th>
                        <th class="text-right">Month %</th>
                        <th class="text-right">Current Fiscal Year</th>
                        <th class="text-right">Year Forcast</th>
                        <th class="text-right">Last Fiscal Year</th>
                    </tr>
                    <?php
                        foreach($data as $object):
                    ?>

                   <tr>
                        <td class="text-left branch-name"><?php echo $object->{'branch_name'}?></td>
                        <td><?php echo number_format((float)$object->{'cur_month'}, 2, '.', '')?></td>
                        <td><?php echo number_format((float)$object->{'last_month'}, 2, '.', '')?></td>
                        <td><?php echo number_format((float)$object->{'month_forcast'}, 2, '.', '')?></td>
                        <td><?php echo number_format((float)$object->{'month_pc'}, 2, '.', '')?>%</td>
                        <td><?php echo number_format((float)$object->{'cur_fiscal_year'}, 2, '.', '')?></td>
                        <td><?php echo number_format((float)$object->{'year_forcast'}, 2, '.', '')?></td>
                        <td><?php echo number_format((float)$object->{'last_fiscal_year'}, 2, '.', '')?></td>
                    </tr>

                    <?php 
                        endforeach;
                    ?>
                </table>
            </div>
        </div><!-- /.Container-fluid -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>        
    </body>
</html>