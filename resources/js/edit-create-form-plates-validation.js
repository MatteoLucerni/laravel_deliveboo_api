const submitButton = document.getElementById("submit-button");

submitButton.addEventListener("click", function (event) {
    //errors flag
    let hasErrors = false;
   
    //plate name
    const plateNameField = document.getElementById("plateName");
    const plateNameFieldValue = plateNameField.value;
    // price
    const platePriceField = document.getElementById("platePrice");
    const platePriceFieldValue = platePriceField.value;
    // ingredients
    const plateIngredientsField = document.getElementById("plateIngredients");
    const plateIngredientsFieldValue = plateIngredientsField.value;
   
     //stop default event
    event.preventDefault();
    //clear errors
    clearErrors();

    //restaurant validate
    //name
    plateNameField.classList.remove("is-invalid");
    if (plateNameFieldValue === null || plateNameFieldValue === "") {
        plateNameField.classList.add("is-invalid");
        document.getElementById("plate-name-error").textContent =
            "plate name is required";
        hasErrors = true;
    }
    //price
    platePriceField.classList.remove("is-invalid");
    if (platePriceFieldValue === null || isNaN(platePriceFieldValue)) {
        platePriceField.classList.add("is-invalid");
        document.getElementById("plate-price-error").textContent =
            "Price is not a number";
        hasErrors = true;
    }
    //ingredients
    plateIngredientsField.classList.remove("is-invalid");
    if (plateIngredientsFieldValue === null || plateIngredientsFieldValue === '') {
        plateIngredientsField.classList.add("is-invalid");
        document.getElementById(
            "plate-ingredients-error"
        ).textContent = " / ingredients are required";
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
    document.getElementById("plate-name-error").textContent = "";
    document.getElementById("plate-price-error").textContent = "";
    document.getElementById("plate-ingredients-error").textContent = "";
}