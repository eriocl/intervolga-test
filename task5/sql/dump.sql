CREATE TABLE countries (
    id integer PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
    name varchar(255) NOT NULL UNIQUE ,
    capital varchar(255) NOT NULL UNIQUE ,
    area integer NOT NULL,
    created_at TIMESTAMPTZ DEFAULT Now()
);