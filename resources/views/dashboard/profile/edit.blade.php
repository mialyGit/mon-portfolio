@extends('layouts.master')

@push('page_title')
    @lang('My Profile')
@endpush

@push('js')
    <!-- Jquery Validation -->
    @include('scripts.validate-form')

    <script>
        const rules = 
        {
            "firstname": {
                required: !0
            },
            "email": {
                required: !0,
                email: !0
            },
            "address": {
                required: !0
            },
            "phone_1": {
                required: !0
            },
            "phone_2": {
                required: !0
            },
        };

        const messages = {
            "firstname": "@lang('Please provide your firstname')",
            "email": "@lang('Please provide your email')",
            "address": "@lang('Please provide your address')"
        };

        setValidateForm(rules, messages);
        
    </script>
@endpush

@section('content')

<x-shared.head title="My Profile" />

<div class="card mt-4">  
    <div class="card-body">
        <div class="basic-form">
            <form class="form-valide" method="POST" action="{{ route('dashboard.profile.save') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <x-forms.input label="Firstname" model="firstname" value="{{ $profile->firstname }}"></x-forms.input>
                    </div>
                    <div class="form-group col-md-6">
                        <x-forms.input label="Name" model="name" value="{{ $profile->name }}"></x-forms.input>
                    </div>
                    <div class="form-group col-md-6">
                        <x-forms.input label="Email" model="email" type="email" value="{{ $profile->email }}"></x-forms.input>
                    </div>
                    <div class="form-group col-md-6">
                        <x-forms.input label="Address" model="address" value="{{ $profile->address }}"></x-forms.input>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <x-forms.input label="Phone number 1" model="phone_1" value="{{ $profile->phone_1 }}"></x-forms.input>
                    </div>

                    <div class="form-group col-md-6">
                        <x-forms.input label="Phone number 2" model="phone_2" value="{{ $profile->phone_2 }}"></x-forms.input>
                    </div>
                </div>  
                <button type="submit" class="btn btn-primary mt-4">@lang('Save')</button>
            </form>
        </div>
    </div>
</div>

@endsection