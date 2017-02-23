// See scripts.php for some global scope variables from the server
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
        // Empty and hide while we white
        $('#review_result_alert').removeClass('alert-info alert-success alert-danger');
        $('#review_result_alert').html('...');

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

                // Debug
                console.log('Review submitted, new post returned');
                console.log(response);

                // Update Feedback
                $('#action_parent').fadeOut(200);
                $('#review_result_alert').fadeIn(500);
                $('#review_result_alert').addClass(response.review_result.class);
                $('#review_result_alert').html(response.review_result.message);
                if (response.review_result.bool) {
                    $('#review_result_alert').prepend(' <span class="glyphicon glyphicon-ok-sign"></span> ');
                }
                else {
                    $('#review_result_alert').prepend(' <span class="glyphicon glyphicon-remove-sign"></span> ');
                }

                // Update View
                if (!response.post) {
                    $('#queue_empty_parent').show();
                    $('#queue_post_parent').hide();
                }
                else {
                    $('#queue_post_id_label, #real_report_form_post_id').html(response.post.id);
                    $('#queue_post_username').html(response.post.username);
                    $('#queue_post_content').hide();
                    // Embedica for embedding URLs
                    var content = embedica(response.post.content);
                    // Greentext, only takes effect when postMessage class exists
                    $('#queue_post_content').html(content);
                    $(".postMessage").greentext();
                    $('#queue_post_content').fadeIn(200);
                    $('#queue_post_time_ago').html(response.post.time_ago);
                }

                // Update Score
                var streak_value = parseInt($('#streak_value').html());
                var pass_value = parseInt($('#pass_value').html());
                var fail_value = parseInt($('#fail_value').html());
                $('#accuracy_value').html(response.new_accuracy);
                $('#streak_value').html(streak_value + 1);
                if (response.review_result.bool) {
                    $('#pass_value').html(pass_value + 1);
                }
                else {
                    $('#fail_value').html(fail_value + 1);
                }

                // Suggest account at following conditions
                if (!user.logged_in && pass_value + fail_value === suggest_account_at) {
                    $('#suggest_account_parent').show();
                }

                // Update Inputs
                if (response.post) {
                    $('#queue_post_id').val(response.post.id)
                }
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