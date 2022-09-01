CREATE PROCEDURE CW2.DeleteProgramme(
	-- Add the parameters for the stored procedure here
              @ProgrammeCode AS int
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
                            DELETE FROM CW2.Programmes
                            WHERE ProgrammeCode = @ProgrammeCode
							 SET @Error = 'Programme does exist!';
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

DROP PROCEDURE IF EXISTS CW2.DeleteProgramme


EXEC CW2.DeleteProgramme 3;

DELETE FROM CW2.StudentProgramme
WHERE ProgrammeCode = 3