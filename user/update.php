<?php 
	
	include 'include/header.php';
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{

           if(isset($_POST['submit']))
  {
       //name input check
      if(isset($_POST['name']) && !empty($_POST['name']))
      {
         if(preg_match('/^[A-Za-z\s]+$/',$_POST['name']))
         {
            $name = $_POST['name'];
         }
         else
         {
            $nameError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Only lower and upper case and space characters are allowed.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
         }
      }
      else
      {
         $nameError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please fill the name field.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
      //gender input check
      if(isset($_POST['gender']) && !empty($_POST['gender']))
      {
         $gender = $_POST['gender'];
      }
      else
      {
         $genderError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Select ypur gender.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
      ///day input check
      if(isset($_POST['day']) && !empty($_POST['day']))
      {
         $day = $_POST['day'];
      }
      else
      {
         $dayError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Please select day.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
      if(isset($_POST['month']) && !empty($_POST['month']))
      {
         $month = $_POST['month'];
      }
      else
      {
         $monthError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select month.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
      if(isset($_POST['year']) && !empty($_POST['year']))
      {
         $year = $_POST['year'];
      }
      else
      {
         $yearError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select year.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
      //blood group input check
      if(isset($_POST['blood_group']) && !empty($_POST['blood_group']))
      {
         $blood_group = $_POST['blood_group'];
      }
      else
      {
         $blood_groupError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select blood group.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
      //city input check
      if(isset($_POST['city']) && !empty($_POST['city']))
      {
         if(preg_match('/^[A-Za-z\s]+$/',$_POST['city']))
         {
            $city = $_POST['city'];
         }
         else
         {
            $cityError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Only lower and upper case and space characters are allowed.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
         }
      }
      else
      {
         $cityError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please fill the city field.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
      //contact input check
      if(isset($_POST['contact_no']) && !empty($_POST['contact_no']))
      {
         if(preg_match('/\d{10}/',$_POST['contact_no']))
         {
            $contact = $_POST['contact_no'];
         }
         else
         {
            $contactError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Contact should consist of 10 character .</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
         }
      }
      else
      {
         $contactError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please fill the contact field.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
     //email input check
      if(isset($_POST['email']) && !empty($_POST['email']))
      {
      	$pattern = '/^[a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
         if(preg_match($pattern,$_POST['email']))
         {
         	$check_email = $_POST['email'];

         	$sql = " SELECT email FROM donor WHERE email='$check_email' ";
         	$result=mysqli_query($conn,$sql);
         	if(mysqli_num_rows($result)>0)
         	{
               $emailError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry! This email already exist.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
         	}
         	else
         	{
               $email = $_POST['email'];
         	}
            
         }
         else
         {
            $emailError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please enter valid email address.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
         }
      }
      else
      {
         $emailError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please fill the email field.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
    //insert data into database
    if(isset($name) && isset($blood_group) && isset($gender) && isset($day) && isset($month) && isset($year) && isset($email) && isset($contact) && isset($city))
    {
    	$DonorDOB = $year. "-" .$month. "-" .$day;
    	
    	$sql = "UPDATE donor SET name='$name',gender='$gender',email='$email',city='$city',dob='$DonorDOB',contact_no='$contact',blood_group='$blood_group' WHERE id=".$_SESSION['user_id'];
    	if(mysqli_query($conn,$sql))
    	{
          			$updateSuccess= '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Updated Successfully.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
        ?>
          <script>
          	function myFunction()
          	{
          		location.reload();
          	}
          </script>
        <?php
    	}
    	else
    	{
              $updateError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data not updated.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
    	}
    }
           }

$sql = "SELECT * FROM donor WHERE id=".$_SESSION['user_id'];

           $result=mysqli_query($conn,$sql);
           if(mysqli_num_rows($result)>0){
           	while($row = mysqli_fetch_assoc($result)){
           		$userID=$row['id'];
           		$name=$row['Name'];
           		$blood_group= $row['blood_group'];
           		$gender = $row['Gender'];
           		$email = $row['Email'];
           		$contact = $row['Contact_no'];
           		$city = $row['City']; 

                $dob = $row['DOB'];
           		$date = explode("-",$dob);
 
           		$dbPassword = $row['Password'];
           	}

   if(isset($_POST['update_pass'])){

   	if(isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['c_password']) && !empty($_POST['c_password']) && isset($_POST['new_password']) && !empty($_POST['new_password']))
      {

      	$oldpassword = md5($_POST['old_password']);
      	if($oldpassword==$dbPassword)
      	{
           if(strlen($_POST['new_password'])>=6)
      	   {
                if($_POST['new_password'] == $_POST['c_password'])
                {
                 $password=md5($_POST['new_password']);
                }
                else
                {
           	$passwordError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Passwords are not same.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
                }
      	}
      	else
      	{
      		$passwordError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>The password should consist of 6 characters.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      	}
    }
      	else
      	{
           $passwordError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please enter valid password.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      	}
      	
      }
      else
      {
      	$passwordError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please fill password field.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
      }
      if(isset($password)){
      	$sql = "UPDATE donor SET Password='$password' WHERE id='$userID' ";
		if(mysqli_query($conn,$sql))
		{
			$updatePasswordSuccess= '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Updated.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
			?>
			    <script>
			    	function myFunction()
			    	{
			    		location.reload();
			    	}

			    </script>
			<?php
		}
		else
		{
         $passwordError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data not inserted. Try again!.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
		}
   }
  }
}

if(isset($_POST['delete_account']))
{  
   if(isset($_POST['account_password']) && !empty($_POST['account_password']))
   {
   	$account_password = md5($_POST['account_password']);
   	if($account_password==$dbPassword)
   	{
   		$showForm = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Are you sure to delete your account?</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">  
                    <span aria-hidden="true">&times;</span>
                </button>
                <form target="" method="post">
                <br>
                <input type="hidden" name="userID" value="'.$_SESSION['user_id'].'">
                <button type="submit" name="updateSave" class="btn btn-danger">Yes</button>

                <button type="button" class="btn btn-info" data-dismiss="alert">
                <span aria-hidden="true">Oops! No </span>
                </button>      
            </form>
     </div>';
   	}
	else
	{
		$deleteAccountError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please enter valid password.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
	}
</div>' ;
        	
   }
}
   else
   {
     $deleteAccountError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please enter your passowrd. Try again!.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
	}
</div>' ;
   }
}

if (isset($_POST['userID'])) 
{
	$userID = $_POST['userID'];

	$sql = "DELETE FROM donor WHERE id=".$userID;
	if(mysqli_query($conn,$sql))
		{
		   header("Location: logout.php");
		}
		else
		{
         $deletesubmitError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data not inserted. Try again!.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
		}
}

  include 'include/sidebar.php';
?>

<style>
	.form-group{
		text-align: left;
	}
	.form-container{

		padding: 20px 10px 20px 30px;

	}
</style>
			<div class="container" style="padding: 60px 0;">
			<div class="row">
				
				<div class=" card col-md-6 offset-md-3">
					<div class="panel panel-default" style="padding: 20px;">
					
					<!-- Error Messages -->	
               <?php
                 if(isset($deletesubmitError))
                 	echo $deletesubmitError;
                 if(isset($showForm))
					    	echo $showForm;
                 if(isset($updateError)) echo $updateError;
                 if(isset($updateSuccess)) echo $updateSuccess;
               ?>

						<form class="form-group" action="" method="post">
					<div class="form-group">
						<label for="fullname">Full Name</label>
						<input type="text" name="name" id="fullname" placeholder="Full Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case and space" class="form-control" value="<?php
					 if(isset($name)) 
					  echo $name;
					?>">
						<?php
					 if(isset($nameError)) 
					  echo $nameError;
					?>
					</div><!--full name-->
					<div class="form-group">
              <label for="name">Blood Group</label><br>
              <select class="form-control demo-default" id="blood_group" name="blood_group" required>
                <option value="">---Select Your Blood Group---</option>
                <?php
                  if(isset($blood_group)) echo '<option selected="" value=" '.$blood_group.' ">'.$blood_group.'</option>';
                ?>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O+</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
            </div><!--End form-group-->
            <?php
					 if(isset($blood_groupError)) 
					  echo $blood_groupError;
					?>
					<div class="form-group">
				              <label for="gender">Gender</label><br>
				              		Male<input type="radio" name="gender" id="gender" value="Male" style="margin-left:10px; margin-right:10px;" checked>
				              		Female<input type="radio" name="gender" id="gender" value="Female" style="margin-left:10px;" <?php if(isset($gender)) { if($gender=="Female") echo "checked";} ?> >
				              		<?php
					 if(isset($genderError)) 
					  echo $genderError;
					?>
				    </div><!--gender-->
				    <div class="form-inline">
              <label for="name">Date of Birth</label><br>
              <select class="form-control demo-default" id="date" name="day" style="margin-bottom:10px;" required>
                <option value="">---Date---</option>
                <?php
                  if(isset($date['2'])) echo '<option selected="" value=" '.$date['2'].' ">'.$date['2'].'</option>';
                ?>
                <option value="01" >01</option><option value="02" >02</option><option value="03" >03</option><option value="04" >04</option><option value="05" >05</option><option value="06" >06</option><option value="07" >07</option> <option value="08" >08</option><option value="09" >09</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option><option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option><option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" >24</option><option value="25" >25</option><option value="26" >26</option><option value="27" >27</option><option value="28" >28</option><option value="29" >29</option><option value="30" >30</option><option value="31" >31</option>
              </select>
              <select class="form-control demo-default" name="month" id="month" style="margin-bottom:10px;" required>
                <option value="">---Month---</option>
                <?php
                  if(isset($date['1'])) echo '<option selected="" value=" '.$date['1'].' ">'.$date['1'].'</option>';
                ?>
                <option value="01" >January</option><option value="02" >February</option><option value="03" >March</option><option value="04" >April</option><option value="05" >May</option><option value="06" >June</option><option value="07" >July</option><option value="08" >August</option><option value="09" >September</option><option value="10" >October</option><option value="11" >November</option><option value="12" >December</option>
              </select>
              <select class="form-control demo-default" id="year" name="year" style="margin-bottom:10px;" required>
                <option value="">---Year---</option>
                <?php
                  if(isset($date['0'])) echo '<option selected="" value=" '.$date['0'].' ">'.$date['0'].'</option>';
                ?>
                <option value="1957" >1957</option><option value="1958" >1958</option><option value="1959" >1959</option><option value="1960" >1960</option><option value="1961" >1961</option><option value="1962" >1962</option><option value="1963" >1963</option><option value="1964" >1964</option><option value="1965" >1965</option><option value="1966" >1966</option><option value="1967" >1967</option><option value="1968" >1968</option><option value="1969" >1969</option><option value="1970" >1970</option><option value="1971" >1971</option><option value="1972" >1972</option><option value="1973" >1973</option><option value="1974" >1974</option><option value="1975" >1975</option><option value="1976" >1976</option><option value="1977" >1977</option><option value="1978" >1978</option><option value="1979" >1979</option><option value="1980" >1980</option><option value="1981" >1981</option><option value="1982" >1982</option><option value="1983" >1983</option><option value="1984" >1984</option><option value="1985" >1985</option><option value="1986" >1986</option><option value="1987" >1987</option><option value="1988" >1988</option><option value="1989" >1989</option><option value="1990" >1990</option><option value="1991" >1991</option><option value="1992" >1992</option><option value="1993" >1993</option><option value="1994" >1994</option><option value="1995" >1995</option><option value="1996" >1996</option><option value="1997" >1997</option><option value="1998" >1998</option><option value="1999" >1999</option>
              </select>

            </div><!--End form-group-->
           <?php
					 if(isset($dayError)) 
					  echo $dayError;
					?>
					<?php
					 if(isset($monthError)) 
					  echo $monthError;
					?>
					<?php
					 if(isset($yearError)) 
					  echo $yearError;
					?>
				    <div class="form-group">
						<label for="fullname">Email</label>
						<input type="text" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email" class="form-control" value="<?php
                  if(isset($email)) echo $email;
                ?>">
						<?php
					 if(isset($emailError)) 
					  echo $emailError;
					?>
					</div>
					
					<div class="form-group">
              <label for="contact_no">Contact No</label>
              <input type="text" name="contact_no" placeholder="**********" class="form-control" required pattern="^\d{10}$" title="10 numeric characters only" maxlength="10" value="<?php
                  if(isset($contact)) echo $contact ;
                ?>">
              <?php
					 if(isset($contactError)) 
					  echo $contactError;
					?>
            </div><!--End form-group-->
            
					<div class="form-group">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control demo-default" required>
	<option value="">-- Select --</option>
	<?php
                  if(isset($city)) echo '<option selected="" value=" '.$city.' ">'.$city.'</option>';
                ?><option disabled="disabled" style="background-color:#3E3E3E"><font color="#000000"><i>-Top Metropolitan Cities-</i></font></option>
<option>Ahmedabad</option>
<option>Bengaluru/Bangalore</option>
<option>Chandigarh</option>
<option>Chennai</option>
<option>Delhi</option>
<option>Gurgaon</option>
<option>Hyderabad/Secunderabad</option>
<option>Kolkata</option>
<option>Mumbai</option>
<option>Noida</option>
<option>Pune</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Andhra Pradesh-</i></font></option>
<option>Anantapur</option>
<option>Guntakal</option>
<option>Guntur</option>
<option>Hyderabad/Secunderabad</option>
<option>kakinada</option>
<option>kurnool</option>
<option>Nellore</option>
<option>Nizamabad</option>
<option>Rajahmundry</option>
<option>Tirupati</option>
<option>Vijayawada</option>
<option>Visakhapatnam</option>
<option>Warangal</option>
<option>Andra Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Arunachal Pradesh-</i></font></option>
<option>Itanagar</option>
<option>Arunachal Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Assam-</i></font></option>
<option>Guwahati</option>
<option>Silchar</option>
<option>Assam-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Bihar-</i></font></option>
<option>Bhagalpur</option>
<option>Patna</option>
<option>Bihar-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Chhattisgarh-</i></font></option>
<option>Bhillai</option>
<option>Bilaspur</option>
<option>Raipur</option>
<option>Chhattisgarh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Goa-</i></font></option>
<option>Panjim/Panaji</option>
<option>Vasco Da Gama</option>
<option>Goa-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Gujarat-</i></font></option>
<option>Ahmedabad</option>
<option>Anand</option>
<option>Ankleshwar</option>
<option>Bharuch</option>
<option>Bhavnagar</option>
<option>Bhuj</option>
<option>Gandhinagar</option>
<option>Gir</option>
<option>Jamnagar</option>
<option>Kandla</option>
<option>Porbandar</option>
<option>Rajkot</option>
<option>Surat</option>
<option>Vadodara/Baroda</option>
<option>Valsad</option>
<option>Vapi</option>
<option>Gujarat-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Haryana-</i></font></option>
<option>Ambala</option>
<option>Chandigarh</option>
<option>Faridabad</option>
<option>Gurgaon</option>
<option>Hisar</option>
<option>Karnal</option>
<option>Kurukshetra</option>
<option>Panipat</option>
<option>Rohtak</option>
<option>Haryana-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Himachal Pradesh-</i></font></option>
<option>Dalhousie</option>
<option>Dharmasala</option>
<option>Kulu/Manali</option>
<option>Shimla</option>
<option>Himachal Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jammu and Kashmir-</i></font></option>
<option>Jammu</option>
<option>Srinagar</option>
<option>Jammu and Kashmir-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jharkhand-</i></font></option>
<option>Bokaro</option>
<option>Dhanbad</option>
<option>Jamshedpur</option>
<option>Ranchi</option>
<option>Jharkhand-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Karnataka-</i></font></option>
<option>Bengaluru/Bangalore</option>
<option>Belgaum</option>
<option>Bellary</option>
<option>Bidar</option>
<option>Dharwad</option>
<option>Gulbarga</option>
<option>Hubli</option>
<option>Kolar</option>
<option>Mangalore</option>
<option>Mysoru/Mysore</option>
<option>Karnataka-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Kerala-</i></font></option>
<option>Calicut</option>
<option>Cochin</option>
<option>Ernakulam</option>
<option>Kannur</option>
<option>Kochi</option>
<option>Kollam</option>
<option>Kottayam</option>
<option>Kozhikode</option>
<option>Palakkad</option>
<option>Palghat</option>
<option>Thrissur</option>
<option>Trivandrum</option>
<option>Kerela-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Madhya Pradesh-</i></font></option>
<option>Bhopal</option>
<option>Gwalior</option>
<option>Indore</option>
<option>Jabalpur</option>
<option>Ujjain</option>
<option>Madhya Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Maharashtra-</i></font></option>
<option>Ahmednagar</option>
<option>Aurangabad</option>
<option>Jalgaon</option>
<option>Kolhapur</option>
<option>Mumbai</option>
<option>Mumbai Suburbs</option>
<option>Nagpur</option>
<option>Nasik</option>
<option>Navi Mumbai</option>
<option>Pune</option>
<option>Solapur</option>
<option>Maharashtra-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Manipur-</i></font></option>
<option>Imphal</option>
<option>Manipur-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Meghalaya-</i></font></option>
<option>Shillong</option>
<option>Meghalaya-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Mizoram-</i></font></option>
<option>Aizawal</option>
<option>Mizoram-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Nagaland-</i></font></option>
<option>Dimapur</option>
<option>Nagaland-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Orissa-</i></font></option>
<option>Bhubaneshwar</option>
<option>Cuttak</option>
<option>Paradeep</option>
<option>Puri</option>
<option>Rourkela</option>
<option>Orissa-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Punjab-</i></font></option>
<option>Amritsar</option>
<option>Bathinda</option>
<option>Chandigarh</option>
<option>Jalandhar</option>
<option>Ludhiana</option>
<option>Mohali</option>
<option>Pathankot</option>
<option>Patiala</option>
<option>Punjab-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Rajasthan-</i></font></option>
<option>Ajmer</option>
<option>Jaipur</option>
<option>Jaisalmer</option>
<option>Jodhpur</option>
<option>Kota</option>
<option>Udaipur</option>
<option>Rajasthan-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Sikkim-</i></font></option>
<option>Gangtok</option>
<option>Sikkim-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tamil Nadu-</i></font></option>
<option>Chennai</option>
<option>Coimbatore</option>
<option>Cuddalore</option>
<option>Erode</option>
<option>Hosur</option>
<option>Madurai</option>
<option>Nagerkoil</option>
<option>Ooty</option>
<option>Salem</option>
<option>Thanjavur</option>
<option>Tirunalveli</option>
<option>Trichy</option>
<option>Tuticorin</option>
<option>Vellore</option>
<option>Tamil Nadu-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tripura-</i></font></option>
<option>Agartala</option>
<option>Tripura-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Union Territories-</i></font></option>
<option>Chandigarh</option>
<option>Dadra & Nagar Haveli-Silvassa</option>
<option>Daman & Diu</option>
<option>Delhi</option>
<option>Pondichery</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttar Pradesh-</i></font></option>
<option>Agra</option>
<option>Aligarh</option>
<option>Allahabad</option>
<option>Bareilly</option>
<option>Faizabad</option>
<option>Ghaziabad</option>
<option>Gorakhpur</option>
<option>Kanpur</option>
<option>Lucknow</option>
<option>Mathura</option>
<option>Meerut</option>
<option>Moradabad</option>
<option>Noida</option>
<option>Varanasi/Banaras</option>
<option>Uttar Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttaranchal-</i></font></option>
<option>Dehradun</option>
<option>Roorkee</option>
<option>Uttaranchal-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-West Bengal-</i></font></option>
<option>Asansol</option>
<option>Durgapur</option>
<option>Haldia</option>
<option>Kharagpur</option>
<option>Kolkata</option>
<option>Siliguri</option>
<option>West Bengal - Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Other-</i></font></option>
<option>Other</option></select>
	<?php
					 if(isset($cityError)) 
					  echo $cityError;
					?>
            </div><!--city end-->
            
           
					<div class="form-group">
						<button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">  Update</button>
					</div>
				</form>
					</div>
				</div>
				<div class="card col-md-6 offset-md-3">
                

					<div class="panel panel-default" style="padding: 20px;">
					

					<!-- Messages -->	

						<form action="" method="post" class="form-group form-container" >
						 <?php
                    if(isset($passwordError)) echo $passwordError;
                    if(isset($updatePasswordSuccess)) echo  $updatePasswordSuccess;
                 ?>
							<div class="form-group">
								<label for="oldpassword">Current Password</label>
								<input type="password" required name="old_password" placeholder="Current Password" class="form-control">
							</div>
							<div class="form-group">
								<label for="newpassword">New Password</label>
								<input type="password" required name="new_password" placeholder="New Password" class="form-control">
							</div>
							<div class="form-group">
								<label for="c_password">Confirm Password</label>
								<input type="password" required name="c_password" placeholder="Confirm Password" class="form-control">
							</div>
							<div class="form-group">
								<button class="btn btn-lg btn-danger center-aligned" type="submit" name="update_pass">Update Password</button>
							</div>
						</form>
					</div>
				</div>


				<div class="card col-md-6 offset-md-3">
					<?php
					    if(isset($deleteAccountError))
					    	echo $deleteAccountError;
					?>
					<!-- Display Message -->
                    	
					<div class="panel panel-default" style="padding: 20px;">
						<form action="" method="post" class="form-group form-container" >
							
							<div class="form-group">
								<label for="oldpassword">Password</label>
								<input type="password" required name="account_password" placeholder="Current Password" class="form-control">
							</div>

							<div class="form-group">
								<button class="btn btn-lg btn-danger center-aligned" type="submit" name="delete_account">Delete Account</button>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	
<?php
}
	else
	{
       header("Location: ../index.php");
	}
include 'include/footer.php'; 
 ?>