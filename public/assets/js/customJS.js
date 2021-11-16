$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})

//xoá item
function deleteItem(model, id){
    var result = confirm("Bạn có chắc chắn muốn xóa ?");

    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: '/admin/'+model+'/delete/'+id,
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (res) { // success : kết quả trả về sau khi gửi request ajax
                // code
                if (res.isSuccess != 'undefined' && res.isSuccess == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
                toastr.success("Xoá thành công!");

            },
            error: function (e) { // lỗi nếu có
                toastr.error("Xoá thất bại!");
            }
        });
    }
}

