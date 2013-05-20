SHOW DATABASES;

/** 创建数据库 */
CREATE DATABASE IF NOT EXISTS strider default charset utf8 COLLATE utf8_general_ci;


CREATE TABLE app_user
(
	id_ int primary key AUTO_INCREMENT not null,
	nickname_ varchar(50) not null,
	email_ varchar(100) not null,
	password_ varchar(32) not null,
	status_ tinyint(1) not null,
	activate_ tinyint(1) not null,
	avatar_ varchar(300)
/**
	createtime_ datetime not null,
	createby_ int(32) not null,
	createip_ varchar(100) not null,
	updatetime_ datetime not null,
	updateby_ int(32) not null,
	updateip_ varchar(100) not null*/
);
CREATE TABLE app_user_info
(
	id_ varchar(32) primary key not null,
	user_id varchar(32) not null,
	create_time_ datetime not null,
	create_ip_ varchar(100) not null

);

CREATE TABLE app_user_login
(
	id_ varchar(32) primary key not null,
	user_id varchar(32) not null,
	ip_ varchar(32) not null
);

CREATE TABLE app_linkman_info
(
	id_ varchar(32) primary key not null,
	user_id varchar(32) not null,
	name_ varchar(50),
	describe_ varchar(500), 
	mobileNo_ varchar(20), /**手机号码*/
	telNo_ varchar(20),  /**电话号码*/
	qq_ int(15),
	fax_ int(15),
	birthday_ date,
	company_ varchar(100),
	position_ varchar(50),
	workAddress_ varchar(200),
	familyAddress_ varchar(200),
	homepage_ varchar(100)
);





EXPLAIN SELECT * FROM app_linkman_info;

