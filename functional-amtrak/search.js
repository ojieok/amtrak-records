function fetchSearchResults() {
    let query = document.getElementById("search-bar").value.trim();
    let resultsContainer = document.getElementById("search-results");

    if (query.length < 3) {
        resultsContainer.innerHTML = ""; // if query is too short, no results
        resultsContainer.style.display = "none";
        return;
    }

    fetch(`search.php?query=${query}`)
        .then(response => response.json())
        .then(data => {
            resultsContainer.innerHTML = "";
            if (data.length === 0) {
                resultsContainer.style.display = "none"; // no display if zero results
                return;
            }

            resultsContainer.style.display = "block"; // show dropdown

            data.forEach(result => {
                let resultItem = document.createElement("div");
                resultItem.classList.add("search-result-item");
                resultItem.innerHTML = `<a href="${result.page}">${result.title}</a>`;
                resultsContainer.appendChild(resultItem);
            });
        })
        .catch(error => console.error("Error fetching search results:", error)); // for testing
}
