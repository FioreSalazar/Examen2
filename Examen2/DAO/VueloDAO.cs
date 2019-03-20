using Examen2.modelos;
using System.Collections.Generic;
using System.Data.SqlClient;

namespace Examen2.DAO
{
    public class VueloDAO
    {
        private string CadenaConexion = "Data Source=FIORELLA\\FIORELLASQL;Initial Catalog=Rentivel;Integrated Security=true;";

        public Vuelo Crear(Vuelo vueloACrear)
        {
           Vuelo vueloCreado = null;
            string sql = "INSERT INTO vuelos (origen, destino, agencia, categoria, precio) " +
                "values(@origen, @destino, @agencia, @categoria, @precio)";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@origen", vueloACrear.Origen));
                    comando.Parameters.Add(new SqlParameter("@destino", vueloACrear.Destino));
                    comando.Parameters.Add(new SqlParameter("@agencia", vueloACrear.Agencia));
                    comando.Parameters.Add(new SqlParameter("@categoria", vueloACrear.Categoria));
                    comando.Parameters.Add(new SqlParameter("@precio", vueloACrear.Precio));
                    comando.ExecuteNonQuery();
                }
            }
            vueloCreado = Obtener(vueloACrear.Id);
            return vueloCreado;
        }

        public Vuelo Obtener(int id)
        {
            Vuelo vueloEncontrado = null;
            string sql = "SELECT * FROM vuelos WHERE id = @id";
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
                            vueloEncontrado = new Vuelo()
                            {
                                Id = (int)resultado["id"],
                                Origen = (string)resultado["origen"],
                                Destino = (string)resultado["destino"],
                                Agencia = (string)resultado["agencia"],
                                Categoria = (string)resultado["categoria"],
                                Precio = (int)resultado["precio"]
                            };
                        }
                    }
                }

            }
            return vueloEncontrado;
        }

        public Vuelo Modificar(Vuelo vueloAModificar)
        {
            Vuelo vueloModificado = null;
            string sql = "UPDATE vuelos SET origen= @origen, destino = @destino, agencia = @agencia, categoria= @categoria, precio = @precio where id = @id";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@origen", vueloAModificar.Origen));
                    comando.Parameters.Add(new SqlParameter("@destino", vueloAModificar.Destino));
                    comando.Parameters.Add(new SqlParameter("@agencia", vueloAModificar.Agencia));
                    comando.Parameters.Add(new SqlParameter("@categoria", vueloAModificar.Categoria));
                    comando.Parameters.Add(new SqlParameter("@precio", vueloAModificar.Precio));
                    comando.Parameters.Add(new SqlParameter("@pid", vueloAModificar.Id));
                    comando.ExecuteNonQuery();
                }
            }
            vueloModificado = Obtener(vueloAModificar.Id);
            return vueloModificado;
        }

        public void Eliminar(int Id)
        {
            string sql = "DELETE FROM vuelos WHERE id = @id";
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

        public List<Vuelo> Listar()
        {
            List<Vuelo> vuelosEncontrados = new List<Vuelo>();
            Vuelo vueloEncontrado = null;
            string sql = "select * from vuelos";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    using (SqlDataReader resultado = comando.ExecuteReader())
                    {
                        while (resultado.Read())
                        {
                            vueloEncontrado = new Vuelo()
                            {
                                Id = (int)resultado["id"],
                                Origen = (string)resultado["origen"],
                                Destino = (string)resultado["destino"],
                                Agencia = (string)resultado["agencia"],
                                Categoria = (string)resultado["categoria"],
                                Precio = (int)resultado["precio"]
                            };
                            vuelosEncontrados.Add(vueloEncontrado);
                        }
                    }
                }
            }
            return vuelosEncontrados;
        }

        public List<Vuelo> ListarVuelosPorOrigenCategoria(string origen, string categoria)
        {
            List<Vuelo> vuelosEncontrados = new List<Vuelo>();
            Vuelo vueloEncontrado = null;
            string sql = "SELECT * FROM vuelos WHERE origen = @origen and categoria = @categoria ";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@origen", origen));
                    comando.Parameters.Add(new SqlParameter("@categoria", categoria));
                    using (SqlDataReader resultado = comando.ExecuteReader())
                    {
                        while (resultado.Read())
                        {
                            vueloEncontrado = new Vuelo()
                            {
                                Id = (int)resultado["id"],
                                Origen = (string)resultado["origen"],
                                Destino = (string)resultado["destino"],
                                Agencia = (string)resultado["agencia"],
                                Categoria = (string)resultado["categoria"],
                                Precio = (int)resultado["precio"]

                            };
                            vuelosEncontrados.Add(vueloEncontrado);
                        }
                    }
                }

            }
            return vuelosEncontrados;
        }

    }
}
