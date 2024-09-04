// Menampilkan alert sederhana saat halaman selesai dimuat
alert('Selamat datang di halaman ini!');

// Menampilkan alert saat salah satu link di navbar diklik
document.querySelectorAll('.topnav a').forEach(link => {
    link.addEventListener('click', function() {
        alert(`Anda mengklik link: ${this.textContent}`);
    });
});
