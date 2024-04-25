// const { default: jsPDF } = require("jspdf");

const salaryChart = document.getElementById("salary");
const exportChart = document.getElementById("export");
const importChart = document.getElementById("import");
const profitChart = document.getElementById("profit");
const salaryConfig = {
    type: "bar",
    data: {
        labels: [
            "Tháng 1",
            "Tháng 2",
            "Tháng 3",
            "Tháng 4",
            "Tháng 5",
            "Tháng 6",
            "Tháng 7",
            "Tháng 8",
            "Tháng 9",
            "Tháng 10",
            "Tháng 11",
            "Tháng 12",
        ],
        datasets: [
            {
                label: "Tổng lương",
                data: [
                    20000000, 260000000, 150000000, 100000000, 180000000, 190000000,
                    220000000, 190000000, 170000000, 200000000, 230000000, 160000000,
                    220000000,
                ],
                backgroundColor: ["rgba(255, 99, 132)"],
                borderWidth: 2,
            },
        ],
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: "Biểu đồ tổng lương trả cho của tất cả nhân viên qua các tháng trong năm 2024",
                font: {
                    size: 20,
                },
            },
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
}
var salaryChartEntity = new Chart(salaryChart, salaryConfig);


var downloadSalaryChartJs = () => {
    html2canvas(document.getElementById("salary")).then((canvas) => {
        var img = canvas.toDataURL(); //image data of canvas
        var doc = new jsPDF("l", "mm", "a4");

        doc.addImage(img, "PNG", 30, 10);
        doc.save("salary_statistic.pdf");
    });
};
document.getElementById("download-salary-chart").addEventListener("click", downloadSalaryChartJs);

// Profit
const profitConfig = {
    type: "bar",
    data: {
        labels: [
            "Tháng 1",
            "Tháng 2",
            "Tháng 3",
            "Tháng 4",
            "Tháng 5",
            "Tháng 6",
            "Tháng 7",
            "Tháng 8",
            "Tháng 9",
            "Tháng 10",
            "Tháng 11",
            "Tháng 12",
        ],
        datasets: [
            {
                label: "Tổng lợi nhuận",
                data: [
                    14000000, 16000000, 15000000, 10000000, 18000000, 19000000,
                    22000000, 19000000, 12000000, 20000000, 23000000, 36000000,
                    25000000,
                ],
                backgroundColor: ["rgba(255, 99, 132)"],
                borderWidth: 2,
            },
        ],
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: "Biểu đồ tổng lợi nhuận thu được qua các tháng trong năm 2024",
                font: {
                    size: 20,
                },
            },
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
}
var profitChartEntity = new Chart(profitChart, profitConfig);


var downloadProfitChartJs = () => {
    html2canvas(document.getElementById("profit")).then((canvas) => {
        var img = canvas.toDataURL(); //image data of canvas
        var doc = new jsPDF("l", "mm", "a4");

        doc.addImage(img, "PNG", 30, 10);
        doc.save("profit_statistic.pdf");
    });
};
document.getElementById("download-profit-chart").addEventListener("click", downloadProfitChartJs);


// Export
const exportData = {
    labels: [
        "Tháng 1",
        "Tháng 2",
        "Tháng 3",
        "Tháng 4",
        "Tháng 5",
        "Tháng 6",
        "Tháng 7",
        "Tháng 8",
        "Tháng 9",
        "Tháng 10",
        "Tháng 11",
        "Tháng 12",
    ],
    datasets: [
        {
            label: "Số lượng sản phẩm bán ra",
            data: [65, 59, 80, 81, 56, 55, 20, 65, 59, 90, 81, 56, 55],
            fill: false,
            borderColor: "rgb(75, 192, 192)",
            tension: 0.1,
        },
    ],
};
const exportConfig = {
    type: "line",
    data: exportData,
    options: {
        plugins: {
            title: {
                display: true,
                text: "Biểu đồ số lượng sản phẩm bán ra hàng tháng trong năm 2024",
                font: {
                    size: 20,
                    color: 'blue',
                },
            },
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
};

var exportChartEntity = new Chart(exportChart ,exportConfig);
var downloadExportChartJs = () => {
    html2canvas(document.getElementById("export")).then((canvas) => {
        var img = canvas.toDataURL(); //image data of canvas
        var doc = new jsPDF("l", "mm", "a4");

        doc.addImage(img, "PNG", 30, 10);
        doc.save("export_statistic.pdf");
    });
};
document.getElementById("download-export-chart").addEventListener("click", downloadExportChartJs);

// Import
const importData = {
    labels: [
        "Tháng 1",
        "Tháng 2",
        "Tháng 3",
        "Tháng 4",
        "Tháng 5",
        "Tháng 6",
        "Tháng 7",
        "Tháng 8",
        "Tháng 9",
        "Tháng 10",
        "Tháng 11",
        "Tháng 12",
    ],
    datasets: [
        {
            label: "Số lượng sản phẩm nhập vào",
            data: [65, 50, 80, 60, 101, 85, 50, 65, 59, 90, 20, 51, 32],
            fill: false,
            borderColor: "rgb(75, 192, 192)",
            tension: 0.1,
        },
    ],
};
const importConfig = {
    type: "line",
    data: importData,
    options: {
        plugins: {
            title: {
                display: true,
                text: "Biểu đồ số lượng sản phẩm nhập vào hàng tháng trong năm 2024",
                font: {
                    size: 20,
                    color: 'blue',
                },
            },
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
};

var importChartEntity = new Chart(importChart ,importConfig);
var downloadImportChartJs = () => {
    html2canvas(document.getElementById("import")).then((canvas) => {
        var img = canvas.toDataURL(); //image data of canvas
        var doc = new jsPDF("l", "mm", "a4");

        doc.addImage(img, "PNG", 30, 10);
        doc.save("import_statistic.pdf");
    });
};
document.getElementById("download-import-chart").addEventListener("click", downloadExportChartJs);

// Buttons 
const exportChartElement = document.querySelector(".chart-container.export-chart");
const importChartElement = document.querySelector(".chart-container.import-chart");
const salaryChartElement = document.querySelector(".chart-container.salary-chart");
const profitChartElement = document.querySelector(".chart-container.profit-chart");
var buttons = document.querySelectorAll(".top-bar-buttons button");
var charts = document.querySelectorAll(".chart-container");
[...buttons].forEach((button) => {
    button.addEventListener("click", function(){
        [...charts].forEach((chart) => {
            chart.classList.add("hide");
        });
        if(button.className == "export-statistic"){
            if(exportChartEntity){
                exportChartEntity.destroy();
                exportChartEntity = new Chart(exportChart ,exportConfig);
            }
            exportChartElement.classList.remove("hide");
        }
        if(button.className == "import-statistic"){
            if(importChartEntity){
                importChartEntity.destroy();
                importChartEntity = new Chart(importChart ,importConfig);
            }
            importChartElement.classList.remove("hide");
        }
        if(button.className == "profit-statistic"){
            if(profitChartEntity){
                profitChartEntity.destroy();
                profitChartEntity = new Chart(profitChart ,profitConfig);
            }
            profitChartElement.classList.remove("hide");
        }
        if(button.className == "salary-statistic"){
            if(salaryChartEntity){
                salaryChartEntity.destroy();
                salaryChartEntity = new Chart(salaryChart ,salaryConfig);
            }
            salaryChartElement.classList.remove("hide");
        }
        [...buttons].forEach((button) => {
            button.classList.remove("active");
        });
        this.classList.add("active");
    });
})