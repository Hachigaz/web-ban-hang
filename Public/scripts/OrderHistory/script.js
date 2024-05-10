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


var valueArr = {
    0: "Đang chờ",
    1: "Đang xử lý",
    2: "Đã giao",
    3: "Đã nhận",
    4: "Đã hủy",
};
const cardBox = document.querySelector(".card-box");
const content = document.querySelector(".content-module");

const startDateFilter = document.querySelector("#start-date");
const endDateFilter = document.querySelector("#end-date");
const roleFilter = document.querySelector("#status-filter");
const statusFilter = document.querySelector("#status-filter");
const searchFilter = document.querySelector("#search-filter");

const numbers = Array.from(document.querySelectorAll(".card .numbers"));
const cardNames = Array.from(document.querySelectorAll(".card .card-name"));
const tbody = document.querySelector(".details table tbody");
const tbody1 = document.querySelector(".staff-table1 tbody");
const userImage = document.querySelector(".topbar .user img");
const accountIdPost = document.querySelector(".modal-edit .modal-footer .account_id");
const staffIdPost = document.querySelector(".modal-edit .modal-footer .staff_id");

var rowOrderId = document.querySelector(".row-data.row-order-id");
var rowStaffId = document.querySelector(".row-data.row-staff-id");
var rowAccountId = document.querySelector(".row-data.row-account-id");
var rowReceiverName = document.querySelector(".row-data.row-receiver-name");
var rowEmail = document.querySelector(".row-data.row-email-of-receiver");
var rowPhoneNumber = document.querySelector(".row-data.row-phone-number-of-receiver");
var rowAddress = document.querySelector(".row-data.row-shipping-address");
var rowOrderDate = document.querySelector(".row-data.row-order-date");
var rowShippingDate = document.querySelector(".row-data.row-shipping-date");
var rowTrackingNumber = document.querySelector(".row-data.row-tracking-number");
var rowPaymentMethod = document.querySelector(".row-data.row-payment-method");
var rowStatus = document.querySelector(".row-data.row-status-of-order");
var rowNote = document.querySelector(".row-data.row-note");
var rowSku= document.querySelector(".row-data.row-sku-id");
var rowSku1=document.querySelector(".row-data.row-sku-id2");
let addedRows = [];
fetch("../OrderHistory/GetOrderbyAccount/"+loggedInId)
    .then((response) => response.json())
    .then((values) => {
        values.orders.forEach((order) => {
            // Kiểm tra nếu order_id đã tồn tại trong mảng existingOrderIds
                var row = tbody.insertRow();
        
                var orderIdCell = row.insertCell();
                orderIdCell.textContent = order.order_id; // In ra order_id
        
                // Thêm order_id vào mảng existingOrderIds sau khi đã in ra
                //existingOrderIds.push(order.order_id);
        
                var orderDateCell = row.insertCell();
                var date = new Date(order.order_date);
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                if (day < 10) day = "0" + day;
                if (month < 10) month = "0" + month;
                var formattedDate = day + "/" + month + "/" + year;
                orderDateCell.textContent = formattedDate; // format lại ngày
        
                var ordertotalCell = row.insertCell();
                ordertotalCell.textContent = order.total_money;
        
                var orderNumberCell = row.insertCell();
                orderNumberCell.textContent = order.tracking_number;
        
                var orderStatusCell = row.insertCell();
                switch(order.status_of_order) {
                    case "Pending":
                        orderStatusCell.textContent = "Đang chờ";
                        break;
                    case "Processing":
                        orderStatusCell.textContent = "Đang xử lý";
                        break;
                    case "Shipped":
                        orderStatusCell.textContent = "Đã giao";
                        break;
                    case "Delivered":
                        orderStatusCell.textContent = "Đã nhận";
                        break;
                    case "Cancelled":
                        orderStatusCell.textContent = "Đã hủy";
                        break;
                }
        
                var operation = row.insertCell();
                var btns = `<div class="btns">
                <button class="info" id="info-${order.order_id}" title="Xem chi tiết đơn hàng"><i class="fi fi-rr-info"></i></button>
                `;  
                if (order.status_of_order == "Shipped"){
                    // btns += `<button class="edit" id="edit-${order.order_id}" title="Xác nhận"><i class="fi fi-rr-edit"></i></button>`;
                }
                else if (order.status_of_order != "Cancelled" && order.status_of_order != "Delivered") {
                    btns += `
                    <button class="delete" id="delete-${order.order_id}" title="Hủy đơn hàng"><i class="fi fi-rr-trash"></i></button></div>`;
                }
                operation.insertAdjacentHTML("beforeend", btns);
        
                tbody.appendChild(row);
            }
        );
        
        

        // Gắn sự kiện click cho container cha (ví dụ: tbody)
        tbody.addEventListener("click", function (event) {
            var clickedElement = event.target;
            var deleteBtn = clickedElement.closest(".delete");
            var infoBtn = clickedElement.closest(".info");
            // var detailBtn = cliclkedElement.closet("")
            var editBtn = clickedElement.closest(".edit");
            if (deleteBtn) {
                var order_id = deleteBtn.id.split("-")[1];
                console.log(order_id);
                // Lưu trữ order_id ban đầu vào một biến khác
                var original_order_id = order_id;
                // Thiết lập thuộc tính href của deleteA với order_id ban đầu
                deleteA.setAttribute(
                    "href",
                    "../Order/CancelledOrder/" + original_order_id
                );
                // Hiển thị modal với nội dung tương ứng
                contentModalDelete.textContent = "Bạn có chắc là muốn hủy đơn hàng " ;
                showModalDelete();
            }
            
            if (infoBtn) {
                var orderId = infoBtn.id.split("-")[1];
                console.log(infoBtn.id.split('-'));
                values.orders.forEach((order) => {
                    if (order.order_id == orderId) {
                        rowOrderId.textContent = order.order_id;
                        rowStaffId.textContent = order.staff_id;
                        rowAccountId.textContent = order.account_id;
                        rowReceiverName.textContent = order.receiver_name;
                        rowPhoneNumber.textContent = order.phone_number_of_receiver;
                        rowEmail.textContent = order.email_of_receiver;
                        rowAddress.textContent = order.shipping_address;
                        var date1 = new Date(order.order_date);
                        var day = date1.getDate();
                        var month = date1.getMonth() + 1;
                        var year = date1.getFullYear();
                        if (day < 10) day = "0" + day;
                        if (month < 10) month = "0" + month;
                        var formattedDate = day + "/" + month + "/" + year;
                        rowOrderDate.textContent = formattedDate;
                        var formattedDate1 = "";
                        if (order.shipping_date) {
                            var date2 = new Date(order.shipping_date);
                            var day1 = date2.getDate();
                            var month1 = date2.getMonth() + 1;
                            var year1 = date2.getFullYear();
                            if (day1 < 10) day1 = "0" + day1;
                            if (month1 < 10) month1 = "0" + month1;
                            formattedDate1 = day1 + "/" + month1 + "/" + year1;
                        }
                        rowShippingDate.textContent = formattedDate1;
                        rowTrackingNumber.textContent= order.tracking_number;
                        rowPaymentMethod.textContent = order.payment_method;
                        rowStatus.textContent = order.status_of_order;
                        rowNote.textContent= order.note;
                        // rowSku.textContent= order.price;
                    }
                });
                var addedSKUs = {};

                values.order_details.forEach((order) => {
                    // Nếu sku_id chưa tồn tại trong addedSKUs hoặc đã tồn tại nhưng chưa được thêm vào tbody1
                    if (order.order_id == orderId) {
                    if (!addedSKUs.hasOwnProperty(order.sku_id) || !addedSKUs[order.sku_id]) {
                        // Đánh dấu sku_id này đã được thêm vào
                        addedSKUs[order.sku_id] = true;
                
                        // Tạo và thêm dòng mới vào tbody1
                        var row = tbody1.insertRow();
                
                        // Tạo và thêm ô STT vào dòng mới
                        var sttCell = row.insertCell();
                        sttCell.textContent = Object.keys(addedSKUs).length; // Số thứ tự tự động tăng
                
                        // Tạo và thêm ô SKU ID vào dòng mới
                        var nameCell = row.insertCell();
                        nameCell.textContent = order.product_name;
                
                        var skuCell = row.insertCell();
                        skuCell.textContent = order.sku_code;
                        // Tạo và thêm ô Số lượng vào dòng mới
                        var numberCell = row.insertCell();
                        numberCell.textContent = order.number_of_products;
                
                        // Tạo và thêm ô Đơn giá vào dòng mới
                        // Trước khi gán giá trị vào ô giá cả
                        var priceCell = row.insertCell();
                        var formattedPrice = parseFloat(order.price).toFixed(0); // Làm tròn số và loại bỏ các số sau dấu thập phân
                        priceCell.textContent = formattedPrice + " đ"; // Thêm đơn vị tiền tệ

                
                        // Tạo và thêm ô Màu vào dòng mới
                
                        // Thêm dòng mới vào tbody1
                        tbody1.appendChild(row);
                        addedRows.push(row);
                    }
                }});
                

                showModalInfo();
            }
            if (editBtn) {
                var order_id = editBtn.id.split("-")[1];
                console.log(order_id);
                // Lưu trữ order_id ban đầu vào một biến khác
                var original_order_id = order_id;
                // Thiết lập thuộc tính href của deleteA với order_id ban đầu
                deleteA.setAttribute(
                    "href",
                    "../Order/UpdateStatusOrder/" + original_order_id
                );
                // Hiển thị modal với nội dung tương ứng
                contentModalDelete.textContent = "Xác nhận đổi trạng thái đơn hàng ? " ;
                showModalDelete();
            }
        });
    })
    .catch((error) => console.log("Error: ", error));

const modal = document.querySelector(".modal");
const closeIconDelete = document.querySelector("#closeIconDelete");
const closeBtnDelete = document.querySelector("#closeBtnDelete");
const closeIconInfo = document.querySelector("#closeIconInfo");
const closeIconInfo1 = document.querySelector("#closeIconInfo1");
const closeIconInfo2 = document.querySelector("#closeIconInfo2");
const closeBtnInfo = document.querySelector("#closeBtnInfo");
// const closeIconEdit = document.querySelector("#closeIconEdit");
// const closeBtnEdit = document.querySelector("#closeBtnEdit");
const closeIconAdd = document.querySelector("#closeIconAdd");
// const closeBtnAdd = document.querySelector("#closeBtnAdd");

const modalInnerDelete = document.querySelector(".modal-inner.modal-delete");
const modalInnerInfo = document.querySelector(".modal-inner.modal-info");
const modalOrderNote = document.querySelector(".modal-inner.modal-note");
const modalOrderDetails = document.querySelector(".modal-inner.modal-details");
const modalInnerEdit = document.querySelector(".modal-inner.modal-edit");
const modalInnerAdd = document.querySelector(".modal-inner.modal-add");

const contentModalDelete = document.querySelector(".content-delete");
const contentModalInfo = document.querySelector(".content-info");
const contentModalEdit = document.querySelector(".content-edit");
const contentModalAdd = document.querySelector(".content-add");
const deleteA = document.querySelector(".modal-footer a");
const editB = document.querySelector(".modal-footer b");



function hideModalDelete() {
    modal.classList.add("hide");
    modalInnerDelete.classList.add("hide");
}
function showModalDelete() {
    modal.classList.remove("hide");
    modalInnerDelete.classList.remove("hide");
}
function hideModalInfo() {
    modal.classList.add("hide");
    modalInnerInfo.classList.add("hide");
}
function showModalInfo() {
    modal.classList.remove("hide");
    modalInnerInfo.classList.remove("hide");
}
function hideModalEdit() {
    modal.classList.add("hide");
    modalInnerEdit.classList.add("hide");
}
function showModalEdit() {
    modal.classList.remove("hide");
    modalInnerEdit.classList.remove("hide");
}
function hideModalAdd() {
    modal.classList.add("hide");
    modalInnerAdd.classList.add("hide");
    refreshAddForm();
}
function showModalAdd() {
    modal.classList.remove("hide");
    modalInnerAdd.classList.remove("hide");
}
function hideModal() {
    modal.classList.add("hide");
    modalInnerDelete.classList.add("hide");
    modalInnerInfo.classList.add("hide");
    modalOrderNote.classList.add("hide");
    modalOrderDetails.classList.add("hide");
    modalInnerEdit.classList.add("hide");
    modalInnerAdd.classList.add("hide");
    addedRows.forEach(row => {
        row.remove();
    });
    refreshAddForm();
}
function hideModal1() {
    modal.classList.add("hide");
    modals[2].classList.add("hide");
    addedRows.forEach(row => {
        row.remove();
    });
}
function hideModal2() {
    modal.classList.add("hide");
    modals[3].classList.add("hide");
    addedRows.forEach(row => {
        row.remove();
    });
}

closeIconDelete.addEventListener("click", hideModalDelete);
closeBtnDelete.addEventListener("click", hideModalDelete);
closeIconInfo.addEventListener("click", hideModal);
closeIconInfo1.addEventListener("click", hideModal1);
closeIconInfo2.addEventListener("click", hideModal2);
closeBtnInfo.addEventListener("click", hideModalInfo);
// closeIconEdit.addEventListener("click", hideModalEdit);
// closeBtnEdit.addEventListener("click", hideModalEdit);
// closeBtnAdd.addEventListener("click", hideModalAdd);
// modal.addEventListener("click", hideModal);
modalInnerDelete.addEventListener("click", function (event) {
    event.stopPropagation();
});
modalInnerInfo.addEventListener("click", function (event) {
    event.stopPropagation();
});



// Call the function to update the date strings initially
const refreshBtn = document.querySelector(".reset-btn");

const confirmAddBtn = document.getElementById("confirmBtnAdd");
const confirmEditBtn = document.getElementById("confirmBtnEdit");
const formAdd = document.querySelector(".modal-add .modal-body");
const refreshAddBtn = document.querySelector(".modal-add .reset-btn");
// const refreshEditBtn = document.querySelector(".modal-edit .reset-btn");
/* refresh add-form */
const addressEditForm = document.querySelector(".address-edit-form");
function refreshEditForm() {
    fullnameEditForm.value = "";
    roleIdEditForm.selectedIndex = 0;
    phoneNumberEditForm.value = "";
    emailEditForm.value = "";
    genderEditForm.selectedIndex = 0;
    addressEditForm.value = "";
    passwordEditForm.value = "";
    emailEditForm.style.backgroundColor = "#ddd";
    phoneNumberEditForm.style.backgroundColor = "#ddd";
}
// refreshEditBtn.addEventListener("click", refreshEditForm);
var isFullnameEditValid = true;
var isRoleEditValid = true;
var isGenderEditValid = true;
var isPasswordEditValid = true;
var isPhoneNumberEditValid = true;
var isEmailEditValid = true;

const addressAddForm = document.querySelector(".address-add-form");
function refreshAddForm() {
    fullnameAddForm.value = "";
    roleIdAddForm.selectedIndex = 0;
    phoneNumberAddForm.value = "";
    emailAddForm.value = "";
    genderAddForm.selectedIndex = 0;
    addressAddForm.value = "";
    passwordAddForm.value = "";
    avatarAddForm.value = "";
    emailAddForm.style.backgroundColor = "#ddd";
    phoneNumberAddForm.style.backgroundColor = "#ddd";
}
var isFullnameAddValid = true;
var isRoleAddValid = false;
var isGenderAddValid = false;
var isPasswordAddValid = true;
var isAvatarAddValid = true;
var isPhoneNumberAddValid = true;
var isEmailAddValid = true;

const fullnameAddForm = document.querySelector(".fullname-add-form");
const addFullnameWarning = document.querySelector(".add-fullname-warning");

const roleIdAddForm = document.querySelector(".role-id-add-form");
const addRoleWarning = document.querySelector(".add-role-warning");


function filterTable() {
    var trs = tbody.getElementsByTagName("tr");
    // Lấy giá trị lọc
    var statusFilterValue = statusFilter.value;
    // var genderFilterValue = genderFilter.value;
    var searchFilterValue = searchFilter.value.toLowerCase();
    // var startDate = new Date(document.getElementById("start-date").value);
    // var endDate = new Date(document.getElementById("end-date").value);
    var startDateString = document.getElementById("start-date").value;
    var endDateString = document.getElementById("end-date").value;

    for (var i = 0; i < trs.length; i++) {
        var statusTd = trs[i].getElementsByTagName("td")[4]; // lấy ra giá trị từng cột
        // var genderTd = trs[i].getElementsByTagName("td")[5];

        var orderCodeTd = trs[i].getElementsByTagName("td")[0];
        var orderDateTd = trs[i].getElementsByTagName("td")[1];
        var orderTotalTd = trs[i].getElementsByTagName("td")[2];
        var orderTrackingTd = trs[i].getElementsByTagName("td")[3];


        if (
            statusTd &&
            orderCodeTd &&
            orderDateTd &&
            orderTotalTd &&
            orderTrackingTd 
        ) {
            // nếu tồn tại thì thay đổi tránh crash
            var statusValue = statusTd.textContent || statusTd.innerText;

            var statusMatch =
                statusFilterValue == "Tình trạng" ||
                statusValue.indexOf(statusFilterValue) > -1;
            var orderTrackingMatch =
                orderTrackingTd.textContent
                    .toLowerCase()
                    .indexOf(searchFilterValue) > -1; // so sánh giá trị trong bảng với giá trị lọc

            if (endDateString != "") {
                // nếu endDate được chọn thì max của startDate là endDate
                document.getElementById("start-date").max = endDateString;
            }
            if (startDateString != "") {
                // nếu startDate được chọn thì min của endDate là startDate
                document.getElementById("end-date").min = startDateString;
            }
            var bothDatePickersSelected = startDateString && endDateString; // cả 2 datePicker được chọn thì mới bắt đầu kiểm tra điều kiện lọc
            if (bothDatePickersSelected) {
                var orderDateMatch =
                    compareStartDate(
                        orderDateTd.textContent,
                        convertToDDMMYYYY(startDateString),
                        console.log(convertToDDMMYYYY(startDateString))

                    ) &&
                    compareEndDate(
                        orderDateTd.textContent,
                        convertToDDMMYYYY(endDateString),
                        console.log(convertToDDMMYYYY(endDateString))
                    );
            } else {
                orderDateMatch = true;
            }
            trs[i].style.display =
                statusMatch &&
                orderTrackingMatch &&
                orderDateMatch
                    ? ""
                    : "none";
        }
    }
}
function convertToDate(dateString) {
    const [day, month, year] = dateString.split("/");
    return new Date(year, month - 1, day);
}
function compareStartDate(dateString1, dateString2) {
    // so sánh với startDate
    const date1 = convertToDate(dateString1);
    const date2 = convertToDate(dateString2);
    if (date1 >= date2 && dateString2 != "") {
        return true;
    } else {
        return false;
    }
}
function compareEndDate(dateString1, dateString2) {
    // so sánh với endDate
    const date1 = convertToDate(dateString1);
    const date2 = convertToDate(dateString2);
    if (date1 <= date2 && dateString2 != "") {
        return true;
    } else {
        return false;
    }
}

function convertToDDMMYYYY(dateString) {
    // convert sang định dạng dd/mm/yyyy
    if (dateString != "") {
        const [year, month, day] = dateString.split("-");
        return `${day}/${month}/${year}`;
    } else {
        return "";
    }
}

// JavaScript để điều khiển việc hiển thị các modal và nút đóng

// Lấy các phần tử DOM cần thiết
const closeBtns = document.querySelectorAll('.close');
const nextPageBtn = document.querySelector('.next-page-btn');
const downPagebtn =document.querySelector('.down-page-btn');
const downPagebtn1 =document.querySelector('.down-page-btn1');
const nextPageBtn1 = document.querySelector('.next-page-btn1');
const modals = document.querySelectorAll('.modal-inner');
let currentModalIndex = 1; // Biến để theo dõi modal hiện tại đang hiển thị
let currentModalIndex1 = 2; // Biến để theo dõi modal hiện tại đang hiển thị

// Thêm sự kiện click cho nút trang kế tiếp
nextPageBtn.addEventListener('click', () => {
    modals[1].classList.add('hide');
    modals[2].classList.remove('hide');
});
downPagebtn.addEventListener('click', () => {
    modals[1].classList.remove('hide');
    modals[2].classList.add('hide');
});
downPagebtn1.addEventListener('click', () => {
    modals[2].classList.remove('hide');
    modals[3].classList.add('hide');
});
nextPageBtn1.addEventListener('click', () => {
    modals[2].classList.add('hide');
    modals[3].classList.remove('hide');
});
// Thêm sự kiện click cho các nút đóng
closeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Ẩn tất cả các modal
        modals.forEach(modal => {
            modal.classList.add('hide');
        });
        // Đặt lại chỉ số của modal hiện tại về 0
        currentModalIndex = 0;
        hideModal();
    });
});

