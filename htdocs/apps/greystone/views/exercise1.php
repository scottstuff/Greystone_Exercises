<?php

class Exercise1 {

	protected $frm_people_id;
	protected $frm_countrycodes_id;
	protected $frm_occupations_id;
	protected $frm_name;
	protected $frm_email;
	protected $frm_email_visable;
	protected $frm_gender;
	protected $frm_age;
	
	protected $occ = array();
	protected $cntry = array();
	protected $edit_form = true;

	public function __construct()
	{
		if (isset($_POST['app'])) {
			if (isset($_POST['occupations_id'])) {
				$this->occ = $_POST['occupations_id'];
				$this->cntry = $_POST['countrycodes_id'];
				$person = new Person();
				$person->addPerson();
				$this->edit_form = false;
			} else {
				$this->occ = array(0 => "");
				$this->cntry = array(0 => "");
				$this->edit_form = true;
			}
		} else {
			$this->edit_form = true;
			$this->occ = array(0 => "");
			$this->cntry = array(0 => "");
		}
		$this->display();
	}

	public function __default()
	{
		return Occupation::__construct();
	}

	public function display() {

		// get models
		require_once(MVC_BASE_PATH.'/apps/greystone/models/Occupation.php');
		require_once(MVC_BASE_PATH.'/apps/greystone/models/Country.php');
		
		// get occupation and country lists
		$occupations_result = Occupation::get_all_occupations();
		$countries_result = Country::get_all_countries();

		// spew the page
		$this->header_spew();
		$this->body_top_spew();
		$this->form_top_spew();

		$this->name_spew();
		$this->email_spew();
		$this->email_visable_spew();

		$this->occ_select_spew($occupations_result);
		$this->cntry_select_spew($countries_result);
		
		$this->gender_spew();
		$this->age_spew();
		$this->bottom_spew();
		
	}
	
	public function header_spew()
	{
		echo  "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
		<html xmlns=\"http://www.w3.org/1999/xhtml\">
		<head>
			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
			<title>UCF College of Science</title>
			<link rel=\"stylesheet\" href=\"/apps/greystone/views/styles/main.css\" type=\"text/css\" media=\"screen\" />
			<script type=\"text/javascript\" src=\"/apps/greystone/views/js/jquery-1.3.2.min.js\"></script>
			<script type=\"text/javascript\" src=\"/apps/greystone/views/js/overlay.js\"></script>
			<script type=\"text/javascript\" src=\"/apps/greystone/views/js/formvalidate.js\"></script>
		</head>";
			
	}
	
	public function body_top_spew()
	{
		echo "\n		<body><div class=\"maincontent\">
			<div class=\"hd\">
				<br />
				<span><h2>Personal Profile</h2></span><br /><br />
			</div>
				</div>
					<div class=\"formcontent\">";
			
	}
	
	public function form_top_spew()
	{
		echo "			<h1><center>Demo of jQuery, CSS and xhtml</center></h1>
		<form id=\"personal_profile_form\" action=\"/index.php?app=greystone&bind=Person&action=addPerson&view_display=Exercise1\" method=\"post\" onsubmit=\"return validateForm(this)\">
		 <input type=\"hidden\" name=\"app\" value=\"greystone\" />
		 <input type=\"hidden\" name=\"bind\" value=\"Person\" />
		 <input type=\"hidden\" name=\"event\" value=\"__default\" />
		 <input type=\"hidden\" name=\"event\" value=\"Exercise1\" />
		 <div>";
	}
	
	public function name_spew()
	{
		echo "		<label for=\"name\">Name:</label>&nbsp;&nbsp;&nbsp;
		<input class=\"txt\" id=\"name\" type=\"text\" name=\"name\" size=\"30\" value=\"";
		echo (($this->edit_form)?'':$_POST['name']);
		echo "\" ";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo " />
		 </div>";
	}
	
	public function email_spew()
	{
		echo "		 <div>
		<label for=\"email\">Email:</label>&nbsp;&nbsp;&nbsp;
			<input class=\"txt\" id=\"email\" type=\"text\" name=\"email\" size=\"50\" value=\"";
		echo (($this->edit_form)?'':$_POST['email']);
		echo "\" ";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo " />
		 </div>";
	}
	
	public function email_visable_spew()
	{
		echo "		 <div>
		<label for=\"ppform\">Make your email visable?:</label>&nbsp;&nbsp;&nbsp;
		Yes<input class=\"txt\" id=\"yes\" type=\"radio\" name=\"email_visable\" value=\"Y\" \"checked\"";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo " />No<input class=\"txt\" id=\"no\" type=\"radio\" name=\"email_visable\" value=\"N\"";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo " />
		 </div>";
	}

	public function occ_select_spew($occupations_result)
	{
		echo "		<div>
		<label for=\"occupations_id\">Occupation:</label>&nbsp;&nbsp;&nbsp;
		<select class=\"txt\" id=\"occupations_id\" name=\"occupations_id[]\" size=\"1\" ";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo " onchange=\"return false;\">
		<option value=\"\"";
		echo (($this->edit_form)?' selected=\"selected\"':'');
		echo "> </option>";
		while ($curRow = mysql_fetch_array($occupations_result))
		{
			// Only do a small number of occupations
			$o_id = $curRow['occupations_id'];
			if (($o_id % 5) == 0) {
				echo '<option value="';
				echo $o_id;
				echo '"';
				if (in_array($o_id,$this->occ)) {echo ' selected="selected"';}
				echo '>';
				echo $curRow['name'];
				echo '</option>';
			}
		}
		echo "		</select>
		</div>";
	}

	public function cntry_select_spew($countries_result)
	{
		echo "		 <div>
		<label for=\"countrycodes_id\">Countries of Residence:</label>&nbsp;&nbsp;&nbsp;
		<select class=\"txt\" id=\"countrycodes_id\" name=\"countrycodes_id[]\" size=\"1\" ";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo " onchange=\"return false;\">
		<option value=\"\"";
		echo (($this->edit_form)?' selected=\"selected\"':'');
		echo "> </option>";
		while ($curRow = mysql_fetch_array($countries_result))
		{
			// Only do a small number of countries
			$c_id = $curRow["countrycodes_id"];
			if (($c_id % 12) == 0) {
				echo "<option value=\"";
				echo $c_id;
				echo "\"";
				if (in_array($c_id,$this->cntry))
				{
					echo " selected=\"selected\"";
				}
				echo ">";
				echo $curRow["country"];
				echo "</option>";
			}
		}
		echo "		</select>
		 </div>";
	}

	public function gender_spew()
	{
		echo "		 <div>
		<label for=\"gender\">Gender:</label>&nbsp;&nbsp;&nbsp;
		Male<input class=\"txt\" id=\"male\" type=\"radio\" name=\"gender\" value=\"M\" \"checked\"";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo " />
		Female<input class=\"txt\" id=\"female\" type=\"radio\" name=\"gender\" value=\"F\" ";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo "/><br />
		 </div>";
		 
	}

	public function age_spew()
	{
		echo "		 <div>
		<label for=\"age\">Age:</label>&nbsp;&nbsp;&nbsp;<input class=\"txt\" id=\"age\" type=\"text\" name=\"age\" size=\"30\" value=\"";
		echo (($this->edit_form)?'':$_POST['age']);
		echo "\" ";
		echo (($this->edit_form)?'':'disabled=\"disabled\"');
		echo " />
		 </div>";
		 
	}
	
	public function bottom_spew()
	{
		echo "		 <div class=\"ft\"><br />
		<input class=\"btn\" type=\"submit\" name=\"update_profile\" value=\"Submit\" /></form>
		<input class=\"btn\" type=\"submit\" name=\"reset_the_form\" value=\"Reset\" /></form></form>
		</div>
		</div>
		<div class=\"ft\"></div>
		</body>
	</html>";
	}
}
?>
