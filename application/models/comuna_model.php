<?php 

class Comuna_model extends CI_Model{

   /**funcion que sirve para obtener listado de comunas */
public function obtener_comuna(){
   // linea que carga la base de datos 
   $this->load->database(); 

   // se obtiene el listado de comunas desde la base de datos y se guarda en la variable $comuna
   $comunas = $this->db->get('comuna');

   // retorna resultado obtenido de la base de datos
   return $comunas->result();
}
//funcion que obtiene un solo registro por medio de la id
public function obtener_una_comuna($id){
   $this->load->database();

   $this->db->from('comuna');
   $this->db->where('idcomuna',$id);
   $result= $this->db->get()->row_array();

   return $result["nom_comuna"];  

}
}