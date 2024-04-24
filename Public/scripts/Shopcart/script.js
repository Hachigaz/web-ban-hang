// var variableValue =0; // Giả sử giá trị của biến là 100
// document.querySelector('.value-temp-money').textContent = variableValue + 'đ';
// // Gio hang trong
// // function toggleNoItemVisibility() {
// //     var noItemDiv = document.getElementById('no-item');
// //     var leftSection = document.querySelector('.cart-content');

// //     if (leftSection.innerHTML.trim() !== '') {
// //         noItemDiv.style.display = 'none';
// //     } else {
// //         noItemDiv.style.display = 'block';
// //     }
// // }
// // Tính giá trị của value-total-money
// document.querySelector('.value-total-money').textContent = '0đ (10% Thuế VAT)';
// //Lưu trường input
// function calculateAndUpdateTotal(price, input) {
//     var totalSpan = input.parentElement.nextElementSibling;
//     var inputValue = parseInt(input.value);
//     var total = price * inputValue;
//     totalSpan.textContent = Math.floor(total); // Chuyển giá trị thành số nguyên

//     // Save the calculated total to localStorage
//     localStorage.setItem(input.id + '-total', total);

//     // Update value-temp-money with the sum of all totals
//     updateTotalMoney();
// }

// function updateTotalMoney() {
//     var totalSpans = document.querySelectorAll('.product-in-cart span[id^="total-"]');
//     var sum = 0;
//     totalSpans.forEach(function(totalSpan) {
//         sum += parseInt(totalSpan.textContent); // Chuyển giá trị thành số nguyên và cộng dồn
//     });

//     var tempMoney = document.querySelector('.value-temp-money');
//     tempMoney.textContent = Math.floor(sum) + "đ"; // Hiển thị giá trị là số nguyên

//     // Update value-total-money
//     var valueTotalMoney = document.querySelector('.value-total-money');
//     valueTotalMoney.textContent = Math.floor(sum * 1.1) + "đ (10% Thuế VAT)"; // Hiển thị giá trị là số nguyên

//     // Save value-total-money to localStorage
//     localStorage.setItem('valueTotalMoney', Math.floor(sum * 1.1) + "đ");
// }

// function saveInputValue(input) {
//     var inputValue = input.value;
//     var inputId = input.id;
//     localStorage.setItem(inputId, inputValue);
//     console.log("Saved input value:", inputId, inputValue);
// }

// function restoreInputValue(input) {
//     var inputId = input.id;
//     var savedValue = localStorage.getItem(inputId);
//     if (savedValue !== null) {
//         // Parse the saved value as an integer
//         var parsedValue = parseInt(savedValue);
//         if (!isNaN(parsedValue)) {
//             input.value = parsedValue; // Update input value if it's a valid number
//             console.log("Restored input value:", inputId, parsedValue);
//         } else {
//             console.error("Invalid saved value for input:", inputId, savedValue);
//         }
//     }
// }

// function addContent(element) {
//     var productId = element.getAttribute('data-product-id');
//     var productName = element.getAttribute('data-product-name');

//     var productPrice = parseFloat(element.getAttribute('data-product-price'));

//     var existingDiv = document.getElementById('product-in-cart-' + productId);
//     if (existingDiv) {
//         // Update existing content
//         var moneyElement = existingDiv.querySelector('#money-' + productId);
//         if (moneyElement) {
//             moneyElement.textContent = productPrice;
//             calculateAndUpdateTotal(productPrice, existingDiv.querySelector('input'));
//         }
//     } else {
//         // Create new content
//         var newDiv = document.createElement('div');
//         newDiv.classList.add('product-in-cart');
//         newDiv.id = 'product-in-cart-' + productId;
//         var leftSection = document.querySelector('.left-section');
//         leftSection.appendChild(newDiv);
        
//         var checkbox = document.createElement('input');
//         checkbox.type = 'checkbox';
//         checkbox.checked = true; // Đặt trạng thái mặc định của checkbox là checked

// // Thêm checkbox vào trước nameSpan
//         newDiv.appendChild(checkbox);
        
//         var nameSpan = document.createElement('span');
//         nameSpan.textContent = productName;
//         newDiv.appendChild(nameSpan);
        
//         var moneySpan = document.createElement('span');
//         moneySpan.id = 'money-' + productId;
//         moneySpan.textContent = productPrice;
//         newDiv.appendChild(moneySpan);
        
//         var numberDiv = document.createElement('div');
//         numberDiv.id = 'number-' + productId;
//         newDiv.appendChild(numberDiv);

//         var buttonLeft = document.createElement('button');
//         buttonLeft.textContent = '-';
//         buttonLeft.addEventListener('click', function() {
//             var input = document.getElementById('input-' + productId);
//             var inputNumber = parseInt(input.value);
//             if (inputNumber > 1) {
//                 inputNumber--;
//                 input.value = inputNumber;
//                 calculateAndUpdateTotal(productPrice, input);
//                 updateTotalMoney();
//                 saveInputValue(input); // Save input value when changed
//             }
//         });
//         numberDiv.appendChild(buttonLeft);

//         var input = document.createElement('input');
//         input.type = 'text';
//         input.value = '1';
//         input.id = 'input-' + productId;
//         input.addEventListener('change', function() {
//             var inputValue = parseInt(input.value);
//             if (isNaN(inputValue) || inputValue < 1) {
//                 input.value = '1';
//             }
//             calculateAndUpdateTotal(productPrice, input);
//             updateTotalMoney();

//             saveInputValue(input); // Save input value when changed
//         });
//         numberDiv.appendChild(input);

//         var buttonRight = document.createElement('button');
//         buttonRight.textContent = '+';
//         buttonRight.addEventListener('click', function() {
//             var input = document.getElementById('input-' + productId);
//             var inputNumber = parseInt(input.value);
//             inputNumber++;
//             input.value = inputNumber;
//             calculateAndUpdateTotal(productPrice, input);
//             saveInputValue(input); // Save input value when changed
//         });
//         numberDiv.appendChild(buttonRight);

//         var totalSpan = document.createElement('span');
//         totalSpan.id = 'total-' + productId;
//         totalSpan.textContent = productPrice;
//         newDiv.appendChild(totalSpan);
//     }

//     toggleNoItemVisibility();

//     var leftSectionContent = document.querySelector('.left-section').innerHTML;
//     localStorage.setItem('leftSectionContent', leftSectionContent);
//     var input = document.getElementById('input-' + productId);
//     calculateAndUpdateTotal(productPrice, input);
//     updateTotalMoney();
// }


// var resetButton = document.getElementById('reset-button');

// // resetButton.addEventListener('click', function() {
// //     var leftSection = document.querySelector('.cart-content');
// //     leftSection.innerHTML = '';
// //     toggleNoItemVisibility();
// //     localStorage.removeItem('leftSectionContent');

// //     // Update value-temp-money and value-total-money
// //     updateTotalMoney();
// // });
// function restoreLeftSectionContent() {
//     var leftSectionContent = localStorage.getItem('leftSectionContent');
//     if (leftSectionContent) {
//         var leftSection = document.querySelector('.left-section');
//         leftSection.innerHTML = leftSectionContent;
//         toggleNoItemVisibility();
//         leftSection.querySelectorAll('.product-in-cart input').forEach(function(input) {
//             var total = localStorage.getItem(input.id + '-total');
//             if (total) {
//                 var totalSpan = input.parentElement.nextElementSibling;
//                 totalSpan.textContent = total;
//             }
//         });
//         // Reassign event listeners for - and + buttons
//         leftSection.querySelectorAll('.product-in-cart button').forEach(function(button) {
//             var productId = button.parentElement.parentElement.id.split('-')[3]; // Extract product ID from parent div ID
//             var productPrice = parseFloat(document.getElementById('money-' + productId).textContent);

//             if (button.textContent === '-') {
//                 button.addEventListener('click', function() {
//                     var input = document.getElementById('input-' + productId);
//                     var inputNumber = parseInt(input.value);
//                     if (inputNumber > 1) {
//                         inputNumber--;
//                         input.value = inputNumber;
//                         calculateAndUpdateTotal(productPrice, input);
//                         updateTotalMoney();
//                         saveInputValue(input); // Save input value when changed
//                     }
//                 });
//             } else if (button.textContent === '+') {
//                 button.addEventListener('click', function() {
//                     var input = document.getElementById('input-' + productId);
//                     var inputNumber = parseInt(input.value);
//                     inputNumber++;
//                     input.value = inputNumber;
//                     calculateAndUpdateTotal(productPrice, input);
//                     updateTotalMoney();
//                     saveInputValue(input); // Save input value when changed
//                 });
//             }
//         });
//     }
//     updateTotalMoney();
// }

// document.addEventListener('click', function(event) {
//     var target = event.target;
//     if (target.classList.contains('product-item')) {
//         addContent(target);
//     }
// });