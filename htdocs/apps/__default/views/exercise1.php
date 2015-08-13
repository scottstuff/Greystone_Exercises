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
//		echo 'ok 2';
	
	protected $occ = array();
	protected $cntry = array();
//	var $edit_form = true;
	
//	__construct();
//	public $view = 'OccupationView';
	
	public function __construct()
	{
		if (isset($_POST['app'])) {
			$edit_form = false;
			$occ = $_POST['occupations_id'];
			$cntry = $_POST['countrycodes_id'];
			$person = new Person();
echo '<h3>new Person</h3>';
var_dump ($person);
			$person->addPerson();
		} else {
			$edit_form = true;
			$occ = array(0 => "");
			$cntry = array(0 => "");
		}
		$this->display($edit_form, $occ, $cntry);
		echo 'ok';
	}

	public function __default()
	{
		return Occupation::__construct();
	}

	public function display($edit_form, $occ, $cntry) {
		echo  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';

		?>

		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Greystone: Exercise 1</title>
			<link rel="stylesheet" href="/apps/greystone/views/styles/main.css" type="text/css" media="screen" />
			<script type="text/javascript" src="/apps/greystone/views/js/jquery-1.3.2.min.js"></script>
			<script type="text/javascript" src="/apps/greystone/views/js/overlay.js"></script>
		<script>
	public function validateForm(peopleForm){
		//$overlay_message = '<ul>Please fix these errors<li>filling xxxx</li><li>Fill in yyyyy</li></ul><a href="#" class="hide-overlay">Close</a>';
		var field_errs = '';
		var nameEntered = "";
		var ageEntered = "";

		if (peopleForm.name.value == "") {
		field_errs+='<li>Name</li>';
		$("#name").removeClass();
		$("#name").addClass("err");
		} else {
		$("#name").removeClass();
		$("#name").addClass("txt");
		}
		if (peopleForm.email.value == "") {
		field_errs+='<li>Email</li>';
		$("#email").removeClass();
		$("#email").addClass("err");
		} else {
		$("#email").removeClass();
		$("#email").addClass("txt");
		}
		emailOption = -1;
		for (i=0; i<peopleForm.email_visable.length; i++) {
			if (peopleForm.email_visable[i].checked) {
				emailOption = i;
			}
		}
		if (emailOption == -1) {
		field_errs+='<li>Make your email visable?</li>';
		$("#email_visable").removeClass();
		$("#email_visable").addClass("err");
		} else {
		$("#email_visable").removeClass();
		$("#email_visable").addClass("txt");
		}
		oSelect=document.getElementById("occupations_id");
		var multi_select_count=0;
		for(var i=1;i<oSelect.options.length;i++){
		if(oSelect.options[i].selected){
		multi_select_count++;
		}
		}
		if(multi_select_count<1){
		field_errs+='<li>Occupation</li>';
		$("#occupations_id").removeClass();
		$("#occupations_id").addClass("err");
		} else {
		$("#occupations_id").removeClass();
		$("#occupations_id").addClass("txt");
		}
		var country_choosen = peopleForm.countrycodes_id.selectedIndex;
		if (peopleForm.countrycodes_id.options[country_choosen].value == "") {
		field_errs+='<li>Country</li>';
		$("#countrycodes_id").removeClass();
		$("#countrycodes_id").addClass("err");
		} else {
		$("#countrycodes_id").removeClass();
		$("#countrycodes_id").addClass("txt");
		}
		if (peopleForm.age.value == "") {
		//if (!ageEntered) {
		field_errs+='<li>Age</li>';
		$("#age").removeClass();
		$("#age").addClass("err");
		} else {
		$("#age").removeClass();
		$("#age").addClass("txt");
		}
		if (field_errs.length > 0) {
		//	peopleForm.setAttribute("name","Hi There");
			$overlay_message = '<ul>Please fill out all required fields'+field_errs+'</ul><a href="#" class="hide-overlay">Close</a>';
			var tst = $overlay_message;
			$overlay_wrapper = '';
			show_overlay();
			alert(tst);
			return false;
		}
		return true;
		}

		</script>
		</head>
		<body>
		<?
		require_once(MVC_BASE_PATH.'/apps/greystone/models/Occupation.php');
		require_once(MVC_BASE_PATH.'/apps/greystone/models/Country.php');
		$occupations_result = Occupation::get_all_occupations();
		$countries_result = Country::get_all_countries();

		?>


		 <table align="center" border="1">
			<tr><th colspan="2" align="center"><h1>Personal Profile</h1></th></tr>
			<tr> <form id="personal_profile_form" action="/index.php?app=greystone&bind=Person&action=addPerson&view_display=Exercise1" method="post" onsubmit="return validateForm(this)">
		 <input type="hidden" name="app" value="greystone" />
		 <input type="hidden" name="bind" value="Person" />
		 <input type="hidden" name="event" value="__default" />
		 <input type="hidden" name="event" value="Exercise1" />
		<td align="right"><label for="name">Name:</label>&nbsp;</td><td><input class="txt" id="name" type="text" name="name" size="30" value="<?=($edit_form)?'':$_POST['name']?>" <?=($edit_form)?'':'disabled="disabled"'?> /></td></tr>
			<tr><td align="right"><label for="email">Email:</label>&nbsp;</td>
			<td><input class="txt" id="email" type="text" name="email" size="50" value="<?=($edit_form)?'':$_POST['email']?>" <?=($edit_form)?'':'disabled="disabled"'?> /></td></tr>
			<tr><td align="right"><label for="ppform">Make your email visable?:</label>&nbsp;</td>
				<td><label for="yes">Yes</label><input class="txt" id="yes" type="radio" name="email_visable" value="Y" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label for="no">No</label><input class="txt" id="no" type="radio" name="email_visable" value="N" />
			</td></tr>
			<tr><td align="right"><label for="occupations_id">Occupation:</label>&nbsp;</td><td>  
		<select class="txt" multiple="multiple" id="occupations_id" name="occupations_id[]" size="5" <?=($edit_form)?'':'disabled="disabled"'?> onchange="return false;">
		<option value=""<?=($edit_form)?' selected="selected"':''?>> </option>
		<?
		while ($curRow = mysql_fetch_array($occupations_result))
		{
			// Only do a small number of occupations
			$o_id = $curRow['occupations_id'];
			if (($o_id % 5) == 0) {
				echo '<option value="';
				echo $o_id;
				echo '"';
				if (in_array($o_id,$occ)) {echo ' selected="selected"';}
				echo '>';
				echo $curRow['name'];
				echo '</option>';
			}
		}
		?>
		</select>
		</td></tr>    
			<tr><td align="right"><label for="countrycodes_id">Countries of Residence:<br /><small>Select current and past<br />countries of residence</small></label>&nbsp;</td><td>
		<select class="txt" multiple="multiple" id="countrycodes_id" name="countrycodes_id[]" size="10" <?=($edit_form)?'':'disabled="disabled"'?> onchange="return false;">
		<option value=""<?=($edit_form)?' selected="selected"':''?>> </option>
		<?
		$cntry_cnt = 0;
		while ($curRow = mysql_fetch_array($countries_result))
		{
			// Only do a small number of countries
			$c_id = $curRow['countrycodes_id'];
			if (($c_id % 12) == 0) {
				echo '<option value="';
				echo $c_id;
				echo '"';
				if (in_array($c_id,$cntry)) {echo ' selected="selected"';}
				echo '>';
				echo $curRow['country'];
				echo '</option>';
			}
		}
		?>
		</select>
			</td></tr>
			<tr><td align="right"><label for="gender">Gender:</label>&nbsp;</td>
				<td><label for="male">Male</label><input class="txt" id="male" type="radio" name="gender" value="M" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label for="female">Female</label><input class="txt" id="female" type="radio" name="gender" value="M" />
			</td></tr>
			<tr><td align="right"><label for="age">Age:</label>&nbsp;</td><td><input class="txt" id="age" type="text" name="age" size="30" value="<?=($edit_form)?'':$_POST['age']?>" <?=($edit_form)?'':'disabled="disabled"'?> /></td></tr>
			<tr><td align="center"><input class="btn" type="submit" name="update_profile" value="Add" /></form></td><td align="center">
				<form id="reset_the_form" action="/index.php?app=greystone&bind=Person&action=__default" method="post" onsubmit="$('reset_the_form').reset()"><input class="btn" type="submit" name="reset_the_form" value="Reset" /></td></tr>
		</table>
		 <table align="center" border="1">
			<tr><th colspan="2" align="center"><h1>Personal Profile 2</h1></th></tr>
		</table>
		</div>
		</body>
		<?php
		echo '</html>';
	}
}
?>
