<?php

namespace Estudiante\Composer\Controllers;

use Estudiante\Composer\Models\Usuario;
use Estudiante\Composer\Config\Database;

class LoginController {

    private $usuarioModel;

    public function __construct() {
        $db = new Database();
        $conn = $db->connect();
        $this->usuarioModel = new Usuario($conn);
    }

    public function showLogin() {
        require_once __DIR__ . '/../views/login.php';
    }

    public function login() {
        $this->index();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if (!$email || !$password) {
                echo "Por favor, completa todos los campos.";
                return;
            }

            // Usar el modelo para buscar el usuario
            $usuario = $this->usuarioModel->findByEmail($email);

            if ($usuario && $password === $usuario['contrasena']) {
                session_start();
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'rol' => $usuario['tipo']
                ];

                // Redirigir según el rol del usuario
                switch ($usuario['tipo']) {
                    case 'Estudiante':
                        header("Location: index.php?controller=Estudiante&action=index");
                        break;
                    case 'Docente':
                        header("Location: index.php?controller=Docente&action=index");
                        break;
                    case 'Bibliotecario':
                        header("Location: index.php?controller=Administrador&action=index");
                        break;
                    default:
                        echo "Rol no reconocido.";
                        break;
                }
                exit;
            } else {
                echo "Correo o contraseña incorrectos.";
            }
        } else {
            $this->showLogin();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?controller=login&action=showLogin");
        exit;
    }
}
// namespace Estudiante\Composer\Controllers;

// use Estudiante\Composer\Models\Usuario;

// class LoginController {
//     public function index() {
//         // Recoge los datos del formulario
//         $email = $_POST['email'] ?? null;
//         $password = $_POST['password'] ?? null;

//         if (!$email || !$password) {
//             echo "Por favor, completa todos los campos.";
//             return;
//         }

//         // Buscar al usuario por email
//         $usuarioModel = new Usuario($conn);
//         $usuario = $usuarioModel->findByEmail($email);

//         if ($usuario && password_verify($password, $usuario['password'])) {
//             // Inicia sesión
//             session_start();
//             $_SESSION['usuario'] = [
//                 'id' => $usuario['id'],
//                 'nombre' => $usuario['nombre'],
//                 'rol' => $usuario['tipo'],
//             ];

//             // Redirigir según el rol
//             switch ($usuario['tipo']) {
//                 case 'estudiante':
//                     header("Location: index.php?controller=Estudiante&action=panel");
//                     break;
//                 case 'docente':
//                     header("Location: index.php?controller=Docente&action=panel");
//                     break;
                
//                 case 'bibliotecario':
//                     header("Location: index.php?controller=Administrador&action=panel");
//                     break;
//                 default:
//                     echo "Rol no reconocido.";
//                     break;
//             }
//         } else {
//             echo "Correo o contraseña incorrectos.";
//     }
//     }
// }
