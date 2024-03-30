@extends('layouts.master')

@push('page_title')
    @lang('My Profile')
@endpush

@push('css')
    <link href="{{ asset('assets/vendor/dropzone/theme.min.css') }}" rel="stylesheet">
    <style>
        .custom-control.image-checkbox label img {
            border-radius: 2.5px;
            transition: opacity 0.3s ease;
        }

        .custom-control {
            padding-left: 0 !important;
        }

        .custom-control:hover {
            opacity: 0.7;
        }

        .custom-control-label::before {
            left: 0.5rem !important;
        }

        .custom-control-label::after {
            left: 0.5rem !important;
        }

        .custom-control.image-checkbox label {
            cursor: pointer;
        }


        @media (min-width: 992px) {
            .modal-lg {
                max-width: 1019px !important;
            }
        }
    </style>
@endpush

@push('js')
    <!-- Jquery Validation -->
    @include('scripts.validate-form')
    @include('scripts.gallery')

    <script>
        const rules = {
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
                        <div class="form-group col">
                            <x-galleries label="Profile photo" model="profile_photo" :value="$galleries"
                                class="text-center"></x-galleries>
                        </div>
                        <div class="form-group col-md-9">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-forms.input label="Firstname" model="firstname"
                                        value="{{ $profile->firstname }}"></x-forms.input>
                                </div>
                                <div class="form-group col-md-12">
                                    <x-forms.input label="Name" model="name"
                                        value="{{ $profile->name }}"></x-forms.input>
                                </div>
                                <div class="form-group col-md-12">
                                    <x-forms.input label="Email" model="email" type="email"
                                        value="{{ $profile->email }}"></x-forms.input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="form-group col-md-12">
                            <x-forms.input label="Address" model="address" value="{{ $profile->address }}"></x-forms.input>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <x-forms.input label="Phone number 1" model="phone_1"
                                value="{{ $profile->phone_1 }}"></x-forms.input>
                        </div>

                        <div class="form-group col-md-6">
                            <x-forms.input label="Phone number 2" model="phone_2"
                                value="{{ $profile->phone_2 }}"></x-forms.input>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">@lang('Save')</button>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('Gallery')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="gallery-image-content">
                        {{-- Content of image here --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
                    <button type="button" class="btn btn-primary select-image">@lang('Select')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
