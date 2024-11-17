@extends('admin.layouts.layout')

@section('title', 'Admin | Generate Report')

@section('content')
<!-- Include DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Food Items List</h5>
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
                                    <h6 class="fw-semibold mb-0">Id</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Name</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Price</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Inventory</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Unit</h6>
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($foodItems as $foodItem)
                                <tr class="">
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{ $foodItem->id }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{ $foodItem->name }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $settings->currency }}{{ number_format($foodItem->price, 2) }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $foodItem->inventory }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $foodItem->unit }}</p>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No food items found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Include PDFMake and JSZip (for CSV export) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

@endsection

@section('script')
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
      $('.table').DataTable({
        "ordering": true,
        "paging": true,
        "searching": true,
        "info": true,
        dom: 'Bfrtip', // This tells DataTables to use buttons
        buttons: [
          'copy',      // Copy to clipboard
          'csv',       // CSV export
          'excel',     // Excel export
          'pdf',       // PDF export
          'print'      // Print button
        ]
      });
    });
  </script>
  
@endsection