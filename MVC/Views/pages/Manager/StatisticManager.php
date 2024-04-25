<div class="top-bar-buttons">
    <button class="export-statistic active">Hàng đã xuất</button>
    <button class="import-statistic">Hàng đã nhập</button>
    <button class="profit-statistic">Lợi nhuận</button>
    <button class="salary-statistic">Lương</button>
</div>
<div class="filter-chart">
    <label for="">Tháng</label>
    <input type="radio" name="option" id="" checked style="margin-left: 5px">
    <div class="ml-mr-20"></div>
    <label for="">Quý</label>
    <input type="radio" name="option" id=""style="margin-left: 5px">
    <div class="ml-mr-20"></div>
    <label for="">Năm:</label>
    <select name="" id="">
        <option value="">2024</option>
    </select>
</div>
<div class="mt-mb-20"></div>
<div class="chart-container export-chart" style="position: relative; height: 50vh; width: 100vw">
    <canvas id="export"></canvas>
    <button id="download-export-chart">Xuất PDF</button>
</div>
<div class="chart-container import-chart hide" style="position: relative; height: 50vh; width: 100vw">
    <canvas id="import"></canvas>
    <button id="download-import-chart">Xuất PDF</button>
</div>
<div class="chart-container profit-chart hide" style="position: relative; height: 50vh; width: 100vw">
    <canvas id="profit"></canvas>
    <button id="download-profit-chart">Xuất PDF</button>
</div>
<div class="chart-container salary-chart hide" style="position: relative; height: 50vh; width: 100vw">
    <canvas id="salary"></canvas>
    <button id="download-salary-chart">Xuất PDF</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
