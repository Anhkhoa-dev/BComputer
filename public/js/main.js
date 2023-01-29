$(function () {
    //const page = window.location.pathname.split("/")[1];

    function showToast(message){
        if($("#alert-toast").lenght){
            $("#alert-toast").remove();
        }
        $("body").prepend(
            `<span id="alert-toast" class="alert-toast">${message}</span>`
        );

        setTimeout(()=>{
            clearTimeout(timer);
            timer = setTimeout(()=>{
                // Xóa toast
                setTimeout(()=>{
                    $("#alert-toast").remove();
                })
            }, 3000);
        }, 200);
    }

    // thông báo toast lưu trong session
    if (sessionStorage.getItem("toast-message")) {
        const message = sessionStorage.getItem("toast-message");
        sessionStorage.removeItem("toast-message");
        showToast(message);
    }

    // thông báo alert top lưu trong session
    if (sessionStorage.getItem("alert-top-message")) {
        let message = sessionStorage.getItem("alert-top-message");
        sessionStorage.removeItem("alert-top-message");
        showAlertTop(message);
    }

    // toast thông báo
    if ($("#toast-message").length) {
        const message = $("#toast-message").attr("data-message");
        $("#toast-message").remove();
        showToast(message);
    }

    // alert top session
    if ($("#alert-top").length) {
        var message = $("#alert-top").data("message");
        showAlertTop(message);
    }

    // đóng alert top
    $(document).on("click", ".close-alert-top", function () {
        closeAlertTop();
    });
    $(document).on("click", ".close-alert-top-icon", function () {
        closeAlertTop();
    });

    /* ================================================================================
                                        Thông tin tài khỏan
               ================================================================================ */

    $("#btn-change-avt").click(function () {
        $("#change-avt-inp").trigger("click");
    });

    // Hàm add to cart
    $(".add-to-cart").click(function(e){
        e.preventDefault();
    });
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": X_CSRF_TOKEN,
            },
            url: "/ajax-add-to-cart",
            type: "POST",
            data: {
                id_pro: id_pro,
                sl: qty
            },
            successs: function(data){
                resolve(data);
                alert('add product to cart successful.');
            },
            error: function(){
                reject();
            },
        });






});
