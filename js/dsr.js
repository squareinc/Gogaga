$(document).ready(function(){

});

function passRefValue(ref){
	if(ref!=""){
	console.log(ref);
	var url = "smashit.php?q="+ref;
	$('#pagedeleteYes').attr("href",url);
	$('#deletereason').focus();
	//pass ref number to submitReason
	var functionCreator = "submitReason("+ref+");";
	$('#submitReason').attr("onClick",functionCreator);
	}
	
}


function submitReason(ref){
	//get ref number
	var reason = $('#deletereason').val();
	if(ref!=""&&reason!=""){
	console.log("in submitReason, ref:"+ref);
	console.log("reason: "+reason);
	
	$.ajax({
		type: "POST",
		data: {ref:ref, reason: reason},
		url: "addremark.php",
		beforeSend: function(){	
				$("#submitReason").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');
			},
		success: function(data){
			console.log(data);
			if(data.status == "success"){
				//success
				$("#modalCloseButton").click();
				$("#submitReason").html('Submitted');
				$('#pagedeleteYes').removeAttr("disabled");

			}else if(data.status == "error"){
				//error
				$("#submitReason").html('Error!');
			}
			
		}
		

	});



	}

}