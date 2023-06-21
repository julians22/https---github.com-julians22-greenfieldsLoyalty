const { default: Swal } = require("sweetalert2");


const swalAlertClasses = document.querySelectorAll('.swal-alert');
const toastAletsClasses = document.querySelectorAll('.toast-alert');

if (toastAletsClasses) {
    // openToast(toastAletsClasses);
    toastAletsClasses.forEach(element => {
        const type = element.getAttribute('data-type');
        const text = element.innerHTML;
        openToast(text, type);
    });
}

if (swalAlertClasses) {
    swalAlertClasses.forEach(element => {
        const type = element.getAttribute('data-type');
        const text = element.innerHTML;
        Swal.fire('', text, type);
    })
}

function openToast(text, type){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    switch (type) {
        case "error":
            toastr.error(text)
            break;
        case "success":
            toastr.success(text)
            break;
        case "info":
            toastr.info(text)
            break;
        case "warning":
            toastr.warning(text)
            break;
        default:
            break;
    }
}
