<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medias_Model extends CI_Model{
	
	public function add_media( $media_id, $file_name, $file_type, $file_size, $url ){
            $sql_status_check = $this->db->query("SELECT id FROM medias WHERE media_id = '$media_id' AND status = '1'");
            if( $sql_status_check->num_rows() != 0 ){
                  $old_id = $sql_status_check->result()[0]->id;
                  $sql = $this->db->query("UPDATE medias SET status = '0' WHERE id = '$old_id' LIMIT 1");
            }
            $date = new DateTime();
            $date = $date->getTimestamp();
            $data = array(
            'media_id' => $media_id,
            'name' => $file_name,
            'type' => $file_type,
            'size' => $file_size,
            'url' => $url,
            'timestamp' => $date,
            'created_by' => $this->session->userdata('user_id')
            );
            $sql = $this->db->insert('medias', $data);
            return $sql == true;
      }

      public function show_media_details_data( $media_id ){
            $sql = $this->db->query("SELECT * FROM medias WHERE media_id = '$media_id' AND status = '1' LIMIT 1");
            if( $sql->num_rows() != 0 ){
                  return $sql->result()[0];
            }else{
                  return (object) array(
                        "name" => "",
                        "type" => "",
                        "url" => "",
                        "timestamp" => ""
                  );
            }
      }

      public function get_full_path( $media_id ){
            $sql_url_check = $this->db->query("SELECT url FROM medias WHERE media_id = '$media_id' AND status = '1'");
            if( $sql_url_check->num_rows() != 0 ){
                  return $sql_url_check->result()[0]->url;
            }else{
                  return false;
            }
      }

      public function delete( $media_id ){
            $sql_status_check = $this->db->query("SELECT id FROM medias WHERE media_id = '$media_id' AND status = '1'");
            $old_id = $sql_status_check->result()[0]->id;
            $sql = $this->db->query("UPDATE medias SET status = '0' WHERE id = '$old_id' LIMIT 1");
            return $sql == true;
      }


}