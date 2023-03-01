
## Goal of the project
Chat - to show my skills with PHP, JS, Html and Css. You can use it in your website

## About the project
This is a Chat project in Vanilla. You can use it in your website for free. In this chat you can create users, login, select other used connected and talk with them in a reserved space for them. It's esay to apply this chat in your website. 

## Deeper in the proejct
In this proejct I use properly the functions given by PHP and JS. You can see the utilization of Ajax, and the Sessions functions given by PHP. 

##Teconologies 
Ajax and database PostgreSql

If you have any questions about this project, do not hesitate to contact me.
You can share it, copy it or display it on a web page.
Enjoy the code.

## You just have to create the tables in your database


CREATE TABLE IF NOT EXISTS public.messages
(
    msg_id integer NOT NULL DEFAULT nextval('messages_msg_id_seq'::regclass),
    incoming_msg_id integer,
    outgoing_msg_id integer,
    msg character varying(1000) COLLATE pg_catalog."default",
    CONSTRAINT messages_pkey PRIMARY KEY (msg_id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.messages
    OWNER to postgres;

## Table users
CREATE TABLE IF NOT EXISTS public.users
(
    user_id bigint NOT NULL DEFAULT nextval('users_user_id_seq'::regclass),
    unique_id integer,
    fname character varying(250) COLLATE pg_catalog."default",
    lname character varying(250) COLLATE pg_catalog."default",
    email character varying(250) COLLATE pg_catalog."default",
    password character varying(250) COLLATE pg_catalog."default",
    image character varying(450) COLLATE pg_catalog."default",
    status character varying(250) COLLATE pg_catalog."default",
    CONSTRAINT users_pkey PRIMARY KEY (user_id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.users
    OWNER to postgres;

