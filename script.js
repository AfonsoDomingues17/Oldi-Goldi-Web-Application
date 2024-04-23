
window.addEventListener('DOMContentLoaded', (event) => {
    const hearts = document.querySelectorAll('#heart i');
    hearts.forEach(function(heart) {
        const itemID = heart.dataset.itemId;
        fetch('get_wishlist_status.php?item_id=' + encodeURIComponent(itemID))
        .then(response => response.text())
        .then(text => {
            if(text === "true") {
                heart.className = 'fa-solid fa-heart';
            }
            else {
                heart.className = 'fa-regular fa-heart';
            }
        });
    });
});

const hearts = document.querySelectorAll('#heart i');
hearts.forEach(function(heart) {
    heart.addEventListener('click', function() {
        const itemID = this.dataset.itemId;
        console.log(itemID);
        fetch('add_to_whishlist.php?item_id=' + encodeURIComponent(itemID))
        .then(response => response.text())
        .then(text => {
            if(text === "true") {
                heart.className = 'fa-regular fa-heart';
            }
            else {
                heart.className = 'fa-solid fa-heart';
            
            }
    })
        });
    
});



