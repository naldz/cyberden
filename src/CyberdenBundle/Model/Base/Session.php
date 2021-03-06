<?php

namespace CyberdenBundle\Model\Base;

use \DateTime;
use \Exception;
use \PDO;
use CyberdenBundle\Model\Administrator as ChildAdministrator;
use CyberdenBundle\Model\AdministratorQuery as ChildAdministratorQuery;
use CyberdenBundle\Model\SessionQuery as ChildSessionQuery;
use CyberdenBundle\Model\Station as ChildStation;
use CyberdenBundle\Model\StationQuery as ChildStationQuery;
use CyberdenBundle\Model\Map\SessionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'session' table.
 *
 *
 *
 * @package    propel.generator.src.CyberdenBundle.Model.Base
 */
abstract class Session implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CyberdenBundle\\Model\\Map\\SessionTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the station_id field.
     *
     * @var        int
     */
    protected $station_id;

    /**
     * The value for the administrator_id field.
     *
     * @var        int
     */
    protected $administrator_id;

    /**
     * The value for the duration field.
     *
     * @var        int
     */
    protected $duration;

    /**
     * The value for the duration_end_time field.
     *
     * @var        DateTime
     */
    protected $duration_end_time;

    /**
     * The value for the start_time field.
     *
     * @var        DateTime
     */
    protected $start_time;

    /**
     * The value for the end_time field.
     *
     * @var        DateTime
     */
    protected $end_time;

    /**
     * The value for the cost field.
     *
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $cost;

    /**
     * The value for the is_paid field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_paid;

    /**
     * The value for the comment field.
     *
     * @var        string
     */
    protected $comment;

    /**
     * The value for the is_in_session field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_in_session;

    /**
     * @var        ChildStation
     */
    protected $aStation;

    /**
     * @var        ChildAdministrator
     */
    protected $aAdministrator;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->cost = '0.00';
        $this->is_paid = 0;
        $this->is_in_session = 0;
    }

    /**
     * Initializes internal state of CyberdenBundle\Model\Base\Session object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Session</code> instance.  If
     * <code>obj</code> is an instance of <code>Session</code>, delegates to
     * <code>equals(Session)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Session The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [station_id] column value.
     *
     * @return int
     */
    public function getStationId()
    {
        return $this->station_id;
    }

    /**
     * Get the [administrator_id] column value.
     *
     * @return int
     */
    public function getAdministratorId()
    {
        return $this->administrator_id;
    }

    /**
     * Get the [duration] column value.
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Get the [optionally formatted] temporal [duration_end_time] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDurationEndTime($format = NULL)
    {
        if ($format === null) {
            return $this->duration_end_time;
        } else {
            return $this->duration_end_time instanceof \DateTimeInterface ? $this->duration_end_time->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [start_time] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getStartTime($format = NULL)
    {
        if ($format === null) {
            return $this->start_time;
        } else {
            return $this->start_time instanceof \DateTimeInterface ? $this->start_time->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [end_time] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEndTime($format = NULL)
    {
        if ($format === null) {
            return $this->end_time;
        } else {
            return $this->end_time instanceof \DateTimeInterface ? $this->end_time->format($format) : null;
        }
    }

    /**
     * Get the [cost] column value.
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Get the [is_paid] column value.
     *
     * @return int
     */
    public function getIsPaid()
    {
        return $this->is_paid;
    }

    /**
     * Get the [comment] column value.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get the [is_in_session] column value.
     *
     * @return int
     */
    public function getIsInSession()
    {
        return $this->is_in_session;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[SessionTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [station_id] column.
     *
     * @param int $v new value
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setStationId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->station_id !== $v) {
            $this->station_id = $v;
            $this->modifiedColumns[SessionTableMap::COL_STATION_ID] = true;
        }

        if ($this->aStation !== null && $this->aStation->getId() !== $v) {
            $this->aStation = null;
        }

        return $this;
    } // setStationId()

    /**
     * Set the value of [administrator_id] column.
     *
     * @param int $v new value
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setAdministratorId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->administrator_id !== $v) {
            $this->administrator_id = $v;
            $this->modifiedColumns[SessionTableMap::COL_ADMINISTRATOR_ID] = true;
        }

        if ($this->aAdministrator !== null && $this->aAdministrator->getId() !== $v) {
            $this->aAdministrator = null;
        }

        return $this;
    } // setAdministratorId()

    /**
     * Set the value of [duration] column.
     *
     * @param int $v new value
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setDuration($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->duration !== $v) {
            $this->duration = $v;
            $this->modifiedColumns[SessionTableMap::COL_DURATION] = true;
        }

        return $this;
    } // setDuration()

    /**
     * Sets the value of [duration_end_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setDurationEndTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->duration_end_time !== null || $dt !== null) {
            if ($this->duration_end_time === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->duration_end_time->format("Y-m-d H:i:s.u")) {
                $this->duration_end_time = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SessionTableMap::COL_DURATION_END_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setDurationEndTime()

    /**
     * Sets the value of [start_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setStartTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->start_time !== null || $dt !== null) {
            if ($this->start_time === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->start_time->format("Y-m-d H:i:s.u")) {
                $this->start_time = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SessionTableMap::COL_START_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setStartTime()

    /**
     * Sets the value of [end_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setEndTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->end_time !== null || $dt !== null) {
            if ($this->end_time === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->end_time->format("Y-m-d H:i:s.u")) {
                $this->end_time = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SessionTableMap::COL_END_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setEndTime()

    /**
     * Set the value of [cost] column.
     *
     * @param string $v new value
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setCost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cost !== $v) {
            $this->cost = $v;
            $this->modifiedColumns[SessionTableMap::COL_COST] = true;
        }

        return $this;
    } // setCost()

    /**
     * Set the value of [is_paid] column.
     *
     * @param int $v new value
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setIsPaid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->is_paid !== $v) {
            $this->is_paid = $v;
            $this->modifiedColumns[SessionTableMap::COL_IS_PAID] = true;
        }

        return $this;
    } // setIsPaid()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[SessionTableMap::COL_COMMENT] = true;
        }

        return $this;
    } // setComment()

    /**
     * Set the value of [is_in_session] column.
     *
     * @param int $v new value
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     */
    public function setIsInSession($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->is_in_session !== $v) {
            $this->is_in_session = $v;
            $this->modifiedColumns[SessionTableMap::COL_IS_IN_SESSION] = true;
        }

        return $this;
    } // setIsInSession()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->cost !== '0.00') {
                return false;
            }

            if ($this->is_paid !== 0) {
                return false;
            }

            if ($this->is_in_session !== 0) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SessionTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SessionTableMap::translateFieldName('StationId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->station_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SessionTableMap::translateFieldName('AdministratorId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->administrator_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SessionTableMap::translateFieldName('Duration', TableMap::TYPE_PHPNAME, $indexType)];
            $this->duration = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SessionTableMap::translateFieldName('DurationEndTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->duration_end_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SessionTableMap::translateFieldName('StartTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->start_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SessionTableMap::translateFieldName('EndTime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->end_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SessionTableMap::translateFieldName('Cost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SessionTableMap::translateFieldName('IsPaid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_paid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SessionTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SessionTableMap::translateFieldName('IsInSession', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_in_session = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = SessionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CyberdenBundle\\Model\\Session'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aStation !== null && $this->station_id !== $this->aStation->getId()) {
            $this->aStation = null;
        }
        if ($this->aAdministrator !== null && $this->administrator_id !== $this->aAdministrator->getId()) {
            $this->aAdministrator = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SessionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSessionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aStation = null;
            $this->aAdministrator = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Session::setDeleted()
     * @see Session::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SessionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSessionQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SessionTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SessionTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aStation !== null) {
                if ($this->aStation->isModified() || $this->aStation->isNew()) {
                    $affectedRows += $this->aStation->save($con);
                }
                $this->setStation($this->aStation);
            }

            if ($this->aAdministrator !== null) {
                if ($this->aAdministrator->isModified() || $this->aAdministrator->isNew()) {
                    $affectedRows += $this->aAdministrator->save($con);
                }
                $this->setAdministrator($this->aAdministrator);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[SessionTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SessionTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SessionTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(SessionTableMap::COL_STATION_ID)) {
            $modifiedColumns[':p' . $index++]  = 'station_id';
        }
        if ($this->isColumnModified(SessionTableMap::COL_ADMINISTRATOR_ID)) {
            $modifiedColumns[':p' . $index++]  = 'administrator_id';
        }
        if ($this->isColumnModified(SessionTableMap::COL_DURATION)) {
            $modifiedColumns[':p' . $index++]  = 'duration';
        }
        if ($this->isColumnModified(SessionTableMap::COL_DURATION_END_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'duration_end_time';
        }
        if ($this->isColumnModified(SessionTableMap::COL_START_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'start_time';
        }
        if ($this->isColumnModified(SessionTableMap::COL_END_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'end_time';
        }
        if ($this->isColumnModified(SessionTableMap::COL_COST)) {
            $modifiedColumns[':p' . $index++]  = 'cost';
        }
        if ($this->isColumnModified(SessionTableMap::COL_IS_PAID)) {
            $modifiedColumns[':p' . $index++]  = 'is_paid';
        }
        if ($this->isColumnModified(SessionTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }
        if ($this->isColumnModified(SessionTableMap::COL_IS_IN_SESSION)) {
            $modifiedColumns[':p' . $index++]  = 'is_in_session';
        }

        $sql = sprintf(
            'INSERT INTO session (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'station_id':
                        $stmt->bindValue($identifier, $this->station_id, PDO::PARAM_INT);
                        break;
                    case 'administrator_id':
                        $stmt->bindValue($identifier, $this->administrator_id, PDO::PARAM_INT);
                        break;
                    case 'duration':
                        $stmt->bindValue($identifier, $this->duration, PDO::PARAM_INT);
                        break;
                    case 'duration_end_time':
                        $stmt->bindValue($identifier, $this->duration_end_time ? $this->duration_end_time->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'start_time':
                        $stmt->bindValue($identifier, $this->start_time ? $this->start_time->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'end_time':
                        $stmt->bindValue($identifier, $this->end_time ? $this->end_time->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'cost':
                        $stmt->bindValue($identifier, $this->cost, PDO::PARAM_STR);
                        break;
                    case 'is_paid':
                        $stmt->bindValue($identifier, $this->is_paid, PDO::PARAM_INT);
                        break;
                    case 'comment':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'is_in_session':
                        $stmt->bindValue($identifier, $this->is_in_session, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SessionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getStationId();
                break;
            case 2:
                return $this->getAdministratorId();
                break;
            case 3:
                return $this->getDuration();
                break;
            case 4:
                return $this->getDurationEndTime();
                break;
            case 5:
                return $this->getStartTime();
                break;
            case 6:
                return $this->getEndTime();
                break;
            case 7:
                return $this->getCost();
                break;
            case 8:
                return $this->getIsPaid();
                break;
            case 9:
                return $this->getComment();
                break;
            case 10:
                return $this->getIsInSession();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Session'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Session'][$this->hashCode()] = true;
        $keys = SessionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getStationId(),
            $keys[2] => $this->getAdministratorId(),
            $keys[3] => $this->getDuration(),
            $keys[4] => $this->getDurationEndTime(),
            $keys[5] => $this->getStartTime(),
            $keys[6] => $this->getEndTime(),
            $keys[7] => $this->getCost(),
            $keys[8] => $this->getIsPaid(),
            $keys[9] => $this->getComment(),
            $keys[10] => $this->getIsInSession(),
        );
        if ($result[$keys[4]] instanceof \DateTime) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        if ($result[$keys[5]] instanceof \DateTime) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }

        if ($result[$keys[6]] instanceof \DateTime) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aStation) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'station';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'station';
                        break;
                    default:
                        $key = 'Station';
                }

                $result[$key] = $this->aStation->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAdministrator) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'administrator';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'administrator';
                        break;
                    default:
                        $key = 'Administrator';
                }

                $result[$key] = $this->aAdministrator->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\CyberdenBundle\Model\Session
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SessionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CyberdenBundle\Model\Session
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setStationId($value);
                break;
            case 2:
                $this->setAdministratorId($value);
                break;
            case 3:
                $this->setDuration($value);
                break;
            case 4:
                $this->setDurationEndTime($value);
                break;
            case 5:
                $this->setStartTime($value);
                break;
            case 6:
                $this->setEndTime($value);
                break;
            case 7:
                $this->setCost($value);
                break;
            case 8:
                $this->setIsPaid($value);
                break;
            case 9:
                $this->setComment($value);
                break;
            case 10:
                $this->setIsInSession($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = SessionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setStationId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAdministratorId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDuration($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDurationEndTime($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setStartTime($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEndTime($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCost($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setIsPaid($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setComment($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setIsInSession($arr[$keys[10]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\CyberdenBundle\Model\Session The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SessionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SessionTableMap::COL_ID)) {
            $criteria->add(SessionTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(SessionTableMap::COL_STATION_ID)) {
            $criteria->add(SessionTableMap::COL_STATION_ID, $this->station_id);
        }
        if ($this->isColumnModified(SessionTableMap::COL_ADMINISTRATOR_ID)) {
            $criteria->add(SessionTableMap::COL_ADMINISTRATOR_ID, $this->administrator_id);
        }
        if ($this->isColumnModified(SessionTableMap::COL_DURATION)) {
            $criteria->add(SessionTableMap::COL_DURATION, $this->duration);
        }
        if ($this->isColumnModified(SessionTableMap::COL_DURATION_END_TIME)) {
            $criteria->add(SessionTableMap::COL_DURATION_END_TIME, $this->duration_end_time);
        }
        if ($this->isColumnModified(SessionTableMap::COL_START_TIME)) {
            $criteria->add(SessionTableMap::COL_START_TIME, $this->start_time);
        }
        if ($this->isColumnModified(SessionTableMap::COL_END_TIME)) {
            $criteria->add(SessionTableMap::COL_END_TIME, $this->end_time);
        }
        if ($this->isColumnModified(SessionTableMap::COL_COST)) {
            $criteria->add(SessionTableMap::COL_COST, $this->cost);
        }
        if ($this->isColumnModified(SessionTableMap::COL_IS_PAID)) {
            $criteria->add(SessionTableMap::COL_IS_PAID, $this->is_paid);
        }
        if ($this->isColumnModified(SessionTableMap::COL_COMMENT)) {
            $criteria->add(SessionTableMap::COL_COMMENT, $this->comment);
        }
        if ($this->isColumnModified(SessionTableMap::COL_IS_IN_SESSION)) {
            $criteria->add(SessionTableMap::COL_IS_IN_SESSION, $this->is_in_session);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildSessionQuery::create();
        $criteria->add(SessionTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CyberdenBundle\Model\Session (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setStationId($this->getStationId());
        $copyObj->setAdministratorId($this->getAdministratorId());
        $copyObj->setDuration($this->getDuration());
        $copyObj->setDurationEndTime($this->getDurationEndTime());
        $copyObj->setStartTime($this->getStartTime());
        $copyObj->setEndTime($this->getEndTime());
        $copyObj->setCost($this->getCost());
        $copyObj->setIsPaid($this->getIsPaid());
        $copyObj->setComment($this->getComment());
        $copyObj->setIsInSession($this->getIsInSession());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \CyberdenBundle\Model\Session Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildStation object.
     *
     * @param  ChildStation $v
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStation(ChildStation $v = null)
    {
        if ($v === null) {
            $this->setStationId(NULL);
        } else {
            $this->setStationId($v->getId());
        }

        $this->aStation = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildStation object, it will not be re-added.
        if ($v !== null) {
            $v->addSession($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildStation object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildStation The associated ChildStation object.
     * @throws PropelException
     */
    public function getStation(ConnectionInterface $con = null)
    {
        if ($this->aStation === null && ($this->station_id !== null)) {
            $this->aStation = ChildStationQuery::create()->findPk($this->station_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStation->addSessions($this);
             */
        }

        return $this->aStation;
    }

    /**
     * Declares an association between this object and a ChildAdministrator object.
     *
     * @param  ChildAdministrator $v
     * @return $this|\CyberdenBundle\Model\Session The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAdministrator(ChildAdministrator $v = null)
    {
        if ($v === null) {
            $this->setAdministratorId(NULL);
        } else {
            $this->setAdministratorId($v->getId());
        }

        $this->aAdministrator = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAdministrator object, it will not be re-added.
        if ($v !== null) {
            $v->addSession($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAdministrator object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAdministrator The associated ChildAdministrator object.
     * @throws PropelException
     */
    public function getAdministrator(ConnectionInterface $con = null)
    {
        if ($this->aAdministrator === null && ($this->administrator_id !== null)) {
            $this->aAdministrator = ChildAdministratorQuery::create()->findPk($this->administrator_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAdministrator->addSessions($this);
             */
        }

        return $this->aAdministrator;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aStation) {
            $this->aStation->removeSession($this);
        }
        if (null !== $this->aAdministrator) {
            $this->aAdministrator->removeSession($this);
        }
        $this->id = null;
        $this->station_id = null;
        $this->administrator_id = null;
        $this->duration = null;
        $this->duration_end_time = null;
        $this->start_time = null;
        $this->end_time = null;
        $this->cost = null;
        $this->is_paid = null;
        $this->comment = null;
        $this->is_in_session = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

        $this->aStation = null;
        $this->aAdministrator = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SessionTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
