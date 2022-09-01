using Microsoft.Data.SqlClient;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;
using System;
using System.Data;
using System.Threading.Tasks;


#nullable disable

namespace COMP2001_API.Models
{
    public partial class DataAccess : DbContext
    {

        private readonly string connection_string;


        public DataAccess(IConfiguration configuration)
        {
            connection_string = configuration.GetConnectionString("COMP2001");
        }

        public DataAccess()
        {
        }

        public DataAccess(DbContextOptions<DataAccess> options)
            : base(options)
        {
        }


        public virtual DbSet<Programme> Programmes { get; set; }

        public void Create(Programme programme, out string responseMessage)
        {
            using (SqlConnection sqlConnection = new SqlConnection(connection_string))
            {
                using (SqlCommand command = new SqlCommand("CW2.CreateProgramme", sqlConnection))
                {
                    command.CommandType = System.Data.CommandType.StoredProcedure;
                    command.Parameters.Add(new SqlParameter("@ProgrammeTitle", programme.ProgrammeTitle));
                    command.Parameters.Add(new SqlParameter("@ProgrammeCode", programme.ProgrammeCode));

                    SqlParameter outputMessage = new SqlParameter("@responseMessage", SqlDbType.NVarChar, 250);
                    outputMessage.Direction = ParameterDirection.Output;

                    command.Parameters.Add(outputMessage);

                    sqlConnection.Open();
                    command.ExecuteNonQuery();
                    responseMessage = outputMessage.Value.ToString();
                }
            }
        }

        public void Update(Programme programme, int programmeCode)
        {
            Database.ExecuteSqlRaw("EXECUTE CW2.UpdateProgramme @ProgrammeTitle, @ProgrammeCode",
                new SqlParameter("@ProgrammeTitle", programme.ProgrammeTitle),
                new SqlParameter("@ProgrammeCode", programme.ProgrammeCode)
                );
        }

        public void Delete(int programmeCode)
        {
            using (SqlConnection sqlConnection = new SqlConnection(connection_string))
            {
                using (SqlCommand command = new SqlCommand("CW2.DeleteProgramme", sqlConnection))
                {
                    command.CommandType = System.Data.CommandType.StoredProcedure;

                    command.Parameters.Add(new SqlParameter("@ProgrammeCode", programmeCode));

                    sqlConnection.Open();

                    command.ExecuteNonQuery();
                }
            }
        }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
#warning To protect potentially sensitive information in your connection string, you should move it out of source code. You can avoid scaffolding the connection string by using the Name= syntax to read it from configuration - see https://go.microsoft.com/fwlink/?linkid=2131148. For more guidance on storing connection strings, see http://go.microsoft.com/fwlink/?LinkId=723263.
                optionsBuilder.UseSqlServer("Server=socem1.uopnet.plymouth.ac.uk;Database=COMP2001_HParker;User id=HParker;Password=GslK870*;");
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.HasAnnotation("Relational:Collation", "Latin1_General_CI_AS");

            modelBuilder.Entity<Programme>(entity =>
            {
                entity.HasKey(e => e.ProgrammeCode)
                    .HasName("pk_ProgrammeCode");

                entity.ToTable("Programmes", "CW2");

                entity.Property(e => e.ProgrammeCode).ValueGeneratedNever();

                entity.Property(e => e.ProgrammeTitle)
                    .IsRequired()
                    .HasMaxLength(255)
                    .IsUnicode(false);
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}