@extends('layouts.admin')
@php
    // $profile=asset(Storage::url('uploads/avatar/'));
    // $profile=\App\Models\Utility::get_file('uploads/avatar');
@endphp
@section('page-title')
    {{ __('Perawat') }}
@endsection
@push('script-page')
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item">
        {{--  <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>  --}}
    </li>
    <li class="breadcrumb-item">{{ __('Management Perawat') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-4">
                        <div class="card-body table-border-style">
                            <h5></h5>
                            <div class="table-responsive">
                                <table class="table" id="data-table">
                                    <thead>
                                        <tr>
                                            <th> {{ __('Kode Perawat') }}</th>
                                            <th>{{ __('Nama') }}</th>
                                            @if (Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice'))
                                                <th>{{ __('Action') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script type="text/javascript">
        var table = $('#data-table').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'pdf', 'print',
            ],
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('perawat.index') }}",

            },
            columns: [{
                    data: "kode_perawat",
                    name: "kode_perawat",
                },
                {
                    data: "nama",
                    name: "nama",
                },
                {
                    data: "actions",
                    name: "actions",
                },


            ],
        });

        $(document).on('click', '#submit-filter', function(e) {
            table.draw();
        })
    </script>
@endpush
