function VALIK_START_INIT() {
  const form = document.querySelector("form");
  let defaultLabels = processFormLabels();
  console.log(defaultLabels);

  let emailError = false;
  let passwordError = false;
  let passwordRepeatError = false;
  let tellNumber = false;
  let username = false;
  let firstName = false;
  let lastName = false;

  var valik = new FormValidator(
    defaultLabels,
    emailError,
    passwordError,
    passwordRepeatError,
    tellNumber,
    username,
    firstName,
    lastName
  );

  return valik;
}

class FormValidator {
  constructor(
    defaultLabels,
    emailError,
    passwordError,
    passwordRepeatError,
    tellNumber,
    username,
    firstName,
    lastName
  ) {
    this.emailError = emailError;
    this.passwordError = passwordError;
    this.passwordRepeatError = passwordRepeatError;
    this.tellNumber = tellNumber;
    this.username = username;
    this.defaultLabels = defaultLabels;
    this.firstName = firstName;
    this.lastName = lastName;
  }

  validateEmail() {
    const emailInput = document.getElementById("email");
    const email = emailInput.value.trim();
    if (email === "") {
      this.setError("email", "Email is required");
      this.emailError = true;
      this.disableSubmitButton();
    } else if (!/^[a-zA-Z0-9@.]+$/.test(email)) {
      this.setError("email", "Email only Latin letters and numbers (A-Z, 0-9)");
      this.emailError = true;
      this.disableSubmitButton();
    } else if (/[() _\\/]/.test(email) || email.indexOf(" ") !== -1) {
      this.setError("email", "Email must not contain invalid characters");
      this.emailError = true;
      this.disableSubmitButton();
    } else if (email.indexOf("@") === -1) {
      this.setError("email", "Email must contain the '@' symbol");
      this.emailError = true;
      this.disableSubmitButton();
    } else {
      this.clearError("email");
      this.emailError = false;
      this.enableSubmitButton();
    }
  }

  validatePassword() {
    const passwordInput = document.getElementById("password");
    const password = passwordInput.value.trim();
    if (password === "") {
      this.setError("password", "Password is required");
      this.passwordError = true;
      this.disableSubmitButton();
    } else if (!/^[a-zA-Z0-9]+$/.test(password)) {
      this.setError(
        "password",
        "Password only Latin letters and numbers (A-Z, 0-9)"
      );
      this.passwordError = true;
      this.disableSubmitButton();
    } else if (/[() _\\/]/.test(password) || password.indexOf(" ") !== -1) {
      this.setError("password", "Password must not contain invalid characters");
      this.passwordError = true;
      this.disableSubmitButton();
    } else if (password.length < 5) {
      this.setError("password", "Password cannot be shorter 5 symbols");
      this.passwordError = true;
      this.disableSubmitButton();
    } else if (password.length > 24) {
      this.setError("password", "Password cannot be longer 24 symbols");
      this.passwordError = true;
      this.disableSubmitButton();
    } else {
      this.clearError("password");
      this.passwordError = false;
      this.enableSubmitButton();
    }
  }

  validatePasswordRepeat() {
    const passwordInput = document.getElementById("password");
    const password = passwordInput.value.trim();
    const repeatPasswordInput = document.getElementById("password-repeat");
    const repeatPassword = repeatPasswordInput.value.trim();

    if (repeatPassword === "") {
      this.setError("password-repeat", "Please repeat your password");
      this.passwordRepeatError = true;
      this.disableSubmitButton();
    } else if (password !== repeatPassword) {
      this.setError("password-repeat", "Passwords do not match");
      this.passwordRepeatError = true;
      this.disableSubmitButton();
    } else {
      this.clearError("password-repeat");
      this.passwordRepeatError = false;
      this.enableSubmitButton();
    }
  }

  validateTellNumber() {
    const tellInput = document.getElementById("tell");
    const tell = tellInput.value.trim();
    if (tell === "") {
      this.setError(
        "tell",
        "Phone number is required example: +374 94 161 331"
      );
      this.tellNumber = true;
      this.disableSubmitButton();
    } else if (!/^\+374[0-9 ()]*$/.test(tell)) {
      this.setError("tell", "Phone number must start with +374");
      this.tellNumber = true;
      this.disableSubmitButton();
    } else if (/[a-zA-Z]/.test(tell)) {
      this.setError("tell", "Phone number cannot contain letters");
      this.tellNumber = true;
      this.disableSubmitButton();
    } else {
      this.clearError("tell");
      this.tellNumber = false;
      this.enableSubmitButton();
    }
  }

  validateUsername() {
    const usernameInput = document.getElementById("username");
    const username = usernameInput.value.trim();

    if (username === "") {
      this.setError("username", "Username is required");
      this.username = true;
      this.disableSubmitButton();
    } else if (!/^@/.test(username)) {
      this.setError("username", "Username must start with the @ symbol");
      this.username = true;
      this.disableSubmitButton();
    } else if (!/^@[A-Z]/.test(username)) {
      this.setError("username", "Username must start with a capital letter");
      this.username = true;
      this.disableSubmitButton();
    } else if (!/^[a-zA-Z]{10,}$/.test(username.substring(1))) {
      this.setError(
        "username",
        "Username must contain at least 10 only Latin letters"
      );
      this.username = true;
      this.disableSubmitButton();
    } else if (!/^[a-zA-Z]+$/.test(username.substring(1))) {
      this.setError("username", "Username can only contain Latin letters");
      this.username = true;
      this.disableSubmitButton();
    } else if (username.length > 25) {
      this.setError(
        "username",
        "Username must contain no more than 24 characters"
      );
      this.username = true;
      this.disableSubmitButton();
    } else {
      this.clearError("username");
      this.username = false;
      this.enableSubmitButton();
    }
  }

  validateFirstName() {
    const firstnameInput = document.getElementById("fname");
    const firstname = firstnameInput.value.trim();
    if (firstname === "") {
      this.setError("fname", "First name is required");
      this.firstname = true;
      this.disableSubmitButton();
    } else if (/\d/.test(firstname) || /[^a-zA-Z]/.test(firstname)) {
      this.setError("fname", "Cannot contain numbers, symbols or spaces");
      this.firstname = true;
      this.disableSubmitButton();
    } else {
      this.clearError("fname");
      this.firstname = false;
      this.enableSubmitButton();
    }
  }

  validateLastname() {
    const lastnameInput = document.getElementById("lname");
    const lastname = lastnameInput.value.trim();
    if (lastname === "") {
      this.setError("lname", "Last name is required");
      this.firstname = true;
      this.disableSubmitButton();
    } else if (/\d/.test(lastname) || /[^a-zA-Z]/.test(lastname)) {
      this.setError("lname", "Cannot contain numbers, symbols or spaces");
      this.firstname = true;
      this.disableSubmitButton();
    } else {
      this.clearError("lname");
      this.firstname = false;
      this.enableSubmitButton();
    }
  }

  disableSubmitButton() {
    document.getElementById("submitBtn").setAttribute("disabled", "disabled");
    document.getElementById("submitBtn").style.pointerEvents = "none";
    document.getElementById("submitBtn").style.opacity = "0.6";
    console.log(this.emailError);
    console.log(this.passwordError);
  }

  enableSubmitButton() {
    if (this.emailError) {
      this.disableSubmitButton();
    } else if (this.passwordError) {
      this.disableSubmitButton();
    } else if (this.passwordRepeatError) {
      this.disableSubmitButton();
    } else if (this.tellNumber) {
      this.disableSubmitButton();
    } else if (this.username) {
      this.disableSubmitButton();
    } else if (this.firstName) {
      this.disableSubmitButton();
    } else if (this.lastName) {
      this.disableSubmitButton();
    } else {
      document.getElementById("submitBtn").removeAttribute("disabled");
      document.getElementById("submitBtn").style.pointerEvents = "";
      document.getElementById("submitBtn").style.opacity = "1";
    }
  }

  setError(inputId, errorMessage) {
    const input = document.getElementById(inputId);
    const label = input.parentElement.querySelector("label");
  
    input.style.backgroundColor = "var(--cl-17)";
    input.style.borderColor = "var(--cl-14)";
    label.style.color = "var(--cl-14)";
   
    if (errorMessage) {
      label.textContent = errorMessage;
    }
  }
  

  clearError(inputId) {
    const input = document.getElementById(inputId);
    const label = input.parentElement.querySelector("label");

    input.style.borderColor = "";
    label.style.color = "";
    input.style.backgroundColor = "";
    label.textContent = this.defaultLabels[inputId] || "";
  }
}

function processFormLabels() {
  const defaultLabels = {};
  document.querySelectorAll("label").forEach((label) => {
    const inputId = label.getAttribute("for");
    if (inputId) {
      defaultLabels[inputId] = label.textContent;
    }
  });
  return defaultLabels;
}
