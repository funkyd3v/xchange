@extends('admin.master')

@section('content')
<div class="card card-primary col-md-8">
    <div class="card-header">
      <h3 class="card-title">Edit Currency Rate</h3>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.rate.update', ['rate' => $rate->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Currency Name</label>
              <input type="text" name="name" class="form-control" value="{{ $rate->currency->name }}" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Buy Rate</label>
              <input type="text" name="buy_rate" class="form-control" value="{{ $rate->buy_rate }}">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Sale Rate</label>
                <input type="text" name="sale_rate" class="form-control" value="{{ $rate->sale_rate }}">
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-sm-12" >
                <button type="submit" class="btn btn-success">Update Rate</button>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection