@extends('admin/layoutAdmin')

@section('content')
  <div class="section">
    <div class="row">
      <div class="col s12">
        <div class="card" style="border-top: 5px solid #2ecc71 ; border-radius:5px">
          <div class="card-content" style="padding-top: 10px; padding-bottom: 0px">
            <div class="fontt judul">
              <div style="letter-spacing: 1px">List User</div>
            </div>
            
          </div>
          <div class="card-content">
            <table id="data-table-simple" class="striped" cellspacing="0" style="">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($user as $c)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$c->first_name}} {{$c->last_name}}</td>
                <td>{{$c->company_name}}</td>
                <td>{{$c->email}}</td>
                <td>
                  <a class="btn btn-small modal-trigger green " data-target="modal2" onclick="modalDelete({{$c->id}})"><i class="material-icons">perm_identity</i></a>
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
          <h5>Apakah anda yakin ?</h5>
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







