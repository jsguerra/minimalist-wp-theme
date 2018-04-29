// Responsive menu
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

// Allow social media buttons to open small windows
var shareLinks = document.querySelectorAll('.share');

    var networks = {
        facebook : { width : 600, height : 300 },
        twitter  : { width : 600, height : 254 },
        google   : { width : 515, height : 490 },
        linkedin : { width : 600, height : 473 }
    };

shareLinks.forEach(function(el) {
    var href = el.href,
        network = el.getAttribute('data-network');

    el.addEventListener('click', function(e) {
        e.preventDefault();

    var popup = function(network){
        var options = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
        window.open(href, '', options+'height='+networks[network].height+',width='+networks[network].width);
    }
    
    popup(network);
    }, false);
})