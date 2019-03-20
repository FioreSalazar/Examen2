using Examen2.modelos;
using System.Collections.Generic;
using System.ServiceModel;
using System.ServiceModel.Web;

namespace Examen2
{
    [ServiceContract]
    public interface IVuelos
    {
        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Vuelos", ResponseFormat = WebMessageFormat.Json)]
        List<Vuelo> ListarVuelos();

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Vuelos/{id}", ResponseFormat = WebMessageFormat.Json)]
        Vuelo ObtenerVuelo(string id);

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Vuelos/{origen}/{categoria}", ResponseFormat = WebMessageFormat.Json)]
        List<Vuelo> ListarVuelosPorOrigenCategoria(string origen, string categoria);

        [OperationContract]
        [WebInvoke(Method = "POST", UriTemplate = "Vuelos", ResponseFormat = WebMessageFormat.Json)]
        Vuelo CrearVuelo(Vuelo vueloACrear);

        [OperationContract]
        [WebInvoke(Method = "PUT", UriTemplate = "Vuelos", ResponseFormat = WebMessageFormat.Json)]
        Vuelo ModificarVuelo(Vuelo vueloAModificar);

        [OperationContract]
        [WebInvoke(Method = "DELETE", UriTemplate = "Vuelos/{id}", ResponseFormat = WebMessageFormat.Json)]
        void EliminarVuelo(string id);

        [WebInvoke(Method = "OPTIONS", UriTemplate = "*")]
        void Options();
    }
}