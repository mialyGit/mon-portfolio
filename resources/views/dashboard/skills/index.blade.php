@extends('layouts.master')

@push('page_title')
    @lang('Skills')
@endpush

@push('js')
    @include('scripts.datatable-script')
@endpush

@section('content')
    <x-shared.head title="Skills" />

    <div class="row mb-2">
        <div class="col col-md-4">
            <select class="form-control" id="type-media">
                <option></option>
            </select>
        </div>
        <div class="col text-right">
            <x-buttons.add href="{{ route('dashboard.skills.create') }}"></x-buttons.add>
        </div>
    </div>

    <x-datatables :data="[
        ['header' => '', 'name' => 'dt_image', 'width' => '10%'],
        ['header' => 'Techno', 'name' => 'name'],
        ['header' => 'Visibility', 'name' => 'dt_is_visible'],
    ]" />
@endsection
