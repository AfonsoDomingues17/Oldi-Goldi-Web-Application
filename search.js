const timeoutId = null;

function searchFunction() {
    clearTimeout(timeoutId); 

    timeoutId = setTimeout(() => {
        const searchTerm = document.getElementById('search').value;
        if (searchTerm != '') {
            fetch('search.php?search=' + encodeURIComponent(searchTerm))
            .then(response => response.text())
            .then(data => {
                document.getElementById('searchResult').innerHTML = data;
            });
        } else {
            document.getElementById('searchResult').innerHTML = '';
        }
    }, 300);
}

//function is only called when user has not typed anyitihng for 300 ms, this fucntion will only be called 300 ms after a key is pressed