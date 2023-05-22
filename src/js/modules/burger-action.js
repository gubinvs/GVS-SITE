//-- Взаимодействие с бургером
//-- инициализировал переменную с бургером
const burger = document.getElementById('burger-default'); 
//-- Инициализировал переменную с крестиком
const burgerСlose = document.querySelector('.header-burger_close');
//-- Инициализировал переменную с классом .header__mobile
const classHeader = document.querySelector('.header');
//-- Инициализировал переменную с классом .header__mobile
const classHeaderMobile = document.querySelector('.header__mobile');

// событие клик по бургеру
burger.addEventListener("click", function(e) {
//-- добаляю классы
classHeader.className = "header header_none";
classHeaderMobile.className = "header__mobile header__mobile_active";

});

// событие клик по крестику
burgerСlose.addEventListener("click", function(e) {
//-- добаляю классы
classHeader.className = "header";
classHeaderMobile.className = "header__mobile";

});
