<section class="add-user">
    <button onclick="openUserContactOrGroupAddPanel()" id="new-chat-button">
        <i class="fa-solid fa-comment-medical"></i>
    </button>
</section>

<section class="add-user-add-contact-add-group-panel" id="add-user-add-contact-add-group-panel">
    <div class="add-user-contact-group-panel" id="add-user-contact-group-panel">
        <div class="select-option-user-contact-group-panel">
            <p>Select Option</p>
            <i class="fa-solid fa-xmark" onclick="openUserContactOrGroupAddPanel()"></i>
           
        </div>
        <div class="user-contact-group-options-list">
            <div class="option" onclick="openAddnewChat()">
                <div class="option-image-name">
                    <div class="option-image">
                        <i class="fa-regular fa-square-plus"></i>
                    </div>
                    <div class="option-name">
                        <p class="title">New chat</p>
                        <p class="subtitle">Send a message to your contact</p>
                    </div>
                </div>
                <div class="option-arrow-or-checker"><svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg></div>
            </div>
            <div class="option">
                <div class="option-image-name">
                    <div class="option-image">
                        <i class="fa-solid fa-qrcode"></i>
                    </div>
                    <div class="option-name">
                        <p class="title">Share</p>
                        <p class="subtitle">Share Your contact to friends</p>
                    </div>
                </div>
                <div class="option-arrow-or-checker"><svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg></div>
            </div>
            <div class="option">
                <div class="option-image-name">
                    <div class="option-image">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="option-name">
                        <p class="title">New Group</p>
                        <p class="subtitle">Join the community arround you</p>
                    </div>
                </div>
                <div class="option-arrow-or-checker"><svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg></div>
            </div>

        </div>
</section>