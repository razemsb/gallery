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

function openModal(filename, uploadUser, uploadDate, upload_path) {

    document.getElementById('modalImg').src = upload_path;
    
    document.getElementById('modalCaption').textContent = filename;
    document.getElementById('modalUser').textContent = uploadUser;
    document.getElementById('modalDate').textContent = uploadDate;

    document.getElementById('myModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('myModal').style.display = 'none';
    document.getElementById('modalImg').src = '';
}