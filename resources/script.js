$(document).ready(function(){
    // Mod queue form interface
    $('.offence_button').click(function(event){
        $('.offence_button').removeClass('active');
        $(this).addClass('active');
        var offence = parseInt($(this).attr('offence'));
        var real_report = $(this).attr('real_report');
        $('#offence_input').val(offence);
        // No offence, no action needed
        if (offence === 1) {
            $('#queue_form').submit();
        }
        else {
            $('#action_parent').show();
            window.scrollTo(0,document.body.scrollHeight);
        }
    });

    $('.real_report_button').click(function(event){
        $('#real_report_form').submit();
    });

    $('.action_button').click(function(event){
        $('.action_button').removeClass('active');
        $(this).addClass('active');
        $('#action_input').val($(this).attr('action'));
        $('#queue_form').submit();
    });

    // Login switch
    $('#show_login').click(function(){
        $('#show_login').hide();
        $('#new_user_parent').hide();
        $('#login_parent').show();
    });

    // Embedica converting urls to embeds
    $('.embedica_this').each(function(){
        var content = $(this).html();
        content = embedica(content);
        $(this).html(content);
    });

    // Sometimes I like to lay on the floor and pretend I'm a carrot
    console.log(
        '%c Hello World! If you would like to contribute to this project, or find any bugs or vulnerabilities, please look for the project in https://github.com/goosehub or contact me at goosepostbox@gmail.com',
        'font-size: 1.2em; font-weight: bold; color: #6666cc;'
    );
});