 <!-- partial:partials/_navbar.html -->
      <nav class="navbar">
        <a href="#" class="sidebar-toggler">
        <i class="bi bi-chevron-left"></i>
        </a>
        <div class="navbar-content mt-3">
            <div style="margin-left: 10px;">
            <i class="bi bi-calendar4 header-calendar-icon" id="header_cicon"></i>
            <input type="text" name="dates" class="btn btn-sm border header-calendar" id="header_c"/>   <!-- giving specific value="01/01/2018 - 01/15/2018" -->
            <script>
              $('input[name="dates"]').daterangepicker();

              $('#header_cicon').click(function () {
                  $('input[name="dates"]').click();
              })
            </script>
            </div>

            <div style="margin-left: 10px;">
            <button class="btn btn-sm border">Search Date</button>
            </div>

            <div style="margin-left: 10px;">
            <button class="btn btn-sm border">Reset Date</button>
            </div>
        </div>
      </nav>

