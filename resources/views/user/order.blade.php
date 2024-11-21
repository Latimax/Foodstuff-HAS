@extends('user.layouts.layout')

@section('title', 'User | Order a Food Item')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Order a Food Item</h5>
                    <div class="card">
                        <div class="card-body">

                            <!-- Session Message -->
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="alert" id="message" role="alert" style="display: none;"></div>

                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="food_item" class="form-label">Food Item</label>
                                    <input type="text" class="form-control"
                                        value="{{ $foodItem->name }} - {{ $setting->currency . number_format($foodItem->price) }}"
                                        readonly>

                                    <input type="hidden" id="food_item" name="food_item_id" value="{{ $foodItem->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="voucher_code" class="form-label">Voucher Code</label>
                                    <input type="text" class="form-control" id="voucher_code" name="voucher_code">
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6"> <label for="subtotal" class="form-label">Subtotal</label>
                                            <input type="text" class="form-control" id="subtotal"
                                                value="{{ $setting->currency . number_format($foodItem->price) }}" readonly>
                                        </div>
                                        <div class="col-6"> <label for="discount" class="form-label">Discount</label>
                                            <input type="text" class="form-control" id="discount"
                                                value="{{ $setting->currency }}0.00" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="amount_paid" class="form-label">Amount to be Paid</label>
                                    <input type="text" class="form-control" id="amount_paid"
                                        value="{{ $setting->currency . number_format($foodItem->price) }}" readonly>
                                </div>
                                <button type="button" class="btn btn-secondary" id="check-voucher">Check Voucher</button>
                                <button type="submit" class="btn btn-primary">Submit Order</button>
                            </form>

                            <script>
                                document.getElementById('check-voucher').addEventListener('click', function() {
                                    const foodItemId = document.getElementById('food_item').value;
                                    const voucherCode = document.getElementById('voucher_code').value;

                                    fetch('{{ route('user.vouchers.check') }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({
                                                food_item_id: foodItemId,
                                                voucher_code: voucherCode
                                            })
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            const messageDiv = document.getElementById('message');
                                            const subtotal = parseFloat({{ $foodItem->price }});
                                            let discount = 0;
                                            if (data.valid) {
                                                discount = parseFloat(data.discount);
                                                messageDiv.className = 'alert alert-success';
                                                messageDiv.textContent = `Voucher is valid! Discount: $${discount.toFixed(2)}`;
                                            } else {
                                                messageDiv.className = 'alert alert-danger';
                                                messageDiv.textContent = data.message;
                                            }
                                            messageDiv.style.display = 'block';

                                            // Update the discount and amount to be paid fields
                                            document.getElementById('discount').value =
                                                `{{ $setting->currency }}${discount.toFixed(2)}`;
                                            document.getElementById('amount_paid').value =
                                                `{{ $setting->currency }}${(subtotal - discount).toFixed(2)}`;
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            const messageDiv = document.getElementById('message');
                                            messageDiv.className = 'alert alert-danger';
                                            messageDiv.textContent = 'An error occurred while checking the voucher.';
                                            messageDiv.style.display = 'block';
                                        });
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
