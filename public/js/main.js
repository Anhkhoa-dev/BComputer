$(function () {
    let timer = null;
    const page = window.location.pathname.split("/")[1];
    const X_CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    const errorMessage = "Đã có lỗi xảy ra. Vui lòng thử lại";

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            $('.scroll-to-top').fadeIn(250);
        }
        else {
            $('.scroll-to-top').fadeOut(250);
        }
    });
    $('.scroll-to-top').click(function () {
        $('html,body').animate(
            { scrollTop: 0 }, 400
        );
    });

    window.addEventListener("scroll", function () {
        const search = document.querySelector(".khoa-navbar")
        search.classList.toggle("active", window.scrollY > 100)
    })



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
                    <i class="fas fa-check-circle success-color me-4"></i>Thêm mới sản phẩm thành công
                     </div>
                    <a href="http://127.0.0.1:8000/cart-items" class="btn btn-success w-100 mt-20">Xem giỏ
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
    function renderUpdateCartSuccessfully(id) {
        if (window.innerWidth > 992) {
            if ($(".add-cart-success").length) {
                $(".add-cart-success").remove();
            }
            const updateCartSuccess = `<div class="add-cart-success">
                    <div class="d-flex align-items-center justify-content-center py-3">
                    <i class="fas fa-check-circle success-color me-4"></i>Update sản phẩm ${id} thành công
                     </div>
                    <a href="http://127.0.0.1:8000/cart-items" class="btn btn-success w-100 mt-20">Xem giỏ
                    hàng và thanh toán</a>
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
            showAlertTop("Update giỏ hàng thành công");
        }
    }

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
                                `Đã có sản phẩm này trong giỏ hàng và số lượng mua tối đa là 5`
                            );
                        } else {
                            showAlertTop(
                                `Sản phẩm hết hàng hoặc đang ngừng kinh doanh`
                            );
                        }
                        break;
                    default:
                        // thông báo thêm giỏ hàng thành công
                        showAlertTop(
                            "Vui lòng đăng nhập để thực hiện chức năng này"
                        );
                    // window.location.href = "http://127.0.0.1:8000/login";
                }
            })
            .catch(() => showAlertTop(errorMessage));
    });

    function getProductIdListToCheckout() {
        return new Promise((resolve) => {
            let checkoutList = [];
            let outOfStockList = [];
            $.each($(".out-of-stock"), (i, element) => {
                outOfStockList.push($(element).attr("data-id"));
            });
            $.each($(".cus-checkbox-checked"), (i, element) => {
                const id = $(element).attr("data-id");
                if (id != 'all') {
                    checkoutList.push(id);
                }

            });
            const response = {
                checkoutList, outOfStockList,
            };
            resolve(response)
        })

    }

    //

    switch (page) {

        case "acount": {
            // $('#change-avt-inp').click(function(){
            //     var avt_inp = $('#change-avt-inp').val();
            //     alert(avt_inp)
            // });
        }
        case "cart-items": {
            // alert(page);
            const totalItem = $("#list-cart-item").children().length;
            const totalChecked = $(".cus-checkbox-checked").length;
            provisionalAndTotalOrder();
            if (totalItem == totalChecked) {
                if (totalItem == 0 && totalChecked == 0) {
                    document.getElementById("select_all").checked = false;
                    $('.select-item-cart[data-id="all"]').removeClass("cus-checkbox-checked");
                } else {
                    document.getElementById("select_all").checked = true;
                    $('.select-item-cart[data-id="all"]').addClass("cus-checkbox-checked");
                }

            } else {
                document.getElementById("select_all").checked = false;
                $('.select-item-cart[data-id="all"]').removeClass("cus-checkbox-checked");
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
                var name = $(this).attr('data-name');
                $("#delete-content").text("Xóa sản phẩm");
                $("#delete-btn").attr("data-object", "item-cart");
                $("#delete-btn").attr("data-id", $(this).data("id"));
                $('#delete-body').text(`Bạn có muốn xóa sản phẩm ${name} này không?`)
                $("#delete-modal").modal("show");
            });

            $("#delete-btn").click(function () {
                var id = $(this).attr('data-id');
                ajaxDeleteCart(id);
                $("#delete-modal").modal("hide");
            });

            // delect all select card item
            $('.cart-header-trash').click(function () {
                $("#delete-all-content").text("Xóa Cart");
                $("#delete-all-btn").attr("data-object", 'all-cart');
                $('#delete-all-body').text(`Bạn có muốn xóa toàn bộ sản phẩm trong giỏ hàng không?`)
                $("#delete-all-modal").modal("show");
                $('#delete-all-btn').click(function () {
                    var idAll = $(this).attr('data-object');
                    ajaxDeleteAllSelect(idAll);
                })

            })

            $('#check-voucher-btn').click(function () {
                var isVoucher = $('#voucher-inp').val();
                var isTotal = $('#total-provisional').text();
                if (isVoucher.lenght <= 0) {
                    return;
                } else {
                    ajaxVoucher(isVoucher, isTotal);
                }
            })

            $('.btnSubmitCart').click(function () {
                var checkList = [];
                var Total = $('#totalOrder').text();
                var code = $('#voucher-inp').val();
                $.each($(".cus-checkbox-checked"), (i, element) => {
                    const id = $(element).attr("data-id");
                    if (id != 'all') {
                        checkList.push(id);
                    }

                });
                ajaxCheckoutProcess(checkList, Total, code);
            });
            break;
        }
        case "checkout-process": {
            $('#delivery-check').addClass('select_checked');
            $('#pick-up-at-the-store').click(function () {
                $(this).addClass('select_checked');
                $('#delivery-check').removeClass('select_checked');
                $('.delivery-check').addClass('d-none');
                $('.pick-up-at-the-store').removeClass('d-none');
            })
            $('#delivery-check').click(function () {
                $(this).addClass('select_checked');
                $('#pick-up-at-the-store').removeClass('select_checked');
                $('.delivery-check').removeClass('d-none');
                $('.pick-up-at-the-store').addClass('d-none');
            })

            $('#check_delivery').addClass('check_payment');
            $('#check_delivery').click(function () {
                $(this).addClass('check_payment');
                $('#check_paypal').removeClass('check_payment');

            })
            $('#check_paypal').click(function () {
                $(this).addClass('check_payment');
                $('#check_delivery').removeClass('check_payment');
            })

            $('#choose-address-orther').click(function () {
                showAlertTop('Chưa làm tới');
            });

            $('#process-to-payment').click(function () {
                let idList = [];
                let idAddress = [];
                let idPayment = [];
                // danh sách id_sp thanh toán
                $.each($(".checkout-select"), (i, element) => {
                    const id = $(element).attr("data-id");
                    const price_discount = $(element).children('.checkout-product-price').text();
                    const qtyTotal = $(element).children('.checkout-product-quanity').children('.qty-checkout').text();

                    if (id !== '') {
                        idList.push([parseInt(id), parseFloat(price_discount.substr(1)), parseInt(qtyTotal)]);
                    }
                });
                // console.log(idList);
                $.each($(".select_checked"), (i, element) => {
                    const id = $(element).attr("data-id");
                    if (id !== '') {
                        idAddress.push(id);
                    }
                });

                $.each($(".check_payment"), (i, element) => {
                    const id = $(element).attr("data-id");

                    if (id !== '') {
                        idPayment.push(id);
                    }
                });

                var total = $('.total-checkout').text();
                // alert(parseFloat(total));
                makePayment(idList, idAddress, idPayment, total);

            });


            break;
        }
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

                    switch (data.status) {
                        case 'Order success': {
                            showAlertTop('Đặt hàng thành công');
                            window.location.href = "/checkout-success";
                            break;
                        }
                        default:
                            showAlertTop('Có lỗi khi đặt hàng');
                            break;
                    }
                    resolve(data);
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
                        case 'continue': {
                            window.location.href = "/checkout-process";
                            break;
                        }
                        case 'await': {
                            showAlertTop('Vui lòng chọn ít nhất 1 sản phẩm để thanh toán');
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
                            showAlertTop('Successfully applied voucher code');
                            provisionalAndTotalOrder();
                            break;
                        }
                        case "Expired voucher": {
                            showAlertTop('Expired Voucher Code');
                            break;
                        }
                        case "not enough condition": {
                            showAlertTop('The total amount does not satisfy the conditions to apply the voucher');
                            break;
                        }
                        case "wrong code": {
                            showAlertTop('Wrong voucher code entered');
                            break;
                        }
                        case "out of stock": {
                            showAlertTop('Voucher has expired as many times as possible');
                            break;
                        }
                        case "first time buy": {
                            showAlertTop('Customers buy products for the first time');
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
                    if (data.status == 'Delete success') {
                        swal({
                            title: "Delete cart item success",
                            text: "back cart",
                            icon: "success",
                            ButtonClass: "btn-success",
                            ButtonText: "Yes",
                        },
                            function () {
                                window.location.href =
                                    "http://127.0.0.1:8000/cart-items";
                            });
                    }
                    // resolve(data);
                },
                error: function () {
                    reject();
                },
            });
        });
    }

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
                if (qty === 5) {
                    showAlertTop('You have purchased up to 5 products');
                    isClicked = true;
                    return;
                }
                $('.qty-item_' + id).text(++qty);
                $('.cart__number').text(++numCart);
            }
            if (isClicked) {
                $('.minus').addClass('disabled');
            } else {
                $('.minus').removeClass('disabled');
            }

        } else {
            type = 'minus';

            if (id == qty_id) {
                if (qty === 1) {
                    isClicked = true;
                    var idCheck = $(this).attr('data-id');
                    // alert(idCheck);
                    $("#delete-content").text("Delete Ccart");
                    $("#delete-btn").attr("data-object", "item-cart");
                    $("#delete-btn").attr("data-id", idCheck);
                    $('#delete-body').text(`Do you want to delete this cart items?`)
                    $("#delete-modal").modal("show");
                    return;
                } else {
                    $('.qty-item_' + id).text(--qty);
                    $('.cart__number').text(--numCart);
                }
            }


        }
        updateQtyCart(id, type);
    });

    // hàm update Cart
    function updateQtyCart(id, type) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': X_CSRF_TOKEN
            },
            type: 'POST',
            data: { id: id, type: type },
            url: '/ajax-update-cart',
            success: function (data) {
                isClicked = false;
                // slton kho không đủ
                console.log(data);
                if (data.status === "not enough") {
                    showAlertTop(`Only ${data.qtyInStock} product`);
                    return;
                }

                // cập nhật số lượng sản phẩm
                $('.qty-item_' + id).text(data.newQty);

                // cập nhật thành tiền sản phẩm
                $(`.thanhtien[data-id="${id}"]`).text(data.newPrice);

                provisionalAndTotalOrder()
            },
            error: function () {
                showToast(errorMessage)
            }
        });
    }

    function provisionalAndTotalOrder() {
        let idList = [];
        // danh sách id_sp thanh toán
        $.each($(".cus-checkbox-checked"), (i, element) => {
            const id = $(element).attr("data-id");

            if (id !== "all") {
                idList.push(id);
            }
        });

        const USDollar = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
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
                    total = provisional - (provisional * (discount / 100));
                } else {
                    total = provisional;
                }
                // showAlertTop(provisional);
                //cập nhật tạm tính và tổng tiền
                $("#total-provisional").text(USDollar.format(provisional.toFixed(2)));
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









});
