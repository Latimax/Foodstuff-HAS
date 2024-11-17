@extends('manager.layouts.layout')

@section('title', 'Manager | Announcement')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Latest Announcement</h2>
   

            <div class="mb-3">
                <input type="text" name="title" id="title" class="form-control text-success" value="{{ $notification->title ?? '' }}" readonly>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Announcement</label>
                <p> {{ $notification->message }}</p>
            </div>
            <hr>
            <div class="mb-3">
              <label for="title" class="form-label">Last Updated</label>
              <p> {{ $notification->updated_at }} </p>
          </div>
            
    </div>
@endsection
