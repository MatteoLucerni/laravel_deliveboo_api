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
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus >
                                    <span class="text-danger" id="name-error"></span>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" >
                                        <span class="text-danger" id="email-error"></span>
                                        <span class="text-danger" id="email-error-text"></span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <span class="text-danger" id="password-error"></span>
                                    <span class="text-danger" id="password-error-match"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" >
                                        <span class="text-danger" id="confirm-password-error"></span>
                                        <span class="text-danger" id="confirm-password-error-match"></span>
                                </div>
                            </div>

                            <h3 class="mb-4">Restaurant info</h3>

                            <div class="mb-4 row">
                                <label for="restaurant-name" class="col-md-4 col-form-label text-md-right">Restaurant
                                    name</label>

                                <div class="col-md-6">
                                    <input id="restaurant-name" type="text" class="form-control" name="restaurantName"
                                        required >
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required >
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat-number" class="col-md-4 col-form-label text-md-right">Vat number</label>

                                <div class="col-md-6">
                                    <input id="vat-number" type="text" class="form-control" name="vatNumber" required >
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="form-label">Types</label>
                                <div>
                                    @foreach ($types as $type)
                                        <div class="form-check form-check-inline">
                                            <input @if (in_array($type->id, old('type', $restaurant_type_ids ?? []))) checked @endif class="form-check-input"
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
            if( confirmPasswordField != passwordField){
                document.getElementById('password-error-match').textContent = 'password didn\'t match'
                document.getElementById('confirm-password-error-match').textContent = 'password didn\'t match'
            }

            // validation restaurant
            if(passwordFieldValue === null || passwordFieldValue === '' || confirmPasswordField != passwordField){
                passwordField.classList.add('is-invalid')
                confirmPasswordField.classList.add('is-invalid')

                document.getElementById('confirm-password-error').textContent = 'confirm password is required'

            }
        })
    </script>
@endsection


