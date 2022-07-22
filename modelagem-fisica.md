```SQL
ALTER TABLE noticias
ADD CONSTRAINT fk_noticias_usuarios
FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
ON DELETE SET NULL ON UPDATE NO ACTION;
```

``` SQL
ALTER TABLE noticias
ADD CONSTRAINT fk_noticias_categorias
FOREIGN KEY (categoria_id) REFERENCES categorias(id)
ON DELETE SET NULL ON UPDATE NO ACTION;
```
```