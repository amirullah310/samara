
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false,
        });

        const navbar = document.querySelector(".navbar");
        const menu = document.querySelector(".menu-list");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");

        menuBtn.onclick = () => {
            menu.classList.add("active");
            menuBtn.classList.add("hide");
        };

        cancelBtn.onclick = () => {
            menu.classList.remove("active");
            menuBtn.classList.remove("hide");
        };

        // Tutup menu jika klik di luar menu saat mode responsif aktif
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = menu.contains(event.target);
            const isClickOnMenuBtn = menuBtn.contains(event.target);

            if (!isClickInsideMenu && !isClickOnMenuBtn && menu.classList.contains('active')) {
                menu.classList.remove('active');
                menuBtn.classList.remove('hide');
            }
        });

        // Optional: navbar sticky saat scroll
        // window.onscroll = () => {
        //     window.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        // };
    // Loader fade out after minimal 1 second
window.addEventListener('load', () => {
  const loader = document.querySelector('.loader');
  if (loader) {
    setTimeout(() => {
      loader.style.opacity = '0';
      setTimeout(() => {
        loader.style.display = 'none';
        document.body.classList.remove('loading');
      }, 500); // fade out 0.5s
    }, 1000); // minimal 1 detik tampil loading
  }
});


const fallingLeavesContainer = document.querySelector('.falling-leaves');

function createLeaf() {
  const leaf = document.createElement('div');
  leaf.classList.add('leaf');
  leaf.style.left = Math.random() * window.innerWidth + 'px';
  leaf.style.animationDuration = '6s'; // fix 6 detik
  leaf.style.transform = `rotate(${Math.random() * 360}deg)`;
  fallingLeavesContainer.appendChild(leaf);

  // Hapus daun setelah animasi selesai
  leaf.addEventListener('animationend', () => {
    leaf.remove();
  });
}

// Interval setiap 3 detik
setInterval(() => {
  // Hitung daun yang masih aktif di container
  const activeLeaves = fallingLeavesContainer.querySelectorAll('.leaf').length;

  // Kalau masih kurang dari 2, buat daun baru
  if (activeLeaves < 3) {
    createLeaf();
  }
}, 3000);


const backToTopButton = document.getElementById('backToTop');

window.addEventListener('scroll', () => {
  if (window.scrollY > 300) {
    backToTopButton.classList.add('show');
  } else {
    backToTopButton.classList.remove('show');
  }
});

backToTopButton.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Image Modal functionality
const modal = document.getElementById('imageModal');
const modalImg = document.getElementById('modalImage');
const closeBtn = document.getElementsByClassName('modal-close')[0];

// Get all profile images
const profileImages = document.querySelectorAll('.dev-card img');

// Add click event to all profile images
profileImages.forEach(img => {
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
    }
});

// Close modal when clicking (X)
closeBtn.onclick = function() {
    modal.style.display = "none";
}

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


  const form = document.querySelector("#contactForm form");

  form.addEventListener("submit", function (e) {
    e.preventDefault(); // Mencegah reload default form

    const formData = new FormData(form);

    Swal.fire({
      title: 'Mengirim...',
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      }
    });

    fetch(form.action, {
      method: "POST",
      body: formData,
      headers: {
        'Accept': 'application/json'
      }
    })
    .then(response => {
      if (response.ok) {
        Swal.fire({
          icon: 'success',
          title: 'Terima kasih!',
          text: 'Pesan Anda berhasil dikirim.',
          confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-color').trim() || '#3085d6'
        });
        form.reset();
      } else {
        throw new Error("Form submission failed");
      }
    })
    .catch(error => {
      Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.',
        confirmButtonColor: '#e53e3e'
      });
    });
  });

// const modall = document.getElementById("artikelModal");
//   const btn = document.getElementById("openModalBtn");
//   const span = document.getElementsByClassName("close")[0];

//   btn.onclick = function() {
//     modall.style.display = "block";
//   }

//   span.onclick = function() {
//     modall.style.display = "none";
//   }

//   window.onclick = function(event) {
//     if (event.target == modall) {
//       modall.style.display = "none";
//     }
//   }
document.getElementById("openModalBtn").onclick = function () {
  document.querySelector(".modal").style.display = "block";
  document.body.classList.add("modal-open");
};

document.querySelector(".close").onclick = function () {
  document.querySelector(".modal").style.display = "none";
  document.body.classList.remove("modal-open");
};

