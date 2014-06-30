pg-mailchimp
============

ZF2 MailChimp Module

Installation
------------

### Main Setup

#### By cloning project

1. Install the [zf2-mailchimp](https://github.com/earlhickey/zf2-mailchimp) ZF2 module
   by cloning it into `./vendor/`.
2. Clone this project into your `./vendor/` directory.

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "earlhickey/zf2-mailchimp": "dev-master"
    }
    ```

2. Now tell composer to download ZfcUser by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

1. Enabling it in your `application.config.php` file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'Mailchimp',
        ),
        // ...
    );
    ```
