-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2017 a las 20:03:57
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaprestamo`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AAAAA` ()  NO SQL
select now()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ABONO_ACTUALIZAR_CUOTAS_PRESTAMOS` (IN `id` INT)  BEGIN
    Update prestamo Set CuotasAbonadas=CuotasAbonadas+1  Where IdPrestamo=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ABONO_CONSULTAR` (IN `tipo` VARCHAR(1), IN `cod` VARCHAR(15), IN `id` INT)  BEGIN
   IF  tipo = '1' THEN 
   SELECT IdAbono,IdPrestamo,ValorAbono,PendientePagar,FechaAabono from abono where IdPrestamo = id;
	
END IF;
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ABONO_INSERTAR` (IN `idpres` INT, IN `valor` INT, IN `pendiente` INT, IN `fecha` DATE)  BEGIN
    INSERT INTO abono (IdPrestamo,ValorAbono,PendientePagar,FechaAabono) 
            VALUE(idpres,valor,pendiente,fecha);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CLIENTE_ACTUALIZAR` (IN `ced` VARCHAR(15), IN `nom` VARCHAR(20), IN `ape` VARCHAR(20), IN `dirres` VARCHAR(20), IN `dirofi` VARCHAR(20), IN `telresi` VARCHAR(20), IN `telofi` VARCHAR(20), IN `idusu` INT(11), IN `id` INT(11))  BEGIN
  
    UPDATE  cliente
	SET 	CedulaCliente    	 = ced,	    	
            NombreCliente    	 = nom,
		    ApellidoCliente		 = ape,
		    DirResCliente		 = dirres,
		    DirOficliente   	 = dirofi,
		    TelResCliente        = telresi,
		    TelOfiCliente		 = telofi,
		    IdUsuario		     =idusu

	WHERE	IdCliente    		      = id;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CLIENTE_CONSULTAR` (IN `tipo` VARCHAR(1), IN `ced` VARCHAR(15), IN `id` INT)  BEGIN
   IF  tipo = '0' THEN 
SELECT IdCliente,CedulaCliente,NombreCliente,ApellidoCliente,DirResCliente,DirOficliente,TelResCliente,TelOfiCliente,IdUsuario,IdCliente from cliente where cedulaCliente=ced;
END IF;
   IF  tipo = '1' THEN 
    SELECT  IdCliente,CedulaCliente,NombreCliente,ApellidoCliente,DirResCliente,DirOficliente,TelResCliente,TelOfiCliente,IdUsuario from cliente;
    
  END IF;
    IF  tipo = '2' THEN 
SELECT CedulaCliente,NombreCliente,ApellidoCliente,DirResCliente,DirOficliente,TelResCliente,TelOfiCliente,IdUsuario from cliente where IdCliente =id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CLIENTE_INSERTAR` (IN `ced` VARCHAR(15), IN `nom` VARCHAR(20), IN `ape` VARCHAR(20), IN `dirres` VARCHAR(20), IN `dirofi` VARCHAR(20), IN `telres` VARCHAR(20), IN `telofi` VARCHAR(20), IN `id` SMALLINT)  BEGIN
    INSERT INTO cliente ( CedulaCliente,NombreCliente,ApellidoCliente,DirResCliente,DirOficliente,TelResCliente,TelOfiCliente,IdUsuario)  VALUE(ced,nom,ape,dirres,dirofi,telres,telofi,id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DETALLELINEA_CONSULTAR` (IN `tipo` VARCHAR(1), IN `nom` VARCHAR(20))  BEGIN
   IF  tipo = '1' THEN 
 select IdLinea,NombreLinea from linea ;
END IF;	

IF  tipo = '2' THEN 
  select l.NombreLinea, dl.NombreDetalleLinea from detallelinea dl, linea l where l.NombreLinea=nom and l.Idlinea=dl.Idlinea;
END IF;	

IF  tipo = '3' THEN 
 select dl.IdDetalleLinea, dl.NombreDetalleLinea from detallelinea dl, linea l where dl.Idlinea=l.IdLinea
	AND l.Nombrelinea=nom;
END IF;	

IF  tipo = '4' THEN 
 select NombreLinea from linea  where Nombrelinea=nom;
END IF;	



   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DETALLELINEA_INSERTAR` (IN `id` INT, IN `nom` VARCHAR(20))  BEGIN
   INSERT INTO detallelinea (IdLinea,NombreDetalleLinea) 
   VALUE((select MAX(IDLinea) from linea),nom);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_ABONO` (IN `ida` INT, IN `idp` INT, IN `original` INT, IN `valoreditado` INT)  BEGIN



update prestamo SET

SaldoPrestamo=SaldoPrestamo+original,
SaldoPrestamo=SaldoPrestamo-valoreditado


where IdPrestamo=idp;

update abono SET
PendientePagar=PendientePagar+original,

ValorAbono=valoreditado,
PendientePagar=PendientePagar-valoreditado



where IdAbono=ida;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_ABONO` (IN `ida` INT, IN `idp` INT, IN `valor` INT)  BEGIN

delete from abono where IdAbono=ida;

update prestamo SET

SaldoPrestamo=SaldoPrestamo+valor,
CuotasAbonadas=CuotasAbonadas-1

where IdPrestamo=idp;

update abono SET

PendientePagar=PendientePagar+valor


where IdAbono=ida;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FACTURA_CONSULTAR` (IN `tipo` VARCHAR(1), IN `cod` VARCHAR(15), IN `id` INT)  BEGIN
   IF  tipo = '0' THEN 
   SELECT IdProducto,NombreProducto,ValorProducto,CantidadProducto,CantidadMinima,MarcaProducto,CodigoProducto
		from producto where CodigoProducto=cod;
END IF;

IF  tipo = '1' THEN 
   SELECT MAX(IdFactura)
		from factura ;
END IF;

IF  tipo = '3' THEN 
   SELECT 
 f.IdFactura, f.Numero_factura, f.CantidadTotal, f.Subtotal,f.ValorIva,f.ValorTotal,f.FechaHora,f.observaciones,c.CedulaCliente,u.LoginUsuario
from factura f, cliente c, usuario u where  f.IdCliente=c.IdCliente and  f.IdUsuario=u.IdUsuario and c.CedulaCliente=cod;
END IF;

   
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FACTURA_DETALLE_INSERTAR` (IN `idfac` INT, IN `idpro` INT, IN `can` INT, IN `sub` INT)  BEGIN
    INSERT INTO facturadetalle (IdFactura,IdProducto,Cantidad,Subtotal) 
 VALUE(idfac,idpro,can,sub);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FACTURA_INSERTAR` (IN `numfact` VARCHAR(30), IN `cantidad` INT, IN `sub` INT, IN `iva` INT, IN `total` INT, IN `ob` VARCHAR(50), IN `rec` INT, IN `ent` INT, IN `idcli` INT, IN `idusu` INT)  BEGIN
    INSERT INTO factura (Numero_factura,CantidadTotal,Subtotal,ValorIva,ValorTotal,FechaHora,observaciones,Recibido,Entregado,IdCliente,IdUsuario) 
 VALUE(numfact,cantidad,sub,iva,total,(select now()),ob,rec,ent,idcli,idusu);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INFORME_CONSULTAR` (IN `tipo` VARCHAR(1), IN `ced` VARCHAR(20), IN `fecin` DATETIME, IN `fecout` DATETIME)  BEGIN
IF  tipo = '1' THEN 
   SELECT 
 f.IdFactura, f.Numero_factura, f.CantidadTotal, f.Subtotal,f.ValorIva,f.ValorTotal,f.FechaHora,f.observaciones,c.CedulaCliente,u.LoginUsuario
from factura f, cliente c, usuario u where  f.IdCliente=c.IdCliente and  f.IdUsuario=u.IdUsuario and f.FechaHora>=fecin and f.FechaHora<=fecout;
END IF;

IF  tipo = '2' THEN 
   SELECT 
 f.IdFactura, f.Numero_factura, f.CantidadTotal, f.Subtotal,f.ValorIva,f.ValorTotal,f.FechaHora,f.observaciones,c.CedulaCliente,u.LoginUsuario
from factura f, cliente c, usuario u where  f.IdCliente=c.IdCliente and  f.IdUsuario=u.IdUsuario and f.Numero_factura=ced;
END IF; 


IF  tipo = '3' THEN 
   
     SELECT p.IdProducto,p.NombreProducto,p.ValorProducto,p.CantidadProducto,p.CantidadMinima,p.MarcaProducto,p.CodigoProducto,
l.NombreLinea,dt.NombreDetalleLinea from producto p, linea l, detallelinea dt where p.IdDetalleLinea = dt.IdDetalleLinea and
 dt.IdLinea=l.IdLinea and p.CodigoProducto = ced;

END IF; 
IF  tipo = '4' THEN 
   SELECT 
      p.IdProducto,p.NombreProducto,p.ValorProducto,p.CantidadProducto,p.CantidadMinima,p.MarcaProducto,p.CodigoProducto,
l.NombreLinea,dt.NombreDetalleLinea from producto p, linea l, detallelinea dt where p.IdDetalleLinea = dt.IdDetalleLinea and
 dt.IdLinea=l.IdLinea and l.NombreLinea=ced;

END IF; 


   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LINEA_CONSULTAR` (IN `tipo` VARCHAR(1), IN `id` INT)  BEGIN
   IF  tipo = '1' THEN 
   SELECT MAX(IdLinea) from  linea;
END IF;	

   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LINEA_INSERTAR` (IN `nom` VARCHAR(20))  BEGIN
    INSERT INTO linea (NombreLinea) 
            VALUE(nom);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN_CONSULTAR` (IN `user` VARCHAR(10), IN `pass` VARCHAR(10))  SELECT LoginUsuario,ContraseniaUsuario,IdUsuario from usuario where LoginUsuario=user AND ContraseniaUsuario=pass$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRESTAMO_ACTUALIZAR_EDITAR` (IN `valor` INT, IN `valortotal` INT, IN `saldo` INT, IN `cod` VARCHAR(50), IN `id` INT, IN `cxu` INT)  BEGIN
UPDATE prestamo 
SET	
ValorPrestamo=valor,
ValorTotalprestamo=valortotal,

SaldoPrestamo=saldo,
CodigoPrestamo=cod,
CxU=cxu,
DescripcionPrestamo=CONCAT(DescripcionPrestamo," valor del prestamo editado ",now())
where IdPrestamo=id;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRESTAMO_ACTUALIZAR_ESTADO` (IN `est` VARCHAR(20), IN `id` INT)  BEGIN
  
    UPDATE prestamo
	SET 	EstadoPrestamo	         = est
	    	
		

	WHERE	IdPrestamo    		      = id;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRESTAMO_ACTUALIZAR_SALDO` (IN `saldo` INT, IN `id` INT)  BEGIN
  
    UPDATE prestamo
	SET 	SaldoPrestamo                 = saldo


	WHERE	Idprestamo   		      = id;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRESTAMO_ELIMINAR` (IN `id` INT)  BEGIN
delete from abono where IdPrestamo=id;
delete from prestamo where IdPrestamo=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRESTAMO_INSERTAR` (IN `codigo` VARCHAR(50), IN `fecha` DATETIME, IN `valor` INT, IN `estado` VARCHAR(15), IN `porcentaje` INT, IN `valortotal` INT, IN `saldo` INT, IN `cuotas` INT, IN `tipo` VARCHAR(20), IN `cxu` INT, IN `des` VARCHAR(200), IN `idcli` INT)  BEGIN
    INSERT INTO prestamo (CodigoPrestamo,FechaPrestamo,ValorPrestamo,EstadoPrestamo,PorcentajePrestamo,ValorTotalprestamo,SaldoPrestamo,CuotasPrestamo,Tipo,CxU,DescripcionPrestamo,IdCliente) 
            VALUE(codigo,fecha,valor,estado,porcentaje,valortotal,saldo,cuotas,tipo,cxu,des,idcli);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRETAMOS_CONSULTAR` (IN `tipo` VARCHAR(1), IN `ced` VARCHAR(15), IN `id` INT)  BEGIN
   IF  tipo = '1' THEN 
   SELECT P.IdPrestamo,P.CodigoPrestamo,P.FechaPrestamo,P.ValorPrestamo,P.EstadoPrestamo,P.PorcentajePrestamo,P.ValorTotalprestamo,P.SaldoPrestamo,P.CuotasPrestamo,P.CuotasAbonadas,P.DescripcionPrestamo,P.Tipo,P.CxU,P.IdCliente,c.CedulaCliente
		from prestamo P, cliente C where P.IdCliente=C.IdCliente AND C.CedulaCliente=ced;
END IF;

IF  tipo = '2' THEN 
   SELECT P.IdPrestamo,P.CodigoPrestamo,P.FechaPrestamo,P.ValorPrestamo,P.EstadoPrestamo,P.PorcentajePrestamo,P.ValorTotalprestamo,P.SaldoPrestamo,P.CuotasPrestamo,P.CuotasAbonadas,P.Tipo,P.CxU,P.DescripcionPrestamo,P.IdCliente 
		from prestamo P, cliente C where P.IdCliente=C.IdCliente AND P.IdPrestamo=id;
END IF;

IF  tipo = '3' THEN 
   SELECT p.IdProducto,p.NombreProducto,p.ValorProducto,p.CantidadProducto,p.CantidadMinima,p.MarcaProducto,p.CodigoProducto,
	 dt.NombreDetalleLinea, l.NombreLinea  from producto p , linea l, detallelinea dt where 
          l.IdLinea=dt.IdLinea and p.IdDetalleLinea=dt.IdDetalleLinea and   IdProducto=id;
END IF;
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRODUCTO_ACTUALIZAR` (IN `nom` VARCHAR(50), IN `val` INT, IN `can` INT, IN `canmin` INT, IN `marca` VARCHAR(20), IN `tipopro` VARCHAR(20), IN `cod` VARCHAR(20), IN `id` INT)  BEGIN
  
    UPDATE producto
	SET 	NombreProducto	         = nom,
	    	ValorProducto    	 = val,
		CantidadProducto	 = can,
		CantidadMinima		 = canmin,
		MarcaProducto   	 = marca,
		TipoProducto            = tipopro,
		CodigoProducto		 = cod
		

	WHERE	IdProducto   		      = id;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRODUCTO_CONSULTAR` (IN `tipo` VARCHAR(1), IN `nombre` VARCHAR(50), IN `marca` VARCHAR(50), IN `tipopro` VARCHAR(50), IN `id` INT)  BEGIN
   IF  tipo = '0' THEN 
  SELECT p.IdProducto,p.NombreProducto,p.ValorProducto,p.CantidadProducto,p.CantidadMinima,p.MarcaProducto,p.CodigoProducto,
	 dt.NombreDetalleLinea, l.NombreLinea  from producto p , linea l, detallelinea dt where 
          l.IdLinea=dt.IdLinea and p.IdDetalleLinea=dt.IdDetalleLinea;
END IF;

 IF  tipo = '1' THEN 
   SELECT IdProducto,NombreProducto,ValorProducto,CantidadProducto,CantidadMinima,MarcaProducto,TipoProducto,CodigoProducto from producto where IdProducto=id;
END IF;
  
 IF  tipo = '3' THEN 
   SELECT p.IdProducto,p.NombreProducto,p.ValorProducto,p.CantidadProducto,p.CantidadMinima,p.MarcaProducto,p.CodigoProducto,
	 dt.NombreDetalleLinea, l.NombreLinea  from producto p , linea l, detallelinea dt where 
          l.IdLinea=dt.IdLinea and p.IdDetalleLinea=dt.IdDetalleLinea and   IdProducto=id;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PRODUCTO_INSERTAR` (IN `nom` VARCHAR(50), IN `val` INT, IN `can` INT, IN `canmin` INT, IN `nomlinea` VARCHAR(20), IN `nomsub` VARCHAR(20), IN `marca` VARCHAR(20), IN `cod` VARCHAR(20))  BEGIN
 INSERT INTO producto (NombreProducto,ValorProducto,CantidadProducto,CantidadMinima,IdDetalleLinea,MarcaProducto,CodigoProducto ) 
  VALUE(nom,val,can,canmin,(select dt.IdDetallelinea from detallelinea dt, linea l where dt.IdLinea=l.IdLinea
 and l.NombreLinea=nomlinea and dt.NombreDetalleLinea=nomsub),marca,cod);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REPORTE_ABONO` (IN `ced` VARCHAR(20), IN `id` INT)  BEGIN
SELECT a.ValorAbono,a.PendientePagar,a.FechaAabono from abono a,prestamo p, cliente c where
a.IdPrestamo=p.IdPrestamo and p.Idcliente= c.IdCliente and c.CedulaCliente=ced and a.IdPrestamo=id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REPORTE_ABONO_TODO` (IN `id` INT)  BEGIN
SELECT a.ValorAbono,a.PendientePagar,a.FechaAabono from abono a,prestamo p, cliente c where
a.IdPrestamo=p.IdPrestamo and p.Idcliente= c.IdCliente  and a.IdPrestamo=id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REPORTE_PRESTAMOS` (IN `ced` VARCHAR(20))  BEGIN
  SELECT p.IdPrestamo,p.CodigoPrestamo,p.FechaPrestamo,p.ValorPrestamo,p.EstadoPrestamo,p.PorcentajePrestamo,p.ValorTotalprestamo,
p.SaldoPrestamo,p.CuotasPrestamo,p.CuotasAbonadas,p.Tipo,p.CxU,p.DescripcionPrestamo from prestamo p,  cliente c
where p.IdCliente=c.IdCliente and c.cedulaCliente=ced;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REPORTE_PRESTAMOS_TODOS` ()  BEGIN
  SELECT p.IdPrestamo,p.CodigoPrestamo,p.FechaPrestamo,p.ValorPrestamo,p.EstadoPrestamo,p.PorcentajePrestamo,p.ValorTotalprestamo,
p.SaldoPrestamo,p.CuotasPrestamo,p.CuotasAbonadas,p.Tipo,p.CxU,p.DescripcionPrestamo,p.IdCliente,c.NombreCliente,c.CedulaCliente,c.ApellidoCliente from prestamo p,  cliente c
where p.IdCliente=c.IdCliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REPORTE_PRESTAMOS_TODOS_ACTIVO` ()  BEGIN
  SELECT p.IdPrestamo,p.CodigoPrestamo,p.FechaPrestamo,p.ValorPrestamo,p.EstadoPrestamo,p.PorcentajePrestamo,p.ValorTotalprestamo,
p.SaldoPrestamo,p.CuotasPrestamo,p.CuotasAbonadas,p.Tipo,p.CxU,p.DescripcionPrestamo,p.IdCliente,c.NombreCliente,c.CedulaCliente,c.ApellidoCliente from prestamo p,  cliente c
where p.IdCliente=c.IdCliente and p.EstadoPrestamo ='ACTIVO';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REPORTE_PRESTAMOS_TODOS_TERMINADO` ()  BEGIN
  SELECT p.IdPrestamo,p.CodigoPrestamo,p.FechaPrestamo,p.ValorPrestamo,p.EstadoPrestamo,p.PorcentajePrestamo,p.ValorTotalprestamo,
p.SaldoPrestamo,p.CuotasPrestamo,p.CuotasAbonadas,p.Tipo,p.CxU,p.DescripcionPrestamo,p.IdCliente,c.NombreCliente,c.CedulaCliente,c.ApellidoCliente from prestamo p,  cliente c
where p.IdCliente=c.IdCliente and p.EstadoPrestamo ='TERMINADO';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TIQUETE_CONSULTAR` (IN `tipo` VARCHAR(1), IN `cod` VARCHAR(15), IN `id` INT)  BEGIN
   IF  tipo = '0' THEN 
 

   SELECT p.NombreProducto, fd.Cantidad,fd.Subtotal,f.Recibido,f.Entregado,c.NombreCliente,c.CedulaCliente,u.NombreUsuario from producto p, facturadetalle fd , factura f 
 	 ,cliente c,usuario u where 
     p.IdProducto=fd.IdProducto and 
     f.IdFactura = fd.IdFactura and 
     f.IdCliente=c.IdCliente and 
     f.IdUsuario=u.IdUsuario  and  
     fd.IdFactura= id;

END IF;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TOTAL_PRESTAMOS` (IN `ced` VARCHAR(20))  BEGIN
 SELECT COUNT(*) AS total FROM prestamo p ,cliente c where 
 p.IdCliente = c.Idcliente and c.CedulaCliente =ced;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USUARIO_ACTUALIZAR` (IN `login` VARCHAR(10), IN `pass` VARCHAR(50), IN `nom` VARCHAR(50), IN `cel` VARCHAR(15), IN `dir` VARCHAR(20), IN `ced` VARCHAR(15), IN `per` SMALLINT, IN `id` INT)  BEGIN
  
    UPDATE usuario
	SET 	LoginUsuario     	     = login,
	    	ContraseniaUsuario  	 = pass,
		    NombreUsuario		     = nom,
		    CelularUsuario		     = cel,
		    DireccionUsuario	     = dir,
		    DocumentoUsuario   = ced,
		    IdPerfil		         = per

	WHERE	IdUsuario    		      = id;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USUARIO_CONSULTAR` (IN `tipo` VARCHAR(1), IN `usuario` VARCHAR(10), IN `cedula` VARCHAR(15), IN `id` INT)  BEGIN
   IF  tipo = '0' THEN 
   SELECT u.IdUsuario,u.LoginUsuario,u.ContraseniaUsuario,u.NombreUsuario,u.CelularUsuario,u.DireccionUsuario,u.DocumentoUsuario,u.IdPerfil,p.NombrePerfil from usuario u, perfil p
   where u.IdPerfil=p.IdPerfil;
END IF;
   IF  tipo = '1' THEN 
    SELECT LoginUsuario,ContraseniaUsuario,NombreUsuario,CelularUsuario,DireccionUsuario,DocumentoUsuario,IdPerfil from Usuario WHERE IdUsuario=id;
    
  END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USUARIO_ELIMINAR` (IN `id` INT)  BEGIN
  
    DELETE  from usuario WHERE IdUsuario=id;
   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USUARIO_INSERTAR` (IN `login` VARCHAR(10), IN `pass` VARCHAR(50), IN `nom` VARCHAR(50), IN `cel` VARCHAR(15), IN `dir` VARCHAR(20), IN `ced` VARCHAR(15), IN `per` SMALLINT)  BEGIN
    INSERT INTO usuario ( LoginUsuario,ContraseniaUsuario,NombreUsuario,CelularUsuario,DireccionUsuario,DocumentoUsuario,IdPerfil	)  VALUE(login,pass,nom,cel,dir,ced,per);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `IdAbono` int(11) NOT NULL,
  `IdPrestamo` int(11) DEFAULT NULL,
  `ValorAbono` int(11) DEFAULT NULL,
  `PendientePagar` int(11) DEFAULT NULL,
  `FechaAabono` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`IdAbono`, `IdPrestamo`, `ValorAbono`, `PendientePagar`, `FechaAabono`) VALUES
(36, 29, 25000, 125000, '2015-07-21'),
(37, 30, 30000, 30000, '2016-10-14'),
(45, 29, 30000, 95000, '2016-10-23'),
(46, 33, 10000, 90000, '2016-12-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `CedulaCliente` varchar(15) DEFAULT NULL,
  `NombreCliente` varchar(20) DEFAULT NULL,
  `ApellidoCliente` varchar(20) DEFAULT NULL,
  `DirResCliente` varchar(20) DEFAULT NULL,
  `DirOficliente` varchar(20) DEFAULT NULL,
  `TelResCliente` varchar(20) DEFAULT NULL,
  `TelOfiCliente` varchar(20) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `CedulaCliente`, `NombreCliente`, `ApellidoCliente`, `DirResCliente`, `DirOficliente`, `TelResCliente`, `TelOfiCliente`, `IdUsuario`) VALUES
(2, '10102020', 'JAVIER', 'LOPEZ', 'CALLE 33333', 'calle', '2323232', '35432323', 1),
(3, '123456789', 'MARIANA', 'LOPEZ', 'CALLE 49 N 99 88', 'CALLE 4 N 9 8', '45454545', '35432323', 1),
(4, '32543423', 'MARIANO', 'ROBLES', 'CALLE 100 N 5 98', 'carrera 34 n 9 0', '2324567', '2121212', 1),
(5, '909090', 'sol', 'solres', 'call111', 'call223', '1212121', '323233', 1),
(9, '4343', '3', '33', '3', '3', '3232323dcsdcsdcs3', '3', 1),
(10, '72224706', 'ANIBAL', 'MAURY', 'SAN', '3004027', 'CUC', '3362208', 1),
(11, '8699904', 'MARTIN', 'LOPEZ', 'CALLE 34 N 2 2 ', 'CARRERA 47 N 9 9 ', '3434343', '3909090', 1),
(12, '32626025', 'MONICA', 'EBRATH', 'CALLE 39 C N 7 A 69', 'CALLE 56 N 8 8', '3268109', '3545454', 1),
(13, '123', '11', '11', '11', '11', '11', '111', 1),
(14, '804382', 'MILTON', 'MENDEZ', 'CALLE 30 N 20 10', 'CALLE 20 N  12 41', '3438545', '3808080', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallelinea`
--

CREATE TABLE `detallelinea` (
  `IdDetalleLinea` int(11) NOT NULL,
  `IdLinea` int(11) DEFAULT NULL,
  `NombreDetalleLinea` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallelinea`
--

INSERT INTO `detallelinea` (`IdDetalleLinea`, `IdLinea`, `NombreDetalleLinea`) VALUES
(39, 75, 'gaseosa'),
(40, 75, 'agua'),
(41, 75, 'cerveza'),
(42, 75, 'golosinas'),
(43, 76, 'tortas'),
(44, 76, 'bombom'),
(45, 76, 'chocolate'),
(50, 78, 'frutas'),
(51, 78, 'verduras'),
(52, 78, 'tuberculos'),
(53, 79, 'pudin'),
(54, 79, 'torta'),
(55, 79, 'flan'),
(56, 80, 'jugetes'),
(60, 82, 'JABON'),
(84, 106, '5'),
(85, 107, '12222'),
(86, 107, 'bebidas'),
(87, 107, 'bebidas'),
(88, 108, 'shampoo'),
(89, 109, 'aq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IdFactura` int(11) NOT NULL,
  `Numero_factura` varchar(30) DEFAULT NULL,
  `CantidadTotal` int(11) DEFAULT NULL,
  `Subtotal` int(11) DEFAULT NULL,
  `ValorIva` int(11) DEFAULT NULL,
  `ValorTotal` int(11) DEFAULT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `Recibido` int(11) NOT NULL,
  `Entregado` int(11) NOT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`IdFactura`, `Numero_factura`, `CantidadTotal`, `Subtotal`, `ValorIva`, `ValorTotal`, `FechaHora`, `observaciones`, `Recibido`, `Entregado`, `IdCliente`, `IdUsuario`) VALUES
(85, 'cam', 1, 840, 160, 1000, '2015-07-12 17:44:09', '', 0, 0, 2, 1),
(102, 'cam', 1, 1008, 192, 1200, '2015-07-12 18:40:50', '', 0, 0, 2, 1),
(103, 'cam', 1, 1008, 192, 1200, '2015-07-12 18:41:21', '', 0, 0, 2, 1),
(104, 'cam', 1, 840, 160, 1000, '2015-07-12 22:12:03', '', 0, 0, 2, 1),
(105, 'cam', 1, 840, 160, 1000, '2015-07-12 22:19:34', '', 0, 0, 2, 1),
(106, 'cam', 1, 840, 160, 1000, '2015-07-12 22:23:07', '', 0, 0, 2, 1),
(107, 'cam', 1, 840, 160, 1000, '2015-07-12 22:28:36', '', 0, 0, 2, 1),
(108, 'cam', 1, 1008, 192, 1200, '2015-07-12 22:30:07', '', 0, 0, 2, 1),
(109, 'cam', 1, 1008, 192, 1200, '2015-07-12 22:31:11', '', 0, 0, 2, 1),
(110, 'cam', 1, 840, 160, 1000, '2015-07-12 22:31:42', '', 0, 0, 2, 1),
(111, 'cam', 1, 840, 160, 1000, '2015-07-12 22:33:06', '', 0, 0, 2, 1),
(112, 'cam', 1, 840, 160, 1000, '2015-07-12 22:33:30', '', 0, 0, 2, 1),
(113, 'cam', 1, 840, 160, 1000, '2015-07-12 22:33:47', '', 0, 0, 2, 1),
(114, 'cam', 3, 2856, 544, 3400, '2015-07-21 17:24:45', '', 0, 0, 10, 1),
(115, 'cam', 2, 1848, 352, 2200, '2015-07-21 17:25:21', '', 0, 0, 2, 1),
(116, 'cam', 3, 2688, 512, 3200, '2015-07-21 17:25:58', '', 0, 0, 2, 1),
(117, 'cam', 2, 1848, 352, 2200, '2015-07-21 17:26:22', '', 0, 0, 2, 1),
(118, 'cam', 2, 1848, 352, 2200, '2015-07-21 17:37:10', '', 0, 0, 14, 1),
(119, 'cam', 7, 5880, 1120, 7000, '2015-07-21 17:38:37', '', 0, 0, 2, 1),
(120, 'cam', 5, 5040, 960, 6000, '2015-07-21 17:39:31', '', 0, 0, 14, 1),
(121, 'cam', 1, 840, 160, 1000, '2015-09-13 21:43:45', '', 0, 0, 2, 1),
(122, 'cam', 1, 840, 160, 1000, '2015-09-13 22:38:39', '', 0, 0, 2, 1),
(123, 'cam', 1, 1008, 192, 1200, '2015-09-13 22:41:06', '', 0, 0, 2, 1),
(124, 'cam', 7, 6384, 1216, 7600, '2015-09-13 22:42:09', '', 0, 0, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturadetalle`
--

CREATE TABLE `facturadetalle` (
  `IdFacturaDetalle` int(11) NOT NULL,
  `IdFactura` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturadetalle`
--

INSERT INTO `facturadetalle` (`IdFacturaDetalle`, `IdFactura`, `IdProducto`, `Cantidad`, `Subtotal`) VALUES
(47, 85, 5, 1, 1000),
(66, 103, 6, 1, 1200),
(67, 104, 5, 1, 1000),
(68, 105, 5, 1, 1000),
(69, 106, 5, 1, 1000),
(70, 107, 5, 1, 1000),
(71, 108, 6, 1, 1200),
(72, 109, 6, 1, 1200),
(73, 110, 5, 1, 1000),
(74, 111, 5, 1, 1000),
(75, 112, 5, 1, 1000),
(76, 113, 5, 1, 1000),
(77, 114, 5, 1, 1000),
(78, 114, 6, 1, 1200),
(79, 114, 6, 1, 1200),
(80, 115, 5, 1, 1000),
(81, 115, 6, 1, 1200),
(82, 117, 5, 1, 1000),
(83, 117, 6, 1, 1200),
(84, 118, 5, 1, 1000),
(85, 118, 6, 1, 1200),
(86, 119, 5, 1, 1000),
(87, 119, 5, 1, 1000),
(88, 120, 6, 1, 1200),
(89, 120, 6, 1, 1200),
(90, 120, 6, 1, 1200),
(91, 120, 6, 1, 1200),
(92, 120, 6, 1, 1200),
(93, 121, 5, 1, 1000),
(94, 122, 5, 1, 1000),
(95, 123, 6, 1, 1200),
(96, 124, 6, 1, 1200),
(97, 124, 5, 1, 1000),
(98, 124, 5, 1, 1000),
(99, 124, 5, 1, 1000),
(100, 124, 5, 1, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `IdLinea` int(11) NOT NULL,
  `NombreLinea` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`IdLinea`, `NombreLinea`) VALUES
(75, 'bebidas'),
(76, 'dulces'),
(78, 'frutas'),
(79, 'panaderia'),
(80, 'infantil'),
(82, 'ASEO'),
(106, '5555555555555'),
(107, '12'),
(108, 'capilar'),
(109, 'aq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `IdPerfil` int(11) NOT NULL,
  `NombrePerfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`IdPerfil`, `NombrePerfil`) VALUES
(1, 'ADMNISTRADOR'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `IdPrestamo` int(11) NOT NULL,
  `CodigoPrestamo` varchar(50) NOT NULL DEFAULT '',
  `FechaPrestamo` date DEFAULT NULL,
  `ValorPrestamo` int(11) DEFAULT NULL,
  `EstadoPrestamo` varchar(15) DEFAULT NULL,
  `PorcentajePrestamo` int(11) DEFAULT NULL,
  `ValorTotalprestamo` int(11) NOT NULL,
  `SaldoPrestamo` int(11) NOT NULL,
  `CuotasPrestamo` int(11) NOT NULL,
  `CuotasAbonadas` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `CxU` int(11) NOT NULL,
  `DescripcionPrestamo` varchar(200) NOT NULL,
  `IdCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`IdPrestamo`, `CodigoPrestamo`, `FechaPrestamo`, `ValorPrestamo`, `EstadoPrestamo`, `PorcentajePrestamo`, `ValorTotalprestamo`, `SaldoPrestamo`, `CuotasPrestamo`, `CuotasAbonadas`, `Tipo`, `CxU`, `DescripcionPrestamo`, `IdCliente`) VALUES
(29, '72224706-2015-07-21-17-13-36', '2015-07-21', 100000, 'ACTIVO', 10, 150000, 95000, 5, 2, 'QUINCENAL', 30000, '', 10),
(30, '72224706-2016-10-14-9-38-31', '2016-10-14', 50000, 'TERMINADO', 10, 60000, 0, 2, 2, 'MENSUAL', 30000, '', 10),
(32, '72224706-2016-12-26-10-7-27', '2016-12-26', 100000, 'ACTIVO', 10, 130000, 130000, 3, 0, 'MENSUAL', 43333, '', 10),
(33, '72224706-2016-12-26-13-51-0	', '2016-12-26', 50000, 'ACTIVO', 10, 100000, 90000, 10, 1, 'MENSUAL', 10000, '', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `NombreProducto` varchar(50) DEFAULT NULL,
  `ValorProducto` int(11) DEFAULT NULL,
  `CantidadProducto` int(11) DEFAULT NULL,
  `CantidadMinima` int(11) DEFAULT NULL,
  `MarcaProducto` varchar(20) DEFAULT NULL,
  `IdDetalleLinea` int(11) NOT NULL,
  `CodigoProducto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `NombreProducto`, `ValorProducto`, `CantidadProducto`, `CantidadMinima`, `MarcaProducto`, `IdDetalleLinea`, `CodigoProducto`) VALUES
(1, 'cocacola', 1500, 100, 10, 'cocacola', 39, '7702010102030'),
(2, 'cerveza', 3000, 100, 10, 'aguila', 41, '7702010102031'),
(3, 'colifrol', 1200, 100, 10, 'protex', 51, '12345'),
(4, 'cola', 1200, 200, 10, 'roman', 39, '123456'),
(5, 'jabon', 1000, 100, 10, 'protex', 39, '1002'),
(6, 'sunte', 1200, 100, 10, 'nestle', 40, '1003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `LoginUsuario` varchar(10) DEFAULT NULL,
  `ContraseniaUsuario` varchar(10) DEFAULT NULL,
  `NombreUsuario` varchar(50) DEFAULT NULL,
  `CelularUsuario` varchar(10) DEFAULT NULL,
  `DireccionUsuario` varchar(20) DEFAULT NULL,
  `DocumentoUsuario` varchar(20) DEFAULT NULL,
  `IdPerfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `LoginUsuario`, `ContraseniaUsuario`, `NombreUsuario`, `CelularUsuario`, `DireccionUsuario`, `DocumentoUsuario`, `IdPerfil`) VALUES
(1, 'ADMON', '1234', 'BRYAN', '300 999999', 'CALLE 10 N 20 - 98', '1049877656', 1),
(3, 'MONROY', '1234', 'MONICA', '311 434319', 'CALLE', '3243231212', 2),
(17, 'MARIANA', '1234', 'MARIANA LOPEZ', '3121213121', 'CLLA EJEN ', '11111111', 2),
(24, 'JOSEFA', '1234', 'JOSE FABIAN', '3107876543', 'CALLE 34 N 98 87', '102928227', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`IdAbono`),
  ADD KEY `IdPrestamo` (`IdPrestamo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `detallelinea`
--
ALTER TABLE `detallelinea`
  ADD PRIMARY KEY (`IdDetalleLinea`),
  ADD KEY `IdLinea` (`IdLinea`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IdFactura`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `facturadetalle`
--
ALTER TABLE `facturadetalle`
  ADD PRIMARY KEY (`IdFacturaDetalle`),
  ADD KEY `IdFactura` (`IdFactura`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`IdLinea`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`IdPerfil`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`IdPrestamo`,`CodigoPrestamo`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdPerfil` (`IdPerfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono`
--
ALTER TABLE `abono`
  MODIFY `IdAbono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `detallelinea`
--
ALTER TABLE `detallelinea`
  MODIFY `IdDetalleLinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IdFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT de la tabla `facturadetalle`
--
ALTER TABLE `facturadetalle`
  MODIFY `IdFacturaDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `IdLinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `IdPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `IdPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
  ADD CONSTRAINT `abono_ibfk_1` FOREIGN KEY (`IdPrestamo`) REFERENCES `prestamo` (`IdPrestamo`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `detallelinea`
--
ALTER TABLE `detallelinea`
  ADD CONSTRAINT `detallelinea_ibfk_1` FOREIGN KEY (`IdLinea`) REFERENCES `linea` (`IdLinea`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `facturadetalle`
--
ALTER TABLE `facturadetalle`
  ADD CONSTRAINT `facturadetalle_ibfk_1` FOREIGN KEY (`IdFactura`) REFERENCES `factura` (`IdFactura`),
  ADD CONSTRAINT `facturadetalle_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdPerfil`) REFERENCES `perfil` (`IdPerfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
