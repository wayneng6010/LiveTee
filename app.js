$(document).ready(function(){
  $.ajax({
    url: "data.php",
    method: "GET",
    data: { 
      graphType: $('#graphType').val(),
      duration: $('#duration').val()
    },
    success: function(data) {
      console.log(data);
      var dataJS = data; 

      var dates = [];
      var quan = [];
      var graphType = dataJS.graphType;
      delete dataJS['graphType'];

      for(var i in dataJS) {
        dates.push(dataJS[i].dates);
        quan.push(dataJS[i].quan);
      }

      var chartdata = {
        labels: dates,
        datasets : [
          {
            label: 'Sales (RM)',
            backgroundColor: [
              "#D3D3D3",
              "#C0C0C0",
              "#A9A9A9",
              "#808080",
              "#696969",
              "#778899",
              "#708090",
              "#2F4F4F"
            ],
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: quan
          }
        ]
      };

      var ctx = $("#mycanvas");

  // ctx.style.backgroundColor = 'blue';

      // Chart.plugins.register({
      //   beforeDraw: function(chartInstance) {
      //     var ctx = chartInstance.chart.ctx;
      //     ctx.fillStyle = "white";
      //     ctx.fillRect(0, 0, chartInstance.chart.width, chartInstance.chart.height);
      //   }
      // });
      var barGraph = new Chart(ctx, {
        type: graphType,
        data: chartdata,
        options: {
          scales: {
            yAxes: [{
              ticks: {
                suggestedMin: 0
              }
            }]
          }
        }
      });

    },
    error: function(data) {
      console.log(data);
    }
  });
});