<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
    <style>
 body {
  display: flex;
  justify-content: center;
  align-items: absolute;
  height: 20vh;
  margin: 0px;
  padding: 20px;
  background-image: url('imagfe 16.png');
  background-size: cover;
  background-position: center;
}

.iniciar {
  background-color: rgba(255, 255, 255, 0.504);
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  height: 30vh;
 margin-top: 199px;
}

.login-form {
  width: 300px;
}

h1 {
  text-align: center;
  margin-bottom: 30px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #cccccc9e;
  border-radius: 5px;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #222324f3;
  color: #e8e1e1;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #8d4c18;
}

p {
  text-align: right;
  margin-top: 10px;
  font-size: 14px;
}
</style>
<div class = "iniciar">
  <div class="login-form">
      <form action="bienvenido.php" method="POST">
        <h1>Iniciar sesión</h1>
        <input type="text" placeholder="Ingresa tu usuario:" name="usuario" required>
        <input type="text" placeholder="Ingresa tu teléfono:" name="telefono" required>
        <button type="submit">Iniciar sesión</button>
    </form>
    </div>
</div>
</body>
</html>