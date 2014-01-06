<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'MailChimp\Client\MailChimp' => 'MailChimp\Factory\MailChimp',
        ),
    ),
);