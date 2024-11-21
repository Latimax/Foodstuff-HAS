@extends('manager.layouts.layout')

@section('title', 'Order Details')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Order Details</h5>
                    <div class="card">
                        <div class="card-body">

                            <!-- Session Message -->
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <!-- Error Message -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <table class="table">
                                <tr>
                                    <th>Transaction Number</th>
                                    <td>{{ $order->transaction_number }}</td>
                                </tr>
                                <tr>
                                    <th>User</th>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>{{ $order->amount }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{{ $order->order_date }}</td>
                                </tr>
                                <tr>
                                    <th>Food Item</th>
                                    <td>{{ $order->foodItem->name }}</td>
                                </tr>
                                <tr>
                                    <th>Voucher</th>
                                    <td>{{ $order->voucher ? $order->voucher->code : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Amount Paid</th>
                                    <td>{{ $order->amount_paid }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <form action="{{ route('manager.order.updatestatus', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="form-select" required>
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                            <input type="hidden" name="order_id" value="{{ $order->id }}" >
                                            <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection