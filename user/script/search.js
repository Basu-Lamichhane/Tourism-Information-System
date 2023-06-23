var district_option=document.getElementById("district");
var destination_option=document.getElementById("destination");
var type_option=document.getElementById("type");
// for reset btn
function resetBtn() {
    district_option.options[0].selected = true;
    destination_option.options[0].selected = true;
    type_option.options[0].selected = true;
}

//for search focus-in and focus-out
const SearchBar = document.getElementById('search');


const suggestionDiv = document.getElementById('suggestions_container');

var search_cancel_btn=document.getElementById("search-cancel-btn");


SearchBar.addEventListener('focusin', function () {
    suggestionDiv.style.display = (suggestionDiv.style.display === 'none') ? 'block' : 'none';
    search_cancel_btn.innerHTML='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" viewBox="0 0 492 492" xml:space="preserve"><path d="M300.188,246L484.14,62.04c5.06-5.064,7.852-11.82,7.86-19.024c0-7.208-2.792-13.972-7.86-19.028L468.02,7.872    c-5.068-5.076-11.824-7.856-19.036-7.856c-7.2,0-13.956,2.78-19.024,7.856L246.008,191.82L62.048,7.872    c-5.06-5.076-11.82-7.856-19.028-7.856c-7.2,0-13.96,2.78-19.02,7.856L7.872,23.988c-10.496,10.496-10.496,27.568,0,38.052    L191.828,246L7.872,429.952c-5.064,5.072-7.852,11.828-7.852,19.032c0,7.204,2.788,13.96,7.852,19.028l16.124,16.116    c5.06,5.072,11.824,7.856,19.02,7.856c7.208,0,13.968-2.784,19.028-7.856l183.96-183.952l183.952,183.952    c5.068,5.072,11.824,7.856,19.024,7.856h0.008c7.204,0,13.96-2.784,19.028-7.856l16.12-16.116    c5.06-5.064,7.852-11.824,7.852-19.028c0-7.204-2.792-13.96-7.852-19.028L300.188,246z"/></svg>';
});
SearchBar.addEventListener('focusout', function () {
    suggestionDiv.style.display = (suggestionDiv.style.display === 'none') ? 'block' : 'none';
});


function scrollContent(scrollAmount, action) {
    const scrollContainer = document.querySelector('#container-' + action);
    const scrollContent = document.querySelector('#content-' + action);
    const scrollPosition = scrollContainer.scrollLeft;
    const scrollStep = scrollContent.clientWidth / 3;

    scrollContainer.scrollBy({
        left: scrollStep * scrollAmount,
        behavior: 'smooth'
    });
}
