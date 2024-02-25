

$(document).ready( function () {
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

