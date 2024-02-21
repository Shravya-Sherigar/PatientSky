<?php

namespace App\Models;

use CodeIgniter\Model;

class patientskyModel extends Model
{

	public function get_calendars_list(){
		$data= array();
		$get_calendars_list = "CALL usp_read_calendar_list()";
		$query = $this->db->query($get_calendars_list,$data);
	
		if ($query) {
			return $query->getResultArray();
		}else{
		return [];
	  }
	}
	
	public function get_doctors_list(){
		$data= array();
		$usp_read_doctors_list = "CALL usp_read_doctors_list()";
		$query = $this->db->query($usp_read_doctors_list,$data);
	
		if ($query) {
			return $query->getResultArray();
		}else{
		return [];
	  }
	}

	public function get_avail_timeslots(){
		$data= array();
		$get_avail_timeslots = "CALL usp_read_calendar_list()";
		$query = $this->db->query($get_avail_timeslots,$data);
	
		if ($query) {
			return $query->getResultArray();
		}else{
		return [];
	  }
	}

	public function findAvailableTime($calender_type,$duration,$start_date,$end_date){
		$findAvailableTime = "CALL usp_find_available_slots(?,?,?,?)";
		$data = array($calender_type,$duration,$start_date,$end_date);
		$query = $this->db->query($findAvailableTime, $data);

        if ($query) {
            return $query->getResultArray();
        }else{
			return [];
    	}
	}

	


}