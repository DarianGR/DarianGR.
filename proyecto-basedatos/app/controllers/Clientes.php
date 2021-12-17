<?php

class Clientes extends Controller
{
    public function __construct()
    {
        $this->clienteModel = $this->model('Cliente');
    }
    /*
        Valores para limite y página en default, se puede trabajar otras formas de asignacion
    */
    public function index($limite = 10, $pagina = 1)
    {
        $clientes = $this->clienteModel->listarClientes($limite, $pagina);
        // Para debug
        // Echo '<pre>';
        // Print_r($clientes);
        // Para debug
        $this->view('clientes/index', $clientes);
    }

    /*
        metodo agregar
    */
    public function agregar()
    {
        // Inicialización para GET
        $data = [
            'cliente_rfc' => '',
            'cliente_nombre' => '',
            'cliente_direccion' => '',
            'cliente_telefono' => '',
            'cliente_email' => '',
            'cliente_fotografia' => '',
            'msg_error' => ''
        ];

        // Diferenciar si llamda es GET (menu) o POST (formulario)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recomendación de seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            /**
             * Name
             * Nombre temporal
             * Tipo
             * Tamaño
             * getimagesize()
             */

            $cliente_fotografia = ($_FILES['cliente_fotografia']['size'] == 0) ? null : file_get_contents($_FILES['cliente_fotografia']['tmp_name']);

            $data = [
                'cliente_rfc'           => $_POST['cliente_rfc'],
                'cliente_nombre'        => $_POST['cliente_nombre'],
                'cliente_direccion'     => $_POST['cliente_direccion'],
                'cliente_telefono'      => $_POST['cliente_telefono'],
                'cliente_email'         => $_POST['cliente_email'],
                'cliente_fotografia'    => $cliente_fotografia
            ];

            // Validación, datos vacios, match (verificación de existencia en tabla de base de datos)
            # Datos vacÍos
            if (empty($data['cliente_rfc']) || empty($data['cliente_direccion']) || empty($data['cliente_nombre']) || empty($data['cliente_telefono']) || empty($data['cliente_email'])) {
                $data['msg_error'] = 'Llene todos los campos';
            }

            // Validar formato correo electronico
            if (!filter_var($data['cliente_email'], FILTER_VALIDATE_EMAIL)) {
                $data['msg_error'] = 'Formato de email no correspondiente';
            }

            // Validar no existencia de usuario y correo
            if ($this->clienteModel->encontrarClientePorEmailORFC($data['cliente_email'], $data['cliente_rfc'])) {
                $data['msg_error'] = 'Email y/o R.F.C. de Cliente ya registrado';
            }

            /*
                Poner las validaciones correspondientes a sus politicas, password, id de usuario, para ello usar expresiones regulares (patterns)
            */

            // Pasar a la validación en tabla
            if (empty($data['msg_error'])) {

                if ($this->clienteModel->agregar($data)) {
                    redirigir('/clientes');
                } else {
                    $data['msg_error'] = 'Algo salio mal...';
                }
            } 
        } // fin POST
        $this->view('clientes/agregar', $data);
    } // fin método agregar

    /*
        metodo editar
    */
    public function editar($id)
    {
        // Inicialización de error
        $data = [
            'msg_error' => ''
        ];

        # Diferenciar GET (menu) o POST (UPDATE)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recomendación de seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            /**
             * Name
             * Nombre temporal
             * Tipo
             * Tamaño
             * GetImageSize()
             */

            $cliente_fotografia = ($_FILES['cliente_fotografia']['size'] == 0) ? null : file_get_contents($_FILES['cliente_fotografia']['tmp_name']);

            $data = [
                'id'                    => $_POST['id'],
                'cliente_rfc'           => $_POST['cliente_rfc'],
                'cliente_nombre'        => $_POST['cliente_nombre'],
                'cliente_direccion'     => $_POST['cliente_direccion'],
                'cliente_telefono'      => $_POST['cliente_telefono'],
                'cliente_email'         => $_POST['cliente_email'],
                'cliente_fotografia'    => $cliente_fotografia
            ];

            // Validación, datos vacios, match (verificación de existencia en tabla de base de datos)
            # Datos vacios
            if (empty($data['cliente_rfc']) || empty($data['cliente_direccion']) || empty($data['cliente_nombre']) || empty($data['cliente_telefono']) || empty($data['cliente_email'])) {
                $data['msg_error'] = 'Llene todos los campos';
            }

            // Validar formato correo electronico
            if (!filter_var($data['cliente_email'], FILTER_VALIDATE_EMAIL)) {
                $data['msg_error'] = 'Formato de email no correspondiente';
            }

            // Pasar a la validación en tabla
            if (empty($data['msg_error'])) {

                if ($this->clienteModel->actualizar($data)) {
                    redirigir('/clientes');
                } else {
                    $data['msg_error'] = 'Algo salio mal...';
                }
            } // Errores de vacio

        }   else { // Fin de verificación del post e inicio de get
                # Consulta de la tabla clientes para tomar los datos y decidir que cambiar
                $cliente = $this->clienteModel->editar($id);

                $data = [
                    'id'                    => $cliente->id,
                    'cliente_rfc'           => $cliente->cliente_rfc,
                    'cliente_nombre'        => $cliente->cliente_nombre,
                    'cliente_direccion'     => $cliente->cliente_direccion,
                    'cliente_telefono'      => $cliente->cliente_telefono,
                    'cliente_email'         => $cliente->cliente_email,
                    'cliente_fotografia'    => $cliente->cliente_fotografia
                ];
            }
        $this->view('clientes/editar', $data);
    } // fin editar

    /*
        metodo borrar recibe $id
     */

    public function borrar($id)
    {
        $this->clienteModel->borrar($id);
        redirigir('/clientes');
    }


    // ================ SECCION DE MIGRACIÓN =================
    /*
        Reporte
    */
    public function reporte()
    {
        $clientes = $this->clienteModel->listarTodosClientes();

        $this->view('clientes/reporte', $clientes);
    }

    /*
        Migración a formato separado por comas (CSV)
    */
    public function csv()
    {
        $clientes = $this->clienteModel->listarTodosClientes();
        $this->view('clientes/csv', $clientes);
    }
    /*
        Migración a formato JSON
    */
    public function json()
    {
        $clientes = $this->clienteModel->listarTodosClientes();
        $this->view('clientes/json', $clientes);
    }
    /*
        Migración a formato XML
    */
    public function xml()
    {
        $clientes = $this->clienteModel->listarTodosClientes();
        $this->view('clientes/xml', $clientes);
    }
}
