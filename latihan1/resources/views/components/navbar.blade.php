<div>
  <nav class="navbar navbar-expand-lg bg-dark shadow-sm fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand neon-text" href="#">E-Commerce</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link neon-text active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link neon-text" href="#product">Product</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle neon-text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu bg-dark">
              <li><a class="dropdown-item neon-text" href="/category/ACER">ACER</a></li>
              <li><a class="dropdown-item neon-text" href="/category/ASUS">ASUS</a></li>
              <li><a class="dropdown-item neon-text" href="/category/MSI">MSI</a></li>
              <li><a class="dropdown-item neon-text" href="/category/LENOVO">LENOVO</a></li>
              <li><a class="dropdown-item neon-text" href="/category/HP">HP</a></li>
              <li><a class="dropdown-item neon-text" href="/category/AXIOO">AXIOO</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
        <input id="navbar-search" class="form-control neon-input rounded-pill px-4 py-2" type="search" placeholder="Search..." aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
</div>

<script>
    document.getElementById('navbar-search').addEventListener('input', function () {
        const keyword = this.value.toLowerCase();
        const cards = document.querySelectorAll('.futuristic-card');

        cards.forEach(card => {
            const title = card.querySelector('.futuristic-title').textContent.toLowerCase();
            if (title.includes(keyword)) {
                card.closest('.col-md-4').style.display = 'block';
            } else {
                card.closest('.col-md-4').style.display = 'none';
            }
        });
    });
</script>


<style>
  :root {
    --neon-color: #00cc7a;
  }

  .nav-link.active {
    color: var(--neon-color) !important;
    text-shadow: 0 0 5px var(--neon-color), 0 0 10px var(--neon-color);
  }

  .nav-link.active:hover {
  color: #00f0f0 !important;
  text-shadow: 0 0 10px #00f0f0, 0 0 20px #00f0f0 !important;
}


  #navbar-search::placeholder {
    color: var(--neon-color);
    opacity: 1;
    text-shadow: 0 0 5px var(--neon-color), 0 0 10px var(--neon-color);
}


  .bg-dark {
    background-color: #121212;
  }

  .neon-text {
    color: var(--neon-color);
    text-shadow: 0 0 5px var(--neon-color), 0 0 10px var(--neon-color);
    transition: all 0.3s ease;
  }

  .neon-text:hover {
    color: #00f0f0;
    text-shadow: 0 0 10px #00f0f0, 0 0 20px #00f0f0;
  }

  .neon-input {
    background-color: #1a1a1a;
    color: var(--neon-color);
    border: 2px solid var(--neon-color);
    outline: none;
    box-shadow: 0 0 5px var(--neon-color), 0 0 10px var(--neon-color);
    transition: all 0.3s ease;
  }

  .neon-input:focus {
    box-shadow: 0 0 10px var(--neon-color), 0 0 20px var(--neon-color);
  }

  .neon-btn {
    background-color: var(--neon-color);
    color: #121212;
    border: none;
    box-shadow: 0 0 5px var(--neon-color), 0 0 20px var(--neon-color);
    transition: all 0.3s ease;
  }

  .neon-btn:hover {
    background-color: #00f0f0;
    box-shadow: 0 0 10px #00f0f0, 0 0 30px #00f0f0;
  }

  .dropdown-menu {
    border: none;
    background-color: #1a1a1a;
  }

  .dropdown-item {
    color: var(--neon-color);
  }

  .dropdown-item:hover {
    background-color: #333333;
    color: #00f0f0;
  }

  .navbar.fixed-top {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1050;
  }

  body {
    padding-top: 70px;
  }

  .container-fluid {
    z-index: 0;
  }
</style>