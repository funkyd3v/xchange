@extends('admin.master')

@section('content')
<div class="card card-primary col-md-8">
    <div class="card-header">
      <h3 class="card-title">Edit Currency</h3>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.currency.update', ['currency' => $currency->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Currency Name</label>
              <input type="text" name="name" class="form-control" value="{{ $currency->name }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>Currency Amount</label>
              <input type="text" name="amount" class="form-control" value="{{ $currency->amount }}">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Corrent Currency Image</label>
                @if ($currency->image !== null)
                <img src="{{ asset($currency->image) }}" alt="image" width="100px" height="100px">
                @else
                    <p>No Image Found</p>
                @endif
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Upload Currency Image</label>
                <div class="custom-file mb-3">   
                  <input type="file" class="custom-file-input" id="customFile" name="image">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="mt-3">
                  <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 100px; height: 90px;"/>
              </div>
            </div>
         </div>
        <div class="row">
            <div class="col-sm-12" >
                <button type="submit" class="btn btn-success">Update Currency</button>
            </div>
        </div>
      </form>
    </div>
</div>

@endsection

@section('custom-js')
<script>
  $(document).ready(function () {
      $('#customFile').on('change', function (e) {
          var fileName = e.target.files[0].name;
          $(this).next('.custom-file-label').html(fileName);
          
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imagePreview').attr('src', e.target.result);
              $('#imagePreview').show();
          }
          reader.readAsDataURL(e.target.files[0]);
      });
  });
</script>
@endsection