CREATE TABLE users (
    user_id int NOT NULL AUTO_INCREMENT,
    user_name varchar(80),
    user_email varchar(256),
    user_matrix_number varchar(20),
    user_phone_number varchar(20),
    user_password varchar (256),
    user_programme varchar (256),
    user_created_at date default timestamp,
    PRIMARY KEY (user_id)

);