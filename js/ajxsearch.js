$(document).ready(function(){
    function fetchResults() {
        var formData = $('#filterForm').serialize();
        $.ajax({
            url: 'ajxfilter.php',
            type: 'POST',
            data: formData,
            success: function(data){
                $('#searcContent').html(data);
            }
        });
    }

    $('#filterForm').on('submit', function(e){
        e.preventDefault();
        fetchResults();
    });

    $('#filterForm input[name="search"]').on('keyup', function(){
        fetchResults();
    });


    fetchResults();
});