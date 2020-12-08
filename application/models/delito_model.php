<?php

class Delito_model extends CI_Model
{

   /**funcion que sirve para obtener listado de delitos */
   public function obtener_delito()
   {
      // linea que carga la base de datos 
      $this->load->database();

      // se obtiene el listado de delitos desde la base de datos y se guarda en la variable $delitos
      $delitos = $this->db->get('delito');

      // retorna resultado obtenido de la base de datos
      return $delitos->result();
   }
   //funcion que obtiene un solo registro por medio de la id
   public function obtener_una_comuna($id)
   {
      $this->load->database();

      $this->db->from('comuna');
      $this->db->where('idcomuna', $id);
      $result = $this->db->get()->row_array();

      return $result["nom_comuna"];
   }

   public function obtener_porID_delincuente($id)
   {
      $this->load->database();

      $this->db->from('delincuente');
      $this->db->where('iddelincuente', $id);
      $result = $this->db->get()->row_array();

      return $result;
   }


   public function agregar_nuevo_Delito($delincuente , $id)
   {

      // linea que carga la base de datos 
      $this->load->database();
      

      $data_delito = array(
         'delincuente_iddelincuente' => $id,
         'delito_iddelito' => $delincuente['tipoDelito'],
         'comuna_idcomuna' => $delincuente['comuna_delito'],
         'sector_idsector' => $delincuente['sector_delito'],
         'direccion_delito' => $delincuente['direccion_delito'],
         'fecha_delito'  => date("Y-m-d"),

      );

      
      $this->db->insert('delincuente_has_delito', $data_delito);



      // retorna resultado obtenido de la base de datos


   }

   
}
