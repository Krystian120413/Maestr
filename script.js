const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

console.log(vw);
window.addEventListener('resize', () => {
    if(window.innerWidth < 998)
        window.location.href = 'index.html';
    else
        window.location.href = 'index_d.html';
});



/*
window.addEventListener('scroll',() => {
    if(window.scrollY == document.body.clientHeight - window.innerHeight) {
          console.log('wrod');
    }
});
*/