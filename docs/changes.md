Schema Changes
--------------

In order for doctrine to work, we need to add primary keys to each table that didn't already have one.

```mysql

ALTER TABLE api_calls ADD call_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;

ALTER TABLE temperature_log ADD log_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;

ALTER TABLE drink_item_price_history ADD history_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;

ALTER TABLE api_calls ADD api_version INT NOT NULL;
ALTER TABLE api_calls
  MODIFY COLUMN api_version INT NOT NULL AFTER api_method;

ALTER TABLE slots ADD PRIMARY KEY (slot_num, machine_id);

```

All references to `webauth` are replaced with `auth`