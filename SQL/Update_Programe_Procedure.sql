CREATE PROCEDURE CW2.UpdateProgramme(
	-- Add the parameters for the stored procedure here
       @ProgrammeTitle varchar(255),
       @ProgrammeCode int
	)
AS
BEGIN
    BEGIN TRANSACTION
        DECLARE @Error NVARCHAR(Max)

        BEGIN TRY

            IF @ProgrammeCode IS NULL
                BEGIN
                    SET @Error = 'The Programme Code can not be null!'
                    ROLLBACK TRANSACTION;
                    RAISERROR(@Error, 1, 0);
                END
            ELSE
                BEGIN
                    IF EXISTS(SELECT * FROM CW2.Programmes WHERE ProgrammeCode = @ProgrammeCode)
                        BEGIN
                            UPDATE CW2.Programmes 
                            SET ProgrammeTitle = @ProgrammeTitle
                            WHERE ProgrammeCode = @ProgrammeCode
        
                            IF @@TRANCOUNT > 0 
                                COMMIT;
                        END
                    ELSE
                        BEGIN
                            SET @Error = 'Programme does not exist!';
                            ROLLBACK TRANSACTION;
                            RAISERROR(@Error, 1, 0);
                        END
                END
        END TRY
       BEGIN CATCH
              -- if error, roll back any chanegs done by any of the sql statements
              SET @Error = @Error+': An error has occurred: Programme could be not updated'

              IF @@TRANCOUNT > 0
                     ROLLBACK TRANSACTION;
            RAISERROR(@Error, 1, 0);
       END CATCH
END

DROP PROCEDURE IF EXISTS CW2.UpdateProgramme

exec CW2.UpdateProgramme 'Information Management', 1;
EXEC CW2.UpdateProgramme 'Computing', 2;

SELECT * FROM CW2.Programmes