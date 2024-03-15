<section class="add-user">
    <button onclick="openUserContactOrGroupAddPanel()" id="new-chat-button">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M4 3a1 1 0 0 0-1 1v8c0 .6.4 1 1 1h1v2a1 1 0 0 0 1.7.7L9.4 13H15c.6 0 1-.4 1-1V4c0-.6-.4-1-1-1H4Z"
                clip-rule="evenodd" />
            <path fill-rule="evenodd"
                d="M8 17.2h.1l2.1-2.2H15a3 3 0 0 0 3-3V8h2c.6 0 1 .4 1 1v8c0 .6-.4 1-1 1h-1v2a1 1 0 0 1-1.7.7L14.6 18H9a1 1 0 0 1-1-.8Z"
                clip-rule="evenodd" />
        </svg>
    </button>
</section>

<section class="add-user-add-contact-add-group-panel" id="add-user-add-contact-add-group-panel">
    <div class="add-user-contact-group-panel" id="add-user-contact-group-panel">
        <div class="select-option-user-contact-group-panel">
            <p>Select Option</p>
            <svg onclick="openUserContactOrGroupAddPanel()" class="w-[19px] h-[19px] text-gray-800 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24">
                <path stroke="#4f5e7b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 18 6m0 12L6 6" />
            </svg>
        </div>
        <div class="user-contact-group-options-list">
            <div class="option">
                <div class="option-image-name">
                    <div class="option-image">
                    <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 9h5m3 0h2M7 12h2m3 0h5M5 5h14c.6 0 1 .4 1 1v9c0 .6-.4 1-1 1h-6.6a1 1 0 0 0-.7.3l-2.9 2.5c-.3.3-.8.1-.8-.3V17c0-.6-.4-1-1-1H5a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Z"/>
  </svg>
                    </div>
                    <div class="option-name">
                        <p class="title">New chat</p>
                        <p class="subtitle">Send a message to your contact</p>
                    </div>
                </div>
                <div class="option-arrow-or-checker"><svg class="w-[19px] h-[19px] text-gray-800 dark:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 5 7 7-7 7" />
                    </svg></div>
            </div>
            <div class="option">
                <div class="option-image-name">
                    <div class="option-image">
                    <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11c.6 0 1 .4 1 1v16c0 .6-.4 1-1 1H7a1 1 0 0 1-1-1V4c0-.6.4-1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
  </svg>
                    </div>
                    <div class="option-name">
                        <p class="title">New contact</p>
                        <p class="subtitle">Add a contact to be able to send messages</p>
                    </div>
                </div>
                <div class="option-arrow-or-checker"><svg class="w-[19px] h-[19px] text-gray-800 dark:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 5 7 7-7 7" />
                    </svg></div>
            </div>
            <div class="option">
                <div class="option-image-name">
                    <div class="option-image">
                    <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3a2.5 2.5 0 1 1 2-4.5M19.5 17h.5c.6 0 1-.4 1-1a3 3 0 0 0-3-3h-1m0-3a2.5 2.5 0 1 0-2-4.5m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3c0 .6-.4 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
  </svg>
                    </div>
                    <div class="option-name">
                        <p class="title">New Group</p>
                        <p class="subtitle">Join the community arround you</p>
                    </div>
                </div>
                <div class="option-arrow-or-checker"><svg class="w-[19px] h-[19px] text-gray-800 dark:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 5 7 7-7 7" />
                    </svg></div>
            </div>
            
        </div>
</section>