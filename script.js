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

summaries.getElementById('Show_Filter').addEventListener('click', function() {
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

