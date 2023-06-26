function toggleForm(formType) {
    var loginContainer = document.getElementById("login-container");
    var registerContainer = document.getElementById("register-container");
  
    if (formType === "login") {
      loginContainer.style.display = "block";
      registerContainer.style.display = "none";
    } else if (formType === "register") {
      loginContainer.style.display = "none";
      registerContainer.style.display = "block";
    }
  }
  function toggleForm1(formType) {
    var loginContainer = document.getElementById("login1-container");
    var registerContainer = document.getElementById("register1-container");
  
    if (formType === "login1") {
      loginContainer.style.display = "block";
      registerContainer.style.display = "none";
    } else if (formType === "register1") {
      loginContainer.style.display = "none";
      registerContainer.style.display = "block";
    }
  }
  function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.classList.add('notification');
    notification.classList.add(type);
    notification.textContent = message;

    document.body.appendChild(notification);

  }
  function validateForm() {
    var dniInput = document.getElementsByName("dni")[0];
    var nombreInput = document.getElementsByName("nombre")[0];
    var correoInput = document.getElementsByName("correo")[0];
    var direccionInput = document.getElementsByName("direccion")[0];
    var usernameInput = document.getElementsByName("username")[0];
    var passwordInput = document.getElementsByName("password")[0];

    if (dniInput.value.length !== 8) {
      alert("El DNI debe contener 8 dígitos numéricos.");
      dniInput.focus();
      return false;
    }

    if (nombreInput.value.trim() === "") {
      alert("Por favor, ingresa tu nombre completo.");
      nombreInput.focus();
      return false;
    }

    if (correoInput.value.trim() === "") {
      alert("Por favor, ingresa tu correo electrónico.");
      correoInput.focus();
      return false;
    }

    if (direccionInput.value.trim() === "") {
      alert("Por favor, ingresa tu dirección.");
      direccionInput.focus();
      return false;
    }

    if (usernameInput.value.trim() === "") {
      alert("Por favor, ingresa tu nombre de usuario.");
      usernameInput.focus();
      return false;
    }

    if (passwordInput.value.trim() === "") {
      alert("Por favor, ingresa tu contraseña.");
      passwordInput.focus();
      return false;
    }

    return true;
  }