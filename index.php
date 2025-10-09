<?php include "./includes/conn.php"; ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php"; ?>
  <?php include "./includes/indexChat.php"; ?>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <div class="container hero-container">
        <h3 class="hero-title">BD Online Job Protocol</h3>
        <div class="line line-dark"></div>
        <p class="hero-slogan">Find your dream job.</p>
      </div>
    </div>
  </section>

  <!-- Search Filter Section -->
  <section class="search-section">
    <div class="container">
      <form action="job-listings.php" method="GET" class="search-form">
        <div class="filter-group">
          <input type="text" name="keyword" placeholder="Job title or keyword" class="filter-input">
        </div>
        <div class="filter-group">
          <select name="job_type" class="filter-input">
            <option value="">Job Type</option>
            <option value="full-time">Full-time</option>
            <option value="part-time">Part-time</option>
            <option value="internship">Internship</option>
          </select>
        </div>
        <div class="filter-group">
          <select name="category" class="filter-input">
            <option value="">Category</option>
            <option value="it">IT</option>
            <option value="marketing">Marketing</option>
            <option value="finance">Finance</option>
          </select>
        </div>
        <div class="filter-group">
          <select name="location" class="filter-input">
            <option value="">Select Location</option>
            <option value="dhaka">Dhaka</option>
            <option value="chittagong">Chittagong</option>
            <option value="rajshahi">Rajshahi</option>
            <option value="khulna">Khulna</option>
            <option value="barishal">Barishal</option>
            <option value="sylhet">Sylhet</option>
            <option value="rangpur">Rangpur</option>
          </select>
        </div>
        <div class="filter-group">
          <button type="submit" class="btn btn-success">Search Jobs</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Home Page Content -->
  <div id="home-page">
    <!-- How It Works Section -->
    <section id="icon-boxes" class="section">
      <div class="container">
        <div class="section-headline">
          <h2>How It Works?</h2>
          <div class="line"></div>
          <p class="slogan-text">Discover the power of our job portal</p>
        </div>
        <div class="icon-boxes">
          <div class="icon-box">
            <div class="icon-circle"><i class="fa-solid fa-user-plus"></i></div>
            <h3>Create Account</h3>
            <p>Create your account and gain access to a world of job opportunities.</p>
          </div>
          <div class="icon-box">
            <div class="icon-circle"><i class="fa-solid fa-file-arrow-up"></i></div>
            <h3>Upload CV</h3>
            <p>Showcase your skills and experience by uploading your resume.</p>
          </div>
          <div class="icon-box">
            <div class="icon-circle"><i class="fa-solid fa-briefcase"></i></div>
            <h3>Apply Jobs</h3>
            <p>Search and apply for the jobs that match your career goals.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Counters Section -->
    <section id="counter-boxes" class="section">
      <div class="container">
        <div class="section-headline">
          <h2>Our Success</h2>
          <div class="line"></div>
          <p class="slogan-text">Connecting job seekers and employers, revolutionizing the way people find their dream careers</p>
        </div>
        <div class="counter-boxes">
          <div class="counter-box">
            <div class="counter-circle"><i class="fa-solid fa-briefcase"></i></div>
            <div class="counter-info">
              <h3><?php $sql="select * from applied_jobposts"; $query=$conn->query($sql); echo $query->num_rows; ?></h3>
              <p>Jobs</p>
            </div>
          </div>
          <div class="counter-box">
            <div class="counter-circle"><i class="fa-solid fa-users"></i></div>
            <div class="counter-info">
              <h3><?php $sql="select * from users"; $query=$conn->query($sql); echo $query->num_rows; ?></h3>
              <p>Job Candidates</p>
            </div>
          </div>
          <div class="counter-box">
            <div class="counter-circle"><i class="fa-solid fa-building"></i></div>
            <div class="counter-info">
              <h3><?php $sql="select * from company"; $query=$conn->query($sql); echo $query->num_rows; ?></h3>
              <p>Companies</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <div id="footer">
    <?php include 'includes/indexFooterWidgets.php'; ?>
    <?php include 'includes/footer.php'; ?>
  </div>
   <script src="./assets/js/chatbot.js">
    
   </script>

  <!-- CSS -->
  <style>
    /* Hero Section */
    .hero-section {
      position: relative;
      background: url('assets/images/job-banner.svg') center/cover no-repeat;
      min-height: 450px;   /* ensures minimum height */
      height: 85vh;        /* responsive height based on viewport */
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .hero-overlay {
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.26);
      z-index: 1;
    }
    .hero-content {
      position: relative;
      z-index: 2;
      color: #fff;
    }
    .hero-container h3.hero-title { 
      font-size: 32px; 
      font-weight: 700; 
      margin-bottom: 10px; 
    }
    .line.line-dark { width: 60px; height: 4px; background: #fff; margin: 10px auto 20px; }

    /* Hero Slogan Animation */
    .hero-slogan {
      font-size: 20px;
      font-weight: 500;
      color: #0d0d0dff;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeSlide 1.5s forwards;
      animation-delay: 0.9s;
    }
    @keyframes fadeSlide {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Search Section */
    .search-section {
      padding: 40px 0;
      background: #f4f4f47c;
    }
    .search-form {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
      align-items: center;
    }
    .filter-group { flex: 1 1 200px; }
    .filter-input {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 14px;
    }
    .btn-success {
      padding: 12px 20px;
      border-radius: 12px;
      font-size: 16px;
      background: #28a745;
      border: none;
      color: #fff;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn-success:hover { background: #218838; }

    @media(max-width:768px){
      .search-form { flex-direction: column; }
    }

    /* General Sections */
    .section { padding:80px 0; text-align:center; font-family:'Poppins', sans-serif; }
    .container { width:90%; max-width:1200px; margin:auto; }
    .section-headline h2 { font-size:2.5rem; font-weight:700; margin-bottom:10px; color:#222; }
    .section-headline .line { width:60px; height:4px; background:#007BFF; margin:10px auto 20px; }
    .slogan-text { font-size:1rem; color:#333; }

    /* Icon Boxes */
    .icon-boxes { display:flex; justify-content:center; gap:30px; flex-wrap:wrap; margin-top:40px; }
    .icon-box { background:#f9f9f9; padding:30px; border-radius:15px; width:260px; transition:0.3s ease; }
    .icon-box:hover { transform:translateY(-10px); box-shadow:0 10px 30px rgba(0,0,0,0.1); }
    .icon-circle { font-size:2.5rem; color:#007BFF; background:#e6f0ff; width:70px; height:70px; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; }
    .icon-box h3 { font-size:1.25rem; margin-bottom:10px; color:#222; }
    .icon-box p { font-size:0.95rem; color:#555; }

    /* Counter Boxes */
    .counter-boxes { display:flex; justify-content:center; gap:40px; flex-wrap:wrap; margin-top:40px; }
    .counter-box { background:#f9f9f9; padding:30px; border-radius:15px; width:200px; text-align:center; transition:0.3s; }
    .counter-box:hover { transform:translateY(-10px); box-shadow:0 10px 30px rgba(0,0,0,0.1); }
    .counter-circle { font-size:2.5rem; color:#007BFF; background:#e6f0ff; width:70px; height:70px; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; }
    .counter-info h3 { font-size:1.5rem; color:#222; margin-bottom:5px; }
    .counter-info p { font-size:0.95rem; color:#555; }
  </style>

</body>
</html>
