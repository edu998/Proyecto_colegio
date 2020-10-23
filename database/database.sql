CREATE DATABASE IF NOT EXISTS proyecto_colegio;
USE proyecto_colegio;

CREATE TABLE IF NOT EXISTS nivel(
id              int(255) auto_increment not null,
nombre          VARCHAR(150) not null,
tipo            VARCHAR(100) not null,
numero_tipo     VARCHAR(150) not null,
CONSTRAINT  pk_nivel PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS NIVEL_INSERT(
id              int(255),
nombre          VARCHAR(150),
tipo            VARCHAR(100),
numero_tipo     VARCHAR(150),
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER NIVEL_AI AFTER INSERT ON nivel FOR EACH ROW INSERT INTO nivel_insert VALUES(NEW.id, NEW.nombre, NEW.tipo, NEW.numero_tipo, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS NIVEL_UPDATE(
anterior_id              int(255),
anterior_nombre          VARCHAR(150),
anterior_tipo            VARCHAR(100),
anterior_numero_tipo     VARCHAR(150),
nuevo_id                 int(255),
nuevo_nombre             VARCHAR(150),
nuevo_tipo               VARCHAR(100),
nuevo_numero_tipo        VARCHAR(150),
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_NIVEL_BU BEFORE UPDATE ON nivel FOR EACH ROW INSERT INTO nivel_update VALUES(OLD.id, OLD.nombre, OLD.tipo, OLD.numero_tipo, NEW.id, NEW.nombre, NEW.tipo, NEW.numero_tipo, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS NIVEL_DELETE(
id              int(255),
nombre          VARCHAR(150),
tipo            VARCHAR(100),
numero_tipo     VARCHAR(150),
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_NIVEL_AD AFTER DELETE ON nivel FOR EACH ROW INSERT INTO nivel_delete VALUES(OLD.id, OLD.nombre, OLD.tipo, OLD.numero_tipo, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS estudiante(
id                  int(255) auto_increment not null,    
cedula              VARCHAR(12) not null,
nivel_id            int(255) not null,
primer_nombre       VARCHAR(150) not null,
segundo_nombre      VARCHAR(150) not null,
primer_apellido     VARCHAR(150) not null,
segundo_apellido    VARCHAR(150) not null,    
telefono_celular    VARCHAR(100) not null,
email               VARCHAR(150) not null,
sexo                VARCHAR(150) not null,
direccion           TEXT,
CONSTRAINT  pk_estudiante PRIMARY KEY(id),
CONSTRAINT  fk_estudiante_nivel FOREIGN KEY(nivel_id) REFERENCES nivel(id),
CONSTRAINT  uq_email  UNIQUE(email)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS ESTUDIANTE_INSERT(
id                  int(255),    
cedula              VARCHAR(12),
nivel_id            int(255),
primer_nombre       VARCHAR(150),
segundo_nombre      VARCHAR(150),
primer_apellido     VARCHAR(150),
segundo_apellido    VARCHAR(150),    
telefono_celular    VARCHAR(100),
email               VARCHAR(150),
sexo                VARCHAR(150),
direccion           TEXT,
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ESTUDIANTE_AI AFTER INSERT ON estudiante FOR EACH ROW INSERT INTO estudiante_insert VALUES(NEW.id, NEW.cedula, NEW.nivel_id, NEW.primer_nombre, NEW.segundo_nombre, NEW.primer_apellido, NEW.segundo_apellido, NEW.telefono_celular, NEW.email, NEW.sexo, NEW.direccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS ESTUDIANTE_UPDATE(
anterior_id                  int(255),    
anterior_cedula              VARCHAR(12),
anterior_nivel_id            int(255),
anterior_primer_nombre       VARCHAR(150),
anterior_segundo_nombre      VARCHAR(150),
anterior_primer_apellido     VARCHAR(150),
anterior_segundo_apellido    VARCHAR(150),    
anterior_telefono_celular    VARCHAR(100),
anterior_email               VARCHAR(150),
anterior_sexo                VARCHAR(150),
anterior_direccion           TEXT,
nuevo_id                  int(255),    
nuevo_cedula              VARCHAR(12),
nuevo_nivel_id            int(255),
nuevo_primer_nombre       VARCHAR(150),
nuevo_segundo_nombre      VARCHAR(150),
nuevo_primer_apellido     VARCHAR(150),
nuevo_segundo_apellido    VARCHAR(150),    
nuevo_telefono_celular    VARCHAR(100),
nuevo_email               VARCHAR(150),
nuevo_sexo                VARCHAR(150),
nuevo_direccion           TEXT,
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_ESTUDIANTE_BU BEFORE UPDATE ON estudiante FOR EACH ROW INSERT INTO estudiante_update VALUES(OLD.id, OLD.cedula, OLD.nivel_id, OLD.primer_nombre, OLD.segundo_nombre, OLD.primer_apellido, OLD.segundo_apellido, OLD.telefono_celular, OLD.email, OLD.sexo, OLD.direccion, NEW.id, NEW.cedula, NEW.primer_nombre, NEW.segundo_nombre, NEW.primer_apellido, NEW.segundo_apellido, NEW.telefono_celular, NEW.email, NEW.sexo, NEW.direccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS ESTUDIANTE_DELETE(
id                  int(255),    
cedula              VARCHAR(12),
nivel_id            int(255),
primer_nombre       VARCHAR(150),
segundo_nombre      VARCHAR(150),
primer_apellido     VARCHAR(150),
segundo_apellido    VARCHAR(150),    
telefono_celular    VARCHAR(100),
email               VARCHAR(150),
sexo                VARCHAR(150),
direccion           TEXT,
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_ESTUDIANTE_AD AFTER DELETE ON estudiante FOR EACH ROW INSERT INTO estudiante_delete VALUES(OLD.id, OLD.cedula, OLD.nivel_id, OLD.primer_nombre, OLD.segundo_nombre, OLD.primer_apellido, OLD.segundo_apellido, OLD.telefono_celular, OLD.email, OLD.sexo, OLD.direccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS inscripcion(
id                  int(255) auto_increment not null,
estudiante_id       int(255) not null,
status              VARCHAR(100) not null,
CONSTRAINT  pk_inscripcion PRIMARY KEY(id),
CONSTRAINT  fk_inscripcion_estudiante FOREIGN KEY(estudiante_id) REFERENCES estudiante(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS INSCRIPCION_INSERT(
id                  int(255),
estudiante_id       int(255),
status              VARCHAR(100),
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER INSCRIPCION_AI AFTER INSERT ON inscripcion FOR EACH ROW INSERT INTO inscripcion_insert VALUES(NEW.id, NEW.estudiante_id, NEW.status, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS INSCRIPCION_UPDATE(
anterior_id              int(255),
anterior_estudiante_id       int(255),
anterior_status              VARCHAR(100),
nuevo_id              int(255),
nuevo_estudiante_id       int(255),
nuevo_status              VARCHAR(100),
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_INSCRIPCION_BU BEFORE UPDATE ON inscripcion FOR EACH ROW INSERT INTO inscripcion_update VALUES(OLD.id, OLD.estudiante_id, OLD.status, NEW.id, NEW.estudiante_id, NEW.status, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS INSCRIPCION_DELETE(
id                  int(255),
estudiante_id       int(255),
status              VARCHAR(100),
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_INSCRIPCION_AD AFTER DELETE ON inscripcion FOR EACH ROW INSERT INTO inscripcion_delete VALUES(OLD.id, OLD.estudiante_id, OLD.status, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS usuario(
id                  int(255) auto_increment not null, 
cedula              VARCHAR(12) not null,
role                VARCHAR(15) null,
primer_nombre       VARCHAR(150) not null,
segundo_nombre      VARCHAR(150) not null,
primer_apellido     VARCHAR(150) not null,
segundo_apellido    VARCHAR(150) not null,    
telefono_celular    VARCHAR(100) not null,
email               VARCHAR(150) not null,
sexo                VARCHAR(150) not null,
direccion           TEXT,
CONSTRAINT  pk_usuario PRIMARY KEY(id),
CONSTRAINT uq_email  UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS USUARIO_INSERT(
id                  int(255),    
cedula              VARCHAR(12),
role                VARCHAR(15),
primer_nombre       VARCHAR(150),
segundo_nombre      VARCHAR(150),
primer_apellido     VARCHAR(150),
segundo_apellido    VARCHAR(150),    
telefono_celular    VARCHAR(100),
email               VARCHAR(150),
sexo                VARCHAR(150),
direccion           TEXT,
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER USUARIO_AI AFTER INSERT ON usuario FOR EACH ROW INSERT INTO usuario_insert VALUES(NEW.id, NEW.cedula, NEW.role, NEW.primer_nombre, NEW.segundo_nombre, NEW.primer_apellido, NEW.segundo_apellido, NEW.telefono_celular, NEW.email, NEW.sexo, NEW.direccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS USUARIO_UPDATE(
anterior_id                  int(255),    
anterior_cedula              VARCHAR(12),
anterior_role                VARCHAR(15),
anterior_primer_nombre       VARCHAR(150),
anterior_segundo_nombre      VARCHAR(150),
anterior_primer_apellido     VARCHAR(150),
anterior_segundo_apellido    VARCHAR(150),    
anterior_telefono_celular    VARCHAR(100),
anterior_email               VARCHAR(150),
anterior_sexo                VARCHAR(150),
anterior_direccion           TEXT,
nuevo_id                  int(255),    
nuevo_cedula              VARCHAR(12),
nuevo_role                VARCHAR(15),
nuevo_primer_nombre       VARCHAR(150),
nuevo_segundo_nombre      VARCHAR(150),
nuevo_primer_apellido     VARCHAR(150),
nuevo_segundo_apellido    VARCHAR(150),    
nuevo_telefono_celular    VARCHAR(100),
nuevo_email               VARCHAR(150),
nuevo_sexo                VARCHAR(150),
nuevo_direccion           TEXT,
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_USUARIO_BU BEFORE UPDATE ON usuario FOR EACH ROW INSERT INTO usuario_update VALUES(OLD.id, OLD.cedula, OLD.role, OLD.primer_nombre, OLD.segundo_nombre, OLD.primer_apellido, OLD.segundo_apellido, OLD.telefono_celular, OLD.email, OLD.sexo, OLD.direccion, NEW.id, NEW.cedula, NEW.role, NEW.primer_nombre, NEW.segundo_nombre, NEW.primer_apellido, NEW.segundo_apellido, NEW.telefono_celular, NEW.email, NEW.sexo, NEW.direccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS USUARIO_DELETE(
id                  int(255),    
cedula              VARCHAR(12),
role                VARCHAR(15),
primer_nombre       VARCHAR(150),
segundo_nombre      VARCHAR(150),
primer_apellido     VARCHAR(150),
segundo_apellido    VARCHAR(150),    
telefono_celular    VARCHAR(100),
email               VARCHAR(150),
sexo                VARCHAR(150),
direccion           TEXT,
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_USUARIO_AD AFTER DELETE ON usuario FOR EACH ROW INSERT INTO usuario_delete VALUES(OLD.id, OLD.cedula, OLD.role, OLD.primer_nombre, OLD.segundo_nombre, OLD.primer_apellido, OLD.segundo_apellido, OLD.telefono_celular, OLD.email, OLD.sexo, OLD.direccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS materia(
id                  int(255) auto_increment not null,
nombre              VARCHAR(100) not null,
CONSTRAINT  pk_materia PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS MATERIA_INSERT(
id                  int(255),
nombre              VARCHAR(100),
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER MATERIA_AI AFTER INSERT ON materia FOR EACH ROW INSERT INTO materia_insert VALUES(NEW.id, NEW.nombre, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS MATERIA_UPDATE(
anterior_id              int(255),
anterior_nombre              VARCHAR(100),
nuevo_id              int(255),
nuevo_nombre              VARCHAR(100),
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_MATERIA_BU BEFORE UPDATE ON materia FOR EACH ROW INSERT INTO materia_update VALUES(OLD.id, OLD.nombre, NEW.id, NEW.nombre, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS MATERIA_DELETE(
id                  int(255),
nombre              VARCHAR(100),
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_MATERIA_AD AFTER DELETE ON materia FOR EACH ROW INSERT INTO materia_delete VALUES(OLD.id, OLD.nombre, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS det_mat_prof(
id                  int(255) auto_increment not null,
usuario_id         int(255) not null,
materia_id          int(255) not null,
horario             VARCHAR(100) not null,
CONSTRAINT  pk_det_mat_prof PRIMARY KEY(id),
CONSTRAINT  fk_det_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id),
CONSTRAINT  fk_det_materia  FOREIGN KEY(materia_id) REFERENCES materia(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS DET_INSERT(
id                  int(255),
usuario_id         int(255),
materia_id          int(255),
horario_desde             VARCHAR(100),
horario_hasta             VARCHAR(100),
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER DET_AI AFTER INSERT ON det_mat_prof FOR EACH ROW INSERT INTO det_insert VALUES(NEW.id, NEW.usuario_id, NEW.materia_id, NEW.horario_desde, NEW.horario_hasta, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS DET_UPDATE(
anterior_id              int(255),
anterior_usuario_id       int(255),
anterior_materia_id       int(255),
anterior_horario_desde              VARCHAR(100),
anterior_horario_hasta              VARCHAR(100),
nuevo_id              int(255),
nuevo_usuario_id       int(255),
nuevo_materia_id       int(255),
nuevo_horario_desde              VARCHAR(100),
nuevo_horario_hasta              VARCHAR(100),
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_DET_BU BEFORE UPDATE ON det_mat_prof FOR EACH ROW INSERT INTO DET_update VALUES(OLD.id, OLD.usuario_id, OLD.materia_id, OLD.horario_desde, OLD.horario_hasta, NEW.id, NEW.usuario_id, NEW.materia_id, NEW.horario_desde, NEW.horario_hasta, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS DET_DELETE(
id                  int(255),
usuario_id         int(255),
materia_id          int(255),
horario_desde             VARCHAR(100),
horario_hasta             VARCHAR(100),
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_DET_AD AFTER DELETE ON det_mat_prof FOR EACH ROW INSERT INTO DET_delete VALUES(OLD.id, OLD.usuario_id, OLD.materia_id, OLD.horario_desde, OLD.horario_hasta, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS seccion(
id                        int(255) auto_increment not null,
detalle_id                int(255) not null,
estudiante_id             int(255) not null,
nombre_seccion            VARCHAR(100) not null,
CONSTRAINT  pk_seccion PRIMARY KEY(id),
CONSTRAINT  fk_seccion_detalle FOREIGN KEY(detalle_id) REFERENCES det_mat_prof(id),
CONSTRAINT  fk_seccion_estudiante  FOREIGN KEY(estudiante_id) REFERENCES estudiante(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS SECCION_INSERT(
id                        int(255),
detalle_id                int(255),
estudiante_id             int(255),
nombre_seccion            VARCHAR(100),
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER SECCION_AI AFTER INSERT ON seccion FOR EACH ROW INSERT INTO seccion_insert VALUES(NEW.id, NEW.detalle_id, NEW.estudiante_id, NEW.nombre_seccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS SECCION_UPDATE(
anterior_id              int(255),
anterior_detalle_id       int(255),
anterior_estudiante_id       int(255),
anterior_nombre_seccion              VARCHAR(100),
nuevo_id              int(255),
nuevo_detalle_id       int(255),
nuevo_estudiante_id       int(255),
nuevo_nombre_seccion              VARCHAR(100),
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_SECCION_BU BEFORE UPDATE ON seccion FOR EACH ROW INSERT INTO seccion_update VALUES(OLD.id, OLD.detalle_id, OLD.estudiante_id, OLD.nombre_seccion, NEW.id, NEW.detalle_id, NEW.estudiante_id, NEW.nombre_seccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS SECCION_DELETE(
id                        int(255),
detalle_id                int(255),
estudiante_id             int(255),
nombre_seccion            VARCHAR(100),
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_SECCION_AD AFTER DELETE ON seccion FOR EACH ROW INSERT INTO seccion_delete VALUES(OLD.id, OLD.detalle_id, OLD.estudiante_id, OLD.nombre_seccion, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS nota(
id                        int(255) auto_increment not null,
estudiante_id             int(255) not null,
materia_id                int(255) not null,
primera_nota              VARCHAR(120) not null,
segunda_nota              VARCHAR(120) not null,
tercera_nota              VARCHAR(120) not null,
cuarta_nota               VARCHAR(120) not null,
nota_final                VARCHAR(120) not null,
CONSTRAINT  pk_nota PRIMARY KEY(id),
CONSTRAINT  fk_nota_estudiante  FOREIGN KEY(estudiante_id) REFERENCES estudiante(id),
CONSTRAINT  fk_nota_materia FOREIGN KEY(materia_id) REFERENCES materia(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS NOTA_INSERT(
id                        int(255),
estudiante_id             int(255),
materia_id                int(255),
primera_nota              VARCHAR(120),
segunda_nota              VARCHAR(120),
tercera_nota              VARCHAR(120),
cuarta_nota               VARCHAR(120),
nota_final                VARCHAR(120),
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER NOTA_AI AFTER INSERT ON nota FOR EACH ROW INSERT INTO nota_insert VALUES(NEW.id, NEW.estudiante_id, NEW.materia_id, NEW.primera_nota, NEW.segunda_nota, NEW.tercera_nota, NEW.cuarta_nota, NEW.nota_final, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS NOTA_UPDATE(
anterior_id              int(255),
anterior_estudiante_id       int(255),
anterior_materia_id       int(255),
anterior_primera_nota              VARCHAR(120),
anterior_segunda_nota              VARCHAR(120),
anterior_tercera_nota              VARCHAR(120),
anterior_cuarta_nota              VARCHAR(120),
anterior_nota_final              VARCHAR(120),
nuevo_id              int(255),
nuevo_estudiante_id       int(255),
nuevo_materia_id       int(255),
nuevo_primera_nota              VARCHAR(120),
nuevo_segunda_nota              VARCHAR(120),
nuevo_tercera_nota              VARCHAR(120),
nuevo_cuarta_nota              VARCHAR(120),
nuevo_nota_final              VARCHAR(120),
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_NOTA_BU BEFORE UPDATE ON nota FOR EACH ROW INSERT INTO nota_update VALUES(OLD.id, OLD.estudiante_id, OLD.materia_id, OLD.primera_nota, OLD.segunda_nota, OLD.tercera_nota, OLD.cuarta_nota, OLD.nota_final, NEW.id, NEW.estudiante_id, NEW.materia_id, NEW.primera_nota, NEW.segunda_nota, NEW.tercera_nota, NEW.cuarta_nota, NEW.nota_final, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS NOTA_DELETE(
id                        int(255),
estudiante_id             int(255),
materia_id                int(255),
primera_nota              VARCHAR(120),
segunda_nota              VARCHAR(120),
tercera_nota              VARCHAR(120),
cuarta_nota               VARCHAR(120),
nota_final                VARCHAR(120),
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_NOTA_AD AFTER DELETE ON nota FOR EACH ROW INSERT INTO nota_delete VALUES(OLD.id, OLD.estudiante_id, OLD.materia_id, OLD.primera_nota, OLD.segunda_nota, OLD.tercera_nota, OLD.cuarta_nota, OLD.nota_final, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS pago(
id                        int(255) auto_increment not null,
estudiante_id             int(255) not null,
tipo_pago                 VARCHAR(200) not null,
descripcion               VARCHAR(100) not null,
num_transferencia         VARCHAR(100) null,
created_at                DATE,
updated_at                DATE,      
CONSTRAINT  pk_pago PRIMARY KEY(id),
CONSTRAINT  fk_pago_estudiante FOREIGN KEY(estudiante_id) REFERENCES estudiante(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS PAGO_INSERT(
id                        int(255),
estudiante_id             int(255),
tipo_pago                 VARCHAR(200),
descripcion               VARCHAR(100),
nombre_pago               VARCHAR(100),
transferencia             VARCHAR(100), 
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER PAGO_AI AFTER INSERT ON pago FOR EACH ROW INSERT INTO pago_insert VALUES(NEW.id, NEW.estudiante_id, NEW.tipo_pago, NEW.descripcion, NEW.nombre_pago, NEW.transferencia, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS PAGO_UPDATE(
anterior_id                        int(255),
anterior_estudiante_id             int(255),
anterior_tipo_pago                 VARCHAR(200),
anterior_descripcion               VARCHAR(100),
anterior_nombre_pago               VARCHAR(100),
anterior_transferencia             VARCHAR(100),
nuevo_id              int(255),
nuevo_estudiante_id             int(255),
nuevo_tipo_pago                 VARCHAR(200),
nuevo_descripcion               VARCHAR(100),
nuevo_nombre_pago               VARCHAR(100),
nuevo_transferencia             VARCHAR(100),
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_PAGO_BU BEFORE UPDATE ON pago FOR EACH ROW INSERT INTO pago_update VALUES(OLD.id, OLD.estudiante_id, OLD.tipo_pago, OLD.descripcion, OLD.nombre_pago, OLD.transferencia, NEW.id, NEW.estudiante_id, NEW.tipo_pago, NEW.descripcion, NEW.nombre_pago, NEW.transferencia, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS PAGO_DELETE(
id                        int(255),
estudiante_id             int(255),
tipo_pago                 VARCHAR(200),
descripcion               VARCHAR(100),
nombre_pago               VARCHAR(100),
transferencia             VARCHAR(100), 
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_PAGO_AD AFTER DELETE ON pago FOR EACH ROW INSERT INTO pago_delete VALUES(OLD.id, OLD.estudiante_id, OLD.tipo_pago, OLD.descripcion, OLD.nombre_pago, OLD.transferencia, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS control_pago(
id                        int(255) auto_increment not null,
pago_id                   int(255) not null,
status                    VARCHAR(100) not null,
created_at                DATE,
updated_at                DATE,
CONSTRAINT  pk_control_pago PRIMARY KEY(id),
CONSTRAINT  fk_control_p_pago FOREIGN KEY(pago_id) REFERENCES pago(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS CONTROL_INSERT(
id                        int(255),
pago_id                   int(255),
status                    VARCHAR(100),
usuario         VARCHAR(100),
created_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER CONTROL_AI AFTER INSERT ON control_pago FOR EACH ROW INSERT INTO control_insert VALUES(NEW.id, NEW.pago_id, NEW.status, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS CONTROL_UPDATE(
anterior_id                        int(255),
anterior_pago_id                   int(255),
anterior_status                    VARCHAR(100),
nuevo_id                        int(255),
nuevo_pago_id                   int(255),
nuevo_status                    VARCHAR(100),
usuario                  VARCHAR(100),
updated_at               timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ACTUALIZA_CONTROL_BU BEFORE UPDATE ON control_pago FOR EACH ROW INSERT INTO control_update VALUES(OLD.id, OLD.pago_id, OLD.status, NEW.id, NEW.pago_id, NEW.status, CURRENT_USER(), NOW());

CREATE TABLE IF NOT EXISTS CONTROL_DELETE(
id                        int(255),
pago_id                   int(255),
status                    VARCHAR(100),
usuario         VARCHAR(100),
deleted_at      timestamp
)ENGINE=InnoDb;

CREATE TRIGGER ELIMINA_CONTROL_AD AFTER DELETE ON control_pago FOR EACH ROW INSERT INTO control_delete VALUES(OLD.id, OLD.pago_id, OLD.status, CURRENT_USER(), NOW());

