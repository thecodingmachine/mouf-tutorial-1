<?php

/*
 * This file has been automatically generated by TDBM.
 * DO NOT edit this file, as it might be overwritten.
 * If you need to perform changes, edit the NewsDao class instead!
 */

namespace Test\Model\Dao\Generated;

use Mouf\Database\TDBM\TDBMService;
use Mouf\Database\TDBM\ResultIterator;
use Mouf\Database\TDBM\ArrayIterator;
use Test\Model\Bean\NewsBean;


/**
 * The NewsBaseDao class will maintain the persistence of NewsBean class into the news table.
 *
 */
class NewsBaseDao
{

    /**
     * @var TDBMService
     */
    protected $tdbmService;

    /**
     * The default sort column.
     *
     * @var string
     */
    private $defaultSort = null;

    /**
     * The default sort direction.
     *
     * @var string
     */
    private $defaultDirection = 'asc';

    /**
     * Sets the TDBM service used by this DAO.
     *
     * @param TDBMService $tdbmService
     */
    public function __construct(TDBMService $tdbmService)
    {
        $this->tdbmService = $tdbmService;
    }

    /**
     * Persist the NewsBean instance.
     *
     * @param NewsBean $obj The bean to save.
     */
    public function save(NewsBean $obj)
    {
        $this->tdbmService->save($obj);
    }

    /**
     * Get all News records.
     *
     * @return NewsBean[]|ResultIterator|ResultArray
     */
    public function findAll()
    {
        if ($this->defaultSort) {
            $orderBy = 'news.'.$this->defaultSort.' '.$this->defaultDirection;
        } else {
            $orderBy = null;
        }
        return $this->tdbmService->findObjects('news',  null, [], $orderBy);
    }
    
    /**
     * Get NewsBean specified by its ID (its primary key)
     * If the primary key does not exist, an exception is thrown.
     *
     * @param string|int $id
     * @param bool $lazyLoading If set to true, the object will not be loaded right away. Instead, it will be loaded when you first try to access a method of the object.
     * @return NewsBean
     * @throws TDBMException
     */
    public function getById($id, $lazyLoading = false)
    {
        return $this->tdbmService->findObjectByPk('news', ['id' => $id], [], $lazyLoading);
    }
    
    /**
     * Deletes the NewsBean passed in parameter.
     *
     * @param NewsBean $obj object to delete
     * @param bool $cascade if true, it will delete all object linked to $obj
     */
    public function delete(NewsBean $obj, $cascade = false)
    {
        if ($cascade === true) {
            $this->tdbmService->deleteCascade($obj);
        } else {
            $this->tdbmService->delete($obj);
        }
    }


    /**
     * Get a list of NewsBean specified by its filters.
     *
     * @param mixed $filter The filter bag (see TDBMService::findObjects for complete description)
     * @param array $parameters The parameters associated with the filter
     * @param mixed $orderBy The order string
     * @param array $additionalTablesFetch A list of additional tables to fetch (for performance improvement)
     * @param int $mode Either TDBMService::MODE_ARRAY or TDBMService::MODE_CURSOR (for large datasets). Defaults to TDBMService::MODE_ARRAY.
     * @return NewsBean[]|ResultIterator|ResultArray
     */
    protected function find($filter = null, array $parameters = [], $orderBy=null, array $additionalTablesFetch = [], $mode = null)
    {
        if ($this->defaultSort && $orderBy == null) {
            $orderBy = 'news.'.$this->defaultSort.' '.$this->defaultDirection;
        }
        return $this->tdbmService->findObjects('news', $filter, $parameters, $orderBy, $additionalTablesFetch, $mode);
    }

    /**
     * Get a list of NewsBean specified by its filters.
     * Unlike the `find` method that guesses the FROM part of the statement, here you can pass the $from part.
     *
     * You should not put an alias on the main table name. So your $from variable should look like:
     *
     *   "news JOIN ... ON ..."
     *
     * @param string $from The sql from statement
     * @param mixed $filter The filter bag (see TDBMService::findObjects for complete description)
     * @param array $parameters The parameters associated with the filter
     * @param mixed $orderBy The order string
     * @param int $mode Either TDBMService::MODE_ARRAY or TDBMService::MODE_CURSOR (for large datasets). Defaults to TDBMService::MODE_ARRAY.
     * @return NewsBean[]|ResultIterator|ResultArray
     */
    protected function findFromSql($from, $filter = null, array $parameters = [], $orderBy=null, $mode = null)
    {
        if ($this->defaultSort && $orderBy == null) {
            $orderBy = 'news.'.$this->defaultSort.' '.$this->defaultDirection;
        }
        return $this->tdbmService->findObjectsFromSql('news', $from, $filter, $parameters, $orderBy, $mode);
    }

    /**
     * Get a single NewsBean specified by its filters.
     *
     * @param mixed $filter The filter bag (see TDBMService::findObjects for complete description)
     * @param array $parameters The parameters associated with the filter
     * @return NewsBean
     */
    protected function findOne($filter=null, array $parameters = [])
    {
        return $this->tdbmService->findObject('news', $filter, $parameters);
    }

    /**
     * Get a single NewsBean specified by its filters.
     * Unlike the `find` method that guesses the FROM part of the statement, here you can pass the $from part.
     *
     * You should not put an alias on the main table name. So your $from variable should look like:
     *
     *   "news JOIN ... ON ..."
     *
     * @param string $from The sql from statement
     * @param mixed $filter The filter bag (see TDBMService::findObjects for complete description)
     * @param array $parameters The parameters associated with the filter
     * @return NewsBean
     */
    protected function findOneFromSql($from, $filter=null, array $parameters = [])
    {
        return $this->tdbmService->findObjectFromSql('news', $from, $filter, $parameters);
    }

    /**
     * Sets the default column for default sorting.
     *
     * @param string $defaultSort
     */
    public function setDefaultSort($defaultSort)
    {
        $this->defaultSort = $defaultSort;
    }
}