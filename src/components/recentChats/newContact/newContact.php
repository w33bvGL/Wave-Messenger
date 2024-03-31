<section class="new-contact-add" id="new-contact-add">
    <div class="new-contact-container-top-header">
        <i class="fa-solid fa-arrow-left" onclick="closeAddnewChat()"></i>
        <p>Add new contact</p>
    </div>
    <div class="select-search-option">
        <div class="new-contact-form">
            <label for="user-search-input">Username or email or phone</label>
            <input type="text" required id="user-search-input" placeholder="search..." name="username">
            <input type="hidden" value="<?php echo $decodedTokens->id; ?>" name="userId">
            <button id="send">Continue</button>
            <p id="or">or</p>
            <button id="scan-Qr"><i class="fa-solid fa-qrcode" aria-hidden="true"></i>Scan QR-code</button>
            <p id="scanning-instruction">ask a friend to open chats and click on the add button, then 2 item Share and
                show you the code so you can scan it</p>
        </div>
    </div>
</section>