<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Registro</title>
  <link rel="stylesheet" type="text/css" href="styles.css">

  </script>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <h4 class="center-text">Iniciar sesión</h4>
     
      <form action="" method="post">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit" >Ingresar</button>
      </form> 
      <?php
          date_default_timezone_set('America/Lima');
          $servidor = "127.0.0.1";
          $usuario = "root";
          $password = "";
          $basededatos = "login";
          $conector = new mysqli($servidor, $usuario, $password, $basededatos);
          if ($conector->connect_error) {
              echo "No se conecto la base de datos";
          } /*else{
                    echo "Conectado a la base de datos";
          }*/

          $error_message = ""; // Variable para almacenar el mensaje de error

          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              // Verificar si los campos están vacíos
              if (empty($_POST['username']) || empty($_POST['password'])) {
                  $error_message = "Ambos campos son requeridos.";
              } else {
                  // Tu código de conexión a la base de datos y verificación de las credenciales
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  // Verificar las credenciales en la base de datos
                  $sql = "SELECT * FROM usuarios WHERE username = '$username' AND pass = '$password'";
                  $query = $conector->query($sql);
                  $result = $query->fetch_assoc();

                  if ($result) {
                      // Redireccionar al usuario a index2.php si las credenciales son válidas
                      header("Location: index2.php");
                      exit;
                  } else {
                      $error_message = "Credenciales inválidas.";
                  }
          }
        }
      ?>
      
    </div>
    <div class="register-container">
      <h3 class="center-text">¿Aún no tienes cuenta?</h3>
      <p class="center-text">
        Regístrate para poder iniciar sesión.
      </p><br>
      <a href="registro.php"><button type="button">Crear cuenta</button></a>
    </div>
  </div> 
  <script src="script.js"></script>
</body>
</html>

