CREATE TABLE Usuario(
 id_usuario  integer auto_increment NOT NULL,
  Num_Empleado VARCHAR(5) NOT NULL,
  contrasena VARCHAR(255) NOT NULL,
  Nombre  VARCHAR(150) NOT NULL,
  Nivel   VARCHAR(150) NOT NULL,
  CONSTRAINT uq_Num_Empleado UNIQUE(Num_Empleado),
  CONSTRAINT pk_id_usuario PRIMARY KEY(id_usuario)
) ENGINE=InnoDb DEFAULT CHARSET=UTF8;

CREATE TABLE Chofer (
  id_chofer  integer auto_increment NOT NULL,
  Nombre VARCHAR(150) NOT NULL, 
  Telefono VARCHAR(20) NOT NULL,  
  Num_Radio VARCHAR(20) NOT NULL, 
  Num_Licencia VARCHAR(20) NOT NULL, 
  CONSTRAINT uq_Num_Licencia UNIQUE(Num_Licencia), 
  CONSTRAINT pk_id_chofer PRIMARY KEY(id_chofer)
) ENGINE=InnoDb DEFAULT CHARSET=UTF8;


CREATE TABLE Taller (
  id_taller  integer auto_increment NOT NULL, 
  Descripcion VARCHAR(150) NOT NULL, 
  Direccion VARCHAR(150) NOT NULL, 
  Telefono VARCHAR(20) NOT NULL, 
  CONSTRAINT pk_id_taller PRIMARY KEY(id_taller)
)ENGINE=InnoDb DEFAULT CHARSET=UTF8;

CREATE TABLE Marca (
  id_marca  integer auto_increment NOT NULL, 
  Descripcion VARCHAR(150) NOT NULL,  
  CONSTRAINT pk_id_marca PRIMARY KEY (id_marca)
) ENGINE=InnoDb DEFAULT CHARSET=UTF8;

CREATE TABLE Mecanico ( 
  id_mecanico  integer auto_increment NOT NULL, 
  Nombre VARCHAR(250) NOT NULL, 
  Direccion VARCHAR(255) , 
  Telefono VARCHAR(255) ,  
  CONSTRAINT pk_id_mecanico PRIMARY KEY (id_mecanico)
) ENGINE=InnoDb DEFAULT CHARSET=UTF8;

CREATE TABLE Vehiculos(
  id_vehiculos  integer auto_increment NOT NULL,
  Placa VARCHAR(20) NOT NULL, 
  Numero VARCHAR(5) NOT NULL, 
  id_marca INTEGER NOT NULL, 
  Anio INTEGER NOT NULL, 
  Descripcion VARCHAR(255), 
  Estatus VARCHAR(20), 
  CONSTRAINT uq_Placa UNIQUE(Placa), 
  CONSTRAINT uq_Numero UNIQUE(Numero), 
  CONSTRAINT pk_id_vehiculos PRIMARY KEY(id_vehiculos),
  CONSTRAINT fk_Vehiculos_Marca FOREIGN KEY(id_marca) REFERENCES Marca(id_marca)
) ENGINE=InnoDb DEFAULT CHARSET=UTF8;



CREATE TABLE Registro (
  id_registro  integer auto_increment NOT NULL, 
  id_vehiculos INTEGER NOT NULL, 
  id_chofer INTEGER NOT NULL, 
  Falla VARCHAR(255) NOT NULL, 
  Kilometraje VARCHAR(255), 
  FechaEntrada DATE , 
  FechaSalida DATE , 
  id_taller INTEGER NOT NULL, 
  id_mecanico INTEGER NOT NULL, 
  CONSTRAINT pk_id_registro PRIMARY KEY(id_registro),
  CONSTRAINT fk_Registro_Vehiculo FOREIGN KEY(id_vehiculos) REFERENCES Vehiculos(id_vehiculos),
  CONSTRAINT fk_Registro_Chofer FOREIGN KEY(id_chofer) REFERENCES Chofer(id_chofer),
  CONSTRAINT fk_Registro_Taller FOREIGN KEY(id_taller) REFERENCES Taller(id_taller),
  CONSTRAINT fk_Registro_Mecanico FOREIGN KEY(id_mecanico) REFERENCES Mecanico(id_mecanico)
) ENGINE=InnoDb DEFAULT CHARSET=UTF8;

