// Lấy phần tử a chứa giá trị loggedInId
// Lấy giá trị của loggedInId từ phần tử a
var accountIdElement = document.querySelector('.account_id');
var loggedInId = accountIdElement.textContent.trim();


// Lấy URL hiện tại từ trình duyệt
var currentUrl = window.location.href;

// Kiểm tra xem URL đã chứa loggedInId chưa
if (!currentUrl.includes(loggedInId)) {
    // Thêm loggedInId vào URL hiện tại
    var newUrl = currentUrl + loggedInId;

    // Cập nhật URL của trình duyệt
    window.history.replaceState({}, document.title, newUrl);
}


