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


//-- Меняю цифры у карточки услуг при ширине экра 480 px
//-- Определение ширины экрана
const monitor = document.documentElement.clientWidth;

// -- инициализация переменной с номером услуги 3
const number_3 = document.getElementById('num_3');

// -- инициализация переменной с номером услуги 4
const number_2 = document.getElementById('num_4');

if (monitor <= 480) {
    number_3.src="../../img/services-section__img/services_2.svg";
    number_2.src="../../img/services-section__img/services_3.svg";
}