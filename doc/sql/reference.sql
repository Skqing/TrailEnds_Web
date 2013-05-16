
-- 获取当前时间
select now();
select sysdate(); 

-- now 和 sysdate的区别，参考：http://database.51cto.com/art/201010/229204.htm
select now(), sleep(3), now();
select sysdate(), sleep(3), sysdate();


