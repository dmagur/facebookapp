<script>
    function checkLoginState(){
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }

    function statusChangeCallback(response){
        console.log(response);
        if (response.status == 'connected') {
            $.ajax({
                url: "?action=facebook-status-change",
                method: "POST",
                data: response
            }).done(function (data) {
                data = jQuery.parseJSON(data)
                if (data.status == 'connected') {
                    document.location = '?action=home';
                }
            });
        }
    }
</script>
<div class="row">
    <h1>Social Sweethearts</h1>
    <div class="col-md-4 col-md-offset-4">
        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
        </fb:login-button>
    </div>
</div>