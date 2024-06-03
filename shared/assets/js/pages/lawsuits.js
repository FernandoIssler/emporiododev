/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Ecommerce product list Js File
*/


// table-product-list-all
var productListAllData = [
    {
        "id": 1,
        "product": {
            "img": "assets/images/products/img-1.png",
            "title": "0928725-29.2021.8.05.0141",
            "category": "Pedro Santos Souza e outros"
        },
        "stock": "Teste Fernando agora",
        "price": "1320.98",
        "orders": "48",
        "rating": "4.2",
        "published": {
            "publishDate": "10/12/2023",
            "publishTime": "10:05 AM",
        }
    },
    {
        "id": 2,
        "product": {
            "img": "assets/images/products/img-2.png",
            "title": "0167562-10.2023.8.05.0141",
            "category": "Furniture"
        },
        "stock": "Teste Deile vai",
        "price": "160.00",
        "orders": "30",
        "rating": "4.3",
        "published": {
            "publishDate": "11/12/2023",
            "publishTime": "01:31 PM",
            "timestamp": 1
        }
    },
    {
        "id": 3,
        "product": {
            "img": "assets/images/products/img-3.png",
            "title": "350 ml Glass Grocery Container",
            "category": "Grocery"
        },
        "stock": "10",
        "price": "125.00",
        "orders": "48",
        "rating": "4.5",
        "published": {
            "publishDate": "12/11/2023",
            "publishTime": "11:40 AM",
            "timestamp": 2
        }
    }
];

var inputValueJson = sessionStorage.getItem('inputValue');
if (inputValueJson) {
    inputValueJson = JSON.parse(inputValueJson);
    Array.from(inputValueJson).forEach(element => {
        productListAllData.unshift(element);
    });
}

var editinputValueJson = sessionStorage.getItem('editInputValue');
if (editinputValueJson) {
    editinputValueJson = JSON.parse(editinputValueJson);
    productListAllData = productListAllData.map(function (item) {
        if (item.id == editinputValueJson.id) {
            return editinputValueJson;
        }
        return item;
    });
}
document.getElementById("addproduct-btn").addEventListener("click", function () {
    sessionStorage.setItem('editInputValue', "")
})

var productListAll = new gridjs.Grid({
    columns:
        [
            {
                name: '#',
                width: '40px',
                data: (function (row) {
                    return gridjs.html('<div class="form-check checkbox-product-list">\
					<input class="form-check-input" type="checkbox" value="' + row.id + '" id="checkbox-' + row.id + '">\
					<label class="form-check-label" for="checkbox-' + row.id + '"></label>\
				  </div>');
                })
            },
            {
                name: 'Processo',
                width: '360px',
                data: (function (row) {
                    return gridjs.html('<div class="d-flex align-items-center">' +
                        '<div class="flex-shrink-0 me-3">' +
                        '</div>' +
                        '<div class="flex-grow-1">' +
                        '<h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html" class="text-body">' + row.product.title + '</a></h5>' +
                        '<p class="text-muted mb-0">Cliente: <span class="fw-medium">' + row.product.category + '</span></p>' +
                        '<p class="text-muted mb-0">Juízo: <span class="fw-medium">3ª Vara Cível do Juizado Especial de Jequi;e - Bahia</span></p>' +
                        '</div>' +
                        '</div>');
                })
            },
            {
                name: 'Stock',
                hidden: true,
                data: (row) => row.stock
            },
            {
                name: 'Valor',
                width: '101px',
                sort: {
                    compare: (a, b) => {
                        const price = (x) => parseFloat(x.replace(/[^\d,.-]/g, '').replace('.', '').replace(',', '.'));

                        if (price(a) > price(b)) {
                            return 1;
                        } else if (price(b) > price(a)) {
                            return -1;
                        } else {
                            return 0;
                        }
                    }
                },
                data: (row) => Number(row.price).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'})
            },
            {
                name: 'Rating',
                width: '105px',
                formatter: (function (cell) {
                    return gridjs.html('<span class="badge bg-light text-body fs-12 fw-medium"><i class="mdi mdi-star text-warning me-1"></i>' + cell + '</span></td>');
                })
            },
            {
                name: 'Protocolado',
                width: '110px',
                sort: {
                    compare: (a, b) => {
                        const year = (x) => x.split('/').slice(-1)[0]
                        const month = (x) => x.split('/').slice(-2)[0]
                        const day = (x) => x.split('/').slice(-3)[0]

                        const dateA = (new Date(year(a), month(a) - 1, day(a))).getTime()
                        const dateB = (new Date(year(b), month(b) - 1, day(b))).getTime()

                        if (dateA > dateB) {
                            return 1;
                        } else if (dateB > dateA) {
                            return -1;
                        } else {
                            return 0;
                        }
                    }
                },
                data: (row) => row.published.publishDate
            },
            {
                name: 'Última Movimentação',
                width: '110px',
                sort: {
                    compare: (a, b) => {
                        const year = (x) => x.split('/').slice(-1)[0]
                        const month = (x) => x.split('/').slice(-2)[0]
                        const day = (x) => x.split('/').slice(-3)[0]

                        const dateA = (new Date(year(a), month(a) - 1, day(a))).getTime()
                        const dateB = (new Date(year(b), month(b) - 1, day(b))).getTime()

                        if (dateA > dateB) {
                            return 1;
                        } else if (dateB > dateA) {
                            return -1;
                        } else {
                            return 0;
                        }
                    }
                },
                data: (row) => row.published.publishDate
            },
            {
                name: "Action",
                width: '80px',
                sort: {
                    enabled: false
                },
                formatter: (function (cell, row) {
                    var x = new DOMParser().parseFromString(row._cells[0].data.props.content, "text/html").body.querySelector(".checkbox-product-list .form-check-input").value
                    return gridjs.html('<div class="dropdown">' +
                        '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                        '<i class="ri-more-fill"></i>' +
                        '</button>' +
                        '<ul class="dropdown-menu dropdown-menu-end">' +
                        '<li><a class="dropdown-item" href="apps-ecommerce-product-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>' +
                        '<li><a class="dropdown-item edit-list" data-edit-id=' + x + ' href="apps-ecommerce-add-product.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>' +
                        '<li class="dropdown-divider"></li>' +
                        '<li><a class="dropdown-item remove-list" href="#" data-id=' + x + ' data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>' +
                        '</ul>' +
                        '</div>');
                })
            }
        ],
    className: {
        th: 'text-muted',
    },
    pagination: {
        limit: 10
    },
    data: productListAllData,
    language: {
        'pagination': {
            'previous': '<',
            'next': '>',
            'of': 'de',
            'to': 'a',
            'showing': 'Exibindo',
            'results': () => 'registros'
        },
        'loading': 'Carregando...',
        'noRecordsFound': 'Nenhum resultado encontrado',
        'error': 'Erro!'
    }
}).render(document.getElementById("table-product-list-all"));


// table-product-list-published
var productListPublishedData = [
    {
        "id": 1,
        "product": {
            "img": "assets/images/products/img-2.png",
            "title": "Fernando Urban Ladder Pashe Chair",
            "category": "Furniture"
        },
        "stock": "06",
        "price": "160.00",
        "orders": "30",
        "rating": "4.3",
        "published": {
            "publishDate": "06 Jan, 2021",
            "publishTime": "01:31 PM",
        }
    }, {
        "id": 2,
        "product": {
            "img": "assets/images/products/img-6.png",
            "title": "Half Sleeve T-Shirts (Blue)",
            "category": "Fashion"
        },
        "stock": "15",
        "price": "125.00",
        "orders": "48",
        "rating": "4.2",
        "published": {
            "publishDate": "12 Oct, 2021",
            "publishTime": "04:55 PM",
        }
    }, {
        "id": 3,
        "product": {
            "img": "assets/images/products/img-4.png",
            "title": "Fabric Dual Tone Living Room Chair",
            "category": "Furniture"
        },
        "stock": "15",
        "price": "140.00",
        "orders": "40",
        "rating": "4.2",
        "published": {
            "publishDate": "19 Apr, 2021",
            "publishTime": "02:51 PM",
        }
    }, {
        "id": 4,
        "product": {
            "img": "assets/images/products/img-4.png",
            "title": "350 ml Glass Grocery Container",
            "category": "Grocery"
        },
        "stock": "10",
        "price": "125.00",
        "orders": "48",
        "rating": "4.5",
        "published": {
            "publishDate": "26 Mar, 2021",
            "publishTime": "11:40 AM",
        }
    }, {
        "id": 5,
        "product": {
            "img": "assets/images/products/img-5.png",
            "title": "Crux Motorsports Helmet",
            "category": "Automotive Accessories"
        },
        "stock": "08",
        "price": "135.00",
        "orders": "55",
        "rating": "4.4",
        "published": {
            "publishDate": "30 Mar, 2021",
            "publishTime": "09:42 AM",
        }
    }
]

var productListPublished = new gridjs.Grid({
    columns:
        [
            {
                name: '#',
                width: '40px',
                sort: {
                    enabled: false
                },
                formatter: (function (cell) {
                    return gridjs.html('<div class="form-check checkbox-product-list">\
					<input class="form-check-input" type="checkbox" value="' + cell + '" id="checkboxpublished-' + cell + '">\
					<label class="form-check-label" for="checkbox-' + cell + '"></label>\
				  </div>');
                })
            },
            {
                name: 'Product',
                width: '360px',
                data: (function (row) {
                    return gridjs.html('<div class="d-flex align-items-center">' +
                        '<div class="flex-shrink-0 me-3">' +
                        '<div class="avatar-sm bg-light rounded p-1"><img src="' + row.product.img + '" alt="" class="img-fluid d-block"></div>' +
                        '</div>' +
                        '<div class="flex-grow-1">' +
                        '<h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html" class="text-body">' + row.product.title + '</a></h5>' +
                        '<p class="text-muted mb-0">Category : <span class="fw-medium">' + row.product.category + '</span></p>' +
                        '</div>' +
                        '</div>');
                })
            },
            {
                name: 'Stock',
                width: '94px',
            },
            {
                name: 'Price',
                width: '101px',
                formatter: (function (cell) {
                    return gridjs.html('$' + cell);
                })
            },
            {
                name: 'Orders',
                width: '84px',
            },
            {
                name: 'Rating',
                width: '105px',
                formatter: (function (cell) {
                    return gridjs.html('<span class="badge bg-light text-body fs-12 fw-medium"><i class="mdi mdi-star text-warning me-1"></i>' + cell + '</span></td>');
                })
            },
            {
                name: 'Published',
                width: '220px',
                data: (function (row) {
                    return gridjs.html(row.published.publishDate + '<small class="text-muted ms-1">' + row.published.publishTime + '</small>');
                })
            },
            {
                name: "Action",
                width: '80px',
                sort: {
                    enabled: false
                },
                formatter: (function (cell, row) {
                    return gridjs.html('<div class="dropdown">' +
                        '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                        '<i class="ri-more-fill"></i>' +
                        '</button>' +
                        '<ul class="dropdown-menu dropdown-menu-end">' +
                        '<li><a class="dropdown-item" href="apps-ecommerce-product-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>' +
                        '<li><a class="dropdown-item" href="apps-ecommerce-add-product.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>' +
                        '<li class="dropdown-divider"></li>' +
                        '<li><a class="dropdown-item remove-list" href="#" data-id=' + row._cells[0].data + ' data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>' +
                        '</ul>' +
                        '</div>');
                })
            }
        ],
    className: {
        th: 'text-muted',
    },
    pagination: {
        limit: 10
    },
    sort: true,
    data: productListPublishedData
}).render(document.getElementById("table-product-list-published"));


// Search product list
var searchProductList = document.getElementById("searchProductList");
searchProductList.addEventListener("keyup", function () {
    var inputVal = searchProductList.value.toLowerCase();

    function filterItems(arr, query) {
        return arr.filter(function (el) {
            let allTerms = el.stock.toLowerCase().indexOf(query.toLowerCase()) !== -1
            let title = el.product.title.toLowerCase().indexOf(query.toLowerCase()) !== -1

            return allTerms || title
        })
    }

    var filterData = filterItems(productListAllData, inputVal);
    var filterPublishData = filterItems(productListPublishedData, inputVal);
    productListAll.updateConfig({
        data: filterData
    }).forceRender();

    productListPublished.updateConfig({
        data: filterPublishData
    }).forceRender();
    checkRemoveItem();
});

// mail list click event
Array.from(document.querySelectorAll('.filter-list a')).forEach(function (filteritem) {
    filteritem.addEventListener("click", function () {
        var filterListItem = document.querySelector(".filter-list a.active");
        if (filterListItem) filterListItem.classList.remove("active");
        filteritem.classList.add('active');

        var filterItemValue = filteritem.querySelector(".listname").innerHTML

        var filterData = productListAllData.filter(filterlist => filterlist.product.category === filterItemValue);
        var filterPublishedData = productListPublishedData.filter(filterlist => filterlist.product.category === filterItemValue);

        productListAll.updateConfig({
            data: filterData
        }).forceRender();

        productListPublished.updateConfig({
            data: filterPublishedData
        }).forceRender();

        checkRemoveItem();
    });
})

// price range slider
var slider = document.getElementById('product-price-range');

noUiSlider.create(slider, {
    start: [0, 2000], // Handle start position
    step: 10, // Slider moves in increments of '10'
    margin: 20, // Handles must be more than '20' apart
    connect: true, // Display a colored bar between the handles
    behaviour: 'tap-drag', // Move handle on tap, bar is draggable
    range: { // Slider can select '0' to '100'
        'min': 0,
        'max': 2000
    },
    format: wNumb({decimals: 0, prefix: '$ '})
});

var minCostInput = document.getElementById('minCost'),
    maxCostInput = document.getElementById('maxCost');

var filterDataAll = '';
var filterDataPublished = '';

// When the slider value changes, update the input and span
slider.noUiSlider.on('update', function (values, handle) {
    var productListupdatedAll = productListAllData;
    var productListupdatedPublished = productListPublishedData;
    if (handle) {
        maxCostInput.value = values[handle];

    } else {
        minCostInput.value = values[handle];
    }

    var maxvalue = maxCostInput.value.substr(2);
    var minvalue = minCostInput.value.substr(2);
    filterDataAll = productListupdatedAll.filter(
        product => parseFloat(product.price) >= minvalue && parseFloat(product.price) <= maxvalue
    );
    filterDataPublished = productListupdatedPublished.filter(
        product => parseFloat(product.price) >= minvalue && parseFloat(product.price) <= maxvalue
    );
    productListAll.updateConfig({
        data: filterDataAll
    }).forceRender();
    productListPublished.updateConfig({
        data: filterDataPublished
    }).forceRender();
    checkRemoveItem();
});


minCostInput.addEventListener('change', function () {
    slider.noUiSlider.set([null, this.value]);
});

maxCostInput.addEventListener('change', function () {
    slider.noUiSlider.set([null, this.value]);
});

// text inputs example
var filterChoicesInput = new Choices(
    document.getElementById('filter-choices-input'),
    {
        addItems: true,
        delimiter: ',',
        editItems: true,
        maxItemCount: 10,
        removeItems: true,
        removeItemButton: true,
    }
)

// sidebar filter check
Array.from(document.querySelectorAll(".filter-accordion .accordion-item")).forEach(function (item) {
    var isFilterSelected = item.querySelectorAll(".filter-check .form-check .form-check-input:checked").length;
    item.querySelector(".filter-badge").innerHTML = isFilterSelected;
    Array.from(item.querySelectorAll(".form-check .form-check-input")).forEach(function (subitem) {
        var checkElm = subitem.value;
        if (subitem.checked) {
            filterChoicesInput.setValue([checkElm]);
        }
        subitem.addEventListener("click", function (event) {
            if (subitem.checked) {
                isFilterSelected++;
                item.querySelector(".filter-badge").innerHTML = isFilterSelected;
                (isFilterSelected > 0) ? item.querySelector(".filter-badge").style.display = 'block' : item.querySelector(".filter-badge").style.display = 'none';
                filterChoicesInput.setValue([checkElm]);

            } else {
                filterChoicesInput.removeActiveItemsByValue(checkElm);
            }
        });
        filterChoicesInput.passedElement.element.addEventListener('removeItem', function (event) {
            if (event.detail.value == checkElm) {
                subitem.checked = false;
                isFilterSelected--;
                item.querySelector(".filter-badge").innerHTML = isFilterSelected;
                (isFilterSelected > 0) ? item.querySelector(".filter-badge").style.display = 'block' : item.querySelector(".filter-badge").style.display = 'none';
            }
        }, false);

        // clearall
        document.getElementById("clearall").addEventListener("click", function () {
            Array.from(document.querySelectorAll('.filter-list a')).forEach(function (filteritem) {
                filteritem.classList.remove("active");
            })
            subitem.checked = false;
            filterChoicesInput.removeActiveItemsByValue(checkElm);
            isFilterSelected = 0;
            item.querySelector(".filter-badge").innerHTML = isFilterSelected;
            (isFilterSelected > 0) ? item.querySelector(".filter-badge").style.display = 'block' : item.querySelector(".filter-badge").style.display = 'none';
            productListAll.updateConfig({
                data: productListAllData
            }).forceRender();

            productListPublished.updateConfig({
                data: productListPublishedData
            }).forceRender();
        });
    });
});

// Search Brands Options
var searchBrandsOptions = document.getElementById("searchBrandsList");
searchBrandsOptions.addEventListener("keyup", function () {
    var inputVal = searchBrandsOptions.value.toLowerCase();
    var searchItem = document.querySelectorAll("#flush-collapseBrands .form-check");
    Array.from(searchItem).forEach(function (elem) {
        var searchBrandsTxt = elem.getElementsByClassName("form-check-label")[0].innerText.toLowerCase();
        elem.style.display = searchBrandsTxt.includes(inputVal) ? "block" : "none";
    })
});

// table select to remove
// checkbox-wrapper
var isSelected = 0;

function checkRemoveItem() {
    var tabEl = document.querySelectorAll('a[data-bs-toggle="tab"]');
    Array.from(tabEl).forEach(function (el) {
        el.addEventListener('show.bs.tab', function (event) {
            isSelected = 0;
            document.getElementById("selection-element").style.display = 'none';
        });
    });
    setTimeout(function () {
        Array.from(document.querySelectorAll(".checkbox-product-list input")).forEach(function (item) {
            item.addEventListener('click', function (event) {
                if (event.target.checked == true) {
                    event.target.closest('tr').classList.add("gridjs-tr-selected");
                } else {
                    event.target.closest('tr').classList.remove("gridjs-tr-selected");
                }

                var checkboxes = document.querySelectorAll('.checkbox-product-list input:checked');
                isSelected = checkboxes.length;

                if (event.target.closest('tr').classList.contains("gridjs-tr-selected")) {
                    document.getElementById("select-content").innerHTML = isSelected;
                    (isSelected > 0) ? document.getElementById("selection-element").style.display = 'block' : document.getElementById("selection-element").style.display = 'none';
                } else {

                    document.getElementById("select-content").innerHTML = isSelected;
                    (isSelected > 0) ? document.getElementById("selection-element").style.display = 'block' : document.getElementById("selection-element").style.display = 'none';
                }
            });
        });
        removeItems();
        removeSingleItem();
    }, 100);
}


// check to remove item
var checkboxes = document.querySelectorAll('.checkbox-wrapper-mail input');

function removeItems() {
    var removeItem = document.getElementById('removeItemModal');
    removeItem.addEventListener('show.bs.modal', function (event) {
        isSelected = 0;
        document.getElementById("delete-product").addEventListener("click", function () {
            Array.from(document.querySelectorAll(".gridjs-table tr")).forEach(function (element) {
                var filtered = '';
                if (element.classList.contains("gridjs-tr-selected")) {
                    var getid = element.querySelector('.form-check-input').value;

                    function arrayRemove(arr, value) {
                        return arr.filter(function (ele) {
                            return ele.id != value;
                        });
                    }

                    var filtered = arrayRemove(productListAllData, getid);
                    var filteredPublished = arrayRemove(productListPublishedData, getid);
                    productListAllData = filtered;
                    productListPublishedData = filteredPublished;
                    element.remove();
                }
            });
            document.getElementById("btn-close").click();
            if (document.getElementById("selection-element"))
                document.getElementById("selection-element").style.display = 'none';

            checkboxes.checked = false;
        });
    })
}

function removeSingleItem() {
    var getid = 0;
    Array.from(document.querySelectorAll(".remove-list")).forEach(function (item) {
        item.addEventListener('click', function (event) {
            getid = item.getAttribute('data-id');
            document.getElementById("delete-product").addEventListener("click", function () {
                function arrayRemove(arr, value) {
                    return arr.filter(function (ele) {
                        return ele.id != value;
                    });
                }

                var filtered = arrayRemove(productListAllData, getid);
                var filteredPublished = arrayRemove(productListPublishedData, getid);
                productListAllData = filtered;
                productListPublishedData = filteredPublished;
                var element = item.closest(".gridjs-tr");
                element.remove();
            });
        });
    });


    var getEditid = 0;
    Array.from(document.querySelectorAll(".edit-list")).forEach(function (elem) {
        elem.addEventListener('click', function (event) {
            getEditid = elem.getAttribute('data-edit-id');

            productListAllData = productListAllData.map(function (item) {
                if (item.id == getEditid) {

                    sessionStorage.setItem('editInputValue', JSON.stringify(item));
                }
                return item;
            });
        });
    });
}