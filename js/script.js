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

    window.open("http://himal.dev/bloodbank/organization/add_campaign.php");

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
    window.open("http://himal.dev/bloodbank/admin/blood_banks.php");
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
