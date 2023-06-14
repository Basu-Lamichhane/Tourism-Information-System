const district_like_buttons = document.querySelectorAll('.explore-like-btn');
const place_like_buttons = document.querySelectorAll('.do-like-btn');
const accommodation_like_buttons = document.querySelectorAll('.stay-like-btn');
const restaurant_like_buttons = document.querySelectorAll('.eat-like-btn');
const cafe_like_buttons = document.querySelectorAll('.socialize-like-btn');

console.log(district_like_buttons);
console.log(place_like_buttons);
console.log(accommodation_like_buttons);
console.log(restaurant_like_buttons);
console.log(cafe_like_buttons);

district_like_buttons.forEach(button => {
    button.addEventListener('click', handleButtonClick);
});
district_like_buttons.forEach(button => {
    button.addEventListener('click', handleButtonClick);
});
district_like_buttons.forEach(button => {
    button.addEventListener('click', handleButtonClick);
});
district_like_buttons.forEach(button => {
    button.addEventListener('click', handleButtonClick);
});
district_like_buttons.forEach(button => {
    button.addEventListener('click', handleButtonClick);
});

function handleButtonClick(event) {

    console.log(event.target.className);
    console.log(event.target.id);
    console.log("btn clicked");
}