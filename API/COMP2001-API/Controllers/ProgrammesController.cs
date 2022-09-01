using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using COMP2001_API.Models;

namespace COMP2001_API.Controllers
{
    [Route("api/programmes")]
    [ApiController]
    public class ProgrammesController : ControllerBase
    {
        private readonly DataAccess _context;

        public ProgrammesController(DataAccess context)
        {
            _context = context;
        }

        // GET: api/Programmes
        [HttpGet]
        public async Task<IActionResult> GetProgrammesAsync()
        {
            return await _context.Programmes.ToListAsync();
        }

        // GET: api/Programmes/5
        [HttpGet("{id}")]
        public IActionResult GetProgramme(int id)
        {
            var programme =  _context.Programmes.FindAsync((short)id);

            if (programme == null)
            {
                return NotFound();
            }
            else
            {
                return new JsonResult(programme) { StatusCode = 200 };
            }

        }

        // PUT: api/Programmes/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for
        // more details, see https://go.microsoft.com/fwlink/?linkid=2123754.
        [HttpPut("{id}")]
        public IActionResult PutProgramme(int id, Programme programme)
        {
            try
            {
                _context.Update(programme, id);
                return NoContent();
            }
            catch (DbUpdateConcurrencyException e)
            {
                return StatusCode(404);
            }

        }

        // POST: api/Programmes
        // To protect from overposting attacks, enable the specific properties you want to bind to, for
        // more details, see https://go.microsoft.com/fwlink/?linkid=2123754.
        [HttpPost]
        public IActionResult PostProgramme(Programme programme)
        {
            string responseMessage;
            int ResponseCode;

            createNew(programme, out responseMessage);

            if (responseMessage.Length > 0)
            {
                try
                {
                    ResponseCode = Convert.ToInt32(responseMessage);
                }
                catch (Exception e)
                {
                    return Ok(new string[] { "Error", e.ToString(), "ResponseMessage", responseMessage });
                }
            }
            else
            {
                ResponseCode = 418;
            }


            switch (ResponseCode)
            {
                case 404:
                    return BadRequest();
                case 418:
                    return StatusCode(418);
                case 208:
                    return StatusCode(208);

                default: return new JsonResult(new string[] { "Programme Code", responseMessage }) { StatusCode = StatusCodes.Status201Created };
            }

        }

        // DELETE: api/Programmes/5
        [HttpDelete("{id}")]
        public IActionResult DeleteProgramme(int id)
        {
            if (!ProgrammeExists(id))
            {
                return NotFound();
            }
            else
            {
                _context.Delete(id);
                return NoContent();
            }

        }

        private bool ProgrammeExists(int id)
        {
            return _context.Programmes.Any(e => e.ProgrammeCode == id);
        }

        private void createNew(Programme programme, out string responseMessage)
        {
            try
            {
                _context.Create(programme, out responseMessage);
            }
            catch (Exception error)
            {
                responseMessage = error.Message;
            }


        }
    }
}