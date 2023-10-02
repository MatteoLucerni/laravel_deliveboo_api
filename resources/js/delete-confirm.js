const deleteForm = document.querySelectorAll(".delete-form");

deleteForm.forEach((form) => {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const orderName = form.dataset.name;
        const isConfirmed = confirm(`Are you sure deleting ${orderName}?`);
        if (isConfirmed) form.submit();
    });
});
