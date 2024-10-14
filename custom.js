$(document).ready(function () {
    //  Apply multi-select framework for the multi-select box
    $('.multi_select').select2();
    
    //  Apply datatable framework for the tables
    $('.data_table').DataTable({
        "language": {
            "decimal": "",
            "info": "Hiển thị từ _START_ tới _END_ trong _TOTAL_ hàng",
            "infoEmpty": "Hiển thị từ 0 tới 0 trong 0 hàng",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Hiển thị _MENU_ hàng",
            "loadingRecords": "Đang tải...",
            "processing": "Đang xử lý...",
            "search": "Tìm kiếm:",
            "zeroRecords": "Không tìm thấy kết quả nào",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối cùng",
                "next": "Sau",
                "previous": "Trước"
            }
        }
    });

});