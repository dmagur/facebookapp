<script>
    function fb_logout() {
        FB.logout(function(response){
            document.location = '?action=logout';
        })
    }
</script>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="profile-userpic">
            <img src="<?php echo $data['user']['picture']; ?>" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php echo $data['user']['name']; ?>
            </div>
        </div>
        <div class="profile-userbuttons">
            <button type="button" class="btn btn-danger btn-sm" onclick="fb_logout();">Logout</button>
        </div>
    </div>
</div>