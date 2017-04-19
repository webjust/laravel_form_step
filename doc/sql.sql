-- 库名
CREATE DATABASE `example`;

-- 选库
use example

-- 学生信息表
CREATE TABLE `student`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '学生姓名',
  `age` INT(3) NOT NULL DEFAULT 0 COMMENT '年龄',
  `sex` TINYINT(1) NOT NULL DEFAULT 2 COMMENT '0:女，1:男，2:未知'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 测试数据
INSERT INTO `student` (name, age, sex) VALUES
('张三', 20, 1),
('李四', 18, 1),
('王五', 90, 1),
('王婆', 99, 0),
('李桂花', 66, 0),
('小丽', 16, 2);

-- 修改student表结构
ALTER TABLE `student` ADD `created_time` INT(10) NULL DEFAULT 0 COMMENT '用户创建时间' AFTER `sex`;
ALTER TABLE `student` ADD `updated_time` INT(10) NULL DEFAULT 0 COMMENT '最后修改时间' AFTER `created_time`;

-- 添加1条测试数据
INSERT INTO `student` (name, age, sex, created_time, updated_time) VALUES ('侯亮平', 35, 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP());
