PgMailchimp
============

ZF2 MailChimp Module

Installation
------------

### Main Setup

#### By cloning project

1. Install the [PgMailchimp](https://github.com/earlhickey/PgMailchimp) ZF2 module
   by cloning it into `./vendor/`.
2. Clone this project into your `./vendor/` directory.

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "earlhickey/pg-mailchimp": "1.*"
    }
    ```

2. Now tell composer to download PgMailchimp by running the command:

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
            'PgMailchimp',
        ),
        // ...
    );
    ```

2. Copy `./vendor/earlhickey/PgMailchimp/config/pg-mailchimp.global.php.dist` to `./config/autoload/pg-mailchimp.global.php` and change the values as desired.



### Usage

1. Subscribe

    ```php
    //  create recipient
    $recipient = new \stdClass();
    $recipient->firstname = 'John';
    $recipient->lastname = 'Doe';
    $recipient->gender = '';
    $recipient->dateOfBirth = '';
    $recipient->email = 'johndoe@domain.com';

    $subscribe = $this->mailchimp()->subscribe($recipient);
    ```

3. Unsubscribe

    ```php
    //  create recipient
    $recipient = new \stdClass();
    $recipient->email = 'johndoe@domain.com';

    $unsubscribe = $this->mailchimp()->unsubscribe($recipient);
    ```
