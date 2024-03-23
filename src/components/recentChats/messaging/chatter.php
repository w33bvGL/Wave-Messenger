<?php
$recipient = $_GET['userId'];
$currUser = $_GET['currUser'];
$userName = $_GET['username'];
$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$avatar = $_GET['avatarLink'];
$status = $_GET['status'];
?>
<div class="chatter-user-banner-top" id="user-banner-<?php echo $recipient ?>">
    <div class="back-vector"><svg onclick="openCloseChatWindow();" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="#4f5e7b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
        </svg></div>
    <div class="chatter-user-image-user-info">
        <div class="chatter-user-img-name-status">
            <div class="chatter-user">
                <img src="
                <?php 
                if ($avatar) {
                 echo $avatar;
                } else {
                echo "assets/images/waveUser/userNotLoaded.png";
                } 
                ?>" alt="waveChatter user">
            </div>
            <div class="chatter-info">
                <p class="chatter-info-username"><?php echo $firstName . ' ' . $lastName; ?></p>
                <p class="chatter-username"><?php echo $userName ?></p>
            </div>
        </div>
        <div class="chatter-call-videocall-info">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="m18.4 14.8-1.2-1.3a1.7 1.7 0 0 0-2.4 0l-.7.7a1.7 1.7 0 0 1-2.4 0l-1.9-1.9a1.7 1.7 0 0 1 0-2.4l.7-.6a1.7 1.7 0 0 0 0-2.5L9.2 5.6a1.6 1.6 0 0 0-2.4 0c-3.2 3.2-1.7 6.9 1.5 10 3.2 3.3 7 4.8 10.1 1.6a1.6 1.6 0 0 0 0-2.4Z" />
            </svg>
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M12 6h0m0 6h0m0 6h0" />
            </svg>
        </div>
    </div>

</div>
<div class="chatter-user-messages-box">
</div>
<div class="chatter-send-message-block">
    <div class="emoji-box">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 9h0M9 9h0m12 3a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM6.6 13a5.5 5.5 0 0 0 10.8 0H6.6Z" />
        </svg>
    </div>
    <form class="input-message-form-box" id="input-message-form-box">
        <input type="text" placeholder="Write a text..." id="chatter-input">
        <label for="chatter-file"><svg class="w-[33px] h-[33px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 8v8a5 5 0 1 0 10 0V6.5a3.5 3.5 0 1 0-7 0V15a2 2 0 0 0 4 0V8" />
            </svg></label>
        <input type="hidden" id="chatter-file">
        <button id="chatter-send-message-button" type="submit" onclick="sendMessageFromUser(<?php echo $recipient; ?>)"><svg style="transform: rotate(90deg);" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 2c.4 0 .8.3 1 .6l7 18a1 1 0 0 1-1.4 1.3L13 19.5V13a1 1 0 1 0-2 0v6.5L5.4 22A1 1 0 0 1 4 20.6l7-18a1 1 0 0 1 1-.6Z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>
</div>