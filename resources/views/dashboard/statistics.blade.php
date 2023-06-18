<div class="row">
    <div class="col-xxl-8 mb-6">
      <div class="card px-7 py-6 h-100 chart">
        <div class="card-body" style="height: 500px">
          <canvas id="myChart" width="400" height="100"></canvas>         
        </div>
      </div>
    </div>
</div>
<script>
  var labels = <?php echo $labels; ?>;
  var values = <?php echo $values; ?>;
  
  var sum = values.reduce((a, b) => a + b, 0);
  var percentages = values.map(value => ((value / sum) * 100).toFixed(2));
  
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: labels,
          datasets: [{
              label: 'Data',
              data: values,
              backgroundColor: 'rgba(0, 123, 255, 0.5)',
              borderColor: 'rgba(0, 123, 255, 1)',
              borderWidth: 1
          }]
      },
      options: {
          plugins: {
              datalabels: {
                  color: 'black',
                  anchor: 'end',
                  align: 'top',
                  formatter: function(value, context) {
                      var percentage = ((value / sum) * 100).toFixed(2);
                      return value + ' (' + percentage + '%)';
                  }
              }
          },
          scales: {
              y: {
                  beginAtZero: true,
                  ticks: {
                      callback: function(value) {
                          return value;
                      }
                  }
              }
          },
          tooltips: {
              callbacks: {
                  label: function(context) {
                      var value = context.raw;
                      var percentage = ((value / sum) * 100).toFixed(2);
                      return value + ' (' + percentage + '%)';
                  }
              }
          }
      }
  });
</script>

