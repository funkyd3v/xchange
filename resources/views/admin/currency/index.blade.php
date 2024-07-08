@extends('admin.master')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create New Currency</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form method="POST" action="{{ route('admin.currency.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12">
          <label for="">Currency Type</label>
          <div class="flex items-center">
            <input checked id="default-radio-2" type="radio" value="1" name="dollar" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
          <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">USD</label>
        </div>
          <div class="flex items-center">
            <input id="default-radio-1" type="radio" value="0" name="dollar" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">BDT</label>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>Currency Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter currency name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>Currency Amount</label>
              <input type="text" name="amount" class="form-control" placeholder="Enter currency ammount">
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
                <button type="submit" class="btn btn-success">Create Currency</button>
            </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
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