

show databases;
-- drop database app_lbscontacts;
use strider;
show tables;

select * from app_user;
select count(id_) from app_user;

delete from app_user;  -- 数据删不掉
commit;
truncate table app_user;

drop table app_album;

select * from app_article;

select * from app_album;









