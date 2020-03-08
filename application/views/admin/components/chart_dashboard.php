<script>
  /* Chart.js Charts */
  // Sales chart
  var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');
  var months = ["Jan","Feb","Mar","Apr","Mei","Juni","Juli","Agt","Se","Okt","Nov","Des"];
  d = new Date();
  tanggal = d.getDate();
  hrini = ''+d.getDate()+' '+months[d.getMonth()];
  d.setDate(d.getDate()-1);
  hrini_1 = ''+d.getDate()+' '+months[d.getMonth()];
  d.setDate(d.getDate()-1);
  hrini_2 = ''+d.getDate()+' '+months[d.getMonth()];
  d.setDate(d.getDate()-1);
  hrini_3 = ''+d.getDate()+' '+months[d.getMonth()];
  d.setDate(d.getDate()-1);
  hrini_4 = ''+d.getDate()+' '+months[d.getMonth()];
  d.setDate(d.getDate()-1);
  hrini_5 = ''+d.getDate()+' '+months[d.getMonth()];
  d.setDate(d.getDate()-1);
  hrini_6 = ''+d.getDate()+' '+months[d.getMonth()];
  var salesChartData = {


    labels  : [hrini_6, hrini_5,hrini_4,hrini_3,hrini_2,hrini_1],
    //labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label               : 'Pengantri',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        //pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [28, 48, 40, 19, 86, 27, 90]
//        showLines           : true
      }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas, { 
    type: 'bar', 
    data: salesChartData, 
    options: salesChartOptions
  }
                            )
</script>