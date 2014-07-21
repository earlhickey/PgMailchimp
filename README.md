PgMailChimp
============

ZF2 MailChimp Module

Installation
------------

### Main Setup

#### By cloning project

1. Install the [PgMailChimp](https://github.com/earlhickey/PgMailChimp) ZF2 module
   by cloning it into `./vendor/`.
2. Clone this project into your `./vendor/` directory.

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "earlhickey/PgMailChimp": "dev-master"
    }
    ```

2. Now tell composer to download PgMailChimp by running the command:

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
            'PgMailChimp',
        ),
        // ...
    );
    ```

2. Copy `./vendor/earlhickey/PgMailChimp/config/mailchimp.global.php.dist` to `./config/autoload/mailchimp.global.php` and change the values as desired.



### Usage

1. Subscribe

    ```php
    //  create recipient
    $recipient = new \stdClass();
    $recipient->firstname = 'John';
    $recipient->lastname = 'Doe';
    $recipient->gender = '';
    $recipient->dateOfBirth = '';
    $recipient->email = 'john@doe.com';

    $mailChimp = $this->mailchimp()->subscribe($recipient);
    ```

3. Unsubscribe

    ```php
    //  create recipient
    $recipient = new \stdClass();
    $recipient->email = 'john@doe.com';

    $mailChimp = $this->mailchimp()->unsubscribe($recipient);
    ```
