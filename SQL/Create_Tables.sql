CREATE TABLE CW2.ProgrammesAudit
(
    ProgrammeAuditID int IDENTITY(1,1),
    ProgrammeTitle varchar(255) not null,
    ProgrammeCode SMALLINT not null,
    UpdatedOn DATETIME,
    CONSTRAINT pk_programmeAuditID PRIMARY KEY (ProgrammeAuditID),
)

CREATE TABLE CW2.Programmes (
    ProgrammeTitle varchar(255) not null,
    ProgrammeCode SMALLINT NOT NULL,
    CONSTRAINT pk_ProgrammeCode PRIMARY KEY (ProgrammeCode),
)

CREATE TABLE CW2.Students (
    StudentID INT IDENTITY(1,1) not null, 
	StudentFirstName varchar(255) not null,
    StudentSurname VARCHAR(255) not null,
    ProgrammeCode SMALLINT not null,
    CONSTRAINT pk_StudentID PRIMARY KEY (StudentID),
    CONSTRAINT fk_ProgrammeCode FOREIGN KEY (ProgrammeCode)
	REFERENCES CW2.Programmes(ProgrammeCode),
)

CREATE TABLE CW2.Projects (
    ProjectID INT IDENTITY(1,1) not null,
    StudentID INT NOT NULL, 
    ProjectTitle varchar(255) not null,
    ProjectDescription varchar(255) not NULL,
    Year INT not null,
    ThumbnailURL nvarchar(2047) not null,
    PosterURL nvarchar(2047) not null,
    CONSTRAINT pk_ProjectID PRIMARY KEY (ProjectID),
    CONSTRAINT fk_StudentID FOREIGN KEY (StudentID) 
	REFERENCES CW2.Students(StudentID), 
)

CREATE TABLE CW2.StudentProgramme (
    StudentID INT not NULL,
    ProgrammeCode SMALLINT not NULL,
    CONSTRAINT fk_StudentIDProgramme FOREIGN KEY  (StudentID)
    REFERENCES CW2.Students(StudentID),
    CONSTRAINT fk_ProgrammeCodeLink FOREIGN KEY (ProgrammeCode)
    REFERENCES CW2.Programmes(ProgrammeCode)
)

CREATE TABLE CW2.StudentProject (
    StudentID INT not NULL,
    ProjectID int not NULL,
    CONSTRAINT fk_StudentIDProject FOREIGN KEY (StudentID)
    REFERENCES CW2.Students(StudentID),
    CONSTRAINT fk_ProgjectCodeLink FOREIGN KEY (ProjectID)
    REFERENCES CW2.Projects(ProjectID)
)


INSERT INTO CW2.Programmes(ProgrammeTitle, ProgrammeCode)
VALUES('Cyber Security', 1);

INSERT INTO CW2.Programmes(ProgrammeTitle, ProgrammeCode)
VALUES('Computer Science', 2);

INSERT INTO CW2.Programmes(ProgrammeTitle, ProgrammeCode)
VALUES('Games Development', 3);

insert into CW2.Students(StudentFirstName, StudentSurname, ProgrammeCode)
VALUES ('Harry', 'Parker', 1);

insert into CW2.Students(StudentFirstName, StudentSurname, ProgrammeCode)
VALUES ('Dave', 'Bentley', 2);

insert into CW2.Students(StudentFirstName, StudentSurname, ProgrammeCode)
VALUES ('Neo', 'King', 3);


INSERT INTO CW2.Projects(StudentID, ProjectTitle, ProjectDescription, [Year], ThumbnailURL, PosterURL)
VALUES(1, 'Security Ethnics', 'To research the ethnics behind cyber security', 2021, 'hello', 'world');

INSERT INTO CW2.Projects(StudentID, ProjectTitle, ProjectDescription, [Year], ThumbnailURL, PosterURL)
VALUES(2, 'Data and Algorithms', 'Produce an data algorithm to convert numbers to a string array', 2021, 'Numbers', 'Game');

INSERT INTO CW2.Projects(StudentID, ProjectTitle, ProjectDescription, [Year], ThumbnailURL, PosterURL)
VALUES(3, 'Dungeon Crawler', 'Create a dungeon crawler in Unity', 2021, 'Monsters', 'Game');

INSERT INTO CW2.StudentProgramme(StudentID, ProgrammeCode)
VALUES(1, 1);

INSERT INTO CW2.StudentProject(StudentID, ProjectID)
VALUES(1, 1)

INSERT INTO CW2.StudentProject(StudentID, ProjectID)
VALUES(1, 2)

INSERT INTO CW2.StudentProject(StudentID, ProjectID)
VALUES(2, 2)

INSERT INTO CW2.StudentProject(StudentID, ProjectID)
VALUES(2, 1)

INSERT INTO CW2.StudentProgramme(StudentID, ProgrammeCode)
VALUES(2, 2);

INSERT INTO CW2.StudentProgramme(StudentID, ProgrammeCode)
VALUES(3, 3);

INSERT INTO CW2.StudentProject(StudentID, ProjectID)
VALUES(3, 3)


SELECT * FROM CW2.ProgrammesAudit