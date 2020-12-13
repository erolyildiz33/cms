Dropzone.autoDiscover = false;
$(document).ready(function () {

    $(".sortable").sortable().on('sortupdate', function (event, ui) {
        var $data = $(this).sortable("serialize");
        var url = $(this).data("url");
        $.post(url, {
            csrf_test_name: $('meta[name="X-CSRF-TOKEN"]').attr('content'),
            data: $data
        }, function (res) {

            $('.producttable .sirano').each(function (i) {
                var humanNum = i + 1;
                $(this).html(humanNum + '');
            });

        })
    });
    $(".durum").on('change', function (e) {
        var url = $(this).data("url");
        var id = $(this).attr('id');
        var isActive = this.checked;
        $.post(url, {
            id: id,
            isActive: isActive,
            csrf_test_name: $('meta[name="X-CSRF-TOKEN"]').attr('content')
        })
    });
    $(".remove-btn").on('click', function (e) {
        var title = $(this).data("sweet-title");
        var text = $(this).data("sweet-text");
        var confirmButtonText = $(this).data("confirmbuttontext");
        var cancelButtonText = $(this).data("cancelbuttontext");
        var deleted = $(this).data("sweet-deleted");
        var havedeleted = $(this).data("sweet-havedeleted");
        var url = $(this).data("url");
        var id = $(this).attr("id");
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(url, {
                    id: id,
                    csrf_test_name: $('meta[name="X-CSRF-TOKEN"]').attr('content')
                }, function (response) {
                    Swal.fire(deleted, havedeleted, 'success').then((res) => {
                        if (res.isConfirmed | res.isDenied | res.isDismissed) {
                            window.location.href = "/admin/product";
                        }
                    });


                })
            }
        })
    });
})

