<nav class="menu">
  <div class="menu-inner">
    <div class="menu-inner-tit">
      <div class="button" onclick="openChat()">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="chat" class="icon glyph" fill="#ffffff"
          stroke="#ffffff" transform="matrix(-1, 0, 0, 1, 0, 0)">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <path
              d="M12,2C6.49,2,2,6,2,11s4.49,9,10,9a10.9,10.9,0,0,0,3-.41l4.59,2.3A.91.91,0,0,0,20,22a1,1,0,0,0,1-1.24l-1.06-4.25A8.45,8.45,0,0,0,22,11C22,6,17.51,2,12,2Z"
              style="fill:#a7afbe"></path>
          </g>
        </svg>
        <span class="menu-button-text">Chats</span>
      </div>
      <div class="button" onclick="">
        <svg fill="#a7afbe" width="100px" height="100px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
          id="clock" class="icon glyph">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <path
              d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm2.55,13.83A.94.94,0,0,1,14,16a1,1,0,0,1-.83-.45l-2-3A1,1,0,0,1,11,12V7a1,1,0,0,1,2,0v4.7l1.83,2.75A1,1,0,0,1,14.55,15.83Z">
            </path>
          </g>
        </svg>
        <span class="menu-button-text">Explore</span>
      </div>
      <div class="button" onclick="openCall()">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="phone-out" class="icon glyph" fill="#000000">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <path d="M21,15v3.93a2,2,0,0,1-2.29,2A18,18,0,0,1,3.14,5.29,2,2,0,0,1,5.13,3H9a1,1,0,0,1,1,.89,10.74,10.74,0,0,0,1,3.78,1,1,0,0,1-.42,1.26l-.86.49a1,1,0,0,0-.33,1.46,14.08,14.08,0,0,0,3.69,3.69,1,1,0,0,0,1.46-.33l.49-.86A1,1,0,0,1,16.33,13a10.74,10.74,0,0,0,3.78,1A1,1,0,0,1,21,15Z
              M21,10a1,1,0,0,1-1-1,5,5,0,0,0-5-5,1,1,0,0,1,0-2,7,7,0,0,1,7,7A1,1,0,0,1,21,10Z
              M17,10a1,1,0,0,1-1-1,1,1,0,0,0-1-1,1,1,0,0,1,0-2,3,3,0,0,1,3,3A1,1,0,0,1,17,10Z">
            </path>
          </g>
        </svg>
        <span class="menu-button-text">Calls</span>
      </div>
      <div class="button" onclick="openProfile();">
        <svg width="100px" height="100px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
          viewBox="0 0 24 24">
          <path fill-rule="evenodd"
            d="M12 20a8 8 0 0 1-5-1.8v-.6c0-1.8 1.5-3.3 3.3-3.3h3.4c1.8 0 3.3 1.5 3.3 3.3v.6a8 8 0 0 1-5 1.8ZM2 12a10 10 0 1 1 10 10A10 10 0 0 1 2 12Zm10-5a3.3 3.3 0 0 0-3.3 3.3c0 1.7 1.5 3.2 3.3 3.2 1.8 0 3.3-1.5 3.3-3.3C15.3 8.6 13.8 7 12 7Z"
            clip-rule="evenodd" />
        </svg>
        <span class="menu-button-text">Profile</span>
      </div>
    </div>
  </div>
</nav>
<style>
  .menu {
    background-color: var(--cl-3);
    position: fixed;
    bottom: 0;
    z-index: 100;
    box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.1);
    width: 100%;
    padding: 10px 20px 15px 20px;
  }

  .menu-inner-tit {
    display: flex;
    justify-content: space-between;
  }

  .menu-inner-tit .button {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 50px;
  }

  .menu-inner-tit .button .menu-button-text {
    font-size: var(--f-0-7em);
    color: var(--cl-15);
  }

  .menu-inner-tit .button svg {
    width: 25px;
    fill: var(--cl-15);
    height: 25px;
    display: flex;
    align-items: center;
  }

  .menu-inner-tit .button svg path {
    transition: fill 0.2s;
  }

  /* 
  .menu-inner-tit .button:nth-child(1) svg path {
    fill: var(--cl-26) !important;
  } */
</style>