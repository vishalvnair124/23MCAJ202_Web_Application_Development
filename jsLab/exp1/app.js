// Function to validate the form inputs
function validateForm() {
  let isValid = true;

  // Get input elements
  let name = document.getElementById("name");
  let email = document.getElementById("email");
  let phone = document.getElementById("phone");
  let dob = document.getElementById("dob");
  let pincode = document.getElementById("pincode");
  let address = document.getElementById("address");

  // Get error message elements
  let nameError = document.getElementById("nameError");
  let emailError = document.getElementById("emailError");
  let phoneError = document.getElementById("phoneError");
  let dobError = document.getElementById("dobError");
  let pincodeError = document.getElementById("pincodeError");
  let addressError = document.getElementById("addressError");

  // Name validation (only letters and spaces)
  if (!/^[A-Z a-z \s]+$/.test(name.value.trim())) {
    nameError.style.display = "block";
    isValid = false;
  } else {
    nameError.style.display = "none";
  }

  // Email validation
  if (!email.value.match(/^[^ ]+@[^ ]+\.[a-z]{2,3}$/)) {
    emailError.style.display = "block";
    isValid = false;
  } else {
    emailError.style.display = "none";
  }

  // Phone number validation (10 digits)
  if (!phone.value.match(/^[1-9][\d]{9}$/)) {
    phoneError.style.display = "block";
    isValid = false;
  } else {
    phoneError.style.display = "none";
  }

  // Date of birth validation (cannot be empty)
  if (dob.value.trim() === "") {
    dobError.textContent = "Date of Birth is required";
    dobError.style.display = "block";
    isValid = false;
  } else {
    let dobDate = new Date(dob.value);
    let today = new Date();

    // Remove time part for accurate date comparison
    today.setHours(0, 0, 0, 0);
    dobDate.setHours(0, 0, 0, 0);

    if (dobDate > today) {
      dobError.textContent = "Date of Birth cannot be in the future";
      dobError.style.display = "block";
      isValid = false;
    } else {
      dobError.style.display = "none";
    }
  }

  // Pin code validation (6 digits)
  if (!pincode.value.match(/^\d{6}$/)) {
    pincodeError.style.display = "block";
    isValid = false;
  } else {
    pincodeError.style.display = "none";
  }

  // Address validation (cannot be empty)
  if (address.value.trim() === "") {
    addressError.style.display = "block";
    isValid = false;
  } else {
    addressError.style.display = "none";
  }

  // If all validations pass, show success message
  if (isValid) {
    alert("Registration successful!");
  }
}
