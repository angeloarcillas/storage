<?php
namespace Core\Database;

use Core\Request;

class QueryBuilder extends Connection
{
    protected ?object $conn;

    /**
     * make database connection
     */
    public function __construct(array $config)
    {
        $this->conn = parent::make($config);
    }

    /**
     * query from database
     *
     * @param string $sql
     * @param array $params
     */
    public function query(string $sql, array $params = []): bool
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * query fetch all from database
     *
     * @param string $sql
     * @param array $params
     */
    public function querySelectAll(string $sql, array $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $params = (array) $params;
        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    /**
     * query for fetch 1 from database
     *
     * @param string $sql
     * @param array $params
     */
    public function querySelect(string $sql, array $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $params = (array) $params;
        $stmt->execute($params);

        return $stmt->fetch();
    }
    
    /**
     * Select all from database
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM ?");
        $stmt->execute([$table]);
        return $stmt->fetchAll();
    }

    /**
     * select from database
     *
     * @param string $table
     * @param array $params
     */
    public function select($table, array $params = ['*']): array
    {
        $sql = sprintf(
            "SELECT %s FROM {$table}",
            implode(",", $params)
        );
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }
    
    public function count($table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->rowCount();
    }

    /* !TODO:
        $query = Request::query('q') ?? null;
        $sort = $sort == 'ASC' ? 'ASC' : 'DESC' ?? null;
    */
    public function paginate($table, $limit = 5, $indicators = true)
    {
        $data = [];
        $data["current_page"] = $page = Request::query('page') ?? 1;
        $data["total"] = $this->count($table);
        $data["last_page"] = $pageNumbers = ceil($data["total"] / $limit);
        $offset = ($page - 1) * $limit;
        $data["per_page"] = $limit;

        if ($page > 1) {
            $data["prev"] = $page - 1;
        }

        if ($page < $pageNumbers) {
            $data["next"] = $page + 1;
            $data["last"] = $pageNumbers;
        }

        // INDICATORS
        if ($indicators) {
            if ($data["total"] < 1) {
                $data["from"] = 0;
                $data["to"] = 0;
            } else {
                $data["from"] = $offset + 1;
                $data["to"] = ($data["from"] - 1) + $limit;
            }
    
            if ($pageNumbers == $page) {
                $data["from"] = $data["total"];
            }
        }

        // DATA
        $sql = "SELECT * FROM $table LIMIT $offset, $limit";
        $data[$table] = $this->querySelectAll($sql, [$table,$offset,$limit]);

        $data["uri"] = '/'.Request::uri();
        return $data;
    }

    // public function setLinks($page, $pageNumbers)
    // {
    //     if ($page > 1) {
    //         $data["first"] = 1;
    //         $data["prev"] = $page - 1;
    //     }

    //     // Page Numbers
    //     for ($links = 1; $links <= $pageNumbers; $links++) {
    //         $data["links"][] = $links;
    //     }

    //     if ($page < $pageNumbers) {
    //         $data["next"] = $page + 1;
    //         $data["last"] = $pageNumbers;
    //     }
    //     return $data;
    // }

    // public function setIndicators($offset, $limit, $page, $pageNumbers, $total)
    // {
    //     if ($total < 1) {
    //         $data["from"] = 0;
    //         $data["to"] = 0;
    //     } else {
    //         $data["from"] = $offset + 1;
    //         $data["to"] = ($data["from"] - 1) + $limit;
    //     }

    //     if ($pageNumbers == $page) {
    //         $data["from"] = $data["total"];
    //     }
    //     return $data;
    // }

    public function __destruct()
    {
        $this->conn = null;
    }
}
