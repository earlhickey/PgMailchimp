<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'PgMailchimp\Client\Mailchimp' => 'PgMailchimp\Factory\MailchimpClientFactory',
        ),
    ),
);
