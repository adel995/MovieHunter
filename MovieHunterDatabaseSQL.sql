CREATE TABLE user(
    fname varchar(15),
    lname varchar(15),
    e_mail varchar(50),
    gender char(1),
    psw varchar(60),
    dob date,
    user_id int(11) AUTO_INCREMENT,
    primary key (user_id)
);
CREATE TABLE profile_picture(
    picture_id int,
    primary key (picture_id),
    picture_size int, /* in bytes*/
    picture_format varchar(5),
    file_name varchar(20),
    belongs_to int,
    foreign key (belongs_to) 
    references user_info (user_id)
);

CREATE TABLE movie(
    movie_id int,
    primary key (movie_id),
    title varchar(50),
    description varchar(200),
    release_year int,
    movie_duration timestamp,
    rating decimal
);
CREATE TABLE movie_picture(
    picture_id int,
    primary key (picture_id),
    picture_size int, /* in bytes*/
    picture_format varchar(5),
    file_name varchar(20),
    belongs_to int,
    foreign key (belongs_to) 
    references movie (movie_id)
);
CREATE TABLE genre(
    genre_id varchar(3),
    primary key (genre_id),
    genre_name varchar(20)
);
CREATE TABLE watches(
    user_id int,
    foreign key (user_id) 
    references user_info (user_id),
    movie_id int,
    foreign key (movie_id)
    references movie (movie_id),
    pick_rating int,
    date_of_pick date,
    primary key (user_id,movie_id)
);  /* do we store info on multiple watches?!*/
CREATE TABLE prefers(
    user_id int,
    foreign key (user_id) 
    references user_info (user_id),
    genre_id varchar(5),
    foreign key (genre_id)
    references genre (genre_id)
);
CREATE TABLE movie_genre(
    movie_id int,
    foreign key (movie_id)
    references movie (movie_id),
    genre_id varchar(5),
    foreign key (genre_id)
    references genre (genre_id),
    primary key (movie_id,genre_id)
);