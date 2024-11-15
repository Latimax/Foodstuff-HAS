@extends('manager.layouts.layout')

@section('title', 'Manager | Generate Voucher')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Generate Voucher</h5>
                    <div class="card">
                        <div class="card-body">

                            <!-- Session Message -->
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <form action="{{ route('manager.vouchers.store') }}" method="POST">
                                @csrf

                                <!-- Food Item ID -->
                                <div class="mb-3">
                                    <label for="food_item_id" class="form-label">Food Item ID</label>
                                    <select class="form-control" id="food_item_id" name="food_item_id">
                                        <option value="">Select a Food Item</option>
                                        @foreach ($foodItems as $foodItem)
                                            <option value="{{ $foodItem->id }}"
                                                {{ old('food_item_id') == $foodItem->id ? 'selected' : '' }}>
                                                {{ $foodItem->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('food_item_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Code -->
                                <div class="mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        value="{{ $code }}" readonly>
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Expiry Date -->
                                <div class="mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                        value="{{ old('expiry_date') }}">
                                    @error('expiry_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Amount -->
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount"
                                        value="{{ old('amount') }}" step="0.01">
                                    @error('amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Is Redeemed -->
                                <div class="mb-3">
                                    <label for="is_redeemed" class="form-label">Is Redeemed</label>
                                    <select class="form-control" id="is_redeemed" name="is_redeemed">
                                        <option value="0" {{ old('is_redeemed') == '0' ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('is_redeemed') == '1' ? 'selected' : '' }}>Yes
                                        </option>
                                    </select>
                                    @error('is_redeemed')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Generate Voucher</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection