@extends('admin.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Currencies</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Currency Name</th>
                                    <th>Currency Amount</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    {{-- <th style="width: 40px">Label</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currencies as $currency)
                                <tr>
                                    <td>{{ $currency->id }}</td>
                                    <td>{{ $currency->name }}</td>
                                    <td>{{ $currency->amount }}</td>
                                    <td>
                                        {{-- @if ($currency->image !== null)
                                        <a href="{{ asset($currency->image) }}" target="_blank">Show Image</a>
                                        @else
                                        <span>No Image</span>
                                        @endif --}}
                                        @if ($currency->image !== null)
                                        <img src="{{ asset($currency->image) }}" alt="image" width="60px" height="40px" />
                                        @else
                                        <span>No Image</span>
                                        @endif
                                    </td>
                                    {{-- <td><span class="badge bg-danger">55%</span></td> --}}
                                    <td>
                                        <a href="{{ route('admin.currency.edit', ['currency' => $currency->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.currency.delete', ['currency' => $currency->id]) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection