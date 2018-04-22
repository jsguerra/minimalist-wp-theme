var closeBtn = document.querySelector('.closebtn');

closeBtn.addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.main-navigation').classList.remove('open-nav');
    document.querySelector('.js').classList.remove('is-noscroll');
}, false);

var openBtn = document.querySelector('.openbtn');

openBtn.addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('.main-navigation').classList.add('open-nav');
    document.querySelector('.js').classList.add('is-noscroll');
}, false);