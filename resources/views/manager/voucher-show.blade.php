@extends('manager.layouts.layout')

@section('title', 'Manager | Voucher Details')

@section('content')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Voucher Details</h5>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('manager.vouchers.update', $voucher->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Voucher ID -->
                        <div class="mb-3">
                            <label for="voucher_id" class="form-label">Voucher ID</label>
                            <input type="text" class="form-control" id="voucher_id" name="voucher_id" value="{{ $voucher->id }}" readonly>
                        </div>

                        <!-- Food Item -->
                        <div class="mb-3">
                            <label for="food_item" class="form-label">Food Item</label>
                            <select class="form-control" id="food_item" name="food_item">
                                @foreach($foodItems as $foodItem)
                                    <option value="{{ $foodItem->id }}" {{ $voucher->food_item_id == $foodItem->id ? 'selected' : '' }}>
                                        {{ $foodItem->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Code -->
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $voucher->code }}" readonly>
                        </div>

                        <!-- Is Redeemed -->
                        <div class="mb-3">
                            <label for="is_redeemed" class="form-label">Is Redeemed</label>
                            <select class="form-control" id="is_redeemed" name="is_redeemed">
                                <option value="0" {{ $voucher->is_redeemed == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $voucher->is_redeemed == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>

                        <!-- Expiry Date -->
                        <div class="mb-3">
                            <label for="expiry_date" class="form-label">Expiry Date</label>
                            <input type="datetime" class="form-control" id="expiry_date" name="expiry_date" value="{{ $voucher->expiry_date }}">
                        </div>

                        <!-- Redeemed At -->
                        <div class="mb-3">
                            <label for="redeemed_at" class="form-label">Redeemed At</label>
                            <input type="datetime" class="form-control" id="redeemed_at" name="redeemed_at" value="{{ $voucher->redeemed_at }}">
                        </div>


                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="{{ $voucher->amount }}" step="0.01">
                        </div>

                        <!-- Update Button -->
                        <button type="submit" class="btn btn-primary">Update Voucher</button>

                        <!-- Delete Voucher -->
                        <a href="{{ route('manager.vouchers.delete', $voucher->id) }}" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this voucher? This action cannot be undone.')">
                            Delete Voucher
                        </a>

                        <a href="{{ route('manager.vouchers.index') }}" class="btn btn-outline-primary">Go Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection