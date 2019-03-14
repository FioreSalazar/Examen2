using Examen2.modelos;
using System.Collections.Generic;
using System.Data.SqlClient;

namespace Examen2.DAO
{

    public class HotelDAO
    {
        private string CadenaConexion = "Data Source=FIORELLA\\FIORELLASQL;Initial Catalog=Hoteles;Integrated Security=true;";

        public Hotel Crear(Hotel hotelACrear)
        {
            Hotel hotelCreada = null;
            string sql = "INSERT INTO hoteles (nombre, telefono, ubicacion, tipoHabitacion, precio) " +
                "values(@nombre, @telefono, @ubicacion, @tipoHabitacion, @precio)";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@nombre", hotelACrear.Nombre));
                    comando.Parameters.Add(new SqlParameter("@telefono", hotelACrear.Telefono));
                    comando.Parameters.Add(new SqlParameter("@ubicacion", hotelACrear.Ubicacion));
                    comando.Parameters.Add(new SqlParameter("@tipoHabitacion", hotelACrear.TipoHabitacion));
                    comando.Parameters.Add(new SqlParameter("@precio", hotelACrear.Precio));
                    comando.ExecuteNonQuery();
                }
            }
            hotelCreada = Obtener(hotelACrear.Id);
            return hotelCreada;
        }

        public Hotel Obtener(int id)
        {
            Hotel hotelEncontrado = null;
            string sql = "SELECT * FROM hoteles WHERE id = @id";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@id", id));
                    using (SqlDataReader resultado = comando.ExecuteReader())
                    {
                        if (resultado.Read())
                        {
                            hotelEncontrado = new Hotel()
                            {
                                Id = (int)resultado["id"],
                                Nombre = (string)resultado["nombre"],
                                Telefono = (string)resultado["telefono"],
                                Ubicacion = (string)resultado["ubicacion"],
                                TipoHabitacion = (string)resultado["tipoHabitacion"],
                                Precio = (int)resultado["precio"]
                            };
                        }
                    }
                }

            }
            return hotelEncontrado;
        }

        public Hotel Modificar(Hotel hotelAModificar)
        {
            Hotel hotelModificado = null;
            string sql = "UPDATE hoteles SET nombre = @nombre, telefono = @telefono, ubicacion = @ubicacion, precio = @precio where id = @id";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@nombre", hotelAModificar.Nombre));
                    comando.Parameters.Add(new SqlParameter("@telefono", hotelAModificar.Telefono));
                    comando.Parameters.Add(new SqlParameter("@ubicacion", hotelAModificar.Ubicacion));
                    comando.Parameters.Add(new SqlParameter("@precio", hotelAModificar.Precio));
                    comando.Parameters.Add(new SqlParameter("@id", hotelAModificar.Id));
                    comando.ExecuteNonQuery();
                }
            }
            hotelModificado = Obtener(hotelAModificar.Id);
            return hotelModificado;
        }

        public void Eliminar(int Id)
        {
            string sql = "DELETE FROM hoteles WHERE id = @id";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@id", Id));
                    comando.ExecuteNonQuery();
                }
            }
        }

        public List<Hotel> Listar()
        {
            List<Hotel> hotelesEncontrados = new List<Hotel>();
            Hotel hotelEncontrado = null;
            string sql = "select * from hoteles";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    using (SqlDataReader resultado = comando.ExecuteReader())
                    {
                        while (resultado.Read())
                        {
                            hotelEncontrado = new Hotel()
                            {
                                Id = (int)resultado["id"],
                                Nombre = (string)resultado["nombre"],
                                Telefono = (string)resultado["telefono"],
                                Ubicacion = (string)resultado["ubicacion"],
                                TipoHabitacion= (string)resultado["tipoHabitacion"],
                                Precio = (int)resultado["precio"]
                            };
                            hotelesEncontrados.Add(hotelEncontrado);
                        }
                    }
                }
            }
            return hotelesEncontrados;
        }

        public List<Hotel> ListarHotelesPorUbicacionHabitacion(string ubicacion, string habitacion)
        {
            List<Hotel> hotelesEncontrados = new List<Hotel>();
            Hotel hotelEncontrado = null;
            string sql = "SELECT * FROM hoteles WHERE ubicacion = @ubicacion and tipoHabitacion = @tipoHabitacion";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@ubicacion", ubicacion));
                    comando.Parameters.Add(new SqlParameter("@tipoHabitacion", habitacion));
                    using (SqlDataReader resultado = comando.ExecuteReader())
                    {
                        while (resultado.Read())
                        {
                            hotelEncontrado = new Hotel()
                            {
                                Id = (int)resultado["id"],
                                Nombre = (string)resultado["nombre"],
                                Telefono = (string)resultado["telefono"],
                                Ubicacion = (string)resultado["ubicacion"],
                                Precio = (int)resultado["precio"]
                            };
                            hotelesEncontrados.Add(hotelEncontrado);
                        }
                    }
                }

            }
            return hotelesEncontrados;
        }
        
    }
}