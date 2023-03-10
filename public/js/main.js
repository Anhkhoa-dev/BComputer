$(function () {
    let timer = null;
    const page = window.location.pathname.split("/")[1];
    const X_CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    const errorMessage = "An error has occurred. Please try again";

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            $(".scroll-to-top").fadeIn(250);
        } else {
            $(".scroll-to-top").fadeOut(250);
        }
    });
    $(".scroll-to-top").click(function () {
        $("html,body").animate({ scrollTop: 0 }, 400);
    });

    window.addEventListener("scroll", function () {
        const search = document.querySelector(".khoa-navbar");
        search.classList.toggle("active", window.scrollY > 100);
    });

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
    function renderAddCartSuccessfully() {
        if (window.innerWidth > 992) {
            if ($(".add-cart-success").length) {
                $(".add-cart-success").remove();
            }
            const addCartSuccess = `<div class="add-cart-success">
                    <div class="d-flex align-items-center justify-content-center py-3">
                    <i class="fas fa-check-circle success-color me-4"></i>New successful product added
                     </div>
                    <a href="http://127.0.0.1:8000/cart-items" class="btn btn-success w-100 mt-20">View cart and checkout</a>
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
    function renderUpdateCartSuccessfully(id) {
        if (window.innerWidth > 992) {
            if ($(".add-cart-success").length) {
                $(".add-cart-success").remove();
            }
            const updateCartSuccess = `<div class="add-cart-success">
                    <div class="d-flex align-items-center justify-content-center py-3">
                    <i class="fas fa-check-circle success-color me-4"></i>Product Update ${id} success
                     </div>
                    <a href="http://127.0.0.1:8000/cart-items" class="btn btn-success w-100 mt-20">View cart and checkout</a>
                </div>`;

            $("#add-cart-success").append(updateCartSuccess);

            clearTimeout(timer);
            timer = setTimeout(() => {
                setTimeout(() => {
                    $(".add-cart-success").remove();
                }, 1000);
                $(".add-cart-success").hide("fade", 300);
            }, 5000);
        } else {
            showAlertTop("Update cart successfully");
        }
    }

    /* ================================================================================
                                        Thông tin tài khỏan
               ================================================================================ */


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

    $(".btn-add-cart").click(function () {
        var id = $(this).data("id");
        var id_sp = $(".card_product_id_" + id).val();
        var qty = $(".card_product_qty_" + id).val();
        addCart(id_sp, qty)
            .then((data) => {
                switch (data.status) {
                    case "update":
                        if ($(".cart__number").hasClass("d-none")) {
                            $(".cart__number").removeClass("d-none");
                        }
                        var qtyHeadCart = parseInt($(".cart__number").text());
                        $(".cart__number").text(++qtyHeadCart);
                        // thông báo thêm giỏ hàng thành công
                        renderUpdateCartSuccessfully(data.pro_name);
                        break;
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
                                `This product is already in the cart and the maximum purchase quantity is 5`
                            );
                        } else {
                            showAlertTop(
                                `Products are out of stock or out of business`
                            );
                        }
                        break;
                    default:
                        // thông báo thêm giỏ hàng thành công
                        showAlertTop(
                            "Please login to perform this function"
                        );
                }
            })
            .catch(() => showAlertTop(errorMessage));
    });

    $(".add-new-address").click(function () {
        $("#add-address").modal("show");
    });

    // Nút Mua ngay
    $("#buy-now").click(function () {
        var id = $(this).attr("data-id");
        var qty1 = $(".input-qty").val();
        addCart(id, qty1)
            .then((data) => {
                switch (data.status) {
                    case "update":
                        if ($(".cart__number").hasClass("d-none")) {
                            $(".cart__number").removeClass("d-none");
                        }
                        var qtyHeadCart = parseInt($(".cart__number").text());
                        $(".cart__number").text(++qtyHeadCart);
                        // thông báo thêm giỏ hàng thành công
                        // renderUpdateCartSuccessfully(data.pro_name);
                        window.location.href = "/cart-items";
                        break;
                    case "new one":
                        if ($(".cart__number").hasClass("d-none")) {
                            $(".cart__number").removeClass("d-none");
                        }
                        var qtyHeadCart = parseInt($(".cart__number").text());
                        $(".cart__number").text(++qtyHeadCart);
                        // thông báo thêm giỏ hàng thành công
                        // renderAddCartSuccessfully();
                        window.location.href = "/cart-items";
                        break;
                    case "already have":
                        const qtyInstock = data.qtyInStock;
                        if (qtyInstock > 5) {
                            showAlertTop(
                                `This product is already in the cart and the maximum purchase quantity is 5`
                            );
                        } else {
                            showAlertTop(
                                `Products are out of stock or out of business`
                            );
                        }
                        break;
                    default:
                        // thông báo thêm giỏ hàng thành công
                        showAlertTop(
                            "Please login to perform this function"
                        );
                    // window.location.href = "http://127.0.0.1:8000/login";
                }
            })
            .catch(() => showAlertTop(errorMessage));
    });

    //nut them vao gio hang
    $(".add-to-cart").click(function () {
        var id = $(this).attr("data-id");
        var qty1 = $(".input-qty").val();
        addCart(id, qty1)
            .then((data) => {
                switch (data.status) {
                    case "update":
                        if ($(".cart__number").hasClass("d-none")) {
                            $(".cart__number").removeClass("d-none");
                        }
                        var qtyHeadCart = parseInt($(".cart__number").text());
                        $(".cart__number").text(++qtyHeadCart);
                        // thông báo thêm giỏ hàng thành công
                        renderUpdateCartSuccessfully(data.pro_name);
                        break;
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
                                `This product is already in the cart and the maximum purchase quantity is 5`
                            );
                        } else {
                            showAlertTop(
                                `Products are out of stock or out of business`
                            );
                        }
                        break;
                    default:
                        // thông báo thêm giỏ hàng thành công
                        showAlertTop(
                            "Please login to perform this function"
                        );
                    // window.location.href = "http://127.0.0.1:8000/login";
                }
            })
            .catch(() => showAlertTop(errorMessage));
    });

    //nut gui comment
    // $(".send-comment").click(function () {
    //     var idc = $(this).attr("data-id");
    //     var comment = $(".input-group-text").val();
    //     alert(idc, comment);
    // });

    switch (page) {
        case "": {
            $(".sidebar").children('.card_side').hide();
        }
        case "account": {
            $("#btn-tk-name-update").click(function () {
                var idUser = $(".change-name").attr("data-id");
                var fullname = $(".change-name").val();
                ajaxChangeFullname(idUser, fullname);
            });

            // 
            $('#change-password').click(function () {
                var id = $(this).attr('data-id');
                $("#chang-pass-content").text("Change password");
                $("#update-password").attr("data-id", $(this).data("id")); // Thêm data-id vào nút button
                $("#change-pass").modal("show");
            });
            $('#update-password').click(function () {

                var id = $(this).attr('data-id');
                var pass = $('#newpass').val();
                var cpass = $('#cpnewpass').val();
                if (pass === cpass) {
                    ajaxChangePass(id, pass);
                } else {
                    showAlertTop('Password conform error');
                }

            });

            $('#change-avt-inp').change(function (e) {
                let reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
            });
            $("#image_update").submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": X_CSRF_TOKEN,
                    },
                    url: '/ajax-change-image-user',
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    }
                });
            });

            break;
        }
        case "cart-items": {
            // alert(page);
            $(".add-new-address").click(function () {
                $("#add-address").modal("show");
            });
            const totalItem = $("#list-cart-item").children().length;
            const totalChecked = $(".cus-checkbox-checked").length;
            provisionalAndTotalOrder();
            if (totalItem == totalChecked) {
                if (totalItem == 0 && totalChecked == 0) {
                    document.getElementById("select_all").checked = false;
                    $('.select-item-cart[data-id="all"]').removeClass(
                        "cus-checkbox-checked"
                    );
                } else {
                    document.getElementById("select_all").checked = true;
                    $('.select-item-cart[data-id="all"]').addClass(
                        "cus-checkbox-checked"
                    );
                }
            } else {
                document.getElementById("select_all").checked = false;
                $('.select-item-cart[data-id="all"]').removeClass(
                    "cus-checkbox-checked"
                );
            }
            $(".select-item-cart")
                .off("click")
                .on("click", function () {
                    const id = $(this).attr("data-id");

                    if (id === "all") {
                        if ($(this).hasClass("cus-checkbox-checked")) {
                            $(".select-item-cart").removeClass(
                                "cus-checkbox-checked"
                            );
                        } else {
                            $(".select-item-cart").addClass(
                                "cus-checkbox-checked"
                            );
                        }
                    } else {
                        const checkAllElement = $(
                            '.select-item-cart[data-id="all"]'
                        );
                        if (checkAllElement.hasClass("cus-checkbox-checked")) {
                            checkAllElement.removeClass("cus-checkbox-checked");
                        }

                        $(this).toggleClass("cus-checkbox-checked");
                    }

                    provisionalAndTotalOrder();
                });

            // xoa cart items
            $(".cart-body-trash").click(function () {
                var name = $(this).attr("data-name");
                $("#delete-content").text("Dellete product");
                $("#delete-btn").attr("data-object", "item-cart");
                $("#delete-btn").attr("data-id", $(this).data("id"));
                $("#delete-body").text(
                    `Do you want to remove this ${name} product?`
                );
                $("#delete-modal").modal("show");
            });

            $("#delete-btn").click(function () {
                var id = $(this).attr("data-id");
                ajaxDeleteCart(id);
                $("#delete-modal").modal("hide");
            });

            // delect all select card item
            $(".cart-header-trash").click(function () {
                $("#delete-all-content").text("Xóa Cart");
                $("#delete-all-btn").attr("data-object", "all-cart");
                $("#delete-all-body").text(
                    `Do you want to delete all products in the cart?`
                );
                $("#delete-all-modal").modal("show");
                $("#delete-all-btn").click(function () {
                    var idAll = $(this).attr("data-object");
                    ajaxDeleteAllSelect(idAll);
                });
            });

            $("#check-voucher-btn").click(function () {
                var isVoucher = $("#voucher-inp").val();
                var isTotal = $("#total-provisional").text();
                if (isVoucher.lenght <= 0) {
                    return;
                } else {
                    ajaxVoucher(isVoucher, isTotal);
                }
            });

            $(".btnSubmitCart").click(function () {
                var checkList = [];
                var Total = $("#totalOrder").text();
                var code = $("#voucher-inp").val();
                $.each($(".cus-checkbox-checked"), (i, element) => {
                    const id = $(element).attr("data-id");
                    if (id != "all") {
                        checkList.push(id);
                    }
                });
                ajaxCheckoutProcess(checkList, Total, code);
            });
            break;
        }
        case "checkout-process": {
            $("#delivery-check").addClass("select_checked");
            $("#pick-up-at-the-store").click(function () {
                $(this).addClass("select_checked");
                $("#delivery-check").removeClass("select_checked");
                $(".delivery-check").addClass("d-none");
                $(".pick-up-at-the-store").removeClass("d-none");
            });
            $("#delivery-check").click(function () {
                $(this).addClass("select_checked");
                $("#pick-up-at-the-store").removeClass("select_checked");
                $(".delivery-check").removeClass("d-none");
                $(".pick-up-at-the-store").addClass("d-none");
            });

            $("#check_delivery").addClass("check_payment");
            $("#check_delivery").click(function () {
                $(this).addClass("check_payment");
                $("#check_paypal").removeClass("check_payment");
                $("#paypal-button").addClass("d-none");
            });
            $("#check_paypal").click(function () {
                $(this).addClass("check_payment");
                $("#check_delivery").removeClass("check_payment");
                $("#paypal-button").removeClass("d-none");
            });

            // $("#choose-address-orther").click(function () {
            //     showAlertTop("Chưa làm tới");
            // });
            var totalPayPal = document.getElementById("totalUsd").value;
            paypal.Button.render(
                {
                    // Configure environment
                    env: "sandbox",
                    client: {
                        sandbox:
                            "AUY1Drlc9SYoTBz_ZVmZuwL9tL-0YQ61ogdpHb5XfA0B6g4Ks09QKQ58tUdXSmlIBDv-DCXTNHoODAhQ",
                        production: "demo_production_client_id",
                    },
                    // Customize button (optional)
                    locale: "en_US",
                    style: {
                        size: "medium",
                        color: "gold",
                        shape: "pill",
                    },

                    // Enable Pay Now checkout flow (optional)
                    commit: true,

                    // Set up a payment
                    payment: function (data, actions) {
                        return actions.payment.create({
                            transactions: [
                                {
                                    amount: {
                                        total: `${totalPayPal}`,
                                        currency: "USD",
                                    },
                                },
                            ],
                        });
                    },
                    // Execute the payment
                    onAuthorize: function (data, actions) {
                        return actions.payment.execute().then(function () {
                            showAlertTop(
                                "Please click proceed to payment to complete the order"
                            );
                        });
                    },
                },
                "#paypal-button"
            );

            $("#process-to-payment").click(function () {
                let idList = [];
                let idAddress = [];
                let idPayment = [];
                $.each($(".checkout-select"), (i, element) => {
                    const id = $(element).attr("data-id");
                    const price_discount = $(element)
                        .children(".checkout-product-price")
                        .text();
                    const qtyTotal = $(element)
                        .children(".checkout-product-quanity")
                        .children(".qty-checkout")
                        .text();

                    if (id !== "") {
                        idList.push([
                            parseInt(id),
                            parseFloat(price_discount.substr(1)),
                            parseFloat(qtyTotal),
                        ]);
                    }
                });
                $.each($(".select_checked"), (i, element) => {
                    const id = $(element).attr("data-id");
                    if (id !== "") {
                        idAddress.push(id);
                    }
                });

                $.each($(".check_payment"), (i, element) => {
                    const id = $(element).attr("data-id");

                    if (id !== "") {
                        idPayment.push(id);
                    }
                });

                var total = $(".total-checkout").text();
                makePayment(idList, idAddress, idPayment, total);

            });

            break;
        }
    }
    $('.search-info').hide();
    $('#search-input').on('keyup', function () {
        var key = $(this).val();
        if (key != '') {
            $.ajax({
                url: '/ajax-tracuu-product?key=' + key,
                type: "GET",
                success: function (res) {
                    $('.search-preview').html(res);
                    $('.search-info').show();
                }
            });
        } else {
            $('.search-preview').html('');
            $('.search-info').hide();
        }
    });

    // $('#search-input').on('keyup', function () {
    //     var key = $(this).val();
    //     if (key != '') {
    //         $.ajax({
    //             url: '/ajax-tracuu-product-list?key=' + key,
    //             type: "GET",
    //             success: function (res) {
    //                 $('#resutl-product').append(res);
    //                 // console.table(res);
    //             }
    //         });
    //     }

    // });




    // Thay đổi password
    function ajaxChangePass(id, password) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "/ajax-change-pass-user",
                type: "POST",
                data: {
                    id: id,
                    password: password,
                },
                success: function (data) {
                    resolve(data);
                    switch (data.status) {
                        case "success": {
                            window.location.href = "/logout";
                            break;
                        }
                        default:
                            showAlertTop('Change password error');
                            break;
                    }

                },
                error: function () {
                    reject();
                },
            });
        });
    }




    // function ajaxChangeImage(id, files) {
    //     return new Promise((resolve, reject) => {
    //         $.ajax({
    //             headers: {
    //                 "X-CSRF-TOKEN": X_CSRF_TOKEN,
    //             },
    //             url: "/ajax-change-image-user",
    //             type: "POST",
    //             data: {
    //                 id: id,
    //                 files: files,
    //             },
    //             success: function (data) {
    //                 resolve(data);
    //                 console.log(data);
    //             },
    //             error: function () {
    //                 reject();
    //             },
    //         });
    //     });
    // }

    function ajaxChangeFullname(id, name) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "/ajax-change-fullname-user",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                },
                success: function (data) {
                    resolve(data);
                    switch (data.status) {
                        case "success": {
                            location.reload();
                            showAlertTop('Update name user success');
                            break;
                        }
                        default:

                            showAlertTop('Change name user error');
                    }
                },
                error: function () {
                    reject();
                },
            });
        });
    }

    function makePayment(idList, idAddress, idPayment, total) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "/ajax-make-payment-process",
                type: "POST",
                data: {
                    idList: idList,
                    idAddress: idAddress,
                    idPayment: idPayment,
                    total: total,
                },
                success: function (data) {
                    resolve(data);
                    switch (data.status) {
                        case "Order success": {
                            window.location.href = "/checkout-success";
                            break;
                        }
                        default:
                            showAlertTop("There was an error when ordering");
                            window.location.href = "/errorpage";
                    }
                },
                error: function () {
                    reject();
                },
            });
        });
    }

    function ajaxCheckoutProcess(checkList, total, code) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "/ajax-checkout-process",
                type: "POST",
                data: {
                    checkList: checkList,
                    total: total,
                    code: code,
                },
                success: function (data) {
                    switch (data.status) {
                        case "continue": {
                            window.location.href = "/checkout-process";
                            break;
                        }
                        case "await": {
                            showAlertTop(
                                "Vui lòng chọn ít nhất 1 sản phẩm để thanh toán"
                            );
                            break;
                        }
                    }
                    resolve(data);
                    console.log(data);
                },
                error: function () {
                    reject();
                },
            });
        });
    }

    function ajaxVoucher(voucher, total) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "/ajax-apply-voucher",
                type: "POST",
                data: {
                    idVoucher: voucher,
                    total: total,
                },
                success: function (data) {
                    switch (data.status) {
                        case "Success": {
                            showAlertTop("Successfully applied voucher code");
                            provisionalAndTotalOrder();
                            break;
                        }
                        case "Expired voucher": {
                            showAlertTop("Expired Voucher Code");
                            break;
                        }
                        case "not enough condition": {
                            showAlertTop(
                                "The total amount does not satisfy the conditions to apply the voucher"
                            );
                            break;
                        }
                        case "wrong code": {
                            showAlertTop("Wrong voucher code entered");
                            break;
                        }
                        case "out of stock": {
                            showAlertTop(
                                "Voucher has expired as many times as possible"
                            );
                            break;
                        }
                        case "first time buy": {
                            showAlertTop(
                                "Customers buy products for the first time"
                            );
                            break;
                        }
                    }
                    resolve(data);
                    // console.log(data);
                },
                error: function () {
                    reject();
                },
            });
        });
    }
    function ajaxDeleteAllSelect(idList) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "/ajax-delete-all-select-cart",
                type: "POST",
                data: {
                    idList: idList,
                },
                success: function (data) {
                    location.reload();
                },
                error: function () {
                    reject();
                },
            });
        });
    }
    // hàm xóa cart
    function ajaxDeleteCart(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "/ajax-delete-cart",
                type: "POST",
                data: {
                    id: id,
                },
                success: function (data) {
                    if (data.status == "Delete success") {
                        swal(
                            {
                                title: "Delete cart item success",
                                text: "back cart",
                                icon: "success",
                                ButtonClass: "btn-success",
                                ButtonText: "Yes",
                            },
                            function () {
                                window.location.href =
                                    "http://127.0.0.1:8000/cart-items";
                            }
                        );
                    }
                    // resolve(data);
                },
                error: function () {
                    reject();
                },
            });
        });
    }



    // xử lý update cart
    let isClicked = false // ngăn người dùng nhấn liên tục
    $('.update-qty').off('click').click(function () {
        var id = $(this).attr('data-id');
        var qty = parseInt($('.qty-item_' + id).text());
        var numCart = parseInt($('.cart__number').text());
        var qty_id = $('.qty-item_' + id).attr('data-id');
        var type = '';
        if ($(this).hasClass('plus')) {
            type = 'plus';
            // alert('nút này là nút tăng ' + type);
            if (id == qty_id) {
                if (qty >= 5) {
                    showAlertTop('You have purchased up to 5 products');
                    isClicked = true;
                    return;
                }
                if (isClicked) {
                    $(".minus").addClass("disabled");
                } else {
                    $(".minus").removeClass("disabled");
                }
            } else {
                type = "minus";

                if (id == qty_id) {
                    if (qty === 1) {
                        isClicked = true;
                        var idCheck = $(this).attr("data-id");
                        // alert(idCheck);
                        $("#delete-content").text("Delete Ccart");
                        $("#delete-btn").attr("data-object", "item-cart");
                        $("#delete-btn").attr("data-id", idCheck);
                        $("#delete-body").text(
                            `Do you want to delete this cart items?`
                        );
                        $("#delete-modal").modal("show");
                        return;
                    } else {
                        $(".qty-item_" + id).text(--qty);
                        $(".cart__number").text(--numCart);
                    }
                }
            }
            updateQtyCart(id, type);
        }

    });

    // hàm update Cart
    function updateQtyCart(id, type) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": X_CSRF_TOKEN,
            },
            type: "POST",
            data: { id: id, type: type },
            url: "/ajax-update-cart",
            success: function (data) {
                isClicked = false;
                // slton kho không đủ
                console.log(data);
                if (data.status === "not enough") {
                    showAlertTop(`Only ${data.qtyInStock} product`);
                    return;
                }

                // cập nhật số lượng sản phẩm
                $(".qty-item_" + id).text(data.newQty);

                // cập nhật thành tiền sản phẩm
                $(`.thanhtien[data-id="${id}"]`).text(data.newPrice);

                provisionalAndTotalOrder();
            },
            error: function () {
                showToast(errorMessage);
            },
        });
    }

    // cập nhật tạm tính và tổng tiền 
    function provisionalAndTotalOrder() {
        let idList = [];
        // danh sách id_sp thanh toán
        $.each($(".cus-checkbox-checked"), (i, element) => {
            const id = $(element).attr("data-id");

            if (id !== "all") {
                idList.push(id);
            }
        });

        const USDollar = new Intl.NumberFormat("en-US", {
            style: "currency",
            currency: "USD",
        });
        getProvisionalOrder(idList)
            .then((data) => {
                // tổng tiền
                let total = 0;
                // tạm tính
                const provisional = data.provisional;
                // có sử dụng voucher
                if (data.voucher) {
                    // kiểm tra nếu tổng tiền < điều kiện của voucher thì hủy voucher
                    // const condition = data.voucher.condition;
                    // nếu tạm tính < điều kiện voucher thì hủy voucher
                    const discount = data.voucher.discount;
                    total = provisional - provisional * (discount / 100);
                } else {
                    total = provisional;
                }
                // showAlertTop(provisional);
                //cập nhật tạm tính và tổng tiền
                $("#total-provisional").text(
                    USDollar.format(provisional.toFixed(2))
                );
                $("#totalOrder").text(USDollar.format(total.toFixed(2)));
                // location.reload();
            })
            .catch((error) => {
                //  console.error(error);
                showToast(errorMessage);
            });
    }

    function getProvisionalOrder(idList) {
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": X_CSRF_TOKEN,
                },
                url: "ajax-get-provisional-order",
                type: "POST",
                data: { idList },
                success: function (data) {
                    console.log(data);
                    resolve(data);
                },
                error: function () {
                    reject();
                },
            });
        });
    }


    // code xử lý Phường quận, tỉnh trong bàng modal địa chỉ
    var citis = document.getElementById("address-city");
    var districts = document.getElementById("address-district");
    var wards = document.getElementById("address-ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        // url: "https://raw.githubusercontent.com/kcjpop/vietnam-topojson/master/adm2/adm2.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function (result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name);
        }
        citis.onchange = function () {
            districts.length = 1;
            wards.length = 1;
            if (this.value != "") {
                const result = data.filter((n) => n.Name === this.value);

                for (const k of result[0].Districts) {
                    districts.options[districts.options.length] = new Option(
                        k.Name,
                        k.Name
                    );
                }
            }
        };
        districts.onchange = function () {
            wards.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(
                    (n) => n.Name === this.value
                )[0].Wards;
                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(
                        w.Name,
                        w.Name
                    );
                }
            }
        };
    }
});
