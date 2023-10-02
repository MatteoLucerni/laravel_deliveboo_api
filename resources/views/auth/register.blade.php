@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" novalidate>
                            @csrf

                            <h3>Profile info</h3>
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }} *</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus >
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
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} *</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" >
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
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password ') }} *</label>

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
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} *</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" >
                                        <small class="text-danger" id="confirm-password-error"></small>
                                        <small class="text-danger" id="confirm-password-error-match"></small>
                                        <small class="text-danger" id="confirm-password-error-length"></small>
                                </div>
                            </div>

                            <h3 class="mb-4">Restaurant info</h3>

                            <div class="mb-4 row">
                                <label for="restaurant-name" class="col-md-4 col-form-label text-md-right">Restaurant
                                    name *</label>

                                <div class="col-md-6">
                                    <input id="restaurant-name" type="text" class="form-control" name="restaurantName"
                                        required >
                                    <small class="text-danger" id="restaurant-name-error"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address *</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required >
                                    <small class="text-danger" id="restaurant-address-error"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat-number" class="col-md-4 col-form-label text-md-right">Vat number *</label>

                                <div class="col-md-6">
                                    <input id="vat-number" type="text" class="form-control" name="vatNumber" required >
                                    <small class="text-danger" id="restaurant-vat-number-error"></small>
                                    <small class="text-danger" id="restaurant-vat-number-error-length"></small>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="form-label">Types *</label>
                                <div>
                                    @foreach ($types as $type)
                                        <div class="form-check form-check-inline">
                                            <input @if (in_array($type->id, old('type', $restaurant_type_ids ?? []))) checked @endif class="form-check-input type-input"
                                                type="checkbox" id="tech-{{ $type->id }}" value="{{ $type->id }}"
                                                name="types[]">
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

    {{-- script --}}
    <script>
        const registerButton = document.getElementById('register-button');
        registerButton.addEventListener('click', function(event){
            //stop default event
            event.preventDefault();

            //name
            const nameField = document.getElementById('name');
            const nameFieldValue = nameField.value;

            //email
            const emailField = document.getElementById('email');
            const emailFieldValue = emailField.value;
            // check @ are in email
            const containsAtSymbol = /@/.test(emailFieldValue);

            //password and confirm password
            const passwordField = document.getElementById('password');
            const passwordFieldValue = passwordField.value;
            const confirmPasswordField = document.getElementById('password-confirm');
            const confirmPasswordFieldValue = confirmPasswordField.value;

            //restaurant name
            const restaurantNameField = document.getElementById('restaurant-name')
            const restaurantNameFieldValue = restaurantNameField.value
            // restaurant adddress
            const addressField = document.getElementById('address')
            const addressFieldValue = addressField.value
            // vat number
            const vatNumberField = document.getElementById('vat-number')
            const vatNumberFieldValue = vatNumberField.value
            // type 
            const typeCheckboxes = document.querySelectorAll('.type-input input[type="checkbox"]');
            const selectedTypes = Array.from(typeCheckboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.value);

            //validation user
            //--------------//
            //name
            if(nameFieldValue === null || nameFieldValue === ''){
                nameField.classList.add('is-invalid')
                document.getElementById('name-error').textContent = 'name is required'
            }
            //email
            if(emailFieldValue === null || emailFieldValue === ''){
                emailField.classList.add('is-invalid')
                document.getElementById('email-error').textContent = 'email is required '
            }
            if(!containsAtSymbol){
                emailField.classList.add('is-invalid')
                document.getElementById('email-error-text').textContent = ' email required "@"'
            }
            //password
            if(passwordFieldValue === null || passwordFieldValue === '' ){
                passwordField.classList.add('is-invalid')
                confirmPasswordField.classList.add('is-invalid')

                document.getElementById('password-error').textContent = 'password is required'
            }

            if(passwordFieldValue.length < 8){
                passwordField.classList.add('is-invalid')
                confirmPasswordField.classList.add('is-invalid')

                document.getElementById('password-error-length').textContent = 'password must be 8 characters'
                document.getElementById('confirm-password-error-length').textContent = 'password must be 8 characters'
            }

            if( confirmPasswordFieldValue != passwordFieldValue){
                document.getElementById('password-error-match').textContent = 'password didn\'t match'
                document.getElementById('confirm-password-error-match').textContent = 'password didn\'t match'
            }

            // validation restaurant

            //name
            if(restaurantNameFieldValue === null || restaurantNameFieldValue === ''){
                restaurantNameField.classList.add('is-invalid')
                document.getElementById('restaurant-name-error').textContent = 'restaurant name is required'
            }
            //address
            if(addressFieldValue === null || addressFieldValue === ''){
                addressField.classList.add('is-invalid')
                document.getElementById('restaurant-address-error').textContent = 'restaurant address is required'

            }
            //vat-number
            if(vatNumberFieldValue === null || vatNumberFieldValue === ''){
                vatNumberField.classList.add('is-invalid')
                document.getElementById('restaurant-vat-number-error').textContent = 'restaurant vat-number is required'
            }
            //types
            if(vatNumberFieldValue.length < 13){
                vatNumberField.classList.add('is-invalid')
                document.getElementById('restaurant-vat-number-error-length').textContent = 'restaurant vat-number must be 13 characters'
            }

            if (selectedTypes.length === 0) {
                document.getElementById('type-error').textContent = 'Choosing at least one type is mandatory'; 
            }
        })
    </script>
@endsection


