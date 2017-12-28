function getPreviousData(refno){
	//gets refno
	//check if refno not null
	if(refno!=""){
		//not null
		//not get data from sch_itinerary.php
		$.ajax({
			type: "POST",
			url: "getpreviousdata.php",
			data: {refno: refno},
			success: function(data){
				console.log(data);
				if(data){
					var len = data.length;
					console.log("lenght: "+len);
					for(var i=0;i<len;i++){
						//iterate over the data and fix them in ittitle[] and itdesc[] of type name
						if(data[i].title!=""){
							k = i+1;
							//get the target element and put the data
							var day = "#ittitle"+k; //holds day value
							var description = "#itdesc"+k; //holds description value
							var meal = "#itmeal"+k; //holds meal value

							console.log(day);
							console.log(description);
							console.log(meal);

							$(day).val(data[i].title);
							$(description).val(data[i].description);
							$(meal).val(data[i].mealplan);

							//fits the data into DOM elements using JQUERY.
						}
					}
				}
			}
		});
	}
}