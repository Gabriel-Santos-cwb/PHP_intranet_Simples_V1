const conteudos = document.querySelector('.conteudos');
const btn = document.getElementById('btn');
const cancelBtn = document.getElementById('cancel');

btn.addEventListener('click', function() {
    conteudos.style.height = '100vh';
    conteudos.style.width = '1183px';
    conteudos.style['margin-left'] = '240px';
});

cancelBtn.addEventListener('click', function() {
    conteudos.style.height = '100vh';
    conteudos.style['margin-left'] = '0px';
    conteudos.style.width = '1423px';
});
