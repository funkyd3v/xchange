@extends('admin.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Currencies Rate</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Currency Name</th>
                                    <th>Buy Rate</th>
                                    <th>Sale Rate</th>
                                    <th>Action</th>
                                    {{-- <th style="width: 40px">Label</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rates as $rate)
                                <tr>
                                    <td>{{ $rate->id }}</td>
                                    <td>{{ $rate->currency->name }}</td>
                                    <td>{{ $rate->buy_rate }}</td>
                                    <td>{{ $rate->sale_rate }}</td>
                                    <td>
                                        <a href="{{ route('admin.rate.edit', ['rate' => $rate->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.rate.delete', ['rate' => $rate->id]) }}" class="btn btn-danger">Delete</a>
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