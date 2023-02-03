$(function () {
    let timer = null;
    // const page = window.location.pathname.split("/")[1];
    const X_CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    const errorMessage = "Đã có lỗi xảy ra. Vui lòng thử lại";
    function showToast(message) {
        if ($("#alert-toast").lenght) {
            $("#alert-toast").remove();
        }
        $("body").prepend(
            `<span id="alert-toast" class="alert-toast">${message}</span>`
        );

        setTimeout(() => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                // Xóa toast
                setTimeout(() => {
                    $("#alert-toast").remove();
                });
            }, 3000);
        }, 200);
    }

    function showAlertTop(content) {
        const alertTop = `<div class="alert-top">
                <div class="close-alert-top-icon"><i class="far fa-times-circle"></i></div>
                <div class="alert-top-title"></div>
                <div class="alert-top-content"></div>
                <div class="alert-top-footer">
                    <div class="close-alert-top">OK</div>
                </div>
            </div>`;

        $("body").prepend(alertTop);

        setTimeout(() => {
            $(".alert-top").css({
                "-ms-transform": "translateY(0)",
                transform: "translateY(0)",
            });
            $(".backdrop").css("z-index", "1999");
            $(".backdrop").fadeIn();
        }, 200);

        $(".alert-top-content").html(content);
    }

    function closeAlertTop() {
        setTimeout(() => {
            $(".alert-top").remove();
            $(".backdrop").removeAttr("style");
        }, 500);
        $(".alert-top").css({
            "-ms-transform": "translateY(-500px)",
            transform: "translateY(-500px)",
        });
        $(".backdrop").fadeOut();
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

    function addCart(id_sp, qty) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "/add-to-cart",
                type: "POST",
                data: {
                    id_sp: id_sp,
                    qty: qty,
                },
                success: function (data) {
                    resolve(data);
                },
                error: function () {
                    reject();
                },
            });
        });
    }

    // render Add Cart thành công

    function renderAddCartSuccessfully() {
        if (window.innerWidth > 992) {
            if ($(".add-cart-success").length) {
                $(".add-cart-success").remove();
            }
            const addCartSuccess = `<div class="add-cart-success">
                    <div class="d-flex align-items-center justify-content-center py-3">
                    <i class="fas fa-check-circle success-color me-4"></i>Thêm mới sản phẩm thành công
                     </div>
                    <a href="{{ route('user/cart-items') }}" class="btn btn-success w-100 mt-20">Xem giỏ
                    hàng và thanh toán</a>
                </div>`;

            $("#add-cart-success").append(addCartSuccess);

            clearTimeout(timer);
            timer = setTimeout(() => {
                setTimeout(() => {
                    $(".add-cart-success").remove();
                }, 1000);
                $(".add-cart-success").hide("fade", 300);
            }, 5000);
        } else {
            showAlertTop("Thêm giỏ hàng thành công");
        }
    }

    $(".btn-add-cart").click(function () {
        var id = $(this).data("id");
        var id_sp = $(".card_product_id_" + id).val();
        var qty = $(".card_product_qty_" + id).val();
        addCart(id_sp, qty)
            .then((data) => {
                switch (data.status) {
                    case "new one":
                        if ($(".cart__number").hasClass("d-none")) {
                            $(".cart__number").removeClass("d-none");
                        }
                        var qtyHeadCart = parseInt($(".cart__number").text());
                        $(".cart__number").text(++qtyHeadCart);
                        // thông báo thêm giỏ hàng thành công
                        renderAddCartSuccessfully();
                        break;
                    case "already have":
                        const qtyInstock = data.qtyInStock;
                        if (qtyInstock > 5) {
                            showAlertTop(
                                `Đã có sản phẩm này trong giỏ hàng và số lượng mua tối đa là 5`
                            );
                        } else {
                            showAlertTop(
                                `Đã có sản phẩm này trong giỏ hàng và số lượng mua tối đa là ${data.qtyInStock}`
                            );
                        }
                        break;
                    default:
                        // thông báo thêm giỏ hàng thành công
                        showAlertTop("Vui lòng đăng nhập để thực hiện chức năng này");
                    // window.location.href = "http://127.0.0.1:8000/login";
                }
            })
            .catch(() => showAlertTop(errorMessage));
    });
});



