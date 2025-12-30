CREATE TABLE joueurs(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    email VARCHAR(150),
    nationalite VARCHAR(50),
    pseudo VARCHAR(50),
    role VARCHAR(50),
    valeur_marchande DECIMAL(12, 2)
);

CREATE TABLE coachs(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    email VARCHAR(150),
    nationalite VARCHAR(50),
    annees_experience INT
);

CREATE TABLE equipes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    budget DECIMAL(14, 2),
    manager VARCHAR(100)
);

CREATE TABLE contrats(
    id INT PRIMARY KEY AUTO_INCREMENT,
    joueur_id INT,
    coach_id INT,
    equipe_id INT,
    salaire DECIMAL(10, 2),
    date_debut DATE,
    date_fin DATE,
    FOREIGN KEY (joueur_id) REFERENCES joueurs(id),
    FOREIGN KEY (coach_id) REFERENCES coachs(id),
    FOREIGN KEY (equipe_id) REFERENCES equipes(id)
);

CREATE TABLE transferts(
    id INT PRIMARY KEY AUTO_INCREMENT,
    joueur_id INT,
    equipe_depart_id INT,
    equipe_arrivee_id INT,
    montant DECIMAL(12, 2),
    statut VARCHAR(50),
    FOREIGN KEY (joueur_id) REFERENCES joueurs(id),
    FOREIGN KEY (equipe_depart_id) REFERENCES equipes(id),
    FOREIGN KEY (equipe_arrivee_id) REFERENCES equipes(id)
);