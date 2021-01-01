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

function myFunction(a) {
  var x = document.getElementById("myCheck");
  if (a==1) {
    window.alert("Your personal informations are not visible to blood requesters while they are searching blood");
    x.checked = true;
}else{
    x.checked = false;
}
  
}

function update_privacy(a){
    var flag= a;
    window.location.href = "/bloodbank/donor/application/edit_privacy.php?flag="+flag;
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

function bigImg(x) {
  x.style.height = "64px";
  x.style.width = "64px";
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

$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pass_log_id");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});


(function () {
    /*var findTextInTable = function ($tableElements, text) {
        // highlights if text found (not highlighting during typing)
        var matched = false;
        $tableElements.removeClass('highlight');

        $.each($tableElements, function (index, item) {
            var $el = $(item);
            if ($el.html() == text && !matched) {
                console.log("matched", $el, $el.html());
                $el.addClass('highlight');
                matched = true;
            }
        });
    };*/
    var removeHighlight = function () {
        $('span.highlight').contents().unwrap();
    };

    var wrapContent = function (index, $el, text) {
        var $highlight = $('<span class="highlight"/>')
            .text(text.substring(0, index));
        //console.log(text.substring(0, index));
        var normalText = document.createTextNode(text.substring(index, text.length));
        //console.log(index, $highlight.text(), normalText);
        $el.html($highlight).append(normalText);
    };

    var highlightTextInTable = function ($tableElements, searchText) {
        // highlights if text found (during typing)
        var matched = false;
        //remove spans
        removeHighlight();

        $.each($tableElements, function (index, item) {
            var $el = $(item);
            if ($el.text().search(searchText) != -1 && !matched) {
                //console.log("matched", $el, $el.html());
                wrapContent(searchText.length, $el, $el.html());
                //console.log(searchText, $el.text());
                if (searchText == $el.text()) {
                    // found the entry
                    //console.log("matched");
                    matched = true;
                }
            }
        });
    };

    $(function () {
        //load table into object
        var $tableRows = $('table tr');
        var $tableElements = $tableRows.children();

        console.log($tableRows, $tableElements);

        $('#search').on('keyup', function (e) {
            var searchText = $(this).val();
            if (searchText.length == 0) {
                // catches false triggers with empty input (e.g. backspace delete or case lock switch would trigger the function)
                removeHighlight(); // remove last remaining highlight
                return;
            }
            //findTextInTable($tableElements, searchText);

            highlightTextInTable($tableElements, searchText);

        });
    });

})();

