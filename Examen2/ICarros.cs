using Examen2.modelos;
using System.Collections.Generic;
using System.ServiceModel;
using System.ServiceModel.Web;

namespace Examen2
{
    [ServiceContract]
    public interface ICarros
    {
        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Carros", ResponseFormat = WebMessageFormat.Json)]
        List<Carro> ListarCarros();

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Carros/{id}", ResponseFormat = WebMessageFormat.Json)]
        Carro ObtenerCarro(string id);

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "Carros/{marca}/{categoria}", ResponseFormat = WebMessageFormat.Json)]
        List<Carro> ListarCarrosPorUbicacionCategoria(string marca, string categoria);

        [OperationContract]
        [WebInvoke(Method = "POST", UriTemplate = "Carros", ResponseFormat = WebMessageFormat.Json)]
        Carro CrearCarro(Carro CarroACrear);

        [OperationContract]
        [WebInvoke(Method = "PUT", UriTemplate = "Carros", ResponseFormat = WebMessageFormat.Json)]
        Carro ModificarCarro(Carro carroAModificar);

        [OperationContract]
        [WebInvoke(Method = "DELETE", UriTemplate = "Carros/{id}", ResponseFormat = WebMessageFormat.Json)]
        void EliminarCarro(string id);

        [WebInvoke(Method = "OPTIONS", UriTemplate = "*")]
        void Options();
    }
}
