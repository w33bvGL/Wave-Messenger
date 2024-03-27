<nav class="menu">
  <div class="menu-inner">
    <div class="menu-inner-tit">
      <div class="button" onclick="openChat()">
        <i class="fa-solid fa-comment"></i>
        <span class="menu-button-text">Chats</span>
      </div>
      <div class="button" onclick="openExplore()">
        <i class="fa-solid fa-clock"></i>
        <span class="menu-button-text">Explore</span>
      </div>
      <div class="button" onclick="openCall()">
        <i class="fa-solid fa-phone-volume"></i>
        <span class="menu-button-text">Calls</span>
      </div>
      <div class="button" onclick="openProfile();">
        <i class="fa-solid fa-circle-user"></i>
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
    border-top: 1px solid var(--cl-35);
    /* box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.1); */
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

  .menu-inner-tit .button i {
    font-size:  var(--f-1-2em);
    color: var(--cl-15);
    height: 25px;
    display: flex;
    align-items: center;
    transition: color 0.2s;
  }
  
  /* 
  .menu-inner-tit .button:nth-child(1) svg path {
    fill: var(--cl-26) !important;
  } */
</style>