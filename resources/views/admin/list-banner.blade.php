@extends('admin/layoutAdmin')

@section('content')
  <div class="section">
    <div class="row">
      <div class="col s12">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{$error}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endforeach
        @endif
        <div class="card" style="border-top: 5px solid #e67e22 ; border-radius:5px">
          <div class="card-content" style="padding-top: 10px; padding-bottom: 0px">
            <div class="fontt judul">
              <div style="letter-spacing: 1px">List Banner Homepage</div>
            </div>
            <a href="{{url('/')}}" target="_blank" class="waves-effect btn modal-trigger" data-target="modal1" style="padding: 0px 12px; border-radius: 25px; position: absolute; right:20px; top:15px;"><i class="material-icons left" style="margin-right: 3px ">add</i>Add Banner</a>
          </div>
          <div class="card-content">
              <table class="striped" cellspacing="0" style="">
                <thead>
                <tr>
                  <th style="width:50px">No</th>
                  <th>Title</th>
                  <th>Link</th>
                  <th style="width:180px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banner as $c)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$c->title}}</td>
                    <td><a href="{{$c->link}}">{{$c->link}}</a></td>
                    <td>
                      <a class="btn btn-small modal-trigger cyan" data-target="modal3" onclick="showPhoto('{{url('public/'.Storage::url($c->photo))}}')"><i class="material-icons">image</i></a>
                      <a class="btn btn-small modal-trigger" data-target="modal0" onclick="showEdit('{{$c->title}}','{{$c->link}}',{{$c->id}})"><i class="material-icons">edit</i></a>
                      <a class="btn btn-small modal-trigger red" data-target="modal2" onclick="modalDelete({{$c->id}})"><i class="material-icons">delete</i></a>
                    </td>
                  </tr>
                @endforeach

                </tbody> 
              </table>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  
 
 {{-- Modal foto --}}
  <div id="modal3" class="modal white" style="height:100%;">
    <div class="modal-content">
      <img id="fotoo" src="" alt="" style="width:100%; height: 350px;">
    </div>
    <div class="modal-footer" style="bottom:0px; position: absolute;">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">close</a>
    </div>
  </div>


 {{-- Modal delete --}}
 <div id="modal2" class="modal white" style="border : 0px">
  <form id="myform2" action="" method="POST" autocomplete="off">
  @csrf
  @method('delete')
  <input id="updateId" type="hidden" name="id" value="">
  <div class="modal-content">
    <div class="row center-align">
      <h5>Apakah anda yakin untuk menghapus banner ?</h5>
    </div>
    <div class="row center-align" style="margin-bottom: 0px;">
      <a class="btn btn-large modal-close cyan" style="margin-right: 20px">Cancel</a>
      <button type="submit" form="myform2" class="btn btn-large red">Delete</button>
    </div>
  </div>
  </form>
</div>

  {{-- modal add --}}
  <div id="modal1" class="modal white" style="border : 0px; height:100%;">
    <form id="myform" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
      @csrf
    <div class="modal-content">
        <div class="row" style="margin-bottom: 0px;">
          <div class="input-field input-outlined col s12" style="margin-top: 0px;">
            <input type="text" name="title" placeholder="nama dari banner promosi">
            <label class="font-dara labell" for="first_name">Title</label>
            <span class="helper-text" style="margin-left:10px" data-error="wrong" data-success="right">contoh : Banner Acara Indonesia mining</span>
          </div>
          <div class="input-field input-outlined col s12" style="margin-top: 0px;">
            <input type="text" name="link" placeholder="Link setelah banner di klik">
            <label class="font-dara labell" for="first_name">Link</label>
            <span class="helper-text" style="margin-left:10px" data-error="wrong" data-success="right">contoh : http://google.com</span>
          </div>
          <div class="col s12">
            <label class="font-dara" style="font-size:15px;">Input Banner</label>
          </div>
          <div class="file-field input-field input-outlined col s12">
            <div class="btn">
              <span>File</span>
              <input type="file" name="photo">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
            <span class="helper-text" style="margin-left:10px" data-error="wrong" data-success="right">keterangan : file foto dianjurkan dibawah 3 Mb dan berukuran 1280*500 px</span>
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

    {{-- modal edit --}}
    <div id="modal0" class="modal white" style="border : 0px; height:100%;">
      <form id="myform0" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" id="idBanner" name="id" value="">
      <div class="modal-content">
          <div class="row" style="margin-bottom: 0px;">
            <div class="input-field input-outlined col s12" style="margin-top: 0px;">
              <input type="text" name="title" id="title" placeholder="nama dari banner promosi">
              <label class="font-dara labell" for="first_name" >Title</label>
              <span class="helper-text" style="margin-left:10px" data-error="wrong" data-success="right">contoh : Banner Acara Indonesia mining</span>
            </div>
            <div class="input-field input-outlined col s12" style="margin-top: 0px;">
              <input type="text" name="link" id="link" placeholder="Link setelah banner di klik">
              <label class="font-dara labell" for="first_name" >Link</label>
              <span class="helper-text" style="margin-left:10px" data-error="wrong" data-success="right">contoh : http://google.com</span>
            </div>
            <div class="col s12">
              <label class="font-dara" style="font-size:15px;">Input Banner</label>
            </div>
            <div class="file-field input-field input-outlined col s12">
              <div class="btn">
                <span>File</span>
                <input type="file" name="photo">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
              <span class="helper-text" style="margin-left:10px" data-error="wrong" data-success="right">keterangan : file foto dianjurkan dibawah 3 Mb dan berukuran 1280*500 px</span>
            </div>
  
            <div class="col s12 warn" style="display:none;">
              <center>
                <span style="color:red;">Anda akan melakukan downgrade, ke paket <b>Free</b> pastikan anda benar-benar yakin dengan pilihan anda..</span>
              </center>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="bottom:0px; position: absolute;">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">close</a>
        <button type="submit" form="myform0" class="btn">Agree</button>
      </div>
      </form>
    </div>



@endsection

@section('jsplus')
<script>
  function showPhoto(foto) {
    $('#fotoo').attr('src',foto);
  }
  function showEdit(title,link,id)
  {
    //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    document.getElementById('title').value = title;
    document.getElementById('link').value = link;
    document.getElementById('idBanner').value = id;

  };
  function modalDelete(id)
  {
    //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    document.getElementById('updateId').value = id;

  }

</script>
@endsection







