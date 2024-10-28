const message = document.getElementById('uploadMessage');
if (message.innerHTML) {
    message.style.display = 'block';
    setTimeout(() => {
        message.classList.add('fade-out');
        setTimeout(() => {
            message.style.display = 'none';
        }, 1000); // время анимации изчезновения
    }, 3000);  // время существования message
}

function openModal(filename, user, date) {
const modal = document.getElementById('myModal');
const modalImg = document.getElementById('modalImg');
const modalUser = document.getElementById('modalUser');
const modalDate = document.getElementById('modalDate');
const modalCaption = document.getElementById('modalCaption');

modal.style.display = "flex"; 
modalImg.src = "files/" + filename;
modalUser.innerHTML = user;
modalDate.innerHTML = date;
modalCaption.innerHTML = filename;
}

// Функция для закрытия модального окна
function closeModal() {
const modal = document.getElementById('myModal');
modal.style.display = "none"; // Скрываем модальное окно
}
