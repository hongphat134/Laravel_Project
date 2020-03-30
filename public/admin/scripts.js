$('#myDatatable').DataTable({
	"pagingType": "full_numbers",
	"language": {
        "lengthMenu": "Show _MENU_ Item",
        "zeroRecords": "Không tìm thấy Item!",
        "info": "Trang _PAGE_ trong tổng _PAGES_ trang",
        "infoEmpty": "Item không tồn tại!",
        "infoFiltered": "(filtered from _MAX_ total records)"            
    },
     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
});

function myFunction() {
  var x = document.getElementById("myTopnav");

  if (x.className === "nav navbar-nav") { 	
    x.className += " responsive";
  } else {
    x.className = "nav navbar-nav";
  }
}

$(document).ready(function(){
  toastr.options = {
       "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        // "onclick": function(){
        //   alert("Con Kờ!");
        // },
        "onclick":null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        // "tapToDismiss": false
      }
});
