

$(document).ready(function(){
  $.ajax({
    url: "https://www.crup1-18.wbs.uni.worc.ac.uk/Company/data.php", //this function access 'data.php'in order to retrieve infos required for the bar chart.
    method: "GET",
    success: function(data) {
      console.log(data);
      var cnt = [];
      var employee_gender = [];

      for(var i in data) {
        employee_gender.push("" + data[i].employee_gender); //for every user added in the database, the chart will be modified with fresh infos.
        cnt.push(data[i].cnt);
      }

      var chartdata = {
        labels: employee_gender,
        datasets : [
          {
            label: 'Females and Males in Company',
            backgroundColor: '#FFFFFF', //the style for the bar chart
            borderColor: '#FFFFFF',
            hoverBackgroundColor: '#FFFFFF',
            hoverBorderColor: '#FFFFFF',
            data: cnt
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',	//here the bar chart is configured
        data: chartdata
        
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
