CREATE DATABASE php02;

USE php02;

CREATE TABLE `worker` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`firstname` varchar(100) NOT NULL,
`lastname` varchar(100) NOT NULL,
`middlename` varchar(100) NOT NULL,
`department_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `department` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/* USE php02;
SHOW TABLES;

INSERT INTO department values( 1, 'bookkeeping'),
( 2, 'sales'),
( 3, 'financial'),
( 4, 'security'),
( 5, 'logistic');

SELECT department_id, COUNT(*)
    FROM worker
    group by department_id;

 SELECT department.name AS dep_name, department.id AS dep_id, worker.firstname AS worker_name FROM
    department INNER JOIN worker ON  department.id = worker.department_id;
 */
--first query----
SELECT A.dep_name, COUNT(dep_id) FROM
    ( SELECT department.name AS dep_name, department.id AS dep_id FROM
    department INNER JOIN worker ON  department.id = worker.department_id
    ) AS A GROUP BY dep_id HAVING COUNT(dep_id) >= 5;
--second query ----
SELECT A.dep_name, GROUP_CONCAT(worker_id) FROM
    ( SELECT department.name AS dep_name, department.id AS dep_id,  worker.id AS worker_id FROM
    department INNER JOIN worker ON  department.id = worker.department_id
    ) AS A GROUP BY dep_id HAVING COUNT(dep_id) >= 5;