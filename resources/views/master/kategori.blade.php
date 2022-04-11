@extends('template.main')
@section('title', 'Kategori')
@section ('content')
<div class="row">
  @if (!empty($errors->all()))
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
      @foreach ($errors->all() as $error)
        <span class="text-sm">{{$error}}</span><br>
      @endforeach
      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif
  @if (Session::has('message'))
    <div class="alert alert-success alert-dismissible text-white" role="alert">
      <span class="text-sm">
        {{Session::get('message')}}
      </span>
      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif
  <div class="col-md-8">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Tambah Kategori</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('master/kategori/simpan')}}" method="POST">
               {{ csrf_field() }}
               <div class="form-group">
                 {{Form::label('Nama Kategori')}}
                 {{Form::text('kategori', null, ['class' => 'form-control', 'autocomplete' => 'off'])}}
               </div>
               <div class="form-group">
                 {{Form::label('Status')}}
                 {{Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'],'Active',['class' => 'form-control'] )}}
               </div>
               <div class="form-group mt-4 ">
                 <button type="submit" class="btn bg-gradient-primary nani">Simpan</button>
               </div>
            </form>
        </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card my-4">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">confirmation_number</i>
            </div>
            <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Kategori Active</p>
                <h4 class="mb-0">{{$countActive}} Active</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$countInactive}} </span>Inactive</p>
        </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Kategori List</h6>
        </div>
      </div>
      <div class="card-body px-3 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center table-borderless mb-0" id="dataTable">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
              </tr>
            </thead>
              <tbody>
                @foreach ($kategori as $item)
                  <tr>  
                    <td>
                      <h6 class="text-center mb-0 text-sm">{{$item->nama_kat}}</h6>
                    </td>
                    <td>
                      <p class="text-center text-xs font-weight-bold mb-0">{{$item->status_kat}}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <form action="{{url('master/kategori/delete/'. $item->id)}}" method="POST">
                        {{ csrf_field() }}
                        <button type="button" toggle="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#kategoriModal{{$item->id}}" class="btn btn-link text-dark px-3 mb-0 btn-sm" ><i class="material-icons text-sm me-2">edit</i></button>
                        <button type="submit" toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-link text-danger px-3 mb-0 btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini?')" ><i class="material-icons text-sm me-2">delete</i></button>
                      </form>
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

     
          
        

@include('master/modal/kategori_modal')
@endsection