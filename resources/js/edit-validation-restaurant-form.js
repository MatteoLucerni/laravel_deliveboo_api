const editButton = document.getElementById("edit-button");

editButton.addEventListener("click", function (event) {
    //errors flag
    let hasErrors = false;
   
    //check
    const typeCheckboxes = document.querySelectorAll('.form-check-input[name="types[]"]:checked');
    const selectedTypeIds = Array.from(typeCheckboxes).map((checkbox) => checkbox.value);
    //restaurant name
    const restaurantNameField = document.getElementById("name");
    const restaurantNameFieldValue = restaurantNameField.value;
    // restaurant adddress
    const addressField = document.getElementById("address");
    const addressFieldValue = addressField.value;
    // vat number
    const vatNumberField = document.getElementById("vat_number");
    const vatNumberFieldValue = vatNumberField.value;
    // phone number
    const phoneNumberField = document.getElementById("phone_number");
    const phoneNumberFieldValue = phoneNumberField.value;
     //stop default event
    event.preventDefault();
    //clear errors
    clearErrors();

    //restaurant validate
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
    document.getElementById("restaurant-name-error").textContent = "";
    document.getElementById("restaurant-address-error").textContent = "";
    document.getElementById("restaurant-vat-number-error").textContent = "";
    document.getElementById("restaurant-vat-number-error-length").textContent = "";
    document.getElementById("restaurant-phone-number-error").textContent = "";
    const typeError = document.getElementById("type-error");
    typeError.textContent = "";
}

