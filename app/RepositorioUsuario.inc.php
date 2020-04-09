<?php

class RepositorioUsuario /*Clase-TrabajaUsuario.Consultas.Clases */
{
    public static function obtener_todos($conexion)
    {
      $usuarios = array();

      if(isset($conexion))
      {
        try
        {
          include_once 'Usuario.inc.php';

          $sql = "SELECT * FROM usuarios";

          $sentencia = $conexion -> prepare($sql);
          $sentencia -> execute();

          $resultado = $sentencia -> fetchAll();

          if(count($resultado))
          {
            foreach ($resultado as $fila)
            {
              $usuarios[] = new Usuario
              (
                $fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']
              );
            }
          }
          else {

              print 'No hay usuarios';

          }
        } catch (PDOException $ex)
        {
          print "ERROR" . $ex -> getMessage();
        }
      }

      return $usuarios;
    }
}