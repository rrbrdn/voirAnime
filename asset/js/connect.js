let modal = document.getElementsByClassName('modal')[0];
let closeModal = document.getElementById('close');
let connectBtn = document.getElementById('connect');
modal.style.display="none";
connectBtn.addEventListener('click', () => {
    modal.style.display="block";
    body.scroll ="hidden";
})
closeModal.addEventListener('click', () => {
    modal.style.display="none";
})


