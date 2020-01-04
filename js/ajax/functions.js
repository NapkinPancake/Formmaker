let sortBy = 'id';

$(document).ready(function() {
    loadTable();
})


//// SEND FORM BUTTON ////
$(document).on('click', '#sendFormBtn', function() {

    let form = $('#addForm');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success: function() {
            loadTable();
            clearForm();
            //$("#addForm").trigger('reset');
        }
    });
});

function loadTable() {
    $("#tableplace").empty();
    $("#tableplace").load('php/functions/load_table.php?sortBy=' + sortBy + '');
}


/// DELETE ROW BUTTON////
$(document).on('click', '.deleteBtn', function() {
    let id = $(this).attr("id");
    console.log('Fuck');

    $.ajax({
        url: 'php/DB/delete.php?id=' + id,
        success: function() {
            loadTable();
        }
    })

});

////// CLEAR FORM //////
function clearForm() {
    console.log($('#formDiv').attr('name'))
    if ($('#formDiv').attr('name') == 'dataSaved') {
        $("#addForm").trigger('reset');
    }
}



/// TABLE SORT //////
$(document).on('click', '#sortByCreating', function() {
    sortBy = 'created_at';
    loadTable();
});

$(document).on('click', '#sortByCompleting', function() {
    sortBy = 'date';
    loadTable();
});


////// LIVE SEARCH ///////
$(function() {
    $('.search').on("keyup", function() {
        if (this.value.length >= 1) {
            $.ajax({
                type: 'POST',
                url: "php/functions/search.php",
                data: { search: this.value },
                success: function(data) {
                    $("#tableplace").html(data);
                }
            })
        } else {
            loadTable();
        }
    })

})


///// DATEPICKER /////
$(function() {
    $("#datepicker").datepicker({
        dateFormat: 'dd.mm.y'
    });
});

///// EMAIL MASK
$(document).ready(function() {
    $("#emailForm").inputmask("email")
});