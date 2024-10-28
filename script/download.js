function downloadImage() {
    const imageSrc = document.getElementById('modalImg').src;
    const link = document.createElement('a');
    link.href = imageSrc;
    link.download = '';
    document.body.appendChild(link); 
    link.click(); 
    document.body.removeChild(link); 
}