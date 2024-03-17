@extends('layouts.master')

@push('page_title')
    @lang('Medias')
@endpush

@push('js')
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
    <script>
        $("#type-media").select2({
            placeholder: "Filter by type",
            allowClear: true
        });
    </script>
@endpush

@section('content')
    <x-shared.head title="Medias" />

    <div class="row mb-2">
        <div class="col col-md-4">
            <select class="form-control" id="type-media">
                <option></option>
                <option value="AL">Image</option>
                <option value="WY">PDF</option>
            </select>
        </div>
        <div class="col text-right">
            <x-buttons.add href="{{ route('dashboard.medias.create') }}"></x-buttons.add>
        </div>
    </div>


    <x-datatables
        :data="[
            ['header' => '', 'name' => 'image', 'width' => '10%'],
            ['header' => 'Nom du fichier', 'name' => 'filename'],
            ['header' => 'Extension', 'name' => 'extension'],
            ['header' => 'Size', 'name' => 'size'],
            ['header' => 'Updated date', 'name' => 'updated_at'],
            ['header' => 'Type', 'name' => 'aggregate_type'],
        ]"
    />
@endsection