@extends('admin.layouts.layout')

@section('title', 'Admin | Users List')

@section('content')


    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Support List</h5>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Subject</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Sender</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Actions</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $request->subject }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $request->sender->name }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <span
                                                    class="badge rounded-3 fw-semibold {{ $request->status === 'resolved' ? 'bg-success' : 'bg-warning' }}">
                                                    {{ ucfirst($request->status) }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="{{ route('support.show', $request->id) }}"
                                                class="btn btn-sm btn-primary">View</a>
                                            <form action="{{ route('support.destroy', $request->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No support requests found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $('.table').DataTable({
        "ordering": true,
        "paging": true,
        "searching": true,
        "info": true,
      });
    });
  </script>
  
  @endsection