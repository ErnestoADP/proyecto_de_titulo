<?php

class Usuario_model extends CI_Model
{

   /**funcion que sirve para ingresar delincuente a la bs */
   public function ingreso_usuario($usuario)
   {
      
      // linea que carga la base de datos 
      $this->load->database();

      //mapeo de datos para enviarlos a la bd
      $data = array(
         
         'nombre' => $usuario['nombre'],
         'clave' => md5($usuario['clave']),
         'fecha_habilitacion' => date("Y-m-d"),
         'rol' => $usuario['rol'], 
         'idinstitucion_fk' => $usuario['institucion'],
         'correo' => $usuario['correo'],    
         'rut' => $usuario['rut'], 


      );

      

      //ejecucion que ingresa a la base de datos
      $this->db->insert('usuario', $data);



      // retorna resultado obtenido de la base de datos

   }
   //funcion que obtiene el listado de delincuentes ingresados
   public function obtener_usuarios()
   {
      // linea que carga la base de datos 
      $this->load->database();

      // se obtiene el listado de delincuentes y se guarda en la variable $delincuentes
      $delincuentes = $this->db->get('usuario');


      // retorna resultado obtenido de la base de datos
      return $delincuentes->result();
   }

   //funcion que es para obtener UN delincuente 
   public function obtener_porID_usuario($id)
   {
      $this->load->database();

      $this->db->from('usuario');
      $this->db->where('idusuario', $id);
      $result = $this->db->get()->row_array();

      return $result;
   }

   //Funcion que edita UN delincuente a la base de dato
   public function editar_usuario($usuario, $id)
   {

      // linea que carga la base de datos 
      $this->load->database();

      //mapeo de datos para enviarlos a la bd
      $data = array(
         'nombre' => $usuario['nombre'],
         'clave' => $usuario['clave'],
         
         'rol' => $usuario['rol'], 
         'idinstitucion_fk' => $usuario['institucion'],
         'correo' => $usuario['correo'],    
         'rut' => $usuario['rut'],   

     );

      //ejecucion que ingresa a la base de datos
      // $this->db->set($data);
      $query = $this->db->update('usuario', $data, array('idusuario' => $id));


      // retorna resultado obtenido de la base de datos

   }

   //Funcion que elimina UN registro de delincuente 
   public function eliminar_usuario($id)
   {
      $this->db->delete('usuario', array('idusuario' => $id));
   }
}