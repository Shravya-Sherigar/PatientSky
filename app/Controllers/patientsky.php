<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class patientsky extends BaseController
{

  public function patientsky_doctors_availability()
	{


    $data['db'] = \Config\Database::connect();
    $data['calendarslist']= $this->patientskyModel->get_calendars_list();
    $data['get_doctors_list']= $this->patientskyModel->get_doctors_list();

    return view("patientsky_doctors_availability",$data);

	}
  
  
  public function findAvailableTime()
	{


    $data['db'] = \Config\Database::connect();
    $data['calendarslist']= $this->patientskyModel->get_calendars_list();
    $data['get_doctors_list']= $this->patientskyModel->get_doctors_list();

    return view("patientsky_doctors_availability",$data);

	}
  
  public function check_availabilty()
	{


    $data['db'] = \Config\Database::connect();
 
    $calender_type = $this->request->getVar('calender_type');
    $duration = $this->request->getVar('duration');
    $start_date = $this->request->getVar('start_date');
    $end_date = $this->request->getVar('end_date');

    $data['calender_type'] = $calender_type;
    $data['duration'] = $duration;
    $data['start_date'] = $start_date;
    $data['end_date'] = $end_date;

    $data['available_slots']= $this->patientskyModel->findAvailableTime($calender_type,$duration,$start_date.':00',$end_date.':00');
    $data['get_doctors_list']= $this->patientskyModel->get_doctors_list();

    return view("patientsky_doctors_availability",$data);

	}

}