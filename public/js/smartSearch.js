function showResult(json) {
    cities = JSON.parse(json).cities;
    document.querySelector("#suggestions").innerHTML = "";
    if (cities.length == 0)
        hideSuggestionBox();
    else {
        cities.forEach(city => {
            let cityElement = document.createElement("li");
            cityElement.textContent = city.name;
            document.querySelector("#suggestions").appendChild(cityElement);
        });
        showSuggestionBox();
    }
}

function loadData(filter) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = () => showResult(xmlhttp.responseText);
    xmlhttp.open("GET", `/list/${filter}`, true);
    xmlhttp.send();
}

function showSuggestionBox() {
    document.querySelector(".search-input").classList.add("active");
}

function hideSuggestionBox() {
    document.querySelector(".search-input").classList.remove("active");
}

document.querySelector("#textfield").onkeyup = (event) => {
    let filter = event.target.value;
    if (filter != null && filter != "") {
        loadData(filter);
    } else hideSuggestionBox();
};