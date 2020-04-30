create database if not exists php_basics;

use php_basics;

create table if not exists post
(
    id          int auto_increment
        primary key,
    title       varchar(200)                        not null,
    content     text                                null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    delete_date datetime                            null,
    user_id     int                                 null
);

create table if not exists user
(
    id          int auto_increment
        primary key,
    user_name   varchar(60)                         not null,
    password    varchar(200)                        null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    delete_date datetime                            null,
    constraint user_user_name_uindex
        unique (user_name)
);

