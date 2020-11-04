@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-4" style="border-bottom: 1px solid #ccc">
            <h2>Media/Resources Data</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12" style="border-bottom: 1px solid #ccc">
            
            <div class="form-search-directory mt-5 ">
              <form method="get">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-10 no-sm-border border-right">
                    <input type="text" name="kw" class="form-control" placeholder="Search media/resources">
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn text-white btn-primary" value="Search">
                  </div>
                  
                </div>
              </form>
            </div>
            <h3 class="mt-5 h4">User Downloads</h3>
            <table class="table mt-5">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Media/Resources Title</th>
                  <th scope="col">Name</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Company</th>
                </tr>
              </thead>
              <tbody>
                @foreach($mediadownload as $m)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$m->title}}</td>
                  <td>{{$m->first_name.' '.$m->last_name}}</td>
                  <td>{{$m->email}}</td>
                  <td>{{$m->company_name}}</td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="4" style="text-align: right"><b>Total :</b></td>
                  <td>{{$mediadownload->total()}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-12 text-center mt-5">
            {{$mediadownload->links()}}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4 class="mt-5">Media/Resource View Data Chart</h4>
            <canvas id="chartmedia" width="100%" height="50"></canvas>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('jsplus')
<script src="{{asset('assets/frontend/chartjs/samples/utils.js')}}"></script>
<script src="{{asset('assets/frontend/chartjs/dist/Chart.js')}}"></script>
<script type="text/javascript">
  var ctx = document.getElementById('chartmedia').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
          label: "Views in @php echo(date('Y')) @endphp", /*judul chart*/
          data: [
            @foreach ($arrayGrafik as $key => $value)
            {{$value}},
            @endforeach
          ],  /*jumlah datanya disini */
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
      }]
  },
  options: { /*configuration here*/
    responsive: true,
    title: {
    },
      scales: {
          yAxes: [{
              ticks: {
                  fontColor: '#00918e', 
                  fontSize: 14,
                  beginAtZero: true
              }
          }]
      }
  }
});
</script>
@endsection