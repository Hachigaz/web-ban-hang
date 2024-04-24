<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/input-components.css">

<script src="../Public/scripts/components/validate.min.js"></script>
<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/components/globals.js"></script>
<script src="../Public/js/Manager/AdvertisementManager/load.js" defer></script>

<div class="tab">
    <div class="tab-header">
        <div class="tab-content-options">
            <div class="title">
                Chức năng
            </div>
            <div class="option-list">
                <div class="option selected" tab="banner-manager-tab" onclick="showTab(this)">
                    <div class="text">
                        Hình ảnh quảng cáo
                    </div>
                </div>
                <div class="option" tab="featured-products-manager-tab" onclick="showTab(this)">
                    <div class="text">
                        Sản phẩm trưng bày
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-content-wrapper tab-content banner-manager-tab">
            <div class="tab-content-header">
                <div class="options-list banner-options-1">
                    <div class="option selected" panel="banner-info-panel" onclick="showPanel(this)">
                        Danh sách quảng cáo
                    </div>
                    <div class="option" panel="add-banner-info-panel" onclick="showPanel(this)">
                        Thêm hình quảng cáo mới
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="grid-cell-wrapper">
                    <div class="banner-list-panel">
                        <div class="table-wrapper banner-table">
                            <div class="table-row-header">
                                <div class="row-element">
                                    Tên hình quảng cáo
                                </div>
                                <div class="row-element">
                                    Đường dẫn
                                </div>
                                <div class="row-element">
                                    Vị trí
                                </div>
                            </div>
                            <div class="row-list-wrapper">
                                <div class="row-list">
                                    <?php 
                                        $bannerList = $data["BannerList"];
                                        include("./MVC/Views/pages/Manager/AdvertisementManager/bannerPrint.php");
                                        unset($bannerList);
                                    ?>
                                </div>
                                <!-- <?php if(!$data["BannerList"]["IsLast"]):?>
                                <div class="show-more-button no-user-select" onclick="showMoreBanners(this)">
                                    Xem thêm
                                </div>
                                <?php endif; ?>  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-cell-wrapper">
                    <div class="expand-option-wrapper">
                        <div class="option no-user-select" onclick="document.querySelector('.banner-manager-tab .content').classList.toggle('expanded'); if(this.innerHTML != '❯')this.innerHTML = '❯'; else this.innerHTML = '❮'">
                            ❮
                        </div>
                    </div>
                    <div class="info-panel-wrapper">
                        <div class="info-panel banner-info-panel">
                            <div class="inital-panel">
                                
                            </div>
                            <div class="after-panel hidden">
                                <div class="title">
                                    Thông tin
                                </div>
                                <div class="edit-image-wrapper banner-image-wrapper">
                                        <img src="../Public/img/products/_common/not-found.png" alt="" srcset="">
                                        <div class="img-input-overlay">
                                            <div class="overlay-message">
                                                Chọn hình ảnh
                                            </div>
                                            <input name="input_image_path" type="file" accept="image/*" multiple="false" onchange="changeImage(this.parentElement.parentElement)">
                                        </div>
                                </div>
                                <div class="info-panel-form-wrapper">
                                    <div class="c-input" id="input_banner_name">
                                        <div class="input-error-message">
                                        </div>    
                                        <div class="input-wrapper">
                                            <div class="input-label-wrapper">
                                                <label>Tên hình quảng cáo</label>
                                            </div>                                
                                            <input autocomplete="off" class="input"  name="input_banner_name" type="text" placeholder="" onchange="enableOptions('EditBannerForm')" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                        </div>
                                    </div>
                                    <div class="c-input" id="input_url">
                                        <div class="input-error-message">
                                        </div>    
                                        <div class="input-wrapper">
                                            <div class="input-label-wrapper">
                                                <label>Đường dẫn</label>
                                            </div>                                
                                            <input autocomplete="off" class="input"  name="input_url" type="text" placeholder="" onchange="enableOptions('EditBannerForm')" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                        </div>
                                    </div>
                                    <div class="c-input" id="input_location">
                                        <div class="input-error-message">
                                        </div>    
                                        <div class="input-wrapper">
                                            <div class="input-label-wrapper">
                                                <label>Vị trí</label>
                                            </div>                                
                                            <input autocomplete="off" class="input"  name="input_location" type="text" placeholder="" onchange="enableOptions('EditBannerForm')" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                        </div>
                                    </div>
                                </div>
                                <div class="info-panel-form-options">
                                    <div class="option edit-button disabled" onclick="editBanner(this)">
                                        Chỉnh sửa thông tin
                                    </div>
                                    <div class="option remove-button" onclick="removeBannerInfo(this)">
                                        Xóa đã chọn
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-panel add-banner-info-panel hidden">
                            <div class="title">
                                Thêm hình quảng cáo
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content-wrapper hidden featured-products-manager-tab">
            <div class="title">
                Quản lý sản phẩm trưng bày
            </div>
            <div class="content">

            </div>
        </div>
    </div>
</div>