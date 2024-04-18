<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/input-components.css">
<script src="../Public/scripts/components/validate.min.js"></script>
<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/components/globals.js"></script>
<div class="tab">
    <div class="tab-header">
        <div class="menu-options-wrapper no-user-select header-options">
            <div class="title">
                Chức năng
            </div>
            <div class="option selected" panel="product-info-tab" onclick="showInfoTab(this)">
                Thông tin sản phẩm
            </div>
            <div class="option" panel="add-products-tab" onclick="showInfoTab(this)">
                Thêm sản phẩm mới
            </div>
        </div>
        <div class="filter-options-wrapper no-user-select header-options">
            <div class="title">
                Phân loại sản phẩm
            </div>
            <div class="option">
                <?php 
                    $searchParams = [];
                    if(isset($data["URLParams"]["categories"])){
                        $searchParams = explode(",",$data["URLParams"]["categories"]);
                    }
                ?>
                <select onchange="setFilter('categories',`${this.value}`)">
                    <option value="">Tất cả</option>
                    <?php foreach($data["CategoryList"] as $category): ?>
                        <option value="<?= $category["category_id"] ?>" <?php if(in_array($category["category_id"],$searchParams))echo("selected")?>><?= $category["category_name"] ?></option>
                    <?php endforeach; ?>
                </select>
                <?php 
                    unset($searchParams);
                ?>
            </div>
            <div class="option">
                <?php 
                    $searchParams = [];
                    if(isset($data["URLParams"]["brands"])){
                        $searchParams = explode(",",$data["URLParams"]["brands"]);
                    }
                ?>
                <select onchange="setFilter('brands',`${this.value}`)">
                    <option value="">Tất cả</option>
                    <?php foreach($data["BrandList"] as $brand): ?>
                        <option value="<?= $brand["brand_id"] ?>" <?php if(in_array($brand["brand_id"],$searchParams))echo("selected")?>><?= $brand["brand_name"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <?php 
                    unset($searchParams);
                ?>
            </div>
        </div>
        <div class="header-search-bar no-user-select header-options">
            <div class="title">
                Tìm kiếm sản phẩm
            </div>
            <input type="text" name="" id="">
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
            </div>
            <div class="product-list">
                <?php foreach($data["ProductList"]["ProductList"] as $product): ?>
                <div class="product-item row-element-display" onclick="fillSelectedData(this)">
                    <div class="row-element" attrib="product_id" value="<?= $product["product_id"]?>">
                        <?= $product["product_id"] ?>
                    </div>
                    <div class="row-element" attrib="product_name"value="<?= $product["product_name"]?>">
                        <?= $product["product_name"] ?>
                    </div>
                    <div class="row-element" attrib="category_name" value="<?= $product["category_id"]?>">
                        <?= $product["category_name"] ?>
                    </div>
                    <div class="row-element" attrib="price" value="<?= $product["price"]?>">
                        <?= number_format($product["price"], 0, '.', ',') ?>₫
                    </div>
                    <div class="row-element" attrib="brand_name" value="<?= $product["brand_id"] ?>">
                        <?= $product["brand_name"] ?>
                    </div>
                    <div class="hidden">
                        <?php 
                            $thumbnail = $product["thumbnail"];
                            if($thumbnail==""){
                                $thumbnail = "_common/no-image.jpg";
                            }
                        ?>
                        <span attrib="thumbnail" value="../Public/img/products/<?= $thumbnail?>"></span>
                        <?php 
                            unset($thumbnail);
                        ?>
                        <span attrib="average_rating" value="<?= $product["average_rating"]?>"></span>
                        <span attrib="guarantee" value="<?= $product["guarantee"]?>"></span>
                        <span attrib="description" value="<?= $product["description"]?>"></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="info-tab-list">
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
                            Thông tin sản phẩm
                        </div>
                        <div class="option" panel="sku-panel" onclick="showInfoPanel(this)">
                            Các đơn vị lưu
                        </div>
                    </div>
                    <div class="tab-content-wrapper">
                        <div class="info-tab-content info-panel">
                            <div class="product-img-wrapper">
                                    <img src="../Public/img/products/_common/not-found.png" alt="" srcset="">
                                    <div class="img-input-overlay">
                                        <div class="overlay-message">
                                            Đổi
                                        </div>
                                        <input name="input-thumbnail" type="file" accept="image/*" multiple="false" onchange="changeImageInput(this.parentElement.parentElement); enableEdit()">
                                    </div>
                            </div>
                            
                            <div class="product-info-wrapper">
                                <div class="c-input" id="input-product-name">
                                    <div class="input-error-message">
                                    </div>    
                                    <div class="input-wrapper">
                                        <div class="input-label-wrapper">
                                            <label>Tên sản phẩm</label>
                                        </div>
                                        <textarea autocomplete="off" class="input" name="input-product-name" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()" onchange="enableEdit()"></textarea>
                                    </div>
                                </div>
                                <div class="c-input" id="input-description">
                                    <div class="input-error-message">
                                    </div>    
                                    <div class="input-wrapper">
                                        <div class="input-label-wrapper">
                                            <label>Mô tả</label>
                                        </div>
                                        <textarea autocomplete="off" class="input"  name="input-description" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()" onchange="enableEdit()"></textarea>
                                    </div>
                                </div>
                                <div class="c-input" id="input-category-id">
                                    <div class="input-error-message">
                                    </div>    
                                    <div class="input-wrapper">
                                        <div class="input-label-wrapper">
                                            <label>Loại</label>
                                        </div>
                                        <select class="input"  onclick="(new InputElement(this.parentElement.parentElement)).hideError()" onchange="enableEdit()">
                                            <?php foreach($data["CategoryList"] as $category): ?>
                                                <option value="<?= $category["category_id"]?>"><?= $category["category_name"]?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="c-input" id="input-brand-id">
                                    <div class="input-error-message">
                                    </div>    
                                    <div class="input-wrapper">
                                        <div class="input-label-wrapper">
                                            <label>Hãng</label>
                                        </div>
                                        <select class="input"  onclick="(new InputElement(this.parentElement.parentElement)).hideError()" onchange="enableEdit()">
                                            <?php foreach($data["BrandList"] as $brand): ?>
                                                <option value="<?= $brand["brand_id"]?>"><?= $brand["brand_name"]?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="c-input" id="input-price">
                                    <div class="input-error-message">
                                    </div>    
                                    <div class="input-wrapper">
                                        <div class="input-label-wrapper">
                                            <label>Giá</label>
                                        </div>                                
                                        <input autocomplete="off" class="input"  name="input-price" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()" onblur="if (formatPrice(this))enableEdit()">
                                    </div>
                                </div>
                                <div class="c-input" id="input-guarantee">
                                    <div class="input-error-message">
                                    </div>    
                                    <div class="input-wrapper">
                                        <div class="input-label-wrapper">
                                            <label>Bảo hành</label>
                                        </div>                                
                                        <input autocomplete="off" class="input"  name="input-guarantee" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()" onblur="if(formatGuarantee(this)) enableEdit()">
                                    </div>
                                </div>
                            </div>
                            
        
                            <div class="bottom-options no-user-select">
                                <div id="edit-product-button" class="option disabled" onclick="editProduct(this)">
                                    Lưu thay đổi
                                </div>
                                <div id="cancel-edit-button" class="option disabled" onclick="removeChange()">
                                    Hủy thay đổi
                                </div>
                                <div id="remove-product-button" class="option" onclick="removeProduct(this)">
                                    Xóa sản phẩm
                                </div>
                            </div>
                        </div>
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
                    </div>
                </div>
            </div>
            <div class="info-tab add-products-tab hidden">
                <div class="title">
                    Thêm sản phẩm
                </div>
                <div class="tab-content-wrapper">
                    <div class="info-tab-content info-panel">
                        <div class="product-img-wrapper">
                                <img src="../Public/img/products/_common/not-found.png" alt="" srcset="">
                                <div class="img-input-overlay">
                                    <div class="overlay-message">
                                        Chọn hình ảnh
                                    </div>
                                    <input name="input-thumbnail" type="file" accept="image/*" multiple="false" onchange="changeImageInput(this.parentElement.parentElement)">
                                </div>
                        </div>
                        
                        <div class="product-info-wrapper">
                            <div class="c-input" id="input-product-name">
                                <div class="input-error-message">
                                </div>    
                                <div class="input-wrapper">
                                    <div class="input-label-wrapper">
                                        <label>Tên sản phẩm</label>
                                    </div>
                                    <textarea autocomplete="off" class="input" name="input-product-name" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()"></textarea>
                                </div>
                            </div>
                            <div class="c-input" id="input-description">
                                <div class="input-error-message">
                                </div>    
                                <div class="input-wrapper">
                                    <div class="input-label-wrapper">
                                        <label>Mô tả</label>
                                    </div>
                                    <textarea autocomplete="off" class="input" name="input-description" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()"></textarea>
                                </div>
                            </div>
                            <div class="c-input" id="input-category-id">
                                <div class="input-error-message">
                                </div>    
                                <div class="input-wrapper">
                                    <div class="input-label-wrapper">
                                        <label>Loại</label>
                                    </div>
                                    <select class="input" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                        <?php foreach($data["CategoryList"] as $category): ?>
                                            <option value="<?= $category["category_id"]?>"><?= $category["category_name"]?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="c-input" id="input-brand-id">
                                <div class="input-error-message">
                                </div>    
                                <div class="input-wrapper">
                                    <div class="input-label-wrapper">
                                        <label>Hãng</label>
                                    </div>
                                    <select class="input" onclick="(new InputElement(this.parentElement.parentElement)).hideError()">
                                        <?php foreach($data["BrandList"] as $brand): ?>
                                            <option value="<?= $brand["brand_id"]?>"><?= $brand["brand_name"]?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="c-input" id="input-price">
                                <div class="input-error-message">
                                </div>    
                                <div class="input-wrapper">
                                    <div class="input-label-wrapper">
                                        <label>Giá</label>
                                    </div>                                
                                    <input autocomplete="off" class="input" name="input-price" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()" onblur="formatPrice2(this)">
                                </div>
                            </div>
                            <div class="c-input" id="input-guarantee">
                                <div class="input-error-message">
                                </div>    
                                <div class="input-wrapper">
                                    <div class="input-label-wrapper">
                                        <label>Bảo hành</label>
                                    </div>                                
                                    <input autocomplete="off" class="input" name="input-guarantee" type="text" placeholder="" onclick="(new InputElement(this.parentElement.parentElement)).hideError()" onblur="formatGuarantee2(this)">
                                </div>
                            </div>
                        </div>
                        
    
                        <div class="bottom-options no-user-select">
                            <div id="edit-product-button" class="option" onclick="addProduct(this)">
                                Thêm
                            </div>
                            <div id="cancel-edit-button" class="option" onclick="clearAddProductFormInfo()">
                                Xóa thông tin
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>