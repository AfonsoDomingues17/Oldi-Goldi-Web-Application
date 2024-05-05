const deleteBTn = document.getElementById('delete_item');
console.log(deleteBTn);
deleteBTn.addEventListener('click',function(event){
    event.preventDefault();
 document.getElementById('Pop_Up_delete').style.display = "block";


});

const cancelBTn = document.getElementById('cancelBtn');
cancelBTn.addEventListener('click',function(event){
    event.preventDefault();
    document.getElementById('Pop_Up_delete').style.display = "none";
});

document.getElementById('orderBy').addEventListener('click', function() {
    const dropdownMenu = document.getElementById('dropdownMenu');
    const icon = document.getElementById('orderBy').querySelector('i');

    if (dropdownMenu.style.display === 'none') {
        dropdownMenu.style.display = 'block';
        icon.className = 'fa-solid fa-chevron-up';
    } else {
        dropdownMenu.style.display = 'none';
        icon.className = 'fa-solid fa-chevron-down';
    }
});


document.getElementById('Show_Filter').addEventListener('click', function() {
    const Aside = document.getElementById('Filters');
    const ItemsSection = document.querySelector('section.items');
    const filtertext = document.getElementById('Show_Filter');
    if (Aside.style.display === 'none') {
        Aside.style.display = 'block';
        ItemsSection.style.gridTemplateColumns = '1fr 3fr';
        filtertext.innerHTML = 'Hide Filters <i class="fa-solid fa-sliders"></i>';
    } else {
        Aside.style.display = 'none';
        ItemsSection.style.gridTemplateColumns = '1fr';
        filtertext.innerHTML = 'Show Filters <i class="fa-solid fa-sliders"></i>';
    }
});

const summaries = document.querySelectorAll('summary');
summaries.forEach(function(summary) {
    summary.addEventListener('click', function() {
        const icon = summary.querySelector('i');
        if (icon.className === 'fa-solid fa-chevron-down') {
            icon.className = 'fa-solid fa-chevron-up';
        } else {
            icon.className = 'fa-solid fa-chevron-down';
        }
    });
});

const sizeCheckboxes = document.querySelectorAll('section#sizeSection input[type="checkbox"]');
const brandCheckboxes = document.querySelectorAll('section#brandSection input[type="checkbox"]');
const conditionCheckboxes = document.querySelectorAll('section#ConditionSection input[type="checkbox"]');
const categoryCheckboxes = document.querySelectorAll('section#CategorySection input[type="checkbox"]');
const minPriceInput = document.querySelector('section#PriceSection input#Sprice');
const maxPriceInput = document.querySelector('section#PriceSection input#Finalprice');
const itemsContainer = document.querySelector('#Garticles');

const searchCheckbox = document.querySelector('#search_filter');


function updateItems() {
    console.log('updateItems');
    const selectedSizes = Array.from(sizeCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.dataset.sizeId);

    const selectedBrands = Array.from(brandCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.dataset.brandId);

    const selectedConditions = Array.from(conditionCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.dataset.conditionId);

    const selectedCategories = Array.from(categoryCheckboxes)
    .filter(checkbox => checkbox.checked)
    
    .map(checkbox => checkbox.dataset.categoryId);
    //localStorage.setItem('selectedCategories', JSON.stringify(selectedCategories)); //guarda numa local storage as cetegorias selecionadas
    //localStorage.setItem('selectedSizes', JSON.stringify(selectedSizes));
    //localStorage.setItem('selectedBrands', JSON.stringify(selectedBrands));
    //localStorage.setItem('selectedConditions', JSON.stringify(selectedConditions));

    const minPrice = minPriceInput.value;
    const maxPrice = maxPriceInput.value;
    let searchTerm = null;

    const searchTermElement = document.getElementById('search-term');
    
    if (searchTermElement && searchCheckbox.checked) {
    searchTerm = searchTermElement.textContent;
    }
    //localStorage.setItem('minPrice', minPrice);
    //localStorage.setItem('maxPrice', maxPrice);
    let url = 'filter_items.php';
    if (selectedSizes.length > 0) {
        url += '?size_ids=' + encodeURIComponent(JSON.stringify(selectedSizes));
    }
    if (selectedBrands.length > 0) {
        const separator = url.includes('?') ? '&' : '?';
        url += separator + 'brand_ids=' + encodeURIComponent(JSON.stringify(selectedBrands));
    }
    if (selectedConditions.length > 0) {
        const separator = url.includes('?') ? '&' : '?';
        url += separator + 'condition_ids=' + encodeURIComponent(JSON.stringify(selectedConditions));
    }
    if (selectedCategories.length > 0) {
        const separator = url.includes('?') ? '&' : '?';
        url += separator + 'category_ids=' + encodeURIComponent(JSON.stringify(selectedCategories));
    }
    if(minPrice){
        const separator = url.includes('?') ? '&' : '?';
        url += separator + 'min_price=' + encodeURIComponent(minPrice);
    }
    if(maxPrice){
        const separator = url.includes('?') ? '&' : '?';
        url += separator + 'max_price=' + encodeURIComponent(maxPrice);
    }
    
    if(searchTerm){
        const separator = url.includes('?') ? '&' : '?';
        url += separator + 'search=' + encodeURIComponent(searchTerm);
    }
    
    fetch(url)
        .then(response => response.text())
        .then(html => {
            itemsContainer.innerHTML = html;
        });
        console.log('finished');
}
/*
document.addEventListener('DOMContentLoaded', (event) => {
    const selectedCategories = JSON.parse(localStorage.getItem('selectedCategories')) || [];
    const selectedSizes = JSON.parse(localStorage.getItem('selectedSizes')) || [];
    const selectedBrands = JSON.parse(localStorage.getItem('selectedBrands')) || [];
    const selectedConditions = JSON.parse(localStorage.getItem('selectedConditions')) || [];
    categoryCheckboxes.forEach(checkbox => {
        if (selectedCategories.includes(checkbox.dataset.categoryId)) {
            checkbox.checked = true;
        }
    });
    sizeCheckboxes.forEach(checkbox => {
        if (selectedSizes.includes(checkbox.dataset.sizeId)) {
            checkbox.checked = true;
        }
    });
    brandCheckboxes.forEach(checkbox => {
        if (selectedBrands.includes(checkbox.dataset.brandId)) {
            checkbox.checked = true;
        }
    });
    conditionCheckboxes.forEach(checkbox => {
        if (selectedConditions.includes(checkbox.dataset.conditionId)) {
            checkbox.checked = true;
        }
    });
    minPriceInput.value = localStorage.getItem('minPrice') || '';
    maxPriceInput.value = localStorage.getItem('maxPrice') || '';

    updateItems();
});
*/


const remove_search = document.getElementById('remove-search-term');
if(remove_search){
remove_search.addEventListener('click', function(){

    document.getElementById('search-term-container').style.display = "none";

    document.getElementById('search_filter').checked = false;

    updateItems();
    

    const url = new URL(window.location.href);

    
    const params = new URLSearchParams(url.search); //gets the part after the ?

    params.delete('input'); //delets the part of input

    url.search = params.toString();

    window.history.replaceState({}, '', url.toString());
    

});

}



sizeCheckboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', updateItems);
});

brandCheckboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        updateItems();

        if (!checkbox.checked) {
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);
            params.delete('brand_id');
            url.search = params.toString();
            window.history.replaceState({}, '', url.toString());
        }
    });
});

conditionCheckboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', updateItems);
});

categoryCheckboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        updateItems();

        if (!checkbox.checked) {
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);
            params.delete('category_id');
            url.search = params.toString();
            window.history.replaceState({}, '', url.toString());
        }
    });
});

searchCheckbox.addEventListener('change',updateItems);

minPriceInput.addEventListener('input', updateItems);

maxPriceInput.addEventListener('input', updateItems);

