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
            'value': $(this).val()
        },
        success: function (data) {
            $('#searchOutput').html(data);
        }
    })
});
