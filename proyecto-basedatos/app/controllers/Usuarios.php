<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function index(){
        $this->view('/construccion');
    }
    
    public function login()
    {
        // Inicialización GET
        $data = [
            'usuario_uid' => '',
            'usuario_password' => '',
            'msg_error' => ''
        ];

        # Diferenciar GET (menu) o POST (formulario)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recomendación de seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'usuario_uid' => $_POST['usuario_uid'],
                'usuario_password' => $_POST['usuario_password']
            ];

            // Validación, datos vacios, match (verificación de existencia en tabla de base de datos)
            # Datos vacios
            if (empty($data['usuario_uid']) || empty($data['usuario_password'])) {
                $data['msg_error'] = 'Llene todos los campos';
            }

            // Pasar a la validación en tabla
            if (empty($data['msg_error'])) {
                /**
                 * registro si hay match incluye un true
                 * false si no hay match
                */

                $logueado = $this->usuarioModel->login($data['usuario_uid'], $data['usuario_password']);

                if ($logueado) {
                    // Usar una sesión controlada, segura ... $_SESSION - global
                    $_SESSION['usuario_id'] = $logueado->usuario_id;
                    $_SESSION['usuario_nombre'] = $logueado->usuario_nombre;
                    $_SESSION['usuario_email'] = $logueado->usuario_email;
                    redirigir('/index');
                } else {
                    $data['msg_error'] = 'El Password y/o el Usuario no existen';
                }
            }
        } // Fin POST
        $this->view('usuarios/login', $data);
    } // Fin login

    public function register()
    {
        // Inicialización para GET
        $data = [
            'usuario_uid' => '',
            'usuario_nombre' => '',
            'usuario_password' => '',
            'confirmacion_password' => '',
            'usuario_email' => '',
            'msg_error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recomendación de seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'usuario_uid'           => $_POST['usuario_uid'],
                'usuario_nombre'        => $_POST['usuario_nombre'],
                'usuario_password'      => $_POST['usuario_password'],
                'confirmacion_password' => $_POST['confirmacion_password'],
                'usuario_email'         => $_POST['usuario_email']
            ];

            if (empty($data['usuario_uid']) || empty($data['usuario_nombre']) || empty($data['usuario_password']) || empty($data['confirmacion_password']) || empty($data['usuario_email'])) {
                $data['msg_error'] = 'Llene todos los campos';
            }
            // Confirmar la igualdad de password
            if ($data['usuario_password'] != $data['confirmacion_password']) {
                $data['msg_error'] = 'Los Password no coinciden';
            }
            
            // Validar formato correo electronico
            if(!filter_var($data['usuario_email'], FILTER_VALIDATE_EMAIL)){
               $data['msg_error'] = 'Formato de email no correspondiente';
            }

            // Validar no existencia de usuario y correo
            if($this->usuarioModel->encontrarUsuarioPorEmailOUsuario($data['usuario_email'],$data['usuario_uid'])){
                $data['msg_error'] = 'Usuario existente, intente otro';
            }

            /*
                Poner las validaciones correspondientes a sus politicas
            */

            // Pasar a la validación en tabla
            if (empty($data['msg_error'])) {
                // Password de texto plano, aplicar un algoritmo hash
                $data['usuario_password'] = password_hash($data['usuario_password'], PASSWORD_DEFAULT);
                
                if($this->usuarioModel->register($data)){
                    redirigir('/usuarios/login');
                }else{
                    $data['msg_error']='Algo anda mal...';
                }
                

            }
        } // Fin POST
        $this->view('usuarios/register', $data);
    } // Fin register
  
    public function logout(){
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nombre']);
        unset($_SESSION['usuario_email']);
        redirigir('/usuarios/login');
    }
}
