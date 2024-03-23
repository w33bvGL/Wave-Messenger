<section class="recent-chats">
  <p>Recent Chats</p>
  <i class="fa-solid fa-magnifying-glass" onclick="openSearch()"></i>
</section>

<section class="search-panel" id="search-panel">
  <div class="search-back">
    <svg onclick="closeSearch();" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <path stroke="#4f5e7b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M5 12h14M5 12l4-4m-4 4 4 4" />
    </svg>
    <input type="text" placeholder="Search..." id="search-input">
  </div>
  <section class="chat-sorting search-sort">
    <button class="sort-button checked">All categories</button>
    <button class="sort-button">Chats</button>
    <button class="sort-button">Messages</button>
    <button class="sort-button">Groups</button>
    <button class="sort-button">Media</button>
    <button class="sort-button">Links</button>
    <button class="sort-button">Music</button>
  </section>
  <section class="user-search">
    
  </section>
</section>