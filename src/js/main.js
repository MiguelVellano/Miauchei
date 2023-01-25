const fecharPopup = document.querySelector('.close-window');
const logoHeader = document.querySelector('.logoHeader')
const btnMobile = document.querySelector('#btn-mobile')
const anunciar = document.querySelector('.anunciar');
const popup = document.querySelector('.pop-dialog')
const liMobile = document.querySelectorAll('li')
const header = document.querySelector('header')
const logo = document.querySelector('.logo')
const body = document.querySelector('body')
const nav = document.querySelector('nav');

const toggleMenuProfile = document.querySelector('.menu');
const userPic = document.querySelector(".profile img")

function handleMenu(){
  toggleMenuProfile.classList.toggle("active")
}

userPic.addEventListener('click', handleMenu)

function toggleMenu(){
  nav.classList.toggle("active");
}

btnMobile.addEventListener('click', toggleMenu)

function togglePopUp(){
  popup.showModal();
}

function closeWindow(){
  popup.close();
}

function onScroll() {
  if (scrollY > 115) {
    logo.classList.remove('hide')
    logoHeader.classList.remove('hide')
  } else {
    btnMenu.classList.add('leftRight')
    logo.classList.remove('hide')
    logoHeader.classList.add('hide')
  }
};

anunciar.addEventListener('click', togglePopUp);
fecharPopup.addEventListener('click',closeWindow);