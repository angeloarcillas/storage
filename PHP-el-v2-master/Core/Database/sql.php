<?php
namespace Core\Database;

use PDO;
use Exception;

class QueryBuilder extends Connection
{
    protected ?object $conn;
    private string $table;

    private string $where;
    private array $whereParams;
    private array $holdWhere;

    private string $limit;
    private array $limitParams;
    

    /**
     * make database connection
     */
    public function __construct($config)
    {
        $this->conn = parent::make($config);
    }

    /**
     * query from database
     *
     * @param string $sql
     * @param array $params
     */
    public function query(string $sql, array $params = []) :bool
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * SELECT QUERY
     *
     * @param array $param
     */
    public function select(array $params = ['*'])
    {
        $sql = sprintf(
            "SELECT %s FROM $this->table $this->where $this->limit",
            implode(",", $params)
        );
        $params = array_merge($params, $this->whereParams, $this->limitParams);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

    /**
     * INSERT QUERY
     *
     * @param array $params
     */
    public function insert(array $params)
    {
        $sql = sprintf(
            "INSERT INTO $this->table (%s) VALUES (%s)",
            implode(",", array_keys($params)),
            ':'.implode(",", array_keys($params))
        );
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params, );
    }

    /**
     * UPDATE QUERY
     *
     * @param array $params
     */
    public function update(array $params)
    {
        if (strlen($this->where) < 9) {
            throw new Exception("where() is required");
        }

        $sql = sprintf(
            "UPDATE $this->table SET %s $this->where",
            implode("=?,", array_keys($params)).'=?'
        );
        $stmt = $this->conn->prepare($sql);
        $params = array_merge($params, $this->whereParams);
        $stmt->execute($params);
    }

    /**
     * DELETE QUERY
     */
    public function delete()
    {
        if (strlen($this->where) < 9) {
            throw new Exception("where() is required");
        }
        $sql = "DELETE FROM $this->table $this->where";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($this->whereParams);
    }

    /**
     * Set table
     *
     * @param string $table
     */
    public static function table(string $table)
    {
        $this->table = $table;
    }

    /**
     * Set WHERE SQL
     *
     * @param string $key
     * @param string $value
     * @param string $operator
     */
    public function where($key, $value, $operator = "=")
    {
        $this->holdWhere[] = ["$key $operator ?"];
        $this->where = "WHERE " .implode(" AND ", $this->holdWhere) . " ";
        $this->whereParams += [$key => $value];
    }
    public function orWhere($key, $value, $operator = "=")
    {
        $this->where .=  "OR $key $operator ? ";
        $this->whereParams += [$key => $value];
    }
    public function groupOrWhere($key, $value, $key2, $value2, $operator = "=", $operator2 = "=")
    {
        $this->where .=  "AND ($key $operator ? OR $key2 $operator2 ?) ";
        $this->whereParams += [$key => $value,$key2 => $value2];
    }
    
    /**
     * Set LIMIT SQL
     *
     * @param string $from
     * @param string $to
     */
    public function limit($from, $to)
    {
        $this->limit = " LIMIT ?,? ";
        $this->limitParams = ['from' => $from, 'to' => $to];
    }
    
    public function __destruct()
    {
        $this->conn = null;
    }
}
