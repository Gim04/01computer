const logo = document.querySelector('.column');
const logo2 = document.querySelector('.column1');
const dropdown = document.getElementById('dropdown');
const dropdown2 = document.getElementById('dropdown2');
const dropbtn = document.getElementById('dropbtn');
const dropbtn2 = document.getElementById('dropbtn2');
const hide = document.querySelector('.hide');
const hide2 = document.querySelector('.hide2');
let drop = true;
let drop2 = true;

document.addEventListener('DOMContentLoaded', function () {
    logo.addEventListener('click', () => {
        drop = !drop;
        dropdown.classList.toggle('content1', drop);
        dropdown.classList.toggle('content1i', !drop);
    });
    dropbtn.addEventListener('click', () => {
        if (hide.style.display=="block") {
            hide.style.display="none";
            dropbtn.src = "../photo/public/BxChevronRight.svg";
        } else {
            hide.style.display="block";
            dropbtn.src = "../photo/public/chevron-down.svg";
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    dropbtn2.addEventListener('click', () => {
        drop2 = !drop2;
        dropdown2.classList.toggle('content1e', drop2);
        dropdown2.classList.toggle('content1ie', !drop2);
        if (hide2.style.display=="block") {
            hide2.style.display="none";
            dropbtn2.src = "../photo/public/BxChevronRight.svg";
        } else {
            hide2.style.display="block";
            dropbtn2.src = "../photo/public/chevron-down.svg";
        }
    });
});