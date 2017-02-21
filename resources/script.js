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
            submit_review();
        }
        else {
            $('#action_parent').show();
            window.scrollTo(0,document.body.scrollHeight);
        }
    });

    function submit_review() {
        $('#queue_form').submit();
    }

    $('#queue_form').on('submit', function(e){
        var url = 'new_review';
        $.ajax({
            type: "POST",
            url: url,
            data: $('#queue_form').serialize(),
            success: function(data)
            {
                // Try to parse, fail gracefully
                try {
                    response = JSON.parse(data);
                } catch(error) {
                    alert('Something went wrong. Please let me know at goosepostbox@gmail.com.');
                    // alert(error);
                }
                if (!response) {
                    return false;
                }

                // debug
                console.log('Review submitted, new post returned');
                console.log(response);

                // Update Feedback
                $('#action_parent').fadeOut(200);
                $('#review_result_alert').removeClass('alert-info', 'alert-success', 'alert-danger');
                $('#review_result_alert').addClass(response.review_result.class);

                // Update View
                $('#queue_post_id_label, #real_report_form_post_id').html(response.post.id);
                $('#queue_post_username').html(response.post.username);
                var content = embedica(response.post.content);
                $('#queue_post_content').html(content);
                $('#queue_post_time_ago').html(response.post.time_ago);
                $('#review_result_alert').html(response.review_result.message);

                // Update Score
                $('#streak_value').html(parseInt($('#streak_value').html()) + 1);
                $('#accuracy_value').html(response.new_accuracy);
                if (response.review_result.bool) {
                    $('#pass_value').html(parseInt($('#pass_value').html()) + 1);
                }
                else {
                    $('#fail_value').html(parseInt($('#fail_value').html()) + 1);
                }

                // Update Inputs
                $('#queue_post_id').val(response.post.id)
                $('#offence_input').val();
                $('#action_input').val();
            }
        });
        e.preventDefault();
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