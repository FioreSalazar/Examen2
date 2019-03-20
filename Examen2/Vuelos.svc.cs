using Examen2.DAO;
using Examen2.modelos;
using System.Collections.Generic;
using System.Net;
using System.ServiceModel.Web;
using System;

namespace Examen2
{
    public class Vuelos : IVuelos
    {
        private VueloDAO vuelosDAO = new VueloDAO();

        public List<Vuelo> ListarVuelos()
        {
            return vuelosDAO.Listar();
        }

        public Vuelo ObtenerVuelo(string id)
        {
            return vuelosDAO.Obtener(Convert.ToInt32(id));
        }

        public Vuelo CrearVuelo(Vuelo vueloACrear)
        {
            Vuelo Existente = vuelosDAO.Obtener(vueloACrear.Id);
            return vuelosDAO.Crear(vueloACrear);
        }

        public Vuelo ModificarVuelo(Vuelo VuelosAModificar)
        {
            Vuelo Existente = vuelosDAO.Obtener(VuelosAModificar.Id);
            return vuelosDAO.Modificar(VuelosAModificar);
        }

        public void EliminarVuelo(string id)
        {
           Vuelo Existente = vuelosDAO.Obtener(Convert.ToInt32(id));
            vuelosDAO.Eliminar(Convert.ToInt32(id));
        }

        public List<Vuelo> ListarVuelosPorOrigenCategoria(string origen, string categoria)
        {
            return vuelosDAO.ListarVuelosPorOrigenCategoria(origen, categoria);
        }

        public void Options()
        {
            WebOperationContext.Current.OutgoingResponse.Headers.Add("X-MyHeader", "value");
            WebOperationContext.Current.OutgoingResponse.Headers.Add("Public", "OPTIONS,POST,GET,PUT,DELETE");
        }

    }
}
