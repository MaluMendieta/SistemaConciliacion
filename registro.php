<!DOCTYPE html>
<html>
<head>
  <title>Registrar sesión</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container1">
    <div class="login1-container">
      <h4 class="center-text">Registrate</h4>
      <form action="" method="post">
      <input type="text" name="dni" placeholder="DNI"required>
      <input type="text" name="nombre" placeholder="Nombre completo"required>
      <input type="text" name="correo" placeholder="Correo Electronico"required>
      <input type="text" name="direccion" placeholder="Direcion"required>
      <input type="text" name="username" placeholder="Usuario"required>
      <input type="password" name="password"  placeholder="Contraseña"required>
        <button type="submit">Registrar</button>
      </form>

      <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                      $dni = $_POST['dni'];
                      $nombre = $_POST['nombre'];
                      $correo = $_POST['correo'];
                      $direccion = $_POST['direccion'];
                      $username = $_POST['username'];
                      $pas = $_POST['password'];
                      if (!preg_match('/^[0-9]{8}$/', $dni)) {
                        $error = "El DNI debe contener 8 dígitos numéricos.";
                        echo "<p class='error-message'>$error</p>";
                      }
                        elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                          $error = "El correo electrónico es inválido.";
                          echo "<p class='error-message'>$error</p>";
                        } else {
                          $servidor = "127.0.0.1";
                          $usuario = "root";
                          $password = "";
                          $basededatos = "login";
                          $conector = new mysqli($servidor, $usuario, $password, $basededatos); 

                          $sql_check_username = "SELECT COUNT(*) AS count FROM usuarios WHERE username = '$username'";
                          $result_check_username = $conector->query($sql_check_username);
                          $row_check_username = $result_check_username->fetch_assoc();
                            // validar si exite usuario
                          if ($row_check_username['count'] > 0) {
                              $error = "El usuario ya existe en la base de datos.";
                              echo "<p class='error-message'>$error</p>";
                          } else {
                              // validar si exite dni
                              $sql_check_dni = "SELECT COUNT(*) AS count FROM usuarios WHERE dni = '$dni'";
                              $result_check_dni = $conector->query($sql_check_dni);
                              $row_check_dni = $result_check_dni->fetch_assoc();
                  
                              if ($row_check_dni['count'] > 0) {
                                  $error = "El DNI ya está registrado.";
                                  echo "<p class='error-message'>$error</p>";
                              } else {
                                  // validar si exite email
                                  $sql_check_email = "SELECT COUNT(*) AS count FROM usuarios WHERE correo = '$correo'";
                                  $result_check_email = $conector->query($sql_check_email);
                                  $row_check_email = $result_check_email->fetch_assoc();
                  
                                  if ($row_check_email['count'] > 0) {
                                      $error = "El correo electrónico ya está registrado.";
                                      echo "<p class='error-message'>$error</p>";
                                  } else {
                                      // insertar usuarios
                                      $sql_insert = "INSERT INTO usuarios (dni, nombre, correo, direccion, username, pass) 
                                                     VALUES ('$dni', '$nombre', '$correo', '$direccion', '$username', '$pas')";
                  
                                      if ($conector->query($sql_insert) === TRUE) {
                                          $success = "El usuario ha sido registrado correctamente.";
                                          echo "<p class='success-message'>$success</p>";
                                      } else {
                                          $error = "Error al registrar el usuario: " . $conector->error;
                                          echo "<p class='error-message'>$error</p>";
                                      }
                                  }
                              }
                          }
                    
                        }
                    }?>
    </div>
    <div class="register1-container">
      <h3 class="center-text">¿Ya tienes una cuenta?</h3>
      <p class="center-text">
        Si ya tienes cuenta ingresa aqui
      </p><br>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>