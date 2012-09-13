--CREATE DATABASE mvc;



CREATE TABLE IF NOT EXISTS user
( `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(30),
  `password` VARCHAR(32),
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `middle_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `role` ENUM('default','admin','owner') NOT NULL DEFAULT  'default',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO user (`login`, `password`, `role`) VALUES ('demo', 'e2b9d39151d4bf3612c6335fca797e92', 'default');
INSERT INTO user (`login`, `password`, `role`) VALUES ('admin', 'de08519a47754249769a51e875b6d07a', 'admin');
INSERT INTO user (`login`, `password`, `role`) VALUES ('owner', '2abf1b7fbe37115824186a1684d8bfe5', 'owner');

CREATE TABLE IF NOT EXISTS data
(`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(255) NOT NULL,
 `url` varchar(255) NOT NULL,
 `text` longtext NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO user (`text`) VALUES ('Hello World!!');
INSERT INTO user (`text`) VALUES ('It is testing text news!!');




$this->db->insert('user', array(
                                        'login'=>'demo',
                                       'password'=>'e2b9d39151d4bf3612c6335fca797e92',
                                       'role'=>'default'));
           $this->db->insert('user', array(  а н
                'login'=>'admin',
                'password'=>'de08519a47754249769a51e875b6d07a',
                'role'=>'admin'));
           $this->db->insert('user', array(
                'login'=>'owner',
                'password'=>'2abf1b7fbe37115824186a1684d8bfe5',
                'role'=>'owner'));