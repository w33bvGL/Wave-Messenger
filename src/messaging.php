<section class="messaging" id="chatterMessagePanelGen">
  <div class="messaging-inner">
    <div class="welcome">
      <div class="welcome-inner">
        <div class="welcome-chat-logo">
          <svg fill="currentcolor" height="" width="" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60" xml:space="preserve">
            <g>
              <path d="M57.348,0.793H12.652C11.189,0.793,10,1.983,10,3.446v7.347h34.348c2.565,0,4.652,2.087,4.652,4.653v25.347h1.586
    L60,50.207V3.446C60,1.983,58.811,0.793,57.348,0.793z" />
              <path d="M44.348,12.793H2.652C1.189,12.793,0,13.983,0,15.446v43.761l9.414-9.414h34.934c1.463,0,2.652-1.19,2.652-2.653V15.446
    C47,13.983,45.811,12.793,44.348,12.793z M11,22.793h12c0.553,0,1,0.448,1,1s-0.447,1-1,1H11c-0.553,0-1-0.448-1-1
    S10.447,22.793,11,22.793z M36,38.793H11c-0.553,0-1-0.448-1-1s0.447-1,1-1h25c0.553,0,1,0.448,1,1S36.553,38.793,36,38.793z
     M36,31.793H11c-0.553,0-1-0.448-1-1s0.447-1,1-1h25c0.553,0,1,0.448,1,1S36.553,31.793,36,31.793z" />
            </g>
          </svg>
        </div>
        <h4>Բարի գալուստ Wave chat հավելված</h4>
        <p>Բարի գալուստ Wawe մի վայր, որտեղ յուրաքանչյուր բառ ստեղծում է նոր կապեր, որտեղ կարող եք խոսել ցանկացածի հետ՝
          անկախ նրանից, թե որտեղ եք գտնվում:</p>
        <button>Սկսել</button>
      </div>
    </div>
  </div>
</section>
<style>
  .messaging {
    width: 100%;
    height: 100vh;
    background-color: var(--cl-1);
  }

  .messaging .messaging-inner {
    background-image: url(../../assets/chat-bg.png);
    width: 100%;
    height: 100vh;
    background-repeat: repeat;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .welcome {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
  }

  .welcome-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 650px;
  }

  .welcome-chat-logo {
    border-radius: 50%;
    background-color: var(--cl-13);
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
  }

  .welcome-inner h4 {
    font-size: 20px;
    font-weight: 400;
    margin-bottom: 10px;
  }

  .welcome-inner p {
    margin-bottom: 30px;
    color: var(--cl-14);
    text-align: center;
  }

  .welcome-inner button {
    padding: 13px 50px;
    border-radius: 5px;
    background-color: var(--cl-15);
    border: none;
    cursor: pointer;
    color: var(--cl-4);
    font-size: 15px;
    transition: background-color 0.2s;
    outline: none;
  }

  .welcome-inner button:hover {
    background-color: var(--cl-16);
  }

  .welcome-inner button:active {
    background-color: var(--cl-17);
  }

  .welcome-chat-logo svg {
    width: 50px;
    color: var(--cl-6);
  }

  .messaging .messaging-top-header {
    padding: 20px 10px;
    width: 100%;
    border-bottom: 1px solid var(--cl-11) !important;
    background-color: var(--cl-18);
  }

  .messaging .messaging-top-header-inner {
    width: 100%;
  }

  .messaging .message-user {
    display: flex;
    align-items: center;
  }

  .messaging .message-user .message-user-image {
    width: 40px;
    height: 40px;
    overflow: hidden;
    position: relative;
    border-radius: 100%;
    margin-right: 15px;
  }

  .messaging .message-user .message-user-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
  }

  .messaging .message-user {
    width: 100%;
  }

  .messaging .message-user-info .name {
    font-weight: bold;
  }

  .messaging .message-user-info .status {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-top: 5px;
    color: var(--cl-8);
  }

  .messaging .message-user-info .status span {
    font-size: 0.8em;
  }

  .messaging .message-user-info .status .dot {
    height: 8px;
    width: 8px;
    background-color: var(--cl-6);
    border-radius: 100%;
    box-shadow: 0px 0px 10px 1px var(--cl-6);
  }

  .messaging-mid-content {
    width: 100%;
    height: calc(100% - 191px);
    box-sizing: border-box;

  }

  .messaging-mid-content .messaging-mid-content-inner {
    padding: 20px;
    width: 100%;
    height: 100%;
    overflow-y: scroll;
    scroll-behavior: smooth;
    scrollbar-width: none;
    -ms-overflow-style: none;
  }

  .messaging-mid-content .messages-sender {
    width: 100%;
    padding: 20px 0;
    display: flex;
    justify-content: flex-start;
  }

  .messaging-mid-content .messages-receiver {
    width: 100%;
    padding: 20px 0;
    display: flex;
    justify-content: flex-end;
  }

  .messages-receiver p.show,
  .messages-sender p.show {
    opacity: 1;
    transform: translateY(0px);
  }



  .messages-receiver p {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.3s ease, transform 0.3s ease;
    background-color: var(--cl-13);
    font-size: 1em;
    border-radius: 5px;
    box-shadow: 0 2px 4px #0f223a1f;
    padding: 12px 20px;
    position: relative;
    word-wrap: break-word;
    color: var(--cl-20);
    word-break: break-word;
  }

  .messages-sender p {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.3s ease, transform 0.3s ease;
    background-color: var(--cl-19);
    font-size: 1em;
    border-radius: 5px;
    box-shadow: 0 2px 4px #0f223a1f;
    padding: 12px 20px;
    position: relative;
    word-wrap: break-word;
    color: var(--cl-20);
    word-break: break-word;
  }

  .messaging-bot-send-message {
    background-color: var(--cl-1);
    width: 100%;
    min-height: 100px;
    border-top: 1px solid var(--cl-11) !important;
    background-color: var(--cl-18);
    display: flex;
    align-items: center;
  }

  .messaging-bot-send-message .messaging-bot-send-message-inner {
    width: 100%;
    padding: 0 10px;
  }

  .messaging-bot-send-message-inner form {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .messaging-bot-send-message-inner form input {
    width: 100%;
    padding: 10px 15px;
    background-color: var(--cl-11);
    display: flex;
    align-items: center;
    border: none;
    color: var(--cl-4);
    outline: none;
    font-size: 1em;
  }

  .messaging-bot-send-message-inner form button {
    width: 40px;
    margin-left: 10px;
    color: var(--cl-4);
    background-color: var(--cl-15);
    border: none;
    display: flex;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
  }

  .messaging-bot-send-message-inner form button svg {
    transform: rotate(90deg);
    color: currentColor;
    width: 25px;
  }

  @media screen and (max-width: 1024px) {
    .messaging {
      display: none;
    }
  }
</style>