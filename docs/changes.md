Schema Changes
--------------

In order for doctrine to work, we need to add primary keys to each table that didn't already have one.

```mysql

ALTER TABLE api_calls ADD call_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;

ALTER TABLE temperature_log ADD log_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;

```