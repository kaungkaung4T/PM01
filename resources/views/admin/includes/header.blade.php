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
              $('input[name="dates"]').daterangepicker({
                  locale: {
                      cancelLabel: 'Clear'
                  }
              });

              $('#header_cicon').click(function () {
                  $('input[name="dates"]').click();
              })

              $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                  $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
              });

              $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                  let fullDate = new Date();
                  let twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
                  let twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" +twoDigitDate;
                  let currentDate = twoDigitMonth + "/" + twoDigitDate + "/" + fullDate.getFullYear();console.log(currentDate);

                  $('input[name="dates"]').val(currentDate + ' - ' + currentDate);

                  picker.setStartDate({})
                  picker.setEndDate({})
              });
            </script>
            </div>

            <div style="margin-left: 10px;">
            <button class="btn btn-sm border">Search Date</button>
            </div>

            <div style="margin-left: 10px;">
            <button class="btn btn-sm border" id="reset_date">Reset Date</button>
            <script>
                  let fullDate = new Date();
                  let twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
                  let twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" +twoDigitDate;
                  let currentDate = twoDigitMonth + "/" + twoDigitDate + "/" + fullDate.getFullYear();

                    $('#reset_date').on('click', function () {
                        $('input[name="dates"]').val(currentDate + ' - ' + currentDate);
                        $('.cancelBtn').click();
                    });
            </script>
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
                    $('input[name="dates2"]').daterangepicker({
                      locale: {
                      cancelLabel: 'Clear'
                    }
                    });

                    $('#header_cicon2').click(function () {
                        $('input[name="dates2"]').click();
                    })

                    $('.dropdown-menu').on('click', function (e) {
                      e.stopPropagation();
                    })

                    $('.daterangepicker').on('click', function (e) {
                      e.stopPropagation();
                    })

                    $('input[name="dates2"]').on('apply.daterangepicker', function(ev, picker) {
                        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                    });

                    $('input[name="dates2"]').on('cancel.daterangepicker', function(ev, picker) {
                      let fullDate2 = new Date();
                      let twoDigitMonth2 = ((fullDate2.getMonth().length+1) === 1)? (fullDate2.getMonth()+1) : '0' + (fullDate2.getMonth()+1);
                      let twoDigitDate2 = fullDate2.getDate()+"";if(twoDigitDate2.length==1)	twoDigitDate2="0" +twoDigitDate2;
                      let currentDate2 = twoDigitMonth2 + "/" + twoDigitDate2 + "/" + fullDate2.getFullYear();

                        $('input[name="dates2"]').val(currentDate2 + ' - ' + currentDate2);

                        picker.setStartDate({})
                        picker.setEndDate({})
                    });
              
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
                  <button class="btn btn-sm border" id="mobile_reset_date">Reset Date</button>
                  <script>
                      let fullDate2 = new Date();
                      let twoDigitMonth2 = ((fullDate2.getMonth().length+1) === 1)? (fullDate2.getMonth()+1) : '0' + (fullDate2.getMonth()+1);
                      let twoDigitDate2 = fullDate2.getDate()+"";if(twoDigitDate2.length==1)	twoDigitDate2="0" +twoDigitDate2;
                      let currentDate2 = twoDigitMonth2 + "/" + twoDigitDate2 + "/" + fullDate2.getFullYear();

                      $('#mobile_reset_date').on('click', function () {
                              $('input[name="dates2"]').val(currentDate2 + ' - ' + currentDate2);
                              $('.cancelBtn').click();
                      });
                  </script>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

