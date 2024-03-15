<section class="user-profile" id="user-profile">
  <div class="my-profile-user">
    <div class="my-image" id="my-image">
      <img src="" alt="myUser" id="my-user-image-path">
    </div>
    <div class="my-info">
      <div class="user-name-username"><?php echo $decodedTokens->firstName; echo ' '; echo $decodedTokens->lastName; ?></div>
      <pre class="user-tit"><?php echo $decodedTokens->username . ' ID:' . $decodedTokens->id; ?></pre>
    </div>
  </div>
</section>