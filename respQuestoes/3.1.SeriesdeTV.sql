CREATE TABLE series_tv (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255),
    canal VARCHAR(255),
    genero VARCHAR(255)
);

CREATE TABLE series_tv_intervalos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_serie_tv INT,
    dia_da_semana VARCHAR(255),
    horario TIME,
    FOREIGN KEY (id_serie_tv) REFERENCES series_tv(id)
);
