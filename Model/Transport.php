<?php

namespace CzoneTech\SmtpMail\Model;

use Magento\Framework\Mail\TransportInterface;
use Magento\Store\Model\ScopeInterface;

class Transport extends \Zend_Mail_Transport_Smtp implements TransportInterface
{

    /**
     * @var \Magento\Framework\Mail\MessageInterface
     */
    protected $_message;

    /**
     * @param MessageInterface $message
     * @param null $parameters
     * @throws \InvalidArgumentException
     */
    public function __construct(\Magento\Framework\Mail\MessageInterface $message,
                                \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
                                $parameters = null)
    {
        if (!$message instanceof \Zend_Mail) {
            throw new \InvalidArgumentException('The message should be an instance of \Zend_Mail');
        }
        $host = $scopeConfig->getValue('ct_smtpmail/settings/host', ScopeInterface::SCOPE_STORE);
        $port = $scopeConfig->getValue('ct_smtpmail/settings/port', ScopeInterface::SCOPE_STORE);
        $username = $scopeConfig->getValue('ct_smtpmail/settings/username', ScopeInterface::SCOPE_STORE);
        $password = $scopeConfig->getValue('ct_smtpmail/settings/password', ScopeInterface::SCOPE_STORE);
        $auth = $scopeConfig->getValue('ct_smtpmail/settings/auth', ScopeInterface::SCOPE_STORE);
        $ssl = $scopeConfig->getValue('ct_smtpmail/settings/use_ssl', ScopeInterface::SCOPE_STORE)? 'ssl': 'tls';


        //set config
        $parameters = [
            'port' => $port,
            'username' => $username,
            'password' => $password,
            'auth' => $auth,
            'ssl' => $ssl
        ];

        parent::__construct($host, $parameters);
        $this->_message = $message;
    }

    /**
     * Send a mail using this transport
     *
     * @return void
     * @throws \Magento\Framework\Exception\MailException
     */
    public function sendMessage()
    {
        try {
            parent::send($this->_message);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\MailException(new \Magento\Framework\Phrase($e->getMessage()), $e);
        }
    }
}