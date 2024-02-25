

$(document).ready( function () {
    $('.display thead th').each(function () {
        var title = $(this).text();
        $(this).html(title+' <input type="text" class="col-search-input search_table" placeholder="Search ' + title + '" />');
    });

    $(".display").DataTable({
        order: [[0, "desc"]],
        initComplete: function () {
            this.api().columns().every( function () {

            var that = this;

            $('input', this.header()).on('keyup change clear', function () {
                if ( that.search() !== this.value) {
                    that.search( this.value ).draw();    
                }
                });
            });
        }
    });
});

