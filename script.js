const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

window.addEventListener('resize', () => {
    if(window.innerWidth < 1081)
        window.location.href = 'index_m.html';
    else
        window.location.href = 'index.html';
});

//login form
const loginForm = document.getElementById('loginForm');
const loginBtn = document.getElementById('login');
const register = document.getElementById('register');
const registerSpan = document.getElementById('registerSpan');
const addInputDiv = document.getElementById('add-input-div');

const nam = document.createElement('input');
const surname = document.createElement('input');
nam.type = 'text';
nam.name = 'name';
nam.style.width = '40%';
nam.style.paddingLeft = '20px';
nam.maxLength = 70;
nam.placeholder = 'imię';
nam.required = true;

surname.type = 'text';
surname.name = 'surname';
surname.style.width = '40%';
surname.style.paddingLeft = '20px';
surname.maxLength = 70;
surname.placeholder = 'nazwisko';
surname.required = true;

register.addEventListener('click', () => {
    if(loginForm.action == 'http://localhost/maestr/login.php'){
        addInputDiv.appendChild(nam);
        addInputDiv.appendChild(surname);
        loginForm.action = 'register.php';
        registerSpan.innerText = 'Masz juz konto? ';
        register.innerText = 'Zaloguj się';
        loginBtn.innerText = 'Zarejestruj się';
    }
    else {
        nam.remove();
        surname.remove();
        loginForm.action = 'login.php';
        registerSpan.innerText = 'Nie masz konta? ';
        register.innerText = 'Zarejestruj się';
        loginBtn.innerText = 'Zaloguj się';
    }
})