$(function () {
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
    const POST_SIZE_MAX = 8; // 8 MB

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
            image.onload = function () {
                const width = this.width;
                const height = this.height;

                resolve(width === height);
            };
        });
    }

    // Phần xử lý hình ảnh trong product
    $("#choose_image").click(function () {
        $("#image_inp").click();
    });

    $("#image_inp").change(function () {
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
            if (extend === "jpg" || extend === "jpeg" || extend === "png") {
                size = this.files[i].size / 1024 / 1024;
                if (size > 5) {
                    alert("Hình ảnh có dung lượng tối da là 5 MB");
                    break;
                }
                const urlIMG = URL.createObjectURL(this.files[i]);
                isCorrectFrameRate(urlIMG).then((bool) => {
                    if (bool) {
                        imageElement = "";
                    }
                });
            }
        }
    });
});
