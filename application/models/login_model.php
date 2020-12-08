<?php

class Login_model extends CI_Model
{
   public function obtener_institucion()
   {
      // linea que carga la base de datos 
      $this->load->database();

      // se obtiene el listado de comunas desde la base de datos y se guarda en la variable $institucion
      $institucion = $this->db->get('institucion');

      // retorna resultado obtenido de la base de datos
      return $institucion->result();
   }
   //funcion que obtiene un solo registro por medio de la id
   public function obtener_una_institucion($id)
   {
      $this->load->database();

      $this->db->from('institucion');
      $this->db->where('idinstitucion', $id);
      $result = $this->db->get()->row_array();

      return $result["nom_institucion"];
   }

   //funcion que es para obtener UN delincuente 
   public function obtener_usuario_por_correo($usuario)
   {
      $this->load->database();

      $this->db->from('usuario');
      $this->db->where('correo', $usuario["email"]);
      $usuario_BD = $this->db->get()->row_array();

      if (!$usuario_BD) {
         $response = array(
            'statusCode'  => 403,
            'code' => 'ERRPASS',
            'mensaje'     => "Ingrese su contraseña correctamente",
         );
      } else {
         //comparar si la institucion ingresada es igual a la de BD 
         if ($usuario_BD["idinstitucion_fk"] == $usuario["institucion"]) {
            //comparar si la clave ingresada es igual a la de BD 
            if ($usuario_BD["clave"] == md5($usuario["pass"])) {
               $this->load->library('session');
               $session_storage = array(
                  'rol'  => $usuario_BD["rol"],
                  'email'     => $usuario_BD["correo"],
                  'institucion' => $usuario_BD["idinstitucion_fk"],
                  'logged_in' => TRUE
               );
               $this->session->set_userdata($session_storage);

               $response = array(
                  'statusCode'  => 200,
                  'code' => 'SUCCESS',
                  'mensaje'     => " ",

               );
            } else {
               $response = array(
                  'statusCode'  => 403,
                  'code' => 'ERRPASS',
                  'mensaje'     => "Ingrese su contraseña correctamente",

               );
            }
         } else {
            $response = array(
               'statusCode'  => 403,
               'code' => 'ERRINS',
               'mensaje'     => "Ingrese su institucion correctamente",

            );
         }

         return $response;
      }
   }
}
