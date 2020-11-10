@extends('admin/layoutAdmin')

@section('content')
  <div class="section">
    <div class="row">
      <div class="col s12">
        <div class="card" style="border-top: 5px solid #f44336 ; border-radius:5px">
          <div class="card-content" style="padding-top: 10px; padding-bottom: 0px">
            <div class="fontt judul">
              <div style="letter-spacing: 1px">List Subscription</div>
            </div>
            
          </div>
          <div class="card-content">
            <table id="data-table-simple" class="striped" cellspacing="0" style="">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>subscription</th>
                <th style="width:300px">Description</th>
                <th>action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($company as $c)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$c->name}}</td>
                <td>
                  @if($c->subscription == 0)
                    <b>Free</b>
                  @elseif($c->subscription == 1)
                    <b>Silver</b>
                  @elseif($c->subscription == 2)
                    <b>Gold</b>
                  @endif
                </td>
                <td>{{$c->description}}</td>
                <td>
                  <a class="btn btn-small modal-trigger cyan" data-target="modal1" onclick="showModal({{$c->id}},'{{$c->name}}',{{$c->subscription}})" style="margin-right: 10px" href=""><i class="material-icons">attach_money</i></a>
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
  
 

    {{-- modal edit --}}
    <div id="modal1" class="modal white" style="border : 0px;">
      <form id="myform" action="" method="POST" autocomplete="off">
        @csrf
        @method('put')
        <input type="hidden" id="data-modall" name="id" value="">
      <div class="modal-content">
          <div class="row">
            <div class="col s12 font-dara">
              Nama &nbsp;: <span id="perusahaan"></span>
            </div>
          </div>
          <div class="row" style="margin-bottom: 50px;">
            <div class="col s12 font-dara">
              Subscription : <span id="subsss"></span>
            </div>
          </div>
          <div class="row" style="margin-bottom: 0px;">
            <div class="input-field input-outlined col s12" style="margin-top: 0px;">
              <select name="subscription" id="subs">
                <option value="">Choose your option</option>
                <option value="0">Free</option>
                <option value="1">Silver</option>
                <option value="2">Gold</option>
              </select>
              <label class="font-dara labell" for="first_name">Subscription</label>
            </div>
            
  
          </div>
          

        </form>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">close</a>
        <button type="submit" form="myform" class="btn">Agree</button>
      </div>
      </form>
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
  function showModal(id,nama,subs)
  {
    //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    document.getElementById('data-modall').value = id;
    document.getElementById('perusahaan').innerHTML =nama;
    var subscription = "";
    if (subs == 0) {
      var subscription = "Free";
    } else if (subs == 1) {
      var subscription = "Silver";
    } else if (subs == 2) {
      var subscription = "Gold";
    }
    document.getElementById('subsss').innerHTML =subscription;

  };
  function modalDelete(id)
  {
    //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    document.getElementById('updateId').value = id;

  }

</script>
@endsection







