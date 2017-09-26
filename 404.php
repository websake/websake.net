<?php
switch(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2))
{
  case 'it':
    header('Location: https://www.websake.net/it/index.html');
    break;
  case 'en':
    header('Location: https://www.websake.net/en/index.html');
    break;
  default:
    header('Location: https://www.websake.net/en/index.html');
}
?> 
