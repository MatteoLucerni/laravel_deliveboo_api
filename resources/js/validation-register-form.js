//form button
const registerButton = document.getElementById("register-button");
registerButton.addEventListener("click", function (event) {
    //errors flag
    let hasErrors = false;
    //name
    const nameField = document.getElementById("name");
    const nameFieldValue = nameField.value;
    //check
    const typeCheckboxes = document.querySelectorAll(
        '.type-input[type="checkbox"]:checked'
    );
    const selectedTypeIds = Array.from(typeCheckboxes)
        .filter((checkbox) => checkbox.checked)
        .map((checkbox) => checkbox.value);
    //email
    const emailField = document.getElementById("email");
    const emailFieldValue = emailField.value;
    // check @ are in email
    const containsAtSymbol = /@/.test(emailFieldValue);

    //password and confirm password
    const passwordField = document.getElementById("password");
    const passwordFieldValue = passwordField.value;
    const confirmPasswordField = document.getElementById("password-confirm");
    const confirmPasswordFieldValue = confirmPasswordField.value;

    //restaurant name
    const restaurantNameField = document.getElementById("restaurant-name");
    const restaurantNameFieldValue = restaurantNameField.value;
    // restaurant adddress
    const addressField = document.getElementById("address");
    const addressFieldValue = addressField.value;
    // vat number
    const vatNumberField = document.getElementById("vat-number");
    const vatNumberFieldValue = vatNumberField.value;
    // phone number
    const phoneNumberField = document.getElementById("phone-number");
    const phoneNumberFieldValue = phoneNumberField.value;
    //stop default event
    event.preventDefault();
    //clear errors
    clearErrors();

    //validation user
    //--------------//
    //name
    nameField.classList.remove("is-invalid");
    if (nameFieldValue === null || nameFieldValue === "") {
        nameField.classList.add("is-invalid");
        document.getElementById("name-error").textContent = "name is required";
        hasErrors = true;
    }
    //email
    emailField.classList.remove("is-invalid");
    if (emailFieldValue === null || emailFieldValue === "") {
        emailField.classList.add("is-invalid");
        document.getElementById("email-error").textContent =
            "email is required ";
        hasErrors = true;
    }
    emailField.classList.remove("is-invalid");
    if (!containsAtSymbol) {
        emailField.classList.add("is-invalid");
        document.getElementById("email-error-text").textContent =
            ' email required "@"';
        hasErrors = true;
    }
    //password
    passwordField.classList.remove("is-invalid");
    confirmPasswordField.classList.remove("is-invalid");
    if (passwordFieldValue === null || passwordFieldValue === "") {
        passwordField.classList.add("is-invalid");
        confirmPasswordField.classList.add("is-invalid");

        document.getElementById("password-error").textContent =
            "password is required";
        hasErrors = true;
    }
    passwordField.classList.remove("is-invalid");
    confirmPasswordField.classList.remove("is-invalid");
    if (passwordFieldValue.length < 8) {
        passwordField.classList.add("is-invalid");
        confirmPasswordField.classList.add("is-invalid");

        document.getElementById("password-error-length").textContent =
            "password must be at least 8 characters";
        document.getElementById("confirm-password-error-length").textContent =
            "password must be at least 8 characters";
        hasErrors = true;
    }

    if (confirmPasswordFieldValue != passwordFieldValue) {
        document.getElementById("password-error-match").textContent =
            "password didn't match";
        document.getElementById("confirm-password-error-match").textContent =
            "password didn't match";
        hasErrors = true;
    }

    // validation restaurant

    //name
    restaurantNameField.classList.remove("is-invalid");
    if (restaurantNameFieldValue === null || restaurantNameFieldValue === "") {
        restaurantNameField.classList.add("is-invalid");
        document.getElementById("restaurant-name-error").textContent =
            "restaurant name is required";
        hasErrors = true;
    }
    //address
    addressField.classList.remove("is-invalid");
    if (addressFieldValue === null || addressFieldValue === "") {
        addressField.classList.add("is-invalid");
        document.getElementById("restaurant-address-error").textContent =
            "restaurant address is required";
        hasErrors = true;
    }
    //vat-number
    vatNumberField.classList.remove("is-invalid");
    if (vatNumberFieldValue === null || vatNumberFieldValue === "") {
        vatNumberField.classList.add("is-invalid");
        document.getElementById("restaurant-vat-number-error").textContent =
            "restaurant vat-number is required";
        hasErrors = true;
    }
    vatNumberField.classList.remove("is-invalid");
    if (vatNumberFieldValue.length != 13) {
        vatNumberField.classList.add("is-invalid");
        document.getElementById(
            "restaurant-vat-number-error-length"
        ).textContent = " / restaurant vat-number must be 13 characters";
        hasErrors = true;
    }
    //phone-number
    phoneNumberField.classList.remove("is-invalid");
    if (phoneNumberFieldValue === null || phoneNumberFieldValue === "") {
        phoneNumberField.classList.add("is-invalid");
        document.getElementById("restaurant-phone-number-error").textContent =
            "restaurant phone number is required";
        hasErrors = true;
    }
    phoneNumberField.classList.remove("is-invalid");
    if (phoneNumberFieldValue.length != 10) {
        phoneNumberField.classList.add("is-invalid");
        document.getElementById(
            "restaurant-phone-number-error-length"
        ).textContent = " / restaurant phone-number must be 10 characters";
        hasErrors = true;
    }
    //type
    if (!selectedTypeIds.length) {
        document.getElementById("type-error").textContent =
            "Choosing at least one type is mandatory";
        hasErrors = true;
    }

    //send form to db
    if (hasErrors) {
        return;
    }

    const submitForm = document.getElementById("submit-form");

    submitForm.submit();
    console.log("form inviato");
});

function clearErrors() {
    document.getElementById("name-error").textContent = "";
    document.getElementById("email-error").textContent = "";
    document.getElementById("email-error-text").textContent = "";
    document.getElementById("password-error").textContent = "";
    document.getElementById("password-error-length").textContent = "";
    document.getElementById("confirm-password-error-length").textContent = "";
    document.getElementById("password-error-match").textContent = "";
    document.getElementById("restaurant-name-error").textContent = "";
    document.getElementById("restaurant-address-error").textContent = "";
    document.getElementById("restaurant-vat-number-error").textContent = "";
    document.getElementById("restaurant-phone-number-error").textContent = "";
    document.getElementById("confirm-password-error-match").textContent = "";
    const typeError = document.getElementById("type-error");
    typeError.textContent = "";
}
