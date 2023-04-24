<?php

    class Conexion  {
        private $con;

        public function __construct(){ 

            $con = new mysqli('199.250.220.118:3306','gnoval5_uana','bJYPIEr.zM{x','gnoval5_ana');
            if ($con->connect_errno) {
                echo "Error de conexión a MySQL: " . $con->connect_error;
                exit();
            }
        }

        public function listar_hec_trabajador(){
            $con = new mysqli('199.250.220.118:3306','gnoval5_uana','bJYPIEr.zM{x','gnoval5_ana');
                if ($con->connect_errno) {
                    echo "Error de conexión a MySQL: " . $con->connect_error;
                    exit();
                }
            // Llamar al procedimiento almacenado con un parámetro de entrada
            $resultado = $con->query("CALL listar_hec_trabajador()");
            // console.log($resultado);
            // Manejar el resultado del procedimiento almacenado
            if (!$resultado) {
                echo "Error al llamar al procedimiento almacenado: " . $con->error;
                exit();
            }
    
            // Imprimir el resultado del procedimiento almacenado
            $i=0;
            $retorno=[];
          

            while ($fila = mysqli_fetch_array($resultado)) {
                $i+=1;
                $retorno[$i]= $fila;
               
            }

            return $retorno;
            // Cerrar la conexión a MySQL
            $con->close();
      }

      public function listar_dim_forma_pago(){
        $con = new mysqli('199.250.220.118:3306','gnoval5_uana','bJYPIEr.zM{x','gnoval5_ana');
            if ($con->connect_errno) {
                echo "Error de conexión a MySQL: " . $con->connect_error;
                exit();
            }
        // Llamar al procedimiento almacenado con un parámetro de entrada
        $resultado = $con->query("CALL listar_dim_forma_pago()");
        // console.log($resultado);
        // Manejar el resultado del procedimiento almacenado
        if (!$resultado) {
            echo "Error al llamar al procedimiento almacenado: " . $con->error;
            exit();
        }

        // Imprimir el resultado del procedimiento almacenado
        $i=0;
        $retorno=[];
      

        while ($fila = mysqli_fetch_array($resultado)) {
            $i+=1;
            $retorno[$i]= $fila;
           
        }

        return $retorno;
        // Cerrar la conexión a MySQL
        $con->close();
  }

      public function listar_dim_banco(){
        $con = new mysqli('199.250.220.118:3306','gnoval5_uana','bJYPIEr.zM{x','gnoval5_ana');
            if ($con->connect_errno) {
                echo "Error de conexión a MySQL: " . $con->connect_error;
                exit();
            }
        // Llamar al procedimiento almacenado con un parámetro de entrada
        $resultado = $con->query("CALL listar_dim_banco()");
        // console.log($resultado);
        // Manejar el resultado del procedimiento almacenado
        if (!$resultado) {
            echo "Error al llamar al procedimiento almacenado: " . $con->error;
            exit();
        }

        // Imprimir el resultado del procedimiento almacenado
        $i=0;
        $retorno=[];
    

        while ($fila = mysqli_fetch_array($resultado)) {
            $i+=1;
            $retorno[$i]= $fila;
        
        }

        return $retorno;
        // Cerrar la conexión a MySQL
        $con->close();
    }

    public function listar_dim_cargo_trabajador(){
        $con = new mysqli('199.250.220.118:3306','gnoval5_uana','bJYPIEr.zM{x','gnoval5_ana');
            if ($con->connect_errno) {
                echo "Error de conexión a MySQL: " . $con->connect_error;
                exit();
            }
        // Llamar al procedimiento almacenado con un parámetro de entrada
        $resultado = $con->query("CALL listar_dim_cargo_trabajador()");
        // console.log($resultado);
        // Manejar el resultado del procedimiento almacenado
        if (!$resultado) {
            echo "Error al llamar al procedimiento almacenado: " . $con->error;
            exit();
        }

        // Imprimir el resultado del procedimiento almacenado
        $i=0;
        $retorno=[];
    

        while ($fila = mysqli_fetch_array($resultado)) {
            $i+=1;
            $retorno[$i]= $fila;
        
        }

        return $retorno;
        // Cerrar la conexión a MySQL
        $con->close();
    }


    public function listar_dim_forma_pago_filter($filtro = null) {
    $con = new mysqli('199.250.220.118:3306', 'gnoval5_uana', 'bJYPIEr.zM{x', 'gnoval5_ana');
    if ($con->connect_errno) {
        echo "Error de conexión a MySQL: " . $con->connect_error;
        exit();
    }

    // Llamar al procedimiento almacenado con un parámetro de entrada
    if ($filtro) {
        $stmt = $con->prepare("CALL listar_hec_trabajador_filtrar(?)");
        $stmt->bind_param("s", $filtro);
        $stmt->execute();
        $resultado = $stmt->get_result();
    } else {
        $resultado = $con->query("CALL listar_dim_forma_pago()");
    }

    // Manejar el resultado del procedimiento almacenado
    if (!$resultado) {
        echo "Error al llamar al procedimiento almacenado: " . $con->error;
        exit();
    }

    // Obtener los datos del resultado del procedimiento almacenado
    $datos = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $datos[] = $fila;
    }

    // Cerrar la conexión a MySQL
    $con->close();

    return $datos;
}

    
    }

?>