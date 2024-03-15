<?php 


setcookie('access_token', $accessToken, time() + 3600, '/', $URL, true, true);
setcookie('refresh_token', $refreshToken, time() + (30 * 24 * 60 * 60), '/', $URL, true, false);