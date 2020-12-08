<?php

class Detalle_model extends CI_Model
{
   //funcion que es para obtener UN delincuente 
   public function obtener_delitos_por_delincuente($iddelincuente)
   {
      $this->load->database();

      $this->db->from('delincuente_has_delito');
      $this->db->where('delincuente_iddelincuente', $iddelincuente);
      $delitos_cometidos = $this->db->get()->result();

      if ($delitos_cometidos) {
         foreach ($delitos_cometidos as $delito) {

            $this->db->from('delito');
            $this->db->where('iddelito', $delito->delito_iddelito);
            $detalle = $this->db->get()->row();

            $delito->delito_iddelito = $detalle->nom_delito;
         }
      }

      return $delitos_cometidos;
   }

   public function obtener_has_delito()
   {
      // linea que carga la base de datos 
      $this->load->database();


      // se obtiene el listado de comunas desde la base de datos y se guarda en la variable $comuna
      $delincuenteHasDelito = $this->db->get('delincuente_has_delito')->result();


      if ($delincuenteHasDelito) {
         foreach ($delincuenteHasDelito as $item) {
            $this->db->from('comuna');
            $this->db->where('idcomuna', $item->comuna_idcomuna);
            $comuna = $this->db->get()->row();

            $item->comuna_idcomuna = $comuna->nom_comuna;

            $this->db->from('sector');
            $this->db->where('idsector', $item->sector_idsector);
            $sector = $this->db->get()->row();

            $item->sector_idsector = $sector->nomb_sector;

            $this->db->from('delito');
            $this->db->where('iddelito', $item->delito_iddelito);
            $delito = $this->db->get()->row();

            $item->delito_iddelito = $delito->nom_delito;

            $this->db->from('delincuente');
            $this->db->where('iddelincuente', $item->delincuente_iddelincuente);
            $delincuente = $this->db->get()->row();

            $item->delincuente_iddelincuente = $delincuente->nombres.' '.$delincuente->apellidos;
         }
      }

      return $delincuenteHasDelito;

      // retorna resultado obtenido de la base de datos

   }
}
