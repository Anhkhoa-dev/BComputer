$(function () {
    let timer = null;
    const page = window.location.pathname.split("/")[1];
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
    function renderUpdateCartSuccessfully(id) {
        if (window.innerWidth > 992) {
            if ($(".add-cart-success").length) {
                $(".add-cart-success").remove();
            }
            const updateCartSuccess = `<div class="add-cart-success">
                    <div class="d-flex align-items-center justify-content-center py-3">
                    <i class="fas fa-check-circle success-color me-4"></i>Update sản phẩm ${id} thành công
                     </div>
                    <a href="{{ route('user/cart-items') }}" class="btn btn-success w-100 mt-20">Xem giỏ
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
                                `Đã có sản phẩm này trong giỏ hàng và số lượng mua tối đa là ${data.qtyInStock}`
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

    // function getProductIdListToCheckout() {
    //     return new Promise((resolve) => {
    //         let checkoutList = [];
    //         let outOfStockList = [];
    //         $.each($(".out-of-stock"), (i, element) => {
    //             outOfStockList.push($(element).attr("data-id"));
    //         });
    //         $.each($(".cus-checkbox-checked"), (i, element) => {
    //             const id = $(element).attr("data-id");
    //             if (id != 'all') {
    //                 checkoutList.push(id);
    //             }

    //         });

    //         const response = {
    //             checkoutList, outOfStockList,
    //         };
    //         alert(checkoutList);
    //     })

    // }

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
                isClicked = false

                // slton kho không đủ
                if (data.status === 'not enough') {
                    showToast(`Chỉ còn ${data.qtyInStock} sản phẩm`)
                    return;
                }

                // cập nhật số lượng sản phẩm
                $(`.qty-quanity-sl[data-id="${id}"]`).text(data.newQty);

                // cập nhật thành tiền sản phẩm
                $(`.provisional_item[data-id="${id}"]`).html(numberWithDot(data.newPrice) + 'đ'.sup());

                // provisionalAndTotalOrder()
            },
            error: function () {
                showToast(errorMessage)
            }
        });
    }

    let isClicked = false // ngăn người dùng nhấn liên tục
    $('.update-qty').off('click').click(function () {
        var button_id = $(this).attr('data-id');
        var qty = parseInt($('.qty-item_'+ button_id).text());
        var qty_id = $('.qty-item_'+ button_id).attr('data-id');
            if ($(this).hasClass('plus')) {  
                // alert('nút này là nút tăng ' + qty_id + ' ' + button_id);
                if(button_id == qty_id){
                    if (qty >= 5) {
                        showToast(`Chỉ còn ${maxQty} sản phẩm`);
                        return;
                    }
                    if (qty === 5) {
                        showToast(`Chỉ còn ${maxQty} sản phẩm`);
                        return;
                    }
                    $('.qty-item_'+ button_id).text(++qty);
                }
                    
            } else {
                // alert('nút này là nút giảm');
                if(button_id == qty_id){
                    if (qty == 1) {
                    return;
                    }
                    $('.qty-item_'+ button_id).text(--qty);
                }
                    
            
            }
                
        // }
        //  else {
        //     if (!isClicked) {
        //         isClicked = true;

        //         var id = $(this).data('id');
        //         var qty = parseInt($(`.qty-item[data-id="${id}"]`).text());
        //         var type = $(this).hasClass('plus') ? 'plus' : 'minus';

        //         // giảm số lượng về 0
        //         if (type === 'minus' && qty === 1) {
        //             $('#delete-content').text('Bạn có muốn xóa sản phẩm này?')
        //             $('#delete-btn').attr('data-object', 'item-cart');
        //             $('#delete-btn').attr('data-id', id);
        //             $('#delete-modal').modal('show');
        //             isClicked = false
        //             return
        //         } else if (type === 'plus' && qty >= 5) {
        //             isClicked = false
        //             return;
        //         }

        //         updateQtyCart(id, type)
        //     }
        // }
    });





});
