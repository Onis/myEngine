--CREATE DATABASE mvc;

CREATE TABLE IF NOT EXISTS user
(id SERIAL,
login VARCHAR(50),
password VARCHAR(50),
role ENUM('default','admin','owner') NOT NULL DEFAULT  'default'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO user (`login`, `password`, `role`) VALUES ('demo', 'e2b9d39151d4bf3612c6335fca797e92', 'default');
INSERT INTO user (`login`, `password`, `role`) VALUES ('admin', 'de08519a47754249769a51e875b6d07a', 'admin');
INSERT INTO user (`login`, `password`, `role`) VALUES ('owner', '2abf1b7fbe37115824186a1684d8bfe5', 'owner');

CREATE TABLE IF NOT EXISTS data
(id serial,
text varchar(255)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO user (`text`) VALUES ('Hello World!!');
INSERT INTO user (`text`) VALUES ('It is testing text news!!');




$this->db->insert('user', array(
                                        'login'=>'demo',
                                       'password'=>'e2b9d39151d4bf3612c6335fca797e92',
                                       'role'=>'default'));
           $this->db->insert('user', array(
                'login'=>'admin',
                'password'=>'de08519a47754249769a51e875b6d07a',
                'role'=>'admin'));
           $this->db->insert('user', array(
                'login'=>'owner',
                'password'=>'2abf1b7fbe37115824186a1684d8bfe5',
                'role'=>'owner'));