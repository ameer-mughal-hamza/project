//Move the form when user selects a date
var html = '';
$(function () {
    $("#datepicker").datepicker({
        dateFormat: 'dd M yy',
        minDate: new Date(),
        beforeShowDay: function (date) {
            var day = date.getDay();
            return [day != 0, ''];
        },
        onSelect: function (dateText, inst) {
            var current_fs, next_fs, previous_fs; //fieldsets
            var left, opacity, scale; //fieldset properties which we will animate
            var animating; //flag to prevent quick multi-click glitches


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var date = $(this).val();
            var doctor_id = $('#doctor_id').val();
            $.ajax({
                type: 'POST',
                url: '/getAppointmentTimes',
                dataType: 'JSON',
                data: {
                    date: date,
                    doctor_id: doctor_id
                },
                success: function (data) {
                    var newArray = [];
                    var booked_appointments = [];
                    var doctor_available_timings = [];

                    for (i = 0; i < data['booked_appointments'].length; i++) {
                        booked_appointments[i] = data['booked_appointments'][i]['time'];
                    }

                    for (i = 0; i < data['doctor_available_timings'].length; i++) {
                        doctor_available_timings[i] = data['doctor_available_timings'][i];
                    }

                    for (var i = 0; i < doctor_available_timings.length; i++) {
                        var match = false;
                        for (var j = 0; j < booked_appointments.length; j++) {
                            if (doctor_available_timings[i] === booked_appointments[j]) {
                                match = true;
                                break;
                            }
                        }
                        if (!match) {
                            newArray.push(doctor_available_timings[i]);
                        }
                    }

                    $.each(newArray, function (index, value) {
                        html = html + '<span name="selected_time">' + value + '</span><br><br>';
                    });
                    $("#available_times").append(html);
                },
                error: function (data) {
                    console.log(data);
                }
            });

            // $("#available_times").append(html);

            var dateAsObject = $(this).val(); //the getDate method
            $('#date').text(dateAsObject);

            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();


            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({'left': left, 'opacity': opacity});
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'

            });
        }
    });
});


//Move the form when user selects time
// $("span[name = 'selected_time\\[\\]']").on("click", function () {
$("ul").on("click", "#available_times span", function () {
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
    var time = $(this).text();
    $('#time').text(time);

    if (animating) return false;
    animating = true;

    current_fs = $(this).parents('.time_wizard');
    next_fs = $(this).parents('.time_wizard').next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({'left': left, 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

//Submit the form by clicking on the button
$('#submit_form').click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var reason = $('#reason').val();

    //This is used to get Selected date and store it in database
    var date = $('#date').text();

    //This is used to get Selected time and store it in database
    var time = $('#time').text();

    var patient_id = $('#patient_id').val();

    var doctor_id = $('#doctor_id').val();

    e.preventDefault(e);

    $.ajax({
        type: 'POST',
        url: '/appointment',
        dataType: 'JSON',
        data: {
            reason: reason,
            time: time,
            date: date,
            patient_id: patient_id,
            doctor_id: doctor_id,
        },
        success: function (data) {
            console.log('Success:', data);
            location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Move the form back when user clicks on the previous button
$(".previous").click(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});