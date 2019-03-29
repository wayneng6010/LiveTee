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
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: quan
          }
        ]
      };

      var ctx = $("#mycanvas");

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