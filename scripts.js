$(document).ready(function () {

    // FILTER CAR CATEGORIES
    $("#category" ).change(function() {
        var selectedVal = $(this).find(':selected').val();
        $.ajax({
            url: 'server.php',
            type: 'GET',
            data: {
                'filter': 1,
                'pattern': selectedVal,
            },
            success: function(response) {
                $('#car-container').html(response);
            }
        });
    });


    // INSERT CAR INTO DATABASE
    $(document).on('click', '#submit_btn', function() {
        $.ajax({
            url: 'server.php', // serverside php script is in this file too
            type: 'POST',
            data: {
                'save': 1,
                // getting field values from the form
                'category': $('#category').val(),
                'model': $('#model').val(),
                'engine_power': $('#engine_power').val(),
                'fuel': $('#fuel').val(),
                'year': $('#year').val(),
                'color': $('#color').val(),
                'price': $('#price').val(),
            },
            success: function(response) {
                // clear form fields
                $('#newcar').trigger("reset");
            }
        });
    });


    // DELETE CAR FROM DATABASE
    $(document).on('click', '.delete', function () {
        // get wrapper div of the deletable element
        $deletable_car = $(this).closest('.card-wrapper');
        // send ajax GET call
        $.ajax({
            url: 'server.php',
            type: 'GET',
            data: {
                'delete': 1,
                // get data-id of deletable car
                'id': $(this).data('id'),
            },
            success: function(response) {
                // remove the deleted car's div from the page (without page reload necessary)
                $deletable_car.remove();
            }
        });
    });


    // START EDITING A CAR
    var edit_id;
    var $edit_car;
    $(document).on('click', '.modify', function () { //.card-wrapper for card click modify
        // get the data id of the selected entity
        edit_id = $(this).data('id');
        // get the wrapper class of the car entity
        $edit_car = $(this).closest('.card-wrapper');
        // place car fields in form
        $('#model').val( $($edit_car).find('.display_model').text() );
        $('#engine_power').val( $($edit_car).find('.display_engine_power').text() );
        $('#fuel').val( $($edit_car).find('.display_fuel').text() );
        $('#year').val( $($edit_car).find('.display_year').text() );
        $('#color').val( $($edit_car).find('.display_color').text() );
        $('#price').val( $($edit_car).find('.display_price').text() );
    });

    // UPDATE A CAR IN DATABASE
    $(document).on('click', '#update_btn', function () {
        $.ajax({
            url: 'server.php',
            type: 'POST',
            data: {
                'update': 1,
                // get the form input field values
                'id': edit_id,
                'model': $('#model').val(),
                'engine_power': $('#engine_power').val(),
                'fuel': $('#fuel').val(),
                'year': $('#year').val(),
                'color': $('#color').val(),
                'price': $('#price').val(),
            },
            success: function(response) {
                // clear form fields
                $('#updatecar').trigger("reset");
                // replace car div with the refreshed version (without page reload necessary)
                $edit_car.replaceWith(response);
            }
        });
    });

});