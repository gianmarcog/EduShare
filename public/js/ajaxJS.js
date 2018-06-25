$('#filter').change(function(){
    $('#search').keydown();
});

$('#search').on('keydown', function () {
    if (event.keyCode == 13) {
        event.preventDefault();
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/live',
        type: 'POST',
        dataType: 'html',
        data: {
            'value': $(this).val(),
            'filter': $('#filter').find(":selected").text()
        },
        success: function (data) {
            $('#searchOutput').html(data);
        }
    })
});
