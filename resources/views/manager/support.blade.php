@extends('manager.layouts.layout')

@section('title', 'Manager | Support')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Send a Support Request</h5>
                    <div class="card">
                        <div class="card-body">

                            <div class="alert alert-success" role="alert">
                                <span class="font-wb">Admin Last Reply: </span> {{ $user->notification }}
                            </div>
                            <!-- Session Message -->
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <form action="{{ route('support.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection