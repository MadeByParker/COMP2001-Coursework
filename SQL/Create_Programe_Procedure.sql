CREATE PROCEDURE CW2.CreateProgramme(
       -- Add the parameters for the stored procedure here
       @ProgrammeTitle varchar(255),
       @ProgrammeCode smallint,
       @responseMessage NVARCHAR(250) OUTPUT
)
AS
BEGIN
       BEGIN TRANSACTION
              DECLARE @Error NVARCHAR(Max);
              DECLARE @NewProgrammeTitle varchar(255);
              DECLARE @NewProgrammeCode smallint;
              
              BEGIN TRY
                     --select the variables and set them the same as the parameters incoming
			SELECT @NewProgrammeTitle = ProgrammeTitle, @NewProgrammeCode = ProgrammeCode from CW2.Programmes
			WHERE ProgrammeTitle = @ProgrammeTitle AND ProgrammeCode = @ProgrammeCode

                     --if programme doesn't exist
			IF @NewProgrammeTitle IS NULL AND @NewProgrammeCode IS NULL
                     BEGIN
                     -- Insert into Programmes table
                            INSERT INTO CW2.Programmes (ProgrammeTitle, ProgrammeCode)
                            VALUES (@ProgrammeTitle, @ProgrammeCode)

                            IF @@TRANCOUNT > 0
                                   SELECT @NewProgrammeCode = ProgrammeCode FROM CW2.Programmes WHERE ProgrammeCode = @ProgrammeCode
                                   SET @responseMessage = '{ "code":"201", "Programme Created" }'
                                   COMMIT TRANSACTION;
                            
                     END
                     --else say programme exists
                     ELSE
                            BEGIN 
                                   SET @responseMessage = '{ "code":"208", "message":"Call successful, but a programme with that code already exists and so new entry not made"}';
                                   ROLLBACK TRANSACTION;
                            END 
       END TRY
       BEGIN CATCH
              -- if error, roll back any chanegs done by any of the sql statements
              set @Error = @Error+': An error has occurred: Programme could be not created'
              SET @responseMessage = '{ "@message":"' + @Error + '" }'
              IF @@TRANCOUNT > 0
                     ROLLBACK TRANSACTION;
            RAISERROR(@Error, 1, 0);
       END CATCH;
END

DROP PROCEDURE IF EXISTS CW2.CreateProgramme

DECLARE @message VARCHAR(250);
exec CW2.CreateProgramme 'Mathematics', 7, @message OUTPUT;
SELECT @message;


DECLARE @message VARCHAR(250);
exec CW2.CreateProgramme 'Video Editing', 6, @message OUTPUT;
SELECT @message;

