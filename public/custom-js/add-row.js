$(document).ready(function () {
    var final_total_amt = $('#final_total_amt').text();
    var count = 1;
    $(document).on('click', '#add_row', function () {
        count++;
        $('#total_item').val(count);
        var html_code = '';
        html_code += '<tr id="row_id_' + count + '">';

        html_code += '<td><select class="form-control input-sm" id="medicine_type" name="medicine_type[]"><option>Syrup</option><option>Tablet</option><option>Capsule</option></select> </td>';
        html_code += '<td><input placeholder="Enter medicine name" type="text" name="medicine_name[]" id="medicine_name' + count + '" data-srno="' + count + '" class="form-control input-sm number_only medicine_name" /></td>';
        html_code += '<td><input type="text" placeholder="Enter medicine quantity" name="medicine_quantity[]" id="quantity' + count + '" data-srno="' + count + '" class="form-control input-sm number_only order_item_price" /></td>';
        html_code += '<td><button type="button" name="remove_row" id="' + count + '" class="btn btn-danger btn-xs remove_row">X</button></td>';
        html_code += '</tr>';
        $('#medicine_prescription').append(html_code);

        $(function () {
            $('#medicine_name' + count).autocomplete({
                source: 'http://localhost:8000/search'
            });
        });

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