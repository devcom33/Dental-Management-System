// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Aucun", "Prothèses Dentaire", "Soins des gencives", "La prophylaxie"],
    datasets: [{
      data: [_adata, _bdata, _cdata, _ddata],
      backgroundColor: ['#112D4E', '#3F72AF', '#325288', '#D96098'],
    }],
  },
});
