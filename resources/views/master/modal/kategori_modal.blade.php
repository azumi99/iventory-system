@foreach ($kategori as $value)
<div class="modal fade" id="kategoriModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kategori Update</h5>
          <button type="button" class="btn btn-link text-dark px-3 mb-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('master/kategori/update/'.$value->id)}}" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">    
            <div class="form-group">
                {{Form::label('Nama Kategori')}}
                {{Form::text('kategori',$value->nama_kat,['class' => 'form-control', 'autocomplete' => 'off'])}}
            </div>
            <div class="form-group">
                {{Form::label('Status')}}
                {{Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], $value->status_kat ,['class' => 'form-control'])}}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endforeach