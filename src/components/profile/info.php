<section class="profile-container">
    <div class="profile-user-conf">
        <div class="profile-conf-image-name">
            <div class="profile-conf-image">
                <i class="fa-solid fa-at"></i>
            </div>
            <div class="conf-name">
                <p><?php echo $decodedTokens->username; ?></p>
                <p>Username</p>
            </div>
        </div>
    </div>
    <div class="profile-user-conf">
        <div class="profile-conf-image-name">
            <div class="profile-conf-image">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="conf-name">
                <p><?php echo $decodedTokens->email; ?></p>
                <p>Email</p>
            </div>
        </div>
    </div>
    <div class="profile-user-conf">
        <div class="profile-conf-image-name">
            <div class="profile-conf-image">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="conf-name">
                <p><?php echo $decodedTokens->firstName . " " . $decodedTokens->lastName; ?></p>
                <p>Full name</p>
            </div>
        </div>
    </div>
    <div class="profile-user-conf">
        <div class="profile-conf-image-name">
            <div class="profile-conf-image">
                <i class="fa-solid fa-phone-volume"></i>
            </div>
            <div class="conf-name">
                <p><?php echo $decodedTokens->tell; ?></p>
                <p>tell</p>
            </div>
        </div>
    </div>
    <div class="profile-user-conf">
        <div class="profile-conf-image-name">
            <div class="profile-conf-image">
                <i class="fa-solid fa-fingerprint"></i>
            </div>
            <div class="conf-name">
                <p>ID: <?php echo $decodedTokens->id ?></p>
                <p>User ID</p>
            </div>
        </div>
    </div>
</section>