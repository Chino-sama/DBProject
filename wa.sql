-- MySQL Script generated by MySQL Workbench
-- Sat Apr 14 10:43:55 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP DATABASE IF EXISTS ititdb;
CREATE DATABASE ititdb;
USE ititdb;
-- -----------------------------------------------------
-- Table `STUDENT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `STUDENT` (
  `student_id` VARCHAR(9) NOT NULL,
  `name` VARCHAR(80) NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE INDEX `student_id_UNIQUE` (`student_id` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTATIVE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTATIVE` (
  `optative_id` VARCHAR(6) NOT NULL,
  `name` VARCHAR(80) NULL,
  `objective` LONGTEXT NULL,
  `scheme` LONGTEXT NULL,
  `type` INT NULL,
  `block` INT,
  PRIMARY KEY (`optative_id`),
  UNIQUE INDEX `optative_id_UNIQUE` (`optative_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `REQUIREMENT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `REQUIREMENT` (
  `optative_id` VARCHAR(6) NOT NULL,
  `req_id` VARCHAR(6) NOT NULL,
  `req_name` VARCHAR(80) NULL,
  PRIMARY KEY (`optative_id`, `req_id`),
  CONSTRAINT `fk_REQUIREMENT_OPTATIVE1`
    FOREIGN KEY (`optative_id`)
    REFERENCES `OPTATIVE` (`optative_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ADMIN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ADMIN` (
  `admin_id` VARCHAR(9) NOT NULL,
  `admin_name` VARCHAR(80) NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE INDEX `admin_id_UNIQUE` (`admin_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ENROLLMENT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ENROLLMENT` (
  `student_id` VARCHAR(9) NOT NULL,
  `optative_id` VARCHAR(6) NOT NULL,
  `status` TINYINT NULL,
  `type` TINYINT NOT NULL,

  PRIMARY KEY (`student_id`, `optative_id`),
  INDEX `fk_STUDENT_has_OPTATIVE_OPTATIVE1_idx` (`optative_id` ASC),
  INDEX `fk_STUDENT_has_OPTATIVE_STUDENT1_idx` (`student_id` ASC),
  CONSTRAINT `fk_STUDENT_has_OPTATIVE_STUDENT1`
    FOREIGN KEY (`student_id`)
    REFERENCES `STUDENT` (`student_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_STUDENT_has_OPTATIVE_OPTATIVE1`
    FOREIGN KEY (`optative_id`)
    REFERENCES `OPTATIVE` (`optative_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO ADMIN VALUES ('L011', 'Grettel Barceló Alonso');

INSERT INTO STUDENT VALUES
('A01273062', 'Luis Manuel Juárez Palazuelos'),
('A01272986', 'Miguel Angel Martínez Martínez'),
('A01273675', 'Osvaldo Gómez Tirado'),
('A01273743', 'Joshua Esperilla Anaya'),
('A01273676', 'Paola Pérez Valencia'),
('A01273781', 'Diana Alicia Bernal Chacha'),
('A01273800', 'José Eduardo Arteaga Valdés'),
('A01273831', 'Oscar Guevara Islas'),
('A01273860', 'Alejandra de la Torre Ibarra'),
('A01273888', 'María José Bolaños Domínguez'),
('A01273949', 'Oliver Geovanni García'),
('A01274058', 'Gilberto Medina Trejo'),
('A01274088', 'Edson Morales Cruz'),
('A01274089', 'Erhart Fabián Castillo Castellanos'),
('A01275139', 'Kevin Israel Guzmán Jiménez'),
('A01275136', 'José Ángel Olvera López'),
('A01275275', 'Homero Adrián Pérez Pérez'),
('A01275375', 'Jaime Bryan Perales Hernández'),
('A01273096', 'Daniel Alejandro Rodríguez Castro'),
('A01273755', 'Raiza Fernanda Cibrián Moreno');

INSERT INTO OPTATIVE VALUES
('AD1005', 'Administración e innovación en modelos de negocios',
'Al finalizar el curso el alumno será capaz de:
- Analizar e identificar la forma en que las estrategias de la administración y la innovación de modelos de negocios generan valor
en las organizaciones.
- Comprender el papel que juega la tecnología, con el propósito de entender la forma de responder con mayor flexibilidad
estratégica a los continuos cambios del entorno de los negocios.',
'1. La innovación en los procesos de administración contemporánea.
1.1 ¿Qué es administración?
1.2. Funciones administrativas.
1.2.1 El proceso de planeación.
1.2.2 La organización y su estructura orgánica.
1.2.2.1 Enfoque funcional en la organización, descripción y desventajas en el mundo actual.
1.2.2.2 Enfoque de procesos de negocios, flujos organizaciones y su relación con la generación de valor.
1.2.2.3 ¿Cómo transformar una estructura organizacional vertical anclada en funciones a una estructura horizontal delimitando
procesos en su cadena de valor?
1.2.3 La dirección flexible en entornos cambiantes.
1.2.4 Los sistemas de control e indicadores de desempeño organizacional.
1.3 Tipos de administradores.
1.4 El impacto de la tecnología de información (IT) en los roles y habilidades administrativas.
1.5. Retos para administrar en un ambiente global.
2. La innovación como factor clave de éxito.
2.1 ¿Qué es el concepto de innovación?
2.2 Estrategias contemporáneas de innovación.
2.2.1 Innovando el valor.
2.2.2 Principios fundamentales en la innovación.
2.2.3 Océanos rojos versus océanos azules.
2.2.3 Implementando la innovación como estrategia.
3. La administración e innovación en los modelos de negocio.
3.1 Modelo de negocios orientado al impacto social.
3.1.1 Los principios morales que rigen las decisiones en las empresas.
3.1.2 Filosofías para la toma de decisiones en las empresas.
3.1.3 La relación entre la ética y las leyes.
3.1.4 El administrador y su apego a principios morales.
3.1.5 Efectos de las organizaciones en los diferentes grupos de interés.
3.1.6 Reglas que apoyan a las compañías y a sus administradores a delimitar sus acciones éticas.
3.2 Modelo de negocios orientado al desarrollo de un ambiente multicultural.
3.2.1 ¿Qué es diversidad?
3.2.1.1 Presencia multicultural en la fuerza de trabajo.
3.2.1.2 ¿Por qué las empresas se preocupan por la diversidad?
3.2.2. Los administradores y la administración efectiva en un ambiente multicultural.
3.2.2.1 Fuentes de la diversidad en el área de trabajo.
3.2.2.2 Roles del administrador y el manejo de la diversidad.
3.2.2.3 Principios morales que encauzan los esfuerzos de los administradores para actuar de manera ética.
3.2.2.3.1 Justicia distributiva versus justica de procedimientos.
3.2.2.3.2 Manejo de la diversidad empresarial: influencia positiva.
3.2.3 Análisis de las percepciones según estereotipos.
3.2.3.1 Factores de la percepción de los administradores.
3.2.3.2 La percepción como determinante de un trato justo.
3.2.3.3 Pasos del manejo de la diversidad.', NULL, 1),
('TC1016', 'Organización computacional',
'Al finalizar el curso el alumno será capaz de:
- Comprender la estructura interna de una computadora.
- Comprender el funcionamiento de la computadora.
- Comprender la forma en que interactúan los elementos de la computadora.',
'1. Introducción a la arquitectura y organización de computadoras.
1.1 Evolución de las computadoras.
1.2 Componentes básicos de la computadora.
1.3 Arquitectura de Von-Neumann.
2. Organización de la unidad central de procesamiento.
2.1 Organización de la UCP.
2.2 Conjunto y formato de instrucciones.
2.3 Lenguaje ensamblador.
2.4 Tipos de Instrucciones y modos de direccionamiento.
2.5 Ciclos de instrucción: búsqueda y ejecución.
2.6 Llamadas a subrutinas y ciclos de retorno.
2.7 Interrupciones y técnicas de entrada y salida.
2.8 Conceptos de microprogramación: microinstrucciones y secuenciación.
2.9 Unidades centrales de procesamiento con estructura multinúcleo.
2.10 Sistema de desarrollo real y/o simulador.
3. Representación de datos y conversiones
3.1 Representación y conversión de valores en diferentes bases (decimal, binario, hexadecimal).
3.2 Operaciones en complementos a la base y a la base disminuida.
3.3 Representación de números enteros con signo.
3.4 Aritmética de números enteros con signo, y en BCD.
3.5 Representación de números reales y de caracteres.
4. Organización y arquitectura de sistemas de memoria.
4.1 Jerarquía de sistemas de memoria: registros, caché, principal, secundaria, capacidades y velocidades.
4.2 Organización y características de rendimiento de memoria principal: Latency, Cycle Time, Bandwidth e Interleaving.
4.3 Memoria caché: usos y niveles.
4.4 Memoria virtual.
4.5 Concepto de celda binaria.
4.6 Clasificación de memoria: RAM, ROM y ROM re escribible.
4.7 Bancos de memoria y técnicas de intercalado para mejora de rendimiento.
4.8 Aplicación de códigos de detección y corrección de errores a memorias.
5. Equipo periférico y operaciones de entrada y salida.
5.1 Comunicación serial y paralela.
5.2 Coordinación de comunicación con periféricos: (handshaking y buffering).
5.3 Técnicas de entrada/salida (Programmed I/O, Interrupt driven, DMA).
5.4 Ejemplos de controladores básicos de entrada/salida: teclado, ratón y USB.
5.5 Estándares de interconexión de periféricos: USB, Firewire, Bluetooth, EIDE, SATA.
5.6 Análisis comparativo de periféricos actuales en cuanto a sus características de: velocidad, capacidad de almacenamiento,
confiabilidad, tiempos de acceso y paquetes de transmisión.
6. Lenguajes, compiladores e interpretadores.
6.1 Evolución de los lenguajes.
6.2 Compiladores.
6.3 Interpretadores.
7. Sistemas operativos.
7.1 Fundamentos de sistema operativos.
7.2 Formas de procesamiento de información: monoprocesamiento, multitarea, por lotes, tiempo real y tiempo compartido.
Objetivos específicos de aprendizaje por tema:
1.Introducción a la arquitectura y organización de computadoras.
1.1 Enumerar los eventos más importantes de la evolución de las computadoras.
1.2 Explicar los componentes básicos de una computadora.
1.3 Explicar la arquitectura de Von Neumann.
2.Organización de la unidad central de procesamiento.
2.1 Explicar la organización de la UCP.
2.2 Describir el conjunto y formato de instrucciones de una UCP genérica.
2.3 Analizar y realizar programas sencillos en Lenguaje ensamblador.
2.4 Explicar los diversos tipos de Instrucciones y modos de direccionamiento.
2.5 Explicar los ciclos de Instrucción, búsqueda y ejecución.
2.6 Describir la operación de las llamadas a subrutinas y ciclos de retorno.
2.7 Describir la operación de las interrupciones y técnicas de entrada y salida. Ilustrar los conceptos de priorización y
enmascaramiento de interrupciones.
2.8 Explicar los conceptos de microprogramación: microinstrucciones y secuenciación.
2.9 Diagramar la construcción de UCP’s de múltiples núcleos.
2.10 Realizar prácticas con un sistema de desarrollo real y/o simulador.
3. Representación de datos y conversiones.
3.1 Realizar problemas de conversión entre bases.
3.1.1 Realizar problemas de aritmética simple en diferentes bases.
3.2 Aplicar el concepto de complementos a la base y a la base disminuida.
3.3 Explicar los formatos de los números enteros con signo: signo-magnitud, complementos a 2, complementos a 1.
3.4 Analizar y aplicar la aritmética binaria de números enteros con signo. Resolver problemas de aritmética de números en BCD.
3.5 Explicar los formatos de números de punto flotante, IEEE 754, con precisión sencilla, doble y casos especiales. Describir y
explicar el uso de los códigos binarios de representación de datos: ASCII, ASCII extendido, GRAY, Exceso 3, signo-paridad,
Hamming, UNICODE.
4.Organización y arquitectura de sistemas de memoria.
4.1 Describir la jerarquía de sistemas de memoria: registro, caché, principal, secundaria, capacidades, velocidades.
4.2 Explicar la organización y características de rendimiento de memoria principal: Latency, Cycle Time, Bandwidth, Interleaving.
4.3 Describir la memoria caché: usos y niveles.
4.4 Explicar el concepto de memoria virtual.
4.5 Diseñar una celda binaria.
4.6 Explicar la clasificación de memoria: RAM, ROM y ROM re escribible.
4.7 Diseñar bancos de memoria básicos. Explicar el uso de intercalado de bancos para acelerar operaciones de memoria.
4.8 Explicar el funcionamiento de los códigos de detección y corrección de errores, y su aplicación en memoria.
5. Equipo periférico y operaciones de entrada y salida.
5.1 Describir las formas de transmisión serial y paralela.
5.2 Explicar la forma de coordinar los equipos periféricos: (handshaking y buffering).
5.3 Explicar las técnicas de entrada/salida (programmed I/O, Interrupt driven, DMA).
5.4 Describir el funcionamiento de controladores básicos de entrada/salida: teclado, ratón y USB.
5.5 Enlistar los principales estándares para interconexión de periféricos.
5.6 Reconocer las características principales de los equipos periféricos más comunes.
6. Lenguajes, compiladores e interpretadores.
6.1 Enumerar los eventos más importantes de la evolución de los lenguajes de programación.
6.2 Explicar la función de un compilador.
6.3 Explicar la función de un interpretador.
7. Sistemas operativos.
7.1 Explicar la función de un sistema operativo.
7.2 Explicar las formas de procesamiento de información: monoprocesamiento, multitarea, por lotes, tiempo real y tiempo
compartido.', NULL, 1),
('TE1010', 'Sistemas digitales',
'Al finalizar el curso el alumno será capaz de realizar diseños, simulación e implantación de circuitos digitales combinatorios y
circuitos secuenciales.',
'1. Sistemas numéricos y códigos.
1.1 Sistemas analógicos y digitales.
1.2 Sistemas numéricos: sistema binario, hexadecimal, octal, conversión entre bases numéricas.
1.3 Aritmética en diferentes bases, aritmética con signo, magnitud y signo, aritmética en complemento a 2. Representación de
números en punto flotante.
1.4 Códigos binarios (BCD, Gray, ASCII, etc).
2. Funciones lógicas y algebra booleana. Compuertas lógicas. Simplificación de funciones lógicas.
2.1 Conceptos básicos del algebra booleanas: operaciones básicas, expresiones booleanas, tablas de la verdad.
2.2 Compuertas lógicas básicas: AND/OR/ NOT. Compuertas universales. Diseño de circuitos lógicos utilizando compuertas
básicas y universales.
2.3 Algebra de Boole. Postulados del algebra de Boole. Simplificación de funciones utilizando postulados del álgebra de Boole.
2.4 Simplificación de funciones booleanas utilizando mapas de Karnaugh.
2.5 Familias lógicas de circuitos integrados: familia TTL y CMOS, parámetros fundamentales de las familias lógicas.
3. Circuitos lógicos combinatorios.
3.1 Clasificación de los circuitos lógicos: circuitos combinatorios y secuenciales.
3.2 Circuitos aritméticos: Sumadores, restadores, sumador BCD.
3.3 Conversores de código y codificadores.
3.4 Decodificadores: Expansión de decodificadores, implementación de funciones lógicas utilizando decodificadores.
3.5 Multiplexores y demultiplexores: Expansión de multiplexores, implementación de funciones lógicas utilizando multiplexores.
4. Circuitos lógicos secuenciales.
4.1 Celdas biestables (Flip Flops): tipos de Flip Flops (SR, D, JK, T). Tablas de verdad.
4.2 Circuitos monoestables y astables.
4.3 Circuitos secuenciales asíncronos con Flip Flops: Diseño de contadores asíncronos.
4.4 Circuitos secuenciales síncronos con Flip Flops: Contadores síncronos, Máquinas de estado. Máquinas de Mealy y Moore.
Registros y registros de corrimiento.
4.5 Circuitos secuenciales MSI: Contadores y registros comerciales. Diseño de circuitos digitales utilizando contadores y registros
comerciales.
5. Memorias.
5.1 Organización, arquitectura, diferencias y aplicaciones de los diferentes tipos de memorias.
Objetivos específicos de aprendizaje por tema:
1. Sistemas numéricos y códigos.
1.1 Comprender las diferencias entre sistemas analógicos y digitales.
1.2 Comprender los distintos sistemas numéricos y la conversión entre bases numéricas.
1.3 Comprender la aritmética binaria, hexadecimal y aritmética con signo específicamente aritmética de complemento a 2.
1.4 Comprender la representación de números en notación de punto flotante.
1.5 Conocer los códigos binarios más utilizados.
2. Funciones lógicas y algebra booleana. Compuertas lógicas. Simplificación de funciones lógicas.
2.1 Conocer los conceptos básicos del algebra de Boole: operaciones, expresiones.
2.2 Conocer las características de las compuertas lógicas básicas y universales.
2.3 Comprender los postulados del algebra de Boole para la simplificación de funciones booleanas.
2.4 Comprender la simplificación de funciones booleanas utilizando mapas de Karnaugh.
2.5 Conocer las características y parámetros más importantes de las familias lógicas de circuitos integrados digitales.
3. Circuitos lógicos combinatorios.
3.1 Conocer las diferencias entre circuitos combinatorios y secuenciales.
3.2 Comprender el funcionamiento de los circuitos aritméticos fundamentales.
3.3 Comprender el funcionamiento de los conversores de códigos y codificadores.
3.4 Comprender el funcionamiento de los decodificadores, realizar expansión de decodificadores e implementación de funciones
booleanas utilizando decodificadores.
3.5 Comprender el funcionamiento de los multiplexores, realizar expansión de multiplexores e implementación de funciones
booleanas utilizando multiplexores.
4. Circuitos lógicos secuenciales.
4.1 Conocer el funcionamiento de los distintos tipos de Flip Flops.
4.2 Conocer el funcionamiento de los circuitos monoestables y astables.
4.3 Diseñar circuitos secuenciales asíncronos utilizando Flip Flops.
4.4 Diseñar circuitos secuenciales síncronos utilizando Flip Flops.
4.5 Diseñar circuitos secuenciales utilizando contadores y registros MSI comerciales.
5. Memorias.
Conocer la organización, arquitectura, diferencias y aplicaciones de los diferentes tipos de memorias.', NULL, 1),
('TC1019', 'Fundamentos de ingeniería de software',
'Al finalizar el curso, el alumno será capaz de:
- Comprender los fundamentos de la ingeniería de software.
- Aplicar las metodologías y herramientas para el proceso de desarrollo de software.',
'1. Introducción y conceptos básicos de ingeniería de software.
1.1 Conceptos básicos de ingeniería de software.
1.2 Tipos de sistemas.
1.3 Historia de la ingeniería de software y la crisis del software.
1.4 Ética en la ingeniería de software.
1.5 Ciclo de vida del software.
1.6 Modelos de procesos de software.
1.7 Desarrollo ágil de software.
1.8 Administración de proyectos de software.
2.Análisis y modelación del sistema.
2.1 Requerimientos funcionales y no funcionales.
2.2 Documento de requerimientos de software.
2.3 Adquisición y análisis de requerimientos.
2.4 Herramientas para análisis y especificación de requerimientos.
2.5 Modelación del sistema.
2.6 El lenguaje de modelación unificado UML.
3.Diseño del software.
3.1 Conceptos de diseño.
3.2 Diseño de la arquitectura.
3.3 Conceptos generales de patrones de diseño.
3.4 Diseño de la interfaz de usuario.
3.5 Diseño del modelo de datos.
3.6 Implementación del sistema.
4.Pruebas y evolución del software.
4.1 Calidad en software.
4.2 Verificación y validación.
4.3 Técnicas de verificación y validación estática.
4,4 Técnicas de verificación y validación dinámica.
4.5 Mantenimiento del software.
4.6 Retiro del software.', NULL, 2),
('TC2018', 'Fundamentos de redes',
'Al finalizar el curso el alumno será capaz de:
- Diseñar e implementar una red de área local.
- Diseñar esquemas de direccionamiento.
- Reconocer los diferentes protocolos de comunicaciones.
- Identificar los diferentes medios de comunicaciones y las técnicas de señalización utilizadas.',
'1. Fundamentos de las redes locales.
1.1 Introducción a las comunicaciones de datos y redes.
1.2 Modelo básico de comunicaciones.
1.3 Redes de transmisión de datos.
1.3.1 Redes de cobertura local.
1.3.2 Redes inalámbricas.
1.3.3 Redes de cobertura amplia.
1.3.4 Redes metropolitanas.
2. Fundamentos de la teoría de transmisión de señales.
2.1 Conceptos básicos.
2.1.1 Frecuencia, amplitud y ancho de banda.
2.1.2 Señales analógicas y digitales.
2.2 Transmisión de datos analógicos y digitales.
2.2.1 Introducción al análisis de Fourier.
2.3 Modulación.
2.3.1 ASK.
2.3.2 FSK.
2.3.3 PSK.
2.3.4 QPSK.
2.3.5 QAM.
2.4 Codificación.
2.4.1 NRZ-L, NRZ-I, RZ.
2.4.2 Manchester.
2.5 Fuentes de atenuación y ruido de la señal.
2.5.1 Atenuación.
2.5.2 Distorsión de retardo.
2.5.3 Ruido.
2.6 Capacidad del canal y calidad de la señal.
2.6.1 Introducción al teorema de Nyquist.
2.6.2 Relación entre ancho de banda y capacidad del canal.
3. Medios de transmisión utilizados en las redes de área local.
3.1 Medios de transmisión guiados.
3.1.1 Par trenzado.
3.1.2 Cable coaxial.
3.1.3 Fibra óptica.
3.2 Transmisión inalámbrica.
3.2.1 Antenas.
3.2.2 Microondas terrestres y de satélite.
3.2.3 Ondas de radio e infrarrojo.
3.2.4 Bluetooth.
3.3 Diseño de redes.
3.3.1 Aplicar los estándares internacionales de cableado estructurado en el diseño de una red local.
4. Técnicas de detección y corrección de errores.
4.1 Transmisión asíncrona y síncrona.
4.2 Tipos de errores.
4.3 Detección de errores.
4.3.1 Codificación de bloques.
4.3.1.1 Distancia Hamming.
4.3.1.2 Mínima distancia Hamming.
4.3.1.3 Corrección de errores.
4.3.2 Códigos cíclicos.
4.3.2.1 Comprobación de redundancia cíclica (CRC).
4.3.2.2 Polinomios.
4.3.3 Sumas de comprobación de paridad.
4.3.3.1 Complemento a uno.
4.3.3.2 Suma de comprobación en Internet.
5. Técnicas de control de flujo.
5.1 Stop & Wait.
5.2 GO BACK N.
5.3 Ventana deslizante.
6. Modelos de comunicación de datos y los estándares de comunicaciones.
6.1 El modelo de las tres capas.
6.2 El modelo OSI.
6.1.1 Nivel físico.
6.1.2 Nivel de enlace de datos.
6.1.3 Nivel de red.
6.1.4 Nivel de transporte.
6.1.5 Nivel de sesión.
6.1.6 Nivel de presentación.
6.1.7 Nivel de aplicación.
6.3 Arquitectura del protocolo TCP/IP.
7. Tecnología Ethernet y sus variaciones.
7.1 Ethernet.
7.2 Fast ethernet.
7.3 Giga ethernet.
7.4 10 Giga ethernet.
7.5 Redes inalámbricas (802.11).
7.6 Enlace de abonado.
7.6.1 Módem analógico.
7.6.2 Servicios ADSL.
7.6.3 Internet por cable.
8. Modelo TCP/IP en el diseño de redes de área local y el diseño de esquemas de direccionamiento IP.
8.1 Historia de internet.
8.2 Familia de protocolos TCP/IP.
8.2.1 Nivel físico y enlace de datos.
8.2.2 Nivel de red (NAT, ARP).
8.2.3 Nivel de transporte (TCP, UDP).
8.2.4 Nivel de aplicación (DNS, DHCP, HTTP, SMTP, FTP, POP, TELNET).
8.3 Direccionamiento.
8.3.1 Direcciones físicas (MAC address).
8.3.2 Direcciones lógicas y subredes IPv4.
8.3.3 Direcciones de puertos.
8.3.4 Protocolo IPv6.
9. Introducción a la configuración de equipo activo.
9.1 Arquitectura general de equipos de red.
9.2 Configuración de interfaces de red y direcciones IP.', NULL, 2),
('TI2011', 'Evaluación y administración de proyectos',
'Al finalizar el curso el alumno será capaz de:
- Aplicar el liderazgo y dirigir a los recursos humanos en la administración de proyectos en el entorno de las tecnologías de
información.
- Tener una comunicación efectiva en el ámbito interpersonal y grupal para coordinar los esfuerzos dirigidos al logro de proyectos
exitosos.',
'1. Conceptos generales de la ingeniería económica.
1.1 Conceptos generales.
1.2 Elementos de los estudios de ingeniería económica.
1.3 El valor del dinero a través del tiempo.
1.4 Interés simple e interés compuesto.
1.5 Tasa de interés nominal y efectiva.
2. Métodos de evaluación y selección de alternativas.
2.1 Tasa de recuperación mínima aceptable.
2.2 Valor presente neto.
2.3 Tasa interna de retorno.
2.4 Período de recuperación de la inversión.
2.5 Vida económica de un activo.
3. Flujos de efectivo
3.1 Depreciación.
3.2 Impuestos.
3.3 Inflación.
4. Selección estratégica de proyectos.
4.1 Portafolio de proyectos.
4.2 Proceso de selección de proyectos.
5. Características de la administración de proyectos.
5.1 Conceptos básicos de la administración de proyectos.
5.2 Estructuras organizacionales para la administración de proyectos.
6. Planeación del proyecto.
6.1 Alcance del proyecto.
6.2 Estimación del tiempo, costo y recursos del proyecto.
6.3 Definición de dependencias de tareas y ruta crítica.
6.4 Asignación y nivelación de recursos.
6.5 Administración del riesgo de las tareas.
6.6 Plan administrativo del proyecto.
7. Ejecución del proyecto.
7.1 Administración del trabajo del proyecto.
7.2 Reportes de desempeño.
8. Control y cierre del proyecto.
8.1 Medición y evaluación del avance y del desempeño.
8.2 Cierre del proyecto.', NULL, 2),
('TC1018', 'Estructura de datos',
'Al finalizar el curso, el alumno será capaz de dar solución a problemas planteados a través de la construcción de software que
hace uso de algoritmos y estructuras de datos de manera eficiente.',
'1. Abstracción de datos.
1.1 Abstracción de datos.
1.2 Tipos de datos abstractos.
1.3 Niveles de abstracción.
2. Recursión.
2.1 Definición de recursión.
2.2 Uso de recursión en la solución a un problema.
3. Algoritmos de búsqueda.
3.1 Búsqueda secuencial.
3.2 Búsqueda binaria.
4. Algoritmos de ordenamiento.
4.1 Algoritmos de ordenamiento simples.
4.2 Merge sort.
4.3 Quick sort.
5. Manejo de memoria.
5.1 Administración de memoria.
5.2 Apuntadores y referencias.
6. Estructuras de datos lineales.
6.1 Listas encadenadas (lineales, circulares, dobles y ordenadas).
6.2 Pilas.
6.3 Filas.
6.4 Deque.
7. Estructuras de datos no lineales.
7.1 Árboles binarios.
7.2 Grafos.
7.3 Técnica de hashing.
Objetivos específicos de aprendizaje por tema:
1. Abstracción de datos.
1.1 Aprender a utilizar la abstracción de datos, la abstracción procedural y a ocultar la información para manejar la complejidad.
1.2 Comprender cómo los tipos de datos abstractos se emplean durante la construcción de un sistema computacional.
1.3 Aprender a implementar un tipo de datos abstracto haciendo uso de clases.
1.4 Entender los diferentes niveles de abstracción y cómo se emplean en el desarrollo de software.
2. Recursión.
2.1 Conocer el concepto de recursividad.
2.2 Saber cuando aplicar recursividad en un problema.
2.3 Entender las ventajas y desventajas de una solución recursiva.
3. Algoritmos de búsqueda.
3.1 Conocer e implementar el algoritmo de búsqueda secuencial en arreglos.
3.2 Conocer e implementar el algoritmo de búsqueda binaria en arreglos.
4. Algoritmos de ordenamiento.
4.1 Entender la importancia de ordenar la información.
4.2 Conocer los principales algoritmos de ordenamiento.
4.3 Implementar los algoritmos de burbuja, selección e inserción directa.
4.4 Comprender el funcionamiento del algoritmo merge sort y cómo puede ser implementado.
4.5 Comprender el funcionamiento del algoritmo Quick Sort.
5. Manejo de memoria.
5.1 Conocer el uso de apuntadores y/o referencias en el contexto de un programa.
5.2 Conocer a grandes rasgos cómo se administra la memoria de un programa dentro de su ambiente de ejecución.
6. Estructuras de datos lineales.
6.1 Conocer las características de la estructura lista encadenada en todas sus variantes.
6.2 Implementar la lista encadenada lineal y la lista encadenada ordenada.
6.3 Aprender a construir la lista doblemente encadenada.
6.4 Entender las características y usos de las estructuras pilas y filas.
6.5 Implementar las estructuras pilas y filas en arreglos, listas lineales y listas circulares.
6.6 Conocer el funcionamiento de la estructura deque.
7. Estructuras de datos no lineales.
7.1 Conocer la estructura árbol binario y sus aplicaciones.
7.2 Entender las ventajas que ofrece un árbol binario con respecto a las listas lineales.
7.3 Implementar un árbol binario de búsqueda.
7.4 Conocer e implementar las diferentes maneras en las que se puede recorrer un árbol binario.
7.5 Conocer la estructura grafo y sus aplicaciones.
7.6 Comprender las diferentes maneras en las que se puede implementar un grafo.
7.7 Conocer e implementar los siguientes algoritmos de recorridos de grafos: primero en profundidad y primero en amplitud.
7.8 Conocer la técnica de hashing y sus ventajas en la búsqueda de información.
7.9 Utilizar la técnica de hashing para implementar conjuntos y mapas (diccionarios o arreglos asociativos).', NULL, 3),
('TC2019', 'Métodos numéricos en ingeniería',
'Al finalizar el curso el alumno será capaz de plantear la solución, manual o computacional, de un problema ingenieril a través de la
aplicación de métodos numéricos.',
'1. Aproximaciones, errores y métodos numéricos.
1.1 Exactitud y precisión.
1.2 Definiciones de error.
1.3 Tipos de errores.
1.4 Definición de método numérico.
1.5 Estabilidad y convergencia de un método numérico.
2. Solución numérica de ecuaciones no lineales y polinomios.
2.1 Método de bisección.
2.2 Método de la Secante.
2.3 Método de Newton-Raphson.
2.4 Métodos convencionales para raíces de polinomios (fórmulas generales, división sintética).
2.5 Método de Bairstow para raíces de polinomios.
2.6 Análisis de la estabilidad y convergencia de los métodos.
2.7 Programación de los métodos.
3. Algebra matricial y sistemas de ecuaciones lineales y no lineales.
3.1 Matrices y operaciones básicas.
3.2 Inversa de una matriz cuadrada.
3.3 Determinantes de matrices cuadradas: sus propiedades, usos y métodos de cálculo.
3.4 Solución analítica de sistemas de ecuaciones lineales (eliminación Gaussiana e inversa).
3.5 Solución numérica de sistemas de ecuaciones lineales (Gauss-Seidel y descomposición lu).
3.6 Planteamiento de problemas que involucren sistemas de ecuaciones no lineales.
3.7 Solución analítica de sistemas de ecuaciones no lineales (gráfica y sustitución).
3.8 Solución numérica de sistemas de ecuaciones no lineales (aproximaciones sucesivas y Newton-Raphson).
3.9 Análisis de la estabilidad y convergencia de los métodos.
3.10 Programación de los métodos.
4. Ajuste de curvas por mínimos cuadrados.
4.1 Regresión lineal.
4.2 Linealización de relaciones no lineales (modelo exponencial, modelo de potencias).
4.3 Regresión polinomial.
4.4 Programación de los métodos.
5. Interpolación.
5.1 Interpolación lineal.
5.2 Polinomio de interpolación de Newton.
5.3 Polinomio de Lagrange.
5.4 Interpolación inversa.
5.5 Programación de los métodos.
6. Integración numérica.
6.1 Definición de integración definida.
6.2 Reglas rectangular y trapezoidal.
6.3 Reglas de Simpson (1/3 y 3/8).
6.4 Método de Romberg.
6.5 Programación de los métodos.
7. Solución numérica de ecuaciones diferenciales.
7.1 Problemas que involucran ecuaciones diferenciales ordinarias.
7.2 Condiciones iniciales y de frontera.
7.3 Método de Euler para ecuaciones diferenciales ordinarias con valores iniciales.
7.4 Métodos de Runge-Kutta para ecuaciones diferenciales ordinarias con valores iniciales.
7.5 Ecuaciones diferenciales ordinarias de orden superior y su representación como sistemas de primer orden.
7.6 Solución de ecuaciones diferenciales ordinarias de orden superior.
7.7 Solución de ecuaciones diferenciales con condiciones frontera por el método del disparo.
7.8 Solución de ecuaciones diferenciales con condiciones frontera por el método de diferencias finitas.
7.9 Programación de los métodos.', NULL, 3),
('TE1002', 'Circuitos eléctricos I',
'Al finalizar el curso, el alumno será capaz de analizar circuitos eléctricos básicos compuestos por resistencias, capacitancias,
inductancias y fuentes de alimentación de corriente directa e interpretar los resultados de la interacción entre ellos.',
'1. Conceptos básicos de circuitos eléctricos.
1.1 Definición de carga.
1.2 Definición de corriente, voltaje y potencia.
1.3 Ley de Ohm.
1.4 Ley de voltajes de Kirchhoff.
1.5 Ley de corrientes de Kirchhoff.
2. Circuitos resistivos simples.
2.1 Circuitos de un solo lazo.
2.2 Circuitos de dos nodos.
2.3 Fuentes conectadas en serie y en paralelo.
2.4 Resistencias conectadas en serie y en paralelo.
2.5 División de voltajes y de corrientes.
3. Técnicas generales de análisis de circuitos.
3.1 Análisis de nodos.
3.2 El concepto de supernodo.
3.3 Análisis de mallas.
3.4 El concepto de supermalla.
4. Técnicas de análisis adicionales.
4.1 Linealidad y superposición.
4.2 Transformación de fuentes.
4.3 Teorema de máxima transferencia de potencia.
4.4 Circuitos equivalentes de Thévenin y de Norton.
5. Inductancia y capacitancia.
5.1 Inductancia.
5.2 Capacitancia.
5.3 Combinaciones serie y paralelo de inductancias y capacitancias.
6. Circuitos RL y RC.
6.1 Circuitos RL sin fuentes.
6.2 Circuitos RC sin fuentes.
6.3 Características de la respuesta exponencial de primer orden.
6.4 Circuitos RL con fuentes constantes.
6.5 Circuitos RC con fuentes constantes.
7. Circuitos RLC.
7.1 Circuitos RLC sin fuentes.
7.2 Tipos de respuesta de un circuito RLC.
7.3 Circuitos RLC con fuentes constantes.
7.4 Respuesta natural y respuesta forzada de un circuito RLC.', NULL, 3);

INSERT INTO REQUIREMENT VALUES
('TC1019', 'TC1014', 'Fundamentos de programación'),
('TC2018', 'TC1016', 'Organización computacional'),
('TC2018', 'TE1010', 'Sistemas digitales'),
('TC1018', 'TC2016', 'Programación Orientada a Objetos'),
('TC2019', 'TC1014', 'Fundamentos de programación'),
('TC2019', 'MA1017', 'Matemáticas II'),
('TE1002', 'MA1017', 'Matemáticas II');

create table optative_changes (
  id int auto_increment,
  optative_id VARCHAR(6),
  description varchar(200),
  primary key(id)
);

DELIMITER //
create trigger opt_change after update on optative for each row
	begin
	if (new.type != old.type) then
		insert into optative_changes (optative_id, description) values(old.optative_id, concat('Se ha modificado la modalidad de la materia ', old.name, '. Modalidad anterior: ', old.type, '. Modalidad actual: ', new.type));
	end if;
	end//
DELIMITER ;