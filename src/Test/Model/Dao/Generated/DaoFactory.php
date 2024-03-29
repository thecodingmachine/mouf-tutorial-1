<?php

/*
 * This file has been automatically generated by TDBM.
 * DO NOT edit this file, as it might be overwritten.
 */

namespace Test\Model\Dao\Generated;
use Test\Model\Dao\NewsDao;
use Test\Model\Dao\UserDao;

/**
 * The DaoFactory provides an easy access to all DAOs generated by TDBM.
 *
 */
class DaoFactory
{
    /**
     * @var NewsDao
     */
    private $newsDao;

    /**
     * Returns an instance of the NewsDao class.
     *
     * @return NewsDao
     */
    public function getNewsDao()
    {
        return $this->newsDao;
    }

    /**
     * Sets the instance of the NewsDao class that will be returned by the factory getter.
     *
     * @param NewsDao $newsDao
     */
    public function setNewsDao(NewsDao $newsDao) {
        $this->newsDao = $newsDao;
    }

    /**
     * @var UserDao
     */
    private $userDao;

    /**
     * Returns an instance of the UserDao class.
     *
     * @return UserDao
     */
    public function getUserDao()
    {
        return $this->userDao;
    }

    /**
     * Sets the instance of the UserDao class that will be returned by the factory getter.
     *
     * @param UserDao $userDao
     */
    public function setUserDao(UserDao $userDao) {
        $this->userDao = $userDao;
    }


}
