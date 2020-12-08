<?php

class Jefezona_model extends CI_Model
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

   public function obtener_rol()
   {
      // linea que carga la base de datos 
      $this->load->database();

      // se obtiene el listado de comunas desde la base de datos y se guarda en la variable $institucion
      $usuario = $this->db->get('usuario');

      // retorna resultado obtenido de la base de datos
      return $usuario->result();
   }

   public function obtener_un_rol($id)
   {
      $this->load->database();

      $this->db->from('usuario');
      $this->db->where('idusuario', $id);
      $result = $this->db->get()->row_array();

      return $result["rol"];
   }
   



 
}
