<?php 

class Institucion_model extends CI_Model{

   /**funcion que sirve para obtener listado de comunas */
public function obtener_institucion(){
   // linea que carga la base de datos 
   $this->load->database(); 

   // se obtiene el listado de comunas desde la base de datos y se guarda en la variable $comuna
   $institucion = $this->db->get('institucion');

   // retorna resultado obtenido de la base de datos
   return $institucion->result();
}
//funcion que obtiene un solo registro por medio de la id
public function obtener_una_institucion($id){
   $this->load->database();

   $this->db->from('institucion');
   $this->db->where('idinstitucion',$id);
   $result= $this->db->get()->row_array();

   return $result["nom_institucion"];  

}
}