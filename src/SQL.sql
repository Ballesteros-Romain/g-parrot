CREATE TABLE avis (
    id INT AUTO_INCREMENT NOT NULL,
    parent_id INT DEFAULT NULL,
    name VARCHAR(255) NOT NULL,
    commentaire LONGTEXT NOT NULL,
    note INT NOT NULL,
    INDEX IDX_8F91ABF0727ACA70 (parent_id),
    PRIMARY KEY(id)
) 

CREATE TABLE cars (
    id INT AUTO_INCREMENT NOT NULL,
    marque VARCHAR(255) NOT NULL,
    kilometre INT NOT NULL,
    annee INT NOT NULL,
    price NUMERIC(5, 2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
) 

CREATE TABLE formulaire (
    id INT AUTO_INCREMENT NOT NULL,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    tel INT NOT NULL,
    message LONGTEXT NOT NULL,
    PRIMARY KEY(id)
)

CREATE TABLE horaires (
    id INT AUTO_INCREMENT NOT NULL,
    parent_id INT DEFAULT NULL,
    heure_matin VARCHAR(255) NOT NULL,
    heure_soir VARCHAR(255) NOT NULL,
    jour VARCHAR(255) NOT NULL,
    INDEX IDX_39B7118F727ACA70 (parent_id),
    PRIMARY KEY(id)
)

CREATE TABLE services (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
)

CREATE TABLE sous_services (
    id INT AUTO_INCREMENT NOT NULL,
    parent_id INT DEFAULT NULL,
    name VARCHAR(255) NOT NULL,
    texte LONGTEXT NOT NULL,
    INDEX IDX_7B7CD53C727ACA70 (parent_id),
    PRIMARY KEY(id)
)

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL,
    services_id INT DEFAULT NULL,
    email VARCHAR(180) NOT NULL,
    is_verified TINYINT(1) NOT NULL,
    roles JSON NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email),
    INDEX IDX_1483A5E9AEF5A6C1 (services_id),
    PRIMARY KEY(id)
)

CREATE TABLE messenger_messages (
    id BIGINT AUTO_INCREMENT NOT NULL,
    body LONGTEXT NOT NULL,
    headers LONGTEXT NOT NULL,
    queue_name VARCHAR(190) NOT NULL,
    created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)',
    available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)',
    delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
    INDEX IDX_75EA56E0FB7336F0 (queue_name),
    INDEX IDX_75EA56E0E3BD61CE (available_at),
    INDEX IDX_75EA56E016BA31DB (delivered_at),
    PRIMARY KEY(id)
)

ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0727ACA70 FOREIGN KEY (parent_id) REFERENCES users (id);
ALTER TABLE horaires ADD CONSTRAINT FK_39B7118F727ACA70 FOREIGN KEY (parent_id) REFERENCES users (id);
ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A727ACA70 FOREIGN KEY (parent_id) REFERENCES cars (id);
ALTER TABLE sous_services ADD CONSTRAINT FK_7B7CD53C727ACA70 FOREIGN KEY (parent_id) REFERENCES services (id);
ALTER TABLE users ADD CONSTRAINT FK_1483A5E9AEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id);


                            -- AJOUT DE VEHICULE

INSERT INTO cars (marque, kilometre, annee, price, image) VALUES('peugeot', 100000, 2019, 43000, 'polo.png')

                            -- AJOUT D'AVIS 

INSERT INTO avis (name, commentaire, note) VALUES('romain', 'un super garage au soins de ses clients', 8)

                            -- SUPPRESSION

DELETE FROM cars WHERE id = 1;
DELETE FROM avis WHERE id = 3;
DELETE FROM formulaire WHERE id = 2;