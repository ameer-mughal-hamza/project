<html>
<head>
    <title>{{ $patient->patient_name }}</title>
</head>
<body>
<h3>{{ $doctor->first_name . ' ' . $doctor->last_name }}</h3>
<div class="row">
    <div class="pull-left">
        <h5>Weight: {{ $medicine->weight }}</h5>
    </div>
</div>
</body>
</html>