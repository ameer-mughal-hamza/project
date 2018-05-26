<!DOCTYPE HTML>
<html>
<head>
    <title>Sickbay</title>
    <style>
        .uni-title {
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            font-size: 20pt;
            color: #3b4db4;
            text-align: center;
        }

        .dr-info-box {
            border-bottom: solid 1px #1e2023;
            padding: 5px;
            position: relative;
            float: left;
            /*if i make height and width auto it will take space according to content*/
            width: 250px;
            height: auto;
        }

        .dr-info-box .dr-name {
            font-size: 18pt;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
        }

        .dr-info-box .education-and-others {
            margin-left: 5px;
            font-size: 12pt;
        }

        .hospital-detail {
            border-bottom: solid 1px #1e2023;
            padding: 5px;
            position: relative;
            float: right;
            /*if i make height and width auto it will take space according to content*/
            width: 250px;
            height: auto;
        }

        .patient-info-box {
            position: relative;
            padding: 5px;
            height: auto;
            width: 250px;
            margin-top: 120px;
        }

        .patient-info-box p {
            font-size: 18pt;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
        }

        .patient-info-box hr {
            margin-top: -20px;
        }

        .patient-info {
            margin: 5px;
        }

        .patient-info .patient_name {
            font-size: 18pt;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
        }

        .patient-info .patient-history {
            font-size: 8pt;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
        }

        .prescription-table {
            position: relative;
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid black;
            padding: 5px;
        }

    </style>
</head>
<body>
<p class="uni-title">UOL Teaching Hospital</p>
<hr>
<div class="dr-info-box">
    <span class="dr-name">Dr. Ameer Hamza</span> <br>
    <div class="education-and-others">
        MBBS, FCPS, Dentist <br>
        MBBS, FCPS, Dentist <br>
        MBBS, FCPS, Dentist <br>
        MBBS, FCPS, Dentist <br>
    </div>
</div>
<div class="hospital-detail">
    1 - KM Raiwind Road, Lahore <br>
    +92 (0) 42 111-865-865 <br>
    info@uol.edu.pk
</div>
<div class="patient-info-box">
    <p>Patient Information</p>
    <hr>
    <div class="patient-info">
        <span class="patient_name">Ameer Hamza</span> <br>
        03216417307 <br>
        hamza6417307@gmail.com <br>
        <span class="patient-history">Weight : 82 | Age : 22 | Temperature : 98<br> Blood Pressure : 120/80 </span><br>
        Date : <span>25 Jan,2018</span>
    </div>
</div>

<hr>
<table class="prescription-table">
    <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Type</th>
    </tr>
    <tr>
        <td>Panadol</td>
        <td>Panadol</td>
        <td>Panadol</td>
    </tr>
</table>
</body>
</html>
