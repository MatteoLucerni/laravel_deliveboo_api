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