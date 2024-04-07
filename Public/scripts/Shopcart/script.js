var variableValue =0; // Giả sử giá trị của biến là 100
document.querySelector('.value-temp-money').textContent = variableValue + 'đ';

// Tính giá trị của value-total-money
var totalValue = variableValue * 0.1 +variableValue; // 110% của giá trị biến
document.querySelector('.value-total-money').textContent = totalValue + 'đ (10% Thuế VAT)';
//Lưu trường input
function saveInputValue(input) {
    var inputValue = input.value;
    var inputId = input.id;
    localStorage.setItem(inputId, inputValue);
    console.log("Saved input value:", inputId, inputValue);
}

function restoreInputValue(input) {
    var inputId = input.id;
    var savedValue = localStorage.getItem(inputId);
    if (savedValue !== null) {
        input.value = savedValue;
        console.log("Restored input value:", inputId, savedValue);
    }
}

// Gio hang trong
function toggleNoItemVisibility() {
    var noItemDiv = document.getElementById('no-item');
    var leftSection = document.querySelector('.left-section');

    if (leftSection.innerHTML.trim() !== '') {
        noItemDiv.style.display = 'none';
    } else {
        noItemDiv.style.display = 'block';
    }
}

function calculateAndUpdateTotal(price, input) {
    var totalSpan = input.parentElement.nextElementSibling;
    var inputValue = parseInt(input.value);
    var total = price * inputValue;
    totalSpan.textContent = total;
}

function addContent(element) {
    var productId = element.getAttribute('data-product-id');
    var productPrice = parseFloat(element.getAttribute('data-product-price'));

    var existingDiv = document.getElementById('product-in-cart-' + productId);
    if (existingDiv) {
        // Update existing content
        var moneyElement = existingDiv.querySelector('#money-' + productId);
        if (moneyElement) {
            moneyElement.textContent = productPrice;
            calculateAndUpdateTotal(productPrice, existingDiv.querySelector('input'));
        }
    } else {
        // Create new content
        var newDiv = document.createElement('div');
        newDiv.classList.add('product-in-cart');
        newDiv.id = 'product-in-cart-' + productId;
        var leftSection = document.querySelector('.left-section');
        leftSection.appendChild(newDiv);
        
        var idSpan = document.createElement('span');
        idSpan.textContent = productId;
        newDiv.appendChild(idSpan);
        
        var moneySpan = document.createElement('span');
        moneySpan.id = 'money-' + productId;
        moneySpan.textContent = productPrice;
        newDiv.appendChild(moneySpan);
        
        var numberDiv = document.createElement('div');
        numberDiv.id = 'number-' + productId;
        newDiv.appendChild(numberDiv);

        var buttonLeft = document.createElement('button');
        buttonLeft.textContent = '-';
        buttonLeft.addEventListener('click', function() {
            var input = document.getElementById('input-' + productId);
            var inputNumber = parseInt(input.value);
            if (inputNumber > 1) {
                inputNumber--;
                input.value = inputNumber;
                calculateAndUpdateTotal(productPrice, input);
                saveInputValue(input); // Save input value when changed
            }
        });
        numberDiv.appendChild(buttonLeft);

        var input = document.createElement('input');
        input.type = 'text';
        input.value = '1';
        input.id = 'input-' + productId;
        input.addEventListener('change', function() {
            var inputValue = parseInt(input.value);
            if (isNaN(inputValue) || inputValue < 1) {
                input.value = '1';
            }
            calculateAndUpdateTotal(productPrice, input);
            saveInputValue(input); // Save input value when changed
        });
        numberDiv.appendChild(input);

        var buttonRight = document.createElement('button');
        buttonRight.textContent = '+';
        buttonRight.addEventListener('click', function() {
            var input = document.getElementById('input-' + productId);
            var inputNumber = parseInt(input.value);
            inputNumber++;
            input.value = inputNumber;
            calculateAndUpdateTotal(productPrice, input);
            saveInputValue(input); // Save input value when changed
        });
        numberDiv.appendChild(buttonRight);

        var totalSpan = document.createElement('span');
        totalSpan.id = 'total-' + productId;
        totalSpan.textContent = productPrice;
        newDiv.appendChild(totalSpan);
    }

    toggleNoItemVisibility();

    var leftSectionContent = document.querySelector('.left-section').innerHTML;
    localStorage.setItem('leftSectionContent', leftSectionContent);
}


var resetButton = document.getElementById('reset-button');

resetButton.addEventListener('click', function() {
    var leftSection = document.querySelector('.left-section');
    leftSection.innerHTML = '';
    toggleNoItemVisibility();
    localStorage.removeItem('leftSectionContent');
});
function restoreLeftSectionContent() {
    var leftSectionContent = localStorage.getItem('leftSectionContent');
    if (leftSectionContent) {
        var leftSection = document.querySelector('.left-section');
        leftSection.innerHTML = leftSectionContent;
        toggleNoItemVisibility();
    }
}
restoreLeftSectionContent();
document.addEventListener('click', function(event) {
    var target = event.target;
    if (target.classList.contains('product-item')) {
        addContent(target);
    }
});