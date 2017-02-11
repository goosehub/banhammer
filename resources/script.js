$(document).ready(function(){
    $('.offence_button').click(function(event){
        $('.offence_button').removeClass('active');
        $(event.target).addClass('active');
        var offence = $(event.target).attr('offence');
        $('#offence_input').val(offence);
        // No offence, assume no action
        console.log(offence);
        if (offence == parseInt(1)) {
            $('#action_input').val(1);
            $('#queue_form').submit();
        }
        else {
            $('#action_parent').show();
        }
    });

    $('.action_button').click(function(event){
        $('.action_button').removeClass('active');
        $(event.target).addClass('active');
        $('#action_input').val($(event.target).attr('action'));
        $('#queue_form').submit();
    });

    $('#show_login').click(function(){
        $('#show_login').hide();
        $('#new_user_parent').hide();
        $('#login_parent').show();
    });

    console.log(
        '%c Hello World! If you would like to contribute to this project, or find any bugs or vulnerabilities, please look for the project in https://github.com/goosehub or contact me at goosepostbox@gmail.com',
        'font-size: 1.2em; font-weight: bold; color: #6666cc;'
    );
});