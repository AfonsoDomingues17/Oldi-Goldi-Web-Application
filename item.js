document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.product-thumbnails img').forEach(img => {
        img.addEventListener('click', function() {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = this.src;
        });
    });

    const setupPopup = (triggerId, popupId, closeId) => {
        const trigger = document.getElementById(triggerId);
        const popup = document.getElementById(popupId);
        const close = document.getElementById(closeId);

        trigger.addEventListener('click', () => popup.style.display = 'block');
        close.addEventListener('click', () => popup.style.display = 'none');
    };

    setupPopup('MBTn', 'Message_PopUp', 'close');

    setupPopup('PAPBTn', 'newPriceI_PopUp', 'close2');

    const confirmBtn = document.getElementById('confirmBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    cancelBtn.addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('Pop_Up_delete').style.display = 'none';
    });

    confirmBtn.addEventListener('click', function(event) {
        if (!confirm("Are you sure you want to delete this item?")) {
            event.preventDefault();
        }
    });
});
