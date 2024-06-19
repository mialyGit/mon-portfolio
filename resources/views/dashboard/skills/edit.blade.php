@extends('layouts.master')

@push('page_title')
    @lang('Medias')
@endpush

@section('content')
    <x-shared.head title="Edit Skill" />

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form class="form-valide" method="POST"
                            action="{{ route('dashboard.skills.update', ['skill' => $skill->id]) }}">
                            @csrf
                            @method('PUT')

                            @include('dashboard.skills.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
