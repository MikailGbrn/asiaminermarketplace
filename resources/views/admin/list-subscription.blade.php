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
                <th>info</th>
                <th>subscription</th>
                <th width="80px">Start Date</th>
                <th width="80px">End Date</th>       
                <th width="50px">action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($company as $c)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->admin->email}}, {{$c->admin->phone}}</td>
                <td>
                  @if($c->subscription == 0)
                    <b>Trial</b>
                  @elseif($c->subscription == 1)
                    <b>Silver</b>
                  @elseif($c->subscription == 2)
                    <b>Gold</b>
                  @endif
                </td>
                <td>{{$c->subscription_start}}</td>
                <td>{{$c->subscription_end}}</td>
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
    <div id="modal1" class="modal white" style="border : 0px; height:100%;">
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
              <select name="subscription" id="subs" required="">
                <option value="">Choose your option</option>
                <option value="0">Trial</option>
                <option value="1">Silver</option>
                <option value="2">Gold</option>
              </select>
              <label class="font-dara labell" for="first_name">Subscription</label>
            </div>
            <div class="input-field input-outlined col s12 bulan" style="margin-top: 0px;">
              <select name="month" id="month">
                <option value="">Choose your option</option>
                <option value="1">1 Month</option>
                <option value="2">2 Month</option>
                <option value="3">3 Month</option>
                <option value="4">4 Month</option>
                <option value="5">5 Month</option>
                <option value="6">6 Month</option>
                <option value="7">7 Month</option>
                <option value="8">8 Month</option>
                <option value="9">9 Month</option>
                <option value="10">10 Month</option>
                <option value="11">11 Month</option>
                <option value="12">12 Month</option>
              </select>
              <label class="font-dara labell" for="first_name">Add Month</label>
            </div>
            <div class="col s12 warn" style="display:none;">
              <center>
                <span style="color:red;">Anda akan melakukan downgrade, ke paket <b>Trial</b> pastikan anda benar-benar yakin dengan pilihan anda..</span>
              </center>
            </div>
            
  
          </div>
          

        </form>
      </div>
      <div class="modal-footer" style="bottom:0px; position: absolute;">
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
  $('#subs').change(function() {
    if ($(this).val() === "0") {
      $(".bulan").css("display","none");
      $(".warn").css("display","block");
      $("#month").removeAttr("required","");

    }else{
      $(".bulan").css("display","block");
      $(".warn").css("display","none");
      $("#month").attr("required","");
    }
});
</script>
<script>
  function showModal(id,nama,subs,start,end)
  {
    //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    document.getElementById('data-modall').value = id;
    document.getElementById('perusahaan').innerHTML =nama;
    var subscription = "";
    if (subs == 0) {
      var subscription = "Trial";
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







