using Examen2.modelos;
using System.Collections.Generic;
using System.ServiceModel;
using System.ServiceModel.Web;

namespace Examen2
{
    [ServiceContract]
    public interface IHoteles
    {
        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Hoteles", ResponseFormat = WebMessageFormat.Json)]
        List<Hotel> ListarHoteles();

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Hoteles/{id}", ResponseFormat = WebMessageFormat.Json)]
        Hotel ObtenerHotel(string id);

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Hoteles/{ubicacion}/{tipoHabitacion}", ResponseFormat = WebMessageFormat.Json)]
        List<Hotel> ListarHotelesPorUbicacionHabitacion(string ubicacion, string tipoHabitacion);

        [OperationContract]
        [WebInvoke(Method = "POST", UriTemplate = "Hoteles", ResponseFormat = WebMessageFormat.Json)]
        Hotel CrearHotel(Hotel hotelACrear);

        [OperationContract]
        [WebInvoke(Method = "PUT", UriTemplate = "Hoteles", ResponseFormat = WebMessageFormat.Json)]
        Hotel ModificarHotel(Hotel hotelAModificar);

        [OperationContract]
        [WebInvoke(Method = "DELETE", UriTemplate = "Hoteles/{id}", ResponseFormat = WebMessageFormat.Json)]
        void EliminarHotel(string id);

        [WebInvoke(Method = "OPTIONS", UriTemplate = "*")]
        void Options();
    }
}
