@extends('admin/layoutAdmin')

@section('content')
  <div class="section">
    <div class="row">
      <div class="col s12">
        <div class="card" style="border-top: 5px solid #9b59b6 ; border-radius:5px">
          <div class="card-content" style="padding-top: 10px; padding-bottom: 0px">
            <div class="fontt judul">
              <div style="letter-spacing: 1px">List Company</div>
            </div>
            
          </div>
          <div class="card-content">
            <table id="data-table-simple" class="striped" cellspacing="0" style="">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th style="width:150px">Tag</th>
                <th style="width:300px">Info</th>
                <th style="width:120px">Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($company as $c)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$c->name}}</td>
                <td><div class="chip gradient-fadho black-text text-lighten-2">{{$c->catagory->name}}</div></td>
                <td>{{$c->admin->email}}, {{$c->admin->phone}}</td>
                <td>
                  <a class="btn btn-small modal-trigger @if($c->status == 1) cyan @else grey @endif " data-target="modal2" onclick="modalDelete({{$c->id}})"><i class="material-icons">check</i></a>
                  <a class="btn btn-small red" target="_blank" style="margin-left: 10px" href="{{url("/company/$c->slug")}}"><i class="material-icons">language</i></a>
                </td>
              </tr>
              @endforeach
              </tbody> 
            </table>
             {{-- Modal Delete --}}
            <div id="modal4" class="modal white" style="border : 0px">
              <div class="modal-content">
                  <div class="row center-align">
                    <h5>Apakah anda yakin akan menghapus ?</h5>
                  </div>
                  <div class="row center-align" style="margin-bottom: 0px;">
                    <a class="btn btn-large modal-close" style="margin-right: 20px">Cancel</a>
                    <button type="submit" class="btn btn-large red">Delete</button>

                  </div>
              </div>
            </div>

            </form>
          
          </div>
        </div>
      </div>
    </div>
  
  </div>
  
 

  {{-- Modal acivate --}}
  <div id="modal2" class="modal white" style="border : 0px">
    <form id="myform2" action="" method="POST" autocomplete="off">
      @csrf
      @method('put')
      <input id="updateId" type="hidden" name="id" value="">
    <div class="modal-content">
        <div class="row center-align">
          <h5>Apakah anda yakin untuk merubah status perusahaan ?</h5>
        </div>
        <div class="row center-align" style="margin-bottom: 0px;">
          <a form="myform" class="btn btn-large modal-close red" style="margin-right: 20px">Cancel</a>
          <button type="submit" form="myform2" class="btn btn-large cyan">Update</button>

        </div>
      </form>
    </div>
    </form>
  </div>



@endsection

@section('jsplus')
<script>
  function showModal(id,nama)
  {
    //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    document.getElementById('data-modall').value = id;
    document.getElementById('catagory').value = nama;

  };
  function modalDelete(id)
  {
    //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    document.getElementById('updateId').value = id;

  }

</script>
@endsection







