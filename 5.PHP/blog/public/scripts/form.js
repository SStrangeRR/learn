$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var jsonData = JSON.parse(response);
                swal.fire(jsonData.text, jsonData.success)
                .then((value) => {
                    if (jsonData.success === 'success') {
                        $('form').trigger('reset');
                    }
                    if (jsonData.url) {
                        window.location.href = "/" + jsonData.url;
                    }
                });
            }
        });
    });
});