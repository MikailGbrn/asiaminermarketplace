@extends('CompanyAdmin.layout')
@section('content')
<div class="site-section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h2>Project ({{$project->total()}})</h2>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{url('/')}}/company-profile/project/add"><h5>+ Add Item</h5></a>
      </div>
    </div>
    @if (session('Project'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    @php echo session('Project'); @endphp !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

    <div class="form-search-directory mt-5 ">
      <form method="get">
        <div class="row align-items-center">
          <div class="col-lg-12 col-xl-10 no-sm-border border-right">
            <input type="text" name="kw" class="form-control" placeholder="Search news">
          </div>
          <div class="col-lg-12 col-xl-2 ml-auto text-right">
            <input type="submit" class="btn text-white btn-primary" value="Search">
          </div>
          
        </div>
      </form>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table mt-5">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Project Title</th>
              <th scope="col">Author</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($project as $n)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$n->title}}</td>
              <td>{{$n->author}}</td>
              <td>{{date( 'F j, Y, g:i a', strtotime( $n->created_at ) ) }}</td>
              <td>
                <a href="{{url('/')}}/company-profile/project/{{$n->id}}"><span class="icon-edit mr-5"></span></a>
                
                <a href="#" id="btnDelete" idCompany="{{ $n->company_id }}" idProject="{{ $n->id }}"><span class="icon-trash text-danger mr-5"></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
        {{$project->links()}}
      </div>
    </div>
  </div>
</div>
@endsection
@section('jsplus')

<script>
  $('a#btnDelete').on('click',function()
{   
    var thisElement = $(this);

    $.ajax({
        type: 'delete',
        url: "{{url('/')}}" + '/company-profile/project',
        data :{
                '_token': '{!! csrf_token() !!}',
                'id' : thisElement.attr('idProject'),
                'company_id' : thisElement.attr('idCompany'),
              },
        async: false,
        success:function(response)
        {
          location.reload();
          //console.log(response);
        },
        error: function(response){
          console.log(response)
        }

    });
});
</script>

@endsection
