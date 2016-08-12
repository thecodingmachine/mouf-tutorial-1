<?php
namespace Test\Model\Bean\Generated;

use Mouf\Database\TDBM\ResultIterator;
use Mouf\Database\TDBM\AbstractTDBMObject;

/*
 * This file has been automatically generated by TDBM.
 * DO NOT edit this file, as it might be overwritten.
 * If you need to perform changes, edit the NewsBean class instead!
 */

/**
 * The NewsBaseBean class maps the 'news' table in database.
 */
class NewsBaseBean extends AbstractTDBMObject implements \JsonSerializable
{
    /**
     * The constructor takes all compulsory arguments.
     *
     * @param string $body
     */
    public function __construct($body) {
        parent::__construct();
        $this->setBody($body);
    }
        /**
     * The getter for the "id" column.
     *
     * @return int
     */
    public function getId() {
        return $this->get('id', 'news');
    }

    /**
     * The setter for the "id" column.
     *
     * @param int $id
     */
    public function setId($id) {
        $this->set('id', $id, 'news');
    }

    /**
     * The getter for the "body" column.
     *
     * @return string
     */
    public function getBody() {
        return $this->get('body', 'news');
    }

    /**
     * The setter for the "body" column.
     *
     * @param string $body
     */
    public function setBody($body) {
        $this->set('body', $body, 'news');
    }


    /**
     * Serializes the object for JSON encoding
     *
     * @param bool $stopRecursion Parameter used internally by TDBM to stop embedded objects from embedding other objects.
     * @return array
     */
    public function jsonSerialize($stopRecursion = false)
    {
        $array = [];
        $array['id'] = $this->getId();
        $array['body'] = $this->getBody();


        return $array;
    }
}