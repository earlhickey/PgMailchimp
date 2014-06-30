<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Mailchimp\Client\MailChimp' => 'Mailchimp\Factory\MailChimpClientFactory',
        ),
    ),
);
