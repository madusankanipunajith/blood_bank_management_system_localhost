function organization_reg() {

    window.open("http://himal.dev/bloodbank/organization/signup.php");

}

function hospital_reg() {

    window.open("http://himal.dev/bloodbank/hospital/registration.php");

}

function donor_reg() {

    window.open("http://himal.dev/bloodbank/donor/signup.php");

}

function requester_reg() {

    window.open("http://himal.dev/bloodbank/requester/signup.php");

}

function add_campaign() {

    window.open("/bloodbank/organization/add_campaign.php");

}

function donor_1() {
    location.replace("https://himal.dev/bloodbank/donor/donate_blood.php");
}

function donor_2() {
    location.replace("https://himal.dev/bloodbank/donor/view_report.php");
}

function donor_3() {
    location.replace("https://himal.dev/bloodbank/donor/search_donor.php");
}

function donor_4() {
    location.replace("https://himal.dev/bloodbank/donor/donations.php");
}

function questions() {
    window.open("https://himal.dev/bloodbank/donor/questionnair.php");
}

function req_1() {
    location.replace("https://himal.dev/bloodbank/requester/search_donor.php");
}

function blood_bank_list(){
    window.open("/bloodbank/admin/blood_banks.php");
}

function update_capacity(){
            var capacity= prompt("Please enter the capacity today","");
            if (capacity!=null) {
             window.location.href = "/bloodbank/bank_admin/application/edit_capacity.php?cap="+capacity;
            }
   
        }

function test(a,b,c,d,e,f,g,h) {

    var chart = new CanvasJS.Chart("chartContainer",
    {
        
        legend: {
            maxWidth: 350,
            itemWidth: 120
        },
        data: [
        {
            type: "pie",
            showInLegend: true,
            legendText: "{indexLabel}",
            dataPoints: [
                { y: a, indexLabel: "O+" },
                { y: b, indexLabel: "O-" },
                { y: c, indexLabel: "A+" },
                { y: d, indexLabel: "A-"},
                { y: e, indexLabel: "B+" },
                { y: f, indexLabel: "B-"},
                { y: g, indexLabel: "AB+"},
                { y: h, indexLabel: "AB-"}
            ]
        }
        ]
    });
    chart.render();
}


function requester_province(a,b,c,d,e,f,g,h,i) {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    
    axisY: {
        title: "No of requesters"
    },
    data: [{        
        type: "column",  
        showInLegend: true, 
        //legendMarkerColor: "grey",
        legendText: "Province",
        dataPoints: [      
            { y: a, label: "North" },
            { y: b,  label: "East" },
            { y: c,  label: "North Central" },
            { y: d,  label: "North Western" },
            { y: e,  label: "Sabaragamuwa" },
            { y: f, label: "Uwa" },
            { y: g,  label: "South" },
            { y: h,  label: "Central" },
            { y: i,  label: "Western" }
        ]
    }]
});
chart.render();

}

function donor_district(a,b,c,d,e,f,g,h) {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    
    axisY: {
        title: "No of Donors"
    },
    data: [{        
        type: "column",  
        showInLegend: true, 
        //legendMarkerColor: "grey",
        legendText: "BloodGroup",
        dataPoints: [      
            { y: a, label: "O+" },
            { y: b,  label: "O-" },
            { y: c,  label: "A+" },
            { y: d,  label: "A-" },
            { y: e,  label: "B+" },
            { y: f, label: "B-" },
            { y: g,  label: "AB+" },
            { y: h,  label: "AB-" }
        ]
    }]
});
chart.render();

}

/*

function show_tab(tab_number){

	document.getElementsByClassName("show")[0].classList.add("hide");

	document.getElementsByClassName("show")[0].classList.remove("show");

	document.getElementById("tabcontent-"+ tab_number).classList.add("show");

	document.getElementById("tabcontent-"+ tab_number).classList.remove("hide");

	document.getElementsByClassName("active")[0].classList.remove("active");

	document.getElementById("tab-"+ tab_number).classList.add("active");



}



*/

/*Hospitals*/

function openCity(evt, cityName) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {

        tabcontent[i].style.display = "none";

    }

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {

        tablinks[i].className = tablinks[i].className.replace(" active", "");

    }

    document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += " active";

}


function hospital_profile() {

    location.replace("profile.php");

}

function hospital_req_blood() {

    location.replace("list_hospital.php");

}


function updateClock() {
    var now = new Date();
    var dname = now.getDay(),
        mo = now.getMonth(),
        dnum = now.getDate(),
        yr = now.getFullYear(),
        hou = now.getHours(),
        min = now.getMinutes(),
        sec = now.getSeconds(),
        pe = "AM";

    if (hou >= 12) {
        pe = "PM";
    }
    if (hou == 0) {
        hou = 12;
    }
    if (hou > 12) {
        hou = hou - 12;
    }

    Number.prototype.pad = function(digits) {
        for (var n = this.toString(); n.length < digits; n = 0 + n);
        return n;
    }

    var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
    var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
    var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
    for (var i = 0; i < ids.length; i++)
        document.getElementById(ids[i]).firstChild.nodeValue = values[i];
}

function initClock() {
    updateClock();
    window.setInterval("updateClock()", 1);
}

/*Alert*/

function verify() {
    window.confirm("Warning! : This Cannot be undone... If you proceed, your all data will be lost. (can't be recover)");
}

/* jQuery */

// Get the modal
var modal = document.getElementById("popup");

// Get the button that opens the modal
var btn = document.getElementById("editBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var cancel = document.getElementById("cancelBtn");

// Open the popup 
function btnOnclick() {
  modal.style.display = "block";
}

function yesOnclick(url) {
    window.location.replace(url);
}

// Close the popup
function spanOnclick() {
  modal.style.display = "none";
  dlmodal.style.display = "none";
}

function cancelOnclick() {
  modal.style.display = "none";
  dlmodal.style.display = "none";
}

// When the user clicks anywhere outside of the popup, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Delete Popup
var dlmodal = document.getElementById("delete-popup");

function deleteOnclick() {
  dlmodal.style.display = "block";
}
