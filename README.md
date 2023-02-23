## This is a chat made with PHP and JS in Vanilla 
Chat - to show my work, this is not heavy project is 117 Kb
You can use it in your website

## You just have to create the tables in your database

## Table in pgAdmin
## Table message

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

