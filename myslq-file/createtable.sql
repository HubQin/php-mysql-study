--create student table

CREATE  TABLE  student (

id  INT(10)  NOT NULL  UNIQUE  PRIMARY KEY  ,

name  VARCHAR(20)  NOT NULL ,

sex  VARCHAR(4)  ,

birth  YEAR,

department  VARCHAR(20) ,

address  VARCHAR(50) 

);

--create score table

CREATE  TABLE  score (

id  INT(10)  NOT NULL  UNIQUE  PRIMARY KEY  AUTO_INCREMENT ,

stu_id  INT(10)  NOT NULL ,

c_name  VARCHAR(20) ,

grade  INT(10)

);
