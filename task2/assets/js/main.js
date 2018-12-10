function $(id) {
    return document.getElementById(id);
}

function addHeader(i) {
    var head = $('b-table-headers');
    var newNode = document.createElement('th');
    var newContent = document.createTextNode(i + ' instalment');
    newNode.appendChild(newContent);
    head.appendChild(newNode);
}

function addData(index, list, content) {
    var newNode = document.createElement('td');
    var newContent = document.createTextNode(content);
    newNode.appendChild(newContent);
    list[index].appendChild(newNode);
}

function makeTable(response) {
    var new_cln = cln.cloneNode(true);
    $('b-table-container').appendChild(new_cln);

    var taxHolder = $('s-tax-holder');
    var newContent = document.createTextNode(tax.value + '%');
    taxHolder.appendChild(newContent);

    var tbodyList = document.querySelectorAll('#b-table-container table tbody tr');
    addData(0, tbodyList, response.value);
    addData(1, tbodyList, response.base_price);
    addData(2, tbodyList, response.commission);
    addData(3, tbodyList, response.tax);
    addData(4, tbodyList, response.total);

    if (response.payments.length > 0) {
        for (var i = 0; i < response.payments.length; i++) {
            addHeader(i+1);

            addData(0, tbodyList, '');
            addData(1, tbodyList, response.payments[i].base_price);
            addData(2, tbodyList, response.payments[i].commission);
            addData(3, tbodyList, response.payments[i].tax);
            addData(4, tbodyList, response.payments[i].total);
        }
    }
}

function destroyTable() {
    var table = $('b-table');
    table.parentNode.removeChild(table);
}

var cln = $('b-table').cloneNode(true);
destroyTable();

// Set up HTTP request
var xhr = new XMLHttpRequest();

xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
        makeTable(JSON.parse(xhr.response));
        var form = $('b-insurance-form');
        form.style.display = 'none';
        var blockTable = $('b-table-container');
        blockTable.style.display = 'block';
    } else {
        alert('The request failed!');
        console.log('The request failed!');
    }
};

var form = $('b-insurance-form');
var button = form.getElementsByClassName('btn')[0];
var estimatedValue = $('estimatedValue');
var tax = $('tax');
var instalments = $('instalments');

button.onclick = function() {
    xhr.open('POST', '/backend.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('est=' + estimatedValue.value + '&tax=' + tax.value + '&instalments=' + instalments.value);
    return false;
};

$('back-button').onclick = function () {
    destroyTable();

    var blockTable = $('b-table-container');
    blockTable.style.display = 'none';
    var form = $('b-insurance-form');
    form.style.display = 'block';
    return false;
};
