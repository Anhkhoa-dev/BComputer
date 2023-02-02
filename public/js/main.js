$(function () {
    let timer = null;
    // const page = window.location.pathname.split("/")[1];

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

    function addCart(id_pro, qty) {
        var $url = "{{ url('/add-to-cart') }}";
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: $url,
                type: "POST",
                data: {
                    id_pro: id_pro,
                    qty: qty,
                    _token: _token,
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
            const addCartSuccess =
                `<div class="add-cart-success">
                    <div class="d-flex align-items-center justify-content-center py-3">
                    <i class="fas fa-check-circle success-color me-4"></i>Thêm giỏ hàng thành
                        công!
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
            showToast("Thêm giỏ hàng thành công");
        }
    }

    $(".btn-add-cart").click(function () {
        var id = $(this).data("id");
        var id_sp = $(".card_product_id_" + id).val();
        var sl = $(".card_product_qty_" + id).val();
        addCart(id_sp, sl)
            .then((data) => {
                // cập nhật số lượng sản phẩm trong giỏ hàng
                const status = data.status;
                if (status === "new one") {
                    if ($(".cart__number").hasClass("d-none")) {
                        $(".cart__number").removeClass("d-none");
                    }

                    var qtyHeadCart = parseInt($(".cart__number").text());
                    $(".cart__number").text(++qtyHeadCart);
                } else if (status === "already have") {
                    const qtyInStock = data.qtyInStock;

                    if (qtyInStock < 5) {
                        alert(`Đã có sản phẩm này trong giỏ hàng và số lượng mua tối đa là ${data.qtyInStock}`);
                    } else {
                        alert(`Đã có sản phẩm này trong giỏ hàng và số lượng mua tối đa là 5`);
                    }
                    return;
                }



                // thông báo thêm giỏ hàng thành công
                renderAddCartSuccessfully();
            })
            .catch(() => showAlertTop(errorMessage));
    });
});
