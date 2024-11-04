let bars_button = document.querySelector(".bars-button");
let box = document.querySelector(".box");
let cancel = document.querySelector(".cancel")


bars_button.onclick = function(){
    bars_button.classList.toggle("active");
    box.classList.toggle("active_box");
}
document.onclick = function(e){
    if (!bars_button.contains(e.target) && !box.contains(e.target) && !active.contains(e.target) ) {
        bars_button.classList.remove("active");
        box.classList.remove("active_box");
    }
}
cancel.onclick = function(){
    bars_button.classList.remove("active");
        box.classList.remove("active_box");
}


const location = document.querySelector(".location"),
selectBtn = location.querySelector(".select-btn"),
searchInp = location.querySelector("input"),
options = location.querySelector(".options");

let countries = ["Afghanistan", "Algeria", "Argentina", "Australia", "Bangladesh", "Belgium", "Bhutan",
                 "Brazil", "Canada", "China", "Denmark", "Ethiopia", "Finland", "France", "Germany",
                 "Hungary", "Iceland", "India", "Indonesia", "Iran", "Italy", "Japan", "Malaysia",
                 "Maldives", "Mexico", "Morocco", "Nepal", "Netherlands", "Nigeria", "Norway", "Pakistan",
                 "Peru", "Russia", "Romania", "South Africa", "Spain", "Sri Lanka", "Sweden", "Switzerland",
                 "Thailand", "Turkey", "Uganda", "Ukraine", "United States", "United Kingdom", "Vietnam"];

function addCountry(selectedCountry) {
    options.innerHTML = "";
    countries.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}
addCountry();

function updateName(selectedLi) {
    searchInp.value = "";
    addCountry(selectedLi.innerText);
    location.classList.remove("active");
    selectBtn.firstElementChild.innerText = selectedLi.innerText;
}

searchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp.value.toLowerCase();
    arr = countries.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
    }).join("");
    options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! Country not found</p>`;
});

selectBtn.addEventListener("click", () => location.classList.toggle("active"));