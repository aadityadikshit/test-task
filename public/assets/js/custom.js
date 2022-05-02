$(function() {
    $('#posts-data').DataTable();
} );

// Registration form code
$('#registration-frm').validate({
    // Specify validation rules
    rules: {
        registerName: "required",
        registerEmail: {
            required: true,
            email: true
        },
        registerAddress1:"required",
        registerAddress2:"required",
        registerCity:"required",
        registerCountry:"required",
        password: {
            required: true,
            minlength: 6
        },
        password_confirmation : {
            minlength : 6,
            equalTo : "#password"
        }
    },
    // Specify validation error messages
    messages: {
        registerName: "Please enter your name",
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
        },
        registerEmail: "Please enter a valid email address",
        registerAddress1: "Please enter Address 1",
        registerAddress2: "Please enter Address 2",
        registerCity: "Please enter a valid City",
        registerCountry: "Please enter a calid Country"
    },
});

$('#signin').on('click',function(){
    if($("#registration-frm").valid()){
        $.ajax({
            type: 'POST',
            url: '/setregistration',
            data: $("#registration-frm").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'JSON',
            success: function (data) {
                console.log("DATAAA: "+data);
                if(data==1){
                    $('#registration-frm').trigger("reset");
                    $('#messages').html('User registered successfully!');
                    setTimeout(function() {
                        $('#messages').html('');
                        window.location.href = "http://local.test-task.com/login";
                    }, 2000);
                }else{
                    $('#messages').html('User already exists');
                    setTimeout(function() {
                        $('#messages').html('');
                    }, 2000);
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    }
});

// Add post form code
$('#add-post-frm').validate({
    // Specify validation rules
    rules: {
        posttitle: "required",
        postbody: "required"
    },
    // Specify validation error messages
    messages: {
        posttitle: "Please enter the Title",
        postbody: "Please enter the Body"
    },
});

$('#addpost-btn').on('click',function(){
    if($("#add-post-frm").valid()){
        $.ajax({
            type: 'POST',
            url: '/submitpost',
            data: $("#add-post-frm").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'JSON',
            success: function (data) {
                if(data==1){
                    $('#add-post-frm').trigger("reset");
                    $('#messages').html('Post added Successfully!');
                    setTimeout(function() {
                        $('#messages').html('');
                        window.location.href = "http://local.test-task.com/dashboard";
                    }, 1000);
                }else{
                    $('#messages').html('Something went wrong!');
                    setTimeout(function() {
                        $('#messages').html('');
                    }, 1000);
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    }
});

//Edit post code
// $('#editpost-btn').validate({
//     // Specify validation rules
//     rules: {
//         editposttitle: "required",
//         editpostbody: "required"
//     },
//     // Specify validation error messages
//     messages: {
//         editposttitle: "Please enter the Title",
//         editpostbody: "Please enter the Body"
//     },
// });

// $('#editpost-btn').on('click',function(){
//     if($("#edit-post-frm").valid()){
//         $.ajax({
//             type: 'POST',
//             url: '/updatepost',
//             data: $("#edit-post-frm").serialize(),
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             dataType: 'JSON',
//             success: function (data) {
//                 if(data==1){
//                     // $('#add-post-frm').trigger("reset");
//                     $('#messages').html('Post edited Successfully!');
//                     setTimeout(function() {
//                         $('#messages').html('');
//                         window.location.href = "http://local.test-task.com/dashboard";
//                     }, 1000);
//                 }else{
//                     $('#messages').html('Something went wrong!');
//                     setTimeout(function() {
//                         $('#messages').html('');
//                     }, 1000);
//                 }
//             },
//             error: function (data) {
//                 console.log('An error occurred.');
//                 console.log(data);
//             },
//         });
//     }
// });


// Delete post code
$('.delete-post').on('click',function(){
    var removerecord = $(this).attr('data-value');
    $.ajax({
        type: 'POST',
        url: '/deletepost',
        data: {
            "_token": $('#token').val(),
            "removerecord": removerecord
        },
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // },
        dataType: 'JSON',
        success: function (data) {
            if(data==1){
                $('#messages').html('Post Deleted Successfully!');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }else{
                $('#messages').html('Something went wrong!');
                setTimeout(function() {
                    $('#messages').html('');
                }, 1000);
            }
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });
});
