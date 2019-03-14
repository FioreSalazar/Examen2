Esta es la base de datos de los servicios

Vuelos
Tabla vuelos
CREATE TABLE [dbo].[vuelos](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[origen] [varchar](50) NULL,
	[destino] [varchar](50) NULL,
	[agencia] [varchar](50) NULL,
	[categoria] [varchar](50) NULL,
	[precio] [int] NULL,
 CONSTRAINT [PK_vuelo_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

Hoteles
Tabla hoteles
CREATE TABLE [dbo].[hoteles](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[telefono] [varchar](50) NULL,
	[ubicacion] [varchar](50) NULL,
	[tipoHabitacion] [varchar](50) NULL,
	[precio] [int] NULL
 CONSTRAINT [PK_hotel_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

Carros
Tabla carros
CREATE TABLE [dbo].[carros](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[marca] [varchar](50) NULL,
	[modelo] [varchar](50) NULL,
	[categoria] [varchar](50) NULL,
	[color] [varchar](50) NULL,
	[precio] [int] NULL
 CONSTRAINT [PK_carro_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]


Reservaciones
Tabla usuarios
CREATE TABLE [dbo].[usuarios](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[apellido] [varchar](50) NULL,
	[cedula] [varchar](50) NULL,
	[telefono] [varchar](50) NULL,
	[correo] [varchar](50) NULL,
	[clave] [varchar](50) NULL,Vuelos
Tabla vuelos
CREATE TABLE [dbo].[vuelos](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[origen] [varchar](50) NULL,
	[destino] [varchar](50) NULL,
	[agencia] [varchar](50) NULL,
	[categoria] [varchar](50) NULL,
	[precio] [int] NULL,
 CONSTRAINT [PK_vuelo_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

Hoteles
Tabla hoteles
CREATE TABLE [dbo].[hoteles](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[telefono] [varchar](50) NULL,
	[ubicacion] [varchar](50) NULL,
	[tipoHabitacion] [varchar](50) NULL,
	[precio] [int] NULL
 CONSTRAINT [PK_hotel_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

Carros
Tabla carros
CREATE TABLE [dbo].[carros](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[marca] [varchar](50) NULL,
	[modelo] [varchar](50) NULL,
	[categoria] [varchar](50) NULL,
	[color] [varchar](50) NULL,
	[precio] [int] NULL
 CONSTRAINT [PK_carro_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]


Reservaciones
Tabla usuarios
CREATE TABLE [dbo].[usuarios](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[apellido] [varchar](50) NULL,
	[cedula] [varchar](50) NULL,
	[telefono] [varchar](50) NULL,
	[correo] [varchar](50) NULL,
	[clave] [varchar](50) NULL,
	[rol] [varchar](50) NULL
 CONSTRAINT [PK_usuario_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]


Tabla reservaciones
CREATE TABLE [dbo].[reservaciones](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[usuario_id] [varchar](50) NULL,
	[fechaInicio] [varchar](50) NULL,
	[fechaFin] [varchar](50) NULL,
	[total] [int] NULL
 CONSTRAINT [PK_reservacion_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

	[rol] [varchar](50) NULL
 CONSTRAINT [PK_usuario_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]


Tabla reservaciones
CREATE TABLE [dbo].[reservaciones](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[usuario_id] [varchar](50) NULL,
	[fechaInicio] [varchar](50) NULL,
	[fechaFin] [varchar](50) NULL,
	[total] [int] NULL
 CONSTRAINT [PK_reservacion_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
