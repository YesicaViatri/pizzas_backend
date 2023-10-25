--lun28/08

create database prueba;
drop database prueba; (((para eliminar)))

create table users(id_user int(11) not null auto_increment primary key, ((crear estructura llamada "users"))
                   username varchar(20) not null,
                   password char(64) not null,
                   email varchar(80) not null,
                   active enum("si","no") default "si")
                   engine=innodb default charset=utf8mb4 
                   collate utf8mb4_general_ci;

alter table users add column created_at timestamp; ((crear columna)

describe users;  // o desc users;   (((ctrl+enter o continuar))

   ((ctrl+d= borrar linea completa))

alter table users modify column created_at timestamp default current_timestamp; ((modificar columna))

alter table drop column created_at; ((para eliminar la columna))

insert into users ( , , )   ((nombre de columnas, separado por comas))
insert into users (username,password,email) values ('maria',sha2('123465',256),'maria@gmail.com');

select * from users; ((para ver todos los datos guardados))
   SELECT username, password from users;
   SELECT username, password,created_at from users;
   SELECT date(created_at) from users; ((funcion date para mostrar solo la fecha))

insert into users values (null,'pepe',sha2('abcde',256),'pepe@gmail.com','no','2021-08-24');
   SELECT count(*) FROM users;

SELECT username active from users;
select upper(USERNAME),active from users; ((funcion para escribir en mayuscula))

miercoles 30/08

SELECT * FROM users;
select username, email from users;
select username, email from users order by username asc;
select username, email from users where (username ='maria');

insert into users values (null,'mariano',sha2('123456',256),'mariano@mercadolibre.com',null,null);

select * from users where (username ='mariano');
  ((pattern= patron)) ((% es un comodin que representa un conjunto de caracteres))

  select * from users where username like 'maria%';
  select * from users where not username='maria';
  select * from users where id_user=1 or id_user=2;
SELECT * FROM users where password=sha2('123456',256);

SELECT * FROM users WHERE (username='maria') and (password=sha2('123456',256));
                             (((MODIFICAR CONTRASEÑA DE MARIA)))
SELECT * FROM users WHERE ((username='maria') or (email='maria@gmail.com')) and (password=sha2('123456',256));
SELECT * FROM users WHERE ((username='maria') or (email='maria@gmail.com')) and (password=sha2('123456',256)) and (active='si');
SELECT count(*) FROM users WHERE ((username='maria') or (email='maria@gmail.com')) and (password=sha2('123456',256)) and (active='si');

miercoles 20/9 ..
BOOTSTRAP=
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

tabla html en php:::
  opcion1
    $table = "<table>"."<thead>"."<tr>"."<th>Id</th>"."<th>Producto</th>"."<th>Categoria</th>"."<th>Precio</th>"."<th>Fecha de Alta</th>"."</tr>"."</thead>";
  opcion2
    $table = "<table><thead><tr><th>Id</th><th>Producto</th><th>Categoria</th><th>Precio</th><th>Fecha de Alta</th></tr></thead>";

lunes25/9

create database commerce;
create table categories( id_category int(11) not null primary key auto_increment,category_name varchar(50) not null)engine=innodb default charset=utf8mb4 collate utf8mb4_general_ci;

create table products( id_product int(11) not null auto_increment primary key,product_name varchar(50) not null,price decimal(7,2) not null,start_date timestamp default current_timestamp,id_category int(11) not null,image varchar(255))engine=innodb default charset=utf8mb4 collate utf8mb4_general_ci;

alter table products add constraint products_categories foreign key(id_category)references categories(id_category);

miercoles 27/9
#comentarios en sql

#insert into categories (category_name) values ('pizzas');

#SELECT * from categories;
# SELECT id_category FROM categories;

INSERT into categories (category_name) VALUES ('hamburguesas');

SELECT category_name from categories;
SELECT COUNT(*) from categories;
SELECT COUNT(*) as 'cantidad de categorias' from categories;

insert into categories (category_name) VALUES ('Picadas');

SELECT * from categories WHERE category_name='hamburguesas';
SELECT * from categories WHERE upper(category_name)=upper('Hamburguesas');
select * from categories WHERE upper(category_name)=upper('picadas') or upper(category_name)=upper('pizzas');
select * from categories WHERE upper(category_name) like upper('picad%');
select * from categories WHERE upper(category_name) like upper('picad%') or upper(category_name) like upper('piz%');

insert into categories (category_name) values ('gaseosas');
INSERT INTO products (product_name,price,id_category,image) values ('fugazzeta',2700,1,"img\fugazzeta_cleanup (2).jpg");

SELECT * from products;

#INSERT INTO products (product_name,price,id_category,image) values ('fugazzeta',2700,1,"img\fugazzeta_cleanup (2).jpg");
#INSERT INTO products (product_name,price,id_category,image) values ('4quesos',4300,1,"img\pizza-4-quesos (2).jpg");
#INSERT INTO products (product_name,price,id_category,image) values ('albahaca',3700,1,"img\pizza-de-albahaca (2).jpg");
#INSERT INTO products (product_name,price,id_category,image) values ('muzzarrella',3700,1,"img\pizza-muzzarella (2).jpg");
#INSERT INTO products (product_name,price,id_category,image) values ('napolitana',3900,1,"img\pizza-napolitana (2).jpg");
#INSERT INTO products (product_name,price,id_category,image) values ('rucula y crudo',4500,1,"img\pizza-rucula-y-jamon-crudo (2).jpg");
#INSERT INTO products (product_name,price,id_category,image) values ('jamon y morron',4300,1,"img/jamon y morron (2).jpeg");

#SELECT count(*) from products;
#SELECT product_name,price from products;
#select price from products where upper(product_name)=upper('napolitana');
#SELECT min(price) from products;
#SELECT max(price) from products;
#select avg(price) from products;

lunes 2/10

#select min(price) from products;
#select min(price) from products group by id_category;
#select * from categories;
#desc products;

#INSERT INTO products (product_name,price,id_category,image) values ('coca_cola_1,5',850,4,"img/coca_cola.jpg");

select min(price),id_category from products group by id_category;
select min(products.price),categories.category_name from products inner join categories on categories.id_category=products.id_category;

select price,c.category_name,p.product_name from products p inner join categories c on c.id_category=p.id_category;
select count(*),c.category_name from products p inner join categories c on c.id_category=p.id_category GROUP by p.id_category;
select count(*),c.category_name from products p inner join categories c on c.id_category=p.id_category GROUP by p.id_category order by c.category_name desc;

SELECT * from products where id_category in (1,2);
SELECT DISTINCT(id_category) from products;
SELECT id_category FROM products where id_category not in (SELECT id_category from products);
SELECT id_category FROM products where id_category in (SELECT id_category from products);
SELECT DISTINCT(id_category) FROM products where id_category in (SELECT id_category from products);

miercoles 4/10

select * from products p inner join categories c on c.id_category=p.id_category;

select p.product_name, p.image, p.price, p.start_date, c.category_name from products p inner join categories c on c.id_category=p.id_category order by p.price  asc; 
select p.product_name, p.image, p.price, date_format(p.start_date,'%d/%m/%Y'), c.category_name from products p inner join categories c on c.id_category=p.id_category order by p.price  asc; 

select p.product_name, p.image, p.price, date_format(p.start_date,'%d/%m/%Y') as date, c.category_name from products p inner join categories c on c.id_category=p.id_category order by p.price  asc; 

lunes 9/10
iNSERT INTO products (product_name,price,id_category,image) values ('picada_especial_para_2',1200,3,"img/picada_especial.jpg");

SELECT * FROM products WHERE product_name like '%coca%';  ((((id 8))))

   !!!!!..LINEA PARA BORRAR UN PRODUCTO..!!!
  DELETE FROM products WHERE id_product=8;   ((BORRADO DE COCA COLA))

SELECT * from products where product_name like '%picada%';

update products set price=13000 where id_product=9;
update products set price=price+(price*0.02);  ((aumenta el 2% a todos los productos))

iNSERT INTO products (product_name,price,id_category,image) values ('picada_vegana',7000,3,"img/picada_vegana.jpg");

update products set price=price+(price*0.03) where id_product=10;
update products set product_name='picada especial vegana saludable' WHERE id_product=10;

INSERT into categories (category_name) VALUES ('promo');

iNSERT INTO products (product_name,price,id_category,image) values ('promo 1',10000,5,"img/promo1.jpg");

miercoles11/10

select p.id_product, p.product_name, p.start_date, p.price, c.category_name from products p inner join categories c on p.id_category=c.id_category;


lunes 23/10

