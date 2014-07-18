<?php

namespace Mailchimp\Client;

use ZfcBase\EventManager\EventProvider;

/**
 * Super-simple, minimum abstraction MailChimp API v2 wrapper
 *
 * @author pG
 * @version 1.0
 * @package Mailchimp\Client
 * @copyright 2013
 */
class MailChimp extends EventProvider
{
    /**
     * MailChimp API version
     */
    const LATEST_API_VERSION = '2.0';

    private $apiEndpoint;
    private $verifySsl = false;
    private $proxy = false;
    private $apiKey;
    private $listId;

    /**
     * Create a new instance
     * @param string $apiKey Your MailChimp API key
     */
    function __construct($config)
    {
        /**
         * Set Station properties
         * @param array
         */
        $this->apiKey = $config['key'];
        $this->listId = $config['listId'];

        /**
         * set API endpoint
         * containing last part of the apiKey and api version
         */
        $parts = explode('-', $this->apiKey);
        $this->apiEndpoint = sprintf('https://%s.api.mailchimp.com/%s', end($parts), self::LATEST_API_VERSION);
    }

    /**
     * Subscribe
     * docs: http://apidocs.mailchimp.com/api/2.0/lists/subscribe.php
     * @param object $recipient
     * @return array
     */
    public function subscribe($recipient)
    {
    	//	preparate
		$recipient = $this->preparate($recipient);

		$result = $this->call('lists/subscribe', array(
            'id'                => $this->listId,
            'email'             => array(
            	'email' => $recipient->email
            ),
            'merge_vars'        => array(
            	'FNAME'    => $recipient->firstname,
            	'LNAME'    => $recipient->lastname,
            	'GENDER'   => $recipient->gender,
            	'BIRTHDAY' => $recipient->dateOfBirth,
            ),
            'double_optin'      => false,
            'update_existing'   => true,
            'replace_interests' => false,
            'send_welcome'      => false,
        ));

		$this->getEventManager()->trigger(__FUNCTION__, $this, array('recipient' => $recipient, 'result' => $result));

		return $result;
    }


    /**
     * Unsubscribe
     * docs: http://apidocs.mailchimp.com/api/2.0/lists/unsubscribe.php
     * @return array
     */
	public function unsubscribe($recipient)
    {
		$result = $this->call('lists/unsubscribe', array(
            'id'                => $this->listId,
            'email'             => array(
            	'email' => $recipient->email
            ),
            'delete_member'     => false,
            'send_goodbye'      => false,
            'send_notify'       => false,
        ));

		$this->getEventManager()->trigger(__FUNCTION__, $this, array('recipient' => $recipient, 'result' => $result));

		return $result;
    }


	/**
	 *
	 * preparate the recipient data
	 *
	 * @param	array	$recipient
	 * @return	array	$recipient
	 *
	 */
	private function preparate($recipient)
	{
	    if(isset($recipient->dateOfBirth) && $recipient->dateOfBirth != '') {

	    	//	Clean date of birth notation
	    	$date = new \DateTime($recipient->dateOfBirth);
	    	$recipient->dateOfBirth = $date->format('Y-m-d');
	    }

		return $recipient;
	}


    /**
     * Call an API method. Every request needs the API key, so that is added automatically -- you don't need to pass it in.
     * @param  string $method The API method to call, e.g. 'lists/list'
     * @param  array  $args   An array of arguments to pass to the method. Will be json-encoded for you.
     * @return array          Associative array of json decoded API response.
     */
    private function call($method, $args=array())
    {
        return $this->_raw_request($method, $args);
    }


    /**
     * Performs the underlying HTTP request. Not very exciting
     * @param  string $method The API method to be called
     * @param  array  $args   Assoc array of parameters to be passed
     * @return array          Assoc array of decoded result
     */
    private function _raw_request($method, $args=array())
    {
        $args['apikey'] = $this->apiKey;

        $url = $this->apiEndpoint.'/'.$method.'.json';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/' . self::LATEST_API_VERSION);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verifySsl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($args));
        // todo: add proxy to config file
        if($this->proxy) {
	    	curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
	    	curl_setopt($ch, CURLOPT_PROXYPORT, 80);
	    	curl_setopt($ch, CURLOPT_PROXY, 'proxy');
        }
        $result = curl_exec($ch);
        curl_close($ch);

        return $result ? json_decode($result, true) : false;
    }

}
