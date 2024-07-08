@extends('admin.master')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create New rate</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form method="POST" action="{{ route('admin.rate.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Select Currency</label>
                    <select class="form-control select2" name="currency_id" style="width: 100%;">
                        @foreach ($currencies as $currency)
                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Buy Rate</label>
              <input type="text" name="buy_rate" class="form-control" placeholder="Enter buy rate">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Sale Rate</label>
              <input type="text" name="sale_rate" class="form-control" placeholder="Enter sale rate">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12" >
                <button type="submit" class="btn btn-success">Create Rate</button>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection