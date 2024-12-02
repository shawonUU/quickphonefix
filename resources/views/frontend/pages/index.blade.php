@extends('frontend.layouts.app') 
@section('content')

  <div class="content container-fluid">
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="dash-widget-header">
              <span class="dash-widget-icon bg-1">
                <i class="fas fa-dollar-sign"></i>
              </span>
              <div class="dash-count">
                <div class="dash-title">Today's Revenue</div>
                <div class="dash-counts">
                  <p>{{$todaysRevenue}}</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="dash-widget-header">
              <span class="dash-widget-icon bg-1">
                <i class="fas fa-dollar-sign"></i>
              </span>
              <div class="dash-count">
                <div class="dash-title">This week Revenue</div>
                <div class="dash-counts">
                  <p>{{$thisWeeksRevenue}}</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="dash-widget-header">
              <span class="dash-widget-icon bg-1">
                <i class="fas fa-dollar-sign"></i>
              </span>
              <div class="dash-count">
                <div class="dash-title">This Month Revenue</div>
                <div class="dash-counts">
                  <p>{{$thisMonthsRevenue}}</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="dash-widget-header">
              <span class="dash-widget-icon bg-1">
                <i class="fas fa-dollar-sign"></i>
              </span>
              <div class="dash-count">
                <div class="dash-title">This Year Revenue</div>
                <div class="dash-counts">
                  <p>{{$thisYearsRevenue}}</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xl-7 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title">Monthly Sales</h5>

              
            </div>
          </div>
          <div class="card-body">
            
            
            <div id="sales_chart"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-5 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title">Yearly sales</h5> 
            </div>
          </div>
          <div class="card-body">
            <div id="sales_chart_yearly"></div>
            
          </div>
        </div>
      </div>
    </div>

    
  </div>



  <script>
        // Embed PHP data as a JavaScript object
        window.chartData = {
            monthlyRevenue: @json($monthlyRevenue), // Passing the PHP array to JavaScript
            yearlyRevenue: @json($yearlyRevenue)   // Similarly, for yearly revenue
        };
  </script>


@endsection