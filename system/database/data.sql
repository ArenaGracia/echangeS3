CREATE DATABASE sakila;
use sakila;

CREATE TABLE customer (
  customer_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  email VARCHAR(50) DEFAULT NULL,
  create_date DATETIME NOT NULL,
  last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY  (customer_id),
  KEY idx_last_name (last_name)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


SET AUTOCOMMIT=0;
INSERT INTO customer VALUES 
(null,'MARY','SMITH','MARY.SMITH@sakilacustomer.org','2006-02-14 22:04:36','2006-02-15 04:57:20'),
(null,'PATRICIA','JOHNSON','PATRICIA.JOHNSON@sakilacustomer.org','2006-02-14 22:04:36','2006-02-15 04:57:20'),
(null,'LINDA','WILLIAMS','LINDA.WILLIAMS@sakilacustomer.org','2006-02-14 22:04:36','2006-02-15 04:57:20'),
(null,'BARBARA','JONES','BARBARA.JONES@sakilacustomer.org','2006-02-14 22:04:36','2006-02-15 04:57:20'),
(null,'ELIZABETH','BROWN','ELIZABETH.BROWN@sakilacustomer.org','2006-02-14 22:04:36','2006-02-15 04:57:20'),
(null,'JENNIFER','DAVIS','JENNIFER.DAVIS@sakilacustomer.org','2006-02-14 22:04:36','2006-02-15 04:57:20');
COMMIT;