<div class="top-bar-buttons">
    <button class="export-statistic active">Hàng đã xuất</button>
    <button class="import-statistic">Hàng đã nhập</button>
    <button class="profit-statistic">Lợi nhuận</button>
    <button class="salary-statistic">Lương</button>
</div>

<div class="mt-mb-20"></div>
<div class="chart-container export-chart" style="position: relative; height: 50vh; width: 100vw">
    <div class="filter-chart filter-chart-export">
        <label for="">Tháng</label>
        <input type="radio" name="option-export" id="month-export" checked style="margin-left: 5px">
        <div class="ml-mr-20"></div>
        <label for="">Quý</label>
        <input type="radio" name="option-export" id="quarter-export" style="margin-left: 5px">
        <div class="ml-mr-20"></div>
        <label for="">Năm:</label>
        <select name="" id="year-export">
            
        </select>
    </div>
    <canvas id="export"></canvas>
    <button id="download-export-chart">Xuất PDF</button>
</div>
<div class="chart-container import-chart hide" style="position: relative; height: 50vh; width: 100vw">
    <div class="filter-chart filter-chart-import">
        <label for="">Tháng</label>
        <input type="radio" name="option-import" id="month-import" checked style="margin-left: 5px">
        <div class="ml-mr-20"></div>
        <label for="">Quý</label>
        <input type="radio" name="option-import" id="quarter-import" style="margin-left: 5px">
        <div class="ml-mr-20"></div>
        <label for="">Năm:</label>
        <select name="" id="year-import">
            
        </select>
    </div>
    <canvas id="import"></canvas>
    <button id="download-import-chart">Xuất PDF</button>
</div>
<div class="chart-container profit-chart hide" style="position: relative; height: 50vh; width: 100vw">
    <div class="filter-chart filter-chart-profit">
        <label for="">Tháng</label>
        <input type="radio" name="option-profit" id="month-profit" style="margin-left: 5px" checked>
        <div class="ml-mr-20"></div>
        <label for="">Quý</label>
        <input type="radio" name="option-profit" id="quarter-profit" style="margin-left: 5px">
        <div class="ml-mr-20"></div>
        <label for="">Năm:</label>
        <select name="" id="year-profit">
            
        </select>
    </div>
    <canvas id="profit"></canvas>
    <button id="download-profit-chart">Xuất PDF</button>
</div>
<div class="chart-container salary-chart hide" style="position: relative; height: 50vh; width: 100vw">
    <div class="filter-chart filter-chart-salary">
        <label for="">Tháng</label>
        <input type="radio" name="option" id="month-salary" checked style="margin-left: 5px">
        <div class="ml-mr-20"></div>
        <label for="">Quý</label>
        <input type="radio" name="option" id="quarter-salary" style="margin-left: 5px">
        <div class="ml-mr-20"></div>
        <label for="">Năm:</label>
        <select name="" id="year-salary">
            
        </select>
    </div>
    <canvas id="salary"></canvas>
    <button id="download-salary-chart">Xuất PDF</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
