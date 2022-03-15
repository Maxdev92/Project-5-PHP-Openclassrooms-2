drop database if exists `blog_maxime`;
create database `blog_maxime`;
use `blog_maxime`;

START TRANSACTION;

CREATE TABLE `user` (
                id_user INT NOT NULL AUTO_INCREMENT,
                username VARCHAR(45) NOT NULL,
                email VARCHAR(45) NOT NULL,
                password VARCHAR(45) NOT NULL,
                role VARCHAR(45) NOT NULL,
                created_at DATE NOT NULL,
                PRIMARY KEY (id_user)
);

insert into `user` (username, email, password, role, created_at)
values  
        ('Maxime', 'maxime.schubas@gmail.com', 'MotDePasse', 'admin', '2022-01-21'),
        ('Jean', 'jean.jean@gmail.com', 'PassWord', 'user', '2022-01-22');

CREATE TABLE `article` (
                id INT NOT NULL AUTO_INCREMENT,
                title VARCHAR(45) NOT NULL,
                chapo VARCHAR(45) NOT NULL,
                content TEXT NOT NULL,
                id_author INT NOT NULL, 
                creation_date DATETIME NOT NULL,
                modified_at DATETIME,
                PRIMARY KEY (id)
);

insert into `article` (title, chapo, content, id_author, creation_date, modified_at)
values  
        ('Le prix des smartphones', 
        'Plus on avance, plus ils sont chers ?', 
        'De nos jours un smartphone coute cher, pourtant avant ils coutaient moins cher. Pour comprendre ce qui se joue en ce moment, il est important de se représenter, presque visuellement, l’intérieur d’un téléphone mobile. Un smartphone, c’est comme un puzzle : des dizaines, voire des centaines de pièces, des composants imbriqués.
        Certains coûtent beaucoup plus cher que d’autres : l’écran, la batterie, la mémoire. Ces trois-là ne sont pas concernés – pour l’instant – par la pénurie de composants, mais le moindre ressort, la moindre résistance est tout aussi indispensable. Sans chacune de ces pièces, pas de smartphone. Or, ce sont ces éléments qui arrivent, en ce moment, en rupture de stock.  '
        ,1, 
        '2022-02-01 20:34:00',
        '2022-02-01 20:02:04');


CREATE TABLE `comment` (
                id INT AUTO_INCREMENT NOT NULL,
                post_id INT NOT NULL,
                content VARCHAR(1000) NOT NULL,
                author VARCHAR(45) NOT NULL,
                creation_date DATETIME NOT NULL,
                PRIMARY KEY (id)
);

insert into `comment` (post_id, content, author, creation_date)
values  
        (1, 'Trop bien le post', 'Max', '2022-01-21 08:00:00');

ALTER TABLE `article` ADD CONSTRAINT id_author_fk
FOREIGN KEY (id_author)
REFERENCES `user` (id_user);

ALTER TABLE `comment` ADD CONSTRAINT id_post_comment_fk
FOREIGN KEY (post_id)
REFERENCES `article` (id);


-- hydratation de la bdd

COMMIT;