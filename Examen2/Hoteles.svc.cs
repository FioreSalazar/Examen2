using Examen2.DAO;
using Examen2.modelos;
using System.Collections.Generic;
using System.Net;
using System.ServiceModel.Web;
using System;

namespace Examen2
{
    public class Hoteles : IHoteles
    {
        private HotelDAO hotelDAO = new HotelDAO();

        public List<Hotel> ListarHoteles()
        {
            return hotelDAO.Listar();
        }

        public Hotel ObtenerHotel(string id)
        {
            return hotelDAO.Obtener(Convert.ToInt32(id));
        }

        public Hotel CrearHotel(Hotel hotelACrear)
        {
            Hotel actividadExistente = hotelDAO.Obtener(hotelACrear.Id);
            return hotelDAO.Crear(hotelACrear);
        }

        public Hotel ModificarHotel(Hotel hotelAModificar)
        {
            Hotel actividadExistente = hotelDAO.Obtener(hotelAModificar.Id);
            return hotelDAO.Modificar(hotelAModificar);
        }

        public void EliminarHotel(string id)
        {
            Hotel actividadExistente = hotelDAO.Obtener(Convert.ToInt32(id));
            hotelDAO.Eliminar(Convert.ToInt32(id));
        }

        public List<Hotel> ListarHotelesPorUbicacionHabitacion(string ubicacion, string tipoHabitacion)
        {
            return hotelDAO.ListarHotelesPorUbicacionHabitacion(ubicacion, tipoHabitacion);
        }

    }
}
