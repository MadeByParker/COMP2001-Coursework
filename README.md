# COMP2001 Assessment

This is the gitub repository in use for the COMP2001 Information Management &amp; Retrieval Module Assessment

## Part 1

### SQL 


The INCLUDED sql files perform the following processes: 

* Xreating 4 tables - Students, Their Projects and the Programmes they are enrolled onto, and an audit table for the programmes.
* 3 stored procedures - Create Programme, Update Programme and Delete Programme.
* A view to see a student and what they are currently studying
* A trigger to insert the new programme record when updating the programme table into an audit table to show histor of the tables. 


### API

A RESTful API developed in C# using the ASP.NET framework for storing details about university programmes. It supports the following HTTP methods: POST, GET, PUT, and DELETE.

The API is a representation of machine to machine communication and the endpoints are as per the swagger file provided for the module. [Swagger output](https://github.com/Plymouth-University/comp2001_assignment-Parker06/blob/main/COMP2001-API-SWAGGER.png)

## Credits

* Azure Data Studio was used to access the Microsoft SQL Server database.
* Visual Studio 2022 was used to create the code for the API using the ASP.NET Core Web App with API Template on .NET v3.1.21
* To connect the database to the API in Visual Studio I used the NuGet package ‘Microsoft.EntityFrameworkCore.SqlServer version 5.0.0’ alongside with NuGet packages ‘Microsoft.EntityFrameworkCore version 5.0.0’ and packages ‘Microsoft.EntityFrameworkCore.Tools version 5.0.0’
* Postman was used to test the API

## Part 2

### Linked Data Application

It is a linked data application written in PHP that displays a dataset from Plymouth DATA Place. In this case, I have chosen a dataset in geoJSON that contains the locations of all the bus stops in Plymouth. I have minimalised the dataset to 10 randomly chosen locations so the server loads the data quicker - [Template of what one data entry looks like](https://github.com/Plymouth-University/comp2001_assignment-Parker06/blob/main/Linked%20Data%20Application/dataset/templateOfBusStop.txt)

The INCLUDED php pages: 

* index page - gives the user an overview of what to expect on the LDA.
* table view - shows the dataset in presentable table form
* map view - shows the dataset on a map box using the locations' coordinates.
* JSON-LD Format - shows a RDF output of the dataset [view here](http://web.socem.plymouth.ac.uk/COMP2001/hparker/busstop/)

[View the Linked Data Application](http://web.socem.plymouth.ac.uk/COMP2001/hparker/public/)

## Credits

* Plymouth DATA Place: https://plymouth.thedata.place/dataset
* Data Set: https://plymouth.thedata.place/dataset/bus-stops
* Leaflet: http://leafletjs.com/
* Mapbox: https://www.mapbox.com/
* Font Awesome: https://fontawesome.com/
* Materialize CSS: https://materializecss.com
* PHPStorm 2021.2.2
