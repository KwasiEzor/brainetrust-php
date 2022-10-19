const validateForm = (formId) => {
    // Grab all the required elements
    const form = document.querySelector(`#${formId}`);
    const formLabels = form.querySelectorAll("label");
    const inputs = form.querySelectorAll("input");
    // Loop through the inputs array
    inputs.forEach(function (item, index) {
        // Store the input type in a variable
        let inputType = item.getAttribute("type");
        // Store the input name in a variable
        let inputName = item.getAttribute("name");
        let errors = [];
        item.addEventListener("keyup", function () {
            // Text input validation
            if (inputType == "text" && inputName == "name") {
                let stringRegex = /[a-z]/;

                if (item.value === "") {
                    item.style.borderColor = "crimson";
                    errors.push({
                        errorInput: inputType,
                        message: " is required !",
                    });

                    errors.forEach((error) => {
                        console.log(
                            `Input ${error.errorInput} ${error.message}`
                        );
                    });
                }
                if (item.value.match(stringRegex)) {
                    item.style.borderColor = "green";
                }
            }
            // Email input validation
            if (inputType == "email" && inputName == "email") {
                let emailRegex =
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if (item.value === "") {
                    item.style.borderColor = "crimson";
                    errors.push({
                        errorInput: inputType,
                        message: " is required !",
                    });

                    errors.forEach((error) => {
                        console.log(
                            `Input ${error.errorInput} ${error.message}`
                        );
                    });
                }
                if (!item.value.match(emailRegex)) {
                    errors.push({
                        errorInput: inputType,
                        message: " must be valid !",
                    });

                    errors.forEach((error) => {
                        console.log(
                            `Input ${error.errorInput} ${error.message}`
                        );
                    });
                } else {
                    item.style.borderColor = "green";
                }
            }
            // Password input validation
            let password, confirmPassword;
            if (inputType == "password") {
                // Empty field
                if (item.value === "" && inputName === "password") {
                    item.style.borderColor = "crimson";
                    errors.push({
                        errorInput: inputType,
                        message: " is required !",
                    });

                    errors.forEach((error) => {
                        console.log(
                            `Input ${error.errorInput} ${error.message}`
                        );
                    });
                }
                // Password length check

                if (item.value.length < 8) {
                    item.style.borderColor = "crimson";
                    errors.push({
                        errorInput: inputType,
                        message: " must have minimum 8 characters!",
                    });

                    errors.forEach((error) => {
                        console.log(
                            `Input ${error.errorInput} ${error.message}`
                        );
                    });
                } else if (item.value.length >= 8) {
                    item.style.borderColor = "green";
                    password = item.value;
                }

                // Confirm password check
                else if (inputName === "confirm_password") {
                    if (password === confirmPassword) {
                        // alert("confirm password ok");
                        item.style.borderColor = "green";
                    } else {
                        item.style.borderColor = "crimson";
                        errors.push({
                            errorInput: inputName,
                            message: "value doesn't match with the password !",
                        });

                        errors.forEach((error) => {
                            console.log(
                                `Input ${error.errorInput} ${error.message}`
                            );
                        });
                    }
                }
            }
        });
    });
};

let registerFormId = "register-form";
validateForm(registerFormId);
