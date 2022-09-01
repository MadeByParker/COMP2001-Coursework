
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[CW2].[ProgrammesAudit]') AND type in (N'U'))
DROP TABLE [CW2].[ProgrammesAudit]
GO

IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[CW2].[StudentProject]') AND type in (N'U'))
DROP TABLE [CW2].[StudentProject]
GO

IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[CW2].[StudentProgramme]') AND type in (N'U'))
DROP TABLE [CW2].[StudentProgramme]
GO


IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[CW2].[Projects]') AND type in (N'U'))
DROP TABLE [CW2].[Projects]
GO

IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[CW2].[Students]') AND type in (N'U'))
DROP TABLE [CW2].[Students]
GO

IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[CW2].[Programmes]') AND type in (N'U'))
DROP TABLE [CW2].[Programmes]
GO
