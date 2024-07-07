const container = document.querySelector('#container');
const inputId = document.querySelector('#id');
const inputCategory = document.querySelector('#category');
const inputSubcat = document.querySelector('#subcategory');
const inputSize = document.querySelector('#size');
const inputPrice = document.querySelector('#price');

const endpoint = 'https://iraya.site/api/kpop.php';

async function getProduct() {
    const response = await fetch(endpoint);
    const data = await response.json();

    container.innerHTML = '';

    for (const item of data) {
        const row = document.createElement('tr');
        const editButton = getEditButton(item);
        const deleteButton = getDeleteButton(item);

        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.category}</td>
            <td>${item.subcat}</td>
            <td>${item.size}</td>
            <td>${item.price}</td>`;

        row.append(editButton);
        row.append(deleteButton);
        container.append(row);
    }

    setInputs();
}

async function insertProduct() {
    const options = {
        method: 'POST',
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        },
        body: `category=${inputCategory.value}&\
            subcategory=${inputSubcat.value}&\
            size=${inputSize.value}&\
            price=${inputPrice.value}`
    };

    const response = await fetch(endpoint, options);
    const data = await response.text();

    getProduct();
}

async function updateProduct() {
    const options = {
        method: 'PATCH',
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        },
        body: `id=${inputId.value}&\
            category=${inputCategory.value}&\
            subcategory=${inputSubcat.value}&\
            size=${inputSize.value}&\
            price=${inputPrice.value}`
    };

    const response = await fetch(endpoint, options);
    const data = await response.text();

    getProduct();
}

async function deleteProduct(id) {
    const options = {
        method: 'DELETE',
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        },
        body: `id=${id}`
    };

    const response = await fetch(endpoint, options);
    const data = await response.text();

    getProduct();
}

function getDeleteButton(item) {
    const cell = document.createElement('td');
    const button = document.createElement('button');

    button.addEventListener('click', deleteProduct.bind(null, item.id));

    button.textContent = 'Delete';
    cell.append(button);
    return cell;
}

function getEditButton(item) {
    const cell = document.createElement('td');
    const button = document.createElement('button');

    button.addEventListener('click', setInputs.bind(null, item.id, 
      item.category, item.subcategory, item.size, item.price));

    button.textContent = 'Edit';
    cell.append(button);

    return cell;
}

function setInputs(id, category, subcategory, size, price) {
    inputId.value = id ?? '';
    inputCategory.value = category ?? '';
    inputSubcat.value = subcategory ?? '';
    inputSize.value =  size ?? '';
    inputPrice.value = price ?? '';
}

getProduct();