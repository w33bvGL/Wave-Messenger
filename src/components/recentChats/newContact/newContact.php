
<section class="new-contact-add" id="new-contact-add">
    <div class="new-contact-container-top-header">
        <i class="fa-solid fa-arrow-left" onclick="closeAddnewChat()"></i>
        <p>Add new chat</p>
    </div>
    <div class="select-search-option">
        <form action="_inc/_user/searchUser.php" method="POST">
            <label for="user-search-input">Username</label>
            <input type="text" required id="user-search-input" placeholder="search..." name="username">
            <input type="hidden" value="<?php echo $decodedTokens->id; ?>" name="userId">
            <button type="submit">Search</button>
        </form>
    </div>
</section>