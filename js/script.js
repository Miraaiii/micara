const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');
const submitRegBtn = document.querySelector('.reg-submit');

registerBtn.addEventListener('click',()=> {
    container.classList.add('active');
})

submitRegBtn.addEventListener('click',()=> {
    container.classList.remove('active');
})

loginBtn.addEventListener('click',()=> {
    container.classList.remove('active');
})