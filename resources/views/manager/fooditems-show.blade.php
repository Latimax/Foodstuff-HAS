@extends('manager.layouts.layout')

@section('title', 'Manager | Food Item Details')

@section('content')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Food Item Details</h5>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('manager.fooditems.update', $foodItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Food Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Food Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $foodItem->name }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $foodItem->price }}" required>
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Inventory -->
                        <div class="mb-3">
                            <label for="inventory" class="form-label">Inventory</label>
                            <input type="number" class="form-control" id="inventory" name="inventory" value="{{ $foodItem->inventory }}" required>
                            @error('inventory')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Unit -->
                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="bag" {{ $foodItem->unit == 'bag' ? 'selected' : '' }}>bag</option>
                                <option value="cup" {{ $foodItem->unit == 'cup' ? 'selected' : '' }}>cup</option>
                                <option value="kg" {{ $foodItem->unit == 'kg' ? 'selected' : '' }}>kg</option>
                                <option value="bundle" {{ $foodItem->unit == 'bundle' ? 'selected' : '' }}>bundle</option>
                                <option value="pack" {{ $foodItem->unit == 'pack' ? 'selected' : '' }}>pack</option>
                                <option value="roll" {{ $foodItem->unit == 'roll' ? 'selected' : '' }}>roll</option>
                                <option value="carton" {{ $foodItem->unit == 'carton' ? 'selected' : '' }}>carton</option>
                                <option value="pcs" {{ $foodItem->unit == 'pcs' ? 'selected' : '' }}>pcs</option>
                                <option value="keg" {{ $foodItem->unit == 'keg' ? 'selected' : '' }}>keg</option>
                            </select>
                            @error('unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Update Button -->
                        <button type="submit" class="btn btn-primary">Update Food Item</button>

                        <!-- Delete Food Item -->
                        <a href="{{ route('manager.fooditems.delete', $foodItem->id) }}" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this food item? This action cannot be undone.')">
                            Delete Food Item
                        </a>

                        <a href="{{ route('manager.fooditems.index') }}" class="btn btn-outline-primary">Go Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
