@extends('manager.layouts.layout')

@section('title', "Manager | Add Food Item")

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Add Food Item</h5>
                <div class="card">
                    <div class="card-body">
                        
                        <!-- Session Message -->
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ route('manager.fooditems.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Food Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Food Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price') }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Inventory -->
                            <div class="mb-3">
                                <label for="inventory" class="form-label">Inventory</label>
                                <input type="number" class="form-control" id="inventory" name="inventory" value="{{ old('inventory') }}">
                                @error('inventory')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Unit -->
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                <select class="form-control" id="unit" name="unit">
                                    <option value="bag">bag</option>
                                    <option value="cup">cup</option>
                                    <option value="kg">kg</option>
                                    <option value="bundle">bundle</option>
                                    <option value="pack">pack</option>
                                    <option value="roll">roll</option>
                                    <option value="carton">carton</option>
                                    <option value="pcs">pcs</option>
                                    <option value="keg">keg</option>
                                </select>
                                @error('unit')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Food Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
