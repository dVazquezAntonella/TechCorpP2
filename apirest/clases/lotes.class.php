<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";


class lotes extends conexion {

    private $table = "productos";
    private $nombre = "";
    private $NumLote = "";
    private $Nombre = "";
    private $FechaInicio="";
    private $FechaTerm="";
    private $Tipo="";
    private $Numero="";
    private $PiezasDef="";

 
    public function obtenerProductos($codigo){
        $query = "SELECT * FROM " . $this->table . " WHERE NumLote = '$codigo'";
        return parent::obtenerDatos($query);
    }

    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

                if(!isset($datos['Nombre'])){
                    return $_respuestas->error_400();
                }else{
                    $this->Nombre = $datos['Nombre'];
                    if(isset($datos['ApellidoP'])) { $this->ApellidoP = $datos['ApellidoP']; }
                    if(isset($datos['ApellidoM'])) { $this->ApellidoM = $datos['ApellidoM']; }
                    if(isset($datos['NumLote'])) { $this->NumLote = $datos['NumLote']; }
                    if(isset($datos['FechaInicio'])) { $this->FechaInicio = $datos['FechaInicio']; }
                    if(isset($datos['FechaTerm'])) { $this->FechaTerm = $datos['FechaTerm']; }
                    if(isset($datos['Tipo'])) { $this->Tipo = $datos['Tipo']; }
                    if(isset($datos['Numero'])) { $this->Numero = $datos['Numero']; }
                    if(isset($datos['PiezasDef'])) { $this->PiezasDef = $datos['PiezasDef']; }
                    $resp = $this->insertarProducto();
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "lotesId" => $resp
                        );
                        return $respuesta;
                    }else{
                        return $_respuestas->error_500();
                    }
                }

    }

    private function insertarProducto(){
        $query = "INSERT INTO " . $this->table . " (NumLote,Nombre,ApellidoP,ApellidoM,FechaInicio,FechaTerm,Tipo,Numero,PiezasDef) 
        values 
        ('" . $this->NumLote . "','" . $this->Nombre . "','" . $this->ApellidoP . "','"  . $this->ApellidoM . "','" .$this->FechaInicio ."','" . $this->FechaTerm ."','" . $this->Tipo ."','" . $this->Numero ."','" . $this->PiezasDef ."')"; 
        $resp = parent::nonQueryId($query);
        if($resp){
             return $resp;
        }else{
            return 0;
        }
    }


    public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

                if(!isset($datos['codigo'])){
                    return $_respuestas->error_400();
                }else{
                    $this->NumLote = $datos['codigo'];
                    $resp = $this->eliminarProducto();
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "lotesId" => $resp
                        );
                        return $respuesta;
                    }else{
                        return $_respuestas->error_500();
                    }
                }

    }


    private function eliminarProducto(){
        $query = "DELETE FROM " . $this->table . " WHERE NumLote= '" . $this->NumLote . "'";
        $resp = parent::nonQuery($query);
        if($resp >= 1 ){
            return $resp;
        }else{
            return 0;
        }
    }

}








?>