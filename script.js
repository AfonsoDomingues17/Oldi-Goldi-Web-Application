

document.body.addEventListener('click', function(event) {
    if (event.target.matches('#heart i')) {
        const heart = event.target;
        const itemID = heart.dataset.itemId;
        fetch('add_to_whishlist.php?item_id=' + encodeURIComponent(itemID))
        .then(response => response.text())
        .then(text => {
            heart.className = text;
        });
    }
});

