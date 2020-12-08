<?php 

class Sector_model extends CI_Model{

   /**funcion que sirve para obtener listado de comunas */
public function obtener_sector(){
   // linea que carga la base de datos 
   $this->load->database(); 

   // se obtiene el listado de comunas desde la base de datos y se guarda en la variable $comuna
   $sectores = $this->db->get('sector');

   // retorna resultado obtenido de la base de datos
   return $sectores->result();
}
//funcion que obtiene un solo registro por medio de la id
public function obtener_un_sector($id){
   $this->load->database();

   $this->db->from('sector');
   $this->db->where('idsector',$id);
   $result= $this->db->get()->row_array();

   return $result["nomb_sector"];  

}
}