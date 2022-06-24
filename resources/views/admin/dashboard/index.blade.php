  <div class="row">

    <div class="col-md-2">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Kecamatan</span>
          <span class="info-box-number">
            10
            <small>%</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>

    </div>

    <div class="col-md-2">
      <div class="info-box">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-mountain"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Wisata</span>
          <span class="info-box-number">
            10
            <small>%</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>

    </div>

     <div class="col-md-2">
      <div class="info-box">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-building"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Penginapan</span>
          <span class="info-box-number">
            10
            <small>%</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>

    </div>

     <div class="col-md-2">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-utensils"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Kuliner</span>
          <span class="info-box-number">
            10
            <small>%</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>

    </div>

     <div class="col-md-2">
      <div class="info-box">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-hamburger"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jajanan</span>
          <span class="info-box-number">
            10
            <small>%</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>

    </div>

     <div class="col-md-2">
      <div class="info-box">
        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-car"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Rental Mobil</span>
          <span class="info-box-number">
            10
            <small>%</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>

    </div>

  </div>

    <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Area Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
    </div>
  <script src="/plugins/chart.js/Chart.min.js"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
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
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

  })
</script>