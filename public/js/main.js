$(function () {
    //const page = window.location.pathname.split("/")[1];

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
});
