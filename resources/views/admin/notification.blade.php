@extends('admin.layouts.layout')

@section('title', 'Admin | Notification')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Admin Notification</h2>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <form action="{{ route('admin.notifications.update') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="title" class="form-label">Notification Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $notification->title ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" class="form-control" rows="4" required>{{ $notification->message ?? '' }}</textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="status" id="status" class="form-check-input" {{ isset($notification) && $notification->status ? 'checked' : '' }}>
                <label for="status" class="form-check-label">Activate Notification</label>
            </div>

            <button type="submit" class="btn btn-primary">Update Notification</button>
        </form>
    </div>
@endsection
