create DATABASE tienda;
create user tienda identified by 'tiendaBueno';
use tienda;
grant all on tienda.* to tienda;
--
CREATE TABLE usuarios(
  idUsuario int PRIMARY KEY not null,
  usuario varchar(50) not null,
  password varchar(50) not null
  
) engine =innodb;

INSERT INTO usuarios VALUES (1,'cesardiaz','hola123');
INSERT INTO usuarios VALUES (2,'miguelgar','adios123');
INSERT INTO usuarios VALUES (3,'olgaes','a123456');
INSERT INTO usuarios VALUES (4,'mariad','a654321');

create table productos(
   idProducto int primary key NOT NULL,
   cantidad numeric(7,2) NOT NULL,
   precio float(7,2),
   nombreProducto varchar(50) NOT NULL,
   descripcion text not null
  
)engine=innodb;

INSERT INTO productos VALUES (1,'200','650','iPhone 11','Cuenta con 4 GB de memoria y 64 / 128 / 512 GB de almacenamiento interno. iPhone 11 posee dos cámaras traseras. El sensor principal es de 12 MP y 26 mm, con una apertura f/1.8, un tamaño de píxel de 1.4 micras, Autofoco y OIS. ... El sensor secundario es un gran angular de 12 MP y 13 mm, con una apertura f/2.4.');
INSERT INTO productos VALUES (2,'250','800','iPhone 11 Pro','La pantalla Super Retina XDR del iPhone 11 Pro tiene un tamaño de 5,8 pulgadas, con una resolución de 2436 x 1125 píxeles, con tecnología OLED. Alcanza los 458 puntos por pulgada. El ratio de pantalla es 19,5:9.');
INSERT INTO productos VALUES (3,'150','500','Samsung galaxy S10', 'El Galaxy S10 tiene una pantalla QHD+ Dynamic AMOLED de 6.1 pulgadas, y está potenciado por el nuevo procesador Exynos 9820 de ocho núcleos o bien un Snapdragon 855, con 8GB de RAM y 128GB o 512GB de almacenamiento.');
INSERT INTO productos VALUES (4,'180','600','Samsung galaxy S10+', 'El Samsung Galaxy S10+ es el más poderoso de la serie Galaxy S10. Con una pantalla AMOLED QHD+ de 6.4 pulgadas, el Galaxy S10+ está potenciado por el procesador Exynos 9820 octa-core o Snapdragon 855, con opciones de 6GB o 12GB de RAM y 128GB, 512GB o 1TB de almacenamiento.');

create table compran (
    idCompra int AUTO_INCREMENT,
    idProducto int not null,
    idUsuario int not null,
    precio_total float(7,2) not null,
    fecha date not null,
    PRIMARY KEY(idCompra, idProducto, idUsuario)
)engine=innodb;