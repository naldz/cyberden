<?php

namespace CyberdenBundle\Model\Map;

use CyberdenBundle\Model\Session;
use CyberdenBundle\Model\SessionQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'session' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SessionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.CyberdenBundle.Model.Map.SessionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cyberden';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'session';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CyberdenBundle\\Model\\Session';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.CyberdenBundle.Model.Session';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'session.id';

    /**
     * the column name for the station_id field
     */
    const COL_STATION_ID = 'session.station_id';

    /**
     * the column name for the administrator_id field
     */
    const COL_ADMINISTRATOR_ID = 'session.administrator_id';

    /**
     * the column name for the duration field
     */
    const COL_DURATION = 'session.duration';

    /**
     * the column name for the duration_end_time field
     */
    const COL_DURATION_END_TIME = 'session.duration_end_time';

    /**
     * the column name for the start_time field
     */
    const COL_START_TIME = 'session.start_time';

    /**
     * the column name for the end_time field
     */
    const COL_END_TIME = 'session.end_time';

    /**
     * the column name for the cost field
     */
    const COL_COST = 'session.cost';

    /**
     * the column name for the is_paid field
     */
    const COL_IS_PAID = 'session.is_paid';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'session.comment';

    /**
     * the column name for the is_in_session field
     */
    const COL_IS_IN_SESSION = 'session.is_in_session';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'StationId', 'AdministratorId', 'Duration', 'DurationEndTime', 'StartTime', 'EndTime', 'Cost', 'IsPaid', 'Comment', 'IsInSession', ),
        self::TYPE_CAMELNAME     => array('id', 'stationId', 'administratorId', 'duration', 'durationEndTime', 'startTime', 'endTime', 'cost', 'isPaid', 'comment', 'isInSession', ),
        self::TYPE_COLNAME       => array(SessionTableMap::COL_ID, SessionTableMap::COL_STATION_ID, SessionTableMap::COL_ADMINISTRATOR_ID, SessionTableMap::COL_DURATION, SessionTableMap::COL_DURATION_END_TIME, SessionTableMap::COL_START_TIME, SessionTableMap::COL_END_TIME, SessionTableMap::COL_COST, SessionTableMap::COL_IS_PAID, SessionTableMap::COL_COMMENT, SessionTableMap::COL_IS_IN_SESSION, ),
        self::TYPE_FIELDNAME     => array('id', 'station_id', 'administrator_id', 'duration', 'duration_end_time', 'start_time', 'end_time', 'cost', 'is_paid', 'comment', 'is_in_session', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'StationId' => 1, 'AdministratorId' => 2, 'Duration' => 3, 'DurationEndTime' => 4, 'StartTime' => 5, 'EndTime' => 6, 'Cost' => 7, 'IsPaid' => 8, 'Comment' => 9, 'IsInSession' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'stationId' => 1, 'administratorId' => 2, 'duration' => 3, 'durationEndTime' => 4, 'startTime' => 5, 'endTime' => 6, 'cost' => 7, 'isPaid' => 8, 'comment' => 9, 'isInSession' => 10, ),
        self::TYPE_COLNAME       => array(SessionTableMap::COL_ID => 0, SessionTableMap::COL_STATION_ID => 1, SessionTableMap::COL_ADMINISTRATOR_ID => 2, SessionTableMap::COL_DURATION => 3, SessionTableMap::COL_DURATION_END_TIME => 4, SessionTableMap::COL_START_TIME => 5, SessionTableMap::COL_END_TIME => 6, SessionTableMap::COL_COST => 7, SessionTableMap::COL_IS_PAID => 8, SessionTableMap::COL_COMMENT => 9, SessionTableMap::COL_IS_IN_SESSION => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'station_id' => 1, 'administrator_id' => 2, 'duration' => 3, 'duration_end_time' => 4, 'start_time' => 5, 'end_time' => 6, 'cost' => 7, 'is_paid' => 8, 'comment' => 9, 'is_in_session' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('session');
        $this->setPhpName('Session');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CyberdenBundle\\Model\\Session');
        $this->setPackage('src.CyberdenBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addForeignKey('station_id', 'StationId', 'SMALLINT', 'station', 'id', true, 5, null);
        $this->addForeignKey('administrator_id', 'AdministratorId', 'SMALLINT', 'administrator', 'id', true, 5, null);
        $this->addColumn('duration', 'Duration', 'SMALLINT', false, null, null);
        $this->addColumn('duration_end_time', 'DurationEndTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('start_time', 'StartTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('end_time', 'EndTime', 'TIMESTAMP', false, null, null);
        $this->addColumn('cost', 'Cost', 'DECIMAL', true, 10, 0);
        $this->addColumn('is_paid', 'IsPaid', 'TINYINT', true, null, 0);
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('is_in_session', 'IsInSession', 'TINYINT', true, 3, 0);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Station', '\\CyberdenBundle\\Model\\Station', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':station_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Administrator', '\\CyberdenBundle\\Model\\Administrator', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':administrator_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SessionTableMap::CLASS_DEFAULT : SessionTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Session object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SessionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SessionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SessionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SessionTableMap::OM_CLASS;
            /** @var Session $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SessionTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SessionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SessionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Session $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SessionTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SessionTableMap::COL_ID);
            $criteria->addSelectColumn(SessionTableMap::COL_STATION_ID);
            $criteria->addSelectColumn(SessionTableMap::COL_ADMINISTRATOR_ID);
            $criteria->addSelectColumn(SessionTableMap::COL_DURATION);
            $criteria->addSelectColumn(SessionTableMap::COL_DURATION_END_TIME);
            $criteria->addSelectColumn(SessionTableMap::COL_START_TIME);
            $criteria->addSelectColumn(SessionTableMap::COL_END_TIME);
            $criteria->addSelectColumn(SessionTableMap::COL_COST);
            $criteria->addSelectColumn(SessionTableMap::COL_IS_PAID);
            $criteria->addSelectColumn(SessionTableMap::COL_COMMENT);
            $criteria->addSelectColumn(SessionTableMap::COL_IS_IN_SESSION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.station_id');
            $criteria->addSelectColumn($alias . '.administrator_id');
            $criteria->addSelectColumn($alias . '.duration');
            $criteria->addSelectColumn($alias . '.duration_end_time');
            $criteria->addSelectColumn($alias . '.start_time');
            $criteria->addSelectColumn($alias . '.end_time');
            $criteria->addSelectColumn($alias . '.cost');
            $criteria->addSelectColumn($alias . '.is_paid');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.is_in_session');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SessionTableMap::DATABASE_NAME)->getTable(SessionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SessionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SessionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SessionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Session or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Session object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SessionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CyberdenBundle\Model\Session) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SessionTableMap::DATABASE_NAME);
            $criteria->add(SessionTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SessionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SessionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SessionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the session table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SessionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Session or Criteria object.
     *
     * @param mixed               $criteria Criteria or Session object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SessionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Session object
        }

        if ($criteria->containsKey(SessionTableMap::COL_ID) && $criteria->keyContainsValue(SessionTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SessionTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SessionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SessionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SessionTableMap::buildTableMap();
