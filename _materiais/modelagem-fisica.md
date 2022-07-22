<!-- Criando as tabelas em SQL -->

```sql
CREATE TABLE
```


```sql
CREATE TABLE categorias(
    id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,nome VARCHAR(45) NOT NULL
);
```

```sql
CREATE TABLE noticias(
    id MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT, data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, titulo VARCHAR(150) NOT NULL,
     texto TEXT NOT NULL,
      resumo TEXT TINYTEXT,
    --   No banco de dados, só guardamos a referência da imagem, pois a imagem no banco de dados prejudica a performance.
      imagem VARCHAR(45) NOT NULL,
      destaque ENUM('sim','nao') NOT NULL,
      usuario_id SMALLINT NULL,
      categoria_id SMALLINT NULL 
);
```

```sql
-- Onde estão os campos que vão ser adicionados as foreign key
ALTER TABLE noticias
ADD CONSTRAINT fk_noticias_usuarios
FOREIGN KEY (usuarios_id) REFERENCES usuarios(id)
ON DELETE SET NULL ON UPDATE NO ACTION;
```

```sql
ALTER TABLE noticias
ADD CONSTRAINT fk_noticias_categorias FOREIGN KEY (categorias_id) REFERENCES categorias(id) ON DELETE SET NULL ON UPDATE NO ACTION;
```