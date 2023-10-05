@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate
                            id="submit-form">
                            @csrf

                            <h3>Profile info</h3>
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}
                                    <sup class="text-danger">*</sup></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <small class="text-danger" id="name-error"></small>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <sup
                                        class="text-danger">*</sup></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    <small class="text-danger" id="email-error"></small>
                                    <small class="text-danger" id="email-error-text"></small>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password ') }}
                                    <sup class="text-danger">*</sup></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <small class="text-danger" id="password-error"></small>
                                    <small class="text-danger" id="password-error-match"></small>
                                    <small class="text-danger" id="password-error-length"></small>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <sup
                                        class="text-danger">*</sup></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <small class="text-danger" id="confirm-password-error"></small>
                                    <small class="text-danger" id="confirm-password-error-match"></small>
                                    <small class="text-danger" id="confirm-password-error-length"></small>
                                </div>
                            </div>

                            <h3 class="mb-4">Restaurant info</h3>

                            <div class="mb-4 row">
                                <label for="restaurant-name" class="col-md-4 col-form-label text-md-right">Restaurant
                                    name <sup class="text-danger">*</sup></label>

                                <div class="col-md-6">
                                    <input id="restaurant-name" type="text" class="form-control" name="restaurantName"
                                        value="{{ old('restaurantName') }}" required>
                                    <small class="text-danger" id="restaurant-name-error"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address <sup
                                        class="text-danger">*</sup></label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required
                                        value="{{ old('address') }}">
                                    <small class="text-danger" id="restaurant-address-error"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat-number" class="col-md-4 col-form-label text-md-right">Vat number <sup
                                        class="text-danger">*</sup></label>

                                <div class="col-md-6">
                                    <input id="vat-number" value="{{ old('vatNumber') }}" type="text"
                                        class="form-control" name="vatNumber" required>
                                    <small class="text-danger" id="restaurant-vat-number-error"></small>
                                    <small class="text-danger" id="restaurant-vat-number-error-length"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="phone-number" class="col-md-4 col-form-label text-md-right">Phone
                                    number <sup class="text-danger">*</sup></label>

                                <div class="col-md-6">
                                    <input id="phone-number" value="{{ old('phoneNumber') }}" type="text"
                                        class="form-control" name="phoneNumber" required>
                                    <small class="text-danger" id="restaurant-phone-number-error"></small>
                                    <small class="text-danger" id="restaurant-phone-number-error-length"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    <input id="image" value="{{ old('image') }}" type="file"
                                        class="form-control" name="image" required>
                                    <small class="text-danger" id="restaurant-image-error"></small>
                                    <small class="text-danger" id="restaurant-image-error-length"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                    <small class="text-danger" id="restaurant-description-error"></small>
                                    <small class="text-danger" id="restaurant-description-error-length"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="form-label">Types <sup class="text-danger">*</sup></label>
                                <div>
                                    @foreach ($types as $type)
                                        <div class="form-check form-check-inline">
                                            <input @if (in_array($type->id, old('type', $restaurant_type_ids ?? []))) checked @endif
                                                class="form-check-input type-input" type="checkbox"
                                                id="tech-{{ $type->id }}" value="{{ $type->id }}"
                                                name="types[]" data-id="{{ $type->id }}">
                                            <label class="form-check-label"
                                                for="tech-{{ $type->id }}">{{ $type->name }}</label>
                                        </div>
                                    @endforeach
                                    @error('types')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small class="text-danger" id="type-error"></small>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="register-button">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- script --}}
@section('scripts')
    @vite('resources/js/validation-register-form.js')
@endsection
