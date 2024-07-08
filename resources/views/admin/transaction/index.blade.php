@extends('admin.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Transactions</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">User ID</th>
                                    <th>Name</th>
                                    <th>Send</th>
                                    <th>Receive</th>
                                    <th>Send Amount</th>
                                    <th>Receive Amount</th>
                                    <th>Payment Proof</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->user_id }}</td>
                                    <td>{{ $transaction->user->first_name }} {{ $transaction->user->last_name }} </td>
                                    <td>
                                        @php
                                            $send = App\Models\Currency::where('id', $transaction->send_currency)->first();
                                            $receive = App\Models\Currency::where('id', $transaction->receive_currency)->first();
                                        @endphp
                                        {{ $send->name }}</td>
                                    <td>{{ $receive->name }}</td>
                                    <td>{{ $transaction->send_currency_amount }}</td>
                                    <td>{{ $transaction->receive_currency_amount }}</td>
                                    <td>
                                        @if ($transaction->image !== null)
                                        <a href="{{ asset('') . $transaction->image }}" target="_blank">Show Image</a>
                                        @else
                                        <span>No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.transaction.update', ['id' => $transaction->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()">
                                                <option value="0" {{ $transaction->status == 0 ? 'selected' : ''
                                                    }}>Initiate</option>
                                                <option value="1" {{ $transaction->status == 1 ? 'selected' : ''
                                                    }}>Processing</option>
                                                <option value="2" {{ $transaction->status == 2 ? 'selected' : ''
                                                    }}>Complete</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y') }}
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