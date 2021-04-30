CREATE TABLE IF NOT EXISTS chat (
  chat_id int(11) NOT NULL AUTO_INCREMENT,
  chat_msg text NOT NULL,
  chat_username varchar(255) NOT NULL,
  chat_date timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (chat_id)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1
