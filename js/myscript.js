function showcountry() {
    //var country=document.getElementById('country').value;
    $("#myModal").modal({show: true, keyboard: false, backdrop: 'static'});

}
function show_city() {
    var country = document.getElementById('country').value;
    window.location.href = "choose_city.php?country=" + country;
}
function save_city(city) {

    var city_id = city.value;
    var type = '';
    if (city.checked === true) {
        type = 'yes';
    }
    else {
        type = 'no';
    }
    alert(type);
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xhttp.open("GET", "savecities.php?q=" + city_id + "&status=" + type, true);
    xhttp.send();
}
$(function () {
    $("#tabs").tabs();
});

function updateCity(str, type) {
    //alert();
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var output = this.responseText;
            var split_out = output.split('!@#$%^');
            //alert(split_out[0]);
            var k = 0;
            for (var i = 65; i <= 90; i++) {
                document.getElementById(String.fromCharCode(i)).innerHTML = split_out[k];
                k++;
            }
        }
        else {
            document.getElementById('query1').innerHTML = 'Processing...';
        }
    };
    xmlhttp.open("GET", "get_city.php?country=" + str + "&type=" + type, true);
    xmlhttp.send();
}

function forecast(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("weather_forecast").innerHTML = this.responseText;
        }
        else
        {
            document.getElementById("weather_forecast").innerHTML = "Processing...";
        }
    };
    xmlhttp.open("GET", "get_forecast.php?cityid=" + str, true);
    xmlhttp.send();
}
$(document).ready(function () {

    $('#alldays').click(function () {
        //alert();
        if ($(this).is(':checked')) {
            $('div input').attr('checked', true);
        } else {
            $('div input').attr('checked', false);
        }
    });
    $('#from').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(),
        onClose: function (selectedDate) {
            $("#to").datepicker("option", "minDate", selectedDate);
        }
    });
    $('#to').datepicker({
        dateFormat: 'yy-mm-dd',
        onClose: function (selectedDate) {
            $("#from").datepicker("option", "maxDate", selectedDate);
        }
    });
});

function updateschedule(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var output = this.responseText;
            document.getElementById('outerdays').innerHTML = output;
        }

    };
    xmlhttp.open("GET", "view_schedule.php?cityid=" + str, true);
    xmlhttp.send();
}
function historical_data() {
    var from = document.getElementById('from').value;
    var to = document.getElementById('to').value;
    var city = document.getElementById('city').value;
    if(from==='' || to==='' || city==='')
    {
        alert('Please Select the Above Values');
    }
    else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var output = this.responseText;
                document.getElementById('result').innerHTML = output;
            }
            else
            {
                document.getElementById('result').innerHTML = 'Processing...';
            }
        };
        xmlhttp.open("GET", "get_historical_data.php?cityid=" + city + "&from=" + from + "&to=" + to, true);
        xmlhttp.send();
    }
}

function insert_city() {

    alert("testing");
    var cityname, country, cityid, latitude, longitude;
    cityname = document.getElementById("cityname").value;
    country = document.getElementById("country").value;
    cityid = document.getElementById("cityid").value;
    latitude = document.getElementById("latitude").value;
    longitude = document.getElementById("longitude").value;

    if (cityid === "" || cityname === "" || country === "" || latitude === "" || longitude === "" ) {
        alert("all fields are manadatory");
    } else {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ans").innerHTML = this.responseText;
                window.location.href = "manageadmin.php";
            }
            else
            {
                document.getElementById("ans").innerHTML = 'Processing....';
            }
        };
        xmlhttp.open("GET", "city_action.php?cityname=" + cityname + "&country=" + country + "&cityid=" + cityid +
            "&latitude=" + latitude + "&longitude=" + longitude, true);
        xmlhttp.send();


    }
}

