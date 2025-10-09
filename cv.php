<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Your CV - BD Online Job Protocol</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #f5f7fa;
    }

    /* Navbar */
    .navbar {
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 0.75rem 1rem;
    }
    .navbar-brand span {
      color: #0d6efd;
      font-weight: 600;
      font-size: 20px;
    }
    .nav-link.active {
      font-weight: 600;
      color: #0d6efd !important;
    }
    .btn-outline-primary:hover {
      background-color: #0d6efd;
      color: #fff;
    }

    /* Card & Form */
    .card {
      border-radius: 12px;
    }
    .card-header {
      font-size: 1.4rem;
      font-weight: 600;
      background-color: #0d6efd;
      color: #fff;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }
    #dropArea {
      border: 2px dashed #0d6efd;
      border-radius: 8px;
      padding: 40px;
      cursor: pointer;
      transition: 0.3s;
      background-color: #ffffff;
    }
    #dropArea.bg-light {
      background-color: #e9f2ff !important;
    }
    #dropArea p {
      margin: 0;
      color: #0d6efd;
      font-weight: 500;
    }
    #filePreview {
      font-weight: 500;
      font-size: 0.95rem;
      color: #0d6efd;
      margin-top: 10px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }

    /* Success message below form */
    #successMessage {
      font-weight: 500;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    #successMessage i {
      margin-right: 8px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="assets/images/logo.png" alt="logo" height="50">
      <span class="ms-2">BD Online Job Protocol</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Find Jobs</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Browse Companies</a></li>
        <li class="nav-item"><a class="btn btn-outline-primary ms-3" href="../login.php">Sign In / Up</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Post CV Form -->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="card shadow-sm">
        <div class="card-header">Post Your CV</div>
        <div class="card-body">
          <form id="cvForm" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="fullName" class="form-label">Full Name</label>
              <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Your Name" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="+8801XXXXXXXXX" required>
            </div>

            <!-- Drag & Drop CV Upload -->
            <div class="mb-3">
              <label class="form-label">Upload CV (PDF, DOCX)</label>
              <div id="dropArea" class="text-center">
                <p><i class="fa-solid fa-upload me-2"></i>Drag & drop your file here or click to select</p>
                <input type="file" name="cvFile" id="cvFile" class="form-control d-none" accept=".pdf,.doc,.docx" required>
                <div id="filePreview" class="text-truncate"></div>
              </div>
            </div>

            <div class="mb-3">
              <label for="coverLetter" class="form-label">Cover Letter</label>
              <textarea class="form-control" name="coverLetter" id="coverLetter" rows="4" placeholder="Write a brief cover letter..."></textarea>
            </div>

            <div class="mb-3">
              <label for="category" class="form-label">Job Category</label>
              <select class="form-select" name="category" id="category" required>
                <option value="">Select Category</option>
                <option value="IT">IT / Software</option>
                <option value="Marketing">Marketing</option>
                <option value="Finance">Finance</option>
                <option value="HR">Human Resources</option>
                <option value="Other">Other</option>
              </select>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg">Submit CV</button>
            </div>
          </form>

          <!-- Success message below form -->
          <div id="successMessage" class="alert alert-success mt-3 text-center d-none">
            <i class="fa-solid fa-circle-check"></i>Thank you! Your CV is submitted.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
const form = document.getElementById("cvForm");
const dropArea = document.getElementById('dropArea');
const cvFile = document.getElementById('cvFile');
const filePreview = document.getElementById('filePreview');
const successMessage = document.getElementById('successMessage');

// Drag & Drop functionality
dropArea.addEventListener('click', () => cvFile.click());
dropArea.addEventListener('dragover', (e) => { 
  e.preventDefault(); 
  dropArea.classList.add('bg-light'); 
});
dropArea.addEventListener('dragleave', () => dropArea.classList.remove('bg-light'));
dropArea.addEventListener('drop', (e) => {
  e.preventDefault();
  dropArea.classList.remove('bg-light');
  const files = e.dataTransfer.files;
  if(files.length){
    cvFile.files = files;
    filePreview.innerHTML = `<i class="fa-solid fa-file-lines me-2"></i>${files[0].name}`;
  }
});
cvFile.addEventListener('change', () => {
  if(cvFile.files.length){
    filePreview.innerHTML = `<i class="fa-solid fa-file-lines me-2"></i>${cvFile.files[0].name}`;
  }
});

// Form submission
form.addEventListener('submit', function(e){
  e.preventDefault(); // prevent page reload

  // Simulate server response (replace with real AJAX to submit_cv.php)
  setTimeout(() => {
    successMessage.classList.remove('d-none');
    successMessage.scrollIntoView({ behavior: "smooth" });

    form.reset();
    filePreview.textContent = '';

    // Hide message after 4 seconds
    setTimeout(() => successMessage.classList.add('d-none'), 4000);
  }, 200);
});
</script>

</body>
</html>
