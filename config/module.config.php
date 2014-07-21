<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'PgMailChimp\Client\MailChimp' => 'PgMailChimp\Factory\MailChimpClientFactory',
        ),
    ),
);
