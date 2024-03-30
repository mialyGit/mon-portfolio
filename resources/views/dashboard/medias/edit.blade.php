@extends('layouts.master')

@push('page_title')
    @lang('Medias')
@endpush

@section('content')

    <x-shared.head title="Edit Media" />

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ $media->getUrl() }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ $media->image }}" alt="{{ $media->filename }}" style="width: 100%; height: 200px; object-fit: contain;">
                    </a>
                </div>
                <div class="card-body">
                    <p> <b> @lang('Filename')</b> : {{ $media->filename }} </p>
                    <p> <b> @lang('Size')</b> : {{ $media->human_readable_size }} </p>
                    <p> <b> @lang('Type')</b> : {{ $media->aggregate_type }} </p>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('File informations')</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form class="form-valide" method="POST" action="{{ route('dashboard.medias.update', ['media'=> $media->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-forms.input label="Filename" model="filename" value="{{ $media->filename }}" autofocus></x-forms.input>
                                </div>
                                <div class="form-group col-md-12">
                                    <x-forms.input label="Alt image" model="alt" value="{{ $media->alt }}"></x-forms.input>
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-buttons.save></x-buttons.save>
                                <x-buttons.cancel class="ml-2" href="{{ route('dashboard.medias.index') }}"></x-buttons.cancel>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection