<!DOCTYPE html>
<html>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.text-center{
  text-align:center;
}
</style>
<body>

<h3>PatientSky Backend Developer Test</h3><br/>

<div>
<?php $action=base_url('check_availabilty'); ?>
<form name="check_availabilty" class="user autoCompleteOff mt-4" action="<?=$action ?>" method="post" enctype="multipart/form-data">

    <label for="fname"><b>Doctor's Name</b></label>
    <select required name="calender_type" id="calender_type">
        <option value="">Select</option>
        <?php foreach($get_doctors_list as $row){ ?>
        <option value="<?php echo $row['calender_id'] ?>" <?php if($calender_type == $row['calender_id']){echo 'selected';} ?>><?php echo $row['doctor_name']; ?></option>
        <?php } ?>
    </select>  

    &ensp;&ensp;&ensp;&ensp;

    <label for="lname"><b>Duration (in Minutes)</b></label>
    <?php if($duration){ $duration = $duration; } ?>
    <input type="text" name="duration" id="duration" value="<?php echo $duration; ?>" required>

    &ensp;&ensp;&ensp;&ensp;

    <label for="lname"><b>Start Date & Time</b></label>
    <?php if($start_date){ $start_date = $start_date; } ?>
    <input type="datetime-local" name="start_date" id="start_date" value="<?php echo $start_date; ?>" step="1" required >

    &ensp;&ensp;&ensp;&ensp;

    <label for="lname"><b>End Date & Time</b></label>
    <?php if($end_date){ $end_date = $end_date; } ?>
    <input type="datetime-local" name="end_date" id="end_date" value="<?php echo $end_date; ?>" step="1" required>

    <br/>
    <br/>
    <input type="submit" value="Check Doctor's Availability">
  </form>

  <br/>
  <br/> 

  <?php //if(isset($available_slots)){ ?>
  <h3>Available Doctors with timeslots</h3>

<table style="width:100%">
  <tr>
    <th>Doctor's Name</th>
    <th>Available / Not Available</th> 
    <th>Start Date & Time</th>
    <th>End Date & Time</th>
  </tr>
    <?php 
        if(isset($available_slots) && count($available_slots) != "0"){
            foreach($available_slots as $row){
              $timeslots_public_bookable = $row['timeslots_public_bookable'];
              if($timeslots_public_bookable == True){ $timeslots_public_bookable_flag = "Available";}else{ $timeslots_public_bookable_flag = " Not Available"; }
                echo "<tr><td class='text-center'>".$row['doctor_name']."</td>";
                echo "<td class='text-center'>".$timeslots_public_bookable_flag."</td>";
                echo "<td class='text-center'>".date('d-m-Y :: H:i:s',strtotime($row['timeslots_start']))."</td>";
                echo "<td class='text-center'>".date('d-m-Y :: H:i:s',strtotime($row['timeslots_end']))."</td></tr>";
            }
        }else{
          echo "<tr><td colspan='4' class='text-center'>No Informations Available</td></tr>";
        }
            
    ?>
  </tr>
</table>
<?php //} ?>


</div>

</body>
</html>


