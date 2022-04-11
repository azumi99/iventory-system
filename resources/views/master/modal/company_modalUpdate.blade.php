@foreach ($company as $value)
<div class="modal fade" id="companyModalupdate{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
          <button type="button" class="btn btn-link text-dark px-3 mb-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('master/company/update/'.$value->id)}}" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">    
            <div class="form-group">
                {{Form::label('Short Name Company')}}
                {{Form::text('company_short',$value->company_short,['class' => 'form-control', 'autocomplete' => 'off'])}}
            </div>
            <div class="form-group">
                {{Form::label('Long Name Company')}}
                {{Form::text('company_long', $value->company_long, ['class' => 'form-control', 'autocomplete' => 'off'])}}
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