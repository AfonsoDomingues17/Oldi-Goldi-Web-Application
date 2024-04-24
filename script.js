

const hearts = document.querySelectorAll('#heart i');
hearts.forEach(function(heart) {
    heart.addEventListener('click', async function() {
        const itemID = this.dataset.itemId;
        fetch('add_to_whishlist.php?item_id=' + encodeURIComponent(itemID))
        .then(response => response.text())
        .then(text => {
                heart.className = text;
        
    })
        });
    
});



