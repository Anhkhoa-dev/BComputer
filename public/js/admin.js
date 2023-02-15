$(function() {
    const CREATE_MESSAGE = "Thêm thành công";
    const EDIT_MESSAGE = "Chỉnh sửa thành công";
    const DELETE_MESSAGE = "Xóa thành công";
    const errorMessage = "Đã có lỗi xảy ra. Vui lòng thử lại";
    const maxSizeImageMessage = "Hình ảnh có dung lượng tối đa là 5 MB";
    const TOAST_SUCCESS_TYPE = 1;
    const TOAST_DELETE_TYPE = 2;
    const X_CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    const MAX_SIZE_IMAGE = 5; // 5 MB
    const BYTE = 1024;
    const POST_SIZE_MAX = 10; // 8 MB

    /*========================================================================================================================================================
                                                                HÀM CƠ BẢN KHAI BÁO TRONG NÀY
    ========================================================================================================================================================*/

    function removeRequired(element) {
        if (element.hasClass("required")) {
            element.removeClass("required");
            element.next().remove();
        }
    }

    function isCorrectFrameRate(url) {
        return new Promise((resolve) => {
            const image = new Image();
            image.src = url;
            image.onload = function() {
                const width = this.width;
                const height = this.height;
                resolve(width === height);
            };
        });
    }

    function isCorrectFrameRateWithman(url) {
        return new Promise((resolve) => {
            const image = new Image();
            image.src = url;
            image.onload = function() {
                const width = this.width;
                const height = this.height;

                resolve(width != height || width === height);
            };
        });
    }
    var idx = 1;

    // Phần xử lý hình ảnh trong product - Khoa

    $("#image_inp").change(function() {
        // HỦy chọn hình
        if ($(this).val() == "") {
            return;
        }

        removeRequired($(".image-preview-div"));
        var length = this.files.length;
        var qty = $("image-preview-div > .row").children().length;
        let imageElement = "";
        let size = 0;
        for (var i = 0; i < length; i++) {
            if (qty > 10) {
                alert("Hình ảnh upload tối đa là 10");
                break;
            }
            // Kiểm tra file hình

            const fileName = this.files[i].name;
            const array = fileName.split(".");
            const extend = array[array.length - 1];
            // kiểm tra có phải là hình ảnh không
            if (
                extend.toLowerCase() === "jpg" ||
                extend.toLowerCase() === "jpeg" ||
                extend.toLowerCase() === "png"
            ) {
                size = this.files[i].size / 1024 / 1024;
                if (size > 5) {
                    alert("Hình ảnh có dung lượng tối da là 5 MB");
                    break;
                }
                const urlIMG = URL.createObjectURL(this.files[i]);
                isCorrectFrameRate(urlIMG).then((bool) => {
                    if (bool) {
                        imageElement = `<div id="image-${idx}" data-id="${idx}" class="image-preview col-md-4 col-6">
                                        <img data-id="${idx}" src="${urlIMG}"
                                        alt="" class="img-preview">
                                        <div class="bg-image-hover">
                                        <div data-id="${idx}" class="delete-icon" title="delete image">
                                            <i class="fa-solid fa-trash"></i>
                                        </div>
                                        </div>
                                    </div>`;
                        idx++;
                        qty++;
                        $(".image-preview-div > .row").append(imageElement);
                        $("#qty-image").text(`(${qty})`);
                    } else {
                        alert("Một số hình ảnh không đúng tỉ lệ");
                    }
                });
            } else {
                alert("Bạn chỉ có thể upload hình ảnh");
                break;
            }
        }
    });
    var arrayDelete = [];
    $(document).on("click", ".delete-icon", function() {
        var id = $(this).data("id");
        var imageDelete = $("#image-" + id);

        if (imageDelete.attr("data-name") !== undefined) {
            const imageName = imageDelete.attr("data-name").split("?")[0];
            arrayDelete.push(imageName);
        }
        imageDelete.remove();

        var qty = $(".image-preview-div > .row").children().length;

        if (qty === 0) {
            $("#qty-image").hide();
            $("#image_inp").val("");
        } else {
            $("#qty-image").text(`(${qty})`);
        }
    });


    //MAN-IMAGE-SUPPLIER
    $("#image_sup").change(function() {
        // HỦy chọn hình
        if ($(this).val() == "") {
            return;
        }

        removeRequired($(".image-sup-div"));
        var length = this.files.length;
        var qty = $("image-sup-div > .row").children().length;
        let imageElement = "";
        let size = 0;
        for (var i = 0; i < length; i++) {
            if (qty > 10) {
                alert("Hình ảnh upload tối đa là 10");
                break;
            }
            // Kiểm tra file hình

            const fileName = this.files[i].name;
            const array = fileName.split(".");
            const extend = array[array.length - 1];
            // kiểm tra có phải là hình ảnh không
            if (
                extend.toLowerCase() === "jpg" ||
                extend.toLowerCase() === "jpeg" ||
                extend.toLowerCase() === "png"
            ) {
                size = this.files[i].size / 1024 / 1024;
                if (size > 5) {
                    alert("Hình ảnh có dung lượng tối da là 5 MB");
                    break;
                }
                const urlIMG = URL.createObjectURL(this.files[i]);
                isCorrectFrameRateWithman(urlIMG).then((bool) => {
                    if (bool) {
                        imageElement = `<div id="image-${idx}" data-id="${idx}" class="image-sup col-md-6 col-6">
                                <img data-id="${idx}" src="${urlIMG}"
                                    alt="" class="img-sup">
                                    <div class="bg-image-hover">
                                        <div data-id="${idx}" class="delete-icon" title="delete image">
                                            <i class="fa-solid fa-trash"></i>
                                        </div>
                                    </div>
                                </div>`;
                        idx++;
                        qty++;
                        $(".image-sup-div > .row").append(imageElement);
                        $("#qty-image").text(`(${qty})`);
                    } else {
                        alert("Một số hình ảnh không đúng tỉ lệ");
                    }
                });
            } else {
                console(urlIMG);
                alert("Bạn chỉ có thể upload hình ảnh");
                break;
            }
        }
    });
    var arrayDelete = [];
    $(document).on("click", ".delete-icon", function() {
        var id = $(this).data("id");
        var imageDelete = $("#image-" + id);

        if (imageDelete.attr("data-name") !== undefined) {
            const imageName = imageDelete.attr("data-name").split("?")[0];
            arrayDelete.push(imageName);
        }
        imageDelete.remove();

        var qty = $(".image-sup-div > .row").children().length;

        if (qty === 0) {
            $("#qty-image").hide();
            $("#image_sup").val("");
        } else {
            $("#qty-image").text(`(${qty})`);
        }
    });

    // Xử lý ajax create voucher
    $('#create-btn').click(function(e) {
        $("#voucher_create").modal("show");
    });

    $('#create-submit').click(function(e) {
        e.preventDefault();
        var code = $("#code").val();
        var content = $("#content").val();
        var discount = $("#Discount").val();
        var condition = $("#condition").val();
        var dateStart = $("#dateStart").val();
        var endStart = $("#endStart").val();
        // alert(code);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": X_CSRF_TOKEN,
            },
            url: "/admin/voucher/store",
            type: 'POST',
            data: {
                code: code,
                content: content,
                discount: discount,
                condition: condition,
                dateStart: dateStart,
                endStart: endStart,
            },
            success: function(data) {
                alert(data.status);
                location.reload()

            }

        });

    });
});