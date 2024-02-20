 <!-- partial:partials/_navbar.html -->
      <nav class="navbar">
        <a href="#" class="sidebar-toggler">
        <i class="bi bi-chevron-left"></i>
        </a>
        <div class="navbar-content mt-3">
            <div class="calendar_main">
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
        
        <div class="navbar-content2 mt-3">
          <div class="dropdown">
            <button class="btn btn-sm border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Calendar
            </button>
            <ul class="dropdown-menu">
              <li class="mb-2" style="margin-left: 3px;">
                <div class="calendar_main">
                  <i class="bi bi-calendar4 header-calendar-icon2 btn btn-sm border" id="header_cicon2"></i>
                  <input type="text" name="dates2" class="btn btn-sm border header-calendar" id="header_c"/>   <!-- giving specific value="01/01/2018 - 01/15/2018" -->
                  <script>
                    $('input[name="dates2"]').daterangepicker();

                    $('#header_cicon2').click(function () {
                        $('input[name="dates2"]').click();
                    })

                    $('.dropdown-menu').on('click', function (e) {
                      e.stopPropagation();
                    })

                    $('.daterangepicker').on('click', function (e) {
                      e.stopPropagation();
                    })
                  </script>
                </div>
              </li>
              <li class="mb-2" style="margin-left: 3px;">
                <div>
                  <button class="btn btn-sm border">Search Date</button>
                </div>
              </li>
              <li class="mb-2" style="margin-left: 3px;">
                <div>
                  <button class="btn btn-sm border">Reset Date</button>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

