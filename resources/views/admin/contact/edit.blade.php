@extends('admin.master')

@section('content')
<div class="card card-primary col-md-8">
    <div class="card-header">
      <h3 class="card-title">Edit Contact</h3>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.contacts.update', ['contact' => $contact->id]) }}">
        @csrf
        @method('patch')
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Contact Name</label>
              <input type="text" name="name" class="form-control" value="{{ $contact->name }}" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>Contact Username/Handler</label>
              <input type="text" name="handler" class="form-control" value="{{ $contact->handler }}">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12" >
                <button type="submit" class="btn btn-success">Update Contact</button>
            </div>
        </div>
      </form>
    </div>
</div>

@endsection
