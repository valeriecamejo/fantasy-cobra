<?php

return array(

'driver' => 'smtp',
'host' => 'smtp.sendgrid.net',
'port' => 587,
'from' => array('address' => 'contacto@fantasycobra.com', 'name' => 'Fantasy Cobra'),
'encryption' => '',
'username' => 'FantasyCobra',
'password' => 'Noseasmalo1',   // it's use your google app password
'sendmail' => '/usr/sbin/sendmail -bs',
'pretend' => true,

);
