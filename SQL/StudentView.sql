CREATE VIEW CW2.StudentsView AS
SELECT DISTINCT CW2.Students.StudentID, CW2.Students.StudentFirstName, CW2.Students.StudentSurname, CW2.Students.[Year], CW2.Programmes.ProgrammeCode, CW2.Programmes.ProgrammeTitle
FROM (CW2.Students
INNER JOIN CW2.Programmes ON CW2.Students.ProgrammeCode = CW2.Programmes.ProgrammeCode);

DROP VIEW IF EXISTS CW2.StudentsView;