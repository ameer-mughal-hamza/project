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

        .relative-position {
            position: relative;
        }

        .dr-info-box {
            border-bottom: solid 1px #1e2023;
            padding: 5px;
            float: left;
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
            float: left;
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

        .history {
            float: right;
            width: 350px;
            height: auto;
        }

        .history p {
            font-size: 18pt;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
        }

        .history hr {
            margin-top: -20px;
        }

        .prescription-table {
            margin-top: 350px;
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
<div class="relative-position">
    <div class="dr-info-box">
        <span class="dr-name">Dr. {{ $doctor->first_name . ' ' . $doctor->last_name }}</span> <br>
        <div class="education-and-others">
            {{ $doctor->education }}
            <br>
            {{ $doctor->category }}
        </div>
    </div>
    <div class="hospital-detail">
        1 - KM Raiwind Road, Lahore <br>
        +92 (0) 42 111-865-865 <br>
        info@uol.edu.pk
    </div>
</div>
<div class="relative-position">
    <div class="patient-info-box">
        <p>Patient Information</p>
        <hr>
        <div class="patient-info">
            <span class="patient_name">{{ $patient->patient_name }}</span> <br>
            {{ $patient->patient_mobile }} <br>
            <span class="patient-history">Weight : {{ $medicine->weight }} | Age : {{ $medicine->age }}
                | Temperature : {{ $medicine->temprature }}<br> Blood Pressure : {{ $medicine->blood_pressure }} </span><br>
            Date : <span>{{ date('M j, Y', strtotime($medicine->created_at)) }}</span>
        </div>
    </div>
    <div class="history">
        <p>History</p>
        <hr>
        {{ $medicine->history }}
    </div>
</div>
<div class="relative-position">
    <table class="prescription-table">
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Type</th>
        </tr>
        @if($rows > 0)
            @for($i=0 ; $i<$rows ; $i++)
                <tr>
                    <td>{{ $medicine_type[$i] }}</td>
                    <td>{{ $medicine_name[$i] }}</td>
                    <td>{{ $medicine_quantity[$i] }}</td>
                </tr>
            @endfor
        @else
            No Data is Available
        @endif

    </table>
</div>
</body>
</html>