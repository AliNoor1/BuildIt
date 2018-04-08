CREATE DATABASE IF NOT EXISTS buildit;
CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'password';
GRANT USAGE ON *.* TO 'admin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON buildit.* TO admin@localhost;
FLUSH PRIVILEGES;

USE buildit;

CREATE TABLE IF NOT EXISTS users (
	userID int(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(65) NOT NULL,
	password VARCHAR(255) NOT NULL,
	firstName text NOT NULL,
	lastName text NOT NULL,
	commonName text,
	joinDate datetime NOT NULL,
	city text,
	state text,
	bio text,
	email text NOT NULL,
    admin bit NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS contractors (
  contractorID int(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(65) NOT NULL,
	password VARCHAR(255) NOT NULL,
	firstName text NOT NULL,
	lastName text NOT NULL,
	joinDate datetime NOT NULL,
	city text,
	state text,
	bio text,
	email text NOT NULL,
	companyName text,
	phone int(10),
	address1 text,
	address2 text
);

CREATE TABLE IF NOT EXISTS forum_categories (
cat_id          INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
cat_name        VARCHAR(255) NOT NULL,
cat_description     VARCHAR(255) NOT NULL,
UNIQUE INDEX cat_name_unique (cat_name)
);

CREATE TABLE IF NOT EXISTS forum_topics (
topic_id        INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
topic_subject       VARCHAR(255) NOT NULL,
topic_date      DATETIME NOT NULL,
topic_cat       INT(8) NOT NULL,
topic_by        INT(8) NOT NULL
);

CREATE TABLE IF NOT EXISTS forum_posts (
post_id         INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
post_content        TEXT NOT NULL,
post_date       DATETIME NOT NULL,
post_topic      INT(8) NOT NULL,
post_by     INT(8) NOT NULL
);

-- Linking topics and categories
-- Make it so that when a category is deleted from the db, so are all its topics
ALTER TABLE forum_topics
  ADD FOREIGN KEY(topic_cat)
  REFERENCES forum_categories(cat_id)
  ON DELETE CASCADE ON UPDATE CASCADE;

-- Linking users and topics
ALTER TABLE forum_topics
  ADD FOREIGN KEY(topic_by)
  REFERENCES users(userID)
  ON DELETE RESTRICT ON UPDATE CASCADE;

-- Linking posts and topics
ALTER TABLE forum_posts
  ADD FOREIGN KEY(post_topic)
  REFERENCES forum_topics(topic_id)
  ON DELETE CASCADE ON UPDATE CASCADE;

-- Linking users to posts
ALTER TABLE forum_posts
  ADD FOREIGN KEY(post_by)
  REFERENCES users(userID)
  ON DELETE RESTRICT ON UPDATE CASCADE;
  
