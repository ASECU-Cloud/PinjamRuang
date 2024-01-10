const wrapper = document.querySelector('.wrapper');



const registerLink = document.querySelector('.register-link');
registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

const loginLink = document.querySelector('.login-link');
loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

const btnPop = document.querySelector('.btnLogin-popup');
btnPop.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
});

const closeIcon = document.querySelector('.icon-close');
closeIcon.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
});

const reducedMenu = document.querySelector('.reducedMenu');
const btnPopRed = document.querySelector('.dropdownBtn');
const bars = document.querySelector('.bars')
btnPopRed.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    reducedMenu.classList.remove('open');
    reducedMenu.classList.toggle('close');
    bars.classList.toggle("change");

});


const barsIcon = document.querySelector('.barsIcon');

barsIcon.addEventListener('click', () => {
    bars.classList.toggle("change");
    reducedMenu.classList.remove('close');
    reducedMenu.classList.toggle('open');
})


