@extends('admin/layoutAdmin')

@section('content')
  <div class="section">
    <div class="row">
      <div class="col s4">
        <div class="card">
          <div class="card-content blue" style="padding: 10px 20px;">
            <h4 class="fontt white-text" style="margin: 0px;">Company</h4>
            <h6 class=" white-text" style="margin: 0px; padding-left: 3px; padding-top: 10px; padding-bottom: 10px;">Jumlah : {{$top['company']}}</h6>
            <span style="position: absolute; top: 0px; right: 0px; padding: 15px 10px"><i class="material-icons medium white-text">business</i></span>
          </div>
        </div>
      </div>
      <div class="col s4">
        <div class="card">
          <div class="card-content green" style="padding: 10px 20px;">
            <h4 class="fontt white-text" style="margin: 0px;">Resource</h4>
            <h6 class=" white-text" style="margin: 0px; padding-left: 3px; padding-top: 10px; padding-bottom: 10px;">Jumlah : {{$top['media']}}</h6>
            <span style="position: absolute; top: 0px; right: 0px; padding: 15px 10px"><i class="material-icons medium white-text">topic</i></span>
          </div>
        </div>
      </div>
      <div class="col s4">
        <div class="card">
          <div class="card-content red" style="padding: 10px 20px;">
            <h4 class="fontt white-text" style="margin: 0px;">Product</h4>
            <h6 class=" white-text" style="margin: 0px; padding-left: 3px; padding-top: 10px; padding-bottom: 10px;">Jumlah : {{$top['product']}}</h6>
            <span style="position: absolute; top: 0px; right: 0px; padding: 15px 10px"><i class="material-icons medium white-text">receipt_long</i></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <div class="card" style="border-top: 5px solid #2196f3; border-radius:5px">
            <div class="card-content" style="padding-top: 10px; padding-bottom: 0px">
              <div class="fontt judul">
                <div style="letter-spacing: 1px">Monthly Visitor</div>
              </div>
              
            </div>
            <div class="card-content">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col s12 m8">
          <div class="card" style="border-top: 5px solid #f44336 ; border-radius:5px">
            <div class="card-content" style="padding-top: 10px; padding-bottom: 0px">
              <div class="fontt judul">
                <div style="letter-spacing: 1px">Most Visited Page</div>
              </div>
              
            </div>
            <div class="card-content">
              <table>
                <thead>
                  <tr>
                      <th style="width: 70%;">Page</th>
                      <th>Number</th>
                  </tr>
                </thead>
        
                <tbody>
                  @foreach ($mostVisitedPage as $key => $vp)
                  <tr>
                    <td>{{$vp['url']}}</td>
                    <td>{{$vp['pageViews']}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card" style="border-top: 5px solid #f44336 ; border-radius:5px">
            <div class="card-content" style="padding-top: 10px; padding-bottom: 0px">
              <div class="fontt judul">
                <div style="letter-spacing: 1px">Visitor by city</div>
              </div>
              
            </div>
            <div class="card-content">
              <canvas id="chartLocation" width="700"></canvas>
            </div>
          </div>
         
        </div>
      </div>
    
    </div>
  
  </div>
  
  





@endsection

@section('jsplus')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: [
            @foreach ($visitor->rows as $key => $value)
              '{{$value[0]}}',
            @endforeach
          ],
          datasets: [{
              label: 'user',
              data: [
                @foreach ($visitor->rows as $key => $value)
                  {{ $value[1]   }},
                @endforeach
              ],
              borderColor: [
                  'rgba(41, 128, 185,1.0)'
              ],
              backgroundColor : 'rgba(52, 152, 219,0.7)',
              
              borderWidth: 2
          },{
              label: 'session',
              data: [
                @foreach ($visitor->rows as $key => $value)
                  {{ $value[2]   }},
                @endforeach
              ],
              borderColor: [
                  'rgba(255, 203, 5, 1)',
              ],
              backgroundColor : 'rgba(241, 196, 15,0)',
              
              
              borderWidth: 2
          },{
              label: 'Page View',
              data: [
                @foreach ($visitor->rows as $key => $value)
                  {{ $value[3]   }},
                @endforeach
              ],
              borderColor: [
                  'rgba(26, 188, 156,1.0)',
              ],
              backgroundColor : 'rgba(241, 196, 15,0)',
              
              
              borderWidth: 2
          }
        ]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
  </script>
  <script>
      var ctx = document.getElementById('chartLocation');
      var myPieChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: [
              @foreach ($visitorByCity->rows as $key => $value)
                 ' {{ $value[0]   }}',
                  @endforeach
            ],
            datasets: [{
                data: [
                  @foreach ($visitorByCity->rows as $key => $value)
                  {{ $value[1]   }},
                  @endforeach
                ],
                backgroundColor : [
                  'rgba(26, 188, 156,1.0)',
                  'rgba(52, 152, 219,1.0)',
                  'rgba(155, 89, 182,1.0)',
                  'rgba(241, 196, 15,1.0)',
                  'rgba(231, 76, 60,1.0)'

                ],
                borderWidth: 2,
                
                weight : 1
            }]
          },
          options :{
            responsive: true,
            maintainAspectRatio: false, 
            legend : {
              position :'bottom'
            }
          }
      });
  </script>

@endsection







