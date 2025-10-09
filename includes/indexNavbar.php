
<div id="header">
    <div class="container">
        <!-- Left side: Logo + Navbar -->
        <div class="header-left">
            <div class="logo-container">
                <img src="../assets/images/logo.png" alt="logo">
                <h3>BD Online Job Protocol</h3>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../findJobs.php">Find Jobs</a></li>
                    <li><a href="../browseCompanies.php">Browse Companies</a></li>
                    <li><a href="../cv.php">Post CV</a></li>
                    <li>
                      <a href="../bdjobs_pro.php" class="bdjobs-pro">
                        <span class="bdjobs">jobs</span>
                         <span class="pro">PRO</span>
                              </a>
                                </li>

                </ul>
            </nav>
        </div>

        <!-- Right side: User + Language -->
        <div class="header-right">
            <?php
            session_start();
            if (isset($_SESSION['email'])) {
                $username = explode('@', $_SESSION['email'])[0];
                echo '<div class="dropdown">';
                echo '<button class="dropdown-btn">Hi, ' . htmlspecialchars($username) . '!</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="../dashboard/dashboard.php"><i class="fa-solid fa-table-cells-large"></i> Dashboard</a>';
                echo '<a href="../dashboard/editProfile.php"><i class="fa-solid fa-user"></i> My Profile</a>';
                echo '<a href="../process/logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a href="../login.php" class="btn">Sign In/up</a>';
            }
            ?>

            <!-- Language Buttons -->
            <button class="lang-btn" onclick="translateTo('en')">English</button>
            <button class="lang-btn" onclick="translateTo('bn')">বাংলা</button>
        </div>
    </div>
</div>

<!-- Google Translate hidden element -->
<div id="google_translate_element" style="display:none;"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
function translateTo(lang) {
    const select = document.querySelector("select.goog-te-combo");
    if (!select) return;
    select.value = lang;
    select.dispatchEvent(new Event("change"));
}
</script>

</body>
</html>
