<?php
//Thiết lập 1 cookie -> msg = Hello World
setcookie('msg', 'Hello World', time()+7*24*60*60, '/');
setcookie('status', 'test', time()+7*24*60*60, '/');