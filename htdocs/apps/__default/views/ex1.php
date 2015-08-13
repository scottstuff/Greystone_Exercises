<?php
$text = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
$text .= '<html xmlns="http://www.w3.org/1999/xhtml">';
$text .= '<head>';
$text .= '    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

$text .= '    <title>Greystone: Exercise 1</title>';
$text .= '    <link rel="stylesheet" href="/apps/greystone/views/styles/main.css" type="text/css" media="screen" />';
$text .= '    <script type="text/javascript" src="/apps/greystone/views/js/jquery-1.3.2.min.js"></script>';
$text .= '    <script type="text/javascript" src="/apps/greystone/views/js/overlay.js"></script>';
echo $text;

?>
<script>
function validateForm(){
var err_msg = "";
oSelect=document.getElementById("occupation_id");
var count=0;
for(var i=0;i<oSelect.options.length;i++){
if(oSelect.options[i].selected)
count++;
}
if(count<1){
show_overlay();
return false;
}
return true;
}

</script>
</head>
<body>
<!--
 <form id="personal_profile_form" action="/apps/greystone/views/exercise1.php" method="post" onsubmit="return validateForm()">
 -->
 <form id="personal_profile_form" action="/index.php" method="post" onsubmit="return validateForm()">
 <input type="hidden" name="app" value="greystone" />
 <input type="hidden" name="bind" value="Person" />
 <input type="hidden" name="event" value="__default" />
 <table align="center" border="1">
	<tr><th colspan="2" align="center"><h1>Personal Profile</h1></th></tr>
    <tr><td align="right"><label for="name">Name:</label>&nbsp;</td><td><input id="name" type="text" name="name" size="30" value="<?php echo $name ?>" /></td></tr>
    <tr><td align="right"><label for="email">Email:</label>&nbsp;</td>
    <td><input id="email" type="text" name="email" size="50" value="<?php echo $name ?>" /></td></tr>
    <tr><td align="right"><label for="ppform">Make your email visable?:</label>&nbsp;</td>
    	<td><label for="yes">Yes</label><input id="yes" type="radio" name="email_visable" value="Y" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="no">No</label><input id="no" type="radio" name="email_visable" value="N" />
    </td></tr>
    <tr><td align="right"><label for="occupation_id">Occupation:</label>&nbsp;</td><td>
    
<select multiple="multiple" id="occupation_id" name="occupation_id" size="10" onchange="return false;">
<option value="a">a</option>
<option value="b">b</option>
<option value="c">c</option>
<option value="d">d</option>
<option value="e">e</option>
</select>
</td></tr>    
    <tr><td align="right"><label for="countrycodes_id">Country of Residence:</label>&nbsp;</td><td><input id="countrycodes_id" type="text" name="countrycodes_id" size="30" value="" /></td></tr>
    <tr><td align="right"><label for="gender">Gender:</label>&nbsp;</td>
    	<td><label for="male">Male</label><input id="male" type="radio" name="gender" value="M" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="female">Female</label><input id="female" type="radio" name="gender" value="M" />
    </td></tr>
    <tr><td align="right"><label for="age">Age:</label>&nbsp;</td><td><input id="age" type="text" name="age" size="30" value="" /></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" name="update_profile" value="Submit" /></td></tr>
</table>
 <table align="center" border="1">
	<tr><th colspan="2" align="center"><h1>Personal Profile 2</h1></th></tr>
</table>
</form>
</div>
</body>
<?php
echo '</html>';
?>
