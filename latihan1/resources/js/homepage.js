// Loading animation //
    const preloader = document.getElementById('preloader');
    if (preloader) {
      setTimeout(function () {
        preloader.classList.add('hide');
        setTimeout(function () {
          preloader.remove();
        }, 500);
      }, 3000);
    }

    const cards = document.querySelectorAll('.futuristic-card');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        card.classList.add('hidden');
        observer.observe(card);
    });

     // Button muncul setelah scroll ke bawah 300px
  window.onscroll = function() {
    if (document.body.scrollTop > 900 || document.documentElement.scrollTop > 300) {
      document.getElementById("back-to-top").style.display = "flex"; // Menampilkan tombol
    } else {
      document.getElementById("back-to-top").style.display = "none"; // Menyembunyikan tombol
    }
  };
  // Ketika klik tombol kembali ke atas
  document.getElementById("back-to-top").addEventListener("click", function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });