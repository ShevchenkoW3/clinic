$(document).ready(function(){
    $('#login').blur(function(){
        login = document.getElementById('login').value;
        $.ajax({
            type: 'POST',
            url: 'login_check.php',
            data: ({login: login}),
            dataTypel: 'html',
            success: function(user){
                $('#result').html(user)
            }
        })
    })
})