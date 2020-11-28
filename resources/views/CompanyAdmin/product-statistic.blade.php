@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-4" style="border-bottom: 1px solid #ccc">
            <h2>Products Data</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-search-directory mt-5 ">
              <form method="get">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-10 no-sm-border border-right">
                    <select class="form-control" name="kw">
                      <option value=""></option>
                      @foreach($product as $p)
                      <option value="{{$p->name}}"> {{$p->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn text-white btn-primary" value="Search">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12" style="border-bottom: 1px solid #ccc">
            
          
            <h3 class="mt-5 h4">Quotation List</h3>
            <table class="table mt-5 bg-white">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Product</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Company</th>
                  <th scope="col">Request</th>
                  <th scope="col">File</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($quotation as $q)
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$q->user->first_name." ".$q->user->last_name}}</td>
                  <td>{{$q->product->name}}</td>
                  <td>{{$q->user->email}}</td>
                  <td>{{$q->user->company_name}}</td>
                  <td>{{$q->description}}</td>
                  <td>
                    @if($q->file !== null)
                    <a href="{{url('/company-profile/download/')}}/{{$q->id}}" class="btn btn-primary">download</a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12 bg-white">
            <h4 class="mt-5">Media/Resource View Data Chart</h4>
            <canvas id="chartproduct" width="100%" height="50"></canvas>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('jsplus')
<script src="{{asset('assets/frontend/chartjs/samples/utils.js')}}"></script>
<script src="{{asset('assets/frontend/chartjs/dist/Chart.js')}}"></script>
<script type="text/javascript">
  var asd = document.getElementById('chartproduct').getContext('2d');
var Chart = new Chart(asd, {
  type: 'line',
  data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
          label: "Views {{Request::input('kw')}} in @php echo(date('Y')) @endphp", /*judul chart*/
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