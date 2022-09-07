SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE vwa;
CREATE DATABASE vwa;
use vwa;

CREATE TABLE IF NOT EXISTS userlogin (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(200) NOT NULL,
  password varchar(33) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


INSERT INTO `userlogin` (`id`, `username`, `password`) VALUES
  (99, 'mentor', 'a1857b83457cfef98da22fefa2fdd3ba');
  
INSERT INTO `userlogin` (`id`, `username`, `password`) VALUES
  (1, 'admin', 'a631f025057cd3fe0fb4fe19f6b46309');

