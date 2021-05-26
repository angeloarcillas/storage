#SQL -Structured Query Language
-https://www.w3schools.com/sql/sql_ref_keywords.asp
===========COMMON USED================
    SELECT - extracts data from a database
    UPDATE - updates data in a database
    DELETE - deletes data from a database
    INSERT INTO - inserts new data into a database
    CREATE DATABASE - creates a new database
    ALTER DATABASE - modifies a database
    CREATE TABLE - creates a new table
    ALTER TABLE - modifies a table
    DROP TABLE - deletes a table
    CREATE INDEX - creates an index (search key)
    DROP INDEX - deletes an index
    SHOW DATABASES - list database
==========================================
ALTER - modify
MODIFY - modify
ADD - append
DROP - delete
USE - use a particular database

[ Constraint ] - specify rule for data
    -NOT NULL - not empty
    -UNIQUE - different values
    -PRIMARY KEY - unique identifies each records in table //UNIQUE+NOT NULL
    -FOREIGN KEY - link 2 tables together
    -CHECK -> limit value range // CHECK (condition)
    -DEFAULT -> default values
    -INDEX -> create indexes in table
AUTO_INCREMENT - unique number generated auto when theres new record
DISTINCT - different values
BETWEEN - between a certain range
LIKE - search for pattern
IN - specify multiple values for a column
AND | OR | NOT - logical &|!
ORDER BY - sort // ORDER BY x , y -> order x but if x has same value order y
NULL - no value
IS - check
MIN() | MAX() - select min/max value
TOP - same as limit //SELECT TOP 10 PERCENT * FROM users
PERCENT - %
COUNT() - count number of rows
AVG() - return average of numeric value
SUM() - return sum of numeric value
LIKE
    -% - represent zero,one or multiple char
    -_ - rep single char
AS - alias
JOIN - combine
    -INNER -> return that have matching values
    -LEFT OUTER -> return from left then match from right
    -RIGHT OUTER -> return from right then match from left
    -FULL OUTER -> return when there is match in either left or right
    -ON -> refers to the fields of previously used table
UNION - combine 2 or more SELECT statement
GROUP BY - group rows // ex. find the number of users w/ admin type
HAVING - HAVING condition //created since WHERE cant use aggregated function
EXISTS - if exists
ANY | ALL - used by WHERE/HAVING //if 1 | all condition is true
PROCEDURE - store query
EXEC - execute PROCEDURE
VIEW - https://www.w3schools.com/sql/sql_view.asp // virtual table based on result set of statement

[ Case ]
CASE - like if then else
----------------------------------------------------------
CASE
    WHEN condition1 THEN result1
    WHEN condition2 THEN result2
    WHEN conditionN THEN resultN
    ELSE result
END;
---------------------------------------------------------

[ Null Function ]
IFNULL() | COALESCE() - return alternative value if null
ISNULL() - retunt alternative value when null
NVL() - oracle server

[ Comment ]
--comment - single line comment
/* comment */ - multi line comment

[ Dates ] -https://www.w3schools.com/sql/sql_dates.asp

    DATE - format YYYY-MM-DD
    DATETIME - format: YYYY-MM-DD HH:MI:SS
    TIMESTAMP - format: YYYY-MM-DD HH:MI:SS
    YEAR - format YYYY or YY

=========WILDCARD CHARACTERS===========
represents    -https://www.w3schools.com/sql/sql_wildcards.asp

% - zero or more
_ - single char
[] - any single char w/in brackets
^ - any char not in the brackets
-    range

===========BACKUP===============
BACKUP DATABASE ...
TO DISK = ' path '
WITH DIFFERENTIAL; // -> optional - differential only backup changes from full backup



LIMIT
ORDER BY - sort
WHERE


AFTER DELETE
BEFORE DELETE
AFTER CREATE
BEFORE CREATE
AFTER UPDATE
BEFORE UPDATE
