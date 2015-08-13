function validateForm(peopleForm){

var field_errs = "";
var nameEntered = "";
var ageEntered = "";

if (peopleForm.name.value == "") {
field_errs+="<li>Name</li>";
$("#name").removeClass();
$("#name").addClass("err");
} else {
$("#name").removeClass();
$("#name").addClass("txt");
}
if (peopleForm.email.value == "") {
field_errs+="<li>Email</li>";
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
field_errs+="<li>Make your email visable?</li>";
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
field_errs+="<li>Occupation</li>";
$("#occupations_id").removeClass();
$("#occupations_id").addClass("err");
} else {
$("#occupations_id").removeClass();
$("#occupations_id").addClass("txt");
}
var country_choosen = peopleForm.countrycodes_id.selectedIndex;
if (peopleForm.countrycodes_id.options[country_choosen].value == "") {
field_errs+="<li>Country</li>";
$("#countrycodes_id").removeClass();
$("#countrycodes_id").addClass("err");
} else {
$("#countrycodes_id").removeClass();
$("#countrycodes_id").addClass("txt");
}
if (peopleForm.age.value == "") {
//if (!ageEntered) {
field_errs+="<li>Age</li>";
$("#age").removeClass();
$("#age").addClass("err");
} else {
$("#age").removeClass();
$("#age").addClass("txt");
}
if (field_errs.length > 0) {
	$overlay_message = '<ul>Please fill out all required fields'+field_errs+'</ul><a href="#" class="hide-overlay">Close</a>';
	var tst = $overlay_message;
	$overlay_wrapper = "";
	show_overlay();
	return false;
}
return true;
}


