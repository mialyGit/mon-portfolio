@extends('layouts.master')

@push('page_title')
    @lang('Portfolio')
@endpush

@push('js')
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
    <script>
        Sortable.create(simpleList, {
            animation: 150,
        });
    </script>
@endpush

@section('content')
    <x-shared.head title="Edit portfolio" />

    <div class="tile mt-4">
        <div class="tile-body">
            <div class="tile-title-w-btn">
                <h3 class="title">@lang('Title')</h3>
            </div>
            <div class="basic-form">
                <form class="form-valide" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <x-forms.input label="Post name" model="name" value="{{ $title->name }}"></x-forms.input>
                        </div>
                        <div class="form-group col-md-12">
                            <x-forms.textarea label="Introduction" model="intro" value="{{ $title->intro }}"
                                rows="5"></x-forms.textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="tile mt-4">
        <div class="tile-body">
            <div class="tile-title-w-btn">
                <h3 class="title">@lang('Experiences')</h3>
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-plus mr-0"></i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="simpleList" class="list-group">
                        @forelse ($title->experiences as $experience)
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $experience->name }}</h5>
                                    <small class="text-muted">{{ $experience->between }}</small>
                                </div>
                                <p class="mb-1">{{ $experience->description }}</p>
                                <small class="text-muted">{{ $experience->address }}</small>
                            </a>
                        @empty
                            no data
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tile mt-4">
        <div class="tile-body">
            <div class="tile-title-w-btn">
                <h3 class="title">@lang('Projects')</h3>
            </div>

        </div>
    </div>
@endsection
