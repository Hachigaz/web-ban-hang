<div class="card-box">
    <div class="card">
        <div class="content">
            <div class="personal-info">
                <div class="icon-in-box">
                    <i class="fi fi-rr-overview"></i>
                </div>
                <span class="title">Xem thông tin</span>
            </div>
            <div class="edit-personal-info">
                <div class="icon-in-box">
                    <i class="fi fi-rr-edit"></i>
                </div>
                <span class="title">Sửa thông tin</span>
            </div>
        </div>
        <!-- <div class="icon-box">
            <i class="fi fi-rr-user"></i>
        </div> -->
    </div>
    <div class="card">
        <div class="content">
            <div class="leave">
                <div class="icon-in-box">
                    <i class="fi fi-rr-clipboard"></i>
                </div>
                <span class="title">Xin nghỉ phép</span>
            </div>
            <div class="sick">
                <div class="icon-in-box">
                    <i class="fi fi-rr-person-pregnant"></i>
                </div>
                <span class="title">Xin nghỉ ốm đau, thai sản</span>
            </div>
        </div>
        <!-- <div class="icon-box">
            <i class="fi fi-rr-document"></i>
        </div> -->
    </div>
    <div class="card">
    <div class="content">
            <div class="retire">
                <div class="icon-in-box">
                    <i class="fi fi-rr-house-leave"></i>
                </div>
                <span class="title">Xin từ chức</span>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="content">
            <div class="change-password">
                <div class="icon-in-box">
                    <i class="fi fi-rr-lock"></i>
                </div>
                <span class="title">Đổi mật khẩu</span>
            </div>
            <a href="Logout" class="logout">
                <div class="sick">
                    <div class="icon-in-box">
                        <i class="fi fi-rr-power"></i>
                    </div>
                    <span class="title">Đăng xuất</span>
                </div>
            </a>
        </div>
        <!-- <div class="icon-box">
            <i class="fi fi-rr-document"></i>
        </div> -->
    </div>
</div>

<div class="modal hide">
<div class="modal-inner modal-add hide">
        <div class="modal-header">
            <p>Thêm nhà cung cấp</p>
            <i class="fi fi-rr-cross-small" id="closeIconAdd"></i>
        </div>
        <form action="../Supplier/CreateSupplier" method="post" class="modal-body" enctype="multipart/form-data">
            <div class="input-section">
                <label for="supplier_name_add_form" class="label-form">Tên nhà cung cấp</label>
                <br>
                <input type="text" name="supplier_name_add_form" placeholder="Tên nhà cung cấp..." class="supplier_name_add_form" autocomplete="off" id="supplier_name_add_form" required>
                <br>
                <span class="warning add-supplier-name-warning">Tên không chứa ký tự đặc biệt</span>
            </div>
            <div class="input-section">
                <label for="address_add_form" class="label-form">Địa chỉ</label>
                <br>
                <input type="text" name="address_add_form" class="address-add-form" required placeholder="Địa chỉ...">
            </div>
            <div class="input-section">
                <label for="phone_number_add_form" class="label-form">Số điện thoại</label>
                <br>
                <input type="text" name="phone_number_add_form" class="phone-number-add-form" placeholder="Số điện thoại..." autocomplete="off" id="phone_number_add_form" required>
                <br>
                <span class="warning add-phone-number-warning">Phải đủ 10 số và bắt đầu là 0</span>
            </div>
            <div class="input-section">
                <label for="email_add_form" class="label-form">Email</label>
                <br>
                <input type="email" name="email_add_form" class="email-add-form" placeholder="Email..." autocomplete="off" id="email_add_form" required>
                <br>
                <span class="warning add-email-warning">Email không đúng định dạng</span>
            </div>
            <div class="modal-footer">
                <div class="reset-btn" title="refresh">
                    <i class="fi fi-rr-refresh"></i>
                </div>
                <button class="confirm" id="confirmBtnAdd">Xác nhận thêm</button>
            </div>
        </form>
    </div>
</div>