
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