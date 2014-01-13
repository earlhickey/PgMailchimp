<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'PgMailchimp\Client\MailChimp' => 'PgMailchimp\Factory\MailChimp',
        ),
    ),
);