create table class(
  `id` INT(11) not null,
  `building` VARCHAR (2) not null comment "栋",
  `room` VARCHAR (3) not null comment "课室号",
  `size` tinyint(1) not null comment "容纳人数,1:50人，2：100人，3：150人",
  `type` tinyint(1) not null comment "2:实验室，1：课室",
  PRIMARY KEY (id)
);


create table `order`(
  `id` INT (11) not null,
  `class_id` int(11) not null,
  `date` DATE not null comment "申请日期",
  `time` VARCHAR(16) not null comment "时间，上午，下午，晚上",
  `name` VARCHAR (16) not null comment "申请人",
  `num` VARCHAR (11) not null comment "学生号",
  `phone` VARCHAR (11) not null,
  `email` VARCHAR (26) not null,
  `check` tinyint(1) DEFAULT 1 comment "审核意见，1为审核中，2为通过，3为不通过",
  `comment` varchar(300) DEFAULT null comment "申请理由",
PRIMARY key (id)
);

create table admin(
  `user` VARCHAR (16) not null,
  `password` VARCHAR (35) not null
);

INSERT into admin values('admin','96e79218965eb72c92a549dd5a330112');
create table course(
  `class_id` int(11) not null ,
  `week` VARCHAR (1) not null comment "星期",
  `time` VARCHAR (16) not null comment "时间:时间，上午，下午，晚上",
  PRIMARY KEY (class_id,week,time)
)