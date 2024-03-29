create database Academia

USE [Academia]

GO
/****** Object:  Table [dbo].[Aula]    Script Date: 2/4/2024 2:21:47 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Aula](
	[idaula] [int] IDENTITY(1,1) NOT NULL,
	[codigo] [varchar](60) NOT NULL,
	[tema] [varchar](60) NULL,
	[fecha] [datetime] NULL,
	[hora] [time](7) NULL,
	[idasignatura] [int] NULL,
	[ideducador] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idaula] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

SELECT * FROM Materia;

/****** Object:  Table [dbo].[Materia]    Script Date: 2/4/2024 2:21:47 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Materia](
	[idmateria] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](60) NOT NULL,
	[codigo] [varchar](10) NOT NULL,
	[descripcion] [varchar](200) NULL,
PRIMARY KEY CLUSTERED 
(
	[idmateria] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Profesor]    Script Date: 2/4/2024 2:21:47 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Profesor](
	[idprofesor] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](60) NOT NULL,
	[cedula] [varchar](10) NULL,
	[idasignatura] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idprofesor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [Materia] ON 

INSERT [Materia] ([idmateria], [nombre], [codigo], [descripcion]) VALUES (1, N'Fisica I', N'FIS-001', N'Fisica de Newton')
SET IDENTITY_INSERT [dbo].[Materia] OFF
GO
SET IDENTITY_INSERT [dbo].[Profesor] ON 

INSERT [dbo].[Profesor] ([idprofesor], [nombre], [cedula], [idasignatura]) VALUES (1, N'Raul Cortez', N'0985658820', 1)
SET IDENTITY_INSERT [dbo].[Profesor] OFF
GO
ALTER TABLE [dbo].[Aula]  WITH CHECK ADD FOREIGN KEY([idasignatura])
REFERENCES [dbo].[Materia] ([idmateria])
GO
ALTER TABLE [dbo].[Aula]  WITH CHECK ADD FOREIGN KEY([ideducador])
REFERENCES [dbo].[Profesor] ([idprofesor])
GO
ALTER TABLE [dbo].[Profesor]  WITH CHECK ADD FOREIGN KEY([idasignatura])
REFERENCES [dbo].[Materia] ([idmateria])
GO