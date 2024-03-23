async function deleteOpenedChatterBanner() {
    let chatterUserBannerId = document.getElementById(`user-banner-${userId}`);

    if (chatterUserBannerId) {
        chatterUserBannerId.removeAttribute('id');
        console.log(`Attribute "id" of element user-banner-${userId} removed!`);
    } else {
        console.log(`Element with ID user-banner-${userId} not available!`);
    }
}