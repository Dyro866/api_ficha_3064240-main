# Diccionario de Datos — Sistema de Discoteca (Laravel)

**Proyecto:** Gestión de discoteca  
**Framework:** Laravel (migraciones Eloquent)  
**Cantidad de entidades:** 17  
**Fecha:** 24 de julio de 2026  

> Las entidades están numeradas en el **orden de creación de migraciones** (padre → hija) para evitar errores de foreign key. Ver también [`README.md`](./README.md).

---

## Resumen (orden de creación)

| # | Entidad | Tabla | Depende de | Encargado |
|---|---------|-------|------------|-----------|
| 1 | Rol | `roles` | — | Yizel Argelis Sanchez Castillo |
| 2 | Usuario | `usuarios` | `roles` | Maria Jose Roldan Cuellar |
| 3 | Empleado | `empleados` | `usuarios` | Duvan Felipe Sanchez Villamil |
| 4 | Cliente | `clientes` | — | July Nataly Rodríguez Díaz |
| 5 | Zona | `zonas` | — | Julian Estevan Bejarano González |
| 6 | Mesa | `mesas` | `zonas` | Dylan Steven León Moreno |
| 7 | DJ / Artista | `djs_artistas` | — | Julian David Gómez Ladino |
| 8 | Evento | `eventos` | `zonas`, `djs_artistas` | Hugo Fabian Mora Nava |
| 9 | Reserva | `reservas` | `clientes`, `mesas`, `eventos`, `empleados` | Leonardo Garavito Diaz |
| 10 | Categoría de producto | `categorias_producto` | — | Lizbeth Carolina Bautista |
| 11 | Proveedor | `proveedores` | — | Dolly Juliana Aguirre Heredia |
| 12 | Producto | `productos` | `categorias_producto`, `proveedores` | Laura Julieth Rojas Ramírez |
| 13 | Inventario | `inventarios` | `productos` | Laura Sofia Barrera Montenegro |
| 14 | Promoción | `promociones` | `eventos` | Juan Diego Delgado Jerez |
| 15 | Venta | `ventas` | `clientes`, `empleados`, `mesas`, `promociones` | Miguel Angel Cruz Achipiz |
| 16 | Detalle de venta | `detalle_ventas` | `ventas`, `productos` | Yeny Paola Silva Camargo |
| 17 | Pago | `pagos` | `ventas` | Samuel David Martínez Borbon |

---

## 1. Rol — `roles`

**Encargado:** Yizel Argelis Sanchez Castillo  
**Descripción:** Define los perfiles de acceso del sistema (administrador, cajero, mesero, seguridad, etc.).  
**Depende de:** ninguna

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del rol |
| nombre | string | VARCHAR | 50 | No | No | Sí | No | Nombre del rol |
| descripcion | text | TEXT | — | No | No | No | Sí | Descripción de permisos |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activo/Inactivo (default: true) |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Un rol tiene muchos usuarios (`hasMany`).

---

## 2. Usuario — `usuarios`

**Encargado:** Maria Jose Roldan Cuellar  
**Descripción:** Credenciales de acceso al sistema vinculadas a un rol.  
**Depende de:** `roles`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del usuario |
| rol_id | foreignId | BIGINT | — | No | Sí → `roles.id` | No | No | Rol asignado |
| nombre | string | VARCHAR | 100 | No | No | No | No | Nombre completo |
| email | string | VARCHAR | 150 | No | No | Sí | No | Correo de acceso |
| password | string | VARCHAR | 255 | No | No | No | No | Contraseña hasheada |
| telefono | string | VARCHAR | 20 | No | No | No | Sí | Teléfono de contacto |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activo/Inactivo |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a un rol (`belongsTo`). Un usuario puede estar asociado a un empleado (`hasOne`).

---

## 3. Empleado — `empleados`

**Encargado:** Duvan Felipe Sanchez Villamil  
**Descripción:** Personal operativo de la discoteca (meseros, bartenders, seguridad, cajeros).  
**Depende de:** `usuarios`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del empleado |
| usuario_id | foreignId | BIGINT | — | No | Sí → `usuarios.id` | Sí | Sí | Usuario del sistema (opcional) |
| documento | string | VARCHAR | 20 | No | No | Sí | No | Documento de identidad |
| nombres | string | VARCHAR | 80 | No | No | No | No | Nombres |
| apellidos | string | VARCHAR | 80 | No | No | No | No | Apellidos |
| cargo | string | VARCHAR | 60 | No | No | No | No | Cargo laboral |
| fecha_ingreso | date | DATE | — | No | No | No | No | Fecha de ingreso |
| salario | decimal | DECIMAL(12,2) | 12,2 | No | No | No | Sí | Salario base |
| estado | enum | ENUM | — | No | No | No | No | activo, inactivo, vacaciones |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a un usuario (`belongsTo`). Atiende muchas reservas y ventas (`hasMany`).

---

## 4. Cliente — `clientes`

**Encargado:** July Nataly Rodríguez Díaz  
**Descripción:** Personas que asisten o reservan en la discoteca.  
**Depende de:** ninguna

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del cliente |
| documento | string | VARCHAR | 20 | No | No | Sí | No | Documento de identidad |
| nombres | string | VARCHAR | 80 | No | No | No | No | Nombres |
| apellidos | string | VARCHAR | 80 | No | No | No | No | Apellidos |
| email | string | VARCHAR | 150 | No | No | Sí | Sí | Correo electrónico |
| telefono | string | VARCHAR | 20 | No | No | No | No | Teléfono |
| fecha_nacimiento | date | DATE | — | No | No | No | Sí | Para control de mayoría de edad |
| tipo | enum | ENUM | — | No | No | No | No | regular, vip, corporativo |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchas reservas y ventas (`hasMany`).

---

## 5. Zona — `zonas`

**Encargado:** Julian Estevan Bejarano González  
**Descripción:** Áreas físicas del local (pista, VIP, terraza, lounge, barra).  
**Depende de:** ninguna

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la zona |
| nombre | string | VARCHAR | 80 | No | No | Sí | No | Nombre de la zona |
| descripcion | text | TEXT | — | No | No | No | Sí | Descripción del área |
| aforo_maximo | unsignedInteger | INT | — | No | No | No | No | Capacidad máxima de personas |
| precio_cover | decimal | DECIMAL(10,2) | 10,2 | No | No | No | Sí | Cover charge de la zona |
| estado | boolean | TINYINT | 1 | No | No | No | No | Disponible/No disponible |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchas mesas y eventos (`hasMany`).

---

## 6. Mesa — `mesas`

**Encargado:** Dylan Steven León Moreno  
**Descripción:** Mesas o botelleros ubicados dentro de una zona.  
**Depende de:** `zonas`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la mesa |
| zona_id | foreignId | BIGINT | — | No | Sí → `zonas.id` | No | No | Zona a la que pertenece |
| numero | string | VARCHAR | 10 | No | No | Sí | No | Número o código de mesa |
| capacidad | unsignedTinyInteger | TINYINT | — | No | No | No | No | Personas que admite |
| tipo | enum | ENUM | — | No | No | No | No | estandar, vip, botellero |
| estado | enum | ENUM | — | No | No | No | No | libre, ocupada, reservada, mantenimiento |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a una zona (`belongsTo`). Tiene muchas reservas (`hasMany`).

---

## 7. DJ / Artista — `djs_artistas`

**Encargado:** Julian David Gómez Ladino  
**Descripción:** DJs y artistas que se presentan en la discoteca.  
**Depende de:** ninguna  
**Importante:** se crea **antes** que `eventos` porque `eventos.dj_artista_id` apunta aquí.

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del artista |
| nombre_artistico | string | VARCHAR | 100 | No | No | Sí | No | Nombre artístico |
| nombre_real | string | VARCHAR | 120 | No | No | No | Sí | Nombre real |
| genero_musical | string | VARCHAR | 60 | No | No | No | No | Género principal |
| biografia | text | TEXT | — | No | No | No | Sí | Biografía breve |
| contacto | string | VARCHAR | 100 | No | No | No | Sí | Teléfono o email de booking |
| cache_base | decimal | DECIMAL(12,2) | 12,2 | No | No | No | Sí | Caché o tarifa base |
| estado | boolean | TINYINT | 1 | No | No | No | No | Disponible para contratar |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchos eventos (`hasMany`).

---

## 8. Evento — `eventos`

**Encargado:** Hugo Fabian Mora Nava  
**Descripción:** Noches temáticas, fiestas especiales o fechas programadas.  
**Depende de:** `zonas`, `djs_artistas`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del evento |
| zona_id | foreignId | BIGINT | — | No | Sí → `zonas.id` | No | Sí | Zona principal del evento |
| dj_artista_id | foreignId | BIGINT | — | No | Sí → `djs_artistas.id` | No | Sí | Artista principal |
| nombre | string | VARCHAR | 120 | No | No | No | No | Nombre del evento |
| descripcion | text | TEXT | — | No | No | No | Sí | Detalle promocional |
| fecha_inicio | dateTime | DATETIME | — | No | No | No | No | Inicio del evento |
| fecha_fin | dateTime | DATETIME | — | No | No | No | No | Fin del evento |
| aforo | unsignedInteger | INT | — | No | No | No | No | Aforo permitido |
| precio_entrada | decimal | DECIMAL(10,2) | 10,2 | No | No | No | No | Precio de entrada |
| estado | enum | ENUM | — | No | No | No | No | programado, en_curso, finalizado, cancelado |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a zona y DJ (`belongsTo`). Tiene muchas reservas y promociones (`hasMany`).

---

## 9. Reserva — `reservas`

**Encargado:** Leonardo Garavito Diaz  
**Descripción:** Reservas de mesa o cupo para un evento.  
**Depende de:** `clientes`, `mesas`, `eventos`, `empleados`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la reserva |
| cliente_id | foreignId | BIGINT | — | No | Sí → `clientes.id` | No | No | Cliente que reserva |
| mesa_id | foreignId | BIGINT | — | No | Sí → `mesas.id` | No | Sí | Mesa reservada |
| evento_id | foreignId | BIGINT | — | No | Sí → `eventos.id` | No | Sí | Evento asociado |
| empleado_id | foreignId | BIGINT | — | No | Sí → `empleados.id` | No | Sí | Empleado que tomó la reserva |
| fecha_reserva | dateTime | DATETIME | — | No | No | No | No | Fecha y hora reservada |
| cantidad_personas | unsignedTinyInteger | TINYINT | — | No | No | No | No | Número de asistentes |
| anticipo | decimal | DECIMAL(12,2) | 12,2 | No | No | No | Sí | Valor del anticipo |
| observaciones | text | TEXT | — | No | No | No | Sí | Notas adicionales |
| estado | enum | ENUM | — | No | No | No | No | pendiente, confirmada, cancelada, asistio |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a cliente, mesa, evento y empleado (`belongsTo`).

---

## 10. Categoría de producto — `categorias_producto`

**Encargado:** Lizbeth Carolina Bautista  
**Descripción:** Clasificación del catálogo (licores, cocteles, cervezas, snacks, etc.).  
**Depende de:** ninguna

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la categoría |
| nombre | string | VARCHAR | 80 | No | No | Sí | No | Nombre de la categoría |
| descripcion | string | VARCHAR | 255 | No | No | No | Sí | Descripción corta |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activa/Inactiva |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchos productos (`hasMany`).

---

## 11. Proveedor — `proveedores`

**Encargado:** Dolly Juliana Aguirre Heredia  
**Descripción:** Empresas o personas que abastecen productos a la discoteca.  
**Depende de:** ninguna  
**Importante:** se crea **antes** que `productos` porque `productos.proveedor_id` apunta aquí.

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del proveedor |
| nit | string | VARCHAR | 20 | No | No | Sí | No | NIT o documento |
| razon_social | string | VARCHAR | 150 | No | No | No | No | Nombre o razón social |
| contacto | string | VARCHAR | 100 | No | No | No | Sí | Persona de contacto |
| telefono | string | VARCHAR | 20 | No | No | No | No | Teléfono |
| email | string | VARCHAR | 150 | No | No | No | Sí | Correo electrónico |
| direccion | string | VARCHAR | 200 | No | No | No | Sí | Dirección |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activo/Inactivo |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchos productos (`hasMany`).

---

## 12. Producto — `productos`

**Encargado:** Laura Julieth Rojas Ramírez  
**Descripción:** Bebidas, licores, botellas y snacks que se venden en barra.  
**Depende de:** `categorias_producto`, `proveedores`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del producto |
| categoria_id | foreignId | BIGINT | — | No | Sí → `categorias_producto.id` | No | No | Categoría del producto |
| proveedor_id | foreignId | BIGINT | — | No | Sí → `proveedores.id` | No | Sí | Proveedor principal |
| codigo | string | VARCHAR | 30 | No | No | Sí | No | Código interno o SKU |
| nombre | string | VARCHAR | 120 | No | No | No | No | Nombre comercial |
| descripcion | text | TEXT | — | No | No | No | Sí | Descripción del producto |
| precio_venta | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Precio al público |
| precio_compra | decimal | DECIMAL(12,2) | 12,2 | No | No | No | Sí | Costo de adquisición |
| unidad_medida | string | VARCHAR | 20 | No | No | No | No | unidad, botella, shot, ml |
| estado | boolean | TINYINT | 1 | No | No | No | No | Disponible para venta |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a categoría y proveedor (`belongsTo`). Tiene inventario y detalles de venta (`hasMany` / `hasOne`).

---

## 13. Inventario — `inventarios`

**Encargado:** Laura Sofia Barrera Montenegro  
**Descripción:** Control de stock de cada producto en bodega o barra.  
**Depende de:** `productos`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del registro |
| producto_id | foreignId | BIGINT | — | No | Sí → `productos.id` | Sí | No | Producto controlado |
| stock_actual | unsignedInteger | INT | — | No | No | No | No | Cantidad disponible |
| stock_minimo | unsignedInteger | INT | — | No | No | No | No | Umbral de alerta |
| ubicacion | string | VARCHAR | 80 | No | No | No | Sí | Bodega, barra principal, VIP |
| ultima_entrada | dateTime | DATETIME | — | No | No | No | Sí | Última reposición |
| ultima_salida | dateTime | DATETIME | — | No | No | No | Sí | Última salida por venta |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a un producto (`belongsTo`).

---

## 14. Promoción — `promociones`

**Encargado:** Juan Diego Delgado Jerez  
**Descripción:** Descuentos, 2x1, happy hour u ofertas por evento.  
**Depende de:** `eventos`  
**Importante:** se crea **antes** que `ventas` porque `ventas.promocion_id` apunta aquí.

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la promoción |
| evento_id | foreignId | BIGINT | — | No | Sí → `eventos.id` | No | Sí | Evento vinculado (opcional) |
| nombre | string | VARCHAR | 120 | No | No | No | No | Nombre de la promoción |
| descripcion | text | TEXT | — | No | No | No | Sí | Detalle de la oferta |
| tipo_descuento | enum | ENUM | — | No | No | No | No | porcentaje, valor_fijo, 2x1 |
| valor_descuento | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Valor o porcentaje a aplicar |
| fecha_inicio | dateTime | DATETIME | — | No | No | No | No | Inicio de vigencia |
| fecha_fin | dateTime | DATETIME | — | No | No | No | No | Fin de vigencia |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activa/Inactiva |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Puede pertenecer a un evento (`belongsTo`). Se aplica en muchas ventas (`hasMany`).

---

## 15. Venta — `ventas`

**Encargado:** Miguel Angel Cruz Achipiz  
**Descripción:** Cabecera de la cuenta o factura de consumo en la discoteca.  
**Depende de:** `clientes`, `empleados`, `mesas`, `promociones`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la venta |
| cliente_id | foreignId | BIGINT | — | No | Sí → `clientes.id` | No | Sí | Cliente (si aplica) |
| empleado_id | foreignId | BIGINT | — | No | Sí → `empleados.id` | No | No | Empleado que registra la venta |
| mesa_id | foreignId | BIGINT | — | No | Sí → `mesas.id` | No | Sí | Mesa asociada |
| promocion_id | foreignId | BIGINT | — | No | Sí → `promociones.id` | No | Sí | Promoción aplicada |
| numero_factura | string | VARCHAR | 30 | No | No | Sí | No | Número de factura/recibo |
| fecha_venta | dateTime | DATETIME | — | No | No | No | No | Fecha y hora de la venta |
| subtotal | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Subtotal sin descuentos |
| descuento | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Valor descontado |
| total | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Total a pagar |
| estado | enum | ENUM | — | No | No | No | No | abierta, pagada, anulada |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a cliente, empleado, mesa y promoción (`belongsTo`). Tiene muchos detalles y pagos (`hasMany`).

---

## 16. Detalle de venta — `detalle_ventas`

**Encargado:** Yeny Paola Silva Camargo  
**Descripción:** Ítems consumidos en cada venta (líneas de factura).  
**Depende de:** `ventas`, `productos`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del detalle |
| venta_id | foreignId | BIGINT | — | No | Sí → `ventas.id` | No | No | Venta a la que pertenece |
| producto_id | foreignId | BIGINT | — | No | Sí → `productos.id` | No | No | Producto vendido |
| cantidad | unsignedInteger | INT | — | No | No | No | No | Cantidad vendida |
| precio_unitario | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Precio al momento de la venta |
| subtotal | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | cantidad × precio_unitario |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a venta y producto (`belongsTo`).

---

## 17. Pago — `pagos`

**Encargado:** Samuel David Martínez Borbon  
**Descripción:** Registro de medios y montos con los que se cancela una venta.  
**Depende de:** `ventas`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del pago |
| venta_id | foreignId | BIGINT | — | No | Sí → `ventas.id` | No | No | Venta pagada |
| metodo | enum | ENUM | — | No | No | No | No | efectivo, tarjeta, transferencia, mixtos |
| monto | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Valor pagado |
| referencia | string | VARCHAR | 80 | No | No | No | Sí | Número de transacción |
| fecha_pago | dateTime | DATETIME | — | No | No | No | No | Fecha y hora del pago |
| estado | enum | ENUM | — | No | No | No | No | exitoso, pendiente, fallido |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a una venta (`belongsTo`).

---

## Diagrama de relaciones (resumen)

```
roles 1──* usuarios 1──1 empleados
zonas 1──* mesas
djs_artistas 1──* eventos *──1 zonas
clientes / mesas / eventos / empleados ──* reservas
categorias_producto 1──* productos *──1 proveedores
productos 1──1 inventarios
eventos 1──* promociones
clientes / empleados / mesas / promociones ──* ventas
ventas 1──* detalle_ventas *──1 productos
ventas 1──* pagos
```

---

## Convención de claves foráneas (Laravel)

```php
$table->foreignId('rol_id')->constrained('roles')->cascadeOnUpdate()->restrictOnDelete();
```

En detalles (`detalle_ventas`, `pagos`) se recomienda `cascadeOnDelete()` cuando el hijo no tiene sentido sin el padre.
