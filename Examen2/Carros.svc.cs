using Examen2.DAO;
using Examen2.modelos;
using System.Collections.Generic;
using System.Net;
using System.ServiceModel.Web;
using System;

namespace Examen2
{
    public class Carros : ICarros
    {
        private CarroDAO carroDAO = new CarroDAO();
        public List<Carro> ListarCarros()
        {
            return carroDAO.Listar();
        }
        public Carro ObtenerCarro(string id)
        {
            return carroDAO.Obtener(Convert.ToInt32(id));
        }
        public Carro CrearCarro(Carro carroACrear)
        {
            Carro Existente = carroDAO.Obtener(carroACrear.Id);
            return carroDAO.Crear(carroACrear);
        }
        public Carro ModificarCarro(Carro carroAModificar)
        {
            Carro Existente = carroDAO.Obtener(carroAModificar.Id);
            return carroDAO.Modificar(carroAModificar);
        }

        public void EliminarCarro(string id)
        {
            Carro Existente = carroDAO.Obtener(Convert.ToInt32(id));
            carroDAO.Eliminar(Convert.ToInt32(id));
        }
        public List<Carro> ListarCarrosPorUbicacionCategoria(string marca, string categoria)
        {
            return carroDAO.ListarCarrosPorUbicacionCategoria(marca, categoria);
        }

        public void Options()
        {
            WebOperationContext.Current.OutgoingResponse.Headers.Add("X-MyHeader", "value");
            WebOperationContext.Current.OutgoingResponse.Headers.Add("Public", "OPTIONS,POST,GET,PUT,DELETE");
        }
    }
}
