<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BD online job Protocol – Pricin</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root{
      --accent: #0d6efd;
      --bg-card: #ffffff;
      --muted: #6c757d;
      --footer-bg: #0b5ed7;
      --footer-text: #ffffff;
    }

    body{font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;}

    .navbar { box-shadow: 0 6px 18px rgba(13,110,253,0.08); font-weight: 600; }

    .plan-card{
      background-color: var(--bg-card);
      border-radius: 14px;
      transition: transform .25s ease, box-shadow .25s ease, background .25s ease, border-color .25s ease;
      padding: 28px;
      cursor: pointer;
      user-select: none;
      min-height: 320px;
    }

    .plan-card:hover{
      transform: translateY(-10px) scale(1.01);
      box-shadow: 0 18px 40px rgba(15,23,42,0.12);
    }

    .plan-card.active{
      border: 2px solid rgba(13,110,253,0.15);
      box-shadow: 0 22px 48px rgba(13,110,253,0.12);
      background: linear-gradient(135deg, rgba(13,110,253,0.06), rgba(13,110,253,0.02));
    }

    .plan-title{ font-weight:700; letter-spacing:.2px; }
    .plan-price{ font-weight:800; font-size:1.7rem; }
    .plan-features{ text-align:left; margin-top:1rem; color:var(--muted); }

    .best-badge{
      position: absolute; right: 18px; top: 16px; background: linear-gradient(90deg,var(--accent), #6610f2); color:#fff; padding:6px 10px; border-radius:999px; font-size:.8rem; box-shadow:0 8px 20px rgba(102,16,242,0.12);
    }

    .plan-card:focus{ outline: 3px solid rgba(13,110,253,0.12); }

    .muted-small{ color:var(--muted); font-size:.95rem; }
    .plan-card.dragged{ transform: translateY(-6px) scale(1.005); }

    footer{
      background-color: var(--footer-bg);
      color: var(--footer-text);
      text-align: center;
      padding: 1rem 0;
      font-weight: 500;
      letter-spacing: .5px;
    }

    @media (max-width:767px){ .plan-card{ min-height: auto; padding:20px; } }
  </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold fs-4" href="#">BD online Job Protocol</a>
  </div>
</nav>

<div class="container py-5">
  <div class="text-center mb-4">
    <h1 class="fw-bold">Choose Your Plan</h1>
    <p class="text-muted">Upgrade for more applications and premium features</p>
  </div>

  <div class="row g-4" id="plans">
    <!-- Free Plan -->
    <div class="col-md-3">
      <div class="plan-card card h-100 shadow-sm border-0" tabindex="0" data-plan="free">
        <div class="card-body">
          <h3 class="plan-title">Free</h3>
          <p class="plan-price">BDT 0</p>
          <p class="muted-small">Perfect to start — basic job posting & resume uploads.</p>
          <ul class="plan-features list-unstyled mt-3">
            <li>&#8226; 1 active job</li>
            <li>&#8226; Basic support</li>
            <li>&#8226; Resume upload</li>
          </ul>
          <form method="POST" action="your_backend_endpoint" class="mt-4" onpointerdown="event.stopPropagation()">
            <select name="payment_method" class="form-select mb-3" required>
              <option value="" selected disabled>Select Payment</option>
              <option value="bkash">bKash</option>
              <option value="nagad">Nagad</option>
              <option value="upay">Upay</option>
              <option value="card">Debit/Credit Card</option>
            </select>
            <button type="submit" class="btn btn-primary w-100">Select Payment</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Basic Plan -->
    <div class="col-md-3">
      <div class="plan-card card h-100 shadow-sm border-0" tabindex="0" data-plan="basic">
        <div class="card-body">
          <h3 class="plan-title">Basic</h3>
          <p class="plan-price">BDT 99</p>
          <p class="muted-small">For small employers — more visibility.</p>
          <ul class="plan-features list-unstyled mt-3">
            <li>&#8226; 5 active jobs</li>
            <li>&#8226; Priority listing</li>
            <li>&#8226; Email support</li>
          </ul>
          <form method="POST" action="your_backend_endpoint" class="mt-4" onpointerdown="event.stopPropagation()">
            <select name="payment_method" class="form-select mb-3" required>
              <option value="" selected disabled>Select Payment</option>
              <option value="bkash">bKash</option>
              <option value="nagad">Nagad</option>
              <option value="upay">Upay</option>
              <option value="card">Debit/Credit Card</option>
            </select>
            <button type="submit" class="btn btn-primary w-100">Select Payment</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Standard Plan -->
    <div class="col-md-3">
      <div class="plan-card card h-100 shadow border-primary position-relative active" tabindex="0" data-plan="standard">
        <div class="best-badge">Popular</div>
        <div class="card-body">
          <h3 class="plan-title text-primary">Standard</h3>
          <p class="plan-price text-primary">BDT 149</p>
          <p class="muted-small">Best value — balance of cost and features.</p>
          <ul class="plan-features list-unstyled mt-3">
            <li>&#8226; 15 active jobs</li>
            <li>&#8226; Featured listing</li>
            <li>&#8226; Chat support</li>
          </ul>
          <form method="POST" action="your_backend_endpoint" class="mt-4" onpointerdown="event.stopPropagation()">
            <select name="payment_method" class="form-select mb-3" required>
              <option value="" selected disabled>Select Payment</option>
              <option value="bkash">bKash</option>
              <option value="nagad">Nagad</option>
              <option value="upay">Upay</option>
              <option value="card">Debit/Credit Card</option>
            </select>
            <button type="submit" class="btn btn-primary w-100">Select Payment</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Premium Plan -->
    <div class="col-md-3">
      <div class="plan-card card h-100 shadow-sm border-0" tabindex="0" data-plan="premium">
        <div class="card-body">
          <h3 class="plan-title">Premium</h3>
          <p class="plan-price">BDT 199</p>
          <p class="muted-small">For serious recruiters — priority support & analytics.</p>
          <ul class="plan-features list-unstyled mt-3">
            <li>&#8226; Unlimited active jobs</li>
            <li>&#8226; Premium placement</li>
            <li>&#8226; Dedicated account manager</li>
          </ul>
          <form method="POST" action="your_backend_endpoint" class="mt-4" onpointerdown="event.stopPropagation()">
            <select name="payment_method" class="form-select mb-3" required>
              <option value="" selected disabled>Select Payment</option>
              <option value="bkash">bKash</option>
              <option value="nagad">Nagad</option>
              <option value="upay">Upay</option>
              <option value="card">Debit/Credit Card</option>
            </select>
            <button type="submit" class="btn btn-primary w-100">Select Payment</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<footer>
  &copy; 2025 BD Jobs Pro. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
(function(){
  const cards = document.querySelectorAll('.plan-card');
  let isDown = false;

  document.addEventListener('pointerdown', e => { if(!e.target.closest('form')) isDown = true; });
  document.addEventListener('pointerup', ()=> isDown = false);

  function hueFromX(x, width){
    const t = Math.max(0, Math.min(1, x/width));
    return Math.round(200 + t*120);
  }

  cards.forEach(card=>{
    card.addEventListener('pointermove', e=>{
      if(isDown){
        const rect = card.getBoundingClientRect();
        const hue = hueFromX(e.clientX - rect.left, rect.width);
        card.style.background = `linear-gradient(135deg, hsl(${hue}, 85%, 68%), hsl(${(hue+25)%360}, 80%, 58%))`;
        card.classList.add('dragged');
      }
    });
    card.addEventListener('pointerleave', ()=> card.classList.remove('dragged'));
    card.addEventListener('click', ()=>{
      cards.forEach(c=>c.classList.remove('active'));
      card.classList.add('active');
    });
  });
})();
</script>

</body>
</html>