<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/input-components.css">
<script src="../Public/scripts/components/validate.min.js"></script>
<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/components/globals.js"></script>
<script src="../Public/js/Manager/ProductManager/load.js" defer></script>
<?php if(!isset($data["urlParams"])): ?>
<div class="tab warehouse-view-options-tab">
    <div class="title">
        Chọn chức năng
    </div>
    <div class="warehouse-view-options">
        <a href="../InternalManager/WarehouseManager?action=shipments" class="grid-container no-style option">
            <div class="option-wrapper">
                <div>Lô hàng trong kho</div>
            </div>
        </a>
        <a href="../InternalManager/WarehouseManager?action=products" class="grid-container no-style option">
            <div class="option-wrapper">
                <div>Sản phẩm trong kho</div>
            </div>
        </a>
    </div>
</div>
<?php else: ?>
<div class="tab warehouse-tab">
    <div class="tab-header">
        <div class="menu-options-wrapper no-user-select header-options">
            <div class="title">
                Chức năng
            </div>
            <a href="../InternalManager/WarehouseManager?action=shipments" class="option no-style">
                Lô hàng trong kho
            </a>
            <a href="../InternalManager/WarehouseManager?action=products" class="option no-style">
                Sản phẩm trong kho
            </a>
        </div>
        <div class="header-search-bar no-user-select header-options">
            <div class="title">
                Tìm kiếm
            </div>
            <input placeholder="Nhập tên sản phẩm" type="text" name="" id="" value="<?php if(isset($data["URLParams"]["search-query"]))echo $data["URLParams"]["search-query"]?>">
        </div>
        <div class="order-options-wrapper no-user-select header-options">
            <div class="title">
                Sắp xếp
            </div>
            <div class="option">
                <select name="" id="" onchange="setFilter('order-by',`${this.value}`)">
                    <?php $orderByValue = $data["URLParams"]["order-by"]; ?>
                    <option value="">Mặc định</option>
                    <option value="brand-a-z" <?php if($orderByValue=="brand-a-z") echo "selected" ?> >Hãng sản xuất</option>
                    <option value="category-a-z" <?php if($orderByValue=="category-a-z") echo "selected" ?>>Loại sản phẩm</option>
                    <option value="price-asc" <?php if($orderByValue=="price-asc") echo "selected" ?>>Giá tăng dần</option>
                    <option value="price-desc" <?php if($orderByValue=="price-desc") echo "selected" ?>>Giá giảm dần</option>
                    <option value="updated-at-desc" <?php if($orderByValue=="updated-at-desc") echo "selected" ?>>Ngày thay đổi mới nhất</option>
                    <option value="updated-at-asc" <?php if($orderByValue=="updated-at-asc") echo "selected" ?>>Ngày thay đổi cũ nhất</option>
                    <?php unset($orderByValue); ?>
                </select>
            </div>
        </div>
    </div>
    <div class="tab-content products-tab">
        <div class="product-tab">
            <div class="product-title row-element-display-header">
                <div class="row-element">
                    Mã 
                </div>
                <div class="row-element">
                    Tên sản phẩm 
                </div>
                <div class="row-element">
                    Giá
                </div>
                <div class="row-element">
                    Loại
                </div>
                <div class="row-element">
                    Hãng 
                </div>
                <div class="row-element">
                    Ngày chỉnh sửa
                </div>
            </div>
            <div class="product-list">
                <div class="product-list-container">
                    <?php 
                        $productList = $data["ProductList"]["ProductList"];
                        include("./MVC/Views/Pages/Manager/ProductManagers/ProductPrint.php");
                        unset($productList);
                    ?>
                </div>
                <?php if(!$data["ProductList"]["IsLast"]):?>
                <div class="show-more-product-button no-user-select" onclick="showMoreProducts(this)">
                    Xem thêm sản phẩm
                </div>
                <?php endif; ?> 
            </div>
        </div>
        <div class="info-tab-list">
            <div class="expand-option-wrapper">
                <div class="option no-user-select" onclick="document.querySelector('.tab-content').classList.toggle('expanded'); if(this.innerHTML != '❯')this.innerHTML = '❯'; else this.innerHTML = '❮'">
                    ❮
                </div>
            </div>
            <div class="info-tab product-info-tab">
                <div class="no-product-select-tab">
                    <div class="message">
                        Chọn sản phẩm để xem thông tin
                    </div>
                </div>
                <div class="product-info-tab-wrapper hidden">
                    <div class="title">
                        Thông tin sản phẩm
                    </div>
                    <div class="tab-header-options no-user-select">
                        <div class="option selected" panel="info-panel" onclick="showInfoPanel(this)">
                            Thông tin
                        </div>
                        <div class="option" panel="sku-panel" onclick="showInfoPanel(this)">
                            Đơn vị lưu
                        </div>
                        <div class="option" panel="product-images-panel" onclick="showInfoPanel(this)">
                            Hình ảnh
                        </div>
                        <div class="option" panel="product-options-panel" onclick="showInfoPanel(this)">
                            Thông số
                        </div>
                    </div>
                    <div class="tab-content-wrapper">
                        <div class="info-tab-content sku-panel hidden">
                            <div class="sku-table-wrapper">
                                <div class="sku-title row-element-display-header">
                                    <div class="row-element">
                                        Mã
                                    </div>
                                    <div class="row-element">
                                        Tên 
                                    </div>
                                </div>
                                <div class="sku-list-wrapper">
                                    <div class="sku-list">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="sku-info-form-wrapper">
                                <div class="sku-edit-form no-user-select">
                                    <div class="title" onclick="this.parentElement.querySelector('.form-wrapper').classList.toggle('hidden')">
                                        Sửa thông tin
                                    </div>
                                    <div class="form-wrapper">
                                        <div class="c-input" id="input-sku-code">
                                            <div class="input-error-message">
                                            </div>    
                                            <div class="input-wrapper">
                                                <div class="input-label-wrapper">
                                                    <label>Mã</label>
                                                </div>                                
                                                <input autocomplete="off" class="input"  name="input-sku-code" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                            </div>
                                        </div>
                                        <div class="c-input" id="input-sku-name">
                                            <div class="input-error-message">
                                            </div>    
                                            <div class="input-wrapper">
                                                <div class="input-label-wrapper">
                                                    <label>Tên</label>
                                                </div>                                
                                                <input autocomplete="off" class="input"  name="input-sku-name" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                            </div>
                                        </div>
                                        <div class="sku-info-options no-user-select">
                                            <div class="option edit-sku disabled" onclick="editSKU(this)">
                                                Sửa đơn vị
                                            </div>
                                            <div class="option remove-sku disabled" onclick="removeSKU(this)">
                                                Xóa đơn vị
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="sku-add-form">
                                    <div class="title no-user-select" onclick="this.parentElement.querySelector('.form-wrapper').classList.toggle('hidden')">
                                        Thêm đơn vị mới
                                    </div>
                                    <div class="form-wrapper">
                                        <div class="c-input" id="input-sku-code">
                                            <div class="input-error-message">
                                            </div>    
                                            <div class="input-wrapper">
                                                <div class="input-label-wrapper">
                                                    <label>Mã</label>
                                                </div>                                
                                                <input autocomplete="off" class="input"  name="input-sku-code" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                            </div>
                                        </div>
                                        <div class="c-input" id="input-sku-name">
                                            <div class="input-error-message">
                                            </div>    
                                            <div class="input-wrapper">
                                                <div class="input-label-wrapper">
                                                    <label>Tên</label>
                                                </div>                                
                                                <input autocomplete="off" class="input"  name="input-sku-name" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                            </div>
                                        </div>
                                        <div class="sku-info-options no-user-select">
                                            <div class="option add-sku" onclick="addSKU(this)">
                                                Thêm đơn vị
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-tab-content product-images-panel hidden">
                            <div class="image-preview-wrapper">
                                <img src="../Public/img/products/_common/not-found.png" alt="" srcset="">
                            </div>
                            <div class="product-image-table-wrapper">
                                <div class="product-image-title row-element-display-header">
                                    <div class="row-element">
                                        Hình ảnh sản phẩm
                                    </div>
                                </div>
                                <div class="product-image-wrapper">
                                    <div class="product-image-list">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="product-image-options no-user-select">
                                <div class="option add-img">
                                    <input name="input-product-image" type="file" accept="image/*" multiple="false" onchange="addProductImage(this.files[0])">
                                    Thêm hình ảnh mới
                                </div>
                                <div class="option rem-img" onclick="removeProductImage(this)">
                                    Xóa hình đã chọn
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-tab add-products-tab hidden">
                <div class="title">
                    
                </div>
                <div class="tab-content-wrapper">

                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>