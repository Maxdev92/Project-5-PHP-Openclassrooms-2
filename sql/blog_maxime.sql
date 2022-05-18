drop database if exists `blog_maxime`;
create database `blog_maxime`;
use `blog_maxime`;

START TRANSACTION;

CREATE TABLE `user` (
                id INT NOT NULL AUTO_INCREMENT,
                username VARCHAR(45) NOT NULL UNIQUE,
                email VARCHAR(45) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                role VARCHAR(45) NOT NULL,
                createdAt DATE NOT NULL,
                PRIMARY KEY (id)
);

insert into `user` (username, email, password, role, createdAt)
values  
        ('Maxime', 'maxime.schubas@gmail.com', '$2y$10$EMbBteQPizUcKgxGScxtb.mpbzG6HH2FIDHy1VmfeyPAWi68eG5pm', 'admin', '2022-01-21'),
        ('Jean', 'jean.jean@gmail.com', 'PassWord', 'user', '2022-01-22');

CREATE TABLE `article` (
                id INT NOT NULL AUTO_INCREMENT,
                title VARCHAR(45) NOT NULL,
                chapo VARCHAR(45) NOT NULL,
                content TEXT NOT NULL,
                idAuthor INT(1) DEFAULT 1, 
                creationDate DATETIME NOT NULL,
                modifiedAt DATETIME,
                PRIMARY KEY (id)
);

insert into `article` (title, chapo, content, idAuthor, creationDate, modifiedAt)
values  


        ('Le prix des smartphones', 
        'Plus on avance, plus ils sont chers ?', 
        'De nos jours un smartphone coute cher, pourtant avant ils coutaient moins cher. Pour comprendre ce qui se joue en ce moment, il est important de se représenter, presque visuellement, l’intérieur d’un téléphone mobile. Un smartphone, c’est comme un puzzle : des dizaines, voire des centaines de pièces, des composants imbriqués.
        Certains coûtent beaucoup plus cher que d’autres : l’écran, la batterie, la mémoire. Ces trois-là ne sont pas concernés – pour l’instant – par la pénurie de composants, mais le moindre ressort, la moindre résistance est tout aussi indispensable. Sans chacune de ces pièces, pas de smartphone. Or, ce sont ces éléments qui arrivent, en ce moment, en rupture de stock.  '
        ,1, 
        NOW(),
        NOW()),

        ('Le prix des smartphones', 
        'Plus on avance, plus ils sont chers ?', 
        'De nos jours un smartphone coute cher, pourtant avant ils coutaient moins cher. Pour comprendre ce qui se joue en ce moment, il est important de se représenter, presque visuellement, l’intérieur d’un téléphone mobile. Un smartphone, c’est comme un puzzle : des dizaines, voire des centaines de pièces, des composants imbriqués.
        Certains coûtent beaucoup plus cher que d’autres : l’écran, la batterie, la mémoire. Ces trois-là ne sont pas concernés – pour l’instant – par la pénurie de composants, mais le moindre ressort, la moindre résistance est tout aussi indispensable. Sans chacune de ces pièces, pas de smartphone. Or, ce sont ces éléments qui arrivent, en ce moment, en rupture de stock.  '
        ,1, 
        NOW(),
        NOW()),

        ('Le prix des smartphones', 
        'Plus on avance, plus ils sont chers ?', 
        'De nos jours un smartphone coute cher, pourtant avant ils coutaient moins cher. Pour comprendre ce qui se joue en ce moment, il est important de se représenter, presque visuellement, l’intérieur d’un téléphone mobile. Un smartphone, c’est comme un puzzle : des dizaines, voire des centaines de pièces, des composants imbriqués.
        Certains coûtent beaucoup plus cher que d’autres : l’écran, la batterie, la mémoire. Ces trois-là ne sont pas concernés – pour l’instant – par la pénurie de composants, mais le moindre ressort, la moindre résistance est tout aussi indispensable. Sans chacune de ces pièces, pas de smartphone. Or, ce sont ces éléments qui arrivent, en ce moment, en rupture de stock.  '
        ,1, 
        NOW(),
        NOW());



CREATE TABLE `comment` (
                id INT AUTO_INCREMENT NOT NULL,
                postId INT NOT NULL,
                content VARCHAR(1000) NOT NULL,
                author INT NOT NULL,
                creationDate DATETIME NOT NULL,
                status INT DEFAULT 0,
                PRIMARY KEY (id)
);

insert into `comment` (postId, content, author, creationDate, status)
values  
        (1, 'Trop bien le post', 2, NOW(), 1),
        (2, 'Trop bien le post', 1, NOW(), 1),
        (3, 'Trop bien le post', 2, NOW(), 0);

ALTER TABLE `article` ADD CONSTRAINT id_author_fk
FOREIGN KEY (idAuthor)
REFERENCES `user` (id);

ALTER TABLE `comment` ADD CONSTRAINT id_post_comment_fk
FOREIGN KEY (postId)
REFERENCES `article` (id);
ALTER TABLE `comment` ADD CONSTRAINT id_user_comment_fk
FOREIGN KEY (author)
REFERENCES `user` (id);


-- hydratation de la bdd

COMMIT;