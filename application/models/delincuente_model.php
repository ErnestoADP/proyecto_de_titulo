<?php

class Delincuente_model extends CI_Model
{

   /**funcion que sirve para ingresar delincuente a la bs */
   public function ingreso_delincuente($delincuente)
   {

      // linea que carga la base de datos 
      $this->load->database();

      //mapeo de datos para enviarlos a la bd
      $data = array(
         'rut' => $delincuente['rut'],
         'nombres' => $delincuente['nombres'],
         'apellidos' => $delincuente['apellidos'],
         'apodos' => $delincuente['apodos'],
         'domicilio' => $delincuente['domicilio'],
         'email' => $delincuente['email'],
         'fecha_nacimiento' => $delincuente['fechaNacimiento'],
         'estado' => $delincuente['estado'],
         'fk_comuna' => $delincuente['comuna'],
         'telefono' => $delincuente['fono'],
         'ultimo_lugar_visto' => $delincuente['visto'],
         'fk_sector' => $delincuente['sector'],
      );

      $this->db->from('delincuente');
      $this->db->where('rut', $delincuente['rut']);
      $existe = $this->db->get()->row_array();


      if ($existe) {
         return false;
      } else {
         //ejecucion que ingresa a la base de datos
         $this->db->insert('delincuente', $data);
         $id = $this->db->insert_id();


         $data_delito = array(
            'delincuente_iddelincuente' => $id,
            'delito_iddelito' => $delincuente['tipoDelito'],
            'comuna_idcomuna' => $delincuente['comuna_delito'],
            'sector_idsector' => $delincuente['sector_delito'],
            'direccion_delito' => $delincuente['direccion_delito'],
            'fecha_delito'  => date("Y-m-d"),

         );
         $this->db->insert('delincuente_has_delito', $data_delito);
      }
      // retorna resultado obtenido de la base de dato
   }
   //funcion que obtiene el listado de delincuentes ingresados
   public function obtener_delincuentes()
   {
      // linea que carga la base de datos 
      $this->load->database();

      // se obtiene el listado de delincuentes y se guarda en la variable $delincuentes
      $delincuentes = $this->db->get('delincuente');


      // retorna resultado obtenido de la base de datos
      return $delincuentes->result();
   }

   //funcion que es para obtener UN delincuente 
   public function obtener_porID_delincuente($id)
   {
      $this->load->database();

      $this->db->from('delincuente');
      $this->db->where('iddelincuente', $id);
      $result = $this->db->get()->row_array();


      $this->db->from('comuna');
      $this->db->where('idcomuna', $result["fk_comuna"]);
      $resultcomuna = $this->db->get()->row_array();

      $this->db->from('sector');
      $this->db->where('idsector', $result["fk_sector"]);
      $resultsector = $this->db->get()->row_array();



      $result["fk_comuna"] = $resultcomuna["nom_comuna"];
      $result["fk_sector"] = $resultsector["nomb_sector"];

      return $result;
   }


   //Funcion que edita UN delincuente a la base de dato
   public function editar_delincuente($delincuente, $id)
   {

      // linea que carga la base de datos 
      $this->load->database();

      //mapeo de datos para enviarlos a la bd
      $data = array(
         'rut' => $delincuente['rut'],
         'nombres' => $delincuente['nombres'],
         'apellidos' => $delincuente['apellidos'],
         'apodos' => $delincuente['apodos'],
         'domicilio' => $delincuente['domicilio'],
         'email' => $delincuente['email'],
         'fecha_nacimiento' => $delincuente['fechaNacimiento'],
         'estado' => $delincuente['estado'],
         'fk_comuna' => 1,
         'telefono' => $delincuente['fono'],
         'ultimo_lugar_visto' => $delincuente['visto'],
         'fk_sector' => $delincuente['sector'],
      );





      //ejecucion que ingresa a la base de datos
      // $this->db->set($data);
      $query = $this->db->update('delincuente', $data, array('iddelincuente' => $id));


      // retorna resultado obtenido de la base de datos

   }

   //Funcion que elimina UN registro de delincuente 
   public function eliminar_delincuente($id)
   {

      $this->db->delete('delincuente_has_delito', array('delincuente_iddelincuente' => $id));

      $this->db->delete('delincuente', array('iddelincuente' => $id));
   }
}
