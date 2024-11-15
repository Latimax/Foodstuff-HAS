@extends('admin.layouts.layout')

@section('title', "Admin | Settings")

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Update Settings</h5>
                <div class="card">
                    <div class="card-body">
                        
                        <!-- Session Message -->
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST') <!-- Adjust this if you need PUT for updates -->

                            <!-- SMTP User -->
                            <div class="mb-3">
                                <label for="smtp_user" class="form-label">SMTP User</label>
                                <input type="text" class="form-control" id="smtp_user" name="smtp_user" value="{{ old('smtp_user', $settings->smtp_user) }}">
                                @error('smtp_user')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- SMTP Host -->
                            <div class="mb-3">
                                <label for="smtp_host" class="form-label">SMTP Host</label>
                                <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="{{ old('smtp_host', $settings->smtp_host) }}">
                                @error('smtp_host')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- SMTP Password -->
                            <div class="mb-3">
                                <label for="smtp_password" class="form-label">SMTP Password</label>
                                <input type="password" class="form-control" id="smtp_password" name="smtp_password" value="{{ old('smtp_password', $settings->smtp_password) }}">
                                @error('smtp_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Currency -->
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <input type="text" class="form-control" id="currency" name="currency" value="{{ old('currency', $settings->currency) }}">
                                @error('currency')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Site Name -->
                            <div class="mb-3">
                                <label for="site_name" class="form-label">Site Name</label>
                                <input type="text" class="form-control" id="site_name" name="site_name" value="{{ old('site_name', $settings->site_name) }}">
                                @error('site_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Site Short Name -->
                            <div class="mb-3">
                                <label for="site_short_name" class="form-label">Site Short Name</label>
                                <input type="text" class="form-control" id="site_short_name" name="site_short_name" value="{{ old('site_short_name', $settings->site_short_name) }}">
                                @error('site_short_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Site Email -->
                            <div class="mb-3">
                                <label for="site_email" class="form-label">Site Email</label>
                                <input type="email" class="form-control" id="site_email" name="site_email" value="{{ old('site_email', $settings->site_email) }}">
                                @error('site_email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $settings->phone) }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Website -->
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $settings->website) }}">
                                @error('website')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $settings->address) }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Charges -->
                            <div class="mb-3">
                                <label for="charges" class="form-label">Charges</label>
                                <input type="number" class="form-control" id="charges" name="charges" step="0.01" value="{{ old('charges', $settings->charges) }}">
                                @error('charges')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Logo -->
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                                @error('logo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Favicon -->
                            <div class="mb-3">
                                <label for="favicon" class="form-label">Favicon</label>
                                <input type="file" class="form-control" id="favicon" name="favicon">
                                @error('favicon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Welcome Message -->
                            <div class="mb-3">
                                <label for="welcome_message" class="form-label">Welcome Message</label>
                                <textarea class="form-control" id="welcome_message" name="welcome_message">{{ old('welcome_message', $settings->welcome_message) }}</textarea>
                                @error('welcome_message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection