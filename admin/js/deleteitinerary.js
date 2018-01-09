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
		url: "submitreason.php",
		beforeSend: function(){	
				$("#submitReason").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');
			},
		success: function(data){
			console.log(data);
			if(data.status == "success"){
				//success
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


function passRefValue2(ref){
	if(ref!=""){
	console.log(ref);
	var url = "smashit.php?q="+ref;
	$('#pagedeleteYes').attr("href",url);
	$('#deletereason').focus();
	//pass ref number to submitReason
	var functionCreator = "submitReason2("+ref+");";
	$('#submitReason').attr("onClick",functionCreator);
	}
	
}

function submitReason2(ref){
	//get ref number
	var reason = $('#deletereason').val();
	if(ref!=""&&reason!=""){
	console.log("in submitReason, ref:"+ref);
	console.log("reason: "+reason);
	
	$.ajax({
		type: "POST",
		data: {ref:ref, reason: reason},
		url: "submitsalesmanager.php",
		beforeSend: function(){	
				$("#submitReason").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');
			},
		success: function(data){
			console.log(data);
			if(data.status == "success"){
				//success
				$("#submitReason").html('Submitted');
				$('#pagedeleteYes').removeAttr("disabled");
				$("#modalCloseButton").click();
				$('#deleteitModal2').modal('hide');
				window.location.href = 'redirector.php';

			}else if(data.status == "error"){
				//error
				$("#submitReason").html('Error!');
			}
			
		}
		

	});



	}

}