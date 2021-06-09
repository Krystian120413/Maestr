const contentDiv = document.getElementById('cont');
const mobileContentDiv = document.getElementById('mobile');
const mobileIndexContent = document.getElementById('mobileCont');
const loginDiv = document.getElementById('loginDiv');
const registerDiv = document.getElementById('registerDiv');
const loginIndexBtn = document.getElementById('loginBtn');
const registerBtn = document.getElementById('registerBtn');
const closeLoginBtn = document.getElementById('closeLoginBtn');
const closeRegisterBtn = document.getElementById('closeRegisterBtn');

const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

if(window.innerWidth < 1081){
    contentDiv.style.display = 'none';
    mobileContentDiv.style.display = 'block';
}
else{
    contentDiv.style.display = 'block';
    mobileContentDiv.style.display = 'none';
}

window.addEventListener('resize', () => {
    if(window.innerWidth < 1081){
        contentDiv.style.display = 'none';
        mobileContentDiv.style.display = 'block';
    }
    else{
        contentDiv.style.display = 'block';
        mobileContentDiv.style.display = 'none';
    }
});

//login panel
loginIndexBtn.addEventListener('click', () => {
    mobileIndexContent.style.display = 'none';
    loginDiv.style.display = 'block';
})

closeLoginBtn.addEventListener('click', () => {
    mobileIndexContent.style.display = 'block';
    loginDiv.style.display = 'none';
})

//register panel
registerBtn.addEventListener('click', () => {
    mobileIndexContent.style.display = 'none';
    registerDiv.style.display = 'block';
})

closeRegisterBtn.addEventListener('click', () => {
    mobileIndexContent.style.display = 'block';
    registerDiv.style.display = 'none';
})