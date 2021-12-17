<?php

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = new Base();
    }

    /**
     * Método listarClientes
     * Retorna la tabla clientes
    */
    public function listarClientes($limite, $pagina)
    {

        $offset = ($pagina - 1) * $limite;

        # Conocer el número total de registros
        $this->db->query('SELECT count(*) as registros FROM clientes');
        $registros = $this->db->unico()->registros;
        # Total de páginas
        $paginas = ceil($registros / $limite);

        $this->db->query("SELECT id, cliente_rfc, cliente_nombre, cliente_direccion, cliente_telefono, cliente_email FROM clientes LIMIT $offset,$limite");

        #preparacion para la paginacion ===bootstrap===
        $data['clientes'] = $this->db->multiple();

        $paginacion = [
            'limite'        => $limite,
            'pagina'        => $pagina,
            'paginas'       => $paginas,
            'registros'     => $registros,
            'pag_previa'      => ($pagina - 1),
            'pag_siguiente' => ($pagina + 1)

        ];
        $data = array_merge($paginacion, $data);
        return $data;
    }

    public function encontrarClientePorEmailORFC($cliente_email, $cliente_rfc)
    {
        // Consulta
        $this->db->query('SELECT cliente_rfc, cliente_email FROM clientes WHERE cliente_rfc = :cliente_rfc OR cliente_email = :cliente_email');
        // Vinculación
        $this->db->bind(':cliente_email', $cliente_email);
        $this->db->bind(':cliente_rfc', $cliente_rfc);
        // Ecución
        $this->db->unico();

        return ($this->db->conteoReg() > 0) ? true : false;
    }

    public function agregar($data)
    {
        // Insert
        $this->db->query('INSERT INTO clientes (cliente_rfc, cliente_nombre, cliente_direccion, cliente_email, cliente_telefono, cliente_fotografia) VALUES (:cliente_rfc, :cliente_nombre, :cliente_direccion, :cliente_email, :cliente_telefono, :cliente_fotografia)');
        // Vinculación
        $this->db->bind(':cliente_rfc', $data['cliente_rfc']);
        $this->db->bind(':cliente_nombre', $data['cliente_nombre']);
        $this->db->bind(':cliente_direccion', $data['cliente_direccion']);
        $this->db->bind(':cliente_telefono', $data['cliente_telefono']);
        $this->db->bind(':cliente_email', $data['cliente_email']);
        $this->db->bind(':cliente_fotografia', $data['cliente_fotografia']);
        // Ejecución
        // Return $this->bd->execute() ? true : false;
        try {
            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function editar($id)
    {
        // Consulta
        $this->db->query('SELECT id, cliente_rfc, cliente_nombre, cliente_direccion, cliente_email, cliente_telefono, cliente_fotografia FROM clientes WHERE id = :id');
        // Vinculación
        $this->db->bind(':id', $id);
        // Ejecución
        return $this->db->unico();
    }
    public function actualizar($data)
    {
        // Update
        $this->db->query('UPDATE clientes SET
        cliente_rfc         =:cliente_rfc, 
        cliente_nombre      =:cliente_nombre, 
        cliente_direccion   =:cliente_direccion, 
        cliente_email       =:cliente_email, 
        cliente_telefono    =:cliente_telefono, 
        cliente_fotografia  =:cliente_fotografia 
        WHERE id=:id');

        // Vinculación
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':cliente_rfc', $data['cliente_rfc']);
        $this->db->bind(':cliente_nombre', $data['cliente_nombre']);
        $this->db->bind(':cliente_direccion', $data['cliente_direccion']);
        $this->db->bind(':cliente_telefono', $data['cliente_telefono']);
        $this->db->bind(':cliente_email', $data['cliente_email']);
        $this->db->bind(':cliente_fotografia', $data['cliente_fotografia']);
        
        // Ejecución
        // Return $this->bd->execute() ? true : false;
        try {
            $this->db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

     public function borrar($id){
         # Consulta de tipo delete
         $this->db->query('DELETE FROM clientes WHERE id=:id');
         # Vinculación
         $this->db->bind(':id', $id);

         try{
             $this->db->execute();
             return true;
         }catch(Exception $e){
             return false;
         }
     }
      public function listarTodosClientes()
      {
          //consulta TO_BASE64
          $this->db->query('SELECT id, cliente_rfc, cliente_nombre, cliente_direccion, cliente_telefono, cliente_email, TO_BASE64(cliente_fotografia) AS cliente_fotografia FROM clientes');
  
          //Ejecutar
          $data['clientes'] = $this->db->multiple();
          
          return $data;
      }
}
