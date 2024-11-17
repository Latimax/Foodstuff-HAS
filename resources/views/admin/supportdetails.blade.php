@extends('admin.layouts.layout')

@section('title', 'Admin | User Details')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Support Details</h5>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <h3>{{ $request->subject }}</h3>
                    <p>From: {{ $request->sender->name }}</p>
                    <p>Status: {{ ucfirst($request->status) }}</p>
                    <hr>
                    <p>{{ $request->message }}</p>

                    <h4>Replies:</h4>
                    @if (!empty($request->replies))
                        @foreach ($request->replies as $reply)
                            <div>
                                <strong>{{ $reply->sender->name }}</strong>: {{ $reply->message }}
                            </div>
                        @endforeach
                    @endif
                    <form action="{{ route('support.reply', $request->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="message" class="form-label">Reply</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Reply</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
