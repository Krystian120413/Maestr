const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

window.addEventListener('resize', () => {
    if(window.innerWidth < 1081)
        window.location.href = 'index_m.html';
    else
        window.location.href = 'index.html';

});