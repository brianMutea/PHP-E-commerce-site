<div class="to-top">
      <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fas fa-chevron-up"></i>
      </button>
    </div>
    <div class="footer">&copy; KimberlyShopping <span id='year'></span>. All rights reserved.</div>
  </body>
  <script>
    year = document.getElementById('year');
    year.textContent = new Date().getFullYear();
  </script>
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/app.js"></script>
</html>
