$(document).ready(function(){
//document is ready
//now look for on click options

var refno = $("#save").attr("ref");
if(refno!="")
var selfpost = "designitinerary.php?ref="+refno;

//disable other buttons
/*	$('#view').addClass('disabled');
	$('#pdf').addClass('disabled');
	$('#confirm').addClass('disabled');*/



//on click save button
$("#save").on("click",function(){
	$("#myform").attr('action', selfpost);

	/*//enable other buttons
	$('#view').attr('disabled',false);
	$('#pdf').attr('disabled',false);
	$('#confirm').attr('disabled',false);
*/

//add on click js to other buttons

	//$("#view").attr('onclick',);
});

//on click view button
$("#view:not(:disabled)").on("click",function(){
	$("#myform").attr('action', 'ff.php');
});

//on click pdf button
$("#pdf:not(:disabled)").on("click",function(){
	$("#myform").attr('action', 'savetopdf.php');
});


});
