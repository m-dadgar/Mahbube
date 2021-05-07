<?php

namespace MailPoetDoctrineProxies\__CG__\MailPoet\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class NewsletterEntity extends \MailPoet\Entities\NewsletterEntity implements \MailPoetVendor\Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'hash', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'subject', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'type', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'sender_address', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'sender_name', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'status', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'reply_to_address', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'reply_to_name', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'preheader', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'body', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'sent_at', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'unsubscribe_token', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'parent', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'newsletter_segments', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'options', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'queue', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'id', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'created_at', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'updated_at', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'deleted_at'];
        }

        return ['__isInitialized__', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'hash', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'subject', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'type', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'sender_address', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'sender_name', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'status', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'reply_to_address', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'reply_to_name', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'preheader', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'body', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'sent_at', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'unsubscribe_token', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'parent', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'newsletter_segments', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'options', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'queue', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'id', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'created_at', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'updated_at', '' . "\0" . 'MailPoet\\Entities\\NewsletterEntity' . "\0" . 'deleted_at'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (NewsletterEntity $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getHash()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHash', []);

        return parent::getHash();
    }

    /**
     * {@inheritDoc}
     */
    public function setHash($hash)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHash', [$hash]);

        return parent::setHash($hash);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubject', []);

        return parent::getSubject();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubject($subject)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubject', [$subject]);

        return parent::setSubject($subject);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setType($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getSenderAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSenderAddress', []);

        return parent::getSenderAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setSenderAddress($sender_address)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSenderAddress', [$sender_address]);

        return parent::setSenderAddress($sender_address);
    }

    /**
     * {@inheritDoc}
     */
    public function getSenderName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSenderName', []);

        return parent::getSenderName();
    }

    /**
     * {@inheritDoc}
     */
    public function setSenderName($sender_name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSenderName', [$sender_name]);

        return parent::setSenderName($sender_name);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', [$status]);

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getReplyToAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReplyToAddress', []);

        return parent::getReplyToAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setReplyToAddress($reply_to_address)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReplyToAddress', [$reply_to_address]);

        return parent::setReplyToAddress($reply_to_address);
    }

    /**
     * {@inheritDoc}
     */
    public function getReplyToName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReplyToName', []);

        return parent::getReplyToName();
    }

    /**
     * {@inheritDoc}
     */
    public function setReplyToName($reply_to_name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReplyToName', [$reply_to_name]);

        return parent::setReplyToName($reply_to_name);
    }

    /**
     * {@inheritDoc}
     */
    public function getPreheader()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPreheader', []);

        return parent::getPreheader();
    }

    /**
     * {@inheritDoc}
     */
    public function setPreheader($preheader)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPreheader', [$preheader]);

        return parent::setPreheader($preheader);
    }

    /**
     * {@inheritDoc}
     */
    public function getBody()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBody', []);

        return parent::getBody();
    }

    /**
     * {@inheritDoc}
     */
    public function setBody($body)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBody', [$body]);

        return parent::setBody($body);
    }

    /**
     * {@inheritDoc}
     */
    public function getSentAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSentAt', []);

        return parent::getSentAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setSentAt($sent_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSentAt', [$sent_at]);

        return parent::setSentAt($sent_at);
    }

    /**
     * {@inheritDoc}
     */
    public function getUnsubscribeToken()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUnsubscribeToken', []);

        return parent::getUnsubscribeToken();
    }

    /**
     * {@inheritDoc}
     */
    public function setUnsubscribeToken($unsubscribe_token)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUnsubscribeToken', [$unsubscribe_token]);

        return parent::setUnsubscribeToken($unsubscribe_token);
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParent', []);

        return parent::getParent();
    }

    /**
     * {@inheritDoc}
     */
    public function setParent($parent)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParent', [$parent]);

        return parent::setParent($parent);
    }

    /**
     * {@inheritDoc}
     */
    public function getNewsletterSegments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNewsletterSegments', []);

        return parent::getNewsletterSegments();
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOptions', []);

        return parent::getOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function getQueue()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQueue', []);

        return parent::getQueue();
    }

    /**
     * {@inheritDoc}
     */
    public function setQueue($queue)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQueue', [$queue]);

        return parent::setQueue($queue);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTimeInterface $created_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$created_at]);

        return parent::setCreatedAt($created_at);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTimeInterface $updated_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updated_at]);

        return parent::setUpdatedAt($updated_at);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeletedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeletedAt', []);

        return parent::getDeletedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeletedAt($deleted_at)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeletedAt', [$deleted_at]);

        return parent::setDeletedAt($deleted_at);
    }

}