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
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Company List</h6>
          <button type="button" data-toggle="modal" data-target="#companyModal" class="btn btn-info btn-round" style="float: right;position: relative;margin: -41px 12px 0 0;">
            <i class="material-icons">add_circle_outline</i>
            tambah company
            <div class="ripple-container"></div>
          </button>
        </div>
      </div>
      <div class="card-body px-3 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center table-borderless mb-0" id="dataTable">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Company Name</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
              </tr>
            </thead>
              <tbody>
                @foreach ($company as $item)
                  <tr>  
                    <td>
                      <h6 class="text-center mb-0 text-sm">{{$item->company_short}}</h6>
                    </td>
                    <td>
                      <h6 class="text-center mb-0 text-sm">{{$item->company_long}}</h6>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <form action="{{url('master/company/delete/'. $item->id)}}" method="POST">
                        {{ csrf_field() }}
                        <button type="button" toggle="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#companyModalupdate{{$item->id}}" class="btn btn-link text-dark px-3 mb-0 btn-sm" ><i class="material-icons text-sm me-2">edit</i></button>
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
@include('master/modal/company_modalUpdate')
@include('master/modal/company_modal')
@endsection