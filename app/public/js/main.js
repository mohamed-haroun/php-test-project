let form = document.getElementById('form');

form.addEventListener('focusin', (event)=>{
    event.target.style.width = '12rem';
    event.target.style.backgroundColor = '#eee';
});

form.addEventListener('focusout', (event)=>{
    event.target.style.backgroundColor = 'transparent';
    event.target.style.width = '2rem';
});
