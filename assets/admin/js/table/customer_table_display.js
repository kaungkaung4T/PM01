



$(document).ready( function () {
    $('.display thead th').each(function () {
        var title = $(this).text();

        // $(this).html(title+' <input type="text" style="display: none;" class="col-search-input search_table" placeholder="Search" />');

        $('.search_button1').on("click", function () {
            $('.search_group1').show();
            $('.search_group2').hide();
            $('.search_group3').hide();
            $('.col-search-input').val("");

            new DataTable('.display', {
                destroy: true,
                columnDefs: [ { orderable: false, targets: [3,4,9] },
                      { "orderSequence": [ "desc", "asc"], "targets": '_all' } ],
                order: [[0, "desc"]],
            });
        });

        $('.search_button2').on("click", function () {
            $('.search_group2').show();
            $('.search_group1').hide();
            $('.search_group3').hide();
            $('.col-search-input').val( '' );
            
            let table = new DataTable('.display', {
                destroy: true,
                columnDefs: [ { orderable: false, targets: [3,4,9] },
                      { "orderSequence": [ "desc", "asc"], "targets": '_all' } ],
                order: [[0, "desc"]],
            });
        });

        $('.search_button3').on("click", function () {
            $('.search_group3').show();
            $('.search_group1').hide();
            $('.search_group2').hide();
            $('.col-search-input').val("");

            new DataTable('.display', {
                destroy: true,
                columnDefs: [ { orderable: false, targets: [3,4,9] },
                      { "orderSequence": [ "desc", "asc"], "targets": '_all' } ],
                order: [[0, "desc"]],
            });
        });

        $('.table_search_button').on("click", function () {
            $('.search_group1').hide();
            $('.search_group2').hide();
            $('.search_group3').hide();
        });

        $('.table_search_close').on("click", function () {
            $('.search_group1').hide();
            $('.search_group2').hide();
            $('.search_group3').hide();
            $('.col-search-input').val("");

            new DataTable('.display', {
                destroy: true,
                columnDefs: [ { orderable: false, targets: [3,4,9] },
                      { "orderSequence": [ "desc", "asc"], "targets": '_all' } ],
                order: [[0, "desc"]],
            });
        })

        $('.table_search_reset').on("click", function () {
            $('.search_group1').hide();
            $('.search_group2').hide();
            $('.search_group3').hide();
            $('.col-search-input').val("");

            new DataTable('.display', {
                destroy: true,
                columnDefs: [ { orderable: false, targets: [3,4,9] },
                      { "orderSequence": [ "desc", "asc"], "targets": '_all' } ],
                order: [[0, "desc"]],
                
            });
            
        });
         
    });


    $('th').on("click", function (event) {
        if($(event.target).is(".stop_propagation")) {
            event.stopImmediatePropagation();
        }
        if($(event.target).is("div")) {
            event.stopImmediatePropagation();
        }
        if($(event.target).is("th")) {
            event.stopImmediatePropagation();
        }
    });


    var table = $(".display").DataTable({
        destroy: true,
        columnDefs: [ { orderable: false, targets: [3,4,9] },
                      { "orderSequence": [ "desc", "asc"], "targets": '_all' } ],
        order: [[0, "desc"]],
        initComplete: function () {
            this.api().columns().every( function () {

            var that = this;

            $('.search_table1', this.header()).on('keyup change clear', function () {
                that
                    .search( '' )
                    .columns().search( '' )
                    .draw();
                if ( that.search() !== this.value) {
                    that.search( this.value ).draw();    
                }
                });
            $('.search_table2', this.header()).on('keyup change clear', function () {
                that
                    .search( '' )
                    .columns().search( '' )
                    .draw();
                if ( that.search() !== this.value) {
                    that.search( this.value ).draw();
                       
                }
                });
            $('.search_table3', this.header()).on('keyup change clear', function () {
                that
                    .search( '' )
                    .columns().search( '' )
                    .draw();
                if ( that.search() !== this.value) {
                    that.search( this.value ).draw();    
                }
                });
            });
        }
    });


    // table.order.listener('#column_1', 1);



});

