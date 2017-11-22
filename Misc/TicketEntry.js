/**
 * Created by dssupport on 7/10/2017.
 */
importScripts("//code.jquery.com/jquery-1.11.2.min.js");
importScripts("//code.jquery.com/jquery-migrate-1.2.1.min.js");

/* global $ */ // <-- This prevents a warning about "$ not defined"
var intCount = 0;

$(document).ready(function(){
    window.alert("Test window.alert()"); // TESTING ONLY
    //alert("Test alert()"); // TESTING ONLY
    // Filling default values
    LoadDefaults();

    // Loading primary drop-downs
    LoadUnits("#cmbUnits");
    LoadCategories("#cmbCategories");
});

function LoadUnits(strControl){
    $.ajax({
        url: 'DD_Loader.php',
        type: 'POST',
        data: {action: 'Units'}, //array of items being sent to target file for processing
        success: function(result){
            var select = $(strControl);

            var dSet = jQuery.parseJSON(result);
            $.each(dSet, function(index, element){
                var pkID = element.record_id_;
                var uName = element.unit;
                // only certain units belong here, as per Jose 5-31-17
                if ((pkID != "17") && (pkID != "14") && (pkID != "11") && (pkID != "16") && (pkID != "15")){
                    select.append("<option value=\"" + pkID + "\">" + uName + "</option>");
                }
            });
        },
        error: function(){
            alert("Error in LoadUnits!");
        }
    });
}

$("#cmbUnits").live("change", function() {
    alert('Load employees for dept ' + $("#cmbUnits").children(":selected").val()); // Testing ONLY
    LoadEmployees(false, "#cmbRequesters");
});

function LoadEmployees(blnFull, strTarget){
    var select = $(strTarget);

    if (!blnFull){
        // Clear all employees
        select.empty();
        select.append("<option value=\"-1\">You are?...</option>");
    }

    $.ajax({
        url: 'DD_Loader.php',
        type: 'POST',
        data: {action: 'Employees'}, // array of items being sent to target file for processing
        success: function(result){ // defines what happens when request is received correctly
            //document.getElementById("spnAnswer").innerHTML = result; // TESTING ONLY

            //*******************
            var dSet = jQuery.parseJSON(result);
            $.each(dSet, function(index, element){
                var unitID = element.intunitid;
                var pkID = element.record_id_;
                var fName = element.full_name;

                if (blnFull){
                    select.append("<option value=\"" + pkID + "\">" + fName + "</option>");
                }
                else{
                    if (unitID == $("#cmbUnits").children(":selected").val()){

                        select.append("<option value=\"" + pkID + "\">" + fName + "</option>");
                    }
                }
            });
            //*******************
        },
        error: function(){
            alert("Error in LoadEmployees!");
        }
    });
}

function LoadCategories(strControl){
    $.ajax({
        url: 'DD_Loader.php',
        type: 'POST',
        data: {action: "Categories"},
        success: function(result) {
            var select = $(strControl);

            var dSet = jQuery.parseJSON(result);
            $.each(dSet, function(index, element) {
               var pkID = element.record_id_;
               var cName = element.strcategory;
               var blnShowToUser = element.blnisoptionforuser;

               if (blnShowToUser) {
                   select.append("<option value=\"" + pkID + "\">" + cName + "</option>");
               }
            });
        },
        error : function() {
            alert("Error in LoadCategories!");
        }
    })
}

$('#frmMain').live('submit', function(event) { /////
    // if (intCount == 0) {
    //     alert('Please add an item to your list.');
    //     event.preventDefault();
    //     return;
    // }
    //
    // if (($('#cmbUnits').val() == '-1') || ($('#cmbRequesters').val() == '-1')) {
    //     alert('Please select your unit and your name, thank you.');
    //     event.preventDefault();
    //     return;
    // }
    //
    // // Projects = 0, Admin = 1 for "cmbChargeTypes"
    // if (($('#cmbChargeTypes').val() == "0") && (($('#cmbProjects').val() == '-1') || ($('#cmbTasks').val() == '-1'))) {
    //     alert('Please select a project and task.');
    //     event.preventDefault();
    //     return;
    // }
});

function LoadDefaults(){
    // No defaults at of 7-12-17

    // var today = new Date((new Date().getTime())); //
    // var dd = today.getDate();
    // var mm = today.getMonth() + 1; //
    // var yyyy = today.getFullYear();
    //
    // if (dd<10)
    // { dd = '0' + dd; }
    //
    // if (mm<10)
    // { mm = '0' + mm; }
    //
    // today = mm + "/" + dd + "/" + yyyy;
    // document.getElementById('txtDateNeeded').value = today;
}
