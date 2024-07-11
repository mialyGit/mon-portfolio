@extends('layouts.master')

@push('page_title')
    @lang('Portfolio')
@endpush

@section('content')
    <x-shared.head title="Portfolio" />

    <div class="row mb-2">

        @forelse ($titles as $title)
            <div class="col col-md-4 col-sm-6">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">{{ $title->name }}</h3>
                        {{-- <div class="btn-group">
                            <a class="btn btn-primary" href="#"><i class="fa fa-lg fa-trash"></i></a>
                        </div> --}}
                    </div>
                    <div class="tile-body">{{ $title->intro }}</div>
                    <div class="tile-footer">
                        <a class="btn btn-primary" href="#">Activate</a>
                        <a class="btn btn-secondary"
                            href="{{ route('dashboard.portfolio.edit', ['portfolio' => $title->id]) }}">Details</a>
                    </div>
                </div>
            </div>
        @empty
            no data
        @endforelse
    </div>
@endsection
