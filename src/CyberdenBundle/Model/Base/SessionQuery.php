<?php

namespace CyberdenBundle\Model\Base;

use \Exception;
use \PDO;
use CyberdenBundle\Model\Session as ChildSession;
use CyberdenBundle\Model\SessionQuery as ChildSessionQuery;
use CyberdenBundle\Model\Map\SessionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'session' table.
 *
 *
 *
 * @method     ChildSessionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSessionQuery orderByStationId($order = Criteria::ASC) Order by the station_id column
 * @method     ChildSessionQuery orderByAdministratorId($order = Criteria::ASC) Order by the administrator_id column
 * @method     ChildSessionQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method     ChildSessionQuery orderByDurationEndTime($order = Criteria::ASC) Order by the duration_end_time column
 * @method     ChildSessionQuery orderByStartTime($order = Criteria::ASC) Order by the start_time column
 * @method     ChildSessionQuery orderByEndTime($order = Criteria::ASC) Order by the end_time column
 * @method     ChildSessionQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method     ChildSessionQuery orderByIsPaid($order = Criteria::ASC) Order by the is_paid column
 * @method     ChildSessionQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildSessionQuery orderByIsInSession($order = Criteria::ASC) Order by the is_in_session column
 *
 * @method     ChildSessionQuery groupById() Group by the id column
 * @method     ChildSessionQuery groupByStationId() Group by the station_id column
 * @method     ChildSessionQuery groupByAdministratorId() Group by the administrator_id column
 * @method     ChildSessionQuery groupByDuration() Group by the duration column
 * @method     ChildSessionQuery groupByDurationEndTime() Group by the duration_end_time column
 * @method     ChildSessionQuery groupByStartTime() Group by the start_time column
 * @method     ChildSessionQuery groupByEndTime() Group by the end_time column
 * @method     ChildSessionQuery groupByCost() Group by the cost column
 * @method     ChildSessionQuery groupByIsPaid() Group by the is_paid column
 * @method     ChildSessionQuery groupByComment() Group by the comment column
 * @method     ChildSessionQuery groupByIsInSession() Group by the is_in_session column
 *
 * @method     ChildSessionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSessionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSessionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSessionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSessionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSessionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSessionQuery leftJoinStation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Station relation
 * @method     ChildSessionQuery rightJoinStation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Station relation
 * @method     ChildSessionQuery innerJoinStation($relationAlias = null) Adds a INNER JOIN clause to the query using the Station relation
 *
 * @method     ChildSessionQuery joinWithStation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Station relation
 *
 * @method     ChildSessionQuery leftJoinWithStation() Adds a LEFT JOIN clause and with to the query using the Station relation
 * @method     ChildSessionQuery rightJoinWithStation() Adds a RIGHT JOIN clause and with to the query using the Station relation
 * @method     ChildSessionQuery innerJoinWithStation() Adds a INNER JOIN clause and with to the query using the Station relation
 *
 * @method     ChildSessionQuery leftJoinAdministrator($relationAlias = null) Adds a LEFT JOIN clause to the query using the Administrator relation
 * @method     ChildSessionQuery rightJoinAdministrator($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Administrator relation
 * @method     ChildSessionQuery innerJoinAdministrator($relationAlias = null) Adds a INNER JOIN clause to the query using the Administrator relation
 *
 * @method     ChildSessionQuery joinWithAdministrator($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Administrator relation
 *
 * @method     ChildSessionQuery leftJoinWithAdministrator() Adds a LEFT JOIN clause and with to the query using the Administrator relation
 * @method     ChildSessionQuery rightJoinWithAdministrator() Adds a RIGHT JOIN clause and with to the query using the Administrator relation
 * @method     ChildSessionQuery innerJoinWithAdministrator() Adds a INNER JOIN clause and with to the query using the Administrator relation
 *
 * @method     \CyberdenBundle\Model\StationQuery|\CyberdenBundle\Model\AdministratorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSession findOne(ConnectionInterface $con = null) Return the first ChildSession matching the query
 * @method     ChildSession findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSession matching the query, or a new ChildSession object populated from the query conditions when no match is found
 *
 * @method     ChildSession findOneById(int $id) Return the first ChildSession filtered by the id column
 * @method     ChildSession findOneByStationId(int $station_id) Return the first ChildSession filtered by the station_id column
 * @method     ChildSession findOneByAdministratorId(int $administrator_id) Return the first ChildSession filtered by the administrator_id column
 * @method     ChildSession findOneByDuration(int $duration) Return the first ChildSession filtered by the duration column
 * @method     ChildSession findOneByDurationEndTime(string $duration_end_time) Return the first ChildSession filtered by the duration_end_time column
 * @method     ChildSession findOneByStartTime(string $start_time) Return the first ChildSession filtered by the start_time column
 * @method     ChildSession findOneByEndTime(string $end_time) Return the first ChildSession filtered by the end_time column
 * @method     ChildSession findOneByCost(string $cost) Return the first ChildSession filtered by the cost column
 * @method     ChildSession findOneByIsPaid(int $is_paid) Return the first ChildSession filtered by the is_paid column
 * @method     ChildSession findOneByComment(string $comment) Return the first ChildSession filtered by the comment column
 * @method     ChildSession findOneByIsInSession(int $is_in_session) Return the first ChildSession filtered by the is_in_session column *

 * @method     ChildSession requirePk($key, ConnectionInterface $con = null) Return the ChildSession by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOne(ConnectionInterface $con = null) Return the first ChildSession matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSession requireOneById(int $id) Return the first ChildSession filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByStationId(int $station_id) Return the first ChildSession filtered by the station_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByAdministratorId(int $administrator_id) Return the first ChildSession filtered by the administrator_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByDuration(int $duration) Return the first ChildSession filtered by the duration column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByDurationEndTime(string $duration_end_time) Return the first ChildSession filtered by the duration_end_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByStartTime(string $start_time) Return the first ChildSession filtered by the start_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByEndTime(string $end_time) Return the first ChildSession filtered by the end_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByCost(string $cost) Return the first ChildSession filtered by the cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByIsPaid(int $is_paid) Return the first ChildSession filtered by the is_paid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByComment(string $comment) Return the first ChildSession filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSession requireOneByIsInSession(int $is_in_session) Return the first ChildSession filtered by the is_in_session column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSession[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSession objects based on current ModelCriteria
 * @method     ChildSession[]|ObjectCollection findById(int $id) Return ChildSession objects filtered by the id column
 * @method     ChildSession[]|ObjectCollection findByStationId(int $station_id) Return ChildSession objects filtered by the station_id column
 * @method     ChildSession[]|ObjectCollection findByAdministratorId(int $administrator_id) Return ChildSession objects filtered by the administrator_id column
 * @method     ChildSession[]|ObjectCollection findByDuration(int $duration) Return ChildSession objects filtered by the duration column
 * @method     ChildSession[]|ObjectCollection findByDurationEndTime(string $duration_end_time) Return ChildSession objects filtered by the duration_end_time column
 * @method     ChildSession[]|ObjectCollection findByStartTime(string $start_time) Return ChildSession objects filtered by the start_time column
 * @method     ChildSession[]|ObjectCollection findByEndTime(string $end_time) Return ChildSession objects filtered by the end_time column
 * @method     ChildSession[]|ObjectCollection findByCost(string $cost) Return ChildSession objects filtered by the cost column
 * @method     ChildSession[]|ObjectCollection findByIsPaid(int $is_paid) Return ChildSession objects filtered by the is_paid column
 * @method     ChildSession[]|ObjectCollection findByComment(string $comment) Return ChildSession objects filtered by the comment column
 * @method     ChildSession[]|ObjectCollection findByIsInSession(int $is_in_session) Return ChildSession objects filtered by the is_in_session column
 * @method     ChildSession[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SessionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CyberdenBundle\Model\Base\SessionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cyberden', $modelName = '\\CyberdenBundle\\Model\\Session', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSessionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSessionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSessionQuery) {
            return $criteria;
        }
        $query = new ChildSessionQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSession|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SessionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SessionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSession A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, station_id, administrator_id, duration, duration_end_time, start_time, end_time, cost, is_paid, comment, is_in_session FROM session WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSession $obj */
            $obj = new ChildSession();
            $obj->hydrate($row);
            SessionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSession|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SessionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SessionTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the station_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStationId(1234); // WHERE station_id = 1234
     * $query->filterByStationId(array(12, 34)); // WHERE station_id IN (12, 34)
     * $query->filterByStationId(array('min' => 12)); // WHERE station_id > 12
     * </code>
     *
     * @see       filterByStation()
     *
     * @param     mixed $stationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByStationId($stationId = null, $comparison = null)
    {
        if (is_array($stationId)) {
            $useMinMax = false;
            if (isset($stationId['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_STATION_ID, $stationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stationId['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_STATION_ID, $stationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_STATION_ID, $stationId, $comparison);
    }

    /**
     * Filter the query on the administrator_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAdministratorId(1234); // WHERE administrator_id = 1234
     * $query->filterByAdministratorId(array(12, 34)); // WHERE administrator_id IN (12, 34)
     * $query->filterByAdministratorId(array('min' => 12)); // WHERE administrator_id > 12
     * </code>
     *
     * @see       filterByAdministrator()
     *
     * @param     mixed $administratorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByAdministratorId($administratorId = null, $comparison = null)
    {
        if (is_array($administratorId)) {
            $useMinMax = false;
            if (isset($administratorId['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_ADMINISTRATOR_ID, $administratorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($administratorId['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_ADMINISTRATOR_ID, $administratorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_ADMINISTRATOR_ID, $administratorId, $comparison);
    }

    /**
     * Filter the query on the duration column
     *
     * Example usage:
     * <code>
     * $query->filterByDuration(1234); // WHERE duration = 1234
     * $query->filterByDuration(array(12, 34)); // WHERE duration IN (12, 34)
     * $query->filterByDuration(array('min' => 12)); // WHERE duration > 12
     * </code>
     *
     * @param     mixed $duration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByDuration($duration = null, $comparison = null)
    {
        if (is_array($duration)) {
            $useMinMax = false;
            if (isset($duration['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_DURATION, $duration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duration['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_DURATION, $duration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_DURATION, $duration, $comparison);
    }

    /**
     * Filter the query on the duration_end_time column
     *
     * Example usage:
     * <code>
     * $query->filterByDurationEndTime('2011-03-14'); // WHERE duration_end_time = '2011-03-14'
     * $query->filterByDurationEndTime('now'); // WHERE duration_end_time = '2011-03-14'
     * $query->filterByDurationEndTime(array('max' => 'yesterday')); // WHERE duration_end_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $durationEndTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByDurationEndTime($durationEndTime = null, $comparison = null)
    {
        if (is_array($durationEndTime)) {
            $useMinMax = false;
            if (isset($durationEndTime['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_DURATION_END_TIME, $durationEndTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($durationEndTime['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_DURATION_END_TIME, $durationEndTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_DURATION_END_TIME, $durationEndTime, $comparison);
    }

    /**
     * Filter the query on the start_time column
     *
     * Example usage:
     * <code>
     * $query->filterByStartTime('2011-03-14'); // WHERE start_time = '2011-03-14'
     * $query->filterByStartTime('now'); // WHERE start_time = '2011-03-14'
     * $query->filterByStartTime(array('max' => 'yesterday')); // WHERE start_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $startTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByStartTime($startTime = null, $comparison = null)
    {
        if (is_array($startTime)) {
            $useMinMax = false;
            if (isset($startTime['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_START_TIME, $startTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startTime['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_START_TIME, $startTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_START_TIME, $startTime, $comparison);
    }

    /**
     * Filter the query on the end_time column
     *
     * Example usage:
     * <code>
     * $query->filterByEndTime('2011-03-14'); // WHERE end_time = '2011-03-14'
     * $query->filterByEndTime('now'); // WHERE end_time = '2011-03-14'
     * $query->filterByEndTime(array('max' => 'yesterday')); // WHERE end_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $endTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByEndTime($endTime = null, $comparison = null)
    {
        if (is_array($endTime)) {
            $useMinMax = false;
            if (isset($endTime['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_END_TIME, $endTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endTime['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_END_TIME, $endTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_END_TIME, $endTime, $comparison);
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE cost > 12
     * </code>
     *
     * @param     mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_COST, $cost, $comparison);
    }

    /**
     * Filter the query on the is_paid column
     *
     * Example usage:
     * <code>
     * $query->filterByIsPaid(1234); // WHERE is_paid = 1234
     * $query->filterByIsPaid(array(12, 34)); // WHERE is_paid IN (12, 34)
     * $query->filterByIsPaid(array('min' => 12)); // WHERE is_paid > 12
     * </code>
     *
     * @param     mixed $isPaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByIsPaid($isPaid = null, $comparison = null)
    {
        if (is_array($isPaid)) {
            $useMinMax = false;
            if (isset($isPaid['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_IS_PAID, $isPaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isPaid['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_IS_PAID, $isPaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_IS_PAID, $isPaid, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the is_in_session column
     *
     * Example usage:
     * <code>
     * $query->filterByIsInSession(1234); // WHERE is_in_session = 1234
     * $query->filterByIsInSession(array(12, 34)); // WHERE is_in_session IN (12, 34)
     * $query->filterByIsInSession(array('min' => 12)); // WHERE is_in_session > 12
     * </code>
     *
     * @param     mixed $isInSession The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function filterByIsInSession($isInSession = null, $comparison = null)
    {
        if (is_array($isInSession)) {
            $useMinMax = false;
            if (isset($isInSession['min'])) {
                $this->addUsingAlias(SessionTableMap::COL_IS_IN_SESSION, $isInSession['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isInSession['max'])) {
                $this->addUsingAlias(SessionTableMap::COL_IS_IN_SESSION, $isInSession['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SessionTableMap::COL_IS_IN_SESSION, $isInSession, $comparison);
    }

    /**
     * Filter the query by a related \CyberdenBundle\Model\Station object
     *
     * @param \CyberdenBundle\Model\Station|ObjectCollection $station The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSessionQuery The current query, for fluid interface
     */
    public function filterByStation($station, $comparison = null)
    {
        if ($station instanceof \CyberdenBundle\Model\Station) {
            return $this
                ->addUsingAlias(SessionTableMap::COL_STATION_ID, $station->getId(), $comparison);
        } elseif ($station instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SessionTableMap::COL_STATION_ID, $station->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStation() only accepts arguments of type \CyberdenBundle\Model\Station or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Station relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function joinStation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Station');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Station');
        }

        return $this;
    }

    /**
     * Use the Station relation Station object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CyberdenBundle\Model\StationQuery A secondary query class using the current class as primary query
     */
    public function useStationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Station', '\CyberdenBundle\Model\StationQuery');
    }

    /**
     * Filter the query by a related \CyberdenBundle\Model\Administrator object
     *
     * @param \CyberdenBundle\Model\Administrator|ObjectCollection $administrator The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSessionQuery The current query, for fluid interface
     */
    public function filterByAdministrator($administrator, $comparison = null)
    {
        if ($administrator instanceof \CyberdenBundle\Model\Administrator) {
            return $this
                ->addUsingAlias(SessionTableMap::COL_ADMINISTRATOR_ID, $administrator->getId(), $comparison);
        } elseif ($administrator instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SessionTableMap::COL_ADMINISTRATOR_ID, $administrator->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAdministrator() only accepts arguments of type \CyberdenBundle\Model\Administrator or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Administrator relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function joinAdministrator($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Administrator');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Administrator');
        }

        return $this;
    }

    /**
     * Use the Administrator relation Administrator object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CyberdenBundle\Model\AdministratorQuery A secondary query class using the current class as primary query
     */
    public function useAdministratorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdministrator($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Administrator', '\CyberdenBundle\Model\AdministratorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSession $session Object to remove from the list of results
     *
     * @return $this|ChildSessionQuery The current query, for fluid interface
     */
    public function prune($session = null)
    {
        if ($session) {
            $this->addUsingAlias(SessionTableMap::COL_ID, $session->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the session table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SessionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SessionTableMap::clearInstancePool();
            SessionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SessionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SessionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SessionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SessionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SessionQuery
