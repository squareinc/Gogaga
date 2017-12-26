 $(document).ready(function(){
            

                   //flights

                    $('.flighttype').each(function(){
                      var selected = ($(this).find("option:selected").val());
    console.log("selected:"+selected);

    if(selected == "return"){

      var airdates = $(this).closest("tr")   // Finds the closest row <tr> 
                            .find('input[name="airdates[]"]') ;    // Gets input[name="airdates[]"]
                                      

   $(airdates).daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $(airdates).on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' , ' + picker.endDate.format('MM/DD/YYYY'));
  });

  $(airdates).on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

  }else if(selected == "oneway"){

     var airdates = $(this).closest("tr")   // Finds the closest row <tr> 
                            .find('input[name="airdates[]"]') ;    // Gets input[name="airdates[]"]

    $(airdates).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
        //console.log("You are " + years + " years old.");
    });
  }else{
    //not oneway not return, please select
  }
                    });

                    //keep track on radio button input

                    var radiovalue = $("input:radio[name ='calc_chose']:checked").val();
                    console.log(radiovalue);
                    if(radiovalue == "By Person"){
                      //By Person selected
                      $('#numOfPersons').show();

                    }else if(radiovalue == "All Pax"){
                      //All selected
                      $('#numOfPersons').hide();
                    }

                    $('input:radio[name="calc_chose"]').change(function(){ 
                    var radiovalue = $("input:radio[name ='calc_chose']:checked").val();
                    console.log(radiovalue);
                    if(radiovalue == "By Person"){
                      //By Person selected
                      $('#numOfPersons').show();

                    }else if(radiovalue == "All Pax"){
                      //All selected
                      $('#numOfPersons').hide();
                    }
                    });

                    //onload check value transp

                    var transp = $("input:radio[name ='transp']:checked").val();
                    console.log(transp);
                    if(transp == "no"){
                      
                       $('#transportAmount').hide();
                    $('#transportTransfers').hide();
                    $('#transportsicprivate').hide();
                    $('#transportvendornvehicle').hide();

                    }else if(transp == "yes"){
                      
                      $('#transportAmount').show();
                    $('#transportTransfers').show();
                    $('#transportsicprivate').show();
                    $('#transportvendornvehicle').show();

                    }


                    $('#trans_y').click(function() {

                    $('#transportAmount').show();
                    $('#transportTransfers').show();
                    $('#transportsicprivate').show();
                    $('#transportvendornvehicle').show();

                    $('#trans_amt').removeAttr("disabled").show();
                    $('#trrad').removeAttr("disabled").show();
                    $('#trrad1').removeAttr("disabled").show();
                    $('#trrad2').removeAttr("disabled").show();
                    $('#trantype').removeAttr("disabled").show();
                    $('#trantype1').removeAttr("disabled").show();
                    $('#trandesc').removeAttr("disabled").show();
                    $('#transp_vendor_details').removeAttr("disabled").show();
                  });

                   $('#trans_n').click(function() {
                    $('#transportAmount').hide();
                    $('#transportTransfers').hide();
                    $('#transportsicprivate').hide();
                    $('#transportvendornvehicle').hide();

                    $('#trans_amt').attr("disabled","disabled").hide(); 
                    $('#trrad').attr("disabled","disabled").hide(); 
                    $('#trrad1').attr("disabled","disabled").hide(); 
                    $('#trrad2').attr("disabled","disabled").hide(); 
                    $('#trantype').attr("disabled","disabled").hide();
                    $('#trantype1').attr("disabled","disabled").hide();
                    $('#trandesc').attr("disabled","disabled").hide();
                    $('#transp_vendor_details').attr("disabled","disabled").hide(); 
                  });


                    //Remittance
                  $('#remit_y').click(function() {
                    $('#y_remittance').removeAttr("disabled");  
                  });

                   $('#remit_n').click(function() {
                    $('#y_remittance').attr("disabled","disabled"); 
                  });
                   
                  //Visa
                     $('#fl_rady').click(function() {
                    $('#fls').removeAttr("disabled");  
                  });
                     
                   $('#fl_radn').click(function() {
                    $('#fls').attr("disabled","disabled"); 
                  });






                   //Visa
                     $('#visa_y').click(function() {
                    $('#y_visa').removeAttr("disabled");  
                  });

                   $('#visa_n').click(function() {
                    $('#y_visa').attr("disabled","disabled"); 
                  });
                
                  $('#flight_y').click(function() {
                    $('#y_flightfrom').removeAttr("disabled");  
                    $('#flightto').removeAttr("disabled");  
                    $('#y_flightam').removeAttr("disabled");  
                  });

                   $('#flight_n').click(function() {
                    $('#y_flightfrom').attr("disabled","disabled"); 
                    $('#flightto').attr("disabled","disabled"); 
                    $('#y_flightam').attr("disabled","disabled"); 
                  });
                 
                   //Travel Insurance
                     $('#travel_insurance_y').click(function() {
                    $('#y_trav').removeAttr("disabled");  
                  });

                   $('#travel_insurance_n').click(function() {
                    $('#y_trav').attr("disabled","disabled"); 
                  });
                  

                    $('#addit_yes').click(function() {
                    $('#nserv').removeAttr("disabled"); 
                    $('#cserv').removeAttr("disabled");  
                  });

                   $('#addit_no').click(function() {
                    $('#nserv').attr("disabled","disabled");
                    $('#cserv').attr("disabled","disabled");  
                  });
               
                    $('#cruise_yes').click(function() {
                      $('#cr_am').removeAttr("disabled"); 
                    $('#sup_cr').removeAttr("disabled"); 
                    $('#h_cr').removeAttr("disabled"); 
                    $('#sal_cr').removeAttr("disabled");
                     $('#sup_pr').removeAttr("disabled"); 
                    $('#h_pr').removeAttr("disabled"); 
                    $('#sal_pr').removeAttr("disabled");  
                   
                  });

                   $('#cruise_no').click(function() {
                    $('#cr_am').val(0);
                    $('#sup_pr').val(0);
                    $('#h_pr').val(0);
                    $('#sal_pr').val(0);
                    
                    $('#cr_am').attr("disabled","disabled");
                    $('#sup_cr').attr("disabled","disabled");
                    $('#h_cr').attr("disabled","disabled");
                    $('#sal_cr').attr("disabled","disabled");
                     $('#sup_pr').attr("disabled","disabled");
                    $('#h_pr').attr("disabled","disabled");
                    $('#sal_pr').attr("disabled","disabled");
             
                  });



                    $('.addmore').click(function()
                    { alert("Still under construction");

                    });

          });



      

//check the selection of flightype

$(document).on("change", ".flighttype", function() {
    
    var selected = ($(this).find("option:selected").val());
    console.log("selected:"+selected);

    if(selected == "return"){

      var airdates = $(this).closest("tr")   // Finds the closest row <tr> 
                            .find('input[name="airdates[]"]') ;    // Gets input[name="airdates[]"]
                                      

   $(airdates).daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $(airdates).on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' , ' + picker.endDate.format('MM/DD/YYYY'));
  });

  $(airdates).on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

  }else if(selected == "oneway"){

     var airdates = $(this).closest("tr")   // Finds the closest row <tr> 
                            .find('input[name="airdates[]"]') ;    // Gets input[name="airdates[]"]

    $(airdates).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
        //console.log("You are " + years + " years old.");
    });
  }else{
    //not oneway not return, please select
  }
});



//hotels

$(document).on("focus", "input[name='checkindate[]']", function() {

var selectedHotelRow = $(this).closest("tr")   // Finds the closest row <tr> 
                        .find('input[name="checkindate[]"]');

    console.log("selectedHotelRow:"+selectedHotelRow);

     //hotels checkindate daterangepicker          
  $(selectedHotelRow).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
        console.log("Year:" + years);
    });

});

$(document).on("focus", "input[name='checkoutdate[]']", function() {

var selectedHotelRow = $(this).closest("tr")   // Finds the closest row <tr> 
                        .find('input[name="checkoutdate[]"]');

    console.log("selectedHotelRow:"+selectedHotelRow);

     //hotels checkoutdate daterangepicker          
  $(selectedHotelRow).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
        console.log("Year:" + years);
    });

});




$(document).on("focus", "input[name='checkin[]']", function() {

var selectedHotelRow = $(this).closest("tr")   // Finds the closest row <tr> 
                        .find('input[name="checkin[]"]');

    console.log("selectedHotelRow:"+selectedHotelRow);

     //hotels checkoutdate daterangepicker          
  $(selectedHotelRow).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
        console.log("Year:" + years);
    });

});







$(document).on("focus", "input[name='checkout[]']", function() {

var selectedHotelRow = $(this).closest("tr")   // Finds the closest row <tr> 
                        .find('input[name="checkout[]"]');

    console.log("selectedHotelRow:"+selectedHotelRow);

     //hotels checkoutdate daterangepicker          
  $(selectedHotelRow).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
        console.log("Year:" + years);
    });

});