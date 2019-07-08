
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
     /*     var PieChartData='<?php echo $PieChartData;?>'; 

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Hewan');
        data.addColumn('number', 'Slices');
        data.addRows(JSON.parse(PieChartData));

        // Set chart options
        var options = {'title':'<?php echo $PieChartTitle;?>' ,
                       'width':0,
                       'height':0};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
*/
 //barchart1
        var BarChartData='<?php echo $BarChartData ?>';
        var bar_data = new google.visualization.arrayToDataTable(JSON.parse(BarChartData));

        var bar_options = {
          'title':'<?php  echo $BarChartTitle;?>' ,
          legend: {position: 'top'},
          colors: ['purple']
         };

        var bar_chart = new google.visualization.ColumnChart(document.getElementById('curve_div'));
        bar_chart.draw(bar_data, bar_options);
        
//barchart2
        var BarChartData2='<?php echo $BarChartData2 ?>';
        var bar_data2 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData2));

        var bar_options2 = {
          'title':'<?php  echo $BarChartTitle2;?>' ,
          legend: {position: 'top'},
          colors: ['cyan']
         };

        var bar_chart2 = new google.visualization.BarChart(document.getElementById('curve2_div'));
        bar_chart2.draw(bar_data2, bar_options2);

//barchart3
        var BarChartData3='<?php echo $BarChartData3 ?>';
        var bar_data3 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData3));

        var bar_options3 = {
          'title':'<?php  echo $BarChartTitle3;?>' ,
          legend: {position: 'top'},
          colors: ['gray']
         };

        var bar_chart3 = new google.visualization.ColumnChart(document.getElementById('curve3_div'));
        bar_chart3.draw(bar_data3, bar_options3);

//barchart4
        var BarChartData4='<?php echo $BarChartData4 ?>';
        var bar_data4 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData4));

        var bar_options4 = {
          'title':'<?php  echo $BarChartTitle4;?>' ,
          legend: {position: 'top'},
          colors: ['lime']
         };

        var bar_chart4 = new google.visualization.BarChart(document.getElementById('curve4_div'));
        bar_chart4.draw(bar_data4, bar_options4);

//barchart5
        var BarChartData5='<?php echo $BarChartData5 ?>';
        var bar_data5 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData5));

        var bar_options5 = {
          'title':'<?php  echo $BarChartTitle5;?>' ,
          legend: {position: 'top'},
          colors: ['red']
         };

        var bar_chart5 = new google.visualization.LineChart(document.getElementById('curve5_div'));
        bar_chart5.draw(bar_data5, bar_options5);   

      }
        
    </script>
  </head>

  <body bgcolor="#bee9e8">

      <h1> <center><marquee behavior="alternate" width="600" height="40" direction="right"> Visualisasi Informasi Data Kelahiran </marquee></center></h1>
      <?php //echo json_encode($PieChartData);?>
      <!--Div that will hold the pie chart-->
     
      
      <table>
      <tr>
      <th> <div id="curve2_div" style="width: 750px; height: 250px" ></div></th>
      <th> <div id="curve4_div" style="width: 750px; height: 250px" ></div></th>
      </tr>
      </table>

      <center> <div id="curve5_div" style="width: 750px; height: 200px" ></div></center>
      
      <table>
      <tr>
      <th> <div id="curve3_div" style="width: 750px; height: 220px" ></div></th>
      <th> <div id="curve_div" style="width: 750px; height: 220px" ></div></th>
      </tr>
      </table>

  </body>
</html>