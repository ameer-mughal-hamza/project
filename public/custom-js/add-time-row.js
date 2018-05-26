$(document).ready(function () {
    var final_total_amt = $('#final_total_amt').text();
    var count = 1;
    $(document).on('click', '#add_row', function () {
        count++;
        $('#total_item').val(count);
        var html_code = '';
        html_code += '<tr id="row_id_' + count + '">';
        html_code += '<td><input type="text" placeholder="Time" name="timings[]" id="timings' + count + '" data-srno="' + count + '" class="form-control input-sm" required /></td>';
        html_code += '<td><button type="button" name="remove_row" id="' + count + '" class="btn btn-danger btn-xs remove_row">X</button></td>';
        html_code += '</tr>';
        $('#medicine_prescription .medicine_row').append(html_code);
    });
});
$(document).ready(function () {
    var final_total_amt = $('#final_total_amt').text();
    var count = 1;
    $(document).on('click', '.remove_row', function () {
        var row_id = $(this).attr("id");
        $('#row_id_' + row_id).remove();
        count--;
        $('#total_item').val(count);
    });
});