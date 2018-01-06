function getAllPartner(partnertype){
  $.ajax({
  type: "POST",
  url: "get_all_sales_partner.php",
  data: 'partnertype='+partnertype,
  success: function(data){
    $("#assignto").html(data);
  }
  });
}


function getAgent(val){
if(val!=""){
  //val is not empty
  switch(val){
    case "salespartner":
    getAllPartner("holidaypartners");
    break;

    case "holidaypartner":
    getAllPartner("superpartners");
    break;

    case "superpartner":
    //getAllPartner("superpartners");
    $("#assignto").html("<option value=''>Nothing To Assign</option>");
    break;
  }
}
}
