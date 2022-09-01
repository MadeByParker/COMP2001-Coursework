CREATE TRIGGER AddProgrammeAuditRecord on CW2.Programmes
after UPDATE, INSERT
AS
BEGIN
    INSERT INTO CW2.ProgrammesAudit
    (ProgrammeTitle, ProgrammeCode, UpdatedOn)
    SELECT i.ProgrammeTitle, i.ProgrammeCode, GETDATE()
    FROM CW2.Programmes p
    INNER JOIN inserted i on p.ProgrammeCode = i.ProgrammeCode
END

DROP TRIGGER IF EXISTS AddProgrammeAuditRecord;