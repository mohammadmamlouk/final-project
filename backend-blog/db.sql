create schema blog collate utf8mb4_unicode_ci;



CREATE USER 'blogAdmin'@'localhost' IDENTIFIED BY 'blogAdmin123';
GRANT ALL PRIVILEGES ON blog.* TO 'blogAdmin'@'localhost';
FLUSH PRIVILEGES;


use blog;

create table users (
                       id INT auto_increment primary key,
                       name varchar(255) NOT NULL,
                       email varchar(255) NOT NULL
);

create table posts (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title varchar(255) NOT NULL,
                       content mediumtext NOT NULL,
                       user_id INT NOT NULL,
                       FOREIGN KEY (user_id) references users(id)
);

create table comments (
                          id INT auto_increment primary key,
                          content mediumtext NOT NULL,
                          post_id int NOT NULL,
                          user_id int NOT NULL,
                          FOREIGN KEY (post_id) references posts(id) ON DELETE CASCADE,
                          FOREIGN KEY (user_id) references users(id)
);



INSERT INTO users (name, email) VALUES
                                    ('Mohammad Mamlouk', 'mohammadmamlouk9@gmail.com'),
                                    ('Ahmad', 'ahmad@gmail.com'),
                                    ('Lana', 'lana@gmail.com');

INSERT INTO posts (title, content, user_id) VALUES
                                                ('Sunset at the Beach', 'Captured this beautiful sunset while walking along the shore.', 1),
                                                ('Morning Coffee', 'Nothing beats the aroma of freshly brewed coffee in the morning.', 2),
                                                ('Hiking Adventure', 'Explored the mountains today and the view was breathtaking!', 3),
                                                ('Delicious Pasta', 'Tried a new pasta recipe and it turned out amazing!', 1),
                                                ('City Lights', 'The city looks magical at night with all the lights.', 2);

INSERT INTO comments (content, post_id, user_id) VALUES
                                                     ('Wow, this looks amazing!', 1, 2),
                                                     ('I need to try this coffee shop!', 2, 3),
                                                     ('The mountains are calling!', 3, 1),
                                                     ('Looks delicious! Can you share the recipe?', 4, 3),
                                                     ('The city never sleeps!', 5, 1);