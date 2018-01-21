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

CREATE TABLE drink_images
(
    drink_id INT(11) PRIMARY KEY NOT NULL,
    wide VARCHAR(255),
    square VARCHAR(255),
    CONSTRAINT drink_images_drink_items_item_id_fk FOREIGN KEY (drink_id) REFERENCES drink_items (item_id)
);
CREATE UNIQUE INDEX drink_images_drink_id_uindex ON drink_images (drink_id);
```

All references to `webauth` are replaced with `auth`