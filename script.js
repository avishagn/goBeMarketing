
$('body').ready(function () {
    $.ajax({
        type: "POST",
        url: "backend/conect.php",
        success: function (res) {
            if (res) {
                var mywin = window.open(res);
               mywin.close();
                $('#msH3').html('Please enter a new LEAD');
            } else
                $('#msH3').html('Error in conection');
        }
    });
});


$('#submit').on('click', function () {
     
    $('#errorFname').html('');
    $('#errorLname').html('');
    $('#errorPhone').html('');
    $('#errorEmail').html('');


    var nameRegex = /^([a-zA-Z']{2,})$/;
    var emailRegex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i;
    var phoneRegex = /^(?:0(?!(5|7))(?:2|3|4|8|9))(?:-?\d){7}$|^(0(?=5|7)(?:-?\d){9})$/;
    var valid = true;

    var fname = $('#fname').val().trim();
    var lname = $('#lname').val().trim();
    var phone = $('#phone').val().trim();
    var email = $('#email').val().trim();

    if (!fname || !nameRegex.test(fname)) {
        $('#errorFname').html('* A valid first name is required');
        valid = false;
    }
    if (!lname || !nameRegex.test(lname)) {
        $('#errorLname').html('* A valid last name is required');
        valid = false;
    }
    if (!phone || !phoneRegex.test(phone)) {
        $('#errorPhone').html('* A valid phone is required');
        valid = false;
    }
    if (!email || !emailRegex.test(email)) {
        $('#errorEmail').html('* A valid email is required');
        valid = false;
    }

    if (valid) {
        $('#msH4').html("Please wait will proceesing");
        $.ajax({
            type: "POST",
            url: "backend/addLead.php",
            data: {func: 'addLead', fname: fname, lname: lname, phone: phone, email: email},
            success: function (res){ 
                $('#msH4').html(res);
            },
            error: function (jqXHR) {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        });
    }
});

